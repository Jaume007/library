<?php
require_once "views/view.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 16/03/17
 * Time: 10:52
 */
class adminView extends view
{
    function __construct()
    {
        $this->setTemplate("templates/admin.php");
    }
    public function generate($data){
        extract($data);
        include_once $this->getTemplate();
    }
}