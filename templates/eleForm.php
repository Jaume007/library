<form id="bookform" onsubmit="return false;">
    <div class="row">
        <p>ISBN:</p>
        <div class="input-field">
            <input type="text" name="isbn" id="isbn">
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
    $('#submit').on('click', function () {
        var data = {
            isbn: $('input[name=isbn]').val(),
            conservation: $('select[name=conservation]').val(),
            protection: $('select[name=protection]').val(),
            status: $('input[name=status]').val()
        };
        console.log(data);
        $.post({
            type: "POST",
            url:"/~jaume/php/libraryMVC/Ajax/addBook.php",
            data: data,
            succes: function (data) {
                console.log(data);
                Materialize.toast(data, 2000);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
</script>