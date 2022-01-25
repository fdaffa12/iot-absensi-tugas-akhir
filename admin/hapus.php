<?php 
	include "koneksi.php";

	//baca id data yang akan dihapus
	$id = $_GET['id'];

	//hapus data
	$hapus = mysqli_query($konek, "delete from murid where id='$id'");

	//jika berhasil tersimpan, tampil alert kembali ke data murid
	if($hapus)
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
?>