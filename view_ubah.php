<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: view_login.php");
    exit;
}

require 'functions\connection.php';
require 'functions\functions.php';

// ambil data dari url
$id = $_GET["id"];

// query data berdasarkan id
$mhss = query("SELECT * FROM tb_mhs WHERE id = $id")[0];

//jika tombol tambah di tekan
if (isset($_POST["edit"])) {

    // var_dump($_POST);
    // var_dump($_FILES);
    // die;

    //jika berhasil upload
    if (edit($_POST) > 0) {
        echo
        "<script>
        alert('Data Berhasil Di Edit...');
        document.location.href = 'view_tabel.php';
        </script>";
    } else {
        echo "<script> alert('Data Gagal Di Edit...');
        document.location.href = 'view_tambah.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\view_tambah.css">
    <title>Ubah Data</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <nav>
                <h1>DATA MAHASISWA</h1>
                <img src="img\pana.svg" alt="">
                <ul class="nav-item">
                    <a href="index.php">
                        <li>Home</li>
                    </a>
                    <a href="view_tambah.php">
                        <li>Tambah Data</li>
                    </a>
                    <a href="view_tabel.php">
                        <li>Tabel Data</li>
                    </a>
                    <div class="logout">
                        <a href="view_logout.php">Logout</a>
                    </div>
                </ul>
            </nav>
        </div>

        <div class="main-page">
            <ul>
                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?= $mhss["id"]; ?>">
                    <input type="hidden" name="fotolama" value="img/<?= $mhss["foto"]; ?>">

                    <li class="nama">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Anda...." value="<?= $mhss["nama"]; ?>">
                    </li>

                    <li class="nim">
                        <label for="nim">Nim</label>
                        <input type="number" name="nim" id="nim" placeholder="Masukkan Nim Anda..." value="<?= $mhss["nim"]; ?>">
                    </li>

                    <li class="jurusan">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" placeholder="Masukkan Jurusan Anda..." value="<?= $mhss["jurusan"]; ?>">
                    </li>

                    <li class="email">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukkan Email Anda..." value="<?= $mhss["email"]; ?>">
                    </li>

                    <li class="foto">
                        <label>Foto</label>
                        <img src="img/<?= $mhss["foto"]; ?>" alt="" width="50">
                        <input type="file" name="foto" class="foto">
                    </li>

                    <button type="submit" name="edit" class="button">Edit</button>

                </form>
            </ul>
        </div>
    </div>
</body>

</html>