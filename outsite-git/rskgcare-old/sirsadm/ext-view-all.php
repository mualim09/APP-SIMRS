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
<?php include 'include/header.php'; ?>
<body>
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">View Extention RSKG</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">View Extention RSKG</a></li>
								<li class="breadcrumb-item active">SIRS ADM</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!-- ISI -->
			<section class="content">
				<div class="container-fluid">
					<!-- DATA -->
					<div class="row">
						<div align="center" class="col-sm-4">
							<!-- Direksi -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">Direksi</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='Direksi' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>

						<div align="center" class="col-sm-4">
							<!-- SDM -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">SDM</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='SDM' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>

						<div align="center" class="col-sm-4">
							<!-- Farmasi -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">Farmasi</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='Farmasi' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>
					</div>

					<div class="row">
						<div align="center" class="col-sm-4">
							<!-- Dokter -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">Dokter</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='Dokter' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>

						<div align="center" class="col-sm-4">
							<!-- ADM, SDM, KEU -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">ADM,SDM,KEU</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='ADM,SDM,KEU' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>

						<div align="center" class="col-sm-4">
							<!-- Rumah Tangga -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">Rumah Tangga</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='Rumah Tangga' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>
					</div>

					<div class="row">
						<div align="center" class="col-sm-4">
							<!-- Dokter & Perawat -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">Dokter & Perawat</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='Dokter & Perawat' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>

						<div align="center" class="col-sm-4">
							<!-- Rekam Medis & Gizi -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">Rekam Medis & Gizi</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='Rekam Medis & Gizi' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>

						<div align="center" class="col-sm-4">
							<!-- Keuangan -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">Keuangan</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='Keuangan' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>
					</div>

					<div class="row">
						<div align="center" class="col-sm-4">
							<!-- IPSRS -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">IPSRS</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='IPSRS' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>

						<div align="center" class="col-sm-4">
							<!-- Radiologi -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">Radiologi</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='Radiologi' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>

						<div align="center" class="col-sm-4">
							<!-- Re-Use -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">Re-Use</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='Re-Use' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>
					</div>

					<div class="row">
						<div align="center" class="col-sm-4">
							<!-- Diklat -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">Diklat</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='Diklat' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>

						<div align="center" class="col-sm-4">
							<!-- Ruang JKN -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">Ruang JKN</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='Ruang JKN' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>

						<div align="center" class="col-sm-4">
							<!-- P.O.S & LINEN -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">P.O.S & LINEN</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='P.O.S & LINEN' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>
					</div>

					<div class="row">
						<div align="center" class="col-sm-4">
							<!-- POLI -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">POLI</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='POLI' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>

						<div align="center" class="col-sm-4">
							<!-- Sosial & Pengadaan -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">Sosial & Pengadaan</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='Sosial & Pengadaan' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>

						<div align="center" class="col-sm-4">
							<!-- Ruang Rapat -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">Ruang Rapat</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='Ruang Rapat' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
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
					</div>

					<div class="row">
						<div align="center" class="col-sm-12">
							<!-- Laboratorium -->
							<table class="table table-striped">
								<thead>
									<tr align="center" style="background-color: yellow">
										<th colspan="3">Laboratoium</th>
									</tr>
									<tr>
										<th>Ruangan</th>
										<th>Nama</th>
										<th>No. Extention</th>
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
									$result = mysqli_query($con,"SELECT * FROM tb_extention WHERE ruangan='Laboratoium' ORDER BY id_ext DESC");

									$no=0;
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result))
										{
											$no++;
											echo "<tr>";
											if ($row['ruangan']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['ruangan'] . "</td>";
											}
											if ($row['nama']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nama'] . "</td>";
											}
											if ($row['nomor']==NULL){
												echo "<td>empty</td>";
											}else{
												echo "<td>".$row['nomor'] . "</td>";
											}
											echo "</tr>";
											?>


											<?php
										}
									}mysqli_close($con);
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div align="left">
						<font><i>NB: update <?php echo date('F-Y'); ?></i></font>
					</div>
				</div>
			</section>
			<!-- END ISI -->
	<?php include 'include/jsfile.php'; ?>
</body>
</html>