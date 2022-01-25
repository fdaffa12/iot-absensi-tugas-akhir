<?php 
require_once '../../koneksi.php';

$query = mysqli_query($koneksi, "SELECT tbl_artikel.*, tbl_kategori_artikel.nama_kategori FROM tbl_artikel LEFT JOIN tbl_kategori_artikel ON tbl_artikel.id_kategori = tbl_kategori_artikel.id ORDER BY id desc");
$no = 1;
// $active = 'artikel';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  $page = 'artikel';
  $open = 'artikel';
  include "header.php"; 
  ?>
  <title>Artikel - SMP Riadhul Jannah</title>
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
                      Daftar Artikel
                    </div>
                    <div class="float-right">
                      <a href="tambah.php">Tambah</a>
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
                  <table id="table_id" class="dataTable table table-bordered">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th width="250px">Gambar Artikel</th>
                              <th>Judul Artikel</th>
                              <th>Kategori Artikel</th>
                              <th width="100px">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php while($row = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><img src="../../images/artikel/<?= $row['foto'] ?>" alt="<?= $row['judul'] ?>" width="100%" class="img-thumbnail"></td>
                          <td><a href="detail.php?id=<?= $row['id'] ?>"><?= $row['judul'] ?></a></td>
                          <td><?= isset($row['nama_kategori']) ? $row['nama_kategori'] : '-' ?></td>
                          <td>
                            <a href="ubah.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Ubah</a>
                            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?')">Hapus</a>
                          </td>
                        </tr>
                      <?php endwhile; ?>
                      </tbody>
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
