<?php
session_start();

include "../functions.php";

if ( !isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

// ambil data di URL
$nim = $_GET["nim"];

// query data matakuliah berdasarkan kode_dosen
$mhs = query("SELECT * FROM mhs WHERE nim = '$nim'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {
    // cek apakah data berhasil diubah atau tidak
    $nim_ = ubahprofile($_POST);
    echo "
    <script>
    alert('Mahasiswa Berhasil Diubah');
    document.location.href = 'profile.php?nim=$nim_';
    </script>
    ";
}

if(isset($_FILES["fileImg"]["name"])){
    $id = $_POST["id"];
    $src = $_FILES["fileImg"]["tmp_name"];
    $imageName = uniqid() . $_FILES["fileImg"]["name"];

    $target = "../img/" . $imageName;

    move_uploaded_file($src, $target);

    $query = "UPDATE mhs SET gambar = '$imageName' WHERE nim = $id";
    mysqli_query($conn, $query);

    // header("Location: profile.php?nim=");
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CE UNAND | Profile</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet">

    <!-- My Style -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>


</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">TEKNIK<span>KOMPUTER</span>.</a>

        <div class="navbar-nav">
            <a href="index.php?nim=<?= $nim ?>#">Home</a>
            <a href="index.php?nim=<?= $nim ?>#about">About</a>
            <a href="index.php?nim=<?= $nim ?>#staff">Dosen</a>
            <a href="index.php?nim=<?= $nim ?>#contact">Kontak</a>
            <a href="krs.php?nim=<?= $nim ?>">KRS</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="search"><i data-feather="search"></i></a>
            <a href="profile.php?nim=<?= $nim ?>" id="shopping-cart"><i data-feather="user"></i></a>
            <a href="../logout.php" id="shopping-cart"><i data-feather="log-out"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Data Mahasiswa -->
    <div class="form-container">
        <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
            <div class="upload">
                <img src="../img/<?= $mhs['gambar']; ?>" id="image">
                <div class="rightRound" id="upload">
                    <input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png">
                    <i data-feather="camera"></i>
                </div>
            </div>
            <h3>Data Mahasiswa</h3>
            <input type="hidden" name="id" value="<?= $mhs["nim"]; ?>">
            <input type="hidden" name="kelamin" value="<?= $mhs["kelamin"]; ?>">
            <input type="text" name="nim" placeholder="enter your nim" require value="<?= $mhs['nim']; ?>">
            <input type="text" name="nama" placeholder="enter your nama" require value="<?= $mhs['nama']; ?>">
            <input type="submit" name="submit" value="Ubah Now" class="form-btn">
        </form>
    </div>
    <!-- End Data Mahasiswa -->

    <!-- Feather Icons -->
    <script>
    feather.replace()
    </script>

    <!-- My Javascript -->
    <script src="js/script.js"></script>

</body>

</html>