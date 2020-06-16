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
?>
<!DOCTYPE html>
<html>
<script>
	window.print();
</script>
<?php include 'include/header.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row">
					<!-- <div align="left">
						<img src="assets/img/all-rs/rskg.png" width="100px">
					</div> -->
				</div>
			</div>
		</div>
		<!-- ISI -->
		<section class="content">
			<div align="center" class="col-sm-12">
				<h1 class="m-0 text-dark">RESPON TIME SURAT INTERN</h1>
			</div>
			<hr>
			<div class="container-fluid">
				<!-- DATA -->
				<table border="2px" class="table table-striped">
					<thead>
						<tr align="center">
							<th rowspan="2">No.</th>
							<th colspan="2">Nomor</th>
							<th rowspan="2">Jam Diterima</th>
							<th rowspan="2">Jam Eksposisi Mutasi Surat</th>
							<th rowspan="2">Penerima</th>
							<th rowspan="2">Lampiran</th>
						</tr>
						<tr>
							<th>Tanggal</th>
							<th>Berkas</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$con=mysqli_connect("localhost","root","","rskg_sirsadm");
                        // Check connection
						if (mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
						$result = mysqli_query($con,"SELECT * FROM tb_rtsi ORDER BY id_rtsi DESC");

						$no=0;
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result))
							{
								$no++;
								echo "<tr>";
								echo "<td>".$no.".</td>";
								if ($row['tanggal']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".tanggal_indo($row['tanggal'], true) . "</td>";
								}
								if ($row['no_berkas']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['no_berkas'] . "</td>";
								}
								if ($row['jam']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['jam'] . "</td>";
								}
								if ($row['mutasi']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['mutasi'] . "</td>";
								}
								if ($row['penerima']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['penerima'] . "</td>";
								}
								if ($row['lampiran']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['lampiran'] . "</td>";
								}
								echo "</tr>";
								?>

								<?php
							}
						}mysqli_close($con);
						?>
					</tbody>
					<tfoot>
						<tr>
							<th>No.</th>
							<th>Tanggal</th>
							<th>Berkas</th>
							<th>Jam Diterima</th>
							<th>Jam Eksposisi Mutasi Surat</th>
							<th>Penerima</th>
							<th>Lampiran</th>
						</tr>
					</tfoot>
				</table>
				<!-- END DATA -->
			</div>
		</section>
		<!-- END ISI -->
	</div>
	<?php include 'include/jsfile.php'; ?>
</body>
</html>
