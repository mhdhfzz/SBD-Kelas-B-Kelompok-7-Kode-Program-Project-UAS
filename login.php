<?php
session_start();

if( isset($_SESSION["login_admin"])) {
    header("Location: admin/index.php");
    exit;
} else if ( isset($_SESSION["login"])) {
    header("Location: mahasiswa/index.php");
    exit;
}

include "functions.php";

if( isset($_POST["submit"])) {

    $nim = $_POST["nim"];
    $password = $_POST["password"];


    $admin = mysqli_query($conn, "SELECT nim FROM mhs WHERE user_type = '$nim'");
    $result = mysqli_query($conn, "SELECT * FROM mhs WHERE nim = '$nim'");
    
    // cek username
    if( mysqli_num_rows($admin) === 1 ) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            $_SESSION["login_admin"] = true;

            header("Location: admin/index.php");
            exit;
            } 
    } else if( mysqli_num_rows($result) === 1 ) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            header("Location: mahasiswa/index.php?nim=$nim");
            exit;
        }
    }

    $error = true;


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CE UNAND | Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet">

    <!-- My Style -->
    <link rel="stylesheet" href="css/style.css">

    <!-- feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>


</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">TEKNIK<span>KOMPUTER</span>.</a>

        <div class="navbar-nav">
            <a href="index.php">Home</a>
            <a href="index.php#about">About</a>
            <a href="index.php#staff">Dosen</a>
            <a href="index.php#contact">Kontak</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="search"><i data-feather="search"></i></a>
            <a href="login.php" id="shopping-cart"><i data-feather="log-in"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Login -->
    <div class="form-container">
        <form action="" method="post">
            <h3>login now</h3>
            <?php if( isset($error)) : ?>
            <p style="color: red; font-style: italic;">username / password salah</p>
            <?php endif; ?>
            <input type="nim" name="nim" required placeholder="enter your nim">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>don't have an account? <a href="register.php">register now</a></p>
        </form>

    </div>
    <!-- End Login -->

    <!-- Feather Icons -->
    <script>
    feather.replace()
    </script>

    <!-- My Javascript -->
    <script src="js/script.js"></script>

</body>

</html>