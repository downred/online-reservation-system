<!doctype html>
<?php

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $details = $_POST["details"];
    $news_type = $_POST["news_type"];

    include "../dbconnect.php";
    include "db_utils.php";

    $db_utils = new DBUtils();

    $db_utils->addArtikullin($title, $details, $news_type);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard/dboard-main.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Shto një lajm të ri</title>
</head>

<body>
    <div class="wrapper">
        <div class="navbar-container">
            <?php require_once(__DIR__ . '/navbar.php') ?>
        </div>
        <div class="content-container">
            <div class="header">
                <h1>Shto një lajm të ri</h1>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="form-container">
                    <div class="form-row">
                        <label for="title">Titulli</label>
                        <input type="text" name="title" id="title" class="input">
                    </div>
                    <div class="form-row">
                        <label for="details">Detajet</label>
                        <textarea type="text" name="details" id="details" class="input"></textarea>
                    </div>
                    <div class="form-row">
                        <label for="news_type">Lloji i lajmit</label>
                        <select id="news_type" name="news_type">
                            <option value="Titull kryesor">Titull kryesor</option>
                            <option value="Te rejat">Te rejat</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="image">Imazhi</label>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="form-row">
                        <button type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>