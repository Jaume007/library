<?php
require_once "controllers/mainController.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 13/03/17
 * Time: 8:59
 */
class userController extends mainController
{
    function __construct($action)
    {

        parent::__construct();
        switch ($action) {
            //add new actions here
            case "newAction":
                $this->newAction();
                break;
            case "delAction":
                $this->delAction();
                break;
            case "showAction";
                $this->showAction();
                break;
            case "editAction";
                $this->editAction();
                break;
            default:
                new errorController(0);
        }
    }
    public function newAction(){
        require_once "models/user.php";
        $data=$_POST;
        $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
        $db=new user();
        $db->newUser($data);
    }
    public function delAction(){
        require_once "models/user.php";
        require_once "indexController.php";
        $user['id']=$_GET['id'];
        $db=new user();
        $db->deleteUser($user);
        new indexController("indexAction");

    }
    public function showAction(){
        require_once "controllers/errorController.php";
        if($this->getType()>0) {
            require_once "models/user.php";
            require_once "views/profileView.php";
            $id = $_GET['id'];
            $data=new user();
            $data=$data->getUser($id);
            $page=new profileView();
            $page->generate($data);

        }else new errorController(1);
    }
    public function editAction(){
        require_once "controllers/errorController.php";
        if($this->getType()>0) {
            require_once "models/user.php";
            require_once "views/editView.php";
            $id = $_GET['id'];
            $data=new user();
            $data=$data->getUser($id);
            $data['uType']=$this->getType();
            $page=new editView();
            $page->generate($data);

        }else new errorController(1);
    }
}