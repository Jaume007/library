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
            default:
                new errorController(0);
        }
    }
    public function newAction(){
        require_once "models/user.php";
        $data=$_POST;
        $db=new user();
        $db->newUser($data);
    }
    public function delAction(){
        require_once "models/user.php";
        $user=$_POST;
        $db=new user();
        $db->deleteUser($user);

    }
}