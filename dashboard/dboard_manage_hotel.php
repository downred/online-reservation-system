<!doctype html>
<?php
include "../dbconnect.php";
include "db_utils.php";

$db_utils = new DBUtils();

session_start();

if ($_SESSION["is_admin"] == 1) {
    if (isset($_POST["submit"])) {
        $emri = $_POST["emri"];
        $adresa = $_POST["adresa"];
        $pershkrimi = $_POST["pershkrimi"];
        $cmimi = $_POST["cmimi"];
        $rating = $_POST["rating"];
        $admin_id = $_SESSION["userid"];

        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $db_utils->updateHotel($emri, $adresa, $pershkrimi, $cmimi, $rating, $admin_id, $id);
        } else {
            $db_utils->addHoteli($emri, $adresa, $pershkrimi, $cmimi, $admin_id, $rating);
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
    <link rel="stylesheet" href="../css/rezervo.css">

    <title>Holtelet </title>
    <link rel="stylesheet" href="../css/dashboard/dboard-main.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/dashboard/dboard-news.css">
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
        <section class="content-container" style="width:auto">
            <?php if (isset($_GET["id"])): ?>
                <div class="hotel-card">
                    <div class="hotel-img">
                        <img width="200px" src="<?php echo "." . $result[0]["photo_path"]; ?>" alt="Current Image">
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

                        <div class="desc">
                            <p>
                                <?php echo htmlspecialchars($result[0]["pershkrimi"]) ?>
                            </p>
                        </div>

                        <div class="reserve">
                            <h4>
                                <?php echo htmlspecialchars($result[0]["cmimi_per_nate"]) ?>/Night
                            </h4>
                            <button class="rezervo-btn" onclick="DisplayForm()">Rezervo</button>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
                enctype="multipart/form-data">
                <div class="form-container" style="padding: 1rem; width: 80%; margin: 0 auto">
                    <div class="form-row">
                        <?php if (isset($_GET["id"])): ?>
                            <input type="hidden" name="id"
                                value="<?php echo isset($result[0]["hoteli_id"]) ? $result[0]["hoteli_id"] : ''; ?>">
                        <?php endif; ?>
                        <input placeholder="Emri" class="input"
                            value="<?php echo isset($result[0]["emri"]) ? $result[0]["emri"] : ''; ?>" type="text"
                            id="emri" name="emri" class="contact-input">
                    </div>

                    <div class="form-row">
                        <input placeholder="adresa" class="input"
                            value="<?php echo isset($result[0]["adresa"]) ? $result[0]["adresa"] : ''; ?>" type="text"
                            id="adresa" name="adresa" class="contact-input">
                    </div>

                    <div class="form-row">
                        <input placeholder="pershkrimi" class="input"
                            value="<?php echo isset($result[0]["pershkrimi"]) ? $result[0]["pershkrimi"] : ''; ?>"
                            id="pershkrimi" name="pershkrimi" class="contact-textarea">
                    </div>

                    <div class="form-row">
                        <input placeholder="cmimi" class="input"
                            value="<?php echo isset($result[0]["cmimi_per_nate"]) ? $result[0]["cmimi_per_nate"] : ''; ?>"
                            type="cmimi" id="cmimi" name="cmimi" class="contact-input">
                    </div>

                    <div class="form-row">
                        <input placeholder="rating" class="input"
                            value="<?php echo isset($result[0]["rating"]) ? $result[0]["rating"] : ''; ?>" type="rating"
                            id="rating" name="rating" class="contact-input">
                    </div>

                    <div class="form-row">
                        <input type="file" name="image" id="image">
                        <?php if (isset($result[0]["photo_path"])): ?>
                            <img width="200px" src="<?php echo "." . $result[0]["photo_path"]; ?>" alt="Current Image">
                        <?php endif; ?>
                    </div>

                    <div class="form-row"><button class="btn-light w-100" type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>
    </div>
    </section>
    </div>
</body>

</html>