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
        $book['description']=substr($book['description'],0,40).'...';

        $this->book=
         ' <div class="col s3" style="min-height: 230px">
                <h5 class="header">' . $book['title'] . '</h5>
                <div class="card horizontal hoverable">
                    <div class="card-image">
                        <img src="' . $book['images']['smallThumbnail'] . '">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p>' . $book['description'] . '</p>
                        </div>
                        <div class="card-action">
                            <a href="index.php?controller=book&id=' . $book['isbn'] . '">More</a>
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