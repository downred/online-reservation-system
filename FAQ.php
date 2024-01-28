<?php
include "./dbconnect.php";
include "faq_db_utils.php";


$rez_utils = new FaqDbUtils();
$result = $rez_utils->getFAQ();

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
    <link rel="stylesheet" href="./css/reth-nesh.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body>
    <?php require_once(__DIR__ . '/nav-bar.php'); ?>
    <main>
        <div style="position: relative; height: 75vh">
            <div class="landing-img">
                <img src="./images/FAQ.jpg" class="">
            </div>
            <div class="hero-content">
                <h1>
                    FAQ
                </h1>
            </div>
        </div>
        <div class="card-container">
            <div class="card-row">
                <?php if (!empty($result)): ?>
                    <?php foreach ($result as $question): ?>
                        <div class="info-card">
                            <H3>
                                <?php echo htmlspecialchars($question["question"]) ?>
                            </H3>
                            <br>
                            <p>
                                <?php echo htmlspecialchars($question["answer"]) ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <?php require_once(__DIR__ . '/footer.php'); ?>
    <script src="./js/slider.js"></script>
</body>

</html>