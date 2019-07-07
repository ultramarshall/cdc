<?php
include 'header.php';
?>
<!-- <script type="text/javascript"></script> -->

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Ganti Password</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ganti Password</h1>
				<!-- <a href="?mode=form&id="><button class="btn btn-primary">Tambah Data</button></a> -->
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<!-- <div class="row"> -->
			<table class="table table-striped table-bordered data">
				<form method="POST" action="modul/update.php?mode=update_pass">
				<tr>
					<td>Password Lama</td>
					<td>:</td>
					<td><input type="Password"  class="form-control" name="pass_lama"></td>
				</tr>
				<tr>
					<td >Password Baru</td>
					<td width="2%">:</td>
					<td><input  class="form-control" type="Password" name="pass_baru"></td>
				</tr>
				<tr>
					<td width="20%">Konfirmasi Password Baru</td>
					<td>:</td>
					<td><input type="Password" class="form-control" name="pass_baru1"></td>
				</tr>
				<tr>
					<td colspan="3"><button class="btn btn-info btn-medium" id="submit">Save</button></td>
				</tr>
				</form>
			</table>
			</div><!--/.row-->
<?php
include 'footer.php';
?>
