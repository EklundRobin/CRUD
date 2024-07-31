<?php

session_start();

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "crud";

try {
    $con = new PDO("mysql:host=$DB_host;dbname=$DB_name;charset=utf8", $DB_user, $DB_pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}
include_once("class.user.php");
$user = new USER($con);
