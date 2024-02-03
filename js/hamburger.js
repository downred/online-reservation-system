let hamburger = document.getElementById("hamburger");
let hamburgerContainer = document.getElementsByClassName("mobile-links")[0];
let body = document.getElementsByTagName('body')[0]

hamburger.onclick = function (e) {
    e.preventDefault();

  let containerDisplay = window
    .getComputedStyle(hamburgerContainer)
    .getPropertyValue("display");

  if (containerDisplay === "none" || containerDisplay === "") {
      hamburgerContainer.style.display = "block";
      body.style.overflow = "hidden";

  } else {
      hamburgerContainer.style.display = "none";
      body.style.overflow = "";
  }
};
