<!doctype html>
<?php
include "../dbconnect.php";
include "db_utils.php";

session_start();

if ($_SESSION["is_admin"] == 1) {
    $rez_utils = new DBUtils();
    $result = $rez_utils->getHotelet();
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
            <?php if (!empty($result)): ?>
                <?php foreach ($result as $Hotel):?>
                    <div class="hotel-card-container">
                        <div class="card-animation">
                            <div class="hotel-card">
                                <div class="hotel-img">
                                <img width="200px" src="<?php echo "." . $result[0]["photo_path"]; ?>" alt="Current Image">
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
                                        <button class="rezervo-btn" onclick="DisplayForm()">Rezervo</button>
                                    </div>
                                    <div class="desc">
                                        <p>
                                            <?php echo htmlspecialchars($Hotel["pershkrimi"]) ?>
                                        </p>
                                    </div>
                                    <p>Shtuar/modifikuar nga
                                        <?php echo $Hotel["p_emri"] . " " . $Hotel["p_mbiemri"] ?>
                                    </p>
                                </div>
                                <div class="icon-container"
                                    style="flex-shrink: 2; padding-top: 25px; padding-left:7px; flex-direction:column;">
                                    <a style="padding-top: 25px;"
                                        href="dboard_manage_hotel.php?id=<?php echo $Hotel['hoteli_id']; ?>">
                                        <i class="far fa-edit fa-2x"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <a href="dboard_manage_hotel.php">
                <i class="fas fa-plus fa-2x"></i></a>
        </section>
    </div>
</body>

</html>