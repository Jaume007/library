<?php
require_once "view.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 14/03/17
 * Time: 12:43
 */
class errorView extends view
{
    private $codes=["Page Not Found","Permission Denied","Database Error" ];
    function __construct($code)
    {
        $this->setTemplate("templates/error.php");
        $error=$this->codes[$code];
        include_once $this->getTemplate();
    }
}