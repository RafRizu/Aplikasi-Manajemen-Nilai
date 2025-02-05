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

  <div class="text-center mt-5">
    <h1>Selamat Datang di Aplikasi Penilaian Mahasiswa</h1>
    <h2 class="fw-normal">Gunakan menu diatas untuk mengakses aplikasi.</h2>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>