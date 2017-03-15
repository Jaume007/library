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
        <h2><?php echo $user;?>'s Profile</h2>
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

            <p><strong>Name: </strong><?php echo $name;?></p>
            <p><strong>Surname: </strong><?php echo $surname;?></p>
            <p><strong>ID card: </strong><?php echo $IDcard;?></p>
            <p><strong>Telephone: </strong><?php echo $telephone;?></p>
            <p><strong>Email: </strong><?php echo $email;?></p>
            <p><strong>Adress: </strong><?php echo $adress;?></p>
        <a class="btn waves-effect grey darken-3" href="index.php?controller=user&action=edit&id=<?php echo $id?>">Edit Profile</a>
        <a class="btn waves-effect grey darken-3" href="index.php?controller=user&action=hist&id=<?php echo $id?>">View Bookings</a>
        </div>

    </div>
</div>
<?php include_once "templates/footer.php" ?>
</body>
</html>
