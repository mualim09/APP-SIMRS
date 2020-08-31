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
				<h1 class="m-0 text-dark">SURAT MASUK</h1>
			</div>
			<hr>
			<div class="container-fluid">
				<!-- DATA -->
				<table border="2px" class="table table-striped">
					<thead>
						<tr align="center">
							<th colspan="2">Nomor</th>
							<th rowspan="2">Alamat Pengirim</th>
							<th colspan="3">Dari Surat Masuk</th>
							<th rowspan="2">Keterangan</th>
							<th rowspan="2">Lampiran</th>
						</tr>
						<tr align="center">
							<th>Urut</th>
							<th>Berkas</th>
							<th>Tanggal</th>
							<th>Nomor</th>
							<th>Perihal</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$con=mysqli_connect("localhost","root","","rskg_sirsadm");
						if (mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
						$result = mysqli_query($con,"SELECT * FROM tb_asm ORDER BY id_asm DESC");

						$no=0;
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result))
							{
								$no++;
								echo "<tr>";
								echo "<td>".$no.".</td>";
								if ($row['berkas_asm']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['berkas_asm'] . "</td>";
								}
								if ($row['alamat_pengirim']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['alamat_pengirim'] . "</td>";
								}
								if ($row['tanggal']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".tanggal_indo($row['tanggal'], true) . "</td>";
								}
								if ($row['nomor_asm']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['nomor_asm'] . "</td>";
								}
								if ($row['perihal_asm']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['perihal_asm'] . "</td>";
								}
								if ($row['ket_asm']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['ket_asm'] . "</td>";
								}
								if ($row['lampiran_asm']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['lampiran_asm'] . "</td>";
								}
								echo "</tr>";
								?>

								<?php
							}
						}mysqli_close($con);
						?>
					</tbody>
					<tfoot>
						<tr align="center">
							<th>Urut</th>
							<th>Berkas</th>
							<th>Alamat Pengirim</th>
							<th>Tanggal</th>
							<th>Nomor</th>
							<th>Perihal</th>
							<th>Keterangan</th>
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
