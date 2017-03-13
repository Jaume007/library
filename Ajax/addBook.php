<?php
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 13/03/17
 * Time: 17:58
 */
var_dump( $_POST);
exit();
if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once "controllers/librarianController.php";
    //filter post

    if((new librarianController())->addBook($_POST)){
        echo "Succes";
    }else echo "Error";
}