<?php

require '../functions/functions.php';
require '../functions/connection.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM tb_mhs WHERE 
nama LIKE '%$keyword%' OR 
nim LIKE '%$keyword%' OR 
jurusan LIKE '%$keyword%'";
$mhs = query($query);

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/view_tabel.css">
    <title>Data Tabel</title>
</head>

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