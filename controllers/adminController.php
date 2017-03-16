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
            case "updateAction":
                $this->updateAction();
                break;
            default:
                new errorController(0);
        }
    }
    public function indexAction(){
        require_once "controllers/errorController.php";
        $data=$this->getUserSettings();
        if($data['type']>($data['admin']-1)){
            require_once "views/adminView.php";
            $page=new adminView();
            $page->generate($data);

        }else new errorController(1);
    }
    public function updateAction(){
        $data=$_POST;
        $array['maxItems']=$data['maxItems'];
        $array['protection']=["short"=>$data['short'],"long"=>$data['long']];
        $array['privileges']=["admin"=>$data['admin'],"librarian"=>$data['librarian'],"member"=>$data['member']];
        file_put_contents('files/settings.json',json_encode($array));
        new adminController("indexAction");
    }
}