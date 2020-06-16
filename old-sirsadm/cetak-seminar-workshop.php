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

function rupiah ($angka) {
    $hasil = 'Rp ' . number_format($angka, 2, ",", ".");
    return $hasil;
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
				<h1 class="m-0 text-dark">SEMINAR & WOKRSHOP</h1>
			</div>
			<hr>
			<div class="container-fluid">
				<!-- DATA -->
				<table border="2px" class="table table-striped">
					<thead>
						<tr align="center">
							<th rowspan="2">No</th>
							<th rowspan="2">Kegiatan</th>
							<th rowspan="2">Tempat</th>
							<th colspan="2">Waktu Pelaksanaan</th>
							<th colspan="3">Data Peserta</th>
							<th colspan="3">Registrasi</th>
							<th colspan="3">Transportasi</th>
							<th colspan="3">Akomodasi</th>
						</tr>
						<tr align="center">
							<th>Mulai</th>
							<th>Selesai</th>
							<th>Nama</th>
							<th>NIK</th>
							<th>Email</th>
							<th>Ceklis</th>
							<th>Biaya</th>
							<th>Bukti Pembayaran</th>
							<th>Jenis</th>
							<th>Biaya</th>
							<th>Bukti Pembayaran</th>
							<th>Nama Penginapan/Hotel</th>
							<th>Biaya</th>
							<th>Bukti Pembayaran</th>
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
						$result = mysqli_query($con,"SELECT * FROM tb_snw ORDER BY id_snw DESC");

						$no=0;
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result))
							{
								$no++;
								echo "<tr>";
								echo "<td>".$no.".</td>";
								if ($row['kegiatan']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['kegiatan'] . "</td>";
								}
								if ($row['tempat']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['tempat'] . "</td>";
								}
								if ($row['wp_mulai']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".tanggal_indo($row['wp_mulai'], true) . "</td>";
								}
								if ($row['wp_selesai']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".tanggal_indo($row['wp_selesai'], true) . "</td>";
								}
								if ($row['dp_nama']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['dp_nama']. "</td>";
								}
								if ($row['dp_nik']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['dp_nik']. "</td>";
								}
								if ($row['email']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['email']. "</td>";
								}
								if ($row['rg_nama']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['rg_nama']. "</td>";
								}
								if ($row['rg_biaya']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>"."Rp. " . number_format($row['rg_biaya'],0,',','.')."</td>";
								}
								if ($row['rg_bp']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['rg_bp']. "</td>";
								}
								if ($row['tt_jenis']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['tt_jenis']. "</td>";
								}
								if ($row['tt_biaya']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>"."Rp. " . number_format($row['tt_biaya'],0,',','.')."</td>";
								}
								if ($row['tt_bp']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['tt_bp']. "</td>";
								}
								if ($row['ak_tempat']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['ak_tempat']. "</td>";
								}
								if ($row['ak_biaya']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>"."Rp. " . number_format($row['ak_biaya'],0,',','.')."</td>";
								}
								if ($row['ak_bp']==NULL){
									echo "<td>empty</td>";
								}else{
									echo "<td>".$row['ak_bp']. "</td>";
								}
								echo "</tr>";
								?>
								<?php
							}
						}mysqli_close($con);
						?>
					</tbody>
				</table>
				<!-- END DATA -->
			</div>
		</section>
		<!-- END ISI -->
	</div>
	<?php include 'include/jsfile.php'; ?>
</body>
</html>
