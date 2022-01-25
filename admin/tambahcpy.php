<!-- proses penyimpanan -->

<?php 
	include "koneksi.php";

	//jika tombol simpan diklik
	if(isset($_POST['btnSimpan']))
	{
		//baca isi kartu
		$nokartu = $_POST['nokartu'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];

		//simpan ke tabel murid
		$simpan = mysqli_query($konek, "insert into murid(nokartu, nama, alamat)values('$nokartu', '$nama', '$alamat')");

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

	//kosongkan tabel tmprfid
	mysqli_query($konek, "delete from tmprfid");
?>

<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Tambah Data Murid</title>

	<!-- pembacaan no rfid otomatis -->
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$("#norfid").load('nokartu.php')
			}, 0) //pembacaan kartu rfid;
		});
	</script>
</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Tambah Data Murid</h3>

		<!-- form input -->
		<form method="POST">
			<div id="norfid"></div>

			<div class="form-group">
				<label>Nama Murid</label>
				<input type="text" name="nama" id="nama" placeholder="Nama Murid" class="form-control" style="width: 250px">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" style="width: 400px"></textarea>
			</div>

			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>