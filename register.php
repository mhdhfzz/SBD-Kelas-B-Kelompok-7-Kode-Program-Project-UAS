<?php

include 'functions.php';

if( isset($_POST["submit"])) {
    if( registrasi($_POST) > 0 ) {
    echo "<script>
        alert('User Baru Berhasil Ditambahkan');
        document.location.href = 'login.php';
        </script>
    ";
    } else {
        echo mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CE UNAND | Register</title>

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

    <!-- Register -->
    <div class="form-container">
        <form action="" method="post">
            <h3>register now</h3>
            <?php if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            }; ?>
            <input type="text" name="nim" required placeholder="enter your nim">
            <input type="text" name="nama" required placeholder="enter your name">
            <select name="kelamin">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="password2" required placeholder="confirm your password">
            <select name="semester">
                <option value="">Pilih Semester</option>
                <option value="01">Semester 1</option>
                <option value="02">Semester 2</option>
                <option value="03">Semester 3</option>
                <option value="04">Semester 4</option>
                <option value="05">Semester 5</option>
                <option value="06">Semester 6</option>
                <option value="07">Semester 7</option>
                <option value="08">Semester 8</option>
                <option value="09">Semester 9</option>
                <option value="10">Semester 10</option>
                <option value="11">Semester 11</option>
                <option value="12">Semester 12</option>
                <option value="13">Semester 13</option>
                <option value="14">Semester 14</option>

            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="login.php">login now</a></p>
        </form>
    </div>
    <!-- end register -->

    <!-- Feather Icons -->
    <script>
    feather.replace()
    </script>

    <!-- My Javascript -->
    <script src="js/script.js"></script>

</body>

</html>