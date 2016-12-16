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
    <form class="col s4" method="get" action="catalog.php">
        <div class="input-field">
            <input id="search" type="search" required name="search">
            <label for="search"><i class="material-icons">search</i> Search on the catalogue</label>
            <i class="material-icons">close</i>
            <input type="hidden" name="options" value="all">
        </div>
    </form>

    <?php include_once "login.php"; ?>

</div>
<div class="container">
    <div id="intro" style="padding-bottom: 20px">
        <h1 class="center-align">The Sci-Fi Repository</h1>
        <h5 class="center-align">Welcome to the biggest online repository of Science Fiction books, movies and comics. You can book anything online and pick it up at our Library</h5>
    </div>
    <div class="divider black"></div>
    <div id="novedades">
        <h3 class="left-align">New Arrivals</h3>
        <div class="row">
            <?php utilities::loadBooks(5); ?>
        </div>
    </div>
    <div id="popular">
        <h3 class="left-align">Most Popular</h3>
        <div class="row">
            <?php utilities::loadBooks(5); ?>
        </div>
    </div>
</div>
<? include_once "footer.php"?>
</body>

</html>