<?php
include_once "include/load.php";

if (isset($_GET['logout']) && $_GET['logout'] == "true") {
    $user->logout();
    $user->redirect("index.php");
}
