<?php
include "./dbconnect.php";
include "./hotelet_db_utils.php";
include "./dashboard/db_utils.php";

session_start();

$rez_utils = new HoteliDbUtils();
$result = $rez_utils->getHotelet();


$db_utils = new DBUtils();
$user_ID = $_SESSION['userid'];

if(isset($_POST["submit"])){
    $id = $_POST["ID"];
    $StartDate = $_POST["StartDate"];
    $EndDate = $_POST["EndDate"];

    $db_utils->rezervo($user_ID, $id, $StartDate, $EndDate);
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

    <div id="popup" class="form-popup-wrapper">
    <div class="form-popup-backdrop" onclick="CloseForm()"></div>
    <div class="form-popup" >
        <h1>Enter the dates of your reservation</h1>
        <form action="" method="post">
            <div class="form-container">
                <div class="date-holder">
                    <p>Nga: <input type="date" id="StartDate" name="StartDate"></p>
                    <p>Deri: <input type="date" id="EndDate" name="EndDate"></p>
                    <input type="hidden" id="hotelId"  name="ID"/>
                </div>
                <p style="visibility: hidden;" id="error-msg"></p>
                <div class="button-holder">
                    <div class="cancel" onclick="CloseForm()">Anulo</div>
                    <button class="rezervo-btn" type="submit" name="submit">Rezervo</button>
                </div>
            </div>
        </form>
        </div>
    </div>

    <hr>

    <?php if (!empty($result)): ?>
        <?php foreach ($result as $Hotel):?>
            <div class="hotel-card-container">
                <div class="card-animation">
                    <div class="hotel-card">
                        <div class="hotel-img">
                        <img width="200px" src="<?php echo "" . $result[0]["photo_path"]; ?>" alt="Current Image">
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
                                
                                    <button class="rezervo-btn" onclick="DisplayForm(<?php echo ($Hotel["hoteli_id"]) ?>)">Rezervo</button>
                                
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
    <script src="./js/rezervo.js"></script>
</body>
<?php require_once(__DIR__ . '/footer.php'); ?>

</html>
