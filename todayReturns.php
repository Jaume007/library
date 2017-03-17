<?php
require_once "files/functions.php";
if($_SERVER['REQUEST_METHOD']=='POST') {
    require_once "controllers/bookingController.php";
    $_POST = sanitize($_POST);
    $date=new bookingController("todayAction");
    $html= $date->getHtml();
    echo $html;
}