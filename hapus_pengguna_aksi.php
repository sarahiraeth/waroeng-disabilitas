<?php 
    include 'koneksi.php';
    //mengambil id dari method get
    $username = $_GET['username'];

    //menghapus dari database
    $hasil = $db->query("DELETE FROM pengguna WHERE username='$username'");

    //mengarahkan ke halaman daftar produk
    if($hasil){
        header('location:pengguna.php');
    }
?>