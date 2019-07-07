<?php
include 'header.php';

function hitung_sisa_posting(){
	global $id;
	$q=mysql_query("SELECT kapasitas as data from user where id_user='$_SESSION[id]'");
	$arr=mysql_fetch_array($q);
	return $arr['data'];
}

function hitung_pelamar(){
	global $id;
	$q=mysql_query("SELECT count(*) as data FROM `tbl_lamar` a inner join lowongan b on a.id_lowongan=b.id_lowongan where id_comp='$_SESSION[id]'");
	$arr=mysql_fetch_array($q);
	$data=$arr['data'];
	return $data;
}

function hitung_posting(){
	global $id;
	$q=mysql_query("SELECT count(id_lowongan) as data,tanggal from lowongan where id_comp='$_SESSION[id]'");
	$arr=mysql_fetch_array($q);
	$data=$arr['data']."/".$arr['tanggal'];
	return $data;
}
$data=explode("/", hitung_posting());
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
							<div class="large"><?=hitung_sisa_posting();?></div>
							<div class="text-muted">SISA POSTING</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large"><?=$data[0];?></div>
							<div class="text-muted">BERHASIL POSTING<br>Terakhir Pada <?=$data[1]?></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?=hitung_pelamar();?></div>
							<div class="text-muted">New Users</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<!-- <div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em> -->
							<br>
							<div class="text-muted">Page Views</div>
							<div class="large">25.2k</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
		<!--/.col-->
		<?php
include 'footer.php';

?>