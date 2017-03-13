<!DOCTYPE html>
<html>
<head>
    <?php include_once "templates/head.php"; ?>
</head>

<body>

<?php include_once "templates/header.php"; ?>
<div class="row">
    <div class="col s6"></div>
    <?php include_once "templates/login.php"; ?>
</div>
<div class="container">
    <div id="intro" style="padding-bottom: 20px">
        <h1 class="center-align">Catalog</h1>
        <h5 class="center-align">"Find anything in our library using our powerful search engine"</h5>
    </div>
    <div class="row col s10">
        <form class="col s10 offset-s1" action="index.php?controller=catalog&action=search" method="post">
            <div class="input-field col s10 offset-s1">
                <input id="search" type="search" required name="search">
                <label for="search"><i class="material-icons">search</i> Search on the catalogue</label>
                <i class="material-icons">close</i>
            </div>
            <div class="col s10 offset-s1">
                <p>Search options:</p>
            </div>
            <div class="col s10 offset-s1">
                <div class="col s2">
                    <p>
                        <input name="options" class="with-gap" type="radio" id="all" value="all" checked/>
                        <label for="all">All</label>
                    </p>
                </div>
                <div class="col s2">
                    <p>
                        <input name="options" class="with-gap" type="radio" id="title" value="title"/>
                        <label for="title">Title</label>
                    </p>
                </div>
                <div class="col s2">
                    <p>
                        <input name="options" class="with-gap" type="radio" id="author" value="author"/>
                        <label for="author">Author</label>
                    </p>
                </div>
                <div class="col s2">
                    <p>
                        <input name="options" class="with-gap" type="radio" id="category" value="category"/>
                        <label for="category">Category</label>
                    </p>
                </div>
                <div class="col s3 offset-s1">
                    <button class="btn waves-effect grey darken-4" type="submit" name="action">Search
                        <i class="material-icons right">search</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="divider black"></div>
    <div class="row col s12">
        <h4>Results: </h4>

        <?php
        echo $results;
        ?>
    </div>
</div>
<?php include_once "templates/footer.php" ?>
</body>
</html>
