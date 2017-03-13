<?php
include_once "controllers/mainController.php";

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 10/03/17
 * Time: 19:54
 */
class librarianController extends mainController
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

    function indexAction()
    {
        include_once "views/librarianView.php";
        $data['user'] = $this->getUser();
        $data['type'] = $this->getType();
        $page = new librarianView();
        $page->generate($data);

    }

    function addBook()
    {
        include_once "models/book.php";
        $data['isbn']=$_POST['isbn'];
        $data['conservation']=$_POST['conservation'];
        $data['protection']=$_POST['protection'];
        $data['active']=isset($_POST['status'])?1:0;
        $db=new book();
        return $db->addBook($data);

    }
}