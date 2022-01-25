<?php 

require_once '../koneksi.php';
require_once 'cek_session.php';
$query = mysqli_query($koneksi, "SELECT * FROM tbl_tentang_website WHERE id = 1");
$tentang_website = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  $page = 'tw';
  include "header.php"; 
  ?>
  <title>Tentang Website - SMP Riadhul Jannah</title>
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
		                Tentang Website
		              </div>
		              <div class="float-right">
		                <a href="index.php">Kembali</a>
		              </div>
		            </div>
		          </div>
		          <div class="card-body">
		            <?php if(isset($_SESSION['sukses'])) : ?>
		            <div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Berhasil!</strong> <?= $_SESSION['sukses'] ?>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <?php unset($_SESSION['sukses']) ?>
		            <?php elseif(isset($_SESSION['gagal'])) : ?>
		              <div class="alert alert-danger alert-dismissible fade show" role="alert">
		                <strong>Gagal!</strong> <?= $_SESSION['gagal'] ?>
		                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                  <span aria-hidden="true">&times;</span>
		                </button>
		              </div>
		            <?php unset($_SESSION['gagal']) ?>
		            <?php endif; ?>
		            <form method="POST" action="proses_tentang_website.php">
		              <div class="form-group">
		                <textarea name="tentang_website" id="ckeditor" class="ckeditor form-control"><?= $tentang_website['tentang_website'] ?></textarea>
		              </div>
		              <div class="form-group">
		                <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('apakah anda yakin?')" name="ubah">Ubah</button>
		                <button type="reset" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')">Batal</button>
		              </div>
		            </form>
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
