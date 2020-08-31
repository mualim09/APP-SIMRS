<?php 
include "include/connection.php";
$result = mysql_query("SELECT * FROM tb_user WHERE username = '$user'");
$data = mysql_fetch_array($result);

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

// $dataxs = $data['username'];
// $dashboard_sw = mysql_query("SELECT COUNT(*) AS total_sw FROM tb_ticket WHERE trouble='Software' AND email_user='dataxs'");
// $dashboard_hw = mysql_query("SELECT COUNT(*) AS total_hw FROM tb_ticket WHERE trouble='Hardware' AND email_user='dataxs'");
// $dashboard_pt = mysql_query("SELECT COUNT(*) AS total_pt FROM tb_ticket WHERE trouble='Printer' AND email_user='dataxs'");
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
	<title>ITicket - Dashboard</title>
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
		width: 150px;
		height: 150px;
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
			<div class="dashboard-influence">
				<div class="container-fluid dashboard-content">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="page-header">
								<h3 class="mb-2">Dashboard </h3>
								<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
								<div class="page-breadcrumb">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
											<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
										</ol>
									</nav>
								</div>
							</div>
						</div>
					</div>
					<!-- ALERT -->
					<?php include 'include/alert/success.php' ?>
					<!-- END ALERT -->
					<div align="center">
						<h2>Monitoring Progres Ticket </h2><h3><?php echo tanggal_indo(date('Y-m-d')); ?></h3>
						<hr>
					</div>
					<div class="row">
						<div class="col-xl-6">
							<div class="card">
								<div class="card-body">
									<div class="d-inline-block">
										<h5 class="text-muted">Total Ticket</h5>
										<?php
											$con=mysqli_connect("localhost","root","","rskg_ticket");
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to MySQL: " . mysqli_connect_error();
											}
											$datax = $_SESSION['username'];
											$result = mysqli_query($con,"SELECT COUNT(*) AS total_sw FROM tb_ticket WHERE trouble='Software' AND admin_assign='$datax' ORDER BY id_tick DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<h2 class='mb-0'>".$row['total_sw'] . "</h2>";
											?>
													
												<?php } } mysqli_close($con); ?>
									</div>
									<div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                        <i class="fa fa-tags fa-fw fa-sm text-info"></i>
                                    </div>
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="card">
								<div class="card-body">
									<div class="d-inline-block">
										<h5 class="text-muted">New</h5>
										<?php
											$con=mysqli_connect("localhost","root","","rskg_ticket");
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to MySQL: " . mysqli_connect_error();
											}
											$datax = $_SESSION['username'];
											$result = mysqli_query($con,"SELECT COUNT(*) AS total_hw FROM tb_ticket WHERE trouble='Software' AND progress='New' AND admin_assign='$datax' ORDER BY id_tick DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<h2 class='mb-0'>".$row['total_hw'] . "</h2>";
											?>
													
												<?php } } mysqli_close($con); ?>
									</div>
									<div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                        <i class="fa fa-asterisk fa-fw fa-sm text-secondary"></i>
                                    </div>
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="card">
								<div class="card-body">
									<div class="d-inline-block">
										<h5 class="text-muted">On Progress</h5>
											<?php
											$con=mysqli_connect("localhost","root","","rskg_ticket");
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to MySQL: " . mysqli_connect_error();
											}
											$datax = $_SESSION['username'];
											$result = mysqli_query($con,"SELECT COUNT(*) AS total_hw FROM tb_ticket WHERE trouble='Software' AND progress='On Progress' AND admin_assign='$datax' ORDER BY id_tick DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<h2 class='mb-0'>".$row['total_hw'] . "</h2>";
											?>
													
												<?php } } mysqli_close($con); ?>
									</div>
									<div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                        <i class="fa fa-hourglass fa-fw fa-sm text-primary"></i>
                                    </div>
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="card">
								<div class="card-body">
									<div class="d-inline-block">
										<h5 class="text-muted">Done</h5>
											<?php
											$con=mysqli_connect("localhost","root","","rskg_ticket");
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to MySQL: " . mysqli_connect_error();
											}
											$datax = $_SESSION['username'];
											$result = mysqli_query($con,"SELECT COUNT(*) AS total_pti FROM tb_ticket WHERE trouble='Software' AND progress='Done' AND admin_assign='$datax' ORDER BY id_tick DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<h2 class='mb-0'>".$row['total_pti'] . "</h2>";
											?>
													
												<?php } } mysqli_close($con); ?>
									</div>
									<div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
										<i class="fa fa-thumbs-up fa-fw fa-sm text-brand"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4">
							<h5 class="card-header" style="background-color: red; color: white">List Ticket New</h5>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table no-wrap p-table">
										<thead class="bg-light">
											<tr class="border-0">
												<th class="border-0">Date Request</th>
												<th class="border-0">Requset By</th>
												<th class="border-0">Assign To</th>
												<th class="border-0">Status Ticket</th>
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
											$result = mysqli_query($con,"SELECT * FROM tb_ticket WHERE trouble='Software' AND progress='New' AND admin_assign='$datax' ORDER BY id_tick DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<tr>";
													echo "<td>".$row['req_date'] . "</td>";
													echo "<td>".$row['req_by'] . "</td>";
													echo "<td>".$row['assign_to'] . "</td>";
													if ($row['progress']=='New'){
														echo "<td><span class='badge badge-danger'>New</span></td>";
													}elseif ($row['progress']=='On Progress') {
														echo "<td><span class='badge badge-warning'>On Progress</span></td>";
													}elseif ($row['progress']=='Done') {
														echo "<td><span class='badge badge-info'>Done</span></td>";
													}
													echo "</tr>";
													?>

												<?php } } mysqli_close($con); ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-xl-4">
							<h5 class="card-header" style="background-color: #f3b600; color: black">List Ticket On Progress</h5>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table no-wrap p-table">
										<thead class="bg-light">
											<tr class="border-0">
												<th class="border-0">Date Request</th>
												<th class="border-0">Date Respon</th>
												<th class="border-0">Requset By</th>
												<th class="border-0">Assign To</th>
												<th class="border-0">Status Ticket</th>
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
											$result = mysqli_query($con,"SELECT * FROM tb_ticket WHERE trouble='Software' AND progress='On Progress' AND admin_assign='$datax' ORDER BY id_tick DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<tr>";
													echo "<td>".$row['req_date'] . "</td>";
													echo "<td>".$row['date_progress'] . "</td>";
													echo "<td>".$row['req_by'] . "</td>";
													echo "<td>".$row['assign_to'] . "</td>";
													if ($row['progress']=='New'){
														echo "<td><span class='badge badge-danger'>New</span></td>";
													}elseif ($row['progress']=='On Progress') {
														echo "<td><span class='badge badge-warning'>On Progress</span></td>";
													}elseif ($row['progress']=='Done') {
														echo "<td><span class='badge badge-info'>Done</span></td>";
													}
													echo "</tr>";
													?>
												
											<?php } } mysqli_close($con); ?>
										</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-xl-4">
							<h5 class="card-header" style="background-color: #0998b0; color: white">List Ticket Done</h5>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table no-wrap p-table">
										<thead class="bg-light">
											<tr class="border-0">
												<th class="border-0">Date Request</th>
												<th class="border-0">Date Respon</th>
												<th class="border-0">Date Done/Selesai</th>
												<th class="border-0">Requset By</th>
												<th class="border-0">Assign To</th>
												<th class="border-0">Status Ticket</th>
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
											$result = mysqli_query($con,"SELECT * FROM tb_ticket WHERE trouble='Software' AND progress='Done' AND admin_assign='$datax' ORDER BY id_tick DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<tr>";
													echo "<td>".$row['req_date'] . "</td>";
													echo "<td>".$row['date_progress'] . "</td>";
													echo "<td>".$row['date_done'] . "</td>";
													echo "<td>".$row['req_by'] . "</td>";
													echo "<td>".$row['assign_to'] . "</td>";
													if ($row['progress']=='New'){
														echo "<td><span class='badge badge-danger'>New</span></td>";
													}elseif ($row['progress']=='On Progress') {
														echo "<td><span class='badge badge-warning'>On Progress</span></td>";
													}elseif ($row['progress']=='Done') {
														echo "<td><span class='badge badge-info'>Done</span></td>";
													}
													echo "</tr>";
													?>
													
												<?php } } mysqli_close($con); ?>
											</tbody>
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