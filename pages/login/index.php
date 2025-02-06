<?php
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
    <div class="container-form">
        <a href="<?= BASEURL; ?>/landing-page" class="btnCls">X</a>
        <p>
            <b>Welcome</b><br>
            Enter Your Username and Password !
        </p>
        
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Type Username" required>
            <img src="<?= BASEURL; ?>/assets/img/user.png" alt="">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Type Password" required>
            <img src="<?= BASEURL; ?>/assets/img/padlock.png" alt="">
        </div>
        <div>
            <input type="checkbox" id="showPass"> <label for="showPass">Show Password <br><br>
            Dont have account ? <a href="<?= BASEURL; ?>/registrasi">Sign Up</a>
        </div>
        <div>
            <input type="submit" name="login" value="Login" class="btnLogin">
            <p> 
                <a href="<?= BASEURL; ?>/login-administrator">Login Administrator</a>
            </p>
        </div>
    </div>

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