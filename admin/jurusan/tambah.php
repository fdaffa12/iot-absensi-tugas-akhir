<?php
$active = 'master'; 

require_once '../../koneksi.php';
$query = mysqli_query($koneksi, "SELECT id, nama FROM tbl_guru");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  $page = 'jurusan';
  $open = 'data_master';
  include "header.php"; 
  ?>
  <title>Tambah Jurusan - SMP Riadhull Jannah Cimenteng</title>
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
											Tambah Jurusan
										</div>
										<div class="float-right">
											<a href="index.php">Kembali</a>
										</div>
									</div>
								</div>
								<div class="card-body">
									<form method="POST" action="proses_tambah.php">
										<div class="form-group">
											<label for="nama_jurusan">Nama Jurusan</label>
											<input type="text" class="form-control" id="nama_jurusan" placeholder="nama jurusan" autocomplete="off" required="required" name="nama_jurusan">
										</div>
										<div class="form-group">
											<label for="kaprodi">Kaprodi</label>
											<select name="kaprodi" id="kaprodi" class="form-control">
												<?php while($row = mysqli_fetch_assoc($query)) : ?>
													<option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
												<?php endwhile; ?>	
											</select>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-sm btn-primary" name="tambah">Tambah</button>
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
