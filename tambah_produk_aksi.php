
<?php
    include 'koneksi.php';

    // Upload Foto
    $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
    $nama = $_FILES['foto']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];	

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){			
            move_uploaded_file($file_tmp, 'foto/'.$nama);
            
            // mengambil data dari method POST
            $nama_produk = $_POST['nama_produk'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];
            $foto = $nama;
            $status = $_POST['status'];

            //insert ke dalam database
            $hasil = $db->query("INSERT INTO daftar_produk(nama_produk, harga, deskripsi, foto_produk, status_produk)
            VALUES('$nama_produk', $harga, '$deskripsi', '$foto', '$status')");

            //mengarahkan ke halaman daftar produk
            if($hasil) {
                header('location:daftar_produk.php');
            }
        }else{
            echo 'UKURAN FILE TERLALU BESAR';
        }
    }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }

    
?>