<?php
session_start();

if( !isset($_SESSION["login_admin"])) {
    header("Location: ../login.php");
    exit;
}  
include "../functions.php";

// ambil data di URL
$nim = $_GET["nim"];

// query data matakuliah berdasarkan kode_dosen
$mhs = query("SELECT * FROM mhs WHERE nim = '$nim'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tidak
    if( ubahmhs($_POST) > 0 ) {
        echo "
            <script>
                alert('Mahasiswa Berhasil Diubah');
                document.location.href = 'mahasiswa.php';
            </script>  
        ";
    }else {
        echo "
            <script>
                alert('Mahasiswa Gagal Diubah');
                document.location.href = 'mahasiswa.php';
            </script>  
        ";
    }

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Panel Admin | Mahasiswa</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@3.3.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'>
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="layout has-sidebar fixed-sidebar fixed-header">

        <!-- navbar -->
        <?php include 'navbar.php'; ?>
        <!-- end navbar -->

        <div id="overlay" class="overlay"></div>
        <div class="layout">
            <main class="content">
                <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                    <i class="ri-menu-line ri-xl"></i>
                </a>
                <div class="container">
                    <div>
                        <h1>Edit | Mahasiswa</h1>
                    </div>
                    <div>
                        <h1><a href="mahasiswa.php" class=""><i class="ri-arrow-left-line"></i> Back</a></h1>
                    </div>
                </div>

                <div class="container-add">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $mhs["nim"]; ?>">
                        <div class="isian">
                            <input type="text" class="form-control" name="nim" placeholder="NIM:"
                                value="<?= $mhs['nim']; ?>">
                        </div>
                        <div class="isian">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa:"
                                value="<?= $mhs['nama']; ?>">
                        </div>
                        <div class="isian">
                            <select name="kelamin" id="" class="form-control">
                                <option value="">Select Jenis Kelamin:</option>
                                <option value="L" <?php if($mhs["kelamin"]=="L"){echo "selected";} ?>>Laki-Laki
                                </option>
                                <option value="P" <?php if($mhs["kelamin"]=="P"){echo "selected";} ?>>Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="isian_">
                            <input type="submit" name="submit" value="Edit Mahasiswa" class="">
                        </div>
                    </form>
                </div>
                <br />
            </main>
            <div class="overlay"></div>
        </div>
    </div>
    <!-- partial -->

    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="./script.js"></script>

</body>

</html>