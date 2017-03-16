<?php

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 14/03/17
 * Time: 13:13
 */
class userWidget
{
    private $element;
    public function __construct($data)
    {
        $html='<li class="collection-item avatar">
      <img src='.$data["photo"].' alt="" class="circle">
      <h4>Username: '.$data['user'].'</h4>
      <p>Email: '.$data['email'].'<br/><br/>
         Type: '.$data['type'].'
         <br/><br/>
      </p>
      <a class="btn waves-effect grey darken-3" href="index.php?controller=user&action=hist&id='.$data['id'].'">History</a>
      <a  href="index.php?controller=user&action=edit&id='.$data['id'].'" class="btn waves-effect grey darken-3">Edit/Delete</a>
     
      
    </li>';
        $this->element=$html;

    }

    public function __toString()
    {
        return $this->element;
    }

}