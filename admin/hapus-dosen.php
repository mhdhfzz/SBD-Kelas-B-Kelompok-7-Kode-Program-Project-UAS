<?php
session_start();

if( !isset($_SESSION["login_admin"])) {
    header("Location: ../login.php");
    exit;
}  
  include "../functions.php";

$nip = $_GET["nip"];
if (hapusdosen($nip) > 0 ) {
  echo "
      <script>
          alert('Dosen Berhasil Dihapus');
          document.location.href = 'dosen.php';
      </script>  
      ";
} else {
  echo "
      <script>
          alert('Dosen Kuliah Gagal Dihapus');
          document.location.href = 'dosen.php';
      </script>  
      ";
}
?>