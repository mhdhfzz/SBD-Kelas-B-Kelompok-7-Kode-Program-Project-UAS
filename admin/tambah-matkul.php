<?php
session_start();

if( !isset($_SESSION["login_admin"])) {
    header("Location: ../login_form.php");
    exit;
}  
include "../functions.php";

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {

    // cek apakah data berhasil ditambahkan atau tidak
    if( tambahmatkul($_POST) > 0 ) {
        echo "
            <script>
                alert('Mata Kuliah Berhasil Ditambahkan');
                document.location.href = 'mata-kuliah.php';
            </script>  
        ";
    }else {
        echo "
            <script>
                alert('Mata Kuliah Gagal Ditambahkan');
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

    <!-- My Style -->
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
                        <h1>Add | MataKuliah</h1>
                    </div>
                    <div>
                        <h1><a href="mata-kuliah.php" class=""><i class="ri-arrow-left-line"></i> Back</a></h1>
                    </div>
                </div>

                <div class="container-add">
                    <form action="" method="post">
                        <div class="isian">
                            <input type="text" class="form-control" name="kode_matkul" placeholder="Kode MataKuliah :">
                        </div>
                        <div class="isian">
                            <input type="text" class="form-control" name="nama_matkul" placeholder="Nama MataKuliah :">
                        </div>
                        <div class="isian">
                            <select name="sks" id="" class="form-control">
                                <option value="">Jumlah SKS :</option>
                                <option value="1">1 SKS</option>
                                <option value="2">2 SKS</option>
                                <option value="3">3 SKS</option>
                                <option value="4">4 SKS</option>
                            </select>
                        </div>
                        <div class="isian_">
                            <input type="submit" name="submit" value="Add MataKuliah" class="">
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