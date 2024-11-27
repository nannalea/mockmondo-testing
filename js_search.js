document.addEventListener("DOMContentLoaded", function () {
  var searchContainer = document.querySelectorAll(".slow-render");
  /* Loop through all and add style.opacity 1 for each, but with a delay of 50ms per time */
  for (var i = 0; i < searchContainer.length; i++) {
    searchContainer[i].style.opacity = "1";
    searchContainer[i].style.transition = "opacity 0.5s ease-in " + i * 0.25 + "s";
  }
});

function clearSearchHistory() {
  sessionStorage.removeItem("searchResults");
}

/* Add event listener for is input id="from-input" is in focus */

function toggleKeydownBehavior(event) {
  if (event.key === "ArrowDown") {
    event.preventDefault();
  }
  if (event.key === "ArrowUp") {
    event.preventDefault();
  }
}

function showResults(inputField) {
  const the_input = document.querySelector(`#${inputField}-input`);
  if (the_input.value.length > 0) {
    document.querySelector(`#${inputField}-results`).style.opacity = "1";
    getCities(inputField);
  } else {
    document.querySelector(`#${inputField}-results`).style.opacity = "0";
  }
}

function hideResults(inputField) {
  document.addEventListener("mousedown", (event) => {
    const result = document.querySelector(`#${inputField}-results`);
    if (!result.contains(event.target)) {
      document.querySelector(`#${inputField}-results`).style.opacity = "0";
    }
    window.removeEventListener("keydown", toggleKeydownBehavior);
  });
}

async function getCities(inputField) {
  const inputValue = document.querySelector(`#${inputField}-input`).value.toLowerCase();
  if (inputField === "from") {
    let conn = await fetch(`api-get-cities-from.php?from_city_name=${inputValue}`);
    let flights = await conn.json();
    const uniqueFlights = flights.filter((flight, index, self) => {
      return index === self.findIndex((f) => f.departure_city === flight.departure_city);
    });
    // Make max 5 results
    const limitedFlights = uniqueFlights.slice(0, 5);

    let diff = JSON.parse(sessionStorage.getItem("searchResults"));
    if (limitedFlights.length !== 0) {
      // If the search results are different from the previous search results, then display the new results
      if (diff == null || !arraysEqual(limitedFlights, diff)) {
        sessionStorage.setItem("searchResults", JSON.stringify(limitedFlights));
        document.querySelector(`#${inputField}-results`).textContent = "";
        limitedFlights.forEach(displayFromResults, inputField);
        navigateWithKeyboard(inputField, limitedFlights.length);
      }
    } else {
      document.querySelector(`#${inputField}-results`).textContent = "Sorry, no flight matches your search";
    }
  }

  if (inputField === "to") {
    let conn = await fetch(`api-get-cities-from.php?from_city_name=${inputValue}`);
    let flights = await conn.json();
    const uniqueFlights = flights.filter((flight, index, self) => {
      return index === self.findIndex((f) => f.arrival_city === flight.arrival_city);
    });
    // Make max 5 results
    const limitedFlights = uniqueFlights.slice(0, 5);

    let diff = JSON.parse(sessionStorage.getItem("searchResults"));
    if (limitedFlights.length !== 0) {
      // If the search results are different from the previous search results, then display the new results
      if (diff == null || !arraysEqual(limitedFlights, diff)) {
        sessionStorage.setItem("searchResults", JSON.stringify(limitedFlights));
        document.querySelector(`#${inputField}-results`).textContent = "";
        limitedFlights.forEach(displayToResults, inputField);
        navigateWithKeyboard(inputField, limitedFlights.length);
      }
    } else {
      document.querySelector(`#${inputField}-results`).textContent = "Sorry, no flight matches your search";
    }
  }
}

function arraysEqual(a, b) {
  if (a.length !== b.length) return false;
  for (let i = 0; i < a.length; i++) {
    if (Object.keys(a[i]).length !== Object.keys(b[i]).length) return false;
    for (let key in a[i]) {
      if (a[i][key] !== b[i][key]) return false;
    }
  }
  return true;
}

// inputField passed as 'this'
function displayToResults(flights) {
  const clone = document.querySelector(`#template-${this}`).content.cloneNode(true);
  clone.querySelector(`.${this}-city-name`).textContent = flights.arrival_city;
  clone.querySelector(`.${this}-country-name`).textContent = ", " + flights.arrival_country;
  clone.querySelector(`.${this}-airport-short`).textContent = flights.arrival_airport_code;
  clone.querySelector(`.${this}-airport`).textContent = flights.arrival_airport_code;
  document.querySelector(`#${this}-results`).appendChild(clone);
}

// inputField passed as 'this'
function displayFromResults(flights) {
  const clone = document.querySelector(`#template-${this}`).content.cloneNode(true);
  clone.querySelector(`.${this}-city-name`).textContent = flights.departure_city;
  clone.querySelector(`.${this}-country-name`).textContent = ", " + flights.departure_country;
  clone.querySelector(`.${this}-airport-short`).textContent = flights.departure_airport_code;
  clone.querySelector(`.${this}-airport`).textContent = flights.departure_airport_code;
  document.querySelector(`#${this}-results`).appendChild(clone);
}

function navigateWithKeyboard(inputField) {
  let currentTabIndex = -1;
  const results = document.querySelectorAll(`.${inputField}-city`);
  results.forEach((result, index) => {
    result.setAttribute("tabindex", index + 1);
  });
  console.log("current tab index: " + currentTabIndex + "results length: " + results.length);
  document.addEventListener("keydown", (event) => {
    toggleKeydownBehavior(event);
    if (event.key === "ArrowDown" && currentTabIndex != results.length - 1) {
      currentTabIndex++;
      results[currentTabIndex].focus();
    } else if (event.key === "ArrowUp" && currentTabIndex != 0) {
      currentTabIndex--;
      results[currentTabIndex].focus();
      if (!results[currentTabIndex]) {
        return;
      }
    }
    selectOnEnterKeyPress(event, inputField);
  });
}

// select on enter key
function selectOnEnterKeyPress(event, inputField) {
  let focusedElement = document.activeElement;
  if (event.keyCode === 13) {
    console.log(focusedElement);
    console.log("inputField: " + inputField);
    selectFromCity(focusedElement, inputField);
  }
}

//incert clicked flight into input
function selectFromCity(ev, inputField) {
  console.log(inputField);
  const cityElement = ev.querySelector(`.${inputField}-city-name`);
  if (cityElement) {
    console.log("target " + cityElement.innerHTML);
    const cityName = cityElement.innerText;
    document.querySelector(`#${inputField}-input`).value = cityName;
    document.querySelector(`#${inputField}-results`).style.opacity = `0`;
    document.querySelector(`#${inputField}-results`).innerHTML = "";
  } else {
    console.log("Could not find city element");
  }
}

// ########## ADMIN ##########
async function delete_flight() {
  const frm = event.target.form;
  const conn = await fetch("api-delete-flight-from-db.php", {
    method: "POST",
    body: new FormData(frm),
  });
  const data = await conn.json();
  if (!conn.ok) {
    console.log(data);
    return;
  }
  // Success
  console.log(data);
  frm.remove();
}
