<?php
require_once "files/functions.php";
if($_SERVER['REQUEST_METHOD']=='POST') {
    require_once "controllers/userController.php";
    $_POST = sanitize($_POST);
   new userController("logAction");

}else header("HTTTP/1.1 500 Error");