<!DOCTYPE html>
<html lang="en">
<?php include 'include/head.php'; ?>
<body>
	<!-- Preloader Start -->
	<div id="preloader">
		<div class="yummy-load"></div>
	</div>
	<!-- Background Pattern Swither -->
	<a href="http://192.168.55.164/sirsadm/ext-view-all.php" target="_blank">
		<div id="pattern-switcher">
			<i class="fa fa-user"></i> Ext. Telepon
		</div>
	</a>
	<div id="patter-close">
		<i class="fa fa-times" aria-hidden="true"></i>
	</div>
	<!-- ****** Top Header Area Start ****** -->
	<?php 
	include 'include/header.php'; 
	?>
	<!-- ****** Top Header Area End ****** -->
	<!-- ****** Welcome Post Area Start ****** -->
	<?php
	// include 'include/banner.php';
	?>
	<!-- ****** Welcome Area End ****** -->
	<!-- ****** Categories Area Start ****** -->
	<section class="categories_area clearfix" id="about">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-4">
					<div class="single_catagory wow fadeInUp" data-wow-delay=".3s">
						<div align="center">
							<h6><u>Panduan Aplikasi ITicket</u></h6>
						</div>
						<img src="assets/buletin/cover/Picture1.png" alt="">
						<div class="catagory-title">
							<!-- <a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/rskgcare/assets/buletin/BuletinVIII30June.pdf" target="_blank"> -->
							<a href="http://192.168.55.164/assets/panduan/panduan_aplikasi_iticket.pdf" target="_blank">
								<h5>Lihat</h5>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php 
	include 'include/footer.php'; 
	?>
	<?php include 'include/jsfile.php'; ?>
</body>
</html>
