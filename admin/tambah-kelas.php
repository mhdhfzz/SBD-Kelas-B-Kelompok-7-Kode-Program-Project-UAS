<?php
session_start();

if( !isset($_SESSION["login_admin"])) {
    header("Location: ../login.php");
    exit;
}  
include "../functions.php";

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if( tambahkelas($_POST) > 0 ) {
        echo "
            <script>
                alert('Kelas Berhasil Ditambahkan');
                document.location.href = 'kelas.php';
            </script>  
        ";
    }else {
        echo "
        <script>
            alert('Kelas Gagal Ditambahkan');
            document.location.href = 'kelas.php';
        </script>  
    ";
    }
}

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
                        <h1>Add | Kelas</h1>
                    </div>
                    <div>
                        <h1><a href="kelas.php" class=""><i class="ri-arrow-left-line"></i> Back</a></h1>
                    </div>
                </div>

                <div class="container-add">
                    <form action="" method="post">
                        <div class="isian">
                            <select name="kode_kelas" id="" class="form-control">
                                <option value="">Select Kelas :</option>
                                <option value="A">Kelas A</option>
                                <option value="B">Kelas B</option>
                                <option value="C">Kelas C</option>
                                <option value="D">Kelas D</option>
                            </select>
                        </div>

                        <div class="isian">
                            <select name="nama_matkul" id="" class="form-control">
                                <option value="">Select MataKuliah :</option>

                                <?php
                                $sqlSelect = "SELECT nama_matkul FROM mata_kuliah";
                                $result = mysqli_query($conn,$sqlSelect);
                                while($data = mysqli_fetch_array($result)){
                                ?>
                                <option value="<?= $data["nama_matkul"]; ?>"><?= $data["nama_matkul"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="isian">
                            <select name="dosen" id="" class="form-control">
                                <option value="">Select Dosen :</option>
                                <?php
                                $sqlSelect = "SELECT * FROM dosen";
                                $result = mysqli_query($conn,$sqlSelect);
                                while($data = mysqli_fetch_array($result)){
                                ?>
                                <option value="<?= $data["nip"]; ?>"><?= $data["nama"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="isian">
                            <select name="jadwal" id="" class="form-control">
                                <option value="">Select Jadwal Kelas:</option>
                                <option value="07.30 - 09.10">Shift 1 (07.30 - 09.10)</option>
                                <option value="09.20 - 11.00">Shift 2 (09.20 - 11.00)</option>
                                <option value="11.10 - 12.50">Shift 3 (11.10 - 12.50)</option>
                                <option value="13.30 - 15.10">Shift 4 (13.30 - 15.10)</option>
                                <option value="16.00 - 17.40">Shift 5 (16.00 - 17.40)</option>
                            </select>
                        </div>

                        <div class="isian">
                            <input type="text" class="form-control" name="ruangan" placeholder="Ruang Kelas :">
                        </div>

                        <div class="isian">
                            <select name="hari" id="" class="form-control">
                                <option value="">Select Hari:</option>
                                <option value="senin">Hari Senin</option>
                                <option value="selasa">Hari Selasa</option>
                                <option value="rabu">Hari Rabu</option>
                                <option value="kamis">Hari Kamis</option>
                                <option value="jumat">Hari Jum'at</option>
                            </select>
                        </div>

                        <div class="isian_">
                            <input type="submit" name="submit" value="Add Kelas" class="">
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