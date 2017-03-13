
<!DOCTYPE html>
<html>
<head>
    <?php include_once "templates/head.php"; ?>
</head>

<body>

<? include_once "templates/header.php"; ?>
<div class="row">
    <?php include_once "templates/login.php"; ?>
</div>
<div class="container flow-text">

    <div class="center">
        <h2>Registration Page</h2>
    </div>
    <div class="divider black"></div>
    <div class="row" style="margin-top: 50px">

        <div class="col s6 offset-s3">
            <?php include_once "templates/regForm.php";?>


        </div>
    </div>
</div>
<? include_once "templates/footer.php" ?>
</body>
</html>