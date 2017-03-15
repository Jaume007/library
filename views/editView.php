<?php
require_once "views/view.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 15/03/17
 * Time: 12:31
 */
class editView extends view
{
    function __construct()
    {
        $this->setTemplate("templates/edit.php");
    }
    function generate($data){
        if($data['uType'])

        extract($data);
        include_once $this->getTemplate();
    }
}