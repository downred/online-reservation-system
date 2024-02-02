<?php
include "../dbconnect.php";
include "db_utils.php";

$db_utils = new DBUtils();

if (isset($_GET["id"])) {
    $hoteli_id = $_GET["id"];

    $db_utils->deleteHotel($hoteli_id);

    header("location: dboard_hotelet_add.php");
}