<!doctype html>
<?php
if (isset($_POST["submit"])) {
    $emri = $_POST["emri"];
    $adresa = $_POST["adresa"];
    $pershkrimi = $_POST["pershkrimi"];
    $cmimi = $_POST["cmimi"];
    $rating = $_POST["rating"];
    $photo_path = "TESTTEST";

    include "../dbconnect.php";
    include "db_utils.php";
    // include "kontakt_contr.php";

    $db_utils = new DBUtils();
    $db_utils->addHoteli($emri, $adresa, $pershkrimi, $cmimi, $rating, $photo_path);
}


?>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <title>Holtelet </title>
    <link rel="stylesheet" href="../css/dashboard/dboard-main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    
</head>

<body>
    <div class="wrapper">
        <div class="navbar-container">
            <?php require_once(__DIR__ . '/navbar.php') ?>
        </div>
        <section class="content-container">
            <form action="" method="post">
                <div class="contact-container" style="padding: 1rem">
                    <input placeholder="Emri" type="text" id="emri" name="emri" class="contact-input">

                    <input placeholder="adresa" type="text" id="adresa" name="adresa" class="contact-input">
                    
                    <textarea placeholder="pershkrimi" id="pershkrimi" name="pershkrimi" class="contact-textarea"></textarea>

                    <input placeholder="cmimi" type="cmimi" id="cmimi" name="cmimi" class="contact-input">

                    <input placeholder="rating" type="rating" id="rating" name="rating" class="contact-input">

                    <input placeholder="photo_path" type="file" id="photo_path" name="photo_path" class="contact-input">

                    <button class="btn-light" type="submit" name="submit">Regjistro holetlin</button>
                </div>
            </form>
        </section>
    </div>
</body>

</html>