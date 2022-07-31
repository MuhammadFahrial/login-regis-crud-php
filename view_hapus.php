<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: view_login.php");
    exit;
}

require 'functions/functions.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
    echo
    "<script>
        alert('Data Berhasil di Hapus...');
        document.location.href = 'view_tabel.php';
    </script>";
} else {
    echo
    "<script>
    alert('Data Gagal di Hapus');
    document.location.href = 'view_tabel.php';
    </script>";
}

// Alasan kenapa tombol hapus di berikan file tersendiri karena tombol hapus tidak terbuat dari button dan tidak memiliki kondisi jika menekan tombol submit 