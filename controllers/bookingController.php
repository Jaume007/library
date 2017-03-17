<?php
require_once "controllers/mainController.php";

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 16/03/17
 * Time: 16:55
 */
class bookingController extends mainController
{
    private $returnDate;
    private $html;

    /**
     * @return mixed
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param mixed $html
     */
    public function setHtml($html)
    {
        $this->html = $html;
    }

    /**
     * @return DateTime
     */
    public function getReturnDate()
    {
        return $this->returnDate;
    }

    /**
     * @param mixed $returnDate
     */
    public function setReturnDate($returnDate)
    {
        $this->returnDate = $returnDate;
    }


    function __construct($action)
    {

        parent::__construct();
        switch ($action) {
            //add new actions here
            case "indexAction":
                $this->indexAction();
                break;
            case "getReturnAction":
                $this->getReturn();
                break;
            case "bookAction":
                $this->bookAction();
                break;
            case "todayAction":
                $this->todayAction();
                break;
            case "retAction":
                $this->retAction();
                break;
            default:
                new errorController(0);
        }
    }

    public function indexAction()
    {
        require_once "models/book.php";
        require_once "models/booking.php";
        require_once "views/bookingView.php";
        $data = $this->getUserSettings();
        $book = new book();
        $id['isbn'] = $_GET['id'];
        $book = $book->getBooks($id);
        $blocked = new booking();
        $blocked = $blocked->getBlocked($id['isbn']);
        $data['blocked'] = $blocked;
        $data = array_merge($data, $book[0]);
        $page = new bookingView();
        $page->generate($data);

    }

    public function getReturn()
    {
        require_once "models/book.php";
        require_once "models/booking.php";
        $settings = $this->getUserSettings();
        $days = new book();
        $days = $days->getProtection($_REQUEST['isbn']);
        $days = $days == 0 ? $settings['short'] : $settings['long'];

        $pickDate = new DateTime($_POST['pickDate']);

        //$pickDate=$pickDate->format('Y-m-d H:i:s');
        $outDate = clone($pickDate);

        $outDate = $outDate->add(new DateInterval('P' . $days . 'D'));


        $realOut = new booking();
        $in = $pickDate->format('Y-m-d');
        $out = $outDate->format('Y-m-d');

        $realOut = $realOut->getSafeReturn($in, $out, $_REQUEST['isbn']);

        if ($realOut != null) {
        }
        $realOut = new DateTime($realOut);
        $realOut = $realOut->sub(new DateInterval('P1D'));
        if ($realOut < $outDate && $realOut > $pickDate) $outDate = $realOut;
        $this->returnDate = $outDate;


    }

    public function bookAction()
    {
        require_once "models/booking.php";
        $this->getReturn();
        $returnDate = $this->getReturnDate();
        $isbn = $_REQUEST['isbn'];
        $data = $this->getUserSettings();

        $pickDate = new DateTime($_POST['pickDate']);
        $in = $pickDate->format('Y-m-d');
        $out = $returnDate->format('Y-m-d');
        $booking = new booking();
        $checkDate = $booking->checkDate($in, $out, $isbn);
        $checkBookings = $booking->checkBookings($data['id']);
        if ($checkBookings > $data['maxItems'] | $checkDate > 0) {
            echo $checkBookings;
            echo $checkDate;
            exit();
            require_once "controllers/errorController.php";
            new errorController(3, "Invalid date or too many bookings");
        } else {
            require_once "controllers/userController.php";
            $booking->saveBooking($in, $out, $isbn, $data['id']);
            header("Location: index.php?controller=user&action=hist&id=".$data['id']);
            //new userController("showAction");
        }


    }

    public function todayAction()
    {
        $date = new DateTime($_POST['pickDate']);
        require_once "models/booking.php";
        $cond = " where returnDate<='" . $date->format('Y-m-d') . "' and realReturn is null";
        $res = new booking();
        $res = $res->getBookings("", "all", $cond);
        require_once "views/todayReturnsView.php";
        $res = (new todayReturnsView($res))->getHtml();


        $this->setHtml($res);

    }

    public function retAction()
    {
        $bookingID = $_GET['idB'];
        $book = $_GET['id'];
        $date = new DateTime('now');
        $vars = [];
        $where['id'] = $bookingID;
        $vars['realReturn'] = $date->format('Y-m-d');
        require_once "models/booking.php";
        require_once "controllers/bookController.php";
        (new booking())->update('bookings', $vars, $where);
        header("Location: index.php?controller=book&action=hist&id=" . $book);

    }
}