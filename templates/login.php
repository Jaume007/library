<div id="login" style="display: none">
    <!-- size 2 en index 6 en resto -->
    <form class="col s6" method="POST" onsubmit="return false" id="loginForm">
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

            </div>
            <div class="center-align" style="margin-bottom: 10px">
                <button class="btn waves-effect grey darken-3" type="submit" name="action"
                        style="margin-right: 15px">
                    Login
                </button>
                <a href="index.php?controller=index&action=register" class="btn waves-effect grey darken-3">Register</a>
            </div>
        </div>
    </form>
    <script>

        $(document).ready(function () {
            $("#loginForm").submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "login.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                        switch (true) {
                            case data==0:
                                window.location.replace("index.php");
                                break;
                            case data==1:
                                Materialize.toast("Login succesfull", 2000);
                                setTimeout(function () {
                                    window.location.replace("index.php");
                                }, 1000);
                                break;
                            case data==3:
                                Materialize.toast("Incorrect user or password", 4000);
                                break;

                        }
                    }, error: function (data) {
                        Materialize.toast(data, 4000);
                    }
                });
            });
        });
    </script>
</div>