<?php
require_once "views/view.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 15/03/17
 * Time: 11:32
 */
class profileView extends view
{
    function __construct()
    {
        $this->setTemplate("templates/profile.php");
    }
    function generate($data){

        extract($data);
        include_once $this->getTemplate();
    }

}