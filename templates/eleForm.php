<form method="post" action="index.php?controller=librarian&action=newB" id="element">
    <div class="row">
        <p>ISBN:</p>
        <div class="input-field">
            <input type="text" name="isbn" id="title">
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
            <input type="checkbox" id="status" />
            <label for="status">Add to catalog</label>
        </div>
    </div>



    <div class="center">
        <button class="btn waves-effect grey darken-3" type="submit" name="action">
            Add Element
        </button>
    </div>
</form>