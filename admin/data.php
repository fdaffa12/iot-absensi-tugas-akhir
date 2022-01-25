<table border="1">
  <thead>
    <tr>
      <th style="width: 20px; text-align:center;">No.</th>
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
    $sql = mysqli_query($konek, "select b.nama, a.id, a.tanggal, a.jam_masuk, a.jam_istirahat, a.jam_kembali, a.jam_pulang from absensi a, murid b where a.nokartu=b.nokartu order by a.id desc");

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
  <!-- <a target="_blank" href="export.php">EXPORT KE EXCEL</a> -->
</table>