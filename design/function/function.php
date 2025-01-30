<?php
//koneksi
$conn = mysqli_connect("localhost", "root", "", "nilai");
if (!$conn) {
    die("Koneksi gagal" . mysqli_error($conn));
}


function loginMhs($conn)
{
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "select * from user where nim = '$nim' && password = '$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        session_start();
        $_SESSION['nim'] = $nim;
        header("location:index.php");
        # code...
    } else {
        header("location:login-mahasiswa.php?pesan=gagal");
        # code...
    }
}
function loginDosen($conn)
{
    $nip = $_POST['nip'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "select * from user where nip = '$nip' && password = '$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        session_start();
        $_SESSION['nip'] = $nip;
        header("location:index.php");
        # code...
    } else {
        header("location:login-dosen.php?pesan=gagal");
        # code...
    }
}
function loginAdmin($conn)
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "select * from user where username = '$username' && password = '$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        session_start();
        $_SESSION['username'] = $username;
        header("location:index.php");
        # code...
    } else {
        header("location:login-admin.php?pesan=gagal");
        # code...
    }
}

function logoutMhs(){
    session_start();
    session_destroy();
    header("location:login-mahasiswa.php");
}
function logoutDosen(){
    session_start();
    session_destroy();
    header("location:login-dosen.php");
}
function logoutAdmin(){
    session_start();
    session_destroy();
    header("location:login-admin.php");
}

