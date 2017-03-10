<?php

include_once "views/view.php";
/**
 *
 * Created by PhpStorm.
 * User: jaume
 * Date: 10/03/17
 * Time: 10:02
 */
class librarianView extends view
{

    function __construct()
    {
        $this->setTemplate("templates/librarian.php");
    }
    public function generate($data){
        extract($data);
        include_once $this->getTemplate();
    }
}