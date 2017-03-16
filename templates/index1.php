<!DOCTYPE html>
<html>
<head>
    <?php require_once "templates/head.php"; ?>
</head>

<body>

<?php require_once "templates/header.php"; ?>
<div class="row">
    <div class="col s6">
    <form class="" method="post" action="index.php?controller=catalog&action=search">
        <div class="input-field">
            <input id="search" type="search" required name="search">
            <label for="search"><i class="material-icons">search</i> Search on the catalogue</label>
            <i class="material-icons">close</i>
            <input type="hidden" name="options" value="all">
        </div>
    </form>
    </div>
    <?php include_once "templates/login.php"; ?>

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
            <?php echo $newest ?>
        </div>
    </div>

</div>
<?php include_once "templates/footer.php" ?>
</body>

</html>