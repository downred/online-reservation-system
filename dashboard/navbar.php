<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="navbar-wrapper" id="navbar-wrapper">
        <button class="open-navbar-btn" onclick="toggleNav()"> < </button>
        <div class="profile">
            <div class="profile-img-container">
                <img src="../images/icons/profile.png" alt="pfp">
            </div>
            <div class="profile-name">
                <span>Admin</span>
            </div>
        </div>
        <div class="links">
            
            <ul>
                <li><a href="dboard_rezervimet.php">Rezervimet</a></li>
                <li><a href="dboard_hotelet_add.php">Hotelet</a></li>
                <li><a href="dboard_mesazhet.php">Mesazhet</a></li>
                <li><a href="dboard_news.php">Te rejat</a></li>
                <li><a href="../logout.php">Çkyçu</a></li>
            </ul>
        </div>
    </div>
</body>
<script>
let isSidebarOpen = false;

function toggleNav() {
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
  document.querySelector(".open-navbar-btn").classList.remove("flipped");
  isSidebarOpen = true;
}

function closeNav() {
  document.getElementById("navbar-wrapper").style.width = "0";
  document.querySelector(".links ul").style.display = "none";
  document.querySelector(".open-navbar-btn").style.left = "10px";
  document.querySelector(".open-navbar-btn").classList.add("flipped");
  isSidebarOpen = false;
}
</script>
</html>