<header>
    <nav>
        <div class="nav-wrapper grey darken-4">
            <a href="index.php" class="brand-logo"><img class="responsive-img" style="height: 60px" src="img/logo.png"/></a>
            <ul id="nav-mobile " class="right hide-on-med-and-down">
                <li><a href="catalog.php">Catalog</a></li>
                <?php if($type>99)echo '<li><a href="admin.php">Admin Panel</a></li>';?>
                <?php if($type>49)echo '<li><a href="index.php?controller=librarian">Library Management</a></li>';?>
                <?php if($type>0)echo '<li><a href="profile.php">Profile</a></li>';?>
                <?php if($user="guest")echo '<li><a href="#" target="_self" onclick="login()">Login/Register</a></li>';
                else echo '<li><a href="utilities.php?logout=true">LogOut</a></li>' ?>
            </ul>
        </div>
    </nav>
</header>