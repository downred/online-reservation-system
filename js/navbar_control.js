let isSidebarOpen = true;

function toggleNav() {
  console.log(isSidebarOpen)
  if (isSidebarOpen) {
    closeNav();
  } else {
    openNav();
  }
}

function openNav() {
  document.getElementById("navbar-wrapper").style.width = "250px";
  document.querySelector(".links ul").style.display = "flex";
  document.querySelector(".open-navbar-btn").style.left = "230px";
  document.querySelector(".content-container").style.marginLeft = "250px";
  document.querySelector(".open-navbar-btn").classList.remove("flipped");
  isSidebarOpen = true;
}

function closeNav() {
  document.getElementById("navbar-wrapper").style.width = "0";
  document.querySelector(".links ul").style.display = "none";
  document.querySelector(".open-navbar-btn").style.left = "10px";
    document.querySelector(".content-container").style.marginLeft = "0px";
  document.querySelector(".open-navbar-btn").classList.add("flipped");
  isSidebarOpen = false;
}
