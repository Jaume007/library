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
$thisPage = "index";
?>
<? include_once "header.php"; ?>
<div class="row">
    <form class="col s4" method="POST" action="catalogue.php">
        <div class="input-field">
            <input id="search" type="search" required>
            <label for="search"><i class="material-icons">search</i> Search on the catalogue</label>
            <i class="material-icons">close</i>
        </div>
    </form>

    <?php include_once "login.php"; ?>

</div>
<div class="container">
    <div id="intro" style="padding-bottom: 20px">
        <h1 class="center-align">No se quin nom Library</h1>
        <h5 class="center-align">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt
            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
            dolore eu
            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit
            anim id est laborum."</h5>
    </div>
    <div class="divider black"></div>
    <div id="novedades">
        <h3 class="left-align">New Arrivals</h3>
        <div class="row">
            <?php utilities::loadBooks(3); ?>
        </div>
    </div>
    <div id="popular">
        <h3 class="left-align">Most Popular</h3>
        <div class="row">
            <?php utilities::loadBooks(3); ?>
        </div>
    </div>
</div>
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