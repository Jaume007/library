<form id="bookform" onsubmit="return false;">
    <div class="row">
        <p>ISBN:</p>
        <div class="input-field">
            <input type="text" name="isbn" id="isbn" maxlength="10" minlength="10" class="validate">
            <label for="isbn">ISBN: </label>
        </div>
    </div>
    <div class="row">
        <p>Conservation:</p>
        <div class="input-field">
            <select name="conservation" class="browser-default col s6">
                <option value="" disabled selected>Choose your option</option>
                <option value="0">New</option>
                <option value="1">Old</option>
            </select>
        </div>
    </div>
    <div class="row">
        <p>Protection:</p>
        <div class="input-field">
            <select name="protection" class="browser-default col s6">
                <option value="" disabled selected>Choose your option</option>
                <option value="0">Short Booking</option>
                <option value="1">Long Booking</option>
            </select>
        </div>
    </div>
    <div class="row">
        <p>Catalog</p>
        <div class="input-field">
            <input type="checkbox" id="status" name="status"/>
            <label for="status">Add to catalog</label>
        </div>
    </div>


    <div class="center">
        <button class="btn waves-effect grey darken-3" id="submit" type="submit">
            Add Element
        </button>
    </div>
</form>
<script>
//    $('#submit').on('click', function () {
//        var data = {
//            isbn: $('input[name=isbn]').val(),
//            conservation: $('select[name=conservation]').val(),
//            protection: $('select[name=protection]').val(),
//            status: $('input[name=status]').val()
//        };
//        console.log(data);
//        $.ajax({
//            type: "POST",
//            url:"addBook.php",
//            data: data,
//            contentType: false,
//            cache: false,
//            processData: false,
//            dataType: "text",
//            beforeSend: function () {
//                console.log("hola");
//            },
//            succes: function (data) {
//                console.log(data);
//                Materialize.toast(data, 2000);
//            },
//            error: function (xhr, ajaxOptions, thrownError) {
//                alert(xhr.status);
//                alert(thrownError);
//            }
//        });
//    });
$(document).ready(function () {
    $("#bookform").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "addBook.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                Materialize.toast(data, 4000);
                document.getElementById("bookform").reset();
            }, error: function () {
                alert("Fallo de JS");
            }
        });
    });
});
</script>