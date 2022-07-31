<?php
require 'functions/connection.php';
require 'functions/functions.php';

// $mhs = query("SELECT * FROM tb_mhs"); // memanggul query dari tabel mhs

// jika tombol cari di tekan buat variabel untuk memanggil fungsi cari
if (isset($_POST["cari"])) {
    $mhs = cari($_POST["keyword"]);
}

// paginating
$jumlahDataPerHalaman = 4;
$jumlahData = count(query("SELECT * FROM tb_mhs"));
$jumlahalaman  = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$mhs = query("SELECT * FROM tb_mhs LIMIT $awalData, $jumlahDataPerHalaman");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\view_tabel.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <title>Data Tabel</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <nav>
                <h1>DATA MAHASISWA</h1>
                <img src="img/pana.svg" alt="">
                <ul class="nav-item">
                    <a href="index.php">
                        <li>Home</li>
                    </a>
                    <a href="view_tambah.php">
                        <li>Tambah Data</li>
                    </a>
                    <a href="view_tabel.php">
                        <li class="nav-tabel">Tabel Data</li>
                    </a>
                    <div class="logout">
                        <a href="view_logout.php">Logout</a>
                    </div>
                </ul>
            </nav>
        </div>

        <div class="main-page">

            <!-- Mencari Data -->
            <div class="search">
                <form action="" method="post">
                    <input type="text" name="keyword" id="keyword" placeholder="Silahkan Mencari Keyword..." autocomplete="off">
                    <button type="submit" name="cari" id="tombol-cari">Search</button>
                </form>
            </div>

            <!-- navigasi -->
            <div class="navigasiTabel">
                <?php if ($halamanAktif > 1) : ?>
                    <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $jumlahalaman; $i++) : ?>
                    <?php if ($i == $halamanAktif) : ?>
                        <a href="?halaman=<?= $i; ?>" style="font-weight: bold;"><?= $i ?></a>
                    <?php else : ?>
                        <a href="?halaman=<?= $i; ?>"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($halamanAktif < $jumlahalaman) : ?>
                    <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
                <?php endif; ?>
            </div>

            <div id="container">
                <table cellspacing="0">
                    <thead>
                        <tr>
                            <th class="number">No.</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Jurusan</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $i = 1; ?>
                        <?php foreach ($mhs as $mhss) : ?>
                            <tr>
                                <td class="number"><?= $i; ?></td>
                                <td><img src="img/<?= $mhss["foto"] ?>" width="50"></td>
                                <td><?= $mhss["nama"] ?></td>
                                <td><?= $mhss["nim"] ?></td>
                                <td><?= $mhss["jurusan"] ?></td>
                                <td><?= $mhss["email"] ?></td>
                                <td class="aksi">
                                    <a class="edit" href="view_ubah.php?id=<?= $mhss["id"] ?>">Edit</a>
                                    <a class="hapus" href="view_hapus.php?id=<?= $mhss["id"] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini..');">Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>