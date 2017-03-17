<?php
require_once "views/view.php";
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 16/03/17
 * Time: 17:00
 */
class bookingView extends view
{
    function __construct()
    {
        $this->setTemplate("templates/lending.php");
    }
    public function generate($data){
        if (is_array($data['blocked'])){
            $blockedDates="";

            foreach ($data['blocked'] as $interval){
                $from=explode('-',$interval['pickDate']);
                $to=explode('-',$interval['returnDate']);
                $from[1]=$from[1]-1;
                $to[1]=$to[1]-1;

                $blockedDates.="{from: [".$from[0].",".$from[1].",".$from[2]."], to: [".$to[0].",".$to[1].",".$to[2]."] },";
            }
            $blockedDates=substr($blockedDates,0,-1);
            $data['blocked']=$blockedDates;
        }
        extract($data);
        include_once $this->getTemplate();
    }
}