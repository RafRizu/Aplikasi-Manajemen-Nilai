<?php
include "koneksi.php";
$nip = $_POST['nip'];
$nama_dosen = $_POST['nama_dosen'];


$query = mysqli_query($conn,"insert into dosen values('$nip','$nama_dosen')");

if (!$query) {
    header("location:dosen.php?pesan=gagal");
    # code...
}else{
    header("location:dosen.php?pesan=input");
}