<?php
require_once "views/view.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 17/03/17
 * Time: 18:46
 */
class registerView extends view
{
    function __construct()
    {
        $this->setTemplate("templates/register.php");
    }
    function generate($data){

        extract($data);
        include_once $this->getTemplate();
    }
}