<!DOCTYPE html>
<?php
include "../dbconnect.php";
include "rezervimet_db_utils.php";

$rez_utils = new RezervimetDBUtils();

$result = $rez_utils->getRezervimet();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
    <style>
        @import 'main.css';

        .wrapper {
            display: flex;
            height: 100%;
        }

        .entry-container {
            width: 100%;
            height: min-content;
            display: flex;
            margin: 1rem 0 0 250px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        table {
            width: 80%;
            margin: 1rem 0 2rem 0;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: var(--color-light-lighter);
        }
    </style>
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
                <p>No reservations found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>