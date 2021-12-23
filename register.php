<?php

require "functions.php";

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "
        <script>
            alert('User baru berhasil ditambahkan!');
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container">
        <div class="img">
            <img src="images/personalization.svg">
        </div>
        <div class="login-content">
            <form action="" method="post">
                <img src="images/profile.svg">
                <h2 class="title">Registrasi</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input" name="username" id="username" required autofocus="on" autocomplete="off">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password" id="password" required autocomplete="off">
                    </div>
                </div>
                <br>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Password Ulangi</h5>
                        <input type="password" class="input" name="password2" id="password2" required autocomplete="off">
                    </div>
                </div>
                <a href="#">Forgot Password?</a>
                <button type="submit" class="btn" name="register">register</button>
                <hr>
                <a href="login.php" class="belum-punya">Sudah punya akun? <span>Login</span></a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/register.js"></script>
</body>

</html>