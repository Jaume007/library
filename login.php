<div id="login" style="display: none">
    <form class="col s6 offset-s<?php if($thisPage=="index") echo '2';else echo '6' ?>" method="POST" action="utilities.php">
        <div class="row col s6 offset s6 right grey lighten-1">
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" class="validate black-text" name="user">
                <label for="user" class="grey-text text-darken-1">Username</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">vpn_key</i>
                <input type="password" class="validate black-text" name="password">
                <label for="user" class="grey-text text-darken-1">Password</label>
                <input type="hidden" name="page" value=<?php echo $thisPage;?>>
            </div>
            <div class="center-align" style="margin-bottom: 10px">
                <button class="btn waves-effect grey darken-3" type="submit" name="action"
                        style="margin-right: 15px">
                    Login
                </button>
                <a href="register.php" class="btn waves-effect grey darken-3">Register</a>
            </div>
        </div>
    </form>
</div>