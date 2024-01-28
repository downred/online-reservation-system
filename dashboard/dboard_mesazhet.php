<!DOCTYPE html>
<?php
include "../dbconnect.php";
include "db_utils.php";

session_start();

if ($_SESSION["is_admin"] == 1) {
    $rez_utils = new DBUtils();
    $result = $rez_utils->getMesazhet();
} else {
    header("location: ../index.php");
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Mesazhet</title>
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
                            <th>Emri</th>
                            <th>Mbiemri</th>
                            <th>Email</th>
                            <th>mesazhi</th>
                            <th>Fshij</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td>
                                    <?php echo $row['emri']; ?>
                                </td>
                                <td>
                                    <?php echo $row['mbiemri']; ?>
                                </td>
                                <td>
                                    <?php echo $row['email']; ?>
                                </td>
                                <td>
                                    <?php echo $row['mesazhi']; ?>
                                </td>
                                <td>
                                    <div class="icon-container">
                                        <a href="dboard_delete_messages.php?id=<?php echo $row['mesazhi_ID']; ?>">
                                        <i class="fas fa-trash-alt fa-2x"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nuk ka asnje mesazh.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>