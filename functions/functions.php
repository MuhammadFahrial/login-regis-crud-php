<?php
require 'connection.php';

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//function tambah
function tambah($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);

    //upload gambar dengan memanggil fungsi upload
    $foto = upload();

    // jika tidak ada foto atau gagal maka akan false
    if (!$foto) {
        return false;
    }

    //buat query untuk menambahkan data
    $query = "INSERT INTO tb_mhs VALUES('', '$foto', '$nama', '$nim', '$jurusan', '$email')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi upload 
function upload()
{
    // mengambil atribut variabel $_FILES dan di simpan ke variabel baru
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    //cek apakah sudah upload gamabr
    if ($error === 4) {
        echo "<script>
            alert ('Pilih gambar terlebih dahulu');        
        </script>";
        return false;
    }

    // melakukan pemecahan file gambar dan di masukkan ke dalam variabel baru yang telah di buat
    $ektensiGambarValid = ['jpg', 'jpeg', 'png']; // membuat variabel untuk menampung ekstensi yang di izinkan
    $ekstensiGambar = explode('.', $namaFile); // membagi nama file dengan pembatas ('.')
    $ekstensiGambar = strtolower(end($ekstensiGambar)); //mengubah semua huruf menjadi kecil dan mengambil bagian akhir dari nama gambar yang telah di pisah sebelumnya

    //cek apakah yang di upload gambar atau bukan
    // jika di dalam ekstensiGambar tidak di temukan ekstensiGambarValid maka akan false
    if (!in_array($ekstensiGambar, $ektensiGambarValid)) {
        echo "<script>
            alert('Yang anda Upload Bukan gambar');
        </script>";
        return false;
    }

    // cek apakah ukuran gambar lebih dari 1mb jika lebih maka false
    if ($ukuranFile > 1000000) {
        echo "<script>
            alert('Ukuran Gambar melebihi 1mb');
        </script>";
        return false;
    }

    //lolos pengecekan
    $namaFileBaru = uniqid(); //membuat nama file baru dengan id yang unik
    $namaFileBaru .= "."; // tambahkan titik di variabel sebelumnya
    $namaFileBaru .= $ekstensiGambar; // setelah tambah titik maka gabungkan dengan ekstensi gambar

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru); // duplicate file baru yang tersimpan di dalam variabel tmpName kedalam folder img dengan nama file baru yang telah di buat
    return $namaFileBaru;
}

//function hapus 
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_mhs WHERE id = $id");
    var_dump(mysqli_affected_rows($conn));
    return mysqli_affected_rows($conn);
}

//function edit
function edit($data)
{

    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);
    $fotolama = $data["fotolama"];

    //cek apakah yang di upload itu foto baru atau tidak
    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotolama;
        return $foto;
    } else {
        $foto = upload();
    }

    $query = "UPDATE tb_mhs SET nama = '$nama', nim = '$nim', jurusan = '$jurusan', email = '$email', foto = '$foto' WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// fungsi cari
function cari($keyword)
{

    $query = "SELECT * FROM tb_mhs WHERE 
    nama LIKE '%$keyword%' OR 
    nim LIKE '%$keyword%' OR 
    jurusan LIKE '%$keyword%'";

    return query(($query));
}

//function regis
function regis($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    // cek jika ada username yang sama 
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username telah terdaftar');
        </script>";
        return false;
    }

    //cek apakah pasword dan konfirmasi passowrd tidak sama
    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi Password tidak sama');
            </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('','$email', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
