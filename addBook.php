<?php
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 13/03/17
 * Time: 17:58
 */
require_once "files/functions.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once "controllers/bookController.php";
    $_POST=sanitize($_POST);

    if((new bookController('newBAction'))==1){
        echo "Succes";
    }else echo "Error";
}