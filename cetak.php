<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <?php 
        require_once 'koneksi.php';
        $prodi = $_POST['prodi'];
        $semester = $_POST['semester'];
        mysqli_query($conn, "select * from nilai where prodi='$prodi' and semester='$semester'")
    ?>

    <table class="table table-bordered container mt-5">
         <tr>
        <thead>
          <th>No</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Prodi</th>
          <th>Semester</th>
          <th>Jenis Kelamin</th>
          <th>Nama Mata Kuliah</th>
          <th>Jumlah SKS</th>
          <th>Nama Dosen</th>
          <th>Nilai</th>
        </thead>

      </tr>
      <?php
        include "koneksi.php";
        $no = 1;
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            $berdasarkan = $_GET['berdasarkan'];
            $query = mysqli_query($conn, "select * from nilai where " . $berdasarkan . " like '%" . $cari . "%'");

        } else {
            # code...
            $query = mysqli_query($conn, "select * from nilai");
        }


        while ($d = mysqli_fetch_array($query)) {
            # code...
        
            ?>
            <tbody>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $d['nim'] ?></td>
                    <td><?php echo $d['nama'] ?></td>
                    <td><?php echo $d['prodi'] ?></td>
                    <td><?php echo $d['semester'] ?></td>
                    <td><?php echo $d['jk'] ?></td>
                    <td><?php echo $d['matkul'] ?></td>
                    <td><?php echo $d['sks'] ?></td>
                    <td><?php echo $d['dosen'] ?></td>
                    <td><?php echo $d['nilai'] ?></td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
    <script>
        window.print()
    </script>
</body>
</html>