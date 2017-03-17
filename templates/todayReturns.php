<form class="col s6" method="POST" onsubmit="return false" id="returnsForm">

    <div class="row">
        <p>Pick-up Date:</p>
        <div class="input-field">
            <input type="date" class="datepicker" name="pickDate" id="start">
            <label for="start">Choose a date:</label>
        </div>
    </div>
    <div class="center">
        <button class="btn waves-effect grey darken-3" type="submit" name="action">
            Check bookings
        </button>
    </div>

</form>
<div class="col s8 flow-text" id="resdiv" style="display: none;">
    <ul class="collection" id="results">

    </ul>


</div>

