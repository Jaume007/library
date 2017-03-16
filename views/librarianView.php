<?php

include_once "views/view.php";

/**
 *
 * Created by PhpStorm.
 * User: jaume
 * Date: 10/03/17
 * Time: 10:02
 */
class librarianView extends view
{

    function __construct()
    {
        $this->setTemplate("templates/librarian.php");
    }

    public function generate($data)
    {
        require_once "widgets/userWidget.php";
        require_once "widgets/bookListWidget.php";
        $books="";
        $users = "";
        foreach ($data['users'] as $user) {
            $users .= new userWidget($user);
        }
        $data['users'] = $users;
        foreach ($data['books'] as $book){
            $books.=new bookListWidget($book);
        }
        $data['books']=$books;

        extract($data);
        include_once $this->getTemplate();
    }
}