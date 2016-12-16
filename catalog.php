<?php
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once "head.php"; ?>
</head>

<body>
<?php
include_once "utilities.php";
$thisPage = "catalog";
?>
<? include_once "header.php"; ?>
<div class="row">
    <?php include_once "login.php"; ?>
</div>
<div class="container">
    <div id="intro" style="padding-bottom: 20px">
        <h1 class="center-align">Catalog</h1>
        <h5 class="center-align">"Find anything in our library using our powerful search engine"</h5>
    </div>
    <div class="row col s10">
        <form class="col s10 offset-s1" action="catalog.php" method="get">
            <div class="input-field col s10 offset-s1">
                <input id="search" type="search" required name="search">
                <label for="search"><i class="material-icons">search</i> Search on the catalogue</label>
                <i class="material-icons">close</i>
            </div>
            <div class="col s10 offset-s1">
                <p>Search options:</p>
            </div>
            <div class="col s10 offset-s1">
                <div class="col s2">
                    <p>
                        <input name="options" class="with-gap" type="radio" id="all" value="all" checked/>
                        <label for="all">All</label>
                    </p>
                </div>
                <div class="col s2">
                    <p>
                        <input name="options" class="with-gap" type="radio" id="title" value="title"/>
                        <label for="title">Title</label>
                    </p>
                </div>
                <div class="col s2">
                    <p>
                        <input name="options" class="with-gap" type="radio" id="author" value="author"/>
                        <label for="author">Author</label>
                    </p>
                </div>
                <div class="col s2">
                    <p>
                        <input name="options" class="with-gap" type="radio" id="subject" value="subject"/>
                        <label for="subject">Subject</label>
                    </p>
                </div>
                <div class="col s3 offset-s1">
                    <button class="btn waves-effect grey darken-4" type="submit" name="action">Search
                        <i class="material-icons right">search</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="divider black"></div>
    <div class="row col s12">
        <h4>Results: </h4>
        <?php
        if(isset($_GET['search'])) {
            utilities::searchBooks($_GET['search'], $_GET['options']);
        }else utilities::searchBooks();
        ?>
    </div>
</div>
</body>
<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer
                    content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js1.js"></script>
</body>
</html>
