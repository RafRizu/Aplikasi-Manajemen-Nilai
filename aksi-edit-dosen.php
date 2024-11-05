<?php
include "koneksi.php";
$nip = $_POST['nip'];
$nama_dosen = $_POST['nama_dosen'];

$query = mysqli_query($conn,"update dosen set nama_dosen='$nama_dosen' where nip='$nip'");

if (!$query) {
    header("location:dosen.php?pesan=gagal");
    # code...
}else{
    header("location:dosen.php?pesan=edit");
}