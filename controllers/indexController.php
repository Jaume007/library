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
        include_once "models/book.php";
        $data=$this->getUserSettings();
        $data['newbooks']="TODO";
        $data['popular']="TODO";
        $limit=" ORDER BY id DESC limit 5";
        $where['active']=1;
        $newest=new book();
        $data['newest']=$newest->getBooks($where,$limit);
        $page=new mainView();
        $page->generate($data);
    }
}