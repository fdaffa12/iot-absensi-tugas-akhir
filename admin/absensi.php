<?php require_once 'cek_session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  $page = 'absensi';
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
              <li class="breadcrumb-item active">Rekap Abesensi</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Rekap Absensi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-brodered">
                  <thead>
                    <tr style="background-color: grey; color:white;">
                      <th style="width: 10px; text-align:center;">No.</th>
                      <th style="text-align: center;">Nama</th>
                      <th style=".text-align: center;">Tanggal</th>
                      <th style=".text-align: center;">Jam Masuk</th>
                      <th style=".text-align: center;">Jam Istirahat</th>
                      <th style=".text-align: center;">Jam Kembali</th>
                      <th style=".text-align: center;">Jam Pulang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php include "koneksi.php";

                    //baca tabel absensi dan relasasikan dengan tabel murid berdasarkan nomor kartu RFID untuk tanggal dan hari

                    //naca tanggal saat ini
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d');

                    //filter absensi berdasarkan tanggal saat ini
                    $sql = mysqli_query($konek, "select b.nama, a.tanggal, a.jam_masuk, a.jam_istirahat, a.jam_kembali, a.jam_pulang from absensi a, murid b where a.nokartu=b.nokartu and a.tanggal='$tanggal' order by a.jam_masuk");

                    $no = 0;
                    while ($data = mysqli_fetch_array($sql))
                      {
                        $no++;
                    ?>
                    <tr>
                      <td> <?php echo $no; ?></td>
                      <td> <?php echo $data['nama']; ?></td>
                      <td> <?php echo $data['tanggal']; ?></td>
                      <td> <?php echo $data['jam_masuk']; ?></td>
                      <td> <?php echo $data['jam_istirahat']; ?></td>
                      <td> <?php echo $data['jam_kembali']; ?></td>
                      <td> <?php echo $data['jam_pulang']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
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
