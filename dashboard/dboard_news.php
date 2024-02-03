<!DOCTYPE html>
<?php
include "../dbconnect.php";
include "db_utils.php";

session_start();

if ($_SESSION["is_admin"] == 1) {
    $rez_utils = new DBUtils();
    $result = $rez_utils->getTeRejat();
} else {
    header("location: ../index.php");
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Të rejat</title>
    <link rel="stylesheet" href="../css/dashboard/dboard-main.css">
    <script src="https://kit.fontawesome.com/24184bbc2f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <div class="navbar-container">
            <?php require_once(__DIR__ . '/navbar.php') ?>
        </div>
        <div class="content-container">
            <?php if (!empty($result)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Titulli</th>
                            <th>Detajet</th>
                            <th>Lloji i lajmit</th>
                            <th>Shtuar/Modifikuar nga</th>
                            <th>Redakto</th>
                            <th>Fshij</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td>
                                    <?php echo $row['titulli']; ?>
                                </td>
                                <td>
                                    <?php echo $row['detajet']; ?>
                                </td>
                                <td>
                                    <?php echo $row['lloji_i_lajmit']; ?>
                                </td>
                                <td>
                                    <?php echo $row['emri'] . " " . $row['mbiemri']; ?>
                                </td>
                                <td>
                                    <div class="icon-container">
                                        <a href="dboard_manage_news.php?id=<?php echo $row['te_rejat_id']; ?>"><i
                                                class="far fa-edit fa-2x"></i></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="icon-container">
                                        <a href="dboard_delete_news.php?id=<?php echo $row['te_rejat_id']; ?>">
                                            <i class="fas fa-trash-alt fa-2x"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="dboard_manage_news.php"><i class="fas fa-plus fa-2x"></i></a>
            <?php else: ?>
                <p>Nuk ka asnje lajm.</p>
                <a href="dboard_manage_news.php"><i class="fas fa-plus fa-2x"></i></a>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>