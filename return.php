<?php
require_once "files/functions.php";
if($_SERVER['REQUEST_METHOD']=='POST') {
require_once "controllers/bookingController.php";
    $_POST = sanitize($_POST);
    $date=new bookingController("getReturnAction");
    $date= $date->getReturnDate();
    echo $date->format("F j, Y");
}