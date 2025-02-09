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
$nim = $_POST['nim'];
$kode_mk = $_POST['kode_mk'];
$nip = $_POST['nip'];
$nilai = $_POST['nilai'];
$query = mysqli_query($conn,"update perkuliahan set nim='$nim',kode_mk='$kode_mk',nip='$nip',nilai='$nilai' where nim='$nim'");

if (!$query) {
    header("location:nilai.php?pesan=gagal");
    # code...
}else{
    header("location:nilai.php?pesan=edit");
}