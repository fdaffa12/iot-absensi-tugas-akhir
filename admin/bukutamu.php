<?php 
require_once '../koneksi.php';
require_once 'cek_session.php';

$query = mysqli_query($koneksi, "SELECT * FROM tbl_bukutamu");
$no = 1;
$active = 'bukutamu';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  $page = 'buku';
  include "header.php"; 
  ?>
  <title>Buku Tamu - SMP Riadhul Jannah</title>
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
                      Daftar Bukutamu
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
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Isi</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php while($row = mysqli_fetch_assoc($query)) : ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $row['nama'] ?></td>
                              <td><?= $row['email'] ?></td>
                              <td><?= $row['isi'] ?></td>
                              <td>
                                <a href="hapus_bukutamu.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')">Hapus</a>
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
