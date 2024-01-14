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
            <h1 class="m-0">Tambah Pengguna</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Pengguna</li>
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
                  Formulir Tambah Pengguna
                </h3>
                <div class="card-tools">
          
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
              <form action="tambah_pengguna_aksi.php" method="POST">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" id="username" name="username"
                  class="form-control">
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password"
                  class="form-control">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="pengguna.php" class="btn btn-danger">Kembali</a>
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