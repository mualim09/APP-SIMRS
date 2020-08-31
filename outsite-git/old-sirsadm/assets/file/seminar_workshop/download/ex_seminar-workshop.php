<?php
// The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");
date_default_timezone_set("Asia/Bangkok");
$datenow = date('d-m-Y h-i-s');

// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=Seminar-Workshop-$datenow.xls");

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
<div>
	<h1>SURAT KELUAR</h1>
</div>
<table border="2px" class="table table-striped">
	<thead>
		<tr align="center">
			<th rowspan="2" style="background-color: gray">No.</th>
			<th rowspan="2" style="background-color: gray">Kegiatan</th>
			<th rowspan="2" style="background-color: gray">Tempat</th>
			<th colspan="2" style="background-color: blue">Waktu Pelaksanaan</th>
			<th colspan="3" style="background-color: orange">Data Peserta</th>
			<th colspan="3" style="background-color: yellow">Registrasi</th>
			<th colspan="3" style="background-color: red">Transportasi</th>
			<th colspan="3" style="background-color: pink">Akomodasi</th>
		</tr>
		<tr align="center">
			<th style="background-color: blue">Mulai</th>
			<th style="background-color: blue">Selesai</th>
			<th style="background-color: orange">Nama</th>
			<th style="background-color: orange">NIK</th>
			<th style="background-color: orange">Email</th>
			<th style="background-color: yellow">Ceklis</th>
			<th style="background-color: yellow">Biaya</th>
			<th style="background-color: yellow">Bukti Pembayaran</th>
			<th style="background-color: red">Jenis</th>
			<th style="background-color: red">Biaya</th>
			<th style="background-color: red">Bukti Pembayaran</th>
			<th style="background-color: pink">Nama Penginapan/Hotel</th>
			<th style="background-color: pink">Biaya</th>
			<th style="background-color: pink">Bukti Pembayaran</th>
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