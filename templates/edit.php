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


    <div class="center">
        <h2>Edit Your Profile</h2>
    </div>
    <div class="divider black"></div>
    <div class="row" style="margin-top: 50px">
        <div class="col s4">

            <figure>
                <img src="<?php echo $photo?>" style="max-height: 300px;max-width:200px">
                <figcaption>Profile Photo</figcaption>
            </figure>
        </div>
        <div class="col s8 flow-text">

            <form method="post"  action="index.php?controller=user&action=update&id=<?php echo $id?>">

                <div class="row">
                    <p>Password:</p>
                    <div class="input-field">
                        <input type="password"  name="password" id="pwd">
                        <label for="pwd">Password: </label>
                    </div>
                </div>
                <div class="row">
                    <p>Name:</p>
                    <div class="input-field">
                        <input type="text"  name="name" id="name" value="<?php echo $name?>">
                        <label for="name">Name: </label>
                    </div>
                </div>
                <div class="row">
                    <p>Surname:</p>
                    <div class="input-field">
                        <input type="text"  name="surname" id="surname" value="<?php echo $surname?>">
                        <label for="surname">Surname: </label>
                    </div>
                </div>
                <div class="row">
                    <p>Email:</p>
                    <div class="input-field">
                        <input type="text"  name="email" id="email" value="<?php echo $email?>">
                        <label for="email">Email: </label>
                    </div>
                </div>
                <div class="row">
                    <p>Adress:</p>
                    <div class="input-field">
                        <input type="text"  name="adress" id="adress" value="<?php echo $adress?>">
                        <label for="adress">Adress: </label>
                    </div>
                </div>
                <div class="row">
                    <p>IDcard:</p>
                    <div class="input-field">
                        <input type="text"  name="IDcard" id="id" value="<?php echo $IDcard?>">
                        <label for="id">ID Card: </label>
                    </div>
                </div>
                <div class="row">
                    <p>Telephone:</p>
                    <div class="input-field">
                        <input type="text"  name="telephone" id="telf" value="<?php echo $telephone?>">
                        <label for="telf">Telephone: </label>
                    </div>
                </div>

                <?php echo $privi?>


                <div class="center">
                    <button class="btn waves-effect grey darken-3" type="submit">
                        Update
                    </button>
                    <a class="btn waves-effect grey darken-3" href="index.php?controller=user&action=del&id=<?php echo $id?>">Unregister</a>
                </div>
            </form>


        </div>

    </div>
</div>
<?php include_once "templates/footer.php" ?>
</body>
</html>
