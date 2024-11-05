<?php
include "koneksi.php";
$nim = $_POST['nim'];
$nama_mhs = $_POST['nama_mhs'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];


$query = mysqli_query($conn,"insert into mahasiswa values('$nim','$nama_mhs','$tgl_lahir','$alamat','$jenis_kelamin')");

if (!$query) {
    header("location:mahasiswa.php?pesan=gagal");
    # code...
}else{
    header("location:mahasiswa.php?pesan=input");
}