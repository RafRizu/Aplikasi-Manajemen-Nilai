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
  <h3>Edit Data Mata Kuliah</h3>
  <?php 
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
      echo "Data Berhasil Diedit";
      # code...
    }else{
      echo "Data Gagal Diubah";
      # code...
    }
    # code...
  }
  ?>
  <form action="aksi-edit-matkul.php" method="post">

  <?php
include "koneksi.php";
    $kode_mk = $_GET['kode_mk'];
    $qedit = mysqli_query($conn,"select * from matakuliah where kode_mk = '$kode_mk'");
    while ($data = mysqli_fetch_array($qedit)) {
        # code...
    
  ?>

    <label for="">Kode Mata Kuliah</label>
    <input type="text" name="kode_mk" id="" value="<?php echo $data['kode_mk'] ?>" required="required" readonly class="form-control">
    <label for="">Nama Mata Kuliah</label>
    <input type="text" name="nama_mk" value="<?php echo $data['nama_mk'] ?>" required="required" id="" class="form-control">
    <label for="">Jumlah SKS</label>
    <input type="text" name="sks" value="<?php echo $data['sks'] ?>" required="required" id="" class="form-control">
    <input type="submit" class="mt-4 btn btn-success form-control" value="Simpan">
    <a href="dosen.php" onclick="return confirm('Data tidak akan tersimpan, Yakin kembali?')" class="mt-2 btn btn-danger form-control">Kembali</a>
    <?php } ?>
  </form>
</div>
<div class="wrapper">
<h3 class="mt-1">Data Mata Kuliah</h3>
<div class="col-4">
  <h5>Cari Data</h5>
  <form action="matkul.php" method="get">

    <input type="text" disabled="disabled" name="cari" placeholder="Masukkan Kata Kunci" id="" required="required">
    <select disabled="disabled" name="berdasarkan" id="">
      <option value="kode_mk">Kode Matkul</option>
      <option value="nama_mk">Nama</option>
    </select>
    <input type="submit" class="btn btn-sm btn-primary disabled" value="Cari">
  </form>
</div>
  <table class="table table-striped table-bordered mt-3">
      <tr>
          <thead>
              <th>No</th>
              <th>Kode Mata Kuliah</th>
              <th>Nama Kuliah</th>
              <th>SKS</th>
              <th>Aksi</th>
          </thead>
  
      </tr>
<?php

$no = 1;
if (isset($_GET['cari'])) {
  $cari = $_GET['cari'];
  $berdasarkan = $_GET['berdasarkan'];
  $query = mysqli_query($conn,"select * from matakuliah where ".$berdasarkan." like '%".$cari."%'");

}else {
  # code...
  $query = mysqli_query($conn,"select * from matakuliah");
}


while ($d = mysqli_fetch_array($query)) {
  # code...

?>
<tbody>
      <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $d['kode_mk'] ?></td>
          <td><?php echo $d['nama_mk'] ?></td>
          <td><?php echo $d['sks'] ?></td>
          <td style="width:120px">
            <a href="edit-matkul.php?nip=<?php echo $d['kode_mk'] ?>" class="btn btn-sm btn-primary">Edit</a>
            <a href="hapus-matkul.php?nip=<?php echo $d['kode_mk'] ?>" class="btn btn-sm btn-danger">Hapus</a>
          </td>
      </tr>
</tbody>
      <?php } ?>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>