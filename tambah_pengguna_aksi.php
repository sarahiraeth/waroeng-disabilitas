
<?php
    include 'koneksi.php';

    // mengambil data dari method POST
    $username = $_POST['username'];
    $password = $_POST['password'];

    //insert ke dalam database
    $hasil = $db->query("INSERT INTO pengguna
    VALUES('$username', '$password')");

    //mengarahkan ke halaman daftar produk
    if($hasil) {
        header('location:pengguna.php');
    }
?>