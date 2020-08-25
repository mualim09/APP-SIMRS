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
							<h2 class="pageheader-title">Struktur Menu Page</h2>
							<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
							<div class="page-breadcrumb">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Struktur Menu Page</li>
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
								<label class="modal-title">Tambah Struktur Menu</label>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="row">	
										<div class="col-sm-12">
											<div class="form-group">
												<label>Menu<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="menu" placeholder="Menu...">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>URL<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="url" placeholder="URL...">
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
								<button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Agenda Rapat"><i class="nav-icon far fa-plus-square"></i> Tambah Menu
								</button>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<th>ID</th>
												<th>Menu</th>
												<th>URL</th>
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
											$result = mysqli_query($con,"SELECT * FROM tb_menu ORDER BY id DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<tr>";
													echo "<td>".$row['id'] . "</td>";
													echo "<td>".$row['menu'] . "</td>";
													echo "<td>".$row['url'] . "</td>";
													echo "<td width='100px'>
													<a href='#' data-toggle='modal' data-target='#edit$row[id]' title='Edit'><span class='badge badge-success'><i class='fa fa-edit'></i> </span></a>
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
																<form action="" method="POST">
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-sm-12">
																				<div class="form-group">
																					<label>ID</label>
																					<input type="text" class="form-control" name="id" value="<?php echo $row['id']; ?>">
																				</div>
																			</div>
																			<div class="col-sm-12">
																				<div class="form-group">
																					<label>Menu</label>
																					<input type="text" class="form-control" name="menu" placeholder="Menu..." value="<?php echo $row['menu']; ?>">
																				</div>
																			</div>
																			<div class="col-sm-12">
																				<div class="form-group">
																					<label>URL</label>
																					<input type="text" class="form-control" name="url" placeholder="URL..." value="<?php echo $row['url']; ?>">
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
																	<form method="post" action="">
																		<div class="form-group">
																			<label>Hapus Menu?</label>
																			<h6>ID : <b><u><?php echo $row['id'];?></u></b></h6>
																			<h6>Menu : <b><u><?php echo $row['menu'];?></u></b></h6>
																			<h6>URL : <b><u><?php echo $row['url'];?></u></b></h6>
																			<input type="hidden" name="id" class="form-control" value="<?php echo $row['id'];?>" required>
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