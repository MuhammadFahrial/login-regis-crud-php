<?php
require 'functions/connection.php';
require 'functions/functions.php';

if (isset($_POST["regis"])) {

    if (regis($_POST) > 0) {
        echo "<script>
            alert('Registrasi Berhasil...');
            document.location.href = 'view_login.php';
        </script>";
        // header("Location: view_login.php");
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/view_regis.css">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="image">
            </div>

            <div class="regis">
                <h1>Silahkan Registrasi</h1>
                <ul>
                    <form action="" method="post">
                        <li>
                            <input type="text" name="username" id="username" placeholder=" Username" required>
                        </li>
                        <li>
                            <input type="email" name="email" id="email" placeholder=" Email" required>
                        </li>
                        <li>
                            <input type="password" name="password" id="password" placeholder=" Password" required>
                        </li>
                        <li>
                            <input type="password" name="password2" id="password2" placeholder=" Konfirmasi Password" required>
                        </li>
                        <div class="checkbox">
                            <li class="checkbox">
                                <input type="checkbox" name="checkbox" id="checkbox">
                                <label for="checkbox">Lorem ipsum dolor sit.</label>
                            </li>
                        </div>
                        <li>
                            <button type="submit" name="regis">Registrasi</button>
                        </li>
                        <p>Anda Sudah Punya Akun? <a href="view_login.php">Masuk</a></p>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>