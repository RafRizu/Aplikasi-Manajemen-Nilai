<?php
include "koneksi.php";
$nim = $_POST['nim'];
$nama_mhs = $_POST['nama_mhs'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];

$query = mysqli_query($conn,"update mahasiswa set nama_mhs='$nama_mhs',tgl_lahir='$tgl_lahir',alamat='$alamat',jenis_kelamin='$jenis_kelamin' where nim='$nim'");

if (!$query) {
    header("location:mahasiswa.php?pesan=gagal");
    # code...
}else{
    header("location:mahasiswa.php?pesan=edit");
}