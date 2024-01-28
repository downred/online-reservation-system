<!doctype html>
<?php
include "../dbconnect.php";
include "db_utils.php";

$db_utils = new DBUtils();

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $details = $_POST["details"];
    $news_type = $_POST["news_type"];

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $db_utils->updateArtikullin($id, $title, $details, $news_type);
    } else {
        $db_utils->addArtikullin($title, $details, $news_type);
    }
} else {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $result = $db_utils->getArtikullinByID($id);
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard/dboard-main.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>
        <?php
        if (isset($result)) {
            echo htmlspecialchars("Redakto lajmin");
        } else {
            echo htmlspecialchars("Shto një lajm të ri");
        }
        ?>
    </title>
</head>

<body>
    <div class="wrapper">
        <div class="navbar-container">
            <?php require_once(__DIR__ . '/navbar.php') ?>
        </div>
        <div class="content-container">
            <div class="header">
                <h1>
                    <?php
                    if (isset($result)) {
                        echo htmlspecialchars("Redakto lajmin");
                    } else {
                        echo htmlspecialchars("Shto një lajm të ri");
                    }
                    ?>
                </h1>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                enctype="multipart/form-data">
                <?php if (isset($_GET["id"])): ?>
                    <input type="hidden" name="id"
                        value="<?php echo isset($result[0]["te_rejat_id"]) ? $result[0]["te_rejat_id"] : ''; ?>">
                <?php endif; ?>
                <div class="form-container">
                    <div class="form-row">
                        <label for="title">Titulli</label>
                        <input type="text" name="title" id="title"
                            value="<?php echo isset($result[0]["titulli"]) ? $result[0]["titulli"] : '' ?>"
                            class="input">
                    </div>
                    <div class="form-row">
                        <label for="details">Detajet</label>
                        <textarea type="text" name="details" id="details"
                            class="input"><?php echo isset($result[0]["detajet"]) ? $result[0]["detajet"] : '' ?></textarea>
                    </div>
                    <div class="form-row">
                        <label for="news_type">Lloji i lajmit</label>
                        <select id="news_type" name="news_type">
                            <option value="Titull kryesor" <?php echo (isset($result[0]["lloji_i_lajmit"]) && $result[0]["lloji_i_lajmit"] == 'Titull kryesor') ? 'selected' : ''; ?>>Titull kryesor
                            </option>
                            <option value="Te rejat" <?php echo (isset($result[0]["lloji_i_lajmit"]) && $result[0]["lloji_i_lajmit"] == 'Te rejat') ? 'selected' : ''; ?>>Te rejat</option>
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