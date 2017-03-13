<?php
include_once "views/view.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 13/03/17
 * Time: 11:09
 */
class catalogView extends view
{
    function __construct()
    {
        $this->setTemplate("templates/catalog.php");
    }
    public function generate($data){
        require_once "widgets/bookWidget.php";
        if(!empty($data['results'])){
            $books="";
            foreach ($data['results'] as $book){
                $books.=new bookWidget($book);
            }
            $data['results']=$books;
        }else $data['results']='<h4 class="center-align">No results found</h4>';
        extract($data);
        include_once $this->getTemplate();
    }
}