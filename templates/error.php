<!DOCTYPE html>
<html>
<head>
    <?php include_once "templates/head.php"; ?>
</head>

<body>

<?php include_once "templates/header.php"; ?>
<div class="row">
    <?php include_once "templates/login.php"; ?>
</div>
<div class="container">
    <div class="row">
    <h1>Something went really wrong!</h1>
    <h4><?php echo $error?></h4>
    </div>
    <div class="row">
        <button class="btn waves-effect grey darken-3" onclick="window.history.back();">
            Go Back
        </button>
    </div>
</div>
<?php include_once "templates/footer.php" ?>
</body>
</html>
