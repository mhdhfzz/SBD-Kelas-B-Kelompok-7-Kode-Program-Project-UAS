<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "krs";

// Koneksi dan memilih database di server
	
$conn = mysqli_connect($server,$username,$password,$database);

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc(($result))) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahkrs($data) {
    global $conn;
    foreach($data["id_dosenkelas"] as $id_dosenkelas){
        $nim = htmlspecialchars($_POST["nim"]);
        // $id_sms = htmlspecialchars($_POST["id_sms"]);
        $tambah = "INSERT INTO krs VALUES ('$nim', '$nim', '$id_dosenkelas', 'S')";
        mysqli_query($conn, $tambah);
    }
    return mysqli_affected_rows($conn);
}

function hapuskrs($data) {
    global $conn;
    $query = "DELETE FROM mata_kuliah WHERE kode_matkul = '$data'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahmatkul($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $kode_matkul = htmlspecialchars($data["kode_matkul"]);
    $nama_matkul = htmlspecialchars($data["nama_matkul"]);
    $sks = htmlspecialchars($data["sks"]);
    // query insert data
    $query = "INSERT INTO mata_kuliah VALUES ('$kode_matkul', '$nama_matkul', '$sks')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}   

function hapusmatkul($data) {
    global $conn;
    $query = "DELETE FROM mata_kuliah WHERE kode_matkul = '$data'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahmatkul($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $kode_matkul = htmlspecialchars($data["kode_matkul"]);
    $nama_matkul = htmlspecialchars($data["nama_matkul"]);
    $sks = htmlspecialchars($data["sks"]);
    // query insert data
    $query = "UPDATE mata_kuliah SET kode_matkul = '$kode_matkul', nama_matkul = '$nama_matkul', sks = '$sks' WHERE kode_matkul = '$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}   

function tambahkelas($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $kode_kelas = htmlspecialchars($data["kode_kelas"]);
    $nama_matkul = htmlspecialchars($data["nama_matkul"]);
    $nip = htmlspecialchars($data["dosen"]);
    $query = "SELECT * FROM mata_kuliah WHERE nama_matkul = '$nama_matkul'";
    $result = mysqli_query($conn, $query);
    $data_ = mysqli_fetch_array($result);
    $kode_matkul = $data_["kode_matkul"];

    $jadwal = htmlspecialchars($data["jadwal"]);
    $ruangan = htmlspecialchars($data["ruangan"]);
    $hari = htmlspecialchars($data["hari"]);

    // cek kelas sudah ada atau belum
    $result = mysqli_query($conn, "SELECT kode_kelas FROM kelas WHERE kode_kelas = '$kode_matkul/$kode_kelas'");
    if( mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('kelas sudah terdaftar')
                </script>";
        return false;
    }

    // query insert data
    $query = "INSERT INTO kelas VALUES ('$kode_matkul/$kode_kelas', '$kode_matkul', '$jadwal', '$ruangan', '$hari')";
    $query_ = "INSERT INTO dosenkelas VALUES ('', '$nip', '$kode_matkul/$kode_kelas')";
    mysqli_query($conn, $query);
    mysqli_query($conn, $query_);
    return mysqli_affected_rows($conn);
}  


function hapuskelas($data) {
    global $conn;
    $query = "DELETE FROM kelas WHERE kode_kelas = '$data'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}  

function ubahkelas($data) {
    global $conn;
    $id = $data["id"];
    // ambil data dari tiap elemen dalam form
    $kode_kelas = htmlspecialchars($data["kode_kelas"]);
    $nama_matkul = htmlspecialchars($data["nama_matkul"]);
    $query = "SELECT * FROM mata_kuliah WHERE nama_matkul = '$nama_matkul'";
    $result = mysqli_query($conn, $query);
    $data_ = mysqli_fetch_array($result);
    $kode_matkul = $data_["kode_matkul"];

    $jadwal = htmlspecialchars($data["jadwal"]);
    $ruangan = htmlspecialchars($data["ruangan"]);
    $hari = htmlspecialchars($data["hari"]);

    // query insert data
    $query = "UPDATE kelas SET kode_kelas = '$kode_matkul/$kode_kelas', kode_matkul = '$kode_matkul', jadwal = '$jadwal', ruangan = '$ruangan', hari = '$hari' WHERE kode_kelas = '$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}   

function tambahdosen($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nip = htmlspecialchars($data["nip"]);
    $nama = htmlspecialchars($data["nama"]);
    $kelamin = htmlspecialchars($data["kelamin"]);
    // query insert data
    $query = "INSERT INTO dosen VALUES ('$nip', '$nama', '$kelamin')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}   

function hapusdosen($nip) {
    global $conn;
    $query = "DELETE FROM dosen WHERE nip = '$nip'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahdosen($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nip = htmlspecialchars($data["nip"]);
    $nama = htmlspecialchars($data["nama"]);
    $kelamin = htmlspecialchars($data["kelamin"]);
    // query insert data
    $query = "UPDATE dosen SET nip = '$nip', nama = '$nama', kelamin = '$kelamin' WHERE nip = '$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}  


function tambahmhs($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $kelamin = htmlspecialchars($data["kelamin"]);
    // query insert data
    $query = "INSERT INTO mhs VALUES ('$nim', '$nama', '$kelamin', '', '', '01', null, '')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}   

function hapusmhs($nim) {
    global $conn;
    $query = "DELETE FROM mhs WHERE nim = '$nim'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahmhs($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $kelamin = htmlspecialchars($data["kelamin"]);
    // query insert data
    $query = "UPDATE mhs SET nim = '$nim', nama = '$nama', kelamin = '$kelamin' WHERE nim = '$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}  

function ubahprofile($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $kelamin = htmlspecialchars($data["kelamin"]);
    // query insert data
    $query = "UPDATE mhs SET nim = '$nim', nama = '$nama', kelamin = '$kelamin' WHERE nim = '$id'";
    mysqli_query($conn, $query);
    return $nim;
}  


function registrasi($data) {
    global $conn;

    $nim = strtolower(stripslashes ($data["nim"]));
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kelamin = $_POST['kelamin'];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $semester = $_POST['semester'];


    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT nim FROM mhs WHERE nim = '$nim'");
    if( mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('akun sudah terdaftar')
                </script>";
        return false;
    }

    // cek konfirmasi password
    if( $password !== $password2) {
        echo "<script>
                alert('Password tidak sesuai');
                </script>";
        return false;
    }
    
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO mhs VALUES('$nim','$nama','$kelamin', '$password', '', '$semester', NULL, '', '')");

    return mysqli_affected_rows($conn);
}



?>