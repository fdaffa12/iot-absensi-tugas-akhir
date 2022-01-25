<?php 

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query_kategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori_artikel");
$query_artikel = mysqli_query($koneksi, "SELECT * FROM tbl_artikel WHERE id = $id");
$artikel = mysqli_fetch_assoc($query_artikel);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  $page = 'artikel';
  $open = 'artikel';
  include "header.php"; 
  ?>
  <title>Ubah Artikel - SMP Riadhul Jannah</title>
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
                      Ubah Artikel
                    </div>
                    <div class="float-right">
                      <a href="index.php">Kembali</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form method="POST" action="proses_ubah.php?id=<?= $artikel['id'] ?>" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="judul">Judul</label>
                      <input type="text" value="<?= $artikel['judul'] ?>" class="form-control" id="judul" placeholder="judul artikel" autocomplete="off" required="required" name="judul">
                    </div>
                    <div class="form-group">
                      <label for="id_kategori">Kategori Artikel</label>
                      <select name="id_kategori" id="id_kategori" class="form-control">
                        <?php while($kategori = mysqli_fetch_assoc($query_kategori)) : ?>
                          <option value="<?= $kategori['id'] ?>" <?= $artikel['id_kategori'] == $kategori['id'] ? 'selected' : '' ?> ><?= $kategori['nama_kategori'] ?></option>
                        <?php endwhile; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="foto">Foto</label>
                      <input type="file" class="form-control-file mb-2" id="foto" placeholder="foto artikel" autocomplete="off" name="foto">
                      *gambar sebelumnya <br>
                      <img src="../../images/artikel/<?= $artikel['foto'] ?>" alt="<?= $row['judul'] ?>" width="500px" class="mt-2">
                    </div>
                    <div class="form-group">
                      <label for="isi">Isi</label>
                      <textarea name="isi" id="ckeditor" class="ckeditor form-control">
                        <?= $artikel['isi'] ?>
                      </textarea>
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
