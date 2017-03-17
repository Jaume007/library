<?php
require_once "controllers/indexController.php";
require_once "controllers/userController.php";
require_once "controllers/librarianController.php";
require_once "controllers/catalogController.php";
require_once "controllers/bookController.php";
require_once "controllers/errorController.php";
require_once "controllers/adminController.php";
require_once "controllers/bookingController.php";
require_once "files/functions.php";


  //This is the only web page that receives requests.

if (!empty($_GET)){
    $aux=$_GET;
    $aux=sanitize($aux);
    $_GET=$aux;
}

if (!empty($_POST))$_POST=sanitize($_POST);

if(isset($_COOKIE['PHPSESSID'])){
    session_start();
}

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'] . "Controller";
    if(file_exists('controllers/'.$controller.'.php')) {
        if(class_exists($controller)) {
            if (isset($_GET['action'])) {
                $action = $_GET['action'] . "Action";
                new $controller($action);
            } else {
                $action = "indexAction";

                new $controller($action);
            }
        }else new errorController(0);
    }else {
        new errorController(0);

    }
}else {
    $controller="indexController";
    $action="indexAction";
    new $controller($action);
}





?>
