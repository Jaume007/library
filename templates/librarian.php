<!DOCTYPE html>
<html>
<head>
    <?php include_once "templates/head.php"; ?>
</head>

<body>

<?php include_once "templates/headerExt.php"; ?>
<div class="row">
    <?php include_once "templates/login.php"; ?>
</div>
<div class="container flow-text">

    <div class="center">
        <h2>Library Management</h2>
    </div>
    <div class="divider black"></div>
    <div id="register" style="display: block;">
        <h4>User Registration</h4>
        <div class="col s6 offset-s3">
            <?php include_once "templates/regForm.php" ?>
        </div>
    </div>
    <div id="addElement" style="display: none;">
        <h4>Add Book</h4>
        <div class="col s6 offset-s3">
            <?php include_once "templates/eleForm.php" ?>
        </div>
    </div>
    <div id="deleteUser" style="display: none;">
        <div class="col s6 offset-s3">
            <h4>User Management</h4>
            <ul class="collection">
                <?php echo $users ?>
            </ul>
        </div>
    </div>
    <div id="deleteElement" style="display: none;">
        <h4>Books Management</h4>
        <div class="col s6 offset-s3">

            <ul class="collection">
                <?php echo $books ?>
            </ul>
        </div>
    </div>
</div>
<?php include_once "templates/footer.php" ?>
</body>
</html>