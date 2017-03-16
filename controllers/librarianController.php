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

            default:
                new errorController(0);
        }
    }

    function indexAction()
    {
        require_once "controllers/errorController.php";
        $data=$this->getUserSettings();
        if($data['type']>($data['librarian']-1)) {
            require_once "models/book.php";
            include_once "views/librarianView.php";
            require_once "models/user.php";


            $books = new book();
            $books = $books->getBooks();
            $data['books']=$books;

            $users=new user();
            $users=$users->listUsers($data['type']);
            $data['users']=$users;
            $page = new librarianView();
            $page->generate($data);
        }else new errorController(1);

    }


}