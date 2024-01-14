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
                  <i class="fas fa-plus mr-1"></i>
                  Formulir Tambah Produk
                </h3>
                <div class="card-tools">
          
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
              <form action="tambah_produk_aksi.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="nama_produk">Nama Produk</label>
                  <input type="text" id="nama_produk" name="nama_produk"
                  class="form-control">
                </div>

                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="number" id="harga" name="harga"
                  class="form-control">
                </div>

                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <textarea id="deskripsi" name="deskripsi"
                  class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group">
                  <label for="foto">Foto Produk</label>
                  <input type="file" id="foto" name="foto"
                  class="form-control">
                </div>

                <div class="form-group">
                  <label for="status">Status Produk</label>
                  <select id="status" name="status" class="form-control">
                  <option value="Ready Stok">Ready Stok</option>
                  <option value="Pre-Order">Pre Order</option>
                  <option value="Sold Out">Sold Out</option>
                  </select>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="daftar_produk.php" class="btn btn-danger">Kembali</a>
                </div>

              </form>
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