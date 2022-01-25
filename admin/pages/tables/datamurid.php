<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "header.php"; ?>
  <title>Data Murid | Dashboard</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php include "menu.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                        <table class="table table-bordered">
                          <thead>
                              <tr style="background-color: grey; color: white;">
                                  <th style="width: 10px; text-align: center;">No.</th>
                                  <th style="width: 200px; text-align: center;">No. Kartu</th>
                                  <th style="width: 200px; text-align: center;">Nama</th>
                                  <th style="text-align: center;">Alamat</th>
                                  <th style="width: 100px; text-align: center;">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                  //koneksi ke database
                                  include "koneksi.php";

                                  //baca data murid
                                  $sql = mysqli_query($konek, "select * from murid");
                                  $no = 0;
                                  while($data = mysqli_fetch_array($sql))
                                  {
                                      $no++;
                              ?>

                              <tr>
                                  <td> <?php echo $no; ?> </td>
                                  <td> <?php echo $data['nokartu']; ?> </td>
                                  <td> <?php echo $data['nama']; ?> </td>
                                  <td> <?php echo $data['alamat']; ?> </td>
                                  <td>
                                      <a href="edit.php?id=<?php echo $data['id']; ?>"> Edit</a> | <a href="hapus.php?id=<?php echo $data['id']; ?>"> Hapus</a>
                                  </td>
                              </tr>
                              <?php } ?>
                          </tbody>
                      </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "footer.php"; ?>
</body>
</html>
