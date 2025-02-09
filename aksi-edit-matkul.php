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

$query = mysqli_query($conn,"update matakuliah set nama_mk='$nama_mk',sks='$sks' where kode_mk='$kode_mk'");

if (!$query) {
    header("location:matkul.php?pesan=gagal");
    # code...
}else{
    header("location:matkul.php?pesan=edit");
}