<!doctype html>
<?php
include "../dbconnect.php";
include "db_utils.php";
// include "hotel_image_processor.php";

$db_utils = new DBUtils();

session_start();

if ($_SESSION["is_admin"] == 1) {
    if (isset($_POST["submit"])) {
        
        $emri = $_POST["emri"];
        $adresa = $_POST["adresa"];
        $pershkrimi = $_POST["pershkrimi"];
        $cmimi = $_POST["cmimi"];
        $rating = $_POST["rating"];
        $image = $_FILES["image"];

        // $name = trim($result[0]["emri"]);
        // $finalEmri = "../images/uploads/Hotel_{$name}.jpg";
        // echo "$finalEmri";
        

        if (isset($_GET["id"])) {
            $id = $_POST["id"];
            $db_utils->updateHotel($emri, $adresa, $pershkrimi, $cmimi, $rating, $id);
        } else {
            $db_utils->addHoteli($emri, $adresa, $pershkrimi, $cmimi, $rating);
        }
    } else {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $result = $db_utils->getHotelById($id);
        }
    }
} else {
    header("location: ../index.php");
}
    
    ?>

<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/main.css">

    <title>Holtelet </title>
    <link rel="stylesheet" href="../css/dashboard/dboard-main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/24184bbc2f.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <div class="wrapper">
        <div class="navbar-container">
            <?php require_once(__DIR__ . '/navbar.php') ?>
        </div>
        <section class="content-container">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="contact-container" style="padding: 1rem">
                    <input placeholder="Emri" value="<?php echo isset($result[0]["emri"]) ? $result[0]["emri"] : ''; ?>" type="text" id="emri" name="emri" class="contact-input">

                    <input placeholder="adresa" value="<?php echo isset($result[0]["adresa"]) ? $result[0]["adresa"] : ''; ?>" type="text" id="adresa" name="adresa" class="contact-input">
                    
                    <input placeholder="pershkrimi" value="<?php echo isset($result[0]["pershkrimi"]) ? $result[0]["pershkrimi"] : ''; ?>" id="pershkrimi" name="pershkrimi" class="contact-textarea">

                    <input placeholder="cmimi" value="<?php echo isset($result[0]["cmimi_per_nate"]) ? $result[0]["cmimi_per_nate"] : ''; ?>" type="cmimi" id="cmimi" name="cmimi" class="contact-input">

                    <input placeholder="rating" value="<?php echo isset($result[0]["rating"]) ? $result[0]["rating"] : ''; ?>" type="rating" id="rating" name="rating" class="contact-input">

                    <input placeholder="image" value="<?php echo "yes"; ?>" type="file" id="image" name="image" class="contact-input">

                    <button class="btn-light" type="submit" name="submit">Regjistro holetlin</button>
                </div>
                <img src="<?php echo $finalEmri; ?>" alt="">
            </form>
        </section>
    </div>
</body>

</html>