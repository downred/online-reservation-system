<?php
include "../dbconnect.php";
include "db_utils.php";

$db_utils = new DBUtils();

if (isset($_GET["id"])) {
    $article_id = $_GET["id"];

    $db_utils->deleteArtikullin($article_id);

    header("location: dboard_news.php");
}