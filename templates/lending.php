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
$thisPage = "lending";
?>
<?php include_once "templates/header.php"; ?>
<div class="row">
    <?php include_once "templates/login.php"; ?>
</div>
<div class="container" style="margin-bottom: 200px">

    <?php $book = utilities::findById($_GET['id']); ?>
    <div class="center">
        <h2><?php echo $book->getTitle(); ?> Booking</h2>
    </div>
    <div class="divider black"></div>
    <div class="row" style="margin-top: 50px">
        <div class="col s4">

            <figure>
                <img src="<?php echo $book->getImg(); ?>" style="max-height: 300px;max-width:200px">
            </figure>
        </div>
        <div class="col s8 flow-text">
            <form method="post" action="#">
                <div class="row">
                    <p>Pick-up Date:</p>
                    <div class="input-field">


                        <input type="date" class="datepicker" name="start" id="start">
                        <label for="start">Pick up Date</label>
                    </div>
                </div>
                <div class="row">
                    <p>Return Date:</p>
                    <div class="input-field">

                        <input type="date" class="datepicker" name="finish" id="finish">
                        <label for="finish">Return Date</label>

                    </div>
                </div>
                <div class="center">
                <button class="btn waves-effect grey darken-3" type="submit" name="action">
                    Book
                </button>
                </div>
            </form>


        </div>
    </div>
</div>
<?php include_once "templates/footer.php" ?>
<script> $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });</script>
</body>
</html>
