<?php
session_start();

if( !isset($_SESSION["login_admin"])) {
    header("Location: login.php");
    exit;
}  
include "../functions.php";

// ambil data di URL
$kode_matkul = $_GET["kode_matkul"];

// query data matakuliah
$matkul = query("SELECT * FROM mata_kuliah WHERE kode_matkul = '$kode_matkul'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tidak
    if( ubahmatkul($_POST) > 0 ) {
        echo "
            <script>
                alert('Mata Kuliah Berhasil Diubah');
                document.location.href = 'mata-kuliah.php';
            </script>  
        ";
    }else {
        echo "
            <script>
                alert('Mata Kuliah Gagal Diubah');
                document.location.href = 'mata-kuliah.php';
            </script>  
        ";
    }

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Panel Admin | MataKuliah</title>
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
                        <h1>Edit | MataKuliah</h1>
                    </div>
                    <div>
                        <h1><a href="mata-kuliah.php" class=""><i class="ri-arrow-left-line"></i> Back</a></h1>
                    </div>
                </div>

                <div class="container-add">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $matkul["kode_matkul"]; ?>">
                        <div class="isian">
                            <input type="text" class="form-control" name="kode_matkul" placeholder="Kode MataKuliah :"
                                value="<?= $matkul['kode_matkul']; ?>">
                        </div>
                        <div class="isian">
                            <input type="text" class="form-control" name="nama_matkul" placeholder="Nama MataKuliah :"
                                value="<?= $matkul['nama_matkul']; ?>">
                        </div>
                        <div class="isian">
                            <select name="sks" id="" class="form-control">
                                <option value="">Jumlah SKS :</option>
                                <option value="1" <?php if($matkul["sks"]=="1"){echo "selected";} ?>>1 SKS</option>
                                <option value="2" <?php if($matkul["sks"]=="2"){echo "selected";} ?>>2 SKS</option>
                                <option value="3" <?php if($matkul["sks"]=="3"){echo "selected";} ?>>3 SKS</option>
                                <option value="4" <?php if($matkul["sks"]=="4"){echo "selected";} ?>>4 SKS</option>
                            </select>
                        </div>
                        <div class="isian_">
                            <input type="submit" name="submit" value="Edit MataKuliah" class="">
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