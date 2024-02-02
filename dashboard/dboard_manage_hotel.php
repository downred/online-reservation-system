<!doctype html>
<?php
include "../dbconnect.php";
include "db_utils.php";
include "hotel_image_processor.php";

$db_utils = new DBUtils();
$IMGProcessor = new IMGProcessor();

session_start();

if ($_SESSION["is_admin"] == 1) {
    if (isset($_POST["submit"])) {
        
        $emri = $_POST["emri"];
        $adresa = $_POST["adresa"];
        $pershkrimi = $_POST["pershkrimi"];
        $cmimi = $_POST["cmimi"];
        $rating = $_POST["rating"];
        $image = $_FILES["image"];

        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            
            if(isset($_FILES['$image'])){
                $IMGProcessor->saveIMG($emri);
            } else {
                $result = $db_utils->getHotelById($id);

                $name = trim($result[0]["emri"]);
                $finalEmri = "../images/uploads/Hotel_{$name}.jpg";

                $currentName = $result[0]["emri"];

                $oldFileName = "{$currentName}.jpg";
                $newFileName = $_POST["emri"];
                $newFileName2 = "{$newFileName}.jpg";

                $directory = '../images/uploads/Hotel_'; 

                $oldFilePath = $directory . $oldFileName;
                $newFilePath = $directory . $newFileName . ".jpg";

                if (file_exists($oldFilePath)) {
                    if (rename($oldFilePath, $newFilePath)) {
                        echo 'Image name changed successfully.';
                    } else {
                        echo 'Error changing image name.';
                    }
                } else {
                    echo 'Image does not exist.';
                }
            }


            $IMGProcessor->saveIMG($emri);
            $db_utils->updateHotel($emri, $adresa, $pershkrimi, $cmimi, $rating, $id);
        } else {
            $IMGProcessor->saveIMG($emri);
            $db_utils->addHoteli($emri, $adresa, $pershkrimi, $cmimi, $rating);
        }
    } else {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $result = $db_utils->getHotelById($id);

            $name = trim($result[0]["emri"]);
            $finalEmri = "../images/uploads/Hotel_{$name}.jpg";

            $currentName = $result[0]["emri"];
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
    <link rel="stylesheet" href="../css/rezervo.css">

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
            <?php if (isset($_GET["id"])): ?>
            <div class="hotel-card-container">
                <div class="card-animation">
                    <div class="hotel-card">
                        <div class="hotel-img">
                            <img src="<?php
                            
                            echo $finalEmri; ?>" alt="">
                        </div>
                        <div class="main-info">
                            <div class="rating-addres">
                                <h3>
                                    <?php echo htmlspecialchars($result[0]["emri"]) ?>
                                </h3>
                                <p>
                                    <?php echo htmlspecialchars($result[0]["adresa"]) ?>
                                </p>
                                <p>
                                    <?php echo htmlspecialchars($result[0]["rating"]) ?>★
                                </p>
                            </div>
                            <div class="reserve">
                                <h4>
                                    <?php echo htmlspecialchars($result[0]["cmimi_per_nate"]) ?>/Night
                                </h4>
                                <button class="rezervo-btn" onclick="DisplayForm()">Rezervo</button>
                                
                            </div>
                            <div class="desc">
                                <p>
                                    <?php echo htmlspecialchars($result[0]["pershkrimi"]) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="contact-container" style="padding: 1rem">
                    <input placeholder="Emri" value="<?php echo isset($result[0]["emri"]) ? $result[0]["emri"] : ''; ?>" type="text" id="emri" name="emri" class="contact-input">

                    <input placeholder="adresa" value="<?php echo isset($result[0]["adresa"]) ? $result[0]["adresa"] : ''; ?>" type="text" id="adresa" name="adresa" class="contact-input">
                    
                    <input placeholder="pershkrimi" value="<?php echo isset($result[0]["pershkrimi"]) ? $result[0]["pershkrimi"] : ''; ?>" id="pershkrimi" name="pershkrimi" class="contact-textarea">

                    <input placeholder="cmimi" value="<?php echo isset($result[0]["cmimi_per_nate"]) ? $result[0]["cmimi_per_nate"] : ''; ?>" type="cmimi" id="cmimi" name="cmimi" class="contact-input">

                    <input placeholder="rating" value="<?php echo isset($result[0]["rating"]) ? $result[0]["rating"] : ''; ?>" type="rating" id="rating" name="rating" class="contact-input">

                    <input placeholder="image" value="<?php echo "yes"; ?>" type="file" id="image" name="image" class="contact-input">

                    <button class="btn-light" type="submit" name="submit">submit</button>
                </div>
            </form>
            </div>
        </section>
    </div>
</body>

</html>