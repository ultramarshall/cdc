<?php
session_start();
	if(isset($_SESSION['username'])){
		echo "<script>document.location.href='dashboard.php'</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CDC Admin</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<style type="text/css">
	body{
		
background: rgba(247,207,158,1);
background: -moz-linear-gradient(left, rgba(247,207,158,1) 0%, rgba(247,207,158,1) 14%, rgba(255,146,10,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(247,207,158,1)), color-stop(14%, rgba(247,207,158,1)), color-stop(100%, rgba(255,146,10,1)));
background: -webkit-linear-gradient(left, rgba(247,207,158,1) 0%, rgba(247,207,158,1) 14%, rgba(255,146,10,1) 100%);
background: -o-linear-gradient(left, rgba(247,207,158,1) 0%, rgba(247,207,158,1) 14%, rgba(255,146,10,1) 100%);
background: -ms-linear-gradient(left, rgba(247,207,158,1) 0%, rgba(247,207,158,1) 14%, rgba(255,146,10,1) 100%);
background: linear-gradient(to right, rgba(247,207,158,1) 0%, rgba(247,207,158,1) 14%, rgba(255,146,10,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7cf9e', endColorstr='#ff920a', GradientType=1 );

</style>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default" style="border-radius: 30px">
				<div class="panel-heading" >Dashboard</div>
				<div class="panel-body">
					<form role="form" action="modul/prosesLogin.php" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button type="submit" class="btn btn-primary">Login</button></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
