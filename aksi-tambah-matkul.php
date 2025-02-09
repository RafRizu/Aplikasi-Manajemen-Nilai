<?php
include "koneksi.php";
session_start();
if ($_SESSION['status'] != true) {
    header("location:login.php");
    # code...
}
?>
<?php
include "koneksi.php";
$kode_mk = $_POST['kode_mk'];
$nama_mk = $_POST['nama_mk'];
$sks = $_POST['sks'];


$query = mysqli_query($conn,"insert into matakuliah values('$kode_mk','$nama_mk','$sks')");

if (!$query) {
    header("location:matkul.php?pesan=gagal");
    # code...
}else{
    header("location:matkul.php?pesan=input");
}