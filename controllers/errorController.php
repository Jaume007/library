<?php
require_once "controllers/mainController.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 14/03/17
 * Time: 12:40
 */
class errorController extends mainController
{

    /**
     * errorController constructor.
     */
    public function __construct($code)
    {
        require_once "views/errorView.php";
        parent::__construct();
        new errorView($code);

    }
}