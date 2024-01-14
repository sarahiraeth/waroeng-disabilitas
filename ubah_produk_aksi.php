<?php 
    include 'koneksi.php';

    //mengambil data dari method
    $id_produk = $_POST['id_produk'];

    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];

    //insert ke dalam database
    $hasil=$db->query("UPDATE daftar_produk SET 
        nama_produk = '$nama_produk',
        harga = $harga,
        deskripsi = '$deskripsi',
        status_produk = '$status'
        WHERE id_produk = $id_produk");

    //mengarahkan ke halaman daftar produk
    if($hasil){
        header('location: daftar_produk.php');
    }
?>