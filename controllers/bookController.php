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
            case "newBAction":
                $this->addBook();
                break;
            case "updateAction":
                $this->updateAction();
                break;
            case "histAction":
                $this->histAction();
                break;
            default:
                new errorController(0);
        }
    }

    public function indexAction()
    {
        require_once "views/bookView.php";
        require_once "models/book.php";
        $data = $this->getUserSettings();
        $where['isbn']= $_GET['id'];
        $books = new book();
        $book = $books->getBooks($where)[0];
        $data = array_merge($data, $book);
        $page = new bookView();
        $page->generate($data);
    }

    function addBook()
    {
        include_once "models/book.php";
        $data['isbn'] = $_POST['isbn'];
        $data['conservation'] = $_POST['conservation'];
        $data['protection'] = $_POST['protection'];
        $data['active'] = isset($_POST['status']) ? 1 : 0;
        $db = new book();
        return $db->addBook($data);

    }

    function updateAction()
    {
        require_once "controllers/librarianController.php";
        require_once "models/book.php";
        $status['active'] = $_GET['status']=="YES"?0:1;
        $id['isbn']=$_GET['id'];
        $db=new book();
        $db->update('books',$status,$id);
        new librarianController("indexAction");

    }
    public function histAction(){
        require_once "models/book.php";
        require_once "models/booking.php";
        require_once "views/bookHistView.php";
        $where['isbn']= $_GET['id'];

        $books = new book();
        $book = $books->getBooks($where)[0];
        $data=$this->getUserSettings();
        $data=array_merge($data,$book);
        $bookid['book_id']=(new book())->getId($_GET['id']);

        $res=(new booking())->getBookings($bookid,"user");
        $data['bookings']=$res;
        (new bookHistView())->generate($data);

    }

}