<?php
include "koneksi.php";
session_start();
if ($_SESSION['status'] != true) {
  header("location:login.php");
  # code...
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Aplikasi Nilai</title>
</head>

<body>
  <nav style="background: linear-gradient(#0062ff, #6a9cee);" class="navbar navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">Aplikasi Penilaian</a>
      <button class="navbar-toggler mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
          <li class="nav-item ms-1">
              <a class="button-1 rounded nav-link text-white" href="logout.php">Logout</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="ms-4 mt-3 col-4">
    <h3>Edit Data Mahasiswa</h3>
    <?php
    if (isset($_GET['pesan'])) {
      $pesan = $_GET['pesan'];
      if ($pesan == "input") {
        echo "Data Berhasil Diinput";
        # code...
      } elseif ($pesan == "edit") {
        echo "Data Berhasil Diedit";
        # code...
      } elseif ($pesan == "hapus") {
        echo "Data Berhasil Diedit";
        # code...
      } else {
        echo "Data Gagal Diubah";
        # code...
      }
      # code...
    }
    ?>
    <form action="aksi-edit-mahasiswa.php" method="post">

      <?php
      include "koneksi.php";
      $nim = $_GET['nim'];
      $qedit = mysqli_query($conn, "select * from mahasiswa where nim = '$nim'");
      while ($data = mysqli_fetch_array($qedit)) {
        # code...
      
        ?>

        <label for="">NIM</label>
        <input type="text" name="nim" id="" value="<?php echo $data['nim'] ?>" readonly required="required"
          class="form-control">
        <label for="">Nama Mahasiswa</label>
        <input type="text" name="nama_mhs" value="<?php echo $data['nama_mhs'] ?>" required="required" id=""
          class="form-control">
        <label for="prodi">Prodi</label>
        <select name="prodi" id="" class="form-control">
          <option value="<?php echo $data['prodi'] ?>"><?php echo $data['prodi'] ?></option>
          <option value="<?php echo $data['prodi'] ?>">------</option>
          <option value="TI">TI</option>
          <option value="DKV">DKV</option>
          <option value="SI">SI</option>
          <option value="MI">MI</option>
          <option value="MB">MB</option>
          <option value="MNJ">MNJ</option>
          n value="AK">AK</option>
        </select>
        <label for="">Semester</label>
        <select name="semester" id="" class="form-control">
          <option value="<?php echo $data['semester'] ?>"><?php echo $data['semester'] ?></option>
          <option value="<?php echo $data['semester'] ?>">------</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
        </select>
        <label for="">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir'] ?>" required="required" id=""
          class="form-control">
        <label for="">Alamat</label>
        <input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" required="required" id=""
          class="form-control">
        <label for="">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="" class="form-control">
          <option value="<?php echo $data['jenis_kelamin'] ?>"><?php echo $data['jenis_kelamin'] ?></option>
          <option value="<?php echo $data['jenis_kelamin'] ?>">------</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
        <input type="submit" class="mt-4 btn btn-success form-control" value="Simpan">
        <a href="mahasiswa.php" onclick="return confirm('Data tidak akan tersimpan, Yakin kembali?')"
          class="mt-2 btn btn-danger form-control">Kembali</a>
      <?php } ?>
    </form>
  </div>
  <div class="wrapper">
    <h3 class="mt-1">Data Mahasiswa</h3>
    <div class="col-4">
      <h5>Cari Data</h5>
      <form action="mahasiswa.php" method="get">

        <input type="text" disabled="disabled" name="cari" placeholder="Masukkan Kata Kunci" id="" required="required">
        <select disabled="disabled" name="berdasarkan" id="">
          <option value="nim">NIM</option>
          <option value="nama_mhs">Nama</option>
        </select>
        <input type="submit" class="btn btn-sm btn-primary disabled" value="Cari">
      </form>
    </div>
    <table class="table table-striped table-bordered mt-3">
      <tr>
        <thead>
          <th>No</th>
          <th>NIP</th>
          <th>Nama Mahasiswa</th>
          <th>Prodi</th>
          <th>Semester</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>Jenis Kelamin</th>
          <th>Aksi</th>
        </thead>

      </tr>
      <?php

      $no = 1;
      if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $berdasarkan = $_GET['berdasarkan'];
        $query = mysqli_query($conn, "select * from mahasiswa where " . $berdasarkan . " like '%" . $cari . "%'");

      } else {
        # code...
        $query = mysqli_query($conn, "select * from mahasiswa");
      }


      while ($d = mysqli_fetch_array($query)) {
        # code...
      
        ?>
        <tbody>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $d['nim'] ?></td>
            <td><?php echo $d['nama_mhs'] ?></td>
            <td><?php echo $d['prodi'] ?></td>
            <td><?php echo $d['semester'] ?></td>tr>
            <td><?php echo $d['tgl_lahir'] ?></td>
            <td><?php echo $d['alamat'] ?></td>
            <td><?php echo $d['jenis_kelamin'] ?></td>
            <td style="width:120px">
              <a href="edit-mahasiswa.php?nim=<?php echo $d['nim'] ?>" class="btn btn-sm btn-primary">Edit</a>
              <a href="hapus-mahasiswa.php?nim=<?php echo $d['nim'] ?>" class="btn btn-sm btn-danger">Hapus</a>
            </td>
          </tr>
        </tbody>
      <?php } ?>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</body>

</html>