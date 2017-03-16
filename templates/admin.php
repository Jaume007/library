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
<div class="container flow-text">

    <div class="center">
        <h2>Library Configuration</h2>
    </div>
    <div class="divider black"></div>
    <div class="row">

        <div class="col s8 flow-text">

            <form method="post" action="index.php?controller=admin&action=update">

                <div class="row">
                    <p>Maximum Borrowed Items:</p>
                    <div class="input-field">
                        <input type="text" name="maxItems" id="maxItems" value="<?php echo $maxItems ?>">

                    </div>
                </div>
                <div class="row">
                    <p>Booking Times:</p>
                    <div class="row">
                        <div class="input-field col s6">
                            <p>Short booking</p>
                            <input type="number" name="short" id="short"
                                   value="<?php echo $short ?>">
                        </div>
                        <div class="input-field col s6">
                            <p>Long booking</p>
                            <input type="number" name="long" id="long" value="<?php echo $long ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <p>User Levels:</p>
                    <div class="row">
                        <div class="input-field col s4">
                            <p>Admin: </p>
                            <input type="number" name="admin" id="admin"
                                   value="<?php echo $admin ?>">
                        </div>
                        <div class="input-field col s4">
                            <p>Librarian</p>
                            <input type="number" name="librarian" id="librarian" value="<?php echo $librarian ?>">
                        </div>
                        <div class="input-field col s4">
                            <p>Member</p>
                            <input type="number" name="member" id="member" value="<?php echo $member ?>">
                        </div>
                    </div>
                </div>
                <div class="center">
                    <button class="btn waves-effect grey darken-3" type="submit">
                        Update
                    </button>

                </div>
            </form>


        </div>
    </div>
</div>
<?php include_once "templates/footer.php" ?>
</body>
</html>