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
$thisPage = "book";
?>
<? include_once "header.php"; ?>
<div class="row">
    <?php include_once "login.php"; ?>
</div>
<div class="container">
    <?php $user=utilities::findById($_GET['id']);?>
    <div class="center">
        <h2><?php echo $user->getTitle()?></h2>
    </div>
    <div class="divider black"></div>
    <div class="row">
        <div class="col s4">
            <figure>
            <img src="<?php echo $user->getImg()?>" style="max-height: 500px;max-width:350px">
                <figcaption class="center-align">Cover</figcaption>
            </figure>
        </div>
        <div class="col s8 flow-text">

            <p><strong>Author: </strong><?php echo $user->getAuthor()?></p>
            <p><strong>Year: </strong><?php echo $user->getYear()?></p>
            <p><strong>ISBN: </strong><?php echo $user->getISBN()?></p>
            <p><strong>Summary: </strong><?php echo $user->getSummary()?></p>



        </div>
    </div>
</div>
<? include_once "footer.php"?>
</body>
</html>
