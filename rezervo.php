<?php
include "./dbconnect.php";
include "./hotelet_db_utils.php";
include "./rezervo_form.php";


$rez_utils = new HoteliDbUtils();
$result = $rez_utils->getHotelet();

$rezervo_form = new rezervo_form();


if(isset($_POST["ID"])){
    $h_id = $_POST["ID"];
    $rezervo_form -> rezervo_popUp($h_id);
    
    var_dump($rezervo_form);
    var_dump($_POST['ID']);
}




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Reservation System</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/rezervo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>


<body>
    <?php require_once(__DIR__ . '/nav-bar.php'); ?>
    
    <!-- <div class="form-popup" id="popup">
        <h1>Enter the dates of your reservation</h1>
        <form action="">
            <div class="form-container">
                <div class="date-holder">
                    <p>Nga: <input type="date" id="StartDate"></p>
                    <p>Deri: <input type="date" id="EndDate"></p>
                </div>
                <p style="visibility: hidden;" id="error-msg"></p>
                <div class="button-holder">
                    <button class="cancel" >Anulo</button>
                    <button class="rezervo-btn" >Rezervo</button>
                </div>
            </div>
        </form>
    </div> -->

    <hr>

    <?php if (!empty($result)): ?>
        <?php foreach ($result as $Hotel):
            $name = $Hotel["emri"];
            $finalEmri = "./images/uploads/Hotel_{$name}.jpg" ?>
            <div class="hotel-card-container">
                <div class="card-animation">
                    <div class="hotel-card">
                        <div class="hotel-img">
                            <img src="<?php echo $finalEmri; ?>" alt="">
                        </div>
                        <div class="main-info">
                            <div class="rating-addres">
                                <h3>
                                    <?php echo htmlspecialchars($Hotel["emri"]) ?>
                                </h3>
                                <p>
                                    <?php echo htmlspecialchars($Hotel["adresa"]) ?>
                                </p>
                                <p>
                                    <?php echo htmlspecialchars($Hotel["rating"]) ?>★
                                </p>
                            </div>
                            <div class="reserve">
                                <h4>
                                    <?php echo htmlspecialchars($Hotel["cmimi_per_nate"]) ?>/Night
                                </h4>
                                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                    <input type="hidden" value = <?php echo htmlspecialchars($Hotel["hoteli_id"]) ?> name="ID">
                                    <button class="rezervo-btn" onclick="DisplayForm()" type="submit" name="submit">Rezervo</button>
                                </form>
                            </div>
                            <div class="desc">
                                <p>
                                    <?php echo htmlspecialchars($Hotel["pershkrimi"]) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    </div>
    <!-- <script src="./js/rezervo.js"></script> -->
</body>
<?php require_once(__DIR__ . '/footer.php'); ?>

</html>
