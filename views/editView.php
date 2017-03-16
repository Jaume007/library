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

        if($data['type']==100){
            $data['privi']='<div class="row">
                    <p>Type:</p>
                    <div class="input-field">
                        <input type="number"  name="type" id="type" value="'.$data['uType'].'">
                        <label for="type">Type: </label>
                    </div>
                </div>';
        }

        extract($data);
        include_once $this->getTemplate();
    }
}