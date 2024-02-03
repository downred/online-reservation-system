<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<body>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <nav>
        <ul class="nav-container">
            <div class="nav-section-one">
                <li>
                    <img src="./images/logo/logo.png" alt="" width="70px">
                </li>
                <li>
                    <div><a href="index.php">Ballina</a></div>
                </li>
                <li>
                    <?php if (isset($_SESSION["userid"])): ?>
                        <div><a href="rezervo.php">Hotelet</a></div>
                    <?php else: ?>
                        <div><a href="login.php">Hotelet</a></div>
                    <?php endif; ?>

                </li>
                <li>
                    <div><a href="rreth-nesh.php">Rreth nesh</a></div>
                </li>
                <li>
                    <div><a href="news.php">Të rejat</a></div>
                </li>
                <li>
                    <div><a href="FAQ.php">FAQ</a></div>
                </li>
                <li>
                    <div><a href="kontakt.php">Na kontaktoni</a></div>
                </li>
            </div>
            <li class="nav-section-two">
                <a class="btn-light m-2" href="login.php"><?php echo $_SESSION["username"] ?></a>
                <?php
                if (isset($_SESSION["userid"])) {
                    echo '<a class="btn-light m-2" href="logout.php">Çkyçu</a>';
                }
                ?>

            </li>
        </ul>
        <div class="mobile-navbar">
            <div class="img-container">
                <img src="./images/logo/logo.png" alt="" width="70px">
            </div>
            <div class="hamburger">
                <a id="hamburger" href="">
                    <img src="./images/icons/hamburger.png" alt="">
                </a>
            </div>
        </div>
        <div class="mobile-links">
            <div class="link-container">
                <div>
                    <a href="index.php">Ballina</a>
                </div>

                <div>
                    <a href="rezervo.php">Hotelet</a>
                </div>

                <div>
                    <a href="rreth-nesh.php">Rreth nesh</a>
                </div>

                <div>
                    <a href="news.php">Të rejat</a>
                </div>

                <div>
                    <a href="FAQ.php">FAQ</a>
                </div>

                <div>
                    <a href="kontakt.php">Na kontaktoni</a>
                </div>

                <div>
                    <a class="btn-light" href="login.php">Kyçu</a>
                    <?php
                    if (isset($_SESSION["userid"])) {
                        echo '<a class="btn-light" href="logout.php">Çkyçu</a>';
                    }
                    ?>
                </div>

            </div>
        </div>
    </nav>

    <script src="./js/hamburger.js"></script>

</body>

</html>