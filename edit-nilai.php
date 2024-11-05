<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">
    <title>Aplikasi Nilai</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Aplikasi Nilai</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Master Data
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="mahasiswa.php">Data Mahasiswa</a></li>
            <li><a class="dropdown-item" href="matkul.php">Data Mata Kuliah</a></li>
            <li><a class="dropdown-item" href="dosen.php">Data Dosen</a></li>
            <li><a class="dropdown-item" href="nilai.php">Data Nilai</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="ms-4 mt-3 col-4">
  <h3>Edit Data Nilai</h3>
  <?php 
  require_once "koneksi.php";
  if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    if ($pesan == "input") {
      echo "Data Berhasil Diinput";
      # code...
    }elseif ($pesan == "edit") {
      echo "Data Berhasil Diedit";
      # code...
    }
    elseif ($pesan == "hapus") {
      echo "Data Berhasil Dihapus";
      # code...
    }else{
      echo "Data Gagal Diubah";
      # code...
    }
    # code...
  }
  ?>
  <form action="aksi-edit-nilai.php" method="post">
<?php
$nim = $_GET['nim'];
$qnilai = mysqli_query($conn,"select * from nilai");
while ($dnilai = mysqli_fetch_array($qnilai)) {
    # code...


?>
    <label for="">NIM</label>
        <select name="nim" id="" class="form-control">
            <option value="<?php echo $dnilai['nim'] ?>"><?php echo $dnilai['nim']."-".$dnilai['nama'] ?></option>
            <option value="<?php echo $dnilai['nim'] ?>">------</option>
            <?php
                $qmhs = mysqli_query($conn,"select * from mahasiswa");
                while ($d = mysqli_fetch_array($qmhs)) {
                    # code...
                
            ?>
            <option value="<?php echo $d['nim'] ?>"><?php echo $d['nim']."-".$d['nama_mhs'] ?></option>
            <?php } ?>
        </select>
    <label for="">Kode Mata Kuliah</label>
        <select name="kode_mk" id="" class="form-control">
            <option value="<?php echo $dnilai['kode_mk'] ?>"><?php echo $dnilai['kode_mk']."-".$dnilai['matkul'] ?></option>
            <option value="<?php echo $dnilai['kode_mk'] ?>">------</option>
            <?php
                $qmkul = mysqli_query($conn,"select * from matakuliah");
                while ($d = mysqli_fetch_array($qmkul)) {
                    # code...
                
            ?>
            <option value="<?php echo $d['kode_mk'] ?>"><?php echo $d['kode_mk']."-".$d['nama_mk'] ?></option>
            <?php } ?>
        </select>
    <label for="">Dosen Pengampu</label>
        <select name="nip" id="" class="form-control">
            <option value="<?php echo $dnilai['nip'] ?>"><?php echo $dnilai['nip']."-".$dnilai['dosen'] ?></option>
            <option value="<?php echo $dnilai['nip'] ?>">------</option>
            <?php
                $qdos = mysqli_query($conn,"select * from dosen");
                while ($d = mysqli_fetch_array($qdos)) {
                    # code...
                
            ?>
            <option value="<?php echo $d['nip'] ?>"><?php echo $d['nip']."-".$d['nama_dosen'] ?></option>
            <?php } ?>
        </select>
       <label for="">Nilai</label>
       <select name="nilai" class="form-control" id="">
        <option value="<?php echo $dnilai['nilai'] ?>"><?php echo $dnilai['nilai'] ?></option>
        <option value="<?php echo $dnilai['nilai'] ?>">-------</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
        <option value="F">F</option>
       </select>
       <?php } ?>
    <input type="submit" class="mt-4 btn btn-success form-control" value="Simpan">
  </form>
</div>
<div class="wrapper">
<h3 class="mt-1">Data Nilai</h3>
<div class="col-4">
  <h5>Cari Data</h5>
  <form action="nilai.php" method="get">

    <input disabled="disabled" type="text" name="cari" placeholder="Masukkan Kata Kunci" id="" required="required">
    <select disabled="disabled" name="berdasarkan" id="">
      <option value="nip">NIM</option>
      <option value="nama_mhs">Nama</option>
    </select>
    <input disabled="disabled" type="submit" class="btn btn-sm btn-primary" value="Cari">
  </form>
</div>
  <table class="table table-striped table-bordered mt-3">
      <tr>
          <thead>
              <th>No</th>
              <th>NIM</th>
              <th>Nama Mahasiswa</th>
              <th>Jenis Kelamin</th>
              <th>Nama Mata Kuliah</th>
              <th>Jumlah SKS</th>
              <th>Nama Dosen</th>
              <th>Nilai</th>
              <th>Aksi</th>
          </thead>
  
      </tr>
<?php
include "koneksi.php";
$no = 1;
if (isset($_GET['cari'])) {
  $cari = $_GET['cari'];
  $berdasarkan = $_GET['berdasarkan'];
  $query = mysqli_query($conn,"select * from nilai where ".$berdasarkan." like '%".$cari."%'");

}else {
  # code...
  $query = mysqli_query($conn,"select * from nilai");
}


while ($d = mysqli_fetch_array($query)) {
  # code...

?>
<tbody>
      <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $d['nim'] ?></td>
          <td><?php echo $d['nama'] ?></td>
          <td><?php echo $d['jk'] ?></td>
          <td><?php echo $d['matkul'] ?></td>
          <td><?php echo $d['sks'] ?></td>
          <td><?php echo $d['dosen'] ?></td>
          <td><?php echo $d['nilai'] ?></td>
          <td style="width:120px">
            <a href="edit-nilai.php?nim=<?php echo $d['nim'] ?>" class="btn btn-sm btn-primary">Edit</a>
            <a href="hapus-nilai.php?nim=<?php echo $d['nim'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus?')">Hapus</a>
          </td>
      </tr>
</tbody>
      <?php } ?>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>