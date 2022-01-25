<?php 

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_ekskul WHERE id = $id");
$ekskul = mysqli_fetch_assoc($query);
$query_guru = mysqli_query($koneksi, "SELECT id, nama FROM tbl_guru");

// $active = 'master';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  $page = 'ekskul';
  $open = 'data_master';
  include "header.php"; 
  ?>
  <title>Ubah Data Ekskul - SMP Riadhul Jannah</title>
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
											Ubah Ekskul
										</div>
										<div class="float-right">
											<a href="index.php">Kembali</a>
										</div>
									</div>
								</div>
								<div class="card-body">
									<form method="POST" action="proses_ubah.php?id=<?= $ekskul['id'] ?>">
										<div class="form-group">
											<label for="nama_ekskul">Nama Eksul</label>
											<input type="text" value="<?= $ekskul['nama_ekskul'] ?>" class="form-control" id="nama_ekskul" placeholder="nama ekskul" autocomplete="off" required="required" name="nama_ekskul">
										</div>
										<div class="form-group">
											<label for="pembina">pembina</label>
											<select name="pembina" id="pembina" class="form-control">
												<?php while($row = mysqli_fetch_assoc($query_guru)) : ?>
													<option value="<?= $row['id'] ?>" <?= $ekskul['pembina'] == $row['id'] ? 'selected' : '' ?>><?= $row['nama'] ?></option>
												<?php endwhile; ?>
											</select>
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
