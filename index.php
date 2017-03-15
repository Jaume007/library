<?php
require_once "controllers/indexController.php";
require_once "controllers/userController.php";
require_once "controllers/librarianController.php";
require_once "controllers/catalogController.php";
require_once "controllers/bookController.php";
require_once "controllers/errorController.php";


  //This is the only web page that receives requests.

if (!empty($_GET)){
    $aux=$_GET;
    $aux=sanitize($aux);
    $_GET=$aux;
}

if (!empty($_POST))$_POST=sanitize($_POST);
//testing to remove
session_start();
$_SESSION["user"]="test";
$_SESSION["type"]="100";
$_SESSION['id']=3;

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'] . "Controller";
    if(file_exists('controllers/'.$controller.'.php')) {
        if (isset($_GET['action'])) {
            $action = $_GET['action'] . "Action";
            new $controller($action);
        } else {
            $action = "indexAction";

            new $controller($action);
        }
    }else {
        new errorController(0);

    }
}else {
    $controller="indexController";
    $action="indexAction";
    new $controller($action);
}




function sanitize($data){
    if (!is_array($data)) {

        $data = trim(htmlentities($data, ENT_QUOTES, 'UTF-8', false));
    } else {
        //Self call function to sanitize array data
        $data = array_map('sanitize', $data);
    }
    return $data;
}
?>
