<?php
session_start();

if( !isset($_SESSION["login_admin"])) {
    header("Location: ../login.php");
    exit;
}  
include "../functions.php";

// ambil data di URL
$kode_kelas = $_GET["kode_kelas"];
// query data kelas
$kelas = query("SELECT * FROM kelas WHERE kode_kelas = '$kode_kelas'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {
    // cek apakah data berhasil diubah atau tidak
    if( ubahkelas($_POST) > 0 ) {
        echo "
            <script>
                alert('Kelas Berhasil Diedit');
                document.location.href = 'kelas.php';
            </script>  
        ";
    }else {
        echo "
        <script>
            alert('Kelas Gagal Diedit');
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
                        <h1>Edit | Kelas</h1>
                    </div>
                    <div>
                        <h1><a href="kelas.php" class=""><i class="ri-arrow-left-line"></i> Back</a></h1>
                    </div>
                </div>

                <div class="container-add">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $kelas['kode_kelas']; ?>">
                        <div class="isian">
                            <select name="nama_matkul" id="" class="form-control">
                                <option value="">Select MataKuliah :</option>
                                <?php
                                $sqlSelect = "SELECT * FROM mata_kuliah";
                                $result = mysqli_query($conn,$sqlSelect);
                                while($data = mysqli_fetch_array($result)){
                                ?>
                                <option value="<?= $data["nama_matkul"]; ?>" <?php if($data['kode_matkul'] === $kelas['kode_kelas']){echo "selected" ;}
                                    ?>><?= $data["nama_matkul"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>

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
                            <select name="jadwal" id="" class="form-control">
                                <option value="">Select Jadwal Kelas:</option>
                                <option value="07.30 - 09.10"
                                    <?php if($kelas["jadwal"]=="07.30 - 09.10"){echo "selected";} ?>>Shift 1 (07.30 -
                                    09.10)</option>
                                <option value="09.20 - 11.00"
                                    <?php if($kelas["jadwal"]=="09.20 - 11.00"){echo "selected";} ?>>Shift 2 (09.20 -
                                    11.00)</option>
                                <option value="11.10 - 12.50"
                                    <?php if($kelas["jadwal"]=="11.10 - 12.50"){echo "selected";} ?>>Shift 3 (11.10 -
                                    12.50)</option>
                                <option value="13.30 - 15.10"
                                    <?php if($kelas["jadwal"]=="13.30 - 15.10"){echo "selected";} ?>>Shift 4 (13.30 -
                                    15.10)</option>
                                <option value="16.00 - 17.40"
                                    <?php if($kelas["jadwal"]=="16.00 - 17.40"){echo "selected";} ?>>Shift 5 (16.00 -
                                    17.40)</option>
                            </select>
                        </div>
                        <div class="isian">
                            <input type="text" class="form-control" name="ruangan" placeholder="Ruang Kelas :"
                                value="<?= $kelas['ruangan']; ?>">
                        </div>
                        <div class="isian">
                            <select name="hari" id="" class="form-control">
                                <option value="">Select Hari:</option>
                                <option value="senin" <?php if($kelas["hari"]=="senin"){echo "selected";} ?>>Hari Senin
                                </option>
                                <option value="selasa" <?php if($kelas["hari"]=="selasa"){echo "selected";} ?>>Hari
                                    Selasa</option>
                                <option value="rabu" <?php if($kelas["hari"]=="rabu"){echo "selected";} ?>>Hari Rabu
                                </option>
                                <option value="kamis" <?php if($kelas["hari"]=="kamis"){echo "selected";} ?>>Hari Kamis
                                </option>
                                <option value="jumat" <?php if($kelas["hari"]=="jumat"){echo "selected";} ?>>Hari Jum'at
                                </option>
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