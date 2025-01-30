<?php
include "koneksi.php";
// session_start();
// if (!isset($_SESSION['username'])) {
//     header("location:login.php");
//     # code...
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?version=1">
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
          <a class="nav-link" aria-current="page" href="">Home</a>
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
  <div class="text-center mt-5">
    <h1>Selamat Datang di Aplikasi Penilaian Mahasiswa</h1>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>