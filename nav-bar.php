<!DOCTYPE html>
<html lang="en">

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
                    <div><a href="rezervo.php">Hotelet</a></div>
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
            </div>
            <li class="nav-section-two">
                <a class="btn-light m-2" href="login.php">Kyçu</a>
                <?php
                session_start();
                if (isset($_SESSION["userid"])) {
                    echo '<a class="btn-light m-2" href="logout.php">Çkyçu</a>';
                }
                ?>
                
            </li>
        </ul>
    </nav>

<body>

</body>

</html>