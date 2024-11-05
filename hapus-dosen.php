<?php 
include "koneksi.php";
$nip = $_GET['nip'];
$query = mysqli_query($conn, "delete from dosen where nip = '$nip'");
if (!$query) {
    header("location:dosen.php?pesan=gagal");
    # code...
}else{
    header("location:dosen.php?pesan=hapus");
}