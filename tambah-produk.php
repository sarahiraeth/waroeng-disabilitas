<!-- Session harus Login Terlebih dahulu -->
<?php 
    session_start();
    include 'db_sasirangan';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
        <!-- Boxicons CSS -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
<nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="./img/Logo-rini-store2.png" alt="rini store">
            </div>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
            <li><a href="dashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
            </a></li>
            <br>
            <li><a href="profil.php">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Profil</span>
            </a></li>
            <br>
            <li><a href="data-kategori.php">
                    <i class="uil uil-layers-alt"></i>
                    <span class="link-name">Data Kategori</span>
            </a></li>
            <br>
            <li><a href="data-produk.php">
                    <i class="uil uil-shopping-cart-alt"></i>
                    <span class="link-name">Data Produk</span>
            </a></li>
            </ul>
            <ul class="logout-mode">
            <li><a href="keluar.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
                <div class="mode-toggle">
                </div>
            </li>
            </ul>
        </div>
    </nav>


    <!-- Content -->
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>
            <div class="wrapper">
                <header>Tambah Data Produk</header>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="select-box">
                            <select class="input-control" name="kategori" required>
                                <option value="">--Pilih Kategori--</option>
                                <?php 
                                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                                    while($r = mysqli_fetch_array($kategori) ){
                                ?>
                                <option value="<?= $r['category_id'] ?>"><?= $r['category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="dbl-field">
                            <div class="field">
                                    <input type="text" name="nama" class="input-control" placeholder="Nama produk" required>
                                <i class="uil uil-clipboard-notes"></i>
                            </div>
                        </div>
                        <div class="dbl-field">
                            <div class="field">
                                    <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                                <i class="uil uil-dollar-sign-alt"></i>
                            </div>
                        </div>
                        <div class="dbl-field">
                                <input type="file" name="gambar" class="input-control" required>
                        </div>
                        
                        <div class="message">
                        <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                        </div>
                        
                        <div class="select-box">
                        <select class="input-control" name="status">
                            <option value="">--Pilih Status Produk--</option>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                        </div>
                        <div class="button-area">
                            <input type="submit" name="submit" value="Submit" class="btn">
                            <button><a href="data-produk.php" class="can">Cancel</a></button>
                        </div>
                    </form>
                <?php 
                    if( isset($_POST['submit']) ){

                        // print_r($_FILES['gambar']);
                        // Menampung inputan dari from
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status     = $_POST['status'];

                        // Manampung data file yang diupload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        // Mangganti nama produk
                        $newname = 'Produk'.time().'.'.$type2;


                        // Menampung data format file yang diizinkan
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                        // Validasi format file
                        if(!in_array($type2, $tipe_diizinkan) ){
                            // jika format file tidak ada di dalam tipe dizinkan
                            echo '<script>alert("Format File Tidak Diketahui")</script>';
                        } else {
                            // jika format file sesuai dengan yang ada di dalam  array tipe diizinkan
                             // Proses upload file sekaligus insert ke database
                            move_uploaded_file($tmp_name, './Produk/'.$newname);

                            $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                                                null,
                                                '".$kategori."',
                                                '".$nama."',
                                                '".$harga."',
                                                '".$deskripsi."',
                                                '".$newname."',
                                                '".$status."',
                                                null
                                ) ");

                            if($insert){
                                echo '<script>alert("Produk Berhasil di Tambah")</script>';
                                echo '<script>window.location="data-produk.php"</script>';
                            } else {
                                echo 'Produk Gagal di Tambah'. mysqli_error($conn);
                            }
                        }
                    
                    }
                
                ?>
        </div>
    </section>

            <!-- Footer -->

    
            <!-- JavaScrip -->
    <script src="./js/admin.js"></script>
</body>
</html>