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
    private $codes=["Page Not Found","Permission Denied","Database Error"];
    private $headers=["HTTP/1.1 404","HTTP/1.1 403","HTTP/1.1 500 Database Error"];
    function __construct($code)
    {
        $this->setTemplate("templates/error.php");
        $error=$this->codes[$code];
        header($this->headers[$code]);
        include_once $this->getTemplate();
    }
}