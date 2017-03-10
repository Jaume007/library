<?php

include_once "view.php";
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
        extract($data);
        include_once $this->getTemplate();
    }
}