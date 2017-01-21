<form method="post" action="#" id="element">
    <div class="row">
        <p>Title:</p>
        <div class="input-field">
            <input type="text"  name="title" id="title">
            <label for="title">Title: </label>
        </div>
    </div>
    <div class="row">
        <p>Author:</p>
        <div class="input-field">
            <input type="text"  name="author" id="author">
            <label for="author">Author: </label>
        </div>
    </div>
    <div class="row">
        <p>Year:</p>
        <div class="input-field">
            <input type="text"  name="year" id="year">
            <label for="year">Year: </label>
        </div>
    </div>
    <div class="row">
        <p>Subject:</p>
        <div class="input-field">
            <input type="text"  name="subject" id="subject">
            <label for="subject">Subject: </label>
        </div>
    </div>
    <div class="row">
        <p>Summary:</p>
        <textarea form="element" rows="5"></textarea>
    </div>


    <div class="center">
        <button class="btn waves-effect grey darken-3" type="submit" name="action">
            Add Element
        </button>
    </div>
</form>