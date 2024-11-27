function toggleBurger() {
  document.querySelector("nav").classList.toggle("open-burger");
  let navlink = document.querySelectorAll("nav a");
  navlink.forEach((element) => {
    element.classList.toggle("hide-text");
  });
  document.querySelector("header").classList.toggle("open-main");
  document.querySelector("main").classList.toggle("open-main");
  document.querySelector("footer").classList.toggle("open-main");
}

// Close burger menu when width < 800px

function mediaQuery() {
  const mediaQuery = "(max-width: 800px)";
  const mediaQueryList = window.matchMedia(mediaQuery);

  mediaQueryList.addEventListener("change", (event) => {
    if (event.matches) {
      document.querySelector("nav").classList.add("open-burger");
      document.querySelector("header").classList.add("open-main");
      document.querySelector("main").classList.add("open-main");
      document.querySelector("footer").classList.add("open-main");
    }
  });
}

mediaQuery();
