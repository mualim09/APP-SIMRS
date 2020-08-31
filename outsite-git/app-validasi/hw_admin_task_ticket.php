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

//////////////////////////ADD//////////////////////

// ADD TICKET USER SOFTWARE
if(isset($_POST["submitsoftware"]))
{

	$id_tick      = $_POST['id_tick'];
	$no_tick      = $_POST['no_tick'];
	$req_date     = $_POST['req_date'];
	$due_date     = $_POST['due_date'];
	$subject      = $_POST['subject'];
	$detail       = $_POST['detail'];
	$url          = $_POST['url'];
	$priority     = $_POST['priority'];
	$trouble      = $_POST['trouble'];
	$req_by       = $_POST['req_by'];
	$assign_to    = $_POST['assign_to'];
	$admin_assign = $_POST['admin_assign'];
	$progress     = $_POST['progress'];
	$summary      = $_POST['summary'];
	$email_user   = $_POST['email_user'];
	$unit         = $_POST['unit'];

	$path = $_FILES['proof']['name'];
	$file_tmp = $_FILES['proof']['tmp_name'];

	move_uploaded_file($file_tmp, './assets/lampiran/'.$path);
	$query = mysql_query("INSERT INTO tb_ticket 
		(id_tick,no_tick,req_date,due_date,subject,detail,url,priority,trouble,req_by,assign_to,admin_assign,progress,summary,email_user,unit,proof) 
		VALUES 
		('','$no_tick','$req_date','$due_date','$subject','$detail','$url','$priority','$trouble','$req_by','$assign_to','$admin_assign','$progress','$summary','$email_user','$unit','$path')
		");

	if($query){
		header("Location: ./user_create_ticket.php?ntf=1");                                                  
	} else {
		echo "Updated Failed - Please contact your Administrator";
	}

	$path = 'upload/' . $_FILES["proof"]["name"];
	move_uploaded_file($_FILES["proof"]["tmp_name"], $path);
	$message = '  <!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>ITicket Problem!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">New Ticket Software Problem </h4><h4 align="center"><br>No. Ticket <b>'.$no_tick.'</b><hr><br>'.$priority.' Ticket!</h4> <p style="text-align: center;font-size: 16px;letter-spacing: .5px;">Hai, <span style="font-weight:600">'.$assign_to.'</span><br><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: red;color: #fff !important;padding: 10px 15px;text-decoration: none;">'.$progress.'</a></p><p style="text-align: center;font-size: 14px;">Saya mengalami masalah pada sistem dengan dengan detail masalah:<br><b>'.$detail.'</b><br> dengan lampiran yang tertera pada Aplikasi ITicket.</p><br><p align="left">Terimakasih,<br><b><u>'.$req_by.'</u></b><br><i>'.$unit.'</i></p><hr><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">Cek Aktivitas</a></p></div></body></html>';

	require 'class/class.phpmailer.php';
	$mail = new PHPMailer;
  $mail->IsSMTP();                //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "adm.rskghabibie@gmail.com";
  $mail->Password = "@10Rskghabibie";       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = $_POST['email_user'];         //Sets the From email address for the message
  $mail->FromName = ('ITicket RS. Khusus Ginjal Ny. R.A. Habibie');     //Sets the From name of the message
  $mail->AddAddress($_POST['admin_assign']);   //Adds a "To" address
  $mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);              //Sets message type to HTML
  $mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
  $mail->Subject = $_POST['subject'];       //Sets the Subject of the message
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

// ADD TICKET USER HARDWARE
if(isset($_POST["submithardware"]))
{

	$id_tick      = $_POST['id_tick'];
	$no_tick      = $_POST['no_tick'];
	$req_date     = $_POST['req_date'];
	$due_date     = $_POST['due_date'];
	$subject      = $_POST['subject'];
	$detail       = $_POST['detail'];
	$priority     = $_POST['priority'];
	$trouble      = $_POST['trouble'];
	$req_by       = $_POST['req_by'];
	$assign_to    = $_POST['assign_to'];
	$admin_assign = $_POST['admin_assign'];
	$progress     = $_POST['progress'];
	$summary      = $_POST['summary'];
	$email_user   = $_POST['email_user'];
	$unit         = $_POST['unit'];


	$path = $_FILES['proof']['name'];
	$file_tmp = $_FILES['proof']['tmp_name'];

	move_uploaded_file($file_tmp, './assets/lampiran/'.$path);
	$query = mysql_query("INSERT INTO tb_ticket 
		(id_tick,no_tick,req_date,due_date,subject,detail,priority,trouble,req_by,assign_to,admin_assign,progress,summary,email_user,unit,proof) 
		VALUES 
		('','$no_tick','$req_date','$due_date','$subject','$detail','$priority','$trouble','$req_by','$assign_to','$admin_assign','$progress','$summary','$email_user','$unit','$path')
		");

	if($query){
		header("Location: ./user_create_ticket.php?ntf=1");                                                  
	} else {
		echo "Updated Failed - Please contact your Administrator";
	}

	$path = 'upload/' . $_FILES["proof"]["name"];
	move_uploaded_file($_FILES["proof"]["tmp_name"], $path);
	$message = '  <!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>ITicket Problem!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">New Ticket Hardware Problem </h4><h4 align="center"><br>No. Ticket <b>'.$no_tick.'</b><hr><br>'.$priority.' Ticket!</h4> <p style="text-align: center;font-size: 16px;letter-spacing: .5px;">Hai, <span style="font-weight:600">'.$assign_to.'</span><br><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: red;color: #fff !important;padding: 10px 15px;text-decoration: none;">'.$progress.'</a></p><p style="text-align: center;font-size: 14px;">Saya mengalami masalah pada hardware/network dengan dengan detail masalah:<br><b>'.$detail.'</b><br> dengan lampiran yang tertera pada Aplikasi ITicket.</p><br><p align="left">Terimakasih,<br><b><u>'.$req_by.'</u></b><br><i>'.$unit.'</i></p><hr><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">Cek Aktivitas</a></p></div></body></html>';

	require 'class/class.phpmailer.php';
	$mail = new PHPMailer;
	$mail->IsSMTP();   //Sets Mailer to send message using SMTP
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "adm.rskghabibie@gmail.com";
	$mail->Password = "@10Rskghabibie";   //Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = $_POST['email_user'];   //Sets the From email address for the message
	$mail->FromName = ('ITicket RS. Khusus Ginjal Ny. R.A. Habibie');  //Sets the From name of the message
	$mail->AddAddress($_POST['admin_assign']);   //Adds a "To" address
	$mail->WordWrap = 50;   //Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);   //Sets message type to HTML
	$mail->AddAttachment($path);   //Adds an attachment from a path on the filesystem
	$mail->Subject = $_POST['subject'];     //Sets the Subject of the message
	$mail->Body = $message;    //An HTML or plain text message body
	  if($mail->Send())    //Send an Email. Return true on success or false on error
	  {
	  	$message = '<div class="alert alert-success">Application Successfully Submitted</div>';
	  	unlink($path);
	  }
	  else
	  {
	  	$message = '<div class="alert alert-danger">There is an Error</div>';
	  }
}

// ADD TICKET USER PRINTER
if(isset($_POST["submitprinter"]))
{

	$id_tick      = $_POST['id_tick'];
	$no_tick      = $_POST['no_tick'];
	$req_date     = $_POST['req_date'];
	$due_date     = $_POST['due_date'];
	$subject      = $_POST['subject'];
	$detail       = $_POST['detail'];
	$priority     = $_POST['priority'];
	$trouble      = $_POST['trouble'];
	$req_by       = $_POST['req_by'];
	$assign_to    = $_POST['assign_to'];
	$admin_assign = $_POST['admin_assign'];
	$progress     = $_POST['progress'];
	$summary      = $_POST['summary'];
	$email_user   = $_POST['email_user'];
	$unit         = $_POST['unit'];

	$path = $_FILES['proof']['name'];
	$file_tmp = $_FILES['proof']['tmp_name'];

	move_uploaded_file($file_tmp, './assets/lampiran/'.$path);
	$query = mysql_query("INSERT INTO tb_ticket 
		(id_tick,no_tick,req_date,due_date,subject,detail,priority,trouble,req_by,assign_to,admin_assign,progress,summary,email_user,unit,proof) 
		VALUES 
		('','$no_tick','$req_date','$due_date','$subject','$detail','$priority','$trouble','$req_by','$assign_to','$admin_assign','$progress','$summary','$email_user','$unit','$path')
		");

	if($query){
		header("Location: ./user_create_ticket.php?ntf=1");                                                  
	} else {
		echo "Updated Failed - Please contact your Administrator";
	}

	$path = 'upload/' . $_FILES["proof"]["name"];
	move_uploaded_file($_FILES["proof"]["tmp_name"], $path);
	$message = '  <!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>ITicket Problem!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">New Ticket Printer Problem </h4><h4 align="center"><br>No. Ticket <b>'.$no_tick.'</b><hr><br>'.$priority.' Ticket!</h4> <p style="text-align: center;font-size: 16px;letter-spacing: .5px;">Hai, <span style="font-weight:600">'.$assign_to.'</span><br><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: red;color: #fff !important;padding: 10px 15px;text-decoration: none;">'.$progress.'</a></p><p style="text-align: center;font-size: 14px;">Saya mengalami masalah pada mesin printer dengan dengan detail masalah:<br><b>'.$detail.'</b><br> dengan lampiran yang tertera pada Aplikasi ITicket.</p><br><p align="left">Terimakasih,<br><b><u>'.$req_by.'</u></b><br><i>'.$unit.'</i></p><hr><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">Cek Aktivitas</a></p></div></body></html>';

	require 'class/class.phpmailer.php';
	$mail = new PHPMailer;
  $mail->IsSMTP();                //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "adm.rskghabibie@gmail.com";
  $mail->Password = "@10Rskghabibie";       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = $_POST['email_user'];         //Sets the From email address for the message
  $mail->FromName = ('ITicket RS. Khusus Ginjal Ny. R.A. Habibie');     //Sets the From name of the message
  $mail->AddAddress($_POST['admin_assign']);   //Adds a "To" address
  $mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);              //Sets message type to HTML
  $mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
  $mail->Subject = $_POST['subject'];       //Sets the Subject of the message
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

//////////////////////////END ADD//////////////////////
//////////////////////////UPDATE//////////////////////
// EDIT
if(isset($_POST["update"]))    
{    
	$id_tick       = $_POST['id_tick'];
	$no_urut_n     = $_POST['no_urut_n'];
	$tanggal_n     = $_POST['tanggal_n'];
	$no_dokumen_n  = $_POST['no_dokumen_n'];
	$judul_n       = $_POST['judul_n'];
	$bagian_n      = $_POST['bagian_n'];
	$keterangan_n  = $_POST['keterangan_n'];
	$date_n        = $_POST['date_n'];

	$query = mysql_query("UPDATE tb_ticket SET 
		no_urut_n ='$no_urut_n',
		tanggal_n = '$tanggal_n',
		no_dokumen_n = '$no_dokumen_n',
		judul_n = '$judul_n',
		bagian_n = '$bagian_n',
		keterangan_n = '$keterangan_n',
		date_n = '$date_n'
		WHERE id_tick ='$id_tick'");
	if($query){
		header("Location: ./user_create_ticket.php?ntf=4");                                                  
	} else {
		echo "Updated Failed - Please contact your Administrator";
	}
} 

// TAMBAH LAMPIRAN
if(isset($_POST["uploadlampiran"]))    
{    
	$id_tick           = $_POST['id_tick'];

	$nama = $_FILES['upload_n']['name'];
	$file_tmp = $_FILES['upload_n']['tmp_name'];

	move_uploaded_file($file_tmp, './assets/file/'.$nama);

	$query = mysql_query("UPDATE tb_ticket SET 
		upload_n = '$nama'
		WHERE id_tick ='$id_tick'");
	if($query){
		header("Location: ./user_create_ticket.php?ntf=5");                                                  
	} else {
		header("Location: ./user_create_ticket.php?ntf=6");  
	}
} 

// DELETE
if(isset($_POST['delete']))
{
	$id_tick    = $_POST['id_tick'];

	if($id_tick){
		$query = mysql_query("DELETE FROM tb_ticket WHERE id_tick = '$id_tick'");
		if($query){
			header("Location: ./user_create_ticket.php?ntf=3");                     
		} else {
			header("Location: ./user_create_ticket.php?ntf=6");  
		}
	} else {
		header("Location: ./user_create_ticket.php?ntf=6");  
	}
	$message = '  <!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>ITicket Problem!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">Ticket Delete!</h4><h4 align="center"><br>No. Ticket <b>'.$_POST["no_tick"].'</b><hr><br>'.$_POST["priority"].' Ticket!</h4> <p style="text-align: center;font-size: 16px;letter-spacing: .5px;">Hai, <span style="font-weight:600">'.$_POST["assign_to"].'</span><br><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: gray;color: #fff !important;padding: 10px 15px;text-decoration: none;">'.$_POST["progress"].'</a></p><p style="text-align: center;font-size: 14px;">Keterangan:<br><b>'.$_POST["detail"].'</b><br><p align="left">Terimakasih,<br><b><u>'.$_POST["req_by"].'</u></b><br><i>'.$_POST["unit"].'</i></p><hr><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">Cek Aktivitas</a></p></div></body></html>';

	require 'class/class.phpmailer.php';
	$mail = new PHPMailer;
  $mail->IsSMTP();                //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "adm.rskghabibie@gmail.com";
  $mail->Password = "@10Rskghabibie";       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = $_POST['email_user'];         //Sets the From email address for the message
  $mail->FromName = ('ITicket RS. Khusus Ginjal Ny. R.A. Habibie');     //Sets the From name of the message
  $mail->AddAddress($_POST['admin_assign']);   //Adds a "To" address
  $mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);              //Sets message type to HTML
  $mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
  $mail->Subject = $_POST['subject'];       //Sets the Subject of the message
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
	<title>ITicket - Create Ticket</title>
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
							<h2 class="pageheader-title">Create Ticket Page</h2>
							<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
							<div class="page-breadcrumb">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Create Ticket Page</li>
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
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<th>#</th>
												<th>No. Ticket</th>
												<th>Request Date</th>
												<th>Due Date</th>
												<th>Subject</th>
												<th>Status Priority</th>
												<th>Progress</th>
												<th>Date Respon</th>
												<th>File</th>
												<th>Action</th>
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
											$result = mysqli_query($con,"SELECT * FROM tb_ticket WHERE trouble='Software' ORDER BY no_tick ASC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<tr>";
													echo "<td>".$row['id_tick'] . "</td>";
													echo "<td>".$row['no_tick'] . "</td>";
													echo "<td>".tanggal_indo($row['req_date'], true) . "</td>";
													echo "<td>".tanggal_indo($row['due_date'], true) . "</td>";
													echo "<td>".$row['subject'] . "</td>";
													echo "<td>".$row['priority'] . "</td>";
													if ($row['progress']=='New'){
														echo "<td><span class='badge badge-danger'>New</span></td>";
													}elseif ($row['progress']=='On Progress') {
														echo "<td><span class='badge badge-warning'>On Progress</span></td>";
													}elseif ($row['progress']=='Done') {
														echo "<td><span class='badge badge-success'>On Progress</span></td>";
													}
													if ($row['date_progress']==NULL){
														echo "<td><span class='badge badge-dark'>Belum Direspon Petugas</span></td>";
													}else{
														echo "<td><span class='badge badge-dark'>".tanggal_indo($row['date_progress'], true) . "</span></td>";
													}
													if ($row['proof']==NULL){
														echo "<td>empty</td>";
													}else{
														echo "<td align='center'>
														<a href='./assets/lampiran/$row[proof]' target='_blank'><img src='assets/images/icon/unnamed.png' width='40px'></a>
														</td>";
													}
													echo "<td width='100px'>
													<a href='#' data-toggle='modal' data-target='#edit$row[id_tick]' title='Update'><span class='badge badge-success'><i class='fas fa-tag'></i> </span></a>
													</td>";
													echo "</tr>";
													?>
													<!-- UPDATE -->
                        <!-- <div class="modal fade" id="edit<?php echo $row['id_tick'];?>" role="dialog">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Update Ticket</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>No. Urut</label>
                                        <input type="text" class="form-control" name="no_urut_n" placeholder="No. Ururt ..." value="<?php echo $row['no_urut_n']; ?>">
                                        <input type="hidden" class="form-control" name="id_tick" value="<?php echo $row['id_tick']; ?>">
                                        <input type="hidden" class="form-control" name="date_n" value="<?php echo $row['date_n']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal_n" value="<?php echo $row['tanggal_n']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>No. Dokumen</label>
                                        <input type="text" class="form-control" name="no_dokumen_n" placeholder="No. Dokumen ..." value="<?php echo $row['no_dokumen_n']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" class="form-control" name="judul_n" placeholder="Judul ..." value="<?php echo $row['judul_n']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Bagian/Instalasi/Komite</label>
                                        <select name="bagian_n" class="form-control" required="required">
                                          <option value="<?php echo $row['bagian_n']; ?>"><?php echo $row['bagian_n']; ?></option>
                                          <option value=""></option>
                                          <?php
                                                                        //Membuat coneksi ke database 
                                          $con = mysqli_connect("localhost",'root',"","rskg_dpa");
                                          if (!$con){
                                            die("coneksi database gagal:".mysqli_connect_error());
                                          }

                                                                        //Perintah sql untuk menampilkan semua data pada tabel department
                                          $sql="SELECT * FROM tb_bagian";

                                          $hasil=mysqli_query($con,$sql);
                                          $no=0;
                                          while ($data = mysqli_fetch_array($hasil)) {
                                            $no++;
                                            ?>
                                            <option value="<?php echo $data['nama_bg'];?>"><?php echo $data['nama_bg'];?></option>
                                            <?php 
                                          }
                                          ?>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" rows="3" name="keterangan_n" placeholder="Keterangan ..."><?php echo $row['keterangan_n']; ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <button type="submit" name="update" class="btn btn-block btn-dark">Submit</button>
                                    <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                      </div> -->
                      <!-- END UPDATE -->

                      <!-- DELETE -->
                      <div class="modal fade" id="delete<?php echo $row['id_tick'];?>" role="dialog">
                      	<div class="modal-dialog">
                      		<div class="modal-content">
                      			<div class="modal-header">
                      				<label class="modal-title">Delete Ticket</label>
                      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      					<span aria-hidden="true">&times;</span>
                      				</button>
                      			</div>
                      			<div class="modal-body">
                      				<form method="post" action="">
                      					<div class="form-group">
                      						<label>Hapus Ticket?</label>
                      						<h6>No. Ticket : <b><u><?php echo $row['no_tick'];?></u></b></h6>
                      						<h6>Subject : <b><u><?php echo $row['subject'];?></u></b></h6>
                      						<h6><u>Detail Masalah</u><br><p align="justify"><?php echo $row['detail'];?></p></h6>
                      						<div class="col-sm-12">
                      							<div class="form-group">
                      								<label>Tulis Keterangan<font style="color: red">*</font></label>
                      								<textarea class="form-control" rows="3" name="detail" placeholder="Tulis Keterangan ..." required="required"></textarea>
                      							</div>
                      						</div>
                      						<input type="hidden" name="id_tick" class="form-control" value="<?php echo $row['id_tick'];?>" required>
                      						<input type="hidden" name="admin_assign" class="form-control" value="<?php echo $row['admin_assign'];?>" required>
                      						<input type="hidden" name="no_tick" class="form-control" value="<?php echo $row['no_tick'];?>" required>
                      						<input type="hidden" name="priority" class="form-control" value="<?php echo $row['priority'];?>" required>
                      						<input type="hidden" name="progress" class="form-control" value="<?php echo $row['progress'];?>" required>
                      						<input type="hidden" name="req_by" class="form-control" value="<?php echo $row['req_by'];?>" required>
                      						<input type="hidden" name="unit" class="form-control" value="<?php echo $row['unit'];?>" required>
                      						<input type="hidden" name="assign_to" class="form-control" value="<?php echo $row['assign_to'];?>" required>
                      					</div>
                      					<button type="submit" name="delete" class="btn btn-danger btn-block btn-flat">Yes</button>
                      					<button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
                      				</form>
                      			</div>
                      		</div>
                      	</div>
                      </div>
                      <!-- END DELETE -->
                  <?php } } mysqli_close($con); ?>
              </tbody>
              <tfoot>
              	<tr>
              		<th>#</th>
              		<th>No. Ticket</th>
              		<th>Request Date</th>
              		<th>Due Date</th>
              		<th>Subject</th>
              		<th>Status Priority</th>
              		<th>Progress</th>
              		<th>Date Respon</th>
              		<th>File</th>
              		<th>Action</th>
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
<?php include "include/footer.php" ?>
<?php include 'include/thirdparty.php'; ?>
</body>
</html>