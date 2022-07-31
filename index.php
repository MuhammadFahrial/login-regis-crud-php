<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: view_login.php");
    exit;
}

require 'functions/connection.php';
require 'functions/functions.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\view_home.css">
    <title>Home</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <nav>
                <h1>DATA MAHASISWA</h1>
                <img src="img\pana.svg" alt="">
                <ul class="nav-item">
                    <a href="index.php">
                        <li class="nav-home">Home</li>
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
            <div class="main-page-text">
                <h1>Welcome To Landing Page</h1>
                <p class="create">Create by</p>
                <p class="nama">Muhammad Fahrial</p>
            </div>
        </div>
    </div>

</body>

</html>