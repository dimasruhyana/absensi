<?php

session_start();

if (isset($_SESSION["login"])) {
    header("Location:index.php");
    exit;
}

require 'functions.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        } else {
            $errorPass = true;
        }
    } else {
        $errorUser = true;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
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
                <h2 class="title">Welcome</h2>

                <div class="input-div one" style="margin-bottom:0;">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input" name="username" id="username" required autofocus="on" autocomplete="off">
                    </div>
                </div>

                <?php if (isset($errorUser)) : ?>
                    <small style="font-style:italic; color:red; float:left; margin-top:4px;">Username Salah</small>
                <?php endif; ?>

                <div class="input-div pass" style="margin-bottom:0;">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password" id="password" required autocomplete="off">
                    </div>
                </div>

                <?php if (isset($errorPass)) : ?>
                    <small class="text-danger" style="font-style:italic; color:red;  float:left; margin-top:4px;">Password Salah</small>
                <?php endif; ?>

                <a href="#">Forgot Password?</a>
                <button type="submit" class="btn" name="login">login</button>
                <hr>
                <a href="register.php" class="belum-punya">Belum punya akun? <span>Daftar</span></a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/login.js"></script>
</body>

</html>