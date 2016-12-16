<header>
    <nav class="nav-extended">
        <div class="nav-wrapper grey darken-4">
            <a href="index.php" class="brand-logo"><img class="responsive-img" style="height: 60px" src="img/logo.png"/></a>
            <ul id="nav-mobile " class="right hide-on-med-and-down">
                <li><a href="catalog.php">Catalog</a></li>
                <?php if(isset($_SESSION["type"])&& ($_SESSION["type"]>99))echo '<li><a href="admin.php">Admin Panel</a></li>';?>
                <?php if(isset($_SESSION["type"])&& ($_SESSION["type"]>49))echo '<li><a href="librarian.php">Library Management</a></li>';?>
                <?php if(isset($_SESSION["type"])&& ($_SESSION["type"]>0))echo '<li><a href="profile.php">Profile</a></li>';?>
                <?php if(!isset($_SESSION["user"]))echo '<li><a href="#" target="_self" onclick="login()">Login/Register</a></li>';
                else echo '<li><a href="utilities.php?logout=true">LogOut</a></li>'?>
            </ul>
            <ul class="tabs tabs-fixed-width tabs-transparent">
                <li class="tab" onclick="mostra('register')"><a class="active">Register User</a></li>
                <li class="tab" onclick="mostra('deleteUser')"><a>Delete User</a></li>
                <li class="tab" onclick="mostra('addElement')"><a>Add Book</a></li>
                <li class="tab" onclick="mostra('deleteElement')"><a>Delete Book</a></li>
            </ul>
        </div>
    </nav>
</header>