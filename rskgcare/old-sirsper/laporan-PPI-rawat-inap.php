<?php
include "include/connection.php";
include 'include/restrict.php';

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

// ADD
if(isset($_POST["submit"]))    
{    
	$id_ppi_rawatinap           = $_POST['id_ppi_rawatinap'];
	$berkas_ani       = $_POST['berkas_ani'];
	$tanggal          = $_POST['tanggal'];
	$nomor_intern     = $_POST['nomor_intern'];
	$perihal_ani      = $_POST['perihal_ani'];
	$ket_ani          = $_POST['ket_ani'];
	$date_ani         = $_POST['date_ani'];

	$nama = $_FILES['lampiran_ani']['name'];
	$file_tmp = $_FILES['lampiran_ani']['tmp_name'];

	move_uploaded_file($file_tmp, './assets/file/nota_intern/lampiran/'.$nama);

	$query = mysql_query("INSERT INTO tb_ani 
		(id_ppi_rawatinap,berkas_ani,tanggal,nomor_intern,perihal_ani,ket_ani,date_ani,lampiran_ani) 
		VALUES 
		('','$berkas_ani','$tanggal','$nomor_intern','$perihal_ani','$ket_ani','$date_ani','$nama')
		");
	if ($query) {
		header("Location: ./agenda-nota-intern.php?ntf=1");  
	} else {
		header("Location: ./agenda-nota-intern.php?ntf=6");
	}
}

// EDIT
if(isset($_POST["update"]))    
{    
	$id_ppi_rawatinap           = $_POST['id_ppi_rawatinap'];
	$berkas_ani       = $_POST['berkas_ani'];
	$tanggal          = $_POST['tanggal'];
	$nomor_intern     = $_POST['nomor_intern'];
	$perihal_ani      = $_POST['perihal_ani'];
	$ket_ani          = $_POST['ket_ani'];
	$date_ani         = $_POST['date_ani'];

	$query = mysql_query("UPDATE tb_ani SET 
		berkas_ani ='$berkas_ani',
		tanggal = '$tanggal',
		nomor_intern = '$nomor_intern',
		perihal_ani = '$perihal_ani',
		ket_ani = '$ket_ani',
		date_ani = '$date_ani'
		WHERE id_ppi_rawatinap ='$id_ppi_rawatinap'");
	if($query){
		header("Location: ./agenda-nota-intern.php?ntf=4");                                                  
	} else {
		echo "Updated Failed - Please contact your Administrator";
	}
} 

// TAMBAH LAMPIRAN
if(isset($_POST["uploadlampiran"]))    
{    
	$id_ppi_rawatinap           = $_POST['id_ppi_rawatinap'];

	$nama = $_FILES['lampiran_ani']['name'];
	$file_tmp = $_FILES['lampiran_ani']['tmp_name'];

	move_uploaded_file($file_tmp, './assets/file/nota_intern/lampiran/'.$nama);

	$query = mysql_query("UPDATE tb_ani SET 
		lampiran_ani = '$nama'
		WHERE id_ppi_rawatinap ='$id_ppi_rawatinap'");
	if($query){
		header("Location: ./agenda-nota-intern.php?ntf=5");                                                  
	} else {
		header("Location: ./agenda-nota-intern.php?ntf=6");  
	}
} 

// DELETE
if(isset($_POST['delete']))
{
	$id_ppi_rawatinap    = $_POST['id_ppi_rawatinap'];

	if($id_ppi_rawatinap){
		$query = mysql_query("DELETE FROM tb_ani WHERE id_ppi_rawatinap = '$id_ppi_rawatinap'");
		if($query){
			header("Location: ./agenda-nota-intern.php?ntf=3");                     
		} else {
			header("Location: ./agenda-nota-intern.php?ntf=6");  
		}
	} else {
		header("Location: ./agenda-nota-intern.php?ntf=6");  
	}
}

// SEARCH
if(isset($_POST["search"]))
{    
	$query1 = '';
	if ($_POST['month']) {
		$query1 = "tanggal[month] ='$_POST[month]'";
	} else {
		if ($_POST['year']) {
			if ($query1 != '') {
				$query1 .= ' and ';
			}
			$query1 .= "tanggal[year] ='$_POST[year]'";
		}
	}
} else {
	$query1 = "tanggal[month] ='No Data' ";
	$query1 .= "and tanggal[year] ='No Data' ";
}
?>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Sistem Informasi | PPI</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/owl.theme.css">
	<link rel="stylesheet" href="assets/css/owl.transitions.css">
	<link rel="stylesheet" href="assets/css/meanmenu/meanmenu.min.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/normalize.css">
	<link rel="stylesheet" href="assets/css/wave/waves.min.css">
	<link rel="stylesheet" href="assets/css/wave/button.css">
	<link rel="stylesheet" href="assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="assets/css/notika-custom-icon.css">
	<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
	<?php include 'include/header.php'; ?>
	<?php include 'include/sidebar.php'; ?>
	<!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<img src="assets/icon/green/png/menu.png" width="50px">
									</div>
									<div class="breadcomb-ctn">
										<h2>Laporan PPI Rawat Inap</h2>
										<p>Dashboard/Laporan PPI Rawat Inap</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
	<!-- Data Table area Start-->
	<div class="data-table-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php include 'include/alert/success.php' ?>
					<div class="data-table-list">
						<div class="basic-tb-hd">
							<p>It's just that simple. Turn your simple table into a sophisticated data table and offer your users a nice experience and great features without any effort.</p>
						</div>
						<div class="table-responsive">
							<table id="data-table-basic" class="table table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>ID</th>
										<th>Petugas</th>
										<th>Tanggal</th>
										<th>Ruangan</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$con=mysqli_connect("localhost","root","","rskg_sirsper");
			                        // Check connection
									if (mysqli_connect_errno())
									{
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
									}
									// $result = mysqli_query($con,"SELECT * FROM tb_ppi_rawatinap ORDER BY id_ppi_rawatinap DESC");
									$akses =  $access['user_id'];
									$result = mysqli_query($con,"SELECT a.id_ppi_rawatinap,a.user_id,a.date_audit,a.ruangan,
										b.user_id,b.fullname,b.username,b.unit
										FROM tb_ppi_rawatinap a JOIN tb_user b
										ON a.user_id=b.user_id WHERE a.user_id='$akses' ORDER BY a.id_ppi_rawatinap DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											echo "<td>".$no.".</td>";
											if ($row['id_ppi_rawatinap']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['id_ppi_rawatinap'] . "</td>";
											}
											if ($row['fullname']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['fullname'] . "</td>";
											}
											if ($row['date_audit']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".tanggal_indo($row['date_audit'], true) . "</td>";
											}
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											echo "<td align= '' width='30px'>
											<a href='#' data-toggle='modal' data-target='#edit$row[id_ppi_rawatinap]' title='Edit'><img src='assets/icon/green/png/layer.png' width='20px'></a>
											<a href='#' data-toggle='modal' data-target='#delete$row[id_ppi_rawatinap]' title='Delete'><img src='assets/icon/green/png/delete-1.png' width='20px'></a>
											<a href='#' data-toggle='modal' data-target='#addfile$row[id_ppi_rawatinap]' title='Lihat Form'><img src='assets/icon/green/png/show.png' width='20px'></a>
											<a href='test.php?id=$row[id_ppi_rawatinap]' target='_blank' title='Download'><img src='assets/icon/green/png/download.png' width='20px'></a>
											</td>";
											echo "</tr>";
											?>

											<!-- UPDATE -->
											<div class="modal fade" id="edit<?php echo $row['id_ppi_rawatinap'];?>" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<label class="modal-title">Delete Agenda Nota Intern</label>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="" method="POST">
																<div class="bsc-tbl-bdr">
																	<div width="100%" border="3px" class="table table-striped">
																		<div>
																			<div>
																				<div style="text-align: center;" rowspan="2" width="91">
																					<p><img src="assets/img/all-rs/rskg.png" width="auto" ></p>
																				</div>
																				<div style="text-align: center;" width="259">
																					<p><strong>FROM</strong></p>
																				</div>
																				<div style="text-align: center;" colspan="3" width="170">
																					<p>
																						<strong>Tanggal: <input type="date" name="date_audit" class="form-control" required="required"></strong>
																						<input type="hidden" class="form-control" name="ruangan" value="Rawat Inap">
																						<input type="hidden" class="form-control" name="id_ppi_rawatinap">
																						<input type="hidden" class="form-control" name="user_id" value="<?php echo $access['user_id']; ?>">
																					</p>
																				</div>
																				<div style="text-align: center;" rowspan="2" width="94">
																					<p><strong>Rencana Tindak Lanjut</strong></p>
																				</div>
																			</div>
																			<div>
																				<div style="text-align: center;" colspan="4" width="430">
																					<p><strong>Monitoring/ Audit PPI di Ruang Rawat Inap</strong></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p><strong>Elemen untuk Evaluasi</strong></p>
																				</div>
																				<div width="36">
																					<p><strong>Ya</strong></p>
																				</div>
																				<div width="48">
																					<p><strong>Tidak</strong></p>
																				</div>
																				<div width="81">
																					<p><strong>Temuan</strong></p>
																				</div>
																				<div width="94">
																					<p><strong>Keterangan</strong></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="6" width="619">
																					<p><strong>Personal</strong></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Personal Hygiene baik</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_1"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_1"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_2" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_3" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Pakaian rapih</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_4"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_4"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_5" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_6" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Rambut bersih dan rapih</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_7"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_7"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_8" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_9" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Tidak menggunakan perhiasan tangan</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_10"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_10"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_11" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_12" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Kuku pendek dan bersih</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_13"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_13"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_14" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_15" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Penggunaan APD sesuai prosedur</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_16"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_16"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_17" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_18" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Melakukan kebersihan tangan sesuai 6 langkah 5 moment</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_19"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_19"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_20" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_21" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Melapor kepada atasan jika diduga mengalami penyakit infeksi</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_22"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_22"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_23" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_24" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="6" width="619">
																					<p><strong>Bedside Stand / Fasilitas</strong></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Hand rub tersedia</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_25"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_25"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_26" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_27" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Sarana cuci tangan lengkap</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_28"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_28"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_29" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_30" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Wastafel dalam keadaan bersih</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_31"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_31"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_32" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_33" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Meja pasien bersih</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_34"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_34"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_35" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_36" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Tidak ada sisa makanan di sekitar pasien</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_37"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_37"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_38" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_39" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Pispot / Urinal tertutup bersih disimpan di spoelhook</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_40"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_40"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_41" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_42" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Alat -&nbsp; alat yang ada di sekitar pasien bersih</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_43"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_43"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_44" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_45" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Tiang infus bersih</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_46"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_46"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_47" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_48" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Alat section, selang feeding, dan oksigen bersih</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_49"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_49"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_50" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_51" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="6" width="619">
																					<p><strong>Bed</strong></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Ralling bersih</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_52"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_52"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_53" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_54" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Kasur menggunakan kedap air</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_55"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_55"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_56" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_57" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Tempat tidur bersih tidak berdebu</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_58"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_58"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_59" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_60" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="6" width="619">
																					<p><strong>Elemen untuk Evaluasi</strong></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Linen, bersih, tidak sobek, dan tidak ada noda</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_61"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_61"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_62" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_63" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Alat lain ditempat tidur bersih, restraint, bantal</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_64"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_64"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_65" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_66" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="6" width="619">
																					<p><strong>Lemari Pasien</strong></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Lemari bersih dan tertutup</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_67"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_67"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_68" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_69" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Pakaian diberi label</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_70"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_70"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_71" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_72" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Pakaian bersih tidak berbau</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_73"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_73"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_74" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_75" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="6" width="619">
																					<p><strong>Kamar Mandi</strong></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Shower bersih dan berfungsi dengan baik</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_76"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_76"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_77" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_78" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Tempat duduk toilet bersih dan tidak ada kerusakan</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_79"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_79"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_80" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_81" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Paper towel / tissue toilet tersedia</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_82"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_82"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_83" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_84" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Alat - alat pribadi pasien bersih</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_85"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_85"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_86" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_87" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="6" width="619">
																					<p><strong>Ruang Kotor</strong></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Terdapat sarana cuci tangan yang bersih dan berfungsi dengan baik</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_88"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_88"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_89" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_90" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Pump flusher berfungsi dengan baik</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_91"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_91"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_92" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_93" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Instrumen kotor ditempatkan dalam container tertutup</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_94"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_94"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_95" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_96" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Linen kotor ditempatkan dalam trolley linen kotor tertutup</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_97"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_97"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_98" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_99" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Linen kotor ditempatkan dalam trolley linen kotor infeksius / plastik kuning</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_100"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_100"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_101" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_102" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="6" width="619">
																					<p><strong>Elemen untuk Evaluasi</strong></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Area kotor terpisah dari area bersih</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_103"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_103"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_104" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_105" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="6" width="619">
																					<p><strong>Pembuangan Limbah</strong></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Tersedia wadah limbah infeksius, non infeksius, dan limbah benda tajam</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_106"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_106"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_107" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_108" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Ada label di setiap tempat sampah</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_109"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_109"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_110" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_111" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Tempat sampah infeksius menggunakan kantong kuning</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_112"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_112"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_113" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_114" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Tempat sampah non infeksius menggunakan kantong hitam</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_115"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_115"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_116" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_117" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Tempat limbah tajam menggunakan container yang tahan air, tidak tembus</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_118"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_118"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_119" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_120" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Limbah dibuang setelah 3/4 atau 2/3 penuh</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_121"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_121"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_122" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_123" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Tempat limbah dalam keadaan bersih dan tertutup</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_124"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_124"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_125" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_126" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																			<div>
																				<div colspan="2" width="351">
																					<p>Pedal tempat sampah berfungsi dengan baik</p>
																				</div>
																				<div width="36" align="center">
																					<p><input type="radio" value="Yes" name="RI_127"></p>
																				</div>
																				<div width="48" align="center">
																					<p><input type="radio" value="No" name="RI_127"></p>
																				</div>
																				<div width="81">
																					<p><textarea class="form-control" name="RI_128" placeholder="Temuan..."></textarea></p>
																				</div>
																				<div width="94">
																					<p><textarea class="form-control" name="RI_129" placeholder="Keterangan..."></textarea></p>
																				</div>
																			</div>
																		</div>
																	</div>
																	<button class="btn btn-block btn-success waves-effect" name="submit">Simpan</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- END UPDATE -->

											<!-- DELETE -->
											<div class="modal fade" id="delete<?php echo $row['id_ppi_rawatinap'];?>" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<label class="modal-title">Delete Agenda Nota Intern</label>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form method="post" action="">
																<div class="form-group">
																	<label>Hapus Data Agenda Nota Intern?</label>
																	<h6>Nomor Berkas : <b><u><?php echo $row['berkas_ani'];?></u></b></h6>
																	<h6>Tanggal : <b><u><?php echo $row['tanggal'];?></u></b></h6>
																	<h6>Nomor Intern : <b><u><?php echo $row['nomor_intern'];?></u></b></h6>
																	<input type="hidden" name="id_ppi_rawatinap" class="form-control" placeholder="client name" value="<?php echo $row['id_ppi_rawatinap'];?>" required>
																</div>
																<button type="submit" name="delete" class="btn btn-info btn-block btn-flat">Yes</button>
																<button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">No</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- END DELETE -->
											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>No.</th>
										<th>ID</th>
										<th>Petugas</th>
										<th>Tanggal</th>
										<th>Ruangan</th>
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
	<!-- Data Table area End-->

	<?php include 'include/footer.php';?>
	<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/jquery-price-slider.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/jquery.scrollUp.min.js"></script>
	<script src="assets/js/meanmenu/jquery.meanmenu.js"></script>
	<script src="assets/js/counterup/jquery.counterup.min.js"></script>
	<script src="assets/js/counterup/waypoints.min.js"></script>
	<script src="assets/js/counterup/counterup-active.js"></script>
	<script src="assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/js/sparkline/jquery.sparkline.min.js"></script>
	<script src="assets/js/sparkline/sparkline-active.js"></script>
	<script src="assets/js/flot/jquery.flot.js"></script>
	<script src="assets/js/flot/jquery.flot.resize.js"></script>
	<script src="assets/js/flot/flot-active.js"></script>
	<script src="assets/js/knob/jquery.knob.js"></script>
	<script src="assets/js/knob/jquery.appear.js"></script>
	<script src="assets/js/knob/knob-active.js"></script>
	<script src="assets/js/chat/jquery.chat.js"></script>
	<script src="assets/js/todo/jquery.todo.js"></script>
	<script src="assets/js/wave/waves.min.js"></script>
	<script src="assets/js/wave/wave-active.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/data-table/jquery.dataTables.min.js"></script>
	<script src="assets/js/data-table/data-table-act.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/tawk-chat.js"></script>
</body>
</html>