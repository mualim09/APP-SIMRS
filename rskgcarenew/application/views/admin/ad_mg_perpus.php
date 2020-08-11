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

	.iklan {
            width: 100%;
            height: auto;
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
							<h2 class="pageheader-title">Perpustakaan Page</h2>
							<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
							<div class="page-breadcrumb">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Per-Sidebar</a></li>
										<li class="breadcrumb-item active" aria-current="page">Perpustakaan Page</li>
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
								<label class="modal-title">Tambah Buku Perpustakaan</label>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" action="<?php echo base_url() ?>index.php/AdminManagePerpus/create" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Cover<font style="color: red">*</font></label>
												<input type="file" class="form-control" name="cover" required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>File/Dokumen/Buku<font style="color: red">*</font></label>
												<input type="file" class="form-control" name="dokumen" required="required">
											</div>
										</div>	
										<div class="col-sm-12">
											<div class="form-group">
												<label>Judul File/Dokumen/Buku<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="judul" placeholder="Judul File/Dokumen/Buku..." required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>Kategori<font style="color: red">*</font></label>
												<select class="form-control" name="kategori" required="required">
													<option value="">-- Pilih Kategori --</option>
													<option value="UU Kesehatan">UU Kesehatan</option>
													<option value="Permenkes">Permenkes</option>
													<option value="Penelitian">Penelitian</option>
													<option value="Biografi">Biografi</option>
													<option value="Novel">Novel</option>
												</select>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>Tahun Terbit<font style="color: red">*</font></label>
												<select name="tahun" class="form-control" id="year">
													<option value>-- Pilih Tahun --</option>
													<?php for ($i=1980; $i < 2021; $i++) { ?>
														<option value="<?= $i ?>" <?= !empty($year_) && $year_ == $i ? 'selected' : '' ?>><?= $i ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>Penulis<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="penulis" placeholder="Penulis..." required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>Penerbit<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="penerbit" placeholder="Penerbit..." required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>Deskripsi<font style="color: red">*</font></label>
												<textarea type="text" class="form-control" name="deskripsi" placeholder="Deskripsi..." required="required"></textarea>
												<input type="hidden" class="form-control" name="status_perpus" value="Show">
												<input type="hidden" class="form-control" name="date_perpus" value="<?php echo date('Y-m-d') ?>">
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
								<button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Agenda Rapat"><i class="nav-icon far fa-plus-square"></i> Tambah Data Perpustkaan
								</button>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<!-- <th>ID</th> -->
												<th>Cover</th>
												<th>Judul</th>
												<th>File/Dokumen/Buku</th>
												<th>Lihat Detail</th>
												<!-- <th>Kategori</th> -->
												<!-- <th>Tahun</th>
												<th>Penulis</th>
												<th>Penerbit</th>
												<th>Deskripsi</th> -->
												<th>Status Tampilan</th>
												<th>Upload</th>
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
											$result = mysqli_query($con,"SELECT * FROM tb_perpustakaan ORDER BY id DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<tr>";
													// echo "<td>".$row['id'] . "</td>";
													?>	
													<?php
													if ($row['cover']==NULL) {
														?>
														<td align="center">
															<img src="<?php echo base_url('assets/images/perpus/image_12.jpg')?>" class="lingkaran1">
														</td>
														<?php
													}else{
														?>
														<td align="center">
															<img src="<?php echo base_url('assets/images/perpus/'.$row['cover'])?>" class="lingkaran1">
														</td>
														<?php
													}
													?>
													<?php
													echo "<td>".$row['judul'] . "</td>";
													if ($row['dokumen']==NULL){
														echo "<td>empty</td>";
													}else{
														echo "<td align='center'>
														<a href='./assets/images/perpus/$row[dokumen]' target='_blank'>
														<button class='btn btn-dark' title='Download File/Dokumen/Buku'><i class='fa fas fa-download'></i></button>
														</a>
														</td>";
													}
													echo "<td align='center'>
													<a href='#' data-toggle='modal' data-target='#lihatdetail$row[id]' title='Lihat Detail Dokumen'><button class='btn btn-dark'>Lihat</button></a>
													</td>";
													// echo "<td>".$row['kategori'] . "</td>";
													// echo "<td>".$row['tahun'] . "</td>";
													// echo "<td>".$row['penulis'] . "</td>";
													// echo "<td>".$row['penerbit'] . "</td>";
													// echo "<td>".$row['deskripsi'] . "</td>";
													echo "<td>".$row['status_perpus'] . "</td>";
													echo "<td>".$row['date_perpus'] . "</td>";
													echo "<td width='150px'>
													<a href='#' data-toggle='modal' data-target='#edit$row[id]' title='Edit'><span class='badge badge-success'><i class='fa fa-edit'></i> </span></a>
													<a href='#' data-toggle='modal' data-target='#addcover$row[id]' title='Ubah Cover'><span class='badge badge-dark'><i class='fa fas fa-images'></i> </span></a>
													<a href='#' data-toggle='modal' data-target='#addfile$row[id]' title='Ubah File/Dokumen/Buku'><span class='badge badge-dark'><i class='fa fas fa-file'></i> </span></a>
													<a href='#' data-toggle='modal' data-target='#delete$row[id]' title='Delete'><span class='badge badge-danger'><i class='fas fa-times'></i> </span></a>
													</td>";
													echo "</tr>";
													?>

										<!-- DETAIL -->
										<div class="modal fade" id="lihatdetail<?php echo $row['id'];?>" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<label class="modal-title">Detail Data Perpustakaan File/Dokumen/Buku</label>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-group">
															<div align="center">
																<?php
																if ($row['cover']==NULL) { ?>
																	<label>Tidak ada cover</label>   
																<?php }else{ ?>
																	<img src="<?php echo base_url().'assets/images/perpus/'. $row['cover'];?>" class="iklan" alt="User profile picture">   
																<?php } ?>
															</div>
															<br>
															<hr>
															<h6>File/Dokumen/Buku : </h6><br>
															<?php 
															if ($row['dokumen']==NULL){
																echo "<div>empty</div>";
															}else{
																echo "<div align='center'>
																<a href='./assets/images/perpus/$row[dokumen]' target='_blank'>
																<button class='btn btn-dark' title='Download File/Dokumen/Buku'><i class='fa fas fa-download'></i></button>
																</a>
																</div>";
															}
															?>
															<h6>ID : <b><u><?php echo $row['id'];?></u></b></h6>
															<h6>Judul : <b><u><?php echo $row['judul'];?></u></b></h6>
															<h6>Kategori : <b><u><?php echo $row['kategori'];?></u></b></h6>
															<h6>Tahun Terbit : <b><u><?php echo $row['tahun'];?></u></b></h6>
															<h6>Penerbit : <b><u><?php echo $row['penerbit'];?></u></b></h6>
															<h6>Deskripsi : <br>
																<b><u><?php echo $row['deskripsi'];?></u></b>
															</h6>
															<h6>Status Akses : <b><u><?php echo $row['status_perpus'];?></u></b></h6>
															<h6>Date Upload : <b><u><?php echo $row['date_perpus'];?></u></b></h6>
															<br>
															<hr>
														</div>
														<button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END DETAIL -->

										<!-- UPDATE -->
										<div class="modal fade" id="edit<?php echo $row['id'];?>" role="dialog">
											<div class="modal-dialog modal-xl">
												<div class="modal-content">
													<div class="modal-header">
														<label class="modal-title">Update Perpustakaan</label>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<?php echo form_open_multipart(site_url('AdminManageAplikasi/update/'.$row['id'])); ?>
													<div class="modal-body">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group">
																	<label>Judul File/Dokumen/Buku<font style="color: red">*</font></label>
																	<input type="text" class="form-control" name="judul" placeholder="Judul File/Dokumen/Buku..." value="<?php echo $row['judul']; ?>">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<label>Kategori<font style="color: red">*</font></label>
																	<select class="form-control" name="kategori" required="required">
																		<option value="<?php echo $row['kategori']; ?>"><?php echo $row['kategori']; ?></option>
																		<option value="">-- Pilih Kategori --</option>
																		<option value="UU Kesehatan">UU Kesehatan</option>
																		<option value="Permenkes">Permenkes</option>
																		<option value="Penelitian">Penelitian</option>
																		<option value="Biografi">Biografi</option>
																		<option value="Novel">Novel</option>
																	</select>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<label>Tahun Terbit<font style="color: red">*</font></label>
																	<select name="tahun" class="form-control" id="year">
																		<option value="<?php echo $row['tahun']; ?>"><?php echo $row['tahun']; ?></option>
																		<option value="">-- Pilih Tahun --</option>
																		<?php for ($i=1980; $i < 2021; $i++) { ?>
																			<option value="<?= $i ?>" <?= !empty($year_) && $year_ == $i ? 'selected' : '' ?>><?= $i ?></option>
																		<?php } ?>
																	</select>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<label>Penulis<font style="color: red">*</font></label>
																	<input type="text" class="form-control" name="penulis" placeholder="Penulis..." value="<?php echo $row['penulis']; ?>">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<label>Penerbit<font style="color: red">*</font></label>
																	<input type="text" class="form-control" name="penerbit" placeholder="Penerbit..." value="<?php echo $row['penerbit']; ?>">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<label>Deskripsi<font style="color: red">*</font></label>
																	<textarea type="text" class="form-control" name="deskripsi" placeholder="Deskripsi..."><?php echo $row['deskripsi']; ?></textarea>
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
										<div class="modal fade" id="addcover<?php echo $row['id'];?>" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<label class="modal-title">Ganti Cover</label>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													<?php echo form_open_multipart(site_url('AdminManagePerpus/updatecover/'.$row['id']));?>
														<div class="form-group">
															<div align="center">
																<?php
																if ($row['cover']==NULL) { ?>
																	<label>Tidak ada cover</label>   
																<?php }else{ ?>
																	<img src="<?php echo base_url().'assets/images/perpus/'. $row['cover'];?>" class="iklan" alt="User profile picture">   
																<?php } ?>
															</div>
															<br>
															<hr>
															<h6>File/Dokumen/Buku : </h6><br>
															<?php 
															if ($row['dokumen']==NULL){
																echo "<div>empty</div>";
															}else{
																echo "<div align='center'>
																<a href='./assets/images/perpus/$row[dokumen]' target='_blank'>
																<button class='btn btn-dark' title='Download File/Dokumen/Buku'><i class='fa fas fa-download'></i></button>
																</a>
																</div>";
															}
															?>
															<h6>ID : <b><u><?php echo $row['id'];?></u></b></h6>
															<h6>Judul : <b><u><?php echo $row['judul'];?></u></b></h6>
															<h6>Kategori : <b><u><?php echo $row['kategori'];?></u></b></h6>
															<h6>Tahun Terbit : <b><u><?php echo $row['tahun'];?></u></b></h6>
															<h6>Penerbit : <b><u><?php echo $row['penerbit'];?></u></b></h6>
															<h6>Deskripsi : <br>
																<b><u><?php echo $row['deskripsi'];?></u></b>
															</h6>
															<h6>Status Akses : <b><u><?php echo $row['status_perpus'];?></u></b></h6>
															<h6>Date Upload : <b><u><?php echo $row['date_perpus'];?></u></b></h6>
															<br>
															<hr>
															<p align="center">Silahkan masukkan cover dibawah ini:</p>
															<input type="file" name="cover" class="form-control" required>
														</div>
														<button type="submit" name="updatecover" class="btn btn-danger btn-block btn-flat">Upload</button>
														<button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Close</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- END COVER -->

										<!-- BUKU -->
										<div class="modal fade" id="addfile<?php echo $row['id'];?>" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<label class="modal-title">Ganti File/Dokumen/Buku</label>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													<?php echo form_open_multipart(site_url('AdminManagePerpus/updatebuku/'.$row['id']));?>
														<div class="form-group">
															<div align="center">
																<?php
																if ($row['cover']==NULL) { ?>
																	<label>Tidak ada cover</label>   
																<?php }else{ ?>
																	<img src="<?php echo base_url().'assets/images/perpus/'. $row['cover'];?>" class="iklan" alt="User profile picture">   
																<?php } ?>
															</div>
															<br>
															<hr>
															<h6>File/Dokumen/Buku : </h6><br>
															<?php 
															if ($row['dokumen']==NULL){
																echo "<div>empty</div>";
															}else{
																echo "<div align='center'>
																<a href='./assets/images/perpus/$row[dokumen]' target='_blank'>
																<button class='btn btn-dark' title='Download File/Dokumen/Buku'><i class='fa fas fa-download'></i></button>
																</a>
																</div>";
															}
															?>
															<h6>ID : <b><u><?php echo $row['id'];?></u></b></h6>
															<h6>Judul : <b><u><?php echo $row['judul'];?></u></b></h6>
															<h6>Kategori : <b><u><?php echo $row['kategori'];?></u></b></h6>
															<h6>Tahun Terbit : <b><u><?php echo $row['tahun'];?></u></b></h6>
															<h6>Penerbit : <b><u><?php echo $row['penerbit'];?></u></b></h6>
															<h6>Deskripsi : <br>
																<b><u><?php echo $row['deskripsi'];?></u></b>
															</h6>
															<h6>Status Akses : <b><u><?php echo $row['status_perpus'];?></u></b></h6>
															<h6>Date Upload : <b><u><?php echo $row['date_perpus'];?></u></b></h6>
															<br>
															<hr>
															<p align="center">Silahkan masukkan File/Dokumen/Buku dibawah ini:</p>
															<input type="file" name="dokumen" class="form-control" required>
														</div>
														<button type="submit" name="updatebuku" class="btn btn-danger btn-block btn-flat">Upload</button>
														<button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Close</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- END BUKU -->

										<!-- DELETE -->
										<div class="modal fade" id="delete<?php echo $row['id'];?>" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<label class="modal-title">Hapus File/Dokumen/Buku</label>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													<?php echo form_open_multipart(site_url('AdminManagePerpus/delete/'.$row['id'])); ?>
														<div class="form-group">
															<div align="center">
																<?php
																if ($row['cover']==NULL) { ?>
																	<label>Tidak ada cover</label>   
																<?php }else{ ?>
																	<img src="<?php echo base_url().'assets/images/perpus/'. $row['cover'];?>" class="iklan" alt="User profile picture">   
																<?php } ?>
															</div>
															<br>
															<hr>
															<h6>File/Dokumen/Buku : </h6><br>
															<?php 
															if ($row['dokumen']==NULL){
																echo "<div>empty</div>";
															}else{
																echo "<div align='center'>
																<a href='./assets/images/perpus/$row[dokumen]' target='_blank'>
																<button class='btn btn-dark' title='Download File/Dokumen/Buku'><i class='fa fas fa-download'></i></button>
																</a>
																</div>";
															}
															?>
															<h6>ID : <b><u><?php echo $row['id'];?></u></b></h6>
															<h6>Judul : <b><u><?php echo $row['judul'];?></u></b></h6>
															<h6>Kategori : <b><u><?php echo $row['kategori'];?></u></b></h6>
															<h6>Tahun Terbit : <b><u><?php echo $row['tahun'];?></u></b></h6>
															<h6>Penerbit : <b><u><?php echo $row['penerbit'];?></u></b></h6>
															<h6>Deskripsi : <br>
																<b><u><?php echo $row['deskripsi'];?></u></b>
															</h6>
															<h6>Status Akses : <b><u><?php echo $row['status_perpus'];?></u></b></h6>
															<h6>Date Upload : <b><u><?php echo $row['date_perpus'];?></u></b></h6>
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

				<!-- //////////////////////////////////TB KATEGORI PERPUS//////////////////////////////////////////////// -->

				<!-- MODAL ADD -->
				<div class="modal fade" id="modal-addperpus">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<label class="modal-title">Tambah Kategori Perpustakaan</label>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" action="<?php echo base_url() ?>index.php/AdminManagePerpus/createkat" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Kategori<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="kategori" placeholder="Kategori..." required="required">
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
								<button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-addperpus" title="Tambah Kategori Perpus"><i class="nav-icon far fa-plus-square"></i> Tambah Kategori Perpus
								</button>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr>
												<th>ID</th>
												<th>Kategori</th>
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
											$result = mysqli_query($con,"SELECT * FROM tb_katperpus ORDER BY id DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<tr>";
													echo "<td>".$row['id'] . "</td>";
													echo "<td>".$row['kategori'] . "</td>";
													echo "<td width='150px'>
													<a href='#' data-toggle='modal' data-target='#editkat$row[id]' title='Edit'><span class='badge badge-success'><i class='fa fa-edit'></i> </span></a>
													<a href='#' data-toggle='modal' data-target='#deletekat$row[id]' title='Delete'><span class='badge badge-danger'><i class='fas fa-times'></i> </span></a>
													</td>";
													echo "</tr>";
													?>


										<!-- UPDATE -->
										<div class="modal fade" id="editkat<?php echo $row['id'];?>" role="dialog">
											<div class="modal-dialog modal-xl">
												<div class="modal-content">
													<div class="modal-header">
														<label class="modal-title">Update Perpustakaan</label>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<?php echo form_open_multipart(site_url('AdminManageAplikasi/updatekategori/'.$row['id'])); ?>
													<div class="modal-body">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group">
																	<label>Kategori<font style="color: red">*</font></label>
																	<input type="text" class="form-control" name="kategori" placeholder="Kategori..." value="<?php echo $row['kategori']; ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<button type="submit" name="updatekategori" class="btn btn-block btn-primary">Submit</button>
															<button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
														</div>
													</div>
													</form>
												</div>
											</div>
										</div>
										<!-- END UPDATE -->

										<!-- DELETE -->
										<div class="modal fade" id="deletekat<?php echo $row['id'];?>" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<label class="modal-title">Hapus Kategori</label>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													<?php echo form_open_multipart(site_url('AdminManagePerpus/deletekategori/'.$row['id'])); ?>
														<div class="form-group">
															<h6>ID : <b><u><?php echo $row['id'];?></u></b></h6>
															<h6>Kategori : <b><u><?php echo $row['kategori'];?></u></b></h6>
															<br>
															<hr>
														</div>
														<button type="submit" name="deletekategori" class="btn btn-danger btn-block btn-flat">Yes</button>
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
				<!-- ////////////////////////////////////END KATEGORI PERPUS/////////////////////////////////////////////// -->
			</div>
		</div>
	</div>
</div>
</div>
</div>
</body>
</html>