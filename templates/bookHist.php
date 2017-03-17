<!DOCTYPE html>
<html>
<head>
    <?php include_once "templates/head.php"; ?>
    <script src="libs/picker.date.js"></script>
    <script src="libs/picker.js"></script>
</head>

<body>

<?php include_once "templates/header.php"; ?>
<div class="row">
    <?php include_once "templates/login.php"; ?>
</div>
<div class="container" style="margin-bottom: 200px">


    <div class="center">
        <h2><?php echo $title ?> History</h2>
    </div>
    <div class="divider black"></div>
    <div class="row" style="margin-top: 50px">
        <div class="col s4">

            <figure>
                <img src="<?php echo $image; ?>" style="max-height: 300px;max-width:200px">
            </figure>
        </div>
        <div class="col s8 flow-text">
            <ul class="collection">
                <?php echo $bookings ?>
            </ul>


        </div>
    </div>
</div>
<?php include_once "templates/footer.php" ?>

</body>
</html>
