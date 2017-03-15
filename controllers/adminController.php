<?php
require_once "controllers/mainController.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 15/03/17
 * Time: 21:23
 */
class adminController extends mainController
{
    function __construct($action)
    {

        parent::__construct();
        switch ($action) {
            //add new actions here
            case "indexAction":
                $this->indexAction();
                break;
            case "newBAction":
                $this->addBook();
                break;
            default:
                new errorController(0);
        }
    }
    public function indexAction(){
        require_once "controllers/errorController";
        if($this->getType()==100){

        }else new errorController(1);
    }
}