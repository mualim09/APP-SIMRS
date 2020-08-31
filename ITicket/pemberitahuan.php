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

if(isset($_POST["send"]))
{

  $id_pem      = $_POST['id_pem'];
  $user_id     = $_POST['user_id'];
  $judul       = $_POST['judul'];
  $full_name   = $_POST['full_name'];
  $user_role   = $_POST['user_role'];
  $date_pem    = $_POST['date_pem'];
  $mulai       = $_POST['mulai'];
  $selesai     = $_POST['selesai'];
  $keterangan  = $_POST['keterangan'];
  $email       = $_POST['email'];
  $json_email    = json_encode($email);

  $query = mysql_query("INSERT INTO tb_pemberitahuan 
    (id_pem,user_id,judul,full_name,user_role,date_pem,mulai,selesai,keterangan) 
    VALUES 
    ('','$user_id','$judul','$full_name','$user_role','$date_pem','$mulai','$selesai','$keterangan')
    ");

  $query .= mysql_query("INSERT INTO tb_notif
    (id_notif,no_user_id,no_judul,no_full_name,no_user_role,no_date_pem,no_mulai,no_selesai,no_keterangan)
    VALUES
    ('','$user_id','$judul','$full_name','$user_role','$date_pem','$mulai','$selesai','$keterangan')
    ");

  if($query){
    header("Location: ./pemberitahuan.php?ntf=1");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }

  $message = '<!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>Info ITicket!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">Pengumuman</h4><h4 align="center"><br>Judul <b>'.$judul.'</b></h4><hr><h4 align="center">Hai, Pengguna ITicket RS. Khusus Ginjal Ny. R.A. Habibie</h4><p align="justify">'.$keterangan.'</p><br><br><p align="left">Terimakasih,<br>Regards,<br><br><b><u>'.$full_name.'</u></b><br><i>'.$user_role.'</i></p><hr><p style="text-align: center;margin-top: 20px;"><i>Berlaku mulai tanggal : '.$mulai.' sampai tanggal  '.$selesai.' </i></p></div></body></html>';

  $email = array($json_email);
  $comma_separated = implode(",", $email);
  
  require 'class/class.phpmailer.php';
  $mail = new PHPMailer;
  $mail->IsSMTP();                //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "adm.rskghabibie@gmail.com";
  $mail->Password = "@10Rskghabibie";       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = $_POST['email_adm'];         //Sets the From email address for the message
  $mail->FromName = ('[Pengumuman] ITicket RS. Khusus Ginjal Ny. R.A. Habibie');     //Sets the From name of the message
  $mail->AddAddress($comma_separated);   //Adds a "To" address
  $mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);              //Sets message type to HTML
  $mail->Subject = $_POST['judul'];       //Sets the Subject of the message
  $mail->Body = $message;             //An HTML or plain text message body
  if($mail->Send())               //Send an Email. Return true on success or false on error
  {
    $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
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
	<title>ITicket - Info Broadcast</title>
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
							<h2 class="pageheader-title">Info Broadcast</h2>
							<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
							<div class="page-breadcrumb">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Pemeritahuan</a></li>
										<li class="breadcrumb-item active" aria-current="page">Info Broadcast</li>
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
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<form action="" method="POST" >
									<div class="row">
										<div class="col-xl-12">
											<div class="form-group">
												<label for="validationCustom01">Judul</label>
												<input type="text" class="form-control" name="judul" placeholder="Judul">
												<input type="hidden" class="form-control" name="id_pem">
												<input type="hidden" class="form-control" name="user_id" value="<?php echo $data['user_id']; ?>">
												<input type="hidden" class="form-control" name="full_name" value="<?php echo $data['full_name']; ?>">
												<input type="hidden" class="form-control" name="email_adm" value="<?php echo $data['email']; ?>">
												<input type="hidden" class="form-control" name="user_role" value="Petugas <?php echo $data['user_role']; ?>">
												<input type="hidden" class="form-control" name="date_pem" value="<?php echo date('Y-m-d H:i:sa'); ?>" readonly>
											</div>
										</div>
										<div class="col-xl-12">
											<div class="form-group" align="center">
												<label><i style="">Optional digukan</i></label>
											</div>
										</div>
										<div class="col-xl-6">
											<div class="form-group">
												<label for="validationCustom01">Mulai</label>
												<input type="date" class="form-control" name="mulai">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="form-group">
												<label for="validationCustom01">Batas Akhir</label>
												<input type="date" class="form-control" name="selesai">
											</div>
										</div>								
										<div class="col-xl-12">
											<div class="form-group">
												<label for="validationCustom01">Keterangan</label>
												<textarea class="form-control" rows="10" name="keterangan" placeholder="Keterangan ..." required="required"></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<?php
											$con=mysqli_connect("localhost","root","","rskg_ticket");
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to MySQL: " . mysqli_connect_error();
											}
											$get_reviewer = mysqli_query($con,"SELECT email FROM tb_user WHERE user_role='user'");
											while($row_reviewer = mysqli_fetch_array($get_reviewer)) {
												?>
												<input type="hidden" name="email[]" value="<?php echo $row_reviewer['email']; ?>" class="form-control">
											<?php }  ?>
										</div>			
										<div class="col-xl-12">
											<br>
											<button class="btn btn-primary" name="send" type="submit" name="submit">Send Broadcast</button>
										</div>
									</div>
								</form>
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