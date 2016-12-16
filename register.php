
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
            <form method="post" action="#">
                <div class="row">
                    <p>Username:</p>
                    <div class="input-field">
                        <input type="text"  name="user" id="user">
                        <label for="start">Username: </label>
                    </div>
                </div>
                <div class="row">
                    <p>Password:</p>
                    <div class="input-field">
                        <input type="password"  name="pwd" id="pwd">
                        <label for="pwd">Password: </label>
                    </div>
                </div>
                <div class="row">
                    <p>Name:</p>
                    <div class="input-field">
                        <input type="text"  name="name" id="name">
                        <label for="name">Name: </label>
                    </div>
                </div>
                <div class="row">
                    <p>Surname:</p>
                    <div class="input-field">
                        <input type="text"  name="surname" id="surname">
                        <label for="surname">Surname: </label>
                    </div>
                </div>
                <div class="row">
                    <p>Adress:</p>
                    <div class="input-field">
                        <input type="text"  name="adress" id="adress">
                        <label for="adress">Adress: </label>
                    </div>
                </div>
                <div class="row">
                    <p>IDcard:</p>
                    <div class="input-field">
                        <input type="text"  name="id" id="id">
                        <label for="id">ID Card: </label>
                    </div>
                </div>

                <div class="center">
                    <button class="btn waves-effect grey darken-3" type="submit" name="action">
                        Register
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>
<? include_once "footer.php"?>
</body>
</html>