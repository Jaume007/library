<?php
include_once "models/db.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 10/03/17
 * Time: 21:20
 */
class book extends db
{
    function __construct()
    {
        parent::__construct();
    }
    public function addBook($data){
        $data=$this->escape($data);
        return $this->insert("books",$data);
    }
}