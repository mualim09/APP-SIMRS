<?php 
include "include/connection.php";

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
////////////////////////////////////////////////////////ACTION PERANGKAT///////////////////////////////////////////////////////
// ADD PERANGKAT
if(isset($_POST["submitperangkat"]))    
{    
	$id_perangkat   = $_POST['id_perangkat'];
	$no_perangkat   = $_POST['no_perangkat'];
	$kode_unit      = $_POST['kode_unit'];
	$nama_perangkat = $_POST['nama_perangkat'];
	$sn 			  = $_POST['sn'];
	$ip_address 	  = $_POST['ip_address'];
	$date_beli      = $_POST['date_beli'];
	$os 			  = $_POST['os'];
	$merek 		  = $_POST['merek'];
	$RAM 			  = $_POST['RAM'];
	$remark 		  = $_POST['remark'];
	$username 	  = $_POST['username'];

	$query = mysql_query("INSERT INTO tb_perangkat 
		(id_perangkat,no_perangkat,kode_unit,nama_perangkat,sn,ip_address,date_beli,os,merek,RAM,remark,username) 
		VALUES 
		('','$no_perangkat','$kode_unit','$nama_perangkat','$sn','$ip_address','$date_beli','$os','$merek','$RAM','$remark','$username')
		");
	if ($query) {
		header("Location: ./sa_perangkat.php?ntf=1");  
	} else {
		header("Location: ./sa_perangkat.php?ntf=6");
	}
}

// EDIT PERANGKAT
if(isset($_POST["updateperangkat"]))    
{    
	$id_kode        = $_POST['id_kode'];
	$nama_kode      = $_POST['nama_kode'];
	$username_kode  = $_POST['username_kode'];

	$query = mysql_query("UPDATE tb_kode SET 
		nama_kode ='$nama_kode',
		username_kode = '$username_kode'
		WHERE id_kode ='$id_kode'");
	if($query){
		header("Location: ./sa_perangkat.php?ntf=4");                                                  
	} else {
		echo "Updated Failed - Please contact your Administrator";
	}
} 

// DELETE PERANGKAT
if(isset($_POST['deleteperangkat']))
{
	$id_perangkat    = $_POST['id_perangkat'];

	if($id_perangkat){
		$query = mysql_query("DELETE FROM tb_perangkat WHERE id_perangkat = '$id_perangkat'");
		if($query){
			header("Location: ./sa_perangkat.php?ntf=3");                     
		} else {
			header("Location: ./sa_perangkat.php?ntf=6");  
		}
	} else {
		header("Location: ./sa_perangkat.php?ntf=6");  
	}
}
////////////////////////////////////////////////////////END ACTION PERANGKAT///////////////////////////////////////////////////////
////////////////////////////////////////////////////////ACTION BIDANG///////////////////////////////////////////////////////
// ADD KODE
if(isset($_POST["submitdevice"]))    
{    
	$id_device       	= $_POST['id_device'];
	$nama_device     	= $_POST['nama_device'];
	$jenis_device     = $_POST['jenis_device'];
	$date_device     	= $_POST['date_device'];
	$id_perangkat 	= $_POST['id_perangkat'];
	$merek 			= $_POST['merek'];
	$remark_device 	= $_POST['remark_device'];

	$query = mysql_query("INSERT INTO tb_device 
		(id_device,nama_device,jenis_device,date_device,id_perangkat,merek,remark_device)
		VALUES 
		('','$nama_device','$jenis_device','$date_device','$id_perangkat','$merek','$remark_device')
		");
	if ($query) {
		header("Location: ./sa_perangkat.php?ntf=1");  
	} else {
		header("Location: ./sa_perangkat.php?ntf=6");
	}
}

// EDIT KODE
if(isset($_POST["updatebidang"]))    
{    
	$id_bg       = $_POST['id_bg'];
	$id_kode     = $_POST['id_kode'];
	$nama_bg     = $_POST['nama_bg'];
	$username_bg = $_POST['username_bg'];

	$query = mysql_query("UPDATE tb_bagian SET 
		id_kode ='$id_kode',
		nama_bg ='$nama_bg',
		username_bg = '$username_bg'
		WHERE id_bg ='$id_bg'");
	if($query){
		header("Location: ./sa_perangkat.php?ntf=4");                                                  
	} else {
		echo "Updated Failed - Please contact your Administrator";
	}
} 

// DELETE KODE
if(isset($_POST['deletebidang']))
{
	$id_device    = $_POST['id_device'];

	if($id_device){
		$query = mysql_query("DELETE FROM tb_device WHERE id_device = '$id_device'");
		if($query){
			header("Location: ./sa_perangkat.php?ntf=3");                     
		} else {
			header("Location: ./sa_perangkat.php?ntf=6");  
		}
	} else {
		header("Location: ./sa_perangkat.php?ntf=6");  
	}
}
////////////////////////////////////////////////////////END ACTION BIDANG///////////////////////////////////////////////////////
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
	<title>ITicket | Kritik & Saran</title>
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
							<h2 class="pageheader-title">Kritik & Saran</h2>
							<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
							<div class="page-breadcrumb">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Kritik & Saran</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<!-- ALERT -->
				<?php include 'include/alert/success.php' ?>
				<!-- END ALERT -->
				<!-- KRITIK & SARAN -->
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-header">
								<b>Kiritik & Saran Dari Users</b>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<th>ID</th>
												<th>Kritik</th>
												<th>Saran</th>
												<th>Dari</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$con=mysqli_connect("localhost","root","","rskg_formit");
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to MySQL: " . mysqli_connect_error();
											}
											$result = mysqli_query($con,"SELECT 
												a.id_ks AS ID, 
												a.kritik AS A,
												 a.saran AS B,
												 a.user_id AS C, 
												 b.user_id AS D, 
												 b.full_name AS E 
												 FROM tb_kritiksaran a JOIN tb_user b 
												 ON a.user_id=b.user_id ORDER BY a.id_ks ASC");
											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<tr>";
													echo "<td>".$row['ID'] . "</td>";
													echo "<td>".$row['A'] . "</td>";
													echo "<td>".$row['B'] . "</td>";
													echo "<td>".$row['E'] . "</td>";
													echo "</tr>";
													?>
												<?php } } mysqli_close($con); ?>
											</tbody>
											<tfoot>
												<tr>
													<th>ID</th>
													<th>Kritik</th>
													<th>Saran</th>
													<th>Dari</th>
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