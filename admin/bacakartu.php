<?php 
	include "koneksi.php";
	//baca tabel status untuk mode absensi
	$sql = mysqli_query($konek, "select * from status");
	$data = mysqli_fetch_array($sql);
	$mode_absen = $data['mode'];

	//uji mode absen
	$mode = "";
	if($mode_absen==1)
		$mode = "Masuk";
	else if($mode_absen==2)
		$mode = "Istirahat";
	else if($mode_absen==3)
		$mode = "Kembali";
	else if($mode_absen==4)
		$mode = "Pulang";


	//baca tabel tmprfid
	$baca_kartu = mysqli_query($konek, "select * from tmprfid");
	$data_kartu = mysqli_fetch_array($baca_kartu);
	$nokartu    = $data_kartu['nokartu'];
?>


<div class="container-fluid" style="text-align: center;">
	<?php if($nokartu=="") { ?>

	<h3>Absen : <?php echo $mode; ?> </h3>
	<h3>Silahkan Tempelkan Kartu RFID Anda</h3>
	<img src="src/images/rfid.png" style="width: 200px"> <br>
	<img src="src/images/animasi2.gif">

	<?php } else {
		//cek nomor kartu RFID tersebut apakah terdaftar di tabel murid
		$cari_murid = mysqli_query($konek, "select * from murid where nokartu='$nokartu'");
		$jumlah_data = mysqli_num_rows($cari_murid);

		if($jumlah_data==0)
			echo "<h1>Maaf! Kartu Tidak Dikenali</h1>";
		else
		{
			//ambil nama murid
			$data_murid = mysqli_fetch_array($cari_murid);
			$nama = $data_murid['nama'];

			//tanggal dan jam hari ini
			date_default_timezone_set('Asia/Jakarta') ;
			$tanggal = date('Y-m-d');
			$jam     = date('H:i:s');

			//cek di tabel absensi, apakah nomor kartu tersebut sudah ada sesuai tanggal saat ini. Apabila belum ada, maka dianggap absen masuk, tapi kalau sudah ada, maka update data sesuai mode absensi
			$cari_absen = mysqli_query($konek, "select * from absensi where nokartu='$nokartu' and tanggal='$tanggal'");
			//hitung jumlah datanya
			$jumlah_absen = mysqli_num_rows($cari_absen);
			if($jumlah_absen == 0)
			{
				echo "<h1>Selamat Datang <br> $nama</h1>";
				mysqli_query($konek, "insert into absensi(nokartu, tanggal, jam_masuk)values('$nokartu', '$tanggal', '$jam')");
			}
			else
			{
				//update sesuai pilihan mode absen
				if($mode_absen == 2)
				{
					echo "<h1>Selamat Istirahat <br> $nama</h1>";
					mysqli_query($konek, "update absensi set jam_istirahat='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
				}
				else if($mode_absen == 3)
				{
					echo "<h1>Selamat Datang Kembali <br> $nama</h1>";
					mysqli_query($konek, "update absensi set jam_kembali='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
				}
				else if($mode_absen == 4)
				{
					echo "<h1>Selamat Jalan <br> $nama</h1>";
					mysqli_query($konek, "update absensi set jam_pulang='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
				}
			}
		}

		//kosongkan tabel tmprfid
		mysqli_query($konek, "delete from tmprfid");
	} ?>

	<section class="content" style="padding-top:20px">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Rekap Absensi Hari Ini</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-brodered">
                  <thead>
                    <tr style="background-color: grey; color:white;">
                      <th style="width: 10px; text-align:center;">No.</th>
                      <th style="text-align: center;">Nama</th>
                      <th style=".text-align: center;">Tanggal</th>
                      <th style=".text-align: center;">Jam Masuk</th>
                      <th style=".text-align: center;">Jam Istirahat</th>
                      <th style=".text-align: center;">Jam Kembali</th>
                      <th style=".text-align: center;">Jam Pulang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php include "koneksi.php";

                    //baca tabel absensi dan relasasikan dengan tabel murid berdasarkan nomor kartu RFID untuk tanggal dan hari

                    //naca tanggal saat ini
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d');

                    //filter absensi berdasarkan tanggal saat ini
                    $sql = mysqli_query($konek, "select b.nama, a.tanggal, a.jam_masuk, a.jam_istirahat, a.jam_kembali, a.jam_pulang from absensi a, murid b where a.nokartu=b.nokartu and a.tanggal='$tanggal' order by a.jam_masuk");

                    $no = 0;
                    while ($data = mysqli_fetch_array($sql))
                      {
                        $no++;
                    ?>
                    <tr>
                      <td> <?php echo $no; ?></td>
                      <td> <?php echo $data['nama']; ?></td>
                      <td> <?php echo $data['tanggal']; ?></td>
                      <td> <?php echo $data['jam_masuk']; ?></td>
                      <td> <?php echo $data['jam_istirahat']; ?></td>
                      <td> <?php echo $data['jam_kembali']; ?></td>
                      <td> <?php echo $data['jam_pulang']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

</div>