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
    <title>Document</title>
    <link rel="stylesheet" href="../css/dashboard/rezervimet.css">
    <script src="https://kit.fontawesome.com/24184bbc2f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <div class="navbar-container">
            <?php include 'navbar.php' ?>
        </div>
        <div class="entry-container">
            <?php if (!empty($result)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Titulli</th>
                            <th>Detajet</th>
                            <th>Lloji i lajmit</th>
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
                                    Redakto
                                </td>
                                <td>
                                    Fshij
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <i class="fas fa-plus"></i>
            <?php else: ?>
                <p>Nuk ka asnje lajm.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>