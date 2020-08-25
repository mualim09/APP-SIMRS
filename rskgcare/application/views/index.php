
<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require('include/head.php');?>
<body>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<?php require('include/sidebar.php');?>
		<div id="colorlib-main">
			<section class="ftco-section">
				<div class="container">
					<div class="row justify-content-center mb-5 pb-2">
						<div class="col-md-7 heading-section text-center ftco-animate">
							<div align="center">
								<img src="<?php echo base_url('assets/data/img/all-rs/rskgcare.png') ?>" width="300px">
							</div>
						</div>
					</div>
					<div align="center">
						<form method="get" action="" class="search-form">
							<div class="form-group">    
								<input type="text" name="cari" class="form-control" placeholder="Cari nama aplikasi disini...">
								<br>
								<button class="btn btn-dark btn-block" type="submit"> Klik disini</button>
							</div>
						</form>
					</div>
					<br>
					<hr>
					<div class="row">
						<?php
						$con=mysqli_connect("localhost","root","","rskg_care");
						if (mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
						if(isset($_GET['cari'])){
							$cari = $_GET['cari'];
							$data = mysqli_query($con,"SELECT * FROM tb_aplikasi WHERE nama_app LIKE '%".$cari."%'");				
						}else{
							$data = mysqli_query($con,"SELECT * FROM tb_aplikasi");		
						}
						$no = 1;
						while($row = mysqli_fetch_array($data)){
						?>
							<div class="col-md-4">
								<div class="blog-entry ftco-animate">
									<a href="#" class="img img-2" style="background-image: url(<?php echo base_url('assets/images/bgcover/'.$row['cover'])?>);"></a>
									<div class="text text-2 pt-2 mt-3">
										<span class="category mb-3 d-block"><a href="#"><?php echo $row['status_akses'] ?></a></span>
										<h3 class="mb-4"><a href="#"><?php echo $row['nama_app'] ?></a></h3>
										<a href="<?php echo $row['url']?>" target="_blank">
											<button class="btn btn-dark btn-block">
												<font style="color: #fff">Buka Aplikasi</font>
											</button>
										</a>
									</div>
								</div>
							</div>
						<?php } mysqli_close($con); ?>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?php require('include/thirdpart.php');?>
</body>
</html>