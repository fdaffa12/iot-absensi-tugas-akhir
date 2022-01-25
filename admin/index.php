<?php require_once 'cek_session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  $page = 'home';
  include "header.php"; 
  ?>
  <title>Absensi | Dashboard</title>
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
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">

                  <p>Scan Kartu</p>
                </div>
                <div class="icon">
                  <i class="fas fa-barcode"></i>
                </div>
                <a href="scan.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">

                  <p>Rekapitulasi Absensi</p>
                </div>
                <div class="icon">
                  <i class="fas fa-file-alt"></i>
                </div>
                <a href="absensifull.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">

                  <p>Daftar Siswa</p>
                </div>
                <div class="icon">
                  <i class="fas fa-file-alt"></i>
                </div>
                <a href="datamurid.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <p>Hitung K-Means</p>
                </div>
                <div class="icon">
                  <i class="fas fa-calculator"></i>
                </div>
                <a href="Prosesdata.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <!-- ./col -->
          <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">

                  <p>Artikel</p>
                </div>
                <div class="icon">
                  <i class="fas fa-newspaper"></i>
                </div>
                <a href="artikel/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">

                  <p>Absensi Hari Ini</p>
                </div>
                <div class="icon">
                  <i class="fas fa-file-alt"></i>
                </div>
                <a href="absensi.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">

                  <p>Daftar Guru</p>
                </div>
                <div class="icon">
                  <i class="fas fa-file-alt"></i>
                </div>
                <a href="guru/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
             <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <p>Hasil Hitung K-Means</p>
                </div>
                <div class="icon">
                  <i class="fas fa-chart-pie"></i>
                </div>
                <a href="chart.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <!-- ./col -->
        </div>
        </div><!-- /.container-fluid -->
      </section>
  </div>
<!-- /.content-wrapper -->
<?php include "footer.php"; ?>
</div>
</body>
</html>
