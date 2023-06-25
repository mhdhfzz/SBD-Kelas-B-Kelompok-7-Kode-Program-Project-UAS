<?php
session_start();

include "../functions.php";

if( !isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}  
// ambil data di URL
$nim = $_GET["nim"];
$mhs = query("SELECT * FROM mhs WHERE nim = '$nim'")[0];


if(isset($_POST["tambah"]) && isset($_POST["id_dosenkelas"])){
    if( tambahkrs($_POST) > 0 ) {
        echo "
            <script>
                alert('KRS Berhasil Ditambahkan');
            </script>  
        ";
        header("Location: krs.php?nim=$nim");
    }else {
        echo "
        <script>
            alert('KRS Gagal Ditambahkan');
        </script>  
        ";
        header("Location: tambah-krs.php?nim=$nim");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CE UNAND | KRS</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@3.3.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'>
    <link rel="stylesheet" href="../css/style.css">
    <!-- feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
    body {
        margin: 0;
        height: 100vh;
        font-family: "Poppins", sans-serif;
        /* color: var(--sec); */
        background-color: var(--sec);
        font-size: 0.9rem;
    }

    .container2 {
        margin-left: auto;
        margin-right: auto;
        padding-top: 7rem;
    }

    .container2 h1 {
        margin-bottom: 3rem;
    }

    .container2 h2 {
        text-align: center;
        color: var(--primary);
    }

    .container2 a,
    .container2 button {
        background-color: var(--primary);
        border-radius: 10px;
        padding-left: 1.3rem;
        padding-right: 1.3rem;
        padding-top: 0.3rem;
        padding-bottom: 0.3rem;
        font-size: 15px;
    }

    .layout .content {
        padding: 12px 50px;
        display: flex;
        flex-direction: column;
    }

    .container2 h1 {
        text-align: center;
        font-size: 2rem;
        color: var(--primary);
    }

    .container2 a,
    .container2 button {
        color: #fff;
    }

    .container a:hover,
    .container2 a:hover,
    .container2 button:hover {
        color: var(--sec);
    }

    table td,
    table th {
        vertical-align: middle;
        text-align: center;
        padding: 20px !important;
        border: 1px solid var(--primary);
    }

    table {
        border: 1px solid var(--primary);
    }

    td,
    th {
        color: var(--primary);
    }
    </style>

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


    <div id="overlay" class="overlay"></div>
    <div class="layout">
        <main class="content">
            <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                <i class="ri-menu-line ri-xl"></i>
            </a>
            <div class="container2">
                <div>
                    <h1>Kartu Rencana Studi</h1>
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
                            <th><input type="checkbox" onchange="selectAll(this)"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="" method="post" onsubmit="return konfirmasi()">
                            <input type="hidden" name="nim" value="<?= $nim ?>">
                            <?php
                                    $i = 1;
                                    $sqlSelect = "SELECT DISTINCT * FROM mhs, mata_kuliah, kelas, dosenkelas, dosen, semester WHERE mhs.nim = $nim AND dosen.nip = dosenkelas.nip AND kelas.kode_matkul = mata_kuliah.kode_matkul AND kelas.kode_kelas = dosenkelas.kode_kelas AND semester.id_sms = mhs.id_sms";
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
                                <input type="hidden" name="semester" value="<?= $data["semester"]; ?>">
                                <td><input type="checkbox" class="siswa" name="id_dosenkelas[]"
                                        value="<?= $data['id_dosenkelas'];?>"></td>
                            </tr>
                            <?php $i++; ?>
                            <?php } ?>
                    </tbody>
                    <div>
                        <h1>
                            <button><a href="krs.php?nim=<?= $nim ?>">Back</a></button>
                            <button href="" name="tambah" class=""><i
                                    class="ri-add-fill"></i>
                                Tambah KRS</button>
                        </h1>
                    </div>
                </table>
            </div>
        </main>
    </div>
    <br />
    <div class="overlay"></div>

    <!-- partial -->
    <script src='https://unpkg.com/@popperjs/core@2'></script>

    <script>
    function konfirmasi() {
        return confirm('Apakah ada yakin menambah Mata Kuliah tersebut?');
    }

    function selectAll(input) {
        let checkboxes = document.querySelectorAll('.siswa');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = input.checked;
        });
    }
    </script>

    <!-- Feather Icons -->
    <script>
    feather.replace()
    </script>


</body>

</html>
