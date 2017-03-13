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
$thisPage = "admin";
?>
<?php include_once "templates/header.php"; ?>
<div class="row">
    <?php include_once "templates/login.php"; ?>
</div>
<div class="container flow-text">

    <div class="center">
        <h2>Library Configuration</h2>
    </div>
    <div class="divider black"></div>
    <div class="row">

        <div class="col s8 flow-text">

            <p><strong>Max elements Borrowed: </strong><?php echo utilities::$CONFIG["maxBorrow"]?></p>
            <p><strong>Status: </strong><?php foreach (utilities::$CONFIG["status"] as $stat){echo $stat.', ';};?></p>
            <p><strong>Levels of Protection: </strong><?php foreach (utilities::$CONFIG["protection"] as $proc){echo $proc.', ';};?></p>
            <p><strong>Privileges: </strong><?php foreach (utilities::$CONFIG["privileges"] as $priv){echo $priv.', ';}; ?></p>
            <p><strong>Penalty: </strong><?php echo utilities::$CONFIG["penalty"].'/Day' ?></p>



        </div>
    </div>
</div>
<?php include_once "templates/footer.php" ?>
</body>
</html>