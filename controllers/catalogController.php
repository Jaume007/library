<?php
require_once "controllers/mainController.php";

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 13/03/17
 * Time: 10:57
 */
class catalogController extends mainController
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

    public function indexAction()
    {

        require_once "models/book.php";
        require_once "views/catalogView.php";
        $data['user'] = $this->getUser();
        $data['type'] = $this->getType();
        $data['id']=$this->getId();
        $books = new book();
        $books = $books->getBooks();
        $data['results'] = $books;
        $view = new catalogView();
        $view->generate($data);


    }

    public function searchAction()
    {
        require_once "models/book.php";
        require_once "views/catalogView.php";
        $data['user'] = $this->getUser();
        $data['type'] = $this->getType();
        $data['id']=$this->getId();
        $books = new book();
        $books = $books->getBooks();
        $options = $_POST['options'];
        $text = $_POST['search'];
        $matches = [];
        foreach ($books as $book) {
            if (($options == "title" || $options == "all") && (strpos(strtolower($book['title']), strtolower($text)) !== false)) $matches[] = $book;
            else if (($options == "author" || $options == "all") && (strpos(strtolower($book['author']), strtolower($text)) !== false)) $matches[] = $book;
            else if (($options == "category" || $options == "all") && (strpos(strtolower($book['category']), strtolower($text)) !== false)) $matches[] = $book;
        }
        $data['results'] = $matches;
        $view = new catalogView();
        $view->generate($data);

    }
}