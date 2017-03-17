<?php
require_once "views/view.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 17/03/17
 * Time: 11:00
 */
class bookHistView extends view
{
    function __construct()
    {
        $this->setTemplate("templates/bookHist.php");
    }
    public function generate($data){
        if (is_array($data['bookings'])){
            require_once "widgets/histWidget.php";
            $cadena="";
            var_dump($data['bookings']);
            foreach ($data['bookings'] as $booking){
                $array1=[];
                $array1['image']=$booking['photo'];
                $array1['title']=$booking['user'];
                $array1['line1']=$booking['pickDate'];
                $array1['line2']=$booking['returnDate'];
                var_dump($booking['realReturn']);
                if($booking['realReturn']===null) $array1['line3']="Not returned";
                else $array1['line3']=$booking['realReturn'];

                $array['button']="";
                    //'<a href="index.php?controller=booking&action=ret&id'.$data['isbn'].'" class="btn waves-effect grey darken-3">Return</a>';
                $cadena.=(new histWidget($array1))->__toString();
            }
            $data['bookings']=$cadena;

        }else $data['bookings']="No bookings";
        extract($data);
        include_once $this->getTemplate();
    }
}