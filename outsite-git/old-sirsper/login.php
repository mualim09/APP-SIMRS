<!doctype html>
<?php 
include "include/connection.php";
mysql_connect($host, $user, $password);
mysql_select_db($dbname);
if (isset($_POST['submit'])) {

	$user =$_POST['username'];
	$pass =$_POST['password'];
	$log_type = "login";
	$date_log = date('Y-m-d H:i:m');
  // var_dump($user,$pass,$log_type,$date_log);exit;
	$q = mysql_query("SELECT * FROM tb_user WHERE username='$user' AND password='$pass'");

	if (mysql_num_rows($q) == 1) {
		session_start();
		$_SESSION['username']=$user;
		$query = mysql_query("insert into tb_log values(' ','$user','$log_type','$date_log',' ')");
		if ($query) {
			header("Location: ./index.php?ntf=100");
		} else {
			echo "<h4>". "log error"."</h4>";
		}           
	} else {
		echo '<script>alert("Gagal Login, Periksa kembali Username & Password anda!");window.history.go(-1);</script>';
	// header("Location: ./404.php");
    // header("Location: ./index.php");
	}
}
?>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login | PPI RSKG</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/owl.theme.css">
	<link rel="stylesheet" href="assets/css/owl.transitions.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/normalize.css">
	<link rel="stylesheet" href="assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="assets/css/wave/waves.min.css">
	<link rel="stylesheet" href="assets/css/notika-custom-icon.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
	<div class="login-content" style="background-image: url('assets/img/all-rs/ppi.jpg');background-repeat:no-repeat; background-size:contain;background-position:center;">
		<div class="nk-block toggled" id="l-login">
			<form action="" method="POST">
				<div class="nk-form">
					<div align="center">
						<!-- <img src="assets/img/all-rs/rskg.png" width="100px"> -->
						<p>
							<h3>Aplikasi Penanggulangan dan Pencegahan Infeksi (PPI)</h3>
						</p>
						<hr>
					</div>
					<div class="input-group">
						<span class="input-group-addon nk-ic-st-pro">
							<img src="assets/icon/green/png/menu-4.png" width="15px">
						</span>
						<div class="nk-int-st">
							<input type="text" class="form-control" name="username" placeholder="Username">
						</div>
					</div>
					<div class="input-group mg-t-15">
						<span class="input-group-addon nk-ic-st-pro">
							<img src="assets/icon/green/png/menu-4.png" width="15px">
						</span>
						<div class="nk-int-st">
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
					</div>
					<div class="fm-checkbox">
						<label>
							<input type="checkbox" class="i-checks"> Remember Me
						</label>
					</div>
					<br>
					<button class="btn btn-success btn-block notika-btn-teal waves-effect" name="submit">Login</button>
					<div align="center">
						<br>
						<br>
						<p>
							Powered by
						</p>
						<img src="assets/img/all-rs/rskgcare.png" width="150px">
						<hr>
						<p>
							<i>Version 1.0.0</i>
						</p>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>