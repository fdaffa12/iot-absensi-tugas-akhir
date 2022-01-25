<?php 
require_once '../../koneksi.php';

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE id = $id");

$row = mysqli_fetch_assoc($query);
// $active = 'master';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  $page = 'guru';
  $open = 'data_master';
  include "header.php"; 
  ?>
  <title>Detail Guru - SMP Riadhull Jannah Cimenteng</title>
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
											Detail Guru - <strong><?= $row['nama'] ?></strong>
										</div>
										<div class="float-right">
											<a href="index.php">Kembali</a>
										</div>
									</div>
								</div>
								<div class="card-body">
									<table class="table table-stripped">
										<tr>
											<td><b>Nama</b></td>
											<td>:</td>
											<td><?= $row['nama'] ?></td>
										</tr>
										<tr>
											<td><b>NIP</b></td>
											<td>:</td>
											<td><?= $row['nip'] ?></td>
										</tr>
										<tr>
											<td><b>Jenis Kelamin</b></td>
											<td>:</td>
											<td>
												<?= $row['jenis_kelamin'] == 'L' ? 'Laki Laki' : '' ?>
												<?= $row['jenis_kelamin'] == 'P' ? 'Perempuan' : '' ?>
											</td>
										</tr>
										<tr>
											<td><b>No Handphone</b></td>
											<td>:</td>
											<td><?= $row['no_hp'] ?></td>
										</tr>
										<tr>
											<td><b>Tempat Tanggal Lahir</b></td>
											<td>:</td>
											<td><?= $row['tempat_lahir'] ?>, <?= $row['tanggal_lahir'] ?></td>
										</tr>
										<tr>
											<td><b>Mata Pelajaran</b></td>
											<td>:</td>
											<td><?= $row['mata_pelajaran'] ?></td>
										</tr>
										<tr>
											<td><b>Alamat</b></td>
											<td>:</td>
											<td><?= $row['alamat'] ?></td>
										</tr>
										<tr>
											<td><b>Foto</b></td>
											<td>:</td>
											<td><img src="../../images/guru/<?= $row['foto'] ?>" alt="<?= $row['nama'] ?>" width="25%" class="img-thumbnail"></td>
										</tr>
										<tr>
											<td><b></td>
											<td></td>
											<td>
												<a href="ubah.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Ubah</a>
												<a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?')">Hapus</a>
												<a href="index.php" class="btn btn-secondary btn-sm">Kembali</a>
											</td>
										</tr>
									</table>
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
