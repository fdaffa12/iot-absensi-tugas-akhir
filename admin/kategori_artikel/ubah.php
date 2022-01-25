<?php 

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_kategori_artikel WHERE id = {$id}");
$row = mysqli_fetch_assoc($query);
// $active = 'artikel';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  $page = 'kategori';
  $open = 'artikel';
  include "header.php"; 
  ?>
  <title>Ubah Kategori Artikel - SMP Riadhul Jannah</title>
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
											Ubah Kategori Artikel
										</div>
										<div class="float-right">
											<a href="index.php">Kembali</a>
										</div>
									</div>
								</div>
								<div class="card-body">
									<form method="POST" action="proses_ubah.php?id=<?= $row['id'] ?>">
										<div class="form-group">
											<label for="nama_kategori">Kategori</label>
											<input type="text" class="form-control" id="nama_kategori" placeholder="nama kategori" autocomplete="off" required="required" name="nama_kategori" value="<?= $row['nama_kategori'] ?>">
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-sm btn-primary" name="ubah">Ubah</button>
											<button type="reset" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')">Batal</button>
											<a href="index.php" class="btn btn-sm btn-secondary">Kembali</a>
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
