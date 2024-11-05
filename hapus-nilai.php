<?php 
include "koneksi.php";
$nim = $_GET['nim'];
$query = mysqli_query($conn, "delete from perkuliahan where nim = '$nim'");
if (!$query) {
    header("location:nilai.php?pesan=gagal");
    # code...
}else{
    header("location:nilai.php?pesan=hapus");
}