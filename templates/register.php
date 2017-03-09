
<!DOCTYPE html>
<html>
<head>
    <?php include_once "head.php"; ?>
</head>

<body>
<?php
include_once "utilities.php";
$thisPage = "register";
?>
<? include_once "header.php"; ?>
<div class="row">
    <?php include_once "login.php"; ?>
</div>
<div class="container flow-text">

    <div class="center">
        <h2>Registration Page</h2>
    </div>
    <div class="divider black"></div>
    <div class="row" style="margin-top: 50px">

        <div class="col s6 offset-s3">
            <?php include_once "regForm.php";?>


        </div>
    </div>
</div>
<? include_once "footer.php" ?>
</body>
</html>