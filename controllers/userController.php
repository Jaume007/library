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
            case "updateAction";
                $this->updateAction();
                break;
            case "logAction";
                $this->logInOut();
                break;
            case "histAction";
                $this->histAction();
                break;
            default:
                new errorController(0);
        }
    }

    public function newAction()
    {
        require_once "models/user.php";

        $data = $_POST;
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $db = new user();
        $db->newUser($data);

        require_once "controllers/indexController.php";
        new indexController('indexAction');
    }

    public function delAction()
    {
        require_once "models/user.php";
        require_once "indexController.php";
        $user['id'] = $_GET['id'];
        $db = new user();
        $db->deleteUser($user);
        if ($_SESSION['id']==$_GET['id']) {
            session_unset();
            session_destroy();
            setcookie("PHPSESSID", "", time() - 1000);
        }
        new indexController("indexAction");

    }

    public function showAction()
    {
        require_once "controllers/errorController.php";
        $data = $this->getUserSettings();

        if ($data['type'] > ($data['member'] - 1)) {
            require_once "models/user.php";
            require_once "views/profileView.php";
            $id = $_GET['id'];
            $data = $this->getUserSettings();
            unset($data['user'], $data['id']);
            $user = new user();
            $user = $user->getUser($id);
            unset($user['type']);
            $data = array_merge($data, $user);

            $page = new profileView();
            $page->generate($data);

        } else new errorController(1);
    }

    public function editAction()
    {
        require_once "controllers/errorController.php";
        $data = $this->getUserSettings();

        if ($data['type'] > ($data['member'] - 1)) {
            require_once "models/user.php";
            require_once "views/editView.php";
            $id = $_GET['id'];

            unset($data['user'], $data['id']);
            $user = new user();
            $user = $user->getUser($id);
            $data['uType'] = $user['type'];
            unset($user['type']);
            $data = array_merge($data, $user);

            $page = new editView();
            $page->generate($data);

        } else new errorController(1);
    }

    public function updateAction()
    {
        require_once "models/user.php";

        $data = [];
        foreach ($_POST as $index => $item) {
            if ($item != "") $data[$index] = $item;
        }
        $id['id'] = $_GET['id'];
        $db = new user();
        $db->updateUser($data, $id);
        header("Location: index.php?controller=user&action=show&id=" . $id['id']);

    }

    public function logInOut()
    {
        $user = $_REQUEST['user'];

        $pwd = $_REQUEST['password'];
        if ($user == '-1' && $pwd == '-1') {

            require_once "controllers/indexController.php";
            session_start();
            session_unset();
            session_destroy();
            setcookie("PHPSESSID", "", time() - 1000);
            new indexController('indexAction');
        } else {
            require_once "models/user.php";
            $db = new user();
            $user = $db->checkPwd($user);


            if (password_verify($pwd, $user['password'])) {
                session_start();
                $_SESSION['user'] = $user['user'];
                $_SESSION['type'] = $user['type'];
                $_SESSION['id'] = $user['id'];

                echo 1;
            } else echo 3;


        }

    }

    public function histAction()
    {
        require_once "models/user.php";
        require_once "models/booking.php";
        require_once "views/userHistView.php";
        $data = $this->getUserSettings();
        $data['title'] = $data['user'];
        $data['userH'] = (new user())->getUser($_GET['id']);
        $where['user_id'] = $_GET['id'];
        $res = (new booking())->getBookings($where, "");

        $data['bookings'] = $res;
        (new userHistView())->generate($data);
    }
}