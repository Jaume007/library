<?php
require_once "controllers/mainController.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 13/03/17
 * Time: 21:12
 */
class bookController extends mainController
{
    function __construct($action)
    {

        parent::__construct();
        switch ($action) {
            //add new actions here
            case "indexAction":
                $this->indexAction();
                break;
            case "searchAction":
                $this->searchAction();
                break;
            default:
                new errorController(0);
        }
    }
    public function indexAction(){
        require_once "views/bookView.php";
        require_once "models/book.php";
        $data['user'] = $this->getUser();
        $data['type'] = $this->getType();
        $sql='Select isbn from books where isbn='.$_GET['id'];
        $books=new book();
        $book=$books->getBooks($sql)[0];
        $data=array_merge($data,$book);
        $page=new bookView();
        $page->generate($data);
    }
}