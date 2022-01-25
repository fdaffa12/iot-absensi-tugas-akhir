<?php require_once 'cek_session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  $page = 'datamurid';
  $open = 'dashboard';
  include "header.php"; 
  ?>
  <title>Data Murid | Dashboard</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

      <?php include "menu.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>DataTables</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Murid</li>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Data Murid</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                        <table class="table table-bordered">
                          <thead>
                              <tr style="background-color: #17a2b8; color: white;">
                                  <th style="width: 10px; text-align: center;">No.</th>
                                  <th style="width: 100px; text-align: center;">No. Kartu</th>
                                  <th style="width: 300px; text-align: center;">Nama</th>
                                  <th style="width: 300px; text-align: center;">Alamat</th>
                                  <th style="width: 100px; text-align: center;">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                  //koneksi ke database
                                  include "koneksi.php";

                                  //baca data murid
                                  $sql = mysqli_query($konek, "select * from murid order by id asc");
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
              <div class="card-footer">
                <!-- tombol tambah data karyawan -->
                <a href="tambah.php"> <button class="btn btn-primary">Tambah Data Murid</button> </a>
              </div>
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
</div>
</body>
</html>
