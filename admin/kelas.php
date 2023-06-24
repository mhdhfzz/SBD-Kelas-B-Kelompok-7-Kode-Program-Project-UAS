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
    <title>Panel Admin | Kelas</title>
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
                        <h1>Kelas</h1>
                    </div>
                    <div>
                        <h1><a href="tambah-kelas.php" class=""><i class="ri-add-fill"></i> Add</a></h1>
                    </div>
                </div>

                <div class="container2">
                    <table class="table" cellpadding="5" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kelas</th>
                                <th>Nama MataKuliah</th>
                                <th>Jumlah SKS</th>
                                <th>Jadwal</th>
                                <th>Ruangan</th>
                                <th>Hari</th>
                                <th>Dosen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                $sqlSelect = "SELECT * FROM mata_kuliah, kelas, dosenkelas, dosen WHERE kelas.kode_matkul = mata_kuliah.kode_matkul AND dosenkelas.nip = dosen.nip AND dosenkelas.kode_kelas = kelas.kode_kelas";
                                $result = mysqli_query($conn,$sqlSelect);
                                while($data = mysqli_fetch_array($result)){
                                ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $data["kode_kelas"]; ?></td>
                                <td><?= $data["nama_matkul"]; ?></td>
                                <td><?= $data["sks"]; ?></td>
                                <td><?= $data["jadwal"]; ?></td>
                                <td><?= $data["ruangan"]; ?></td>
                                <td><?= $data["hari"]; ?></td>
                                <td><?= $data["nama"]; ?></td>
                                <td><a href="ubah-kelas.php?kode_kelas=<?= $data["kode_kelas"]; ?>" class="">Edit</a> |
                                    <a href="hapus-kelas.php?kode_kelas=<?= $data["kode_kelas"]; ?>" class=""
                                        onclick="return confirm('ingin menghapus <?= $data['kode_kelas']; ?> ?');">Hapus</a>
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