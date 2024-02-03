<?php
include "./dbconnect.php";
include "index_db_utils.php";


$rez_utils = new IndexDBUtils();
$hotel_images = $rez_utils->getHotelImages();
$feedback = $rez_utils->getFeedback();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Reservation System</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/ballina.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php require_once(__DIR__ . '/nav-bar.php'); ?>
        <div class="hero-container">
            <div class="landing-img">
                <img src="./images/landing.jpg" class="">
            </div>
            <div class="hero-content">
                <h1>
                    Zbulo aventurën tënde, rezervo një ëndërr.
                </h1>
                <?php if (isset($_SESSION["userid"])): ?>
                    <a class="btn-primary" href="rezervo.php">Rezervo tani</a>
                <?php else: ?>
                    <a class="btn-primary" href="login.php">Rezervo tani</a>
                <?php endif; ?>

            </div>
        </div>
    </header>
    <main>
        <section id="s1">
            <h3>Hotelet tona</h3>
            <div class="slider">
                <button class="slide-btn slide-btn-left" onclick="slideLeft()">
                    < </button>
                        <div class="slider-images-wrapper">
                            <div class="slider-images">
                                <?php foreach ($hotel_images as $image): ?>
                                    <div class="slider-img">
                                        <img src="<?php echo htmlspecialchars($image["image_path"]) ?>"
                                            alt="Image <?php echo htmlspecialchars($image["image_id"]) ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <button class="slide-btn slide-btn-right" onclick="slideRight()">
                            >
                        </button>
            </div>
        </section>
        <section id="s2">
            <h3>Çfarë thonë të tjerët për ne?</h3>
            <div class="person-info-wrapper">
                <?php foreach ($feedback as $fb): ?>
                    <div class="person-info-container">
                        <div class="person">
                            <img src="./images/icons/circle.png" alt="">
                        </div>
                        <div class="person-info">
                            <p>
                                <?php echo htmlspecialchars($fb["feedback_content"]) ?>
                            </p>
                            <p class="person-name">
                                <?php echo htmlspecialchars($fb["feedback_name"]) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </section>
    </main>
    <?php require_once(__DIR__ . '/footer.php'); ?>
    <script src="./js/slider.js"></script>
</body>

</html>