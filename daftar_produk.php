<?php
    session_start();
    if ($_SESSION['logged_in'] == FALSE) {
      header("Location: login.php");
      exit();
    }

    include 'header.php';
    include 'sidebar.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-list mr-1"></i>
                  Produk
                </h3>
                <div class="card-tools">
                  <a class="btn btn-primary" href="tambah_produk.php">
                    <i class="fas fa-plus mr-1"></i>Tambah</a>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <?php
                  include 'koneksi.php';
                  $data = $db->query("SELECT * FROM daftar_produk");
                ?>
                <table class="table">
                  <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  <?php 
                    $no = 1;
                    foreach($data as $produk) {?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $produk['nama_produk']; ?></td>
                          <td><?= $produk['harga']; ?></td>
                          <td><?= $produk['deskripsi']; ?></td>
                          <td>
                            <img src = "foto/<?= $produk['foto_produk']; ?>" height="50px">  
                          </td>
                          <td><?= $produk['status_produk']; ?></td>
                          <td>
                            <a href="ubah_produk.php?id_produk=<?= $produk['id_produk'] ?>" 
                              class="btn btn-sm btn-warning">
                            <i class="fas fa-edit mr-1"></i>Ubah</a>

                            <a href="hapus_produk_aksi.php?id_produk=<?= $produk['id_produk'] ?>" 
                              class="btn btn-sm btn-danger"
                              onclick='return-confirm("Yakin hapus?")'>
                            <i class="fas fa-trash mr-1"></i>Hapus</a>
                          </td>
                        </tr>
                   <?php } ?>
                  
                </table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'footer_back.php';?>