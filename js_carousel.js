const container = document.querySelector("#destination-mask");
const nextButton = document.getElementById("btn-next");
const prevButton = document.getElementById("btn-prev");
const carruselItems = 6;
const scrollStep = container.scrollWidth / carruselItems;
prevButton.classList.add("hidden");

function clickNext() {
  let scroll = container.scrollLeft;
  let containerwidth = container.scrollWidth;
  if (scroll + container.offsetWidth >= containerwidth - scroll) {
    container.scrollTo(containerwidth, 0);
    nextButton.classList.add("hidden");
  } else {
    container.scrollTo(scroll + scrollStep, 0);
    prevButton.classList.remove("hidden");
  }
}

function clickPrev() {
  let scroll = container.scrollLeft;
  if (scroll - scrollStep <= 0) {
    container.scrollTo(0, 0);
    prevButton.classList.add("hidden");
  } else {
    container.scrollTo(scroll - scrollStep, 0);
    nextButton.classList.remove("hidden");
  }
}
