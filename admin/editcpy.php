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
<html>
<head>
	<?php include "header.php"; ?>
	<title>Tambah Data Murid</title>
</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Tambah Data Murid</h3>

		<!-- form input -->
		<form method="POST">
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
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>