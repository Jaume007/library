<?php
require_once "views/view.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 17/03/17
 * Time: 12:27
 */
class userHistView extends view
{
    function __construct()
    {
        $this->setTemplate("templates/bookHist.php");
    }
    public function generate($data){
        $data['title']=$data['userH']['user'];
        $data['image']=$data['userH']['photo'];
        if (is_array($data['bookings'])){
            require_once "widgets/histWidget.php";
            $cadena="";

            foreach ($data['bookings'] as $booking){
                $array1=[];
                $array1['image']=$booking['image'];
                $array1['title']=$booking['title'];
                $array1['line1']=$booking['pickDate'];
                $array1['line2']=$booking['returnDate'];

                if($booking['realReturn']===null) $array1['line3']="Not returned";
                else $array1['line3']=$booking['realReturn'];

                $array1['button']="";
                //'<a href="index.php?controller=booking&action=ret&id'.$data['isbn'].'" class="btn waves-effect grey darken-3">Return</a>';
                $cadena.=(new histWidget($array1))->__toString();
            }
            $data['bookings']=$cadena;

        }else $data['bookings']="No bookings";
        extract($data);
        include_once $this->getTemplate();
    }
}