<?php
require_once 'cek_session.php';
include_once("config.php");
	$sql1 = "SELECT MAX(Cluster)AS hasil FROM iterasi";
	$result1 = $conn->query($sql1);
	$row1 = $result1->fetch_assoc();
	$sql2 = "SELECT SUM(if(min='c1',1,0))AS C1,SUM(if(min='c2',1,0))AS C2, SUM(if(min='c3',1,0))AS C3 FROM iterasi WHERE Cluster = '$row1[hasil]'";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();
	$sql3 = "SELECT iterasi.*,`data`.id, `data`.nama, `data`.tanggal FROM iterasi LEFT JOIN `data` ON `data`.ID = iterasi.ID_data WHERE Cluster = '$row1[hasil]'";	
	$result3 = $conn->query($sql3);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
	  $page = 'chart';
	  $open = 'dashboard';
	  include "header.php"; 
	?>
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
			.form-horizontal .form-inline .form-group{
				margin-left: 0px;
				margin-right: 0px;
				margin-bottom:5px;
			}
			.table tr td{
				position: relative;
				padding:1px !important;
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

		.flot-chart {
		  display: block;
		  height: 400px;
		}
		.flot-chart-content {
		  width: 100%;
		  height: 100%;
		}
	</style>
	<script src="jquery/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Flot Charts JavaScript -->
    <script src="flot/excanvas.min.js"></script>
    <script src="flot/jquery.flot.js"></script>
    <script src="flot/jquery.flot.pie.js"></script>
    <script src="flot/jquery.flot.tooltip.min.js"></script>
    <script>
//Flot Line Chart
$(document).ready(function() {

    var offset = 0;
    plot();

    function plot() {
		var data = [{
			label: "C1",
			data: <?php echo $row2['C1'];?>
		}, {
			label: "C2",
			data: <?php echo $row2['C2'];?>
		}, {
			label: "C3",
			data: <?php echo $row2['C3'];?>
		}];

		var options = {
			series: {
				pie: {
					show: true
				}
			},		
			grid: {
				hoverable: true
			},
			tooltipOpts: {
				content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
				shifts: {
					x: 20,
					y: 0
				}
			},
			tooltip: true
		};
		var plotObj = $.plot($("#flot-pie-chart"), data,options);		
    }
});	
	</script>

	</head>

	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">

		      <?php include "menu.php"; ?>

		  <!-- Content Wrapper. Contains page content -->
		  <div class="content-wrapper">
		    <!-- Content Header (Page header) -->
		    <section class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1>Selamat Datang Di Sistem Absensi</h1>
		          </div>
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
		              <li class="breadcrumb-item active">Home</li>
		            </ol>
		          </div>
		        </div>
		      </div><!-- /.container-fluid -->
		    </section>

		    <!-- Main content -->
		    <section class="content">
	    		<div class="container-fluid">


		            <!-- /.row -->
		            <div class="row">
						<div class="col-md-5">
							<table style="margin-left: auto; margin-right: auto;" class="table table-hover">
								<thead>
									<tr style="height: 25px; background-color: #000080; font-size: 11px;" bgcolor="#000099">
										<td style="height: 25px; text-align: center;" colspan="6"><strong><span style="color: #ffffff;">Hasil</span></strong></td>
									</tr>
									<tr style="height: 25px; background-color: #000080; font-size: 11px;" bgcolor="#000099">
										<td style="width: 15px; text-align: center;"><strong><span style="color: #ffffff;">ID</span></strong></td>
										<td style="width: 75px; text-align: center;"><strong><span style="color: #ffffff;">Nama</span></strong></td>
										<td style="width: 65px; text-align: center;"><strong><span style="color: #ffffff;">Tanggal</span></strong></td>
										<td style="width: 25px; text-align: center;"><strong><span style="color: #ffffff;">C1</span></strong></td>
										<td style="width: 25px; text-align: center;"><strong><span style="color: #ffffff;">C2</span></strong></td>
										<td style="width: 25px; text-align: center;"><strong><span style="color: #ffffff;">C3</span></strong></td>
									</tr>
								</thead>
								<tbody>	
								<?php						
									if ($result3->num_rows > 0) {
										while($row3 = $result3->fetch_assoc()) {	
								?>
															<tr style="height: 15px;">
																<td style="text-align: left;">&nbsp;<?php echo $row3['id']?></td>
																<td style="text-align: left;">&nbsp;<?php echo $row3['nama']?></td>
																<td style="text-align: center;">&nbsp;<?php echo $row3['tanggal']?></td>
																<td style="text-align: center; <?php if($row3['min']=='C1') echo 'background-color: #ffdd33;';?>">&nbsp;<strong><?php if($row3['min']=='C1') echo '1';?></strong></td>
																<td style="text-align: center; <?php if($row3['min']=='C2') echo 'background-color: #ffdd33;';?>">&nbsp;<strong><?php if($row3['min']=='C2') echo '1';?></strong></td>
																<td style="text-align: center; <?php if($row3['min']=='C3') echo 'background-color: #ffdd33;';?>">&nbsp;<strong><?php if($row3['min']=='C3') echo '1';?></strong></td>
															</tr>								
								<?php
										}
									}
									mysqli_data_seek($result3,0);
								?>	
								</tbody>
								<tfoot>
									<tr style="height: 25px;">
										<td style="text-align: left;"><strong>&nbsp;</strong></td>
										<td style="text-align: right;"><strong>&nbsp;</strong></td>
										<td style="text-align: right;"><strong>&nbsp;</strong></td>
									</tr>
								</tfoot>
							</table>						
						</div>
		                <div class="col-md-7">
		                    <div class="panel panel-default">
		                        <div class="panel-heading">
		                            Hasil
		                        </div>
		                        <!-- /.panel-heading -->
		                        <div class="panel-body">
		                            <div class="flot-chart">
		                                <div class="flot-chart-content" id="flot-pie-chart"></div>
		                            </div>
		                        </div>
		                        <!-- /.panel-body -->
		                    </div>
		                    <!-- /.panel -->
		                </div>
						 <div class="col-md-12">
							<p><strong style="text-decoration: underline;">Keterangan :</strong></p>
							<p>Jadi kecamatan yang termasuk cluster 1 (C1) dan cluster 2 (C2) sebagai berikut :</p>
							<p>Cluster Satu ( C1 )</p>
							<p>
								<ol>
								<?php						
									if ($result3->num_rows > 0) {
										while($row3 = $result3->fetch_assoc()) {	
											if($row3['min']=='C1'){
								?>						
															<li>(Id: <?php echo $row3['id'];?>). <?php echo $row3['nama'];?> (<?php echo $row3['tanggal'];?>)</li>
								<?php
											}
										}
									}
									mysqli_data_seek($result3,0);
								?>	
														</ol>
													</p>
													<p>Cluster Satu ( C2 )</p>
													<p>
														<ol>
								<?php						
									if ($result3->num_rows > 0) {
										while($row3 = $result3->fetch_assoc()) {
											if($row3['min']=='C2'){		
								?>						
															<li>(Id: <?php echo $row3['id'];?>). <?php echo $row3['nama'];?> (<?php echo $row3['tanggal'];?>)</li>
								<?php
											}
										}
									}
									mysqli_data_seek($result3,0);
								?>	
														</ol>
													</p>
													<p>Cluster Satu ( C3 )</p>
													<p>
														<ol>
								<?php						
									if ($result3->num_rows > 0) {
										while($row3 = $result3->fetch_assoc()) {	
											if($row3['min']=='C3'){
								?>						
															<li>(Id: <?php echo $row3['id'];?>). <?php echo $row3['nama'];?> (<?php echo $row3['tanggal'];?>)</li>
								<?php
											}
										}
									}
									mysqli_data_seek($result3,0);
								?>	
								</ol>
							</p>
						 </div>
		            </div>
		        </div>
		    </section>
		    <!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

</body>

</html>
