<!-- proses penyimpanan -->

<?php 
  include "koneksi.php";

  //baca id data yang akan diedit
  $id = $_GET['id'];

  //baca data murid berdasarkan id
  $cari = mysqli_query($konek, "select * from murid where id='$id'");
  $hasil = mysqli_fetch_array($cari);


  //jika tombol simpan diklik
  if(isset($_POST['btnSimpan']))
  {
    //baca isi kartu
    $nokartu = $_POST['nokartu'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    //simpan ke tabel murid
    $simpan = mysqli_query($konek, "update murid set nokartu='$nokartu', nama='$nama', alamat='$alamat' where id='$id' ");

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "header.php"; ?>
  <title>Tambah Data | Dashboard</title>
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
            <!-- <h1>Edit Data</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data</li>
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
                <h3 class="card-title">Edit Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>No.Kartu</label>
                    <input type="text" name="nokartu" id="nokartu" placeholder="Nomor Kartu RFID" class="form-control" style="width: 200px" value="<?php echo $hasil['nokartu']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Nama Murid</label>
                    <input type="text" name="nama" id="nama" placeholder="Nama Murid" class="form-control" style="width: 200px" value="<?php echo $hasil['nama']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" placeholder="alamat" style="width: 400px"><?php echo $hasil['alamat']; ?></textarea>
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
