<?php
session_start();

include "../functions.php";

if( !isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}  

if(isset($_POST["delete"]) && isset($_POST["id_dosenkelas"])){
    foreach($_POST["id_dosenkelas"] as $id_dosenkelas){
        $delete = "DELETE FROM krs WHERE id_dosenkelas = $id_dosenkelas";
        mysqli_query($conn, $delete);
    }
}

// ambil data di URL
$nim = $_GET["nim"];
$mhs = query("SELECT * FROM mhs WHERE nim = '$nim'")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Panel Admin | KRS</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@3.3.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'>

    <!-- My Style -->
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
        margin-bottom: 2rem;
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
        <div class="container2">
            <h1>Kartu Rencana Studi</h1>
            <div class="upload">
                <img src="../img/<?= $mhs['gambar']; ?>" id="image">
                <div class="rightRound" id="upload">
                    <input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png">
                    <i data-feather="camera"></i>
                </div>
            </div>
            <h2>Nama : <?= $mhs["nama"]; ?></h2>
            <h2>NIM : <?= $mhs["nim"]; ?></h2>

            <table class="table" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kelas</th>
                        <th>Nama MataKuliah</th>
                        <th>Jumlah SKS</th>
                        <th>Dosen</th>
                        <th>Status</th>
                        <th><input type="checkbox" onchange="selectAll(this)"></th>
                    </tr>
                </thead>
                <tbody>
                    <form action="" method="post" onsubmit="return konfirmasi()">
                        <?php
                                $i = 1;
                                $sqlSelect = "SELECT dk.kode_kelas, mk.nama_matkul, mk.sks, d.nama, s.setatus, k.id_dosenkelas FROM krs AS k
INNER JOIN dosenkelas AS dk ON k.id_dosenkelas = dk.id_dosenkelas
INNER JOIN kelas AS kl ON kl.kode_kelas = dk.kode_kelas
INNER JOIN mata_kuliah AS mk ON mk.kode_matkul = kl.kode_matkul
INNER JOIN dosen AS d ON d.nip = dk.nip
INNER JOIN status AS s ON s.id_status = k.id_status
WHERE k.nim = '$nim'";
                                $result = mysqli_query($conn,$sqlSelect);
                                while($data = mysqli_fetch_array($result)){
                                ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $data["kode_kelas"]; ?></td>
                            <td><?= $data["nama_matkul"]; ?></td>
                            <td><?= $data["sks"]; ?></td>
                            <td><?= $data["nama"]; ?></td>
                            <td><?= $data["setatus"]; ?></td>
                            <td><input type="checkbox" class="siswa" name="id_dosenkelas[]"
                                    value="<?= $data['id_dosenkelas'];?>"></td>
                            <?php $i++; ?>
                            <?php } ?>
                            <div>
                                <h1>
                                    <button><a href="tambah-krs.php?nim=<?= $nim ?>" class=""><i
                                                class="ri-add-fill"></i> ISI KRS</a></button> |
                                    <button href="hapus-krs.php?nim=<?= $nim ?>" name="delete" class=""><i
                                            class="ri-subtract-fill"></i>
                                        HAPUS KRS</button>
                                </h1>
                            </div>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
    <br />
    <div class="overlay"></div>

    <!-- partial -->
    <script src='https://unpkg.com/@popperjs/core@2'></script>
    <script src="./script.js"></script>

    <!-- Feather Icons -->
    <script>
    feather.replace()
    </script>

    <script>
    function konfirmasi() {
        return confirm('Apakah ada yakin menghapus data Mata Kuliah tersebut?');
    }

    function selectAll(input) {
        let checkboxes = document.querySelectorAll('.siswa');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = input.checked;
        });
    }
    </script>


</body>

</html>
