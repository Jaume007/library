<?php
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 13/03/17
 * Time: 17:58
 */

if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once "controllers/bookController.php";
    //filter post

    if((new bookController('newBAction'))==1){
        echo "Succes";
    }else echo "Error";
}