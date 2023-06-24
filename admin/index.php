<?php
session_start();

if( !isset($_SESSION["login_admin"])) {
    header("Location: ../login.php");
    exit;
}  
include "../functions.php";

// jumlah dosen
$dosen = mysqli_query($conn, "SELECT * FROM dosen;");
$countdosen = mysqli_num_rows($dosen);

// jumlah mahasiswa
$mhs = mysqli_query($conn, "SELECT * FROM mhs;");
$countmhs = mysqli_num_rows($mhs);

// jumlah matakuliah
$mata_kuliah = mysqli_query($conn, "SELECT * FROM mata_kuliah;");
$countmata_kuliah = mysqli_num_rows($mata_kuliah);

// jumlah kelas
$kelas = mysqli_query($conn, "SELECT * FROM kelas;");
$countkelas = mysqli_num_rows($kelas);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Panel Admin | Dashboard</title>
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
                        <h1>| Dashboard</h1>
                    </div>
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