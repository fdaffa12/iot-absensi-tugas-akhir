<!-- proses penyimpanan -->

<?php 
  include "koneksi.php";

  //jika tombol simpan diklik
  if(isset($_POST['btnSimpan']))
  {
    //baca isi kartu
    $nokartu = $_POST['nokartu'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    //simpan ke tabel murid
    $simpan = mysqli_query($konek, "insert into murid(nokartu, nama, alamat)values('$nokartu', '$nama', '$alamat')");

    //jika berhasil tersimpan, tampil alert kembali ke data murid
    if($simpan)
    {
      echo "
        <script>
          alert('Tersimpan');
          location.replace('datamurid.php');
        </script>
      ";
    }
    else
    {
      echo "
        <script>
          alert('Gagal Tersmipan');
          location.replace('datamurid.php');
        </script>
      ";  
    }
  }

  //kosongkan tabel tmprfid
  mysqli_query($konek, "delete from tmprfid");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "header.php"; ?>
  <title>Tambah Data | Dashboard</title>

  <!-- pembacaan no rfid otomatis -->
  <script type="text/javascript">
    $(document).ready(function(){
      setInterval(function(){
        $("#norfid").load('nokartu.php')
      }, 0) //pembacaan kartu rfid;
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
            <!-- <h1>DataTables</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data</li>
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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div id="norfid"></div>

                    <div class="form-group">
                      <label>Nama Murid</label>
                      <input type="text" name="nama" id="nama" placeholder="Nama Murid" class="form-control" style="width: 250px">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" style="width: 400px"></textarea>
                    </div>

                    <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
                </div>
                <!-- /.card-body -->
              </form>
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
