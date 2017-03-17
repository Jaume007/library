<?php
require_once "models/db.php";

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 17/03/17
 * Time: 0:41
 */
class booking extends db
{
    function __construct()
    {
        parent::__construct();
    }

    public function getSafeReturn($in, $out, $isbn)
    {
        $in = $this->escape($in);
        $out = $this->escape($out);
        require_once "models/book.php";
        $id = new book();
        $id = $id->getId($isbn);

        $sql = "select pickDate from bookings where pickDate<'" . $out . "'  and pickDate>'" . $in . "' and book_id=" . $id . " and realReturn is NULL  order by pickDate ASC limit 1";
        $return = $this->get_results($sql)[0]['pickDate'];
        return $return;
    }

    public function getBlocked($isbn)
    {
        $isbn = $this->escape($isbn);
        $id = "select id from books where isbn=" . $isbn;
        $id = $this->get_results($id)[0]['id'];
        $sql = "select pickDate, returnDate from bookings where book_id=" . $id . " and realReturn is null";
        return $this->get_results($sql);
    }

    public function checkDate($in, $out, $isbn)
    {
        require_once "models/book.php";
        $id = new book();
        $id = $id->getId($isbn);
        $sql = "select COUNT(*) as res from bookings where realReturn is NULL and book_id=" . $id . " and (pickDate>='" . $in . "' and pickDate<='" . $out . "') or (returnDate>='" . $in . "' and returnDate<='" . $out . "')";

        $res = $this->get_results($sql)[0]['res'];
        return $res;
    }

    public function checkBookings($id)
    {
        $sql = "select count(*) as res from bookings where user_id=" . $id . " and realReturn is NULL";
        $res = $this->get_results($sql)[0]['res'];
        return $res;
    }

    public function saveBooking($in, $out, $isbn, $id)
    {
        require_once "models/book.php";
        $idB = new book();
        $idB = $idB->getId($isbn);
        $vars['pickDate'] = $in;
        $vars['returnDate'] = $out;
        $vars['book_id'] = $idB;
        $vars['user_id'] = $id;
        $vars = $this->escape($vars);
        $this->insert('bookings', $vars);
    }

    public function getBookings($where,$type)
    {


        $sql = "select * from bookings";
        if (!empty($where)) {
            foreach ($where as $field => $value) {
                $clause[] = "$field = '$value'";
            }
            $sql .= ' WHERE ' . implode(' AND ', $clause);
        }
        echo $sql;
        $res=$this->get_results($sql);


        if ($type=="user") {
            if (is_array($res[0])) {
                foreach ($res as &$record) {
                    require_once "models/user.php";
                    $user = (new user())->getUser($record['user_id']);
                    $record = array_merge($record, $user);
                }
                return $res;
            } else return "0";
        }else{
            //change for books
            if (is_array($res[0])) {
                foreach ($res as &$record) {
                    require_once "models/user.php";
                    $user = (new user())->getUser($record['user_id']);
                    $record = array_merge($record, $user);
                }
                return $res;
            } else return "0";
        }

    }

}