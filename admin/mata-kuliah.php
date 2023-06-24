<?php
session_start();

if( !isset($_SESSION["login_admin"])) {
    header("Location: ../login.php");
    exit;
}  
include "../functions.php";
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
                        <h1>MataKuliah</h1>
                    </div>
                    <div>
                        <h1><a href="tambah-matkul.php" class=""><i class="ri-add-fill"></i> Add</a></h1>
                    </div>
                </div>

                <div class="container2">
                    <table class="table" cellpadding="5" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode MataKuliah</th>
                                <th>Nama Matkul</th>
                                <th>Jumlah SKS</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                $sqlSelect = "SELECT kode_matkul, nama_matkul, sks FROM mata_kuliah";
                                $result = mysqli_query($conn,$sqlSelect);
                                while($data = mysqli_fetch_array($result)){
                                ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $data["kode_matkul"]; ?></td>
                                <td><?= $data["nama_matkul"]; ?></td>
                                <td><?= $data["sks"]; ?></td>
                                <td><a href="ubah-matkul.php?kode_matkul=<?= $data["kode_matkul"]; ?>" class="">Edit</a>
                                    | <a href="hapus-matkul.php?kode_matkul=<?= $data["kode_matkul"]; ?>" class=""
                                        onclick="return confirm('ingin menghapus <?= $data['nama_matkul']; ?> ?');">Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
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