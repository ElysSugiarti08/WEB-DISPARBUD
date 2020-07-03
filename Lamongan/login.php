<?php
session_start();

require 'functions.php';

if( isset($_SESSION["login"]) ) {
    $session = $_SESSION["username"];
    $iduser = mysqli_query($conn, "SELECT * FROM users WHERE username = '$session'");
    $baris = mysqli_fetch_assoc($iduser);
    if ( $baris["usertype"] != 1 ) {
        echo "<script>location.href='customer/index.php';</script>";
        exit;
    }
    else {
        echo "<script>location.href='admin/index.php';</script>";
        exit;
    }
}

if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    //cek user
    if( mysqli_num_rows($result) === 1 ) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            //set session
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;

            $iduser = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
            $baris = mysqli_fetch_assoc($iduser);
            $_SESSION["email"] = $baris['email'];
            if ( $baris["usertype"] != 1 ) {
                echo "<script>location.href='customer/index.php';</script>";
                exit;
            }
            else {
                echo "<script>location.href='admin/index.php';</script>";
                exit;
            }
        }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <!-- Favicon -->
    <link href="assets/img/grad1.png" rel="icon" type="image/png"> 
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <style>
    body{
        margin-top:70px;
    }
    @media(max-width: 768px){
    body{
        margin-top:70px;
        }
    }
    </style>
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button fixed-top">
            <div class="container"><a class="navbar-brand" href="index.html">DISPARBUD LAMONGAN</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
               <span class="navbar-text actions"> <a class="login" href="login.php">Log In</a><a class="btn btn-light action-button" role="button" href="daftar.php">Sign Up</a></span></div>
            </div>
        </nav>
    </div>
    <div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <?php if( isset($error) ) : ?>
                <p style="color: red; font-style: italic;"> username / password salah</p>
            <?php endif; ?>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="login">Log In</button></div>
        </form>
    </div>
    <footer class="page-footer dark">
        <div class="footer-copyright">
            <p>© 2020 Dinas Pariwisata dan Budaya Lamongan</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>