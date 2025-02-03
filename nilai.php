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
<nav style="background: linear-gradient(#0062ff, #6a9cee);" class="navbar navbar-expand-lg" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="index.php">Aplikasi Penilaian</a>
        <button class="navbar-toggler mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="button-1 rounded nav-link text-white" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item ms-1">
              <a class="button-1 rounded nav-link text-white" href="mahasiswa.php">Data Mahasiswa</a>
            </li>
            <li class="nav-item ms-1">
              <a class="button-1 rounded nav-link text-white" href="matkul.php">Data Mata Kuliah</a>
            </li>
            <li class="nav-item ms-1">
              <a class="button-1 rounded nav-link text-white" href="dosen.php">Data Dosen</a>
            </li>
            <li class="nav-item ms-1">
              <a class="button-1 rounded nav-link text-white" href="nilai.php">Data Penilaian</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<div class="ms-4 mt-3 col-4">
  <h3>Tambah Data Nilai</h3>
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
  <form action="aksi-tambah-nilai.php" method="post">

    <label for="">NIM</label>
        <select name="nim" id="" class="form-control">
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
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
        <option value="F">F</option>
       </select>
    <input type="submit" class="mt-4 btn btn-success form-control" value="Tambah">
  </form>
</div>
<div class="wrapper">
<h3 class="mt-1">Data Nilai</h3>
<div class="col-4">
  <h5>Cari Data</h5>
  <form action="nilai.php" method="get">

    <input type="text" name="cari" placeholder="Masukkan Kata Kunci" id="" required="required">
    <select name="berdasarkan" id="">
      <option value="nip">NIM</option>
      <option value="nama_mhs">Nama</option>
    </select>
    <input type="submit" class="btn btn-sm btn-primary" value="Cari">
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