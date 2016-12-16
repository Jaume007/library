<?php

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
                $_SESSION["id"]=$item->getId();
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
    static function searchBooks($text=0,$search=0){
        $ids=array();
        if($text===0){
            self::loadBooks(50);
         }
        else {
            foreach (self::$BOOKS as $item){
                if(($search=="title" || $search=="all") && (strpos(strtolower($item->getTitle()),strtolower($text))!==false)) $ids[]=$item->getId();
                else if(($search=="author" || $search=="all") && (strpos(strtolower($item->getAuthor()),strtolower($text))!==false)) $ids[]=$item->getId();
                else if(($search=="subject" || $search=="all") && (strpos(strtolower($item->getSubject()),strtolower($text))!==false)) $ids[]=$item->getId();
            }
            if(count($ids)==0){
                echo '<h4 class="center-align">No results found</h4>';
            }else self::loadBooks(0,$ids);
        }
    }
    static function init(){
        self::$BOOKS=array(new element(1,"Foundation","book","Isaac Asimov","Sci-Fi novel. The first on the foundation series","For twelve thousand years the Galactic Empire has ruled supreme. Now it is dying. But only Hari Seldon, creator of the revolutionary science of psychohistory, can see into the future -- to a dark age of ignorance, barbarism, and warfare that will last thirty thousand years. To preserve knowledge and save mankind, Seldon gathers the best minds in the Empire -- both scientists and scholars -- and brings them to a bleak planet at the edge of the Galaxy to serve as a beacon of hope for a future generations. He calls his sanctuary the Foundation.
<p>But soon the fledgling Foundation finds itself at the mercy of corrupt warlords rising in the wake of the receding Empire. Mankind's last best hope is faced with an agonizing choice: submit to the barbarians and be overrun -- or fight them and be destroyed.</p> ",1951,"0-553-29335-4",1,1,1,"img/foundation.jpg"),
            new element(2,"Foundation and Empire","book","Isaac Asimov","Sci-Fi novel. The second on the foundation series","Led by its founding father, the great psychohistorian Hari Seldon, and taking advantage of its superior science and technology, the Foundation has survived the greed and barbarism of its neighboring warrior-planets. Yet now it must face the Empire—still the mightiest force in the Galaxy even in its death throes. When an ambitious general determined to restore the Empire’s glory turns the vast Imperial fleet toward the Foundation, the only hope for the small planet of scholars and scientists lies in the prophecies of Hari Seldon.

<p>But not even Hari Seldon could have predicted the birth of the extraordinary creature called The Mule—a mutant intelligence with a power greater than a dozen battle fleets… a power that can turn the strongest-willed human into an obedient slave.</p>",1952,"978-0553293371",1,1,1,"img/empire.jpg"),
            new element(3,"Second Foundation","book","Isaac Asimov","Sci-Fi novel. The third on the foundation series","After years of struggle, the Foundation lay in ruins--destroyed by the mutant mind power of the Mule. But it was rumored that there was a Second Foundation hidden somewhere at the end of the Galaxy, established to preserve the knowledge of mankind through the long centuries of barbarism. The Mule had failed to find it the first time--but now he was certain he knew where it lay.

<p>The fate of the Foundation rested on young Arkady Darell, only fourteen years old and burdened with a terrible secret. As its scientists girded for a final showdown with the Mule, the survivors of the First Foundation began their desperate search. They too wanted the Second Foundation destroyed...before it destroyed them.</p>",1953,"0000000000",1,1,1,"img/secondFoundation.jpg"),
            new element(4,"Foundation's Edge","book","Isaac Asimov","Sci-Fi novel. The fourth on the foundation series","At last, the costly and bitter war between the two Foundations had come to an end. The scientists of the First Foundation had proved victorious; and now they retum to Hari Seldon's long-established plan to build a new Empire that the Second Foundation is not destroyed after all-and that its still-defiant survivors are preparing their revenge. Now the two exiled citizens of the Foundation-a renegade Councilman and the doddering historian-set out in search of the mythical planet Earth. . .and proof that the Second Foundation still exists. Meanwhile someone-or something-outside of both Foundations sees to be orchestrating events to suit its own ominous purpose. Soon representatives of both the First and Second Foundations will find themselves racing toward a mysterious world called Gaia and a final shocking destiny at the very end of the universe!",1982,"0-385-17725-9",1,1,1,"img/edge.jpg"),
            new element(5,"Foundation and Earth","book","Isaac Asimov","Sci-Fi novel. The last one on the foundation series","The fifth novel in Asimov's popular Foundation series opens with second thoughts. Councilman Golan Trevize is wondering if he was right to choose a collective mind as the best possible future for humanity over the anarchy of contentious individuals, nations and planets. To test his conclusion, he decides he must know the past and goes in search of legendary Earth, all references to which have been erased from galactic libraries. The societies encountered along the way become arguing points in a book-long colloquy about man's fate, conducted by Trevize and traveling companion Bliss, who is part of the first world/mind, Gaia.",1986,"0-385-23312-4",1,1,1,"img/earth.jpg")
        );
        self::$USERS=array(new user(1,"user","1234","fulano","mengano","6666666F","696965485","mengano@gmail.com","under a bridge",1),
            new user(2,"admin","1234","fulanito","menganito","567849123f","654258745","fulanito@gmail.com","an ATM",100),
            new user(3,"librarian","1234","John","Keats","542365785f","654652359","John@gmail.com","not known",50));
    }
    public function loadBooks($max,$ids=0){
        if($max>0) {

            for ($i = 0; $i < $max; $i++) {
                if(!isset(self::$BOOKS[$i])) break;
                echo ' <div class="col s3">
                <h5 class="header">' . self::$BOOKS[$i]->getTitle() . '</h5>
                <div class="card horizontal hoverable">
                    <div class="card-image">
                        <img src="'.self::$BOOKS[$i]->getImg().'">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p>' . self::$BOOKS[$i]->getSubject() . '</p>
                        </div>
                        <div class="card-action">
                            <a href="book.php?id='.self::$BOOKS[$i]->getId().'">More</a>
                        </div>
                    </div>
                </div>
            </div>';
            }
        }
        if($max==0 && $ids!==0){
            foreach ($ids as $id){
                $book=self::findById($id);
                echo ' <div class="col s3">
                <h5 class="header">' . $book->getTitle() . '</h5>
                <div class="card horizontal hoverable">
                    <div class="card-image">
                        <img src="'.$book->getImg().'">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p>' . $book->getSubject() . '</p>
                        </div>
                        <div class="card-action">
                            <a href="book.php?id='.$book->getId().'">More</a>
                        </div>
                    </div>
                </div>
            </div>';
            }
        }

    }
    static function findById($id){
        foreach (self::$BOOKS as $book){
            if($book->getId()==$id) return $book;
        }
    }
    static function findUser($id){
        foreach (self::$USERS as $user){
            if ($user->getId()==$id) return $user;
        }
    }
}
utilities::init();
if (isset($_POST["user"]) and isset($_POST["password"])) utilities::login($_POST["user"],$_POST["password"],$_POST["page"]);
if (isset ($_GET["logout"])) utilities::logout($_GET["logout"]);

