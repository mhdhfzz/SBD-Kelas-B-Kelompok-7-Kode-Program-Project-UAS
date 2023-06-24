<?php
session_start();

if( !isset($_SESSION["login_admin"])) {
    header("Location: ../login.php");
    exit;
}  
include "../functions.php";

$data = $_GET["kode_matkul"];
if (hapusmatkul($data) > 0 ) {
    echo "
        <script>
            alert('Mata Kuliah Berhasil Dihapus');
            document.location.href = 'mata-kuliah.php';
        </script>  
        ";
} else {
    echo "
        <script>
            alert('Mata Kuliah Gagal Dihapus');
            document.location.href = 'mata-kuliah.php';
        </script>  
        ";
}
?>