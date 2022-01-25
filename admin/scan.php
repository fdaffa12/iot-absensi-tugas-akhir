<?php require_once 'cek_session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  $page = 'scan';
  $open = 'dashboard';
  include "header.php"; 
  ?>
  <title>Absensi | Dashboard</title>
  <!-- scaning membaca kartu RFID -->
  <script type="text/javascript">
    $(document).ready(function(){
      setInterval(function(){
        $("#cekkartu").load('bacakartu.php')
      }, 2000);
    });
  </script>
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
            <h1>Scan Kartu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Scan Kartu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div id="cekkartu"></div>
          </div>
          <!-- /.col (12) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "footer.php"; ?>
</body>
</html>
