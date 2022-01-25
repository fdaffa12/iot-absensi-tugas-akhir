<?php
$sql01 = "SELECT cluster.Cluster FROM cluster GROUP BY cluster.Cluster";
$tcluster = $conn->query($sql01);
if ($tcluster->num_rows > 0) {
	while($trow = $tcluster->fetch_assoc()) {
		$x=$trow['Cluster'];
?>
				<div class="col-sm-12">
				<div class="alert alert-success" role="alert"><strong>Hasil <?php echo $x;?></strong></div>
					<table style="margin-left: auto; margin-right: auto;" class="table table-hover">
							<tr style="height: 25px; background-color: #000080; font-size: 11px;" bgcolor="#000099">
								<td style="height: 25px; text-align: center;" colspan="10"><strong><span style="color: #ffffff;">Data Pusat Cluster</span></strong></td>
							</tr>					
					<?php
						//$x=1;
							$sql11 = "SELECT * FROM cluster WHERE Cluster = '$x'";
							$cluster = $conn->query($sql11);
							if ($cluster->num_rows > 0) {
								while($row = $cluster->fetch_assoc()) {
					?>
								
						<tr>
								<td style="text-align: left;">&nbsp;<?php echo $row['idx'];?></td>
								<td style="text-align: right;">&nbsp;<?php echo $row['jam_masuk'];?></td>
								<td style="text-align: right;">&nbsp;<?php echo $row['jam_istirahat'];?></td>
								<td style="text-align: right;">&nbsp;<?php echo $row['jam_kembali'];?></td>
								<td style="text-align: right;">&nbsp;<?php echo $row['jam_pulang'];?></td>
						</tr>

					<?php 
								}
							}
					?>
					</table>
				</div>
				<div class="col-sm-12">
					<table style="margin-left: auto; margin-right: auto;" class="table table-hover">
						<thead>
							<tr style="height: 25px; background-color: #000080;">
								<td style="width: 200px;" rowspan="2">
									<p style="text-align: center;"><strong><span style="color: #ffffff;">ID</span></strong></p>
								</td>
								<td style="text-align: center;" colspan="4"><strong><span style="color: #ffffff;">Algoritma K-Means</span></strong></td>
								<td style="width: 65px; text-align: center;" rowspan="2"><strong><span style="color: #ffffff;">C1</span></strong></td>
								<td style="width: 65px; text-align: center;" rowspan="2"><strong><span style="color: #ffffff;">C2</span></strong></td>
								<td style="width: 65px; text-align: center;" rowspan="2"><strong><span style="color: #ffffff;">C3</span></strong></td>
								<td style="width: 65px; text-align: center;" rowspan="2"><strong><span style="color: #ffffff;">Jarak</span></strong></td>
								<td style="width: 65px; text-align: center;" rowspan="2"><strong><span style="color: #ffffff;">BCV</span></strong></td>
								<td style="width: 65px; text-align: center;" rowspan="2"><strong><span style="color: #ffffff;">WCV</span></strong></td>
							
							</tr>
							<tr style="height: 25px; background-color: #000080;">
								<td style="width: 65px; text-align: center;"><strong><span style="color: #ffffff;">Jam Masuk</span></strong></td>
								<td style="width: 65px; text-align: center;"><strong><span style="color: #ffffff;">Jam Istirahat</span></strong></td>
								<td style="width: 65px; text-align: center;"><strong><span style="color: #ffffff;">Jam Kembali</span></strong></td>
								<td style="width: 65px; text-align: center;"><strong><span style="color: #ffffff;">Jam Pulang</span></strong></td>

							</tr>
						</thead>
						<tbody>
							<tr style="height: 15px;">
<?php
$sql12 = "SELECT `data`.id,`data`.jam_masuk,`data`.jam_istirahat,`data`.jam_kembali,`data`.jam_pulang,iterasi.c1,iterasi.c2,iterasi.c3,iterasi.min,iterasi.bcv,iterasi.wcv FROM `data` INNER JOIN iterasi ON iterasi.ID_data = `data`.ID WHERE Cluster = '$x'";
$hasil = $conn->query($sql12);
if ($hasil->num_rows > 0) {
	while($row = $hasil->fetch_assoc()) {
?>
								<td style="text-align: left;">&nbsp;<?php echo $row['id'];?></td>
								<td style="text-align: right;">&nbsp;<?php echo $row['jam_masuk'];?></td>
								<td style="text-align: right;">&nbsp;<?php echo $row['jam_istirahat'];?></td>
								<td style="text-align: right;">&nbsp;<?php echo $row['jam_kembali'];?></td>
								<td style="text-align: right;">&nbsp;<?php echo $row['jam_pulang'];?></td>
								<td style="text-align: right;<?php if($row['c1']<$row['c2']&&$row['c1']<$row['c3']) echo "background-color: #ffdd33;"?>">&nbsp;<?php echo $row['c1'];?></td>
								<td style="text-align: right;<?php if($row['c2']<$row['c1']&&$row['c2']<$row['c3']) echo "background-color: #ffdd33;"?>">&nbsp;<?php echo $row['c2'];?></td>
								<td style="text-align: right;<?php if($row['c3']<$row['c1']&&$row['c3']<$row['c2']) echo "background-color: #ffdd33;"?>">&nbsp;<?php echo $row['c3'];?></td>
								<td style="text-align: right;">&nbsp;<?php echo $row['min'];?></td>
								<td style="text-align: right;">&nbsp;<?php echo $row['bcv'];?></td>
								<td style="text-align: right;">&nbsp;<?php echo $row['wcv'];?></td>
							</tr>
<?php
    }
} else {
?>
							<tr style="height: 25px;">
								<td style="height: 25px; text-align: center;" colspan="15"><strong><span>Data Tidak Ditemukan ...</span></strong></td>
							</tr>
<?php
}
?>
						</tbody>
					</table>
				</div>
<?php
	}
}
?>