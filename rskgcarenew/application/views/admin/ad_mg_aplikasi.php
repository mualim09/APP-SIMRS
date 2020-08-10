<?php 
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
<!doctype html>
<html lang="en">
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
			<?php require ('include/header.php'); ?>
		</div>
		<?php require ('include/sidebar.php'); ?>
		<div class="dashboard-wrapper">
			<div class="container-fluid  dashboard-content">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="page-header">
							<h2 class="pageheader-title">Aplikasi Page</h2>
							<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
							<div class="page-breadcrumb">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Aplikasi Page</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<!-- MODAL ADD -->
				<div class="modal fade" id="modal-add">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<label class="modal-title">Tambah Aplikasi</label>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" action="<?php echo base_url() ?>index.php/AdminManageAplikasi/create" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Cover</label>
												<input type="file" class="form-control" name="cover" placeholder="Menu..." required="required">
											</div>
										</div>	
										<div class="col-sm-12">
											<div class="form-group">
												<label>Nama Aplikasi</label>
												<input type="text" class="form-control" name="nama_app" placeholder="Nama Aplikasi..." required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>Status Akses</label>
												<input type="text" class="form-control" name="status_akses" placeholder="Akses Ex:BPJS..." required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>URL</label>
												<input type="text" class="form-control" name="url" placeholder="URL..." required="required">
												<input type="hidden" class="form-control" name="status_tampilan" value="Show">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
										<button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- END MODAL ADD -->
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-header">
								<button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Agenda Rapat"><i class="nav-icon far fa-plus-square"></i> Tambah Aplikasi
								</button>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<th>ID</th>
												<th>Cover</th>
												<th>Nama Aplikasi</th>
												<th>Status Akses</th>
												<th>URL</th>
												<th>Status Tampilan</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$con=mysqli_connect("localhost","root","","rskg_care");
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to MySQL: " . mysqli_connect_error();
											}
											$result = mysqli_query($con,"SELECT * FROM tb_aplikasi ORDER BY id DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<tr>";
													echo "<td>".$row['id'] . "</td>";
													?>	
													<?php
													if ($row['cover']==NULL) {
														?>
														<td align="center">
															<img src="<?php echo base_url('assets/images/bgcover/image_12.jpg')?>" class="lingkaran1">
														</td>
														<?php
													}else{
														?>
														<td align="center">
															<img src="<?php echo base_url('assets/images/bgcover/'.$row['cover'])?>" class="lingkaran1">
														</td>
														<?php
													}
													?>
													<?php
													echo "<td>".$row['nama_app'] . "</td>";
													echo "<td>".$row['status_akses'] . "</td>";
													echo "<td>".$row['url'] . "</td>";
													echo "<td>".$row['status_tampilan'] . "</td>";
													echo "<td width='100px'>
														<a href='#' data-toggle='modal' data-target='#edit$row[id]' title='Edit'><span class='badge badge-success'><i class='fa fa-edit'></i> </span></a>
														<a href='#' data-toggle='modal' data-target='#addfile$row[id]' title='Ubah Gambar'><span class='badge badge-dark'><i class='fa fas fa-images'></i> </span></a>
														<a href='#' data-toggle='modal' data-target='#delete$row[id]' title='Delete'><span class='badge badge-danger'><i class='fas fa-times'></i> </span></a>
													</td>";
												echo "</tr>";
												?>
												<!-- UPDATE -->
												<div class="modal fade" id="edit<?php echo $row['id'];?>" role="dialog">
													<div class="modal-dialog modal-xl">
														<div class="modal-content">
															<div class="modal-header">
																<label class="modal-title">Update Menu</label>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<?php echo form_open_multipart(site_url('AdminManageAplikasi/update/'.$row['id'])); ?>
																<div class="modal-body">
																	<div class="row">	
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>Nama Aplikasi</label>
																				<input type="text" class="form-control" name="nama_app" placeholder="Nama Aplikasi..." value="<?php echo $row['nama_app']; ?>">
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>Status Akses</label>
																				<input type="text" class="form-control" name="status_akses" placeholder="Akses Ex:BPJS..." value="<?php echo $row['status_akses']; ?>">
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>URL</label>
																				<input type="text" class="form-control" name="url" placeholder="URL..." value="<?php echo $row['url']; ?>">
																				<input type="hidden" class="form-control" name="status_tampilan" value="Show">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-sm-12">
																	<div class="form-group">
																		<button type="submit" name="update" class="btn btn-block btn-primary">Submit</button>
																		<button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
												<!-- END UPDATE -->

												<!-- COVER -->
												<div class="modal fade" id="addfile<?php echo $row['id'];?>" role="dialog">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<label class="modal-title">Ganti Cover</label>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
															<?php echo form_open_multipart(site_url('AdminManageAplikasi/updatefotopj/'.$row['id']));?>
																	<div class="form-group">
																		<div align="center">
																		<?php
																		if ($row['cover']==NULL) { ?>
																			<img class="lingkaran3" src="<?php echo base_url('assets/images/bgcover/user2-160x160.jpg')?>" alt="User profile picture">   
																		<?php }else{ ?>
																			<img src="<?php echo base_url().'assets/images/bgcover/'. $row['cover'];?>" class="lingkaran3" alt="User profile picture">   
																		<?php } ?>
																		</div>
																		<br>
																		<hr>
																		<h6>ID : <b><u><?php echo $row['id'];?></u></b></h6>
																		<h6>Nama Aplikasi : <b><u><?php echo $row['nama_app'];?></u></b></h6>
																		<h6>Status Akses : <b><u><?php echo $row['status_akses'];?></u></b></h6>
																		<h6>URL : <b><u><?php echo $row['url'];?></u></b></h6>
																		<br>
																		<hr>
																		<p align="center">Silahkan masukkan cover dibawah ini:</p>
																		<input type="file" name="cover" class="form-control" required>
																	</div>
																	<button type="submit" name="updatefotopj" class="btn btn-danger btn-block btn-flat">Yes</button>
																	<button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
																</form>
															</div>
														</div>
													</div>
												</div>
												<!-- END COVER -->

												<!-- DELETE -->
												<div class="modal fade" id="delete<?php echo $row['id'];?>" role="dialog">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<label class="modal-title">Hapus Menu</label>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<?php echo form_open_multipart(site_url('AdminManageAplikasi/delete/'.$row['id'])); ?>
																	<div class="form-group">
																		<div align="center">
																		<?php
																		if ($row['cover']==NULL) { ?>
																			<img class="lingkaran3" src="<?php echo base_url('assets/images/bgcover/user2-160x160.jpg')?>" alt="User profile picture">   
																		<?php }else{ ?>
																			<img src="<?php echo base_url().'assets/images/bgcover/'. $row['cover'];?>" class="lingkaran3" alt="User profile picture">   
																		<?php } ?>
																		</div>
																		<br>
																		<hr>
																		<h6>ID : <b><u><?php echo $row['id'];?></u></b></h6>
																		<h6>Nama Aplikasi : <b><u><?php echo $row['nama_app'];?></u></b></h6>
																		<h6>Status Akses : <b><u><?php echo $row['status_akses'];?></u></b></h6>
																		<h6>URL : <b><u><?php echo $row['url'];?></u></b></h6>
																		<br>
																		<hr>
																	</div>
																	<button type="submit" name="delete" class="btn btn-danger btn-block btn-flat">Yes</button>
																	<button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
																</form>
															</div>
														</div>
													</div>
												</div>
												<!-- END DELETE -->
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
</body>
</html>