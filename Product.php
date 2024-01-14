<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waroeng Disabilitas</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/main.css">
</head>
<body>
    
    <?php 
    include 'navbar.php'
    ?>

<?php
    include 'koneksi.php';
    $produk = $db->query("SELECT * FROM daftar_produk");?>
    <!-- end of navbar -->

    <!-- product -->
    <!-- collection -->
    <div class="row g-0">
                <div class="d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                    
                </div>

                <div class="special-list row g-0">
                    <!-- Misalnya Anda telah mengambil data produk dari database dan menyimpannya dalam array $produk -->
                    <?php foreach ($produk as $item) { ?>
                        <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                            <div class="special-img position-relative overflow-hidden">
                                <!-- Menampilkan gambar produk -->
                                <img src="foto/<?= $item['foto_produk']; ?>" width="30%" class="w-100" height="280" alt="<?= $item['nama_produk']; ?>">
                                <!-- Pastikan path gambar disesuaikan dengan struktur folder penyimpanan gambar Anda -->
                            </div>

                            <div class="text-center">
                                <!-- Menampilkan detail produk -->
                                <p class="text-capitalize mt-3 mb-1"><?= $item['nama_produk']; ?></p>
                                <span class="fw-bold d-block">Rp. <?= number_format($item['harga'], 2); ?></span>
                                <!-- Ubah link href sesuai dengan halaman detail produk Anda -->
                                <a href="detail.php?id=<?= $item['id_produk']; ?>" class="btn btn-sm text-dark p-0">
                                    <i class="fas fa-eye text-primary mr-1"></i>View Detail
                                </a>
                            </div>
                        </div>
                    <?php }?>
                </section>


    <!-- end of special products -->
   

    <?php 
   include "footer_front.php";
   ?>
