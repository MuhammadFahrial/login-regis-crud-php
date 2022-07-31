<?php

session_start(); // sebelum menggunakan session

require 'functions/connection.php';
require 'functions/functions.php';

//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");

    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] == true;
    }
}

//jika session mendeteksi tombol login
if (isset($_SESSION["login"])) {
    header("Location: index.php"); // pindahkan ke index.php
    exit;
}

//jika tombol login di tekan
if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {

            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST['checkbox'])) {

                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']));
            }

            echo "<script>
                    alert('Login Berhasil....');
                    document.location.href = 'index.php';
                </script>";
            // header("Location: index.php"); // jika mengguanakan header php maka alert di script tidak akan muncul
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/view_login.css">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="image">
            </div>

            <div class="login">
                <h1>Silahkan Login</h1>

                <?php if (isset($error)) : ?>
                    <p style="color: red; font-style:italic; text-align:center; border:2px solid; padding:10px 0; margin-bottom:10px">Username / Password Salah</p>
                <?php endif; ?>
                <ul>
                    <form action="" method="post">
                        <li>
                            <input type="text" name="username" id="username" placeholder=" Username" required>
                        </li>
                        <li>
                            <input type="password" name="password" id="password" placeholder=" Password" required>
                        </li>
                        <div class="checkbox">
                            <li class="checkbox">
                                <input type="checkbox" name="checkbox" id="checkbox">
                                <label for="checkbox">Remember me</label>
                            </li>
                        </div>
                        <li>
                            <button type="submit" name="login">Login</button>
                        </li>
                        <p>Anda Belum Punya Akun? <a href="view_regis.php">Daftar</a></p>
                    </form>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>