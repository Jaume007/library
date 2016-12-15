<?php
session_start();
/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 13/12/16
 * Time: 20:22
 */

include_once "element.php";
include_once "user.php";
abstract class utilities
{

    static $BOOKS;
    static $USERS;

    static function login($user,$password,$page){
        foreach (self::$USERS as $item){
            if ($item->getUser()===$user and $item->getPassword()===$password){
              session_start();
                $_SESSION["user"]=$item->getUser();
                $_SESSION["type"]=$item->getType();
                echo '<script>window.location.replace("'.$page.'.php");</script>';

            }
        }
        echo '<script>window.location.replace("failed.html");</script>';

    }
    static function logout($logout){
        if($logout) {
            session_unset();
            session_destroy();
            setcookie("PHPSESSID", "", time() - 1000);
           echo '<script>window.location.replace("index.php");</script>';
        }

    }
    static function init(){
        self::$BOOKS=array(new element(1,"Foundation","book","Isaac Asimov","Sci-Fi Novel, one of the clasics on scifi",1951,"0-553-29335-4",1,1,1),
            new element(2,"Foundation and Empire","book","Isaac Asimov","Sci-Fi Novel, one of the clasics on scifi",1952,"978-0553293371",1,1,1),
            new element(3,"Second Foundation","book","Isaac Asimov","Sci-Fi Novel, one of the clasics on scifi",1953,"0000000000",1,1,1),
            new element(4,"Foundation's Edge","book","Isaac Asimov","Sci-Fi Novel, one of the clasics on scifi",1982,"0-385-17725-9",1,1,1),
            new element(5,"Foundation and Earth","book","Isaac Asimov","Sci-Fi Novel, one of the clasics on scifi",1986,"0-385-23312-4",1,1,1)
        );
        self::$USERS=array(new user(1,"user","1234","fulano","mengano","6666666F","696965485","mengano@gmail.com","under a bridge",1),
            new user(2,"admin","1234","fulanito","menganito","567849123f","654258745","fulanito@gmail.com","an ATM",100),
            new user(3,"librarian","1234","John","Keats","542365785f","654652359","John@gmail.com","not known",50));
    }
    public function loadBooks($max,$ids=0){
        if($max>0) {

            for ($i = 0; $i < $max; $i++) {
                echo ' <div class="col s4">
                <h5 class="header">' . self::$BOOKS[$i]->getTitle() . '</h5>
                <div class="card horizontal hoverable">
                    <div class="card-image">
                        <img src="http://lorempixel.com/100/190/nature/6">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p>' . self::$BOOKS[$i]->getSubject() . '</p>
                        </div>
                        <div class="card-action">
                            <a href="#">This is a link</a>
                        </div>
                    </div>
                </div>
            </div>';
            }
        }

    }
}
utilities::init();
if (isset($_POST["user"]) and isset($_POST["password"])) utilities::login($_POST["user"],$_POST["password"],$_POST["page"]);
if (isset ($_GET["logout"])) utilities::logout($_GET["logout"]);

