<!DOCTYPE html>
<?php
include "../dbconnect.php";
include "db_utils.php";

session_start();

if ($_SESSION["is_admin"] == 1) {
    $rez_utils = new DBUtils();
    $result = $rez_utils->getRezervimet();
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
                            <th>Klienti</th>
                            <th>Emri i Hotelit</th>
                            <th>Data e check-in</th>
                            <th>Data e check-out</th>
                            <th>Çmimi per nate</th>
                            <th>Totali i pageses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td>
                                    <?php echo $row['Emri i klientit']; ?>
                                </td>
                                <td>
                                    <?php echo $row['emri']; ?>
                                </td>
                                <td>
                                    <?php echo $row['date_from']; ?>
                                </td>
                                <td>
                                    <?php echo $row['date_to']; ?>
                                </td>
                                <td>
                                    <?php echo $row['cmimi_per_nate']; ?>&euro;
                                </td>
                                <td>
                                    <?php echo $row['Totali i pageses']; ?>&euro;
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nuk ka asnje rezervim.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>