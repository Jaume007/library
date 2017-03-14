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
    public function getBooks($query=""){
        include("libs/httpful.phar");

        if($query=="")$sql='select isbn from books where active=1';
        else $sql=$query;

        $isbn=$this->get_results($sql);

        $books=[];

        foreach ($isbn as $book){
            $uri="https://www.googleapis.com/books/v1/volumes?q=isbn:".$book['isbn'];
            $fullbook = \Httpful\Request::get($uri)->send();
            $fullbook=json_decode($fullbook,true);

            $fullbook=$fullbook['items'][0]['volumeInfo'];
            $books[]=array('title'=>$fullbook['title'],'author'=>$fullbook['authors'][0],
                'description'=>$fullbook['description'],'isbn'=>$book['isbn'],'published'=>$fullbook['publishedDate'],
                'image'=>$fullbook['imageLinks']['thumbnail'],'category'=>$fullbook['categories'][0]);

        }
        return $books;
    }
}