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
        <h4>Add Element</h4>
        <div class="col s6 offset-s3">
            <?php include_once "templates/eleForm.php" ?>
        </div>
    </div>
    <div id="deleteUser" style="display: none;">
        <h4>Delete User</h4>
        <div class="col s6 offset-s3">
            <form method="post" action="index.php?controller=user&action=del">
                <div class="input-field">
                    <input type="text"  name="user" id="user">
                    <label for="user">Username: </label>
                </div>
                <div class="center">
                    <button class="btn waves-effect grey darken-3" type="submit">
                        Delete User
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div id="deleteElement" style="display: none;">
        <h4>Delete Element</h4>
        <div class="col s6 offset-s3">
            <form method="post" action="#">
                <div class="input-field">
                    <input type="text"  name="title" id="title">
                    <label for="title">Title: </label>
                </div>
                <div class="center">
                    <button class="btn waves-effect grey darken-3" type="submit" name="action">
                        Delete Element
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once "templates/footer.php" ?>
</body>
</html>