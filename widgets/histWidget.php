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
    public function __construct($data)
    {
        $html='<li class="collection-item avatar">
      <img src='.$data["image"].' alt="" class="circle">
      <h4> '.$data['title'].'</h4>
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