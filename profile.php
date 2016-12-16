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
$thisPage = "profile";
?>
<? include_once "header.php"; ?>
<div class="row">
    <?php include_once "login.php"; ?>
</div>
<div class="container">

    <?php $user=utilities::findUser($_SESSION['id']);?>
    <div class="center">
        <h2><?php echo $user->getUser();?>'s Profile</h2>
    </div>
    <div class="divider black"></div>
    <div class="row" style="margin-top: 50px">
        <div class="col s4">

            <figure>
                <img src="<?php echo $user->getPhoto();?>" style="max-height: 300px;max-width:200px">
                <figcaption>Profile Photo</figcaption>
            </figure>
        </div>
        <div class="col s8 flow-text">

            <p><strong>Name: </strong><?php echo $user->getName();?></p>
            <p><strong>Surname: </strong><?php echo $user->getSurname();?></p>
            <p><strong>ID card: </strong><?php echo $user->getIDcard();?></p>
            <p><strong>Telephone: </strong><?php echo $user->getTelephone();?></p>
            <p><strong>Email: </strong><?php echo $user->getEmail();?></p>
            <p><strong>Adress: </strong><?php echo $user->getAdress();?></p>



        </div>
    </div>
</div>
<? include_once "footer.php"?>
</body>
</html>
