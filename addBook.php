<?php
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 13/03/17
 * Time: 17:58
 */
require_once "files/functions.php";
include_once("libs/httpful.phar");
if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once "controllers/bookController.php";
    $_POST=sanitize($_POST);
    $uri="https://www.googleapis.com/books/v1/volumes?q=isbn:".$_POST['isbn'];
    $fullbook = \Httpful\Request::get($uri)->send();
    $fullbook=json_decode($fullbook,true);
    if($fullbook['totalItems']>0) {
        if ((new bookController('newBAction')) == 1) {
            echo "Succes";
        } else echo "Error";
    } echo "Invalid Book";
}