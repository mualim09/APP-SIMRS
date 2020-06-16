<?php
// The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");
date_default_timezone_set("Asia/Bangkok");
$datenow = date('d-m-Y h-i-s');

// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=Kontak-Telepon-$datenow.xls");

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
<div>
	<h1>KONTAK TELEPON</h1>
</div>
<table id="example1" border="2px" class="table table-striped">
	<thead>
		<tr align="center">
			<th>Nama</th>
			<th>Telepon</th>
			<th>Fax</th>
			<th>Email</th>
			<th>Alamat</th>
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
		$result = mysqli_query($con,"SELECT * FROM tb_client ORDER BY id_client DESC");

		$no=0;
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_array($result))
			{
				$no++;
				echo "<tr>";
				if ($row['nama']==NULL){
					echo "<td>empty</td>";
				}else{
					echo "<td>".$row['nama'] . "</td>";
				}
				if ($row['telepon']==NULL){
					echo "<td>empty</td>";
				}else{
					echo "<td>".$row['telepon'] . "</td>";
				}
				if ($row['fax']==NULL){
					echo "<td>empty</td>";
				}else{
					echo "<td>".$row['fax'] . "</td>";
				}
				if ($row['email']==NULL){
					echo "<td>empty</td>";
				}else{
					echo "<td>".$row['email'] . "</td>";
				}
				if ($row['alamat']==NULL){
					echo "<td>empty</td>";
				}else{
					echo "<td>".$row['alamat'] . "</td>";
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
			<th>Nama</th>
			<th>Telepon</th>
			<th>Fax</th>
			<th>Email</th>
			<th>Alamat</th>
		</tr>
	</tfoot>
</table>