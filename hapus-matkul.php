<?php 
include "koneksi.php";
$kode_mk = $_GET['kode_mk'];
$query = mysqli_query($conn, "delete from matakuliah where kode_mk = '$kode_mk'");
if (!$query) {
    header("location:matkul.php?pesan=gagal");
    # code...
}else{
    header("location:matkul.php?pesan=hapus");
}