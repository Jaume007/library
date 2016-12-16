<? include_once "header.php"; ?>
<div class="row">
    <?php include_once "login.php"; ?>
</div>
<div class="container">
    <?php $user=utilities::findUser($_SESSION['id']);?>
    <div class="center">
        <h2>Profile</h2>
    </div>
    <div class="divider black"></div>
    <div class="row">
        <div class="col s4">
            <figure>
                <img src="<?php echo $user->getPhoto()?>" style="max-height: 300px;max-width:200px">
                <figcaption class="center-align">Profile Photo</figcaption>
            </figure>
        </div>
        <div class="col s8 flow-text">

            <p><strong>Name: </strong><?php echo $user->getName()?></p>
            <p><strong>Surname: </strong><?php echo $user->getSurname()?></p>
            <p><strong>ISBN: </strong><?php echo $user->getISBN()?></p>
            <p><strong>Summary: </strong><?php echo $user->getSummary()?></p>



        </div>
    </div>
</div>
<? include_once "footer.php"?>
</body>
</html>
