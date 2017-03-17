<header>
    <nav class="nav-extended">
        <div class="nav-wrapper grey darken-4">
            <a href="index.php" class="brand-logo hide-on-small-and-down"><img class="responsive-img" style="height: 60px" src="img/logo.png"/></a>
            <ul id="nav-mobile " class="right hide-on-med-and-down">
                <li><a href="index.php?controller=catalog">Catalog</a></li>
                <?php if($type>($admin-1))echo '<li><a href="index.php?controller=admin">Admin Panel</a></li>';?>
                <?php if($type>($librarian-1))echo '<li><a href="index.php?controller=librarian">Library Management</a></li>';?>
                <?php if($type>($member-1))echo '<li><a href="index.php?controller=user&action=show&id='.$id.'">Profile</a></li>';?>
                <?php if($user=="0")echo '<li><a href="#" target="_self" onclick="login()">Login/Register</a></li>';
                else echo '<li><a href="index.php?controller=user&action=log&user=-1&password=-1">LogOut</a></li>' ?>
            </ul>
            <ul class="tabs tabs-fixed-width tabs-transparent">
                <li class="tab" onclick="mostra('register')"><a class="active">Register User</a></li>
                <li class="tab" onclick="mostra('deleteUser')"><a>User Management</a></li>
                <li class="tab" onclick="mostra('addElement')"><a>Add Book</a></li>
                <li class="tab" onclick="mostra('deleteElement')"><a>Books Management</a></li>
                <li class="tab" onclick="mostra('todayReturns')"><a>Returns</a></li>
            </ul>
        </div>
    </nav>
</header>