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
        <button class="open-navbar-btn" onclick="toggleNav()">
            < </button>
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
    <div class="mobile-dboard-navbar">
        <div class="mobile-link">
            <a href="dboard_rezervimet.php">
                <div class="mobile-dboard-icon">
                    <img src="../images/icons/list.png" alt="">
                </div>
                Rezervimet
            </a>
        </div>
        <div class="mobile-link">
            <a href="dboard_hotelet_add.php">
                <div class="mobile-dboard-icon">
                    <img src="../images/icons/hotel.png" alt="">
                </div>
                Hotelet
            </a>
        </div>
        <div class="mobile-link">
            <a href="dboard_mesazhet.php">
                <div class="mobile-dboard-icon">
                    <img src="../images/icons/msg.png" alt="">
                </div>
                Mesazhet
            </a>
        </div>
        <div class="mobile-link">
            <a href="dboard_news.php">
                <div class="mobile-dboard-icon">
                    <img src="../images/icons/news.png" alt="">
                </div>
                Te rejat
            </a>
        </div>
        <div class="mobile-link">
            <a href="../logout.php">
                <div class="mobile-dboard-icon">
                    <img src="../images/icons/logout.png" alt="">
                </div>
                Çkyçu
            </a>
        </div>
        <div class="mobile-link">
            <a href="">
                <div class="mobile-dboard-icon">
                    <img src="../images/icons/profile.png" alt="pfp">

                </div>
                Admin
            </a>
        </div>
    </div>
    <script src="../js/navbar_control.js"></script>
</body>

</html>