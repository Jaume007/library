<?php

include_once "views/view.php";
/**
 *
 * Created by PhpStorm.
 * User: jaume
 * Date: 10/03/17
 * Time: 10:02
 */
class mainView extends view
{

    function __construct()
    {
        $this->setTemplate("templates/index1.php");
    }
    public function generate($data){
        require_once "widgets/bookWidget.php";
        $books="";
        foreach ($data['newest'] as $book){
            $books.=new bookWidget($book);
        }
        $data['newest']=$books;
        extract($data);
        include_once $this->getTemplate();
    }
}