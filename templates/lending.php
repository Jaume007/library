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
<div class="container" style="margin-bottom: 200px">


    <div class="center">
        <h2><?php echo $title ?> Booking</h2>
    </div>
    <div class="divider black"></div>
    <div class="row" style="margin-top: 50px">
        <div class="col s4">

            <figure>
                <img src="<?php echo $image; ?>" style="max-height: 300px;max-width:200px">
            </figure>
        </div>
        <div class="col s8 flow-text">
            <form method="post" action="index.php?controller=booking&action=book&isbn=<?php echo $isbn ?>">
                <div class="row">
                    <p>Pick-up Date:</p>
                    <div class="input-field">
                        <input type="date" class="datepicker" name="pickDate" id="start">
                        <label for="start">Pick up Date</label>
                    </div>
                </div>
                <div class="row">
                    <p>Return Date:  <b id="return"></b></p>

                </div>
                <div class="center">
                    <button class="btn waves-effect grey darken-3" type="submit" name="action">
                        Book
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>
<?php include_once "templates/footer.php" ?>
<script>
    $(document).ready(function () {


        $('.datepicker').pickadate({
            clear: '',
            min: new Date(),
            disable: [
                <?php echo $blocked?>
            ]
        });
        $('.datepicker').on('change', function () {

            var data = {
                pickDate: $(this).val(),
                isbn: '<?php echo $isbn?>'
            };

            $.ajax({
                url: "return.php",
                type: "POST",
                data: data,
                datatype: "json",

                success: function (data) {
                    console.log(data);
                   document.getElementById('return').innerHTML = data;

                }, error: function (data) {
                    Materialize.toast(data, 4000);
                }
            });
        })
    })


</script>
</body>
</html>
