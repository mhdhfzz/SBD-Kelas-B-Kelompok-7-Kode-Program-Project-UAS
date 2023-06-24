<?php
session_start();

if( !isset($_SESSION["login_admin"])) {
    header("Location: ../login.php");
    exit;
}  
include "../functions.php";

$data = $_GET["kode_kelas"];
if (hapuskelas($data) > 0 ) {
    echo "
        <script>
            alert('Kelas Berhasil Dihapus');
            document.location.href = 'kelas.php';
        </script>  
        ";
} else {
    echo "
        <script>
            alert('Kelas Gagal Dihapus');
            document.location.href = 'kelas.php';
        </script>  
        ";
}
?>