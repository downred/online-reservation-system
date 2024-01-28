<?php
include "../dbconnect.php";
include "db_utils.php";

$db_utils = new DBUtils();

if (isset($_GET["id"])) {
    $mesazhi_ID = $_GET["id"];

    $db_utils->deleteMesazhin($mesazhi_ID);

    header("location: dboard_mesazhet.php");
}

