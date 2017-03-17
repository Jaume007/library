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
    <div id="todayReturns" style="display: none;">
        <h4>Returns Management</h4>
        <div class="col s6 offset-s3">

            <?php include_once "templates/todayReturns.php";?>
        </div>
    </div>
</div>
<?php include_once "templates/footer.php" ?>
<script>
    $(document).ready(function () {


        $('.datepicker').pickadate({

        });
        $("#returnsForm").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "todayReturns.php",
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    Materialize.toast(data, 4000);
                    document.getElementById("results").innerHTML=data;
                    document.getElementById("resdiv").style.display = "block";

                }, error: function () {
                    alert("Fallo de JS");
                }
            });
        });
    })


</script>
</body>
</html>