<?php 
include "include/connection.php";

// KODE AUTO TICKET
function kdauto($tabel, $no_tick){
	$struktur   = mysql_query("SELECT * FROM $tabel");
	$field      = mysql_field_name($struktur,0);
	$panjang    = mysql_field_len($struktur,0);
	$qry  = mysql_query("SELECT max(".$field.") FROM ".$tabel);
	$row  = mysql_fetch_array($qry);
	if ($row[0]=="") {
		$angka=1000;
	}
	else {
		$angka= substr($row[0], strlen($no_tick));
	}
	$angka++;
	$angka      =strval($angka);
	$tmp  ="";
	for($i=1; $i<=($panjang-strlen($no_tick)-strlen($angka)); $i++) {
		$tmp=$tmp."0";
	}
	return $no_tick.$tmp.$angka;
}
// DATE
function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
		'Selasa',
		'Rabu',
		'Kamis',
		'Jumat',
		'Sabtu',
		'Minggu'
	);
	$bulan = array (1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$split    = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}

$auto_kode = "SELECT MAX(id_tick) FROM `tb_ticket`";

//////////////////////////UPDATE//////////////////////
// EDIT
if(isset($_POST["ticketonprogress"]))    
{

	$id_tick      	= $_POST['id_tick'];
	$progress      	= $_POST['progress'];
	$date_progress  = $_POST['date_progress'];
	$progress_by    = $_POST['progress_by'];

	$query = mysql_query("UPDATE tb_ticket SET 
		progress ='$progress',
		date_progress = '$date_progress',
		progress_by = '$progress_by'
		WHERE id_tick ='$id_tick'");

	$query .= mysql_query("UPDATE tb_ticket_his SET 
		his_progress ='$progress',
		his_date_progress = '$date_progress',
		his_progress_by = '$progress_by'
		WHERE his_id ='$id_tick'");
	
	if($query){
		header("Location: ./sw_admin_task_ticket.php?ntf=64");                                                  
	} else {
		echo "Updated Failed - Please contact your Administrator";
	}

	$message = '<!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>ITicket Problem!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">Ticket Update </h4><h4 align="center"><br>No. Ticket <b>'.$_POST["no_tick"].'</b><hr><br>'.$_POST["priority"].' Ticket!</h4> <p style="text-align: center;font-size: 16px;letter-spacing: .5px;">Hai, <span style="font-weight:600">'.$_POST["req_by"].'</span><br><p align="center">Kami baru saja mengupdate status tiket anda menjadi</p><p style="text-align: center;margin-top: 20px;"><a href="http://203.210.84.231:164/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #f3b600;color: black !important;padding: 10px 15px;text-decoration: none;">'.$_POST["progress"].'</a></p><p style="text-align: center;font-size: 14px;">Dengan detail masalah:<br><b>'.$_POST["detail"].'</b><br><p align="left">Terimakasih,<br><b><u>'.$_POST["assign_to"].'</u></b><br><i>Petugas ITicket</i></p><hr><p style="text-align: center;margin-top: 20px;"><a href="http://203.210.84.231:164/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">Cek Aktivitas</a></p></div></body></html>';

	require 'class/class.phpmailer.php';
	$mail = new PHPMailer;
  	$mail->IsSMTP();                //Sets Mailer to send message using SMTP
  	$mail->Host = 'smtp.gmail.com';
  	$mail->Port = 587;
  	$mail->SMTPSecure = 'tls';
  	$mail->SMTPAuth = true;
  	$mail->Username = "adm.rskghabibie@gmail.com";
  	$mail->Password = "@10Rskghabibie";       //Sets connection prefix. Options are "", "ssl" or "tls"
  	$mail->From = $_POST['admin_assign'];         //Sets the From email address for the message
  	$mail->FromName = ('ITicket RS. Khusus Ginjal Ny. R.A. Habibie');     //Sets the From name of the message
  	$mail->AddAddress($_POST['email_user']);   //Adds a "To" address
  	$mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
  	$mail->IsHTML(true);              //Sets message type to HTML
  	$mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
	$mail->Subject = ('ITicket Update (On Progress)');       //Sets the Subject of the message
	$mail->Body = $message;             //An HTML or plain text message body
	if($mail->Send())               //Send an Email. Return true on success or false on error
	{
		$message = '<div class="alert alert-success">Application Successfully Submitted</div>';
		unlink($path);
	}
	else
	{
		$message = '<div class="alert alert-danger">There is an Error</div>';
	}
} 

if(isset($_POST["ticketdone"]))    
{

	$id_tick      	= $_POST['id_tick'];
	$progress      	= $_POST['progress'];
	$date_done      = $_POST['date_done'];
	$progress_by    = $_POST['progress_by'];
	$remark_it    	= $_POST['remark_it'];

	$path = $_FILES['remark_file']['name'];
	$file_tmp = $_FILES['remark_file']['tmp_name'];

	move_uploaded_file($file_tmp, './assets/lampiran/'.$path);
	$query = mysql_query("UPDATE tb_ticket SET 
		progress ='$progress',
		date_done = '$date_done',
		progress_by = '$progress_by',
		remark_it = '$remark_it',
		remark_file = '$path'
		WHERE id_tick ='$id_tick'");

	$query .= mysql_query("UPDATE tb_ticket_his SET 
		his_progress ='$progress',
		his_date_done = '$date_done',
		his_progress_by = '$progress_by',
		his_remark_it = '$remark_it',
		his_remark_file = '$path'
		WHERE his_id ='$id_tick'");
	if($query){
		header("Location: ./sw_admin_task_ticket.php?ntf=62");                                                  
	} else {
		echo "Updated Failed - Please contact your Administrator";
	}

	$message = '<!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>ITicket Done!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">Ticket Done/Selesai </h4><h4 align="center"><br>No. Ticket <b>'.$_POST["no_tick"].'</b><hr><br>'.$_POST["priority"].' Ticket!</h4> <p style="text-align: center;font-size: 16px;letter-spacing: .5px;">Hai, <span style="font-weight:600">'.$_POST["req_by"].'</span><br><p align="center">Kami baru saja mengupdate status tiket anda menjadi</p><p style="text-align: center;margin-top: 20px;"><a href="http://203.210.84.231:164/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">'.$_POST["progress"].'</a></p><p style="text-align: center;font-size: 14px;">Dengan detail masalah:<br><b>'.$_POST["detail"].'</b><br><hr><p align="center">Berikut lampiran dari petugas dari ITicket:<br></p><p align="center">'.$_POST["remark_it"].'</p><p align="left">Terimakasih,<br><b><u>'.$_POST["assign_to"].'</u></b><br><i>Petugas ITicket</i></p><hr><p style="text-align: center;margin-top: 20px;"><a href="http://203.210.84.231:164/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">Cek Aktivitas</a></p></div></body></html>';

	require 'class/class.phpmailer.php';
	$mail = new PHPMailer;
  	$mail->IsSMTP();                //Sets Mailer to send message using SMTP
  	$mail->Host = 'smtp.gmail.com';
  	$mail->Port = 587;
  	$mail->SMTPSecure = 'tls';
  	$mail->SMTPAuth = true;
  	$mail->Username = "adm.rskghabibie@gmail.com";
  	$mail->Password = "@10Rskghabibie";       //Sets connection prefix. Options are "", "ssl" or "tls"
  	$mail->From = $_POST['admin_assign'];         //Sets the From email address for the message
  	$mail->FromName = ('ITicket RS. Khusus Ginjal Ny. R.A. Habibie');     //Sets the From name of the message
  	$mail->AddAddress($_POST['email_user']);   //Adds a "To" address
  	$mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
  	$mail->IsHTML(true);              //Sets message type to HTML
  	$mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
	$mail->Subject = ('ITicket Update (Done/Selesai)');       //Sets the Subject of the message
	$mail->Body = $message;             //An HTML or plain text message body
	if($mail->Send())               //Send an Email. Return true on success or false on error
	{
		$message = '<div class="alert alert-success">Application Successfully Submitted</div>';
		unlink($path);
	}
	else
	{
		$message = '<div class="alert alert-danger">There is an Error</div>';
	}
} 

//////////////////////////FORWADED//////////////////////
// FORWADED HARDWARE
if(isset($_POST["ticketfwhw"]))    
{

	$id_tick      	= $_POST['id_tick'];
	$admin_assign   = $_POST['admin_assign'];
	$assign_to      = $_POST['assign_to'];
	$trouble        = $_POST['trouble'];

	$query = mysql_query("UPDATE tb_ticket SET 
		admin_assign ='$admin_assign',
		assign_to = '$assign_to',
		trouble = '$trouble'
		WHERE id_tick ='$id_tick'");

	$query .= mysql_query("UPDATE tb_ticket_his SET 
		his_admin_assign ='$admin_assign',
		his_assign_to = '$assign_to',
		his_trouble = '$trouble'
		WHERE his_id ='$id_tick'");
	
	if($query){
		header("Location: ./sw_admin_task_ticket.php?ntf=1001");                                                  
	} else {
		echo "Updated Failed - Please contact your Administrator";
	}

	$message = '<!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>ITicket Problem!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">Ticket Forwarded from '.$_POST["dari"].'</h4><h4 align="center"><br>No. Ticket <b>'.$_POST["no_tick"].'</b><hr><br>'.$_POST["priority"].' Ticket!</h4> <p style="text-align: center;font-size: 16px;letter-spacing: .5px;">Hai, <span style="font-weight:600">Ari Rifan</span><br><p align="center">Ticket ini dari <b>'.$_POST["req_by"].'</b> saya serahkan kepada anda, Mohon bantuannya.</p><p style="text-align: center;margin-top: 20px;"><a href="http://203.210.84.231:164/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: red;color: white !important;padding: 10px 15px;text-decoration: none;">New</a></p><p style="text-align: center;font-size: 14px;">Dengan detail masalah:<br><b>'.$_POST["detail"].'</b><br><p align="left">Terimakasih,<br><b><u>'.$_POST["dari"].'</u></b><br><i>Petugas ITicket</i></p><hr><p style="text-align: center;margin-top: 20px;"><a href="http://203.210.84.231:164/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">Cek Aktivitas</a></p></div></body></html>';

	require 'class/class.phpmailer.php';
	$mail = new PHPMailer;
  	$mail->IsSMTP();                //Sets Mailer to send message using SMTP
  	$mail->Host = 'smtp.gmail.com';
  	$mail->Port = 587;
  	$mail->SMTPSecure = 'tls';
  	$mail->SMTPAuth = true;
  	$mail->Username = "adm.rskghabibie@gmail.com";
  	$mail->Password = "@10Rskghabibie";       //Sets connection prefix. Options are "", "ssl" or "tls"
  	$mail->From = $_POST['dari'];         //Sets the From email address for the message
  	$mail->FromName = ('ITicket RS. Khusus Ginjal Ny. R.A. Habibie');     //Sets the From name of the message
  	$mail->AddAddress($_POST['admin_assign']);   //Adds a "To" address
  	$mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
  	$mail->IsHTML(true);              //Sets message type to HTML
  	$mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
	$mail->Subject = ('ITicket Forwarded');       //Sets the Subject of the message
	$mail->Body = $message;             //An HTML or plain text message body
	if($mail->Send())               //Send an Email. Return true on success or false on error
	{
		$message = '<div class="alert alert-success">Application Successfully Submitted</div>';
		unlink($path);
	}
	else
	{
		$message = '<div class="alert alert-danger">There is an Error</div>';
	}
} 

// FORWADED PRINTER
if(isset($_POST["ticketfwpr"]))    
{

	$id_tick      	= $_POST['id_tick'];
	$admin_assign   = $_POST['admin_assign'];
	$assign_to      = $_POST['assign_to'];
	$trouble        = $_POST['trouble'];

	$query = mysql_query("UPDATE tb_ticket SET 
		admin_assign ='$admin_assign',
		assign_to = '$assign_to',
		trouble = '$trouble'
		WHERE id_tick ='$id_tick'");

	$query .= mysql_query("UPDATE tb_ticket_his SET 
		his_admin_assign ='$admin_assign',
		his_assign_to = '$assign_to',
		his_trouble = '$trouble'
		WHERE his_id ='$id_tick'");	

	if($query){
		header("Location: ./sw_admin_task_ticket.php?ntf=1001");                                                  
	} else {
		echo "Updated Failed - Please contact your Administrator";
	}

	$message = '<!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>ITicket Problem!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">Ticket Forwarded from '.$_POST["dari"].'</h4><h4 align="center"><br>No. Ticket <b>'.$_POST["no_tick"].'</b><hr><br>'.$_POST["priority"].' Ticket!</h4> <p style="text-align: center;font-size: 16px;letter-spacing: .5px;">Hai, <span style="font-weight:600">Yura Permana</span><br><p align="center">Ticket ini dari <b>'.$_POST["req_by"].'</b> saya serahkan kepada anda, Mohon bantuannya.</p><p style="text-align: center;margin-top: 20px;"><a href="http://203.210.84.231:164/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: red;color: white !important;padding: 10px 15px;text-decoration: none;">New</a></p><p style="text-align: center;font-size: 14px;">Dengan detail masalah:<br><b>'.$_POST["detail"].'</b><br><p align="left">Terimakasih,<br><b><u>'.$_POST["dari"].'</u></b><br><i>Petugas ITicket</i></p><hr><p style="text-align: center;margin-top: 20px;"><a href="http://203.210.84.231:164/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">Cek Aktivitas</a></p></div></body></html>';

	require 'class/class.phpmailer.php';
	$mail = new PHPMailer;
  	$mail->IsSMTP();                //Sets Mailer to send message using SMTP
  	$mail->Host = 'smtp.gmail.com';
  	$mail->Port = 587;
  	$mail->SMTPSecure = 'tls';
  	$mail->SMTPAuth = true;
  	$mail->Username = "adm.rskghabibie@gmail.com";
  	$mail->Password = "@10Rskghabibie";       //Sets connection prefix. Options are "", "ssl" or "tls"
  	$mail->From = $_POST['dari'];         //Sets the From email address for the message
  	$mail->FromName = ('ITicket RS. Khusus Ginjal Ny. R.A. Habibie');     //Sets the From name of the message
  	$mail->AddAddress($_POST['admin_assign']);   //Adds a "To" address
  	$mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
  	$mail->IsHTML(true);              //Sets message type to HTML
  	$mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
	$mail->Subject = ('ITicket Forwarded');       //Sets the Subject of the message
	$mail->Body = $message;             //An HTML or plain text message body
	if($mail->Send())               //Send an Email. Return true on success or false on error
	{
		$message = '<div class="alert alert-success">Application Successfully Submitted</div>';
		unlink($path);
	}
	else
	{
		$message = '<div class="alert alert-danger">There is an Error</div>';
	}
} 

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/libs/css/style.css">
	<link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
	<title>ITicket - Ticket Status: Done</title>
	<link rel="icon" type="assets/image/png" href="assets/images/logo/logo.png"/>
</head>
<style type="text/css">
	.lingkaran1{
		width: 40px;
		height: 40px;
		background: #ffffff;
		border-radius: 100%;
	}

	.lingkaran{
		width: 200px;
		height: 200px;
		background: #ffffff;
		border-radius: 100%;
	}

	.responsive img {
		max-width:100%;
		/*width:100%;*/
		height: auto;
	}
</style>
<body>
	<div class="dashboard-main-wrapper">
		<div class="dashboard-header">
			<?php include "include/header.php" ?>
		</div>
		<?php include "include/sidebar.php" ?>
		<div class="dashboard-wrapper">
			<div class="container-fluid  dashboard-content">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="page-header">
							<h2 class="pageheader-title">Ticket Done Page</h2>
							<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
							<div class="page-breadcrumb">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Task Ticket</li>
										<li class="breadcrumb-item active" aria-current="page">Ticket Done Page</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<!-- ALERT -->
				<?php include 'include/alert/success.php' ?>
				<!-- END ALERT -->
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-header">
								<span class="responsive"><img src="assets/images/logo/logo.png" width="100px"></span>
								<span class="btn btn-info">Done</span>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<th>#</th>
												<th>No. Ticket</th>
												<th>Req by</th>
												<th>Unit</th>
												<th>Request date</th>
												<th>Due date</th>
												<th>Status priority</th>
												<th>Progress</th>
												<th>Date respon</th>
												<th>Detail laporan ticket</th>
												<th>Action</th>
												<th>Take over</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$con=mysqli_connect("localhost","root","","rskg_ticket");
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to MySQL: " . mysqli_connect_error();
											}
											$datax = $_SESSION['username'];
											$result = mysqli_query($con,"SELECT * FROM tb_ticket WHERE trouble='Software' AND progress='Done' ORDER BY id_tick DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<tr>";
													echo "<td>".$row['id_tick'] . "</td>";
													echo "<td>".$row['no_tick'] . "</td>";
													echo "<td>".$row['req_by'] . "</td>";
													echo "<td>".$row['unit'] . "</td>";
													echo "<td><button class='btn btn-dark'><i class='fa fas fa-clock'></i> ".$row['req_date'] . "</button></td>";
													echo "<td><button class='btn btn-light'><i class='fa fas fa-clock'></i> ".$row['due_date'] . "</button></td>";
													echo "<td>".$row['priority'] . "</td>";
													if ($row['progress']=='New'){
														echo "<td><span class='badge badge-danger'>New</span></td>";
													}elseif ($row['progress']=='On Progress') {
														echo "<td><span class='badge badge-warning'>On Progress</span></td>";
													}elseif ($row['progress']=='Done') {
														echo "<td><span class='badge badge-info'>Done</span></td>";
													}
													if ($row['date_progress']==NULL){
														echo "<td align='center'><button class='btn btn-light' title='Belum ada respon petugas'><i class='fa fas fa-hourglass'></i></button></td>";
													}else{
														echo "<td><button class='btn btn-dark'><i class='fa fas fa-clock'></i> ".$row['date_progress'] . "</button></td>";
													}
													echo "<td align='center'>
													<a href='#' data-toggle='modal' data-target='#detail$row[id_tick]' title='Lihat Detail Laporan Ticket'><button class='btn btn-light'><i class='fa fas fa-eye'></i></button></a>
													</td>";
													if ($row['progress']=='New') {
														echo "<td align='center'>
														<a href='#' data-toggle='modal' data-target='#takeprogress$row[id_tick]' title='Take Ticket'><button class='btn btn-light'><i class='fa fas fa-flag'></i></button></a>
														</td>";
													}elseif ($row['progress']=='On Progress') {
														echo "<td>
														<a href='#' data-toggle='modal' data-target='#onprogress$row[id_tick]' title='Selesaikan Ticket Anda!'><button class='btn btn-warning'><i class='fa fas fa-fire'></i></button></a>
														</td>";
													}elseif ($row['progress']=='Done') {
														echo "<td align='center'>
														<a href='#' data-toggle='modal' data-target='#lihatremark$row[id_tick]' title='Lihat Remark IT'><button class='btn btn-light'><i class='fa fas fa-eye'></i></button></a>
														</td>";
													}
													if ($row['progress']=='New') {
														echo "<td width='100px'>
														<a href='#' data-toggle='modal' data-target='#takeoverhw$row[id_tick]' title='Take Masalah Hardware'><span class='badge badge-dark'><i class='fa fas fa-laptop'></i></span></a>
														<a href='#' data-toggle='modal' data-target='#takeoverpr$row[id_tick]'  title='Take Masalah Printer'><span class='badge badge-dark'><i class='fa fas fa-print'></i></span></a>
														</td>";
													}elseif ($row['progress']=='On Progress') {
														echo "<td>Tidak dapat diganti</td>";
													}elseif ($row['progress']=='Done') {
														echo "<td>Tidak dapat diganti</td>";
													}
													echo "</tr>";
													?>
													<!-- Take Ticket -->
													<div class="modal fade" id="takeprogress<?php echo $row['id_tick'];?>" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Take Ticket</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<form method="post" action="">
																		<div class="form-group">
																			<label>Jika anda klik <b>"YES"</b> maka status akan menjadi <b>"On Progress"</b></label>
																			<h6>No. Ticket : <b><u><?php echo $row['no_tick'];?></u></b></h6>
																			<h6>Subject : <b><u><?php echo $row['subject'];?></u></b></h6>
																			<h6><u>Detail Masalah</u><br><p align="justify"><?php echo $row['detail'];?></p></h6>
																			<input type="hidden" name="id_tick" class="form-control" value="<?php echo $row['id_tick'];?>" required>
																			<input type="hidden" name="admin_assign" class="form-control" value="<?php echo $row['admin_assign'];?>" required>
																			<input type="hidden" name="no_tick" class="form-control" value="<?php echo $row['no_tick'];?>" required>
																			<input type="hidden" name="progress" class="form-control" value="On Progress" required>
																			<input type="hidden" name="progress_by" class="form-control" value="<?php echo $row['assign_to'];?>" required>
																			<input type="hidden" name="req_by" class="form-control" value="<?php echo $row['req_by'];?>" required>
																			<input type="hidden" name="date_progress" class="form-control" value="<?php echo date('Y-m-d H:i:sa'); ?>" required>
																			<input type="hidden" name="unit" class="form-control" value="<?php echo $row['unit'];?>" required>
																			<input type="hidden" name="assign_to" class="form-control" value="<?php echo $row['assign_to'];?>" required>
																			<input type="hidden" name="email_user" class="form-control" value="<?php echo $row['email_user'];?>" required>
																			<input type="hidden" name="detail" class="form-control" value="<?php echo $row['detail'];?>" required>
																		</div>
																		<button type="submit" name="ticketonprogress" class="btn btn-danger btn-block btn-flat">Yes</button>
																		<button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
																	</form>
																</div>
															</div>
														</div>
													</div>
													<!-- END Take Ticket -->

													<!-- Take Done -->
													<div class="modal fade" id="onprogress<?php echo $row['id_tick'];?>" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Take On Progress</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<form method="post" enctype="multipart/form-data">
																		<div class="form-group">
																			<label>Jika anda klik <b>"YES"</b> maka status akan menjadi <b>"Done/Ticket Selesai"</b></label>
																			<h6>No. Ticket : <b><u><?php echo $row['no_tick'];?></u></b></h6>
																			<h6>Subject : <b><u><?php echo $row['subject'];?></u></b></h6>
																			<h6><u>Detail Masalah</u><br><p align="justify"><?php echo $row['detail'];?></p></h6>
																			<input type="hidden" name="id_tick" class="form-control" value="<?php echo $row['id_tick'];?>" required>
																			<input type="hidden" name="admin_assign" class="form-control" value="<?php echo $row['admin_assign'];?>" required>
																			<input type="hidden" name="no_tick" class="form-control" value="<?php echo $row['no_tick'];?>" required>
																			<input type="hidden" name="progress" class="form-control" value="Done" required>
																			<input type="hidden" name="progress_by" class="form-control" value="<?php echo $row['assign_to'];?>" required>
																			<input type="hidden" name="req_by" class="form-control" value="<?php echo $row['req_by'];?>" required>
																			<input type="hidden" name="date_done" class="form-control" value="<?php echo date('Y-m-d H:i:sa'); ?>" required>
																			<input type="hidden" name="unit" class="form-control" value="<?php echo $row['unit'];?>" required>
																			<input type="hidden" name="assign_to" class="form-control" value="<?php echo $row['assign_to'];?>" required>
																			<input type="hidden" name="email_user" class="form-control" value="<?php echo $row['email_user'];?>" required>
																			<input type="hidden" name="detail" class="form-control" value="<?php echo $row['detail'];?>" required>
																		</div>
																		<hr>
																		<div class="form-group">
																			<div class="col-sm-12">
																				<div class="form-group">
																					<label>Remark<font style="color: red">*</font></label>
																					<textarea class="form-control" rows="3" name="remark_it" placeholder="Remark ..." required="required"></textarea>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label>Lampiran Remark Petugas</label>
																			<br>
																			<input type="file" name="remark_file">
																			<br>
																			<small><b>File Maximal 2MB</b></small>
																		</div>
																		<button type="submit" name="ticketdone" class="btn btn-danger btn-block btn-flat">Yes</button>
																		<button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
																	</form>
																</div>
															</div>
														</div>
													</div>
													<!-- END Take Done -->

													<!-- Lihat Remark IT -->
													<div class="modal fade" id="lihatremark<?php echo $row['id_tick'];?>" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Lihat Remark Petugas IT</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<form method="post" enctype="multipart/form-data">
																		<div class="form-group">
																			<h6>No. Ticket : <b><u><?php echo $row['no_tick'];?></u></b></h6>
																			<h6>Subject : <b><u><?php echo $row['subject'];?></u></b></h6>
																			<h6><u>Detail Masalah</u><br><p align="justify"><?php echo $row['detail'];?></p></h6>
																		</div>
																		<hr>
																		<div class="form-group" align="center">
																			<div class="col-sm-12">
																				<div class="form-group">
																					<label>Remark IT</label>
																					<textarea class="form-control" rows="3" name="remark_it" placeholder="Remark ..." readonly="readonly"><?php echo $row['remark_it'];?></textarea>
																				</div>
																			</div>
																		</div>
																		<div class="form-group" align="center">
																			<label>Lihat Lampiran Remark Petugas</label>
																			<br>
																			<?php
																			echo "<a href='./assets/lampiran/$row[remark_file]' target='_blank'><img src='assets/images/icon/unnamed.png' width='100px'></a>";
																			?>
																		</div>
																		<button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Close</button>
																	</form>
																</div>
															</div>
														</div>
													</div>
													<!-- END Lihat Remark IT -->

													<!-- DETAIL LAPORAN TICKET -->
													<div class="modal fade" id="detail<?php echo $row['id_tick'];?>" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Detail Laporan ITicket</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<form method="post" action="">
																		<div class="form-group">
																			<h6>No. Ticket : <b><u><?php echo $row['no_tick'];?></u></b></h6>
																			<h6>Subject : <b><u><?php echo $row['subject'];?></u></b></h6>
																			<h6><u>Detail Masalah</u><br><p align="justify"><?php echo $row['detail'];?></p></h6>
																		</div>
																		<div class="form-group" align="center">
																			<h6>URL</h6>
																			<?php  
																			if ($row['url']==NULL) {
																				echo "<button class='btn btn-light' title='Tidak ada URL'><i class='fa fas fa-question'></i></button>";
																			}else{
																				echo "<a href='".$row['url'] . "' target=_blank><button class='btn btn-light' title='Buka link'><i class='fa fas fa-link'></i></button></a>";
																			}
																			?>
																		</div>
																		<div class="form-group" align="center">
																			<h6>URL</h6>
																			<?php  
																			if ($row['proof']==NULL){
																				echo "<button class='btn btn-light' title='Tidak ada URL'><i class='fa fas fa-question'></i></button>";
																			}else{
																				echo "<a href='./assets/lampiran/$row[proof]' target='_blank'><img src='assets/images/icon/unnamed.png' width='100px'></a>";
																			}
																			?>
																		</div>
																		<button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Close</button>
																	</form>
																</div>
															</div>
														</div>
													</div>
													<!-- END DETAIL LAPORAN TICKET -->

													<!-- Take Hardware -->
													<div class="modal fade" id="takeoverhw<?php echo $row['id_tick'];?>" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Take Ticket Hardware</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<form method="post" action="">
																		<div class="form-group">
																			<label>Jika anda klik <b>"YES"</b> maka akan di Update ke Petugas <b>"HARDWARE"</b></label>
																			<h6>No. Ticket : <b><u><?php echo $row['no_tick'];?></u></b></h6>
																			<h6>Subject : <b><u><?php echo $row['subject'];?></u></b></h6>
																			<h6><u>Detail Masalah</u><br><p align="justify"><?php echo $row['detail'];?></p></h6>
																			<input type="hidden" name="id_tick" class="form-control" value="<?php echo $row['id_tick'];?>" required>
																			<!-- <input type="hidden" name="admin_assign" class="form-control" value="6436a.40261@gmail.com" required> -->
																			<!-- Yang Diupdate -->
																			<input type="hidden" name="admin_assign" class="form-control" value="amranmhd10@gmail.com" required>
																			<input type="hidden" name="assign_to" class="form-control" value="Ari Rifan" required>
																			<input type="hidden" name="trouble" class="form-control" value="Hardware" required>
																			<!-- END Yang Diupdate -->
																			<input type="hidden" name="dari" class="form-control" value="<?php echo $row['assign_to'];?>" required>
																			<input type="hidden" name="no_tick" class="form-control" value="<?php echo $row['no_tick'];?>" required>
																			<input type="hidden" name="req_by" class="form-control" value="<?php echo $row['req_by'];?>" required>
																			<input type="hidden" name="prgress" class="form-control" value="New" required>
																			<input type="hidden" name="detail" class="form-control" value="<?php echo $row['detail'];?>" required>
																		</div>
																		<button type="submit" name="ticketfwhw" class="btn btn-danger btn-block btn-flat">Yes</button>
																		<button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
																	</form>
																</div>
															</div>
														</div>
													</div>
													<!-- END Take Hardware -->

													<!-- Take Printer -->
													<div class="modal fade" id="takeoverpr<?php echo $row['id_tick'];?>" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Take Ticket Printer</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<form method="post" action="">
																		<div class="form-group">
																			<label>Jika anda klik <b>"YES"</b> maka akan di Update ke Petugas <b>"PRINTER"</b></label>
																			<h6>No. Ticket : <b><u><?php echo $row['no_tick'];?></u></b></h6>
																			<h6>Subject : <b><u><?php echo $row['subject'];?></u></b></h6>
																			<h6><u>Detail Masalah</u><br><p align="justify"><?php echo $row['detail'];?></p></h6>
																			<input type="hidden" name="id_tick" class="form-control" value="<?php echo $row['id_tick'];?>" required>
																			<!-- <input type="hidden" name="admin_assign" class="form-control" value="6436a.40261@gmail.com" required> -->
																			<!-- Yang Diupdate -->
																			<input type="hidden" name="admin_assign" class="form-control" value="amran@hellos-id.com" required>
																			<input type="hidden" name="assign_to" class="form-control" value="Yura Permana" required>
																			<input type="hidden" name="trouble" class="form-control" value="Printer" required>
																			<!-- END Yang Diupdate -->
																			<input type="hidden" name="dari" class="form-control" value="<?php echo $row['assign_to'];?>" required>
																			<input type="hidden" name="no_tick" class="form-control" value="<?php echo $row['no_tick'];?>" required>
																			<input type="hidden" name="req_by" class="form-control" value="<?php echo $row['req_by'];?>" required>
																			<input type="hidden" name="prgress" class="form-control" value="New" required>
																			<input type="hidden" name="detail" class="form-control" value="<?php echo $row['detail'];?>" required>
																		</div>
																		<button type="submit" name="ticketfwpr" class="btn btn-danger btn-block btn-flat">Yes</button>
																		<button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
																	</form>
																</div>
															</div>
														</div>
													</div>
													<!-- END Take Printer -->
												<?php } } mysqli_close($con); ?>
											</tbody>
											<tfoot>
												<tr>
													<th>#</th>
													<th>No. Ticket</th>
													<th>Req by</th>
													<th>Unit</th>
													<th>Request date</th>
													<th>Due date</th>
													<th>Status priority</th>
													<th>Progress</th>
													<th>Date respon</th>
													<th>Detail laporan ticket</th>
													<th>Action</th>
													<th>Take over</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include "include/footer.php" ?>
	<?php include 'include/thirdparty.php'; ?>
</body>
</html>