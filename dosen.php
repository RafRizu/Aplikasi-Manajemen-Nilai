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
    <a class="navbar-brand" href="#">Aplikasi Nilai</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mahasiswa.php">Data Mahasiswa</a>
          <!-- <a class="nav-link" aria-current="page" href="#">Home</a> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="matkul.php">Data Mata Kuliah</a>
          <!-- <a class="nav-link" aria-current="page" href="#">Home</a> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dosen.php">Data Dosen</a>
          <!-- <a class="nav-link" aria-current="page" href="#">Home</a> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="nilai.php">Data Nilai</a>
          <!-- <a class="nav-link" aria-current="page" href="#">Home</a> -->
        </li>

      </ul>
    </div>
  </div>
</nav>
<div class="ms-4 mt-3 col-4">
  <h3>Tambah Data Dosen</h3>
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
      echo "Data Berhasil Dihapus";
      # code...
    }else{
      echo "Data Gagal Diubah";
      # code...
    }
    # code...
  }
  ?>
  <form action="aksi-tambah-dosen.php" method="post">

    <label for="">NIP</label>
    <input type="text" name="nip" id="" required="required" class="form-control">
    <label for="">Nama Dosen</label>
    <input type="text" name="nama_dosen" required="required" id="" class="form-control">
    <input type="submit" class="mt-4 btn btn-success form-control" value="Tambah">
  </form>
</div>
<div class="wrapper">
<h3 class="mt-1">Data Dosen</h3>
<div class="col-4">
  <h5>Cari Data</h5>
  <form action="dosen.php" method="get">

    <input type="text" name="cari" placeholder="Masukkan Kata Kunci" id="" required="required">
    <select name="berdasarkan" id="">
      <option value="nip">NIP</option>
      <option value="nama_dosen">Nama</option>
    </select>
    <input type="submit" class="btn btn-sm btn-primary" value="Cari">
  </form>
</div>
  <table class="table table-striped table-bordered mt-3">
      <tr>
          <thead>
              <th>No</th>
              <th>NIP</th>
              <th>Nama Dosen</th>
              <th>Aksi</th>
          </thead>
  
      </tr>
<?php
include "koneksi.php";
$no = 1;
if (isset($_GET['cari'])) {
  $cari = $_GET['cari'];
  $berdasarkan = $_GET['berdasarkan'];
  $query = mysqli_query($conn,"select * from dosen where ".$berdasarkan." like '%".$cari."%'");

}else {
  # code...
  $query = mysqli_query($conn,"select * from dosen");
}


while ($d = mysqli_fetch_array($query)) {
  # code...

?>
<tbody>
      <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $d['nip'] ?></td>
          <td><?php echo $d['nama_dosen'] ?></td>
          <td style="width:120px">
            <a href="edit-dosen.php?nip=<?php echo $d['nip'] ?>" class="btn btn-sm btn-primary">Edit</a>
            <a href="hapus-dosen.php?nip=<?php echo $d['nip'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus?')">Hapus</a>
          </td>
      </tr>
</tbody>
      <?php } ?>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>