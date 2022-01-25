<?php
include_once("config.php");
require_once 'cek_session.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if($_GET['cmd']=='process'){
		$c1jam_masuk = $_POST['c1jam_masuk'];	$c1jam_istirahat = $_POST['c1jam_istirahat'];	$c1jam_kembali = $_POST['c1jam_kembali'];	$c1jam_pulang = $_POST['c1jam_pulang'];
		$c2jam_masuk = $_POST['c2jam_masuk'];	$c2jam_istirahat = $_POST['c2jam_istirahat'];	$c2jam_kembali = $_POST['c2jam_kembali'];	$c2jam_pulang = $_POST['c2jam_pulang'];
		$c3jam_masuk = $_POST['c3jam_masuk'];	$c3jam_istirahat = $_POST['c3jam_istirahat'];	$c3jam_kembali = $_POST['c3jam_kembali'];	$c3jam_pulang = $_POST['c3jam_pulang'];
		$sql1 = "SELECT * FROM data";
		$result = $conn->query($sql1);

		if ($result->num_rows > 0) {
			$sql2 = "TRUNCATE TABLE cluster;";
			$conn->query($sql2);
			$sql3 = "TRUNCATE TABLE iterasi;";
			$conn->query($sql3);	
			$finis = false;
			$i=1;
			while(!$finis) {

				$sql4 = "INSERT INTO cluster (Cluster, idx, jam_masuk, jam_istirahat, jam_kembali, jam_pulang) VALUES 
					('$i', 'c1', '$c1jam_masuk', '$c1jam_istirahat', '$c1jam_kembali', '$c1jam_pulang'),
					('$i', 'c2', '$c2jam_masuk', '$c2jam_istirahat', '$c2jam_kembali', '$c2jam_pulang'),
					('$i', 'c3', '$c3jam_masuk', '$c3jam_istirahat', '$c3jam_kembali', '$c3jam_pulang');";
				$conn->query($sql4);			
				while($row = $result->fetch_assoc()) {
					//echo $i;
					$hc1 = sqrt((pow(($row['jam_masuk']-$c1jam_masuk),2))+(pow(($row['jam_istirahat']-$c1jam_istirahat),2))+(pow(($row['jam_kembali']-$c1jam_kembali),2))+(pow(($row['jam_pulang']-$c1jam_pulang),2)));
					$hc2 = sqrt((pow(($row['jam_masuk']-$c2jam_masuk),2))+(pow(($row['jam_istirahat']-$c2jam_istirahat),2))+(pow(($row['jam_kembali']-$c2jam_kembali),2))+(pow(($row['jam_pulang']-$c2jam_pulang),2)));
					$hc3 = sqrt((pow(($row['jam_masuk']-$c3jam_masuk),2))+(pow(($row['jam_istirahat']-$c3jam_istirahat),2))+(pow(($row['jam_kembali']-$c3jam_kembali),2))+(pow(($row['jam_pulang']-$c3jam_pulang),2)));
					// $min  =($hc1<$hc2)?'c1':'c2';


					if ($hc1<$hc2 && $hc1<$hc3){
						$min='C1';
					}else if($hc2<$hc1 && $hc2<$hc3){
						$min='C2';
					}else{
						$min='C3';
					}

					if ($hc1<$hc2 && $hc1<$hc3){
						$wcv=$hc1*$hc1;
					}else if($hc2<$hc1 && $hc2<$hc3){
						$wcv=$hc2*$hc2;
					}else{
						$wcv=$hc3*$hc3;
					}

					$d1 = sqrt((pow(($c1jam_masuk-$c2jam_masuk),2))+(pow(($c1jam_istirahat-$c2jam_istirahat),2))+(pow(($c1jam_kembali-$c2jam_kembali),2))+(pow(($c1jam_pulang-$c2jam_pulang),2)));

					$d2 = sqrt((pow(($c1jam_masuk-$c3jam_masuk),2))+(pow(($c1jam_istirahat-$c3jam_istirahat),2))+(pow(($c1jam_kembali-$c3jam_kembali),2))+(pow(($c1jam_pulang-$c3jam_pulang),2)));

					$d3 = sqrt((pow(($c2jam_masuk-$c3jam_masuk),2))+(pow(($c2jam_istirahat-$c3jam_istirahat),2))+(pow(($c2jam_kembali-$c3jam_kembali),2))+(pow(($c2jam_pulang-$c3jam_pulang),2)));

					$bcv = ($d1+$d2+$d3);

					$sql5 = "INSERT INTO iterasi(Cluster, ID_data, c1, c2, c3, min, bcv, wcv)VALUES('$i', '$row[id]', '$hc1', '$hc2', '$hc3', '$min', '$bcv', '$wcv');";
					$conn->query($sql5);
				}
				mysqli_data_seek($result,0);
				
				$sql6 = "SELECT Sum(`data`.jam_masuk) AS jam_masuk,Sum(`data`.jam_istirahat) AS jam_istirahat,Sum(`data`.jam_kembali) AS jam_kembali,Sum(`data`.jam_pulang) AS jam_pulang, sum(if(iterasi.min='c1',1,0))AS cnt FROM `data` INNER JOIN iterasi ON iterasi.ID_data = `data`.ID WHERE iterasi.min = 'c1' AND iterasi.Cluster = '$i';";
				//echo $sql6;
				$c1 = $conn->query($sql6);	
				$row = $c1->fetch_assoc();
				$c1jam_masuk = $row['jam_masuk']/$row['cnt'];	$c1jam_istirahat = $row['jam_istirahat']/$row['cnt'];	$c1jam_kembali = $row['jam_kembali']/$row['cnt'];	$c1jam_pulang = $row['jam_pulang']/$row['cnt'];

				$sql7 = "SELECT Sum(`data`.jam_masuk) AS jam_masuk,Sum(`data`.jam_istirahat) AS jam_istirahat,Sum(`data`.jam_kembali) AS jam_kembali,Sum(`data`.jam_pulang) AS jam_pulang, sum(if(iterasi.min='c2',1,0))AS cnt FROM `data` INNER JOIN iterasi ON iterasi.ID_data = `data`.ID WHERE iterasi.min = 'c2' AND iterasi.Cluster = '$i';";
				$c2 = $conn->query($sql7);	
				$row = $c2->fetch_assoc();
				$c2jam_masuk = $row['jam_masuk']/$row['cnt'];	$c2jam_istirahat = $row['jam_istirahat']/$row['cnt'];	$c2jam_kembali = $row['jam_kembali']/$row['cnt'];	$c2jam_pulang = $row['jam_pulang']/$row['cnt'];

				$sql8 = "SELECT Sum(`data`.jam_masuk) AS jam_masuk,Sum(`data`.jam_istirahat) AS jam_istirahat,Sum(`data`.jam_kembali) AS jam_kembali,Sum(`data`.jam_pulang) AS jam_pulang, sum(if(iterasi.min='c3',1,0))AS cnt FROM `data` INNER JOIN iterasi ON iterasi.ID_data = `data`.ID WHERE iterasi.min = 'c3' AND iterasi.Cluster = '$i';";
				$c3 = $conn->query($sql8);	
				$row = $c3->fetch_assoc();
				$c3jam_masuk = $row['jam_masuk']/$row['cnt'];	$c3jam_istirahat = $row['jam_istirahat']/$row['cnt'];	$c3jam_kembali = $row['jam_kembali']/$row['cnt'];	$c3jam_pulang = $row['jam_pulang']/$row['cnt'];
				
				$i1=$i;
				$i2=$i-1;
				$sql9 = "SELECT A.min FROM (SELECT ID_data,min FROM iterasi WHERE Cluster ='$i1') AS A JOIN (SELECT ID_data,min FROM iterasi WHERE Cluster ='$i2') AS B ON A.ID_data = B.ID_data AND A.min = B.min;";
				$cek = $conn->query($sql9);
				
				if($result->num_rows == $cek->num_rows){
					$finis = true;
				}
				$i++;
			}
			$arr['stt'] = "ok";
			ob_start();
			include('hasil.php');
			$arr['data'] = ob_get_contents();
			ob_end_clean();
			//$arr['data'] = include('hasil.php');
			echo json_encode($arr);
		}		
	}	

	$conn->close();
	exit();
}
$sql = "SELECT * FROM data";
$result = $conn->query($sql);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
		    $page = 'pd';
		    $open = 'dashboard';
		    include "header.php";
		?>
		<title>Real Time Chart</title>
		<!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
		<style>
			table {
				font-size: 10px;
			}
			.container{
				font-size: 12px;
				margin-bottom: 80px;
			}
			.footer {
				background-color: #f5f5f5;
				bottom: 0;
				height: 60px;
				position: fixed;
				width: 100%;
			}
			.footer .container{
				margin-bottom: 0px;
			}
			.footer .container .text-muted {
				margin: 20px 0;
				font-size:14px;
			}
			.form-inline .form-group{
				margin-left: 0px;
				margin-right: 0px;
				margin-bottom:5px;
			}
			table tr td{
				position: relative;
			}
			
			table tr td .d-control{
				display: none;
				position:absolute;
				bottom:5px;
				right:5px;
			}
				
			table tr:hover .d-control {
				display: block;
			}
			#hasil table tr td{
				padding:1px;
			}
		</style>
		<script src="jquery/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script>
			$( document ).ready(function() {
				$("#dc1").change(function(event) {
					$('#c1jam_masuk').val($('option:selected',this).attr('jam_masuk'));
					$('#c1jam_istirahat').val($('option:selected',this).attr('jam_istirahat'));
					$('#c1jam_kembali').val($('option:selected',this).attr('jam_kembali'));
					$('#c1jam_pulang').val($('option:selected',this).attr('jam_pulang'));
				});
				$("#dc2").change(function(event) {
					$('#c2jam_masuk').val($('option:selected',this).attr('jam_masuk'));
					$('#c2jam_istirahat').val($('option:selected',this).attr('jam_istirahat'));
					$('#c2jam_kembali').val($('option:selected',this).attr('jam_kembali'));
					$('#c2jam_pulang').val($('option:selected',this).attr('jam_pulang'));
				});
				$("#dc3").change(function(event) {
					$('#c3jam_masuk').val($('option:selected',this).attr('jam_masuk'));
					$('#c3jam_istirahat').val($('option:selected',this).attr('jam_istirahat'));
					$('#c3jam_kembali').val($('option:selected',this).attr('jam_kembali'));
					$('#c3jam_pulang').val($('option:selected',this).attr('jam_pulang'));
				});
				$("#frm-entry").submit(function(event) {
					event.preventDefault();
					if(ValidateForm($("#frm-entry"))){
					$.ajax({
						type: "POST",
						async: false,
						url: "prosesdata.php?cmd=process",
						data: $(this).serializeArray(),
						dataType: "json",
						success: function(data) {
							if(data.stt=='ok') {
								//var win = window.open('http://localhost/rudibps/hasil.php');
								//win.focus();
								$('#data').html(data.data);
								$("#hasil").show();
								$('html, body').animate({
									scrollTop: $("#hasil").offset().top
								}, 2000);
							}else{
								alert('gagal1');
							}
								
						},
						error: function() {
							alert('gagal2');
						}
					});
					}
				});				
			});
			function ValidateForm(element) {
				var form = element[0];
				for (var i=0, iLen=form.length; i<iLen; i++) {
					if ($(form[i]).hasClass("form-control")) {
						if($(form[i]).val()===''){
							alert('data tidak bisa di proses\nSilahkan lengkapi Pusat Cluster');
							$(form[i]).focus();
							return false;
							break;
						}
					}
				}
				return true;
			}
		</script>
	</head>
	<body class="hold-transition sidebar-mini layout-fixed">

		<?php
		  include "menu.php";
		?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
		    <!-- Content Header (Page header) -->
		    <section class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1>Penentuan Nilai Kedisiplinan Berdasarkan Absensi Menggunakan Metore K-Means</h1>
		          </div>
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
		              <li class="breadcrumb-item active">Proses Penghitungan K-Means</li>
		            </ol>
		          </div>
		        </div>
		      </div><!-- /.container-fluid -->
		    </section>

		    <!-- Main content -->
		    <section class="content">
		    	<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default">
							  <div class="panel-heading"><strong>Penentuan pusat awal cluster</strong></div>
							  <div class="panel-body ">
							  <form class="form-inline" id="frm-entry">
								<div class="panel panel-default">
									<div class="panel-heading clearfix">
									  <div class="col-sm-2">
										<strong>Pusat Cluster Ke-1</strong>
									  </div>
									  <div class="col-sm-9">
										<select id="dc1" class="form-control input-sm">
										   <option value="C2">Custom..</option>
										<?php
										if ($result->num_rows > 0) {
										    while($row = $result->fetch_assoc()) {
										?>		
																		  <option 
																		  jam_masuk="<?php echo $row['jam_masuk'];?>" 
																		  jam_istirahat="<?php echo $row['jam_istirahat'];?>" 
																		  jam_kembali="<?php echo $row['jam_kembali'];?>" 
																		  jam_pulang="<?php echo $row['jam_pulang'];?>"
																		  value="<?php echo $row['id'];?>"><?php echo $row['id'];?></option>
										<?php
											}
										}
										mysqli_data_seek($result,0);
										?>
										</select>
									  </div>
									</div>
									<div class="panel-body ">
									  <div class="form-group">
										<label for="Jam Masuk">Jam Masuk</label>
										<input type="text" placeholder="Jam Masuk" name="c1jam_masuk" id="c1jam_masuk" class="form-control input-sm number">
									  </div>
									  <div class="form-group">
										<label for="Jam Istirahat">Jam Istirahat</label>
										<input type="text" placeholder="Jam Istirahat" name="c1jam_istirahat" id="c1jam_istirahat" class="form-control input-sm number">
									  </div>
									  <div class="form-group">
										<label for="Jam Kembali">Jam Kembali</label>
										<input type="text" placeholder="Jam Kembali" name="c1jam_kembali" id="c1jam_kembali" class="form-control input-sm number">
									  </div>
									  <div class="form-group">
										<label for="Jam Pulang">Jam Pulang</label>
										<input type="text" placeholder="Jam Pulang" name="c1jam_pulang" id="c1jam_pulang" class="form-control input-sm number">
									  </div>
									</div>
								</div>	
								<div class="panel panel-default">
									<div class="panel-heading clearfix">
									  <div class="col-sm-2">
										<strong>Pusat Cluster Ke-2</strong>
									  </div>
									  <div class="col-sm-9">
										<select id="dc2" class="form-control input-sm">
										   <option value="C1">Custom..</option>
										<?php
										if ($result->num_rows > 0) {
										    while($row = $result->fetch_assoc()) {
										?>		
																		  <option 
																		  jam_masuk="<?php echo $row['jam_masuk'];?>" 
																		  jam_istirahat="<?php echo $row['jam_istirahat'];?>" 
																		  jam_kembali="<?php echo $row['jam_kembali'];?>" 
																		  jam_pulang="<?php echo $row['jam_pulang'];?>"
																		  value="<?php echo $row['id'];?>"><?php echo $row['id'];?></option>
										<?php
											}
										}
										mysqli_data_seek($result,0);
										?>
										</select>
									  </div>
									</div>
									<div class="panel-body ">
									  <div class="form-group">
										<label for="Jam Masuk">Jam Masuk</label>
										<input type="text" placeholder="Jam Masuk" name="c2jam_masuk" id="c2jam_masuk" class="form-control input-sm number">
									  </div>
									  <div class="form-group">
										<label for="Jam Istirahat">Jam Istirahat</label>
										<input type="text" placeholder="Jam Istirahat" name="c2jam_istirahat" id="c2jam_istirahat" class="form-control input-sm number">
									  </div>
									  <div class="form-group">
										<label for="Jam Kembali">Jam Kembali</label>
										<input type="text" placeholder="Jam Kembali" name="c2jam_kembali" id="c2jam_kembali" class="form-control input-sm number">
									  </div>
									  <div class="form-group">
										<label for="Jam Pulang">Jam Pulang</label>
										<input type="text" placeholder="Jam Pulang" name="c2jam_pulang" id="c2jam_pulang" class="form-control input-sm number">
									  </div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading clearfix">
									  <div class="col-sm-2">
										<strong>Pusat Cluster Ke-3</strong>
									  </div>
									  <div class="col-sm-9">
										<select id="dc3" class="form-control input-sm">
										   <option value="C1">Custom..</option>
										<?php
										if ($result->num_rows > 0) {
										    while($row = $result->fetch_assoc()) {
										?>		
																		  <option 
																		  jam_masuk="<?php echo $row['jam_masuk'];?>" 
																		  jam_istirahat="<?php echo $row['jam_istirahat'];?>" 
																		  jam_kembali="<?php echo $row['jam_kembali'];?>" 
																		  jam_pulang="<?php echo $row['jam_pulang'];?>"
																		  value="<?php echo $row['id'];?>"><?php echo $row['id'];?></option>
										<?php
											}
										}
										mysqli_data_seek($result,0);
										?>
										</select>
									  </div>
									</div>
									<div class="panel-body ">
									  <div class="form-group">
										<label for="Jam Masuk">Jam Masuk</label>
										<input type="text" placeholder="Jam Masuk" name="c3jam_masuk" id="c3jam_masuk" class="form-control input-sm number">
									  </div>
									  <div class="form-group">
										<label for="Jam Istirahat">Jam Istirahat</label>
										<input type="text" placeholder="Jam Istirahat" name="c3jam_istirahat" id="c3jam_istirahat" class="form-control input-sm number">
									  </div>
									  <div class="form-group">
										<label for="Jam Kembali">Jam Kembali</label>
										<input type="text" placeholder="Jam Kembali" name="c3jam_kembali" id="c3jam_kembali" class="form-control input-sm number">
									  </div>
									  <div class="form-group">
										<label for="Jam Pulang">Jam Pulang</label>
										<input type="text" placeholder="Jam Pulang" name="c3jam_pulang" id="c3jam_pulang" class="form-control input-sm number">
									  </div>
									</div>
								</div>
								<button type="submit" class="btn btn-success">Prosess data</button>
							  </form>
							  </div>
							</div>
						</div>
						<div class="col-sm-12">
							<table style="margin-left: auto; margin-right: auto;" class="table table-hover">
								<thead>
									<tr style="height: 25px; background-color: #000080; font-size: 11px;" bgcolor="#000099">
										<td style="height: 25px; text-align: center;" colspan="10"><strong><span style="color: #ffffff;">Data Absensi Siswa Kelas 9 SMP Riadhul Jannah Cab.Cimenteng</span></strong></td>
									</tr>
									<tr style="height: 25px; background-color: #000080;">
										<td style="width: 25px;" rowspan="2">
											<p style="text-align: center;"><strong><span style="color: #ffffff;">ID</span></strong></p>
										</td>
										<td style="text-align: center;" colspan="9"><strong><span style="color: #ffffff;">Berdasarkan Menit</span></strong></td>
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
								if ($result->num_rows > 0) {
								    while($row = $result->fetch_assoc()) {
									$jam_masuk += $row['jam_masuk'];
									$jam_istirahat += $row['jam_istirahat'];
									$jam_kembali += $row['jam_kembali'];
									$jam_pulang += $row['jam_pulang'];
								?>
										<td style="text-align: left;">&nbsp;<?php echo $row['id'];?></td>
										<td style="text-align: right;">&nbsp;<?php echo $row['jam_masuk'];?></td>
										<td style="text-align: right;">&nbsp;<?php echo $row['jam_istirahat'];?></td>
										<td style="text-align: right;">&nbsp;<?php echo $row['jam_kembali'];?></td>
										<td style="text-align: right;">&nbsp;<?php echo $row['jam_pulang'];?></td>
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
								<tfoot>
									<tr style="height: 25px;">
										<td style="text-align: left;"><strong>Total Data</strong></td>
										<td style="text-align: right;"><strong>&nbsp;<?php echo $jam_masuk;?></strong></td>
										<td style="text-align: right;"><strong>&nbsp;<?php echo $jam_istirahat;?></strong></td>
										<td style="text-align: right;"><strong>&nbsp;<?php echo $jam_kembali;?></strong></td>
										<td style="text-align: right;"><strong>&nbsp;<?php echo $jam_pulang;?></strong></td>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="col-sm-12" id="hasil" style="display:none;">
							<div id="data"></div>
						</div>
					</div>
				</div>
		    </section>
		    <!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<?php
		    include "footer.php";
		?>
	</body>
</html>