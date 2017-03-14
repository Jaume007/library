<?php
require_once "views/view.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 14/03/17
 * Time: 9:49
 */
class bookView extends view
{
    function __construct()
    {
        $this->setTemplate("templates/book.php");
    }
    public function generate($book){
        extract($book);
        include_once $this->getTemplate();
    }
}