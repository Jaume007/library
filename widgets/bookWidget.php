<?php

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 13/03/17
 * Time: 11:01
 */
class bookWidget
{
    private $book;
    function __construct($book)
    {
       // $book['description']=substr($book['description'],0,40).'...';

        $this->book=
         ' <div class="col s12" style="min-height: 300px">
                <h5 class="header">' . $book['title'] . '</h5>
                <div class="card horizontal hoverable grey lighten-4">
                    <div class="card-image">
                        <img src="' . $book['image'] . '">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p>' . $book['description'] . '</p>
                        </div>
                        <div class="card-action">
                            <a href="index.php?controller=booking&id=' . $book['isbn'] . '"><span class="blue-text text-darken-2">More</span></a>
                        </div>
                    </div>
                </div>
            </div>';
    }
    public function __toString()
    {
        return $this->book;
    }
}