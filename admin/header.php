<?php
session_start();
include "modul/koneksi.php";
include "modul/global.php";
$sql="SELECT * from user where id_user='$_SESSION[id]'";
$res=mysql_query($sql);
$arr=mysql_fetch_array($res);

function tampil_harga($type,$jenis){
	$sql="Select harga from harga where type='$type' AND jenis='$jenis'";
	$res=mysql_query($sql);
	$arr=mysql_fetch_array($res);

	return $arr['harga'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin CDC</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/modal.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/modal.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>

		
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>CDC-ITI |</span>|Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					
					<li class="dropdown">
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="user/<?=$arr['foto']?>" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><font size="2"><?=$_SESSION['nama']?></font></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li class="active"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
		<?php
			if($_SESSION['jenis']=='Admin' OR $_SESSION['jenis']=='Super_Admin' ){
		?>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-user">&nbsp;</em>User<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="user.php?mode=&jenis=Perusahaan">
						<span class="fa fa-arrow-right">&nbsp;</span>Perusahaan
					</a></li>
					<li><a class="" href="user.php?mode=&jenis=Pelamar">
						<span class="fa fa-arrow-right">&nbsp;</span>Pelamar
					</a></li>
					<li><a class="" href="user.php?mode=&jenis=Admin">
						<span class="fa fa-arrow-right">&nbsp;</span>Administrator
					</a></li>
				</ul>
			</li>
			<?php } ?>
			<?php
			if($_SESSION['jenis']!='Konseling' ){
			?>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-user">&nbsp;</em>Recruitment<span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="" href="lowongan.php?mode=">
						<span class="fa fa-arrow-right">&nbsp;</span>Posting Lowongan
					</a></li>
					<li><a class="" href="laporan_recruitment.php?mode=">
						<span class="fa fa-arrow-right">&nbsp;</span>Laporan Lowongan
					</a></li>
					<li><a class="" href="hasil_tes.php?mode=">
						<span class="fa fa-arrow-right">&nbsp;</span>Hasil Tes
					</a></li>
				</ul>
			</li>

			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-user">&nbsp;</em>Info Saya<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="company-profile.php">
						<span class="fa fa-arrow-right">&nbsp;</span>Profile
					</a></li>
					<li><a class="" href="ganti_password.php">
						<span class="fa fa-arrow-right">&nbsp;</span>Ganti Password
					</a></li>
				</ul>
			</li>
			<?php 
				} 
				if($_SESSION['jenis']=='Super_Admin' ){
			?>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-4">
				<em class="fa fa-user">&nbsp;</em>Publish Sistem<span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li><a class="" href="event.php?mode=">
						<span class="fa fa-arrow-right">&nbsp;</span>Event
					</a></li>
					<li><a class="" href="banner.php?mode=">
						<span class="fa fa-arrow-right">&nbsp;</span>Banner
					</a></li>
					<li><a class="" href="posting.php?mode=">
						<span class="fa fa-arrow-right">&nbsp;</span>Posting
					</a></li>
				</ul>
			</li>
			<?php } 
				if($_SESSION['jenis']!='Perusahaan'){
			?>
			<li><a href="konseling.php"><em class="fa fa-calendar">&nbsp;</em> Jadwal Konseling</a></li>
			<?php } ?>
			<!--<li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
			<li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
			<li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
			-->
			<li><a href="modul/logout.php" style="background-color: red;color: white;" onclick="return confirm('Apakah Anda Yakin Akan Keluar?')"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
	