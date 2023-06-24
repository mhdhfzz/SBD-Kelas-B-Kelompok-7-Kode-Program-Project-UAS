<?php
session_start();

if( !isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}  

include "../functions.php";

$matkul = query("SELECT nip, nama, kelamin FROM dosen");
//   ambil data url
$nim = $_GET["nim"];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CE UNAND | Home</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet">

    <!-- My Style -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

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

    <!-- Hero Section start-->
    <section class="hero" id="home">
        <main class="content">
            <h1>SELAMAT DATANG DI DEPARTEMEN</h1>
            <H1>TEKNIK <span>KOMPUTER</span></H1>

        </main>
    </section>
    <!-- Hero Section end-->


    <!-- About Section start -->
    <section id="about" class="about">
        <h2><span>About</span></h2>

        <div class="row">
            <div class="about-img">
                <img src="../img/ce.jpg" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Sejarah</h3>
                <p>Jurusan Teknik Komputer yang sebelumnya bernama Sistem Komputer merupakan salah satu jurusan yang ada
                    di Fakultas Teknologi Informasi Universitas Andalas. Jurusan ini didirikan pada tanggal 15 Juli 2008
                    melalui Surat Keputusan Jenderal pendidikan tinggi Departemen Pendidikan Nasional Nomor
                    2204/D/T/2008 dengan program studi S1 Sistem Komputer di bawah Jurusan Matematika Fakultas
                    Matematika dan Ilmu Pengetahuan Alam. Jurusan Sistem Komputer bergabung dengan Jurusan Sistem
                    Informasi membentuk Fakultas Teknologi Informasi pada tanggal 12 Oktober 2012.</p>
                <p>Untuk menyesuaikan dengan nomenklatur penamaan jurusan dari DIKTI maka nama jurusan berubah menjadi
                    Teknik Komputer dan gelar lulusan disesuaikan dengan gelar Sarjana Teknik (ST), pada tanggal 8 Juli
                    2020 melalui Keputusan Menteri Pendidikan dan Kebudayaan Nomor 630/M/2020.</p>
            </div>
        </div>
    </section>
    <!-- About Section start -->

    <!-- Menu Section start -->
    <section id="staff" class="menu">
        <h2><span>Staff | Dosen</span></h2>

        <div class="row">
            <?php $i = 1; ?>
            <?php foreach( $matkul as $row) : ?>
            <div class="menu-card">
                <img src="https://source.unsplash.com/400x400/?profile-photo-<?= $i; ?>" alt="<?= $row["nama"]; ?>"
                    class="menu-card-img" />
                <h3 class="menu-card-title"><?= $row["nama"]; ?></h3>
                <p class="menu-card-price"><?= $row["nip"]; ?></p>
                <p class="menu-card-price"><?php if($row["kelamin"] === "L" ) {
                echo "Laki-Laki";
            } else { echo "Perempuan"; }; ?></p>
            </div>
            <?php $i++; ?>
            <?php endforeach; ?>

        </div>
    </section>
    <!-- Menu Section end -->

    <!-- Contact Section start-->
    <section id="contact" class="contact">
        <h2><span>Kontak</span></h2>
        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3091653027473!2d100.45621568436893!3d-0.9153574329328092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b7cb32c231fd%3A0x926b67435799f763!2sDepartemen%20Teknik%20Komputer%20Universitas%20Andalas!5e0!3m2!1sid!2sid!4v1687101614293!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="nama">
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" placeholder="email">
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="no hp">
                </div>
                <button type="submit" class="btn">Kirim pesan</button>
            </form>
        </div>

    </section>
    <!-- Contact Section end -->

    <!-- Footer start -->
    <footer>
        <div class="sosials">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
        </div>

        <div class="links">
            <a href="#">Home</a>
            <a href="#about">About</a>
            <a href="#staff">Dosen</a>
            <a href="#contact">Kontak</a>

        </div>

        <div class="credit">
            <p>Created by <a href="">kelompok7 | sistembasisdata</a>. | &copy 2023.</p>
        </div>
    </footer>
    <!-- Footer end -->

    <!-- Feather Icons -->
    <script>
    feather.replace()
    </script>

    <!-- My Javascript -->
    <script src="../js/script.js"></script>
</body>

</html>
