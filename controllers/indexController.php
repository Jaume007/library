<?php
include_once "controllers/mainController.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 10/03/17
 * Time: 9:19
 */
class indexController extends mainController
{
    function __construct($action)
    {

        parent::__construct();
        switch ($action){
            //add new actions here
            case "indexAction": $this->indexAction();
                break;
            default: new errorController(0);
        }
    }
    function indexAction(){
        include_once "views/mainView.php";
        $data['newbooks']="TODO";
        $data['popular']="TODO";
        $data['user']=$this->getUser();
        $data['type']=$this->getType();
        $page=new mainView();
        $page->generate($data);
    }
}