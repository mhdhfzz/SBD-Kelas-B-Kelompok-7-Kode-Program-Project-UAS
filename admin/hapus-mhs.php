<?php
session_start();

if( !isset($_SESSION["login_admin"])) {
    header("Location: ../login.php");
    exit;
}  
include "../functions.php";

$nim = $_GET["nim"];
if (hapusmhs($nim) > 0 ) {
    echo "
        <script>
            alert('Mahasiswa Berhasil Dihapus');
            document.location.href = 'mahasiswa.php';
        </script>  
        ";
} else {
    echo "
        <script>
            alert('Mahasiswa Gagal Dihapus');
            document.location.href = 'mahasiswa.php';
        </script>  
        ";
}
?>