<?php
    session_start();
    require_once "../../config/const.php";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style_login_register.css">
    <title>Login</title>
</head>
<body>
    <form action="<?= BASEURL; ?>/cek-login-admin" method="POST">
        <div class="container-form">
            <?php
                if(isset($_SESSION['status']) && isset($_SESSION['msg'])){ ?>
                    <div class="notification" style="background-color: <?= ($_SESSION['status'] == "success") ? 'rgba(168, 243, 190, 0.4)' : 'rgba(242, 151, 169, 0.67)' ; ?>">
                        <?= $_SESSION['msg']; ?>
                    </div>
        <?php }
                session_destroy();
                ?>
            <a href="<?= BASEURL; ?>/landing-page" class="btnCls">X</a>
            <p>
                <b>Welcome</b><br>
                Enter Your Username and Password !
            </p>
            
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Type Username">
                <img src="<?= BASEURL; ?>/assets/img/user.png" alt="">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Type Password">
                <img src="<?= BASEURL; ?>/assets/img/padlock.png" alt="">
            </div>
            <div>
                <input type="checkbox" id="showPass"> <label for="showPass">Show Password <br>
            </div>
            <div>
                <input type="submit" name="login" value="Login" class="btnLogin">
                <p> 
                    <a href="<?= BASEURL; ?>/login">Login User</a>
                </p>
            </div>
        </div>
    </fotm>

    <!--Javascript & JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script type='text/javascript'>
        $(document).ready(function(){
            $('#showPass').click(function(){
                $(this).is(':checked') ? $('#password').attr('type', 'text') : $('#password').attr('type', 'password');
            });
        });
    </script>
</body>
</html>