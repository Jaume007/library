<?php

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 14/03/17
 * Time: 19:12
 */
class bookListWidget
{
    private $element;
    public function __construct($data)
    {
        $html='<li class="collection-item avatar">
      <img src='.$data["image"].' alt="" class="circle">
      <h4>Title: '.$data['title'].'</h4>
      <p>Author: '.$data['author'].'<br/><br/>
         Active on catalogue: '.$data['status'].'
         <br/><br/>
         ISBN: '.$data['isbn'].'<br/><br/>
      </p>
      <a class="btn waves-effect grey darken-3" href="index.php?controller=book&action=hist&id='.$data['isbn'].'">History</a>
      <a  href="index.php?controller=book&action=delete&id='.$data['isbn'].'" class="btn waves-effect grey darken-3">Delete</a>
     
      
    </li>';
        $this->element=$html;

    }

    public function __toString()
    {
        return $this->element;
    }
}