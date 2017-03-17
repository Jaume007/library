<?php

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 14/03/17
 * Time: 19:12
 */
class histWidget
{
    private $element;
    public function __construct($data,$extended=0)
    {
        if ($extended==1)$ext='<p>User: '.$data['user'].'</p><br/><br/>';
        else $ext="";
        $html='<li class="collection-item avatar">
      <img src='.$data["image"].' alt="" class="circle">
      <h4> '.$data['title'].'</h4>
      '.$ext.'
      <p>Pick up date: '.$data['line1'].'<br/><br/>
         Return date: '.$data['line2'].'
         <br/><br/>
         Returned: '.$data['line3'].'<br/><br/>
      </p>
     '.$data['button'].'
     
      
    </li>';
        $this->element=$html;

    }

    public function __toString()
    {
        return $this->element;
    }
}