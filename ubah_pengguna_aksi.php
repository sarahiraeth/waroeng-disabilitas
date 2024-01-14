<?php 
    include 'koneksi.php';

    //mengambil data dari method
    $username = $_POST['username'];

    $password = $_POST['password'];

    //insert ke dalam database
    $hasil=$db->query("UPDATE pengguna SET 
        pengguna.password = '$password'
        WHERE username = '$username'");

    //mengarahkan ke halaman daftar produk
    if($hasil){
        header('location: pengguna.php');
    }
?>