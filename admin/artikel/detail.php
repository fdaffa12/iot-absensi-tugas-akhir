<?php 
require_once '../../koneksi.php';

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT tbl_artikel.*, tbl_kategori_artikel.nama_kategori FROM tbl_artikel INNER JOIN tbl_kategori_artikel ON tbl_artikel.id_kategori = tbl_kategori_artikel.id WHERE tbl_artikel.id = $id");

$row = mysqli_fetch_assoc($query);
$active = 'artikel';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  $page = 'artikel';
  $open = 'artikel';
  include "header.php"; 
  ?>
  <title>Detail Artikel - SMP Riadhul Jannah</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

      <?php include 'menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card shadow">
                <div class="card-header">
                  <div class="clearfix">
                    <div class="float-left">
                      Detail Artikel - <strong><?= $row['judul'] ?> - <?= $row['nama_kategori'] ?></strong>
                    </div>
                    <div class="float-right">
                      <a href="index.php">Kembali</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <img src="../../images/artikel/<?= $row['foto'] ?>" alt="<?= $row['judul'] ?>" width="50%" class="img-thumbnail"><br><br>
                  <?= $row['isi'] ?>        
                </div>
              </div>
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
</div>
</body>
</html>
