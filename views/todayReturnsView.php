<?php

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 17/03/17
 * Time: 16:42
 */
class todayReturnsView
{
    private $html;

    /**
     * @return mixed
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param mixed $html
     */
    public function setHtml($html)
    {
        $this->html = $html;
    }
    function __construct($data)
    {
        if (is_array($data)){
            require_once "widgets/histWidget.php";
            $cadena="";

            foreach ($data as $booking){
                $array1=[];
                $array1['image']=$booking['image'];
                $array1['title']=$booking['title'];
                $array1['line1']=$booking['pickDate'];
                $array1['line2']=$booking['returnDate'];
                $array1['user']=$booking['user'];

                if($booking['realReturn']===null) $array1['line3']="Not returned";
                else $array1['line3']=$booking['realReturn'];

                $array1['button']='<a href="index.php?controller=booking&action=ret&id='.$booking['isbn'].'&idB='.$booking['id'].'" class="btn waves-effect grey darken-3">Return</a>';
                $cadena.=(new histWidget($array1,1))->__toString();
            }

            $this->setHtml($cadena);

        }else return "No bookings";
    }


}