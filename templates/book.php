<?php
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once "templates/head.php"; ?>
</head>

<body>
<?php
include_once "templates/utilities.php";
$thisPage = "book";
?>
<?php include_once "templates/header.php"; ?>
<div class="row">
    <?php include_once "templates/login.php"; ?>
</div>
<div class="container">
    <?php $book=utilities::findById($_GET['id']);?>
    <div class="center">
        <h2><?php echo $book->getTitle()?></h2>
    </div>
    <div class="divider black"></div>
    <div class="row">
        <div class="col s4">
            <figure>
            <img src="<?php echo $book->getImg()?>" style="max-height: 500px;max-width:350px">
                <figcaption class="center-align">Cover</figcaption>
            </figure>
            <div class="center">
           <a href="lending.php?id=<?php echo $book->getId()?>" class="btn waves-effect grey darken-4">Book</a>
            </div>
        </div>
        <div class="col s8 flow-text">

            <p><strong>Author: </strong><?php echo $book->getAuthor()?></p>
            <p><strong>Year: </strong><?php echo $book->getYear()?></p>
            <p><strong>ISBN: </strong><?php echo $book->getISBN()?></p>
            <p><strong>Summary: </strong><?php echo $book->getSummary()?></p>



        </div>
    </div>
</div>
<?php include_once "templates/footer.php" ?>
</body>
</html>
