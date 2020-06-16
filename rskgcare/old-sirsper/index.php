<?php
include "include/connection.php";
include 'include/restrict.php';
?>
<html class="no-js" lang="">
<?php include 'include/head.php'; ?>
<body>
	<?php include 'include/header.php'; ?>
	<?php include 'include/sidebar.php'; ?>
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<?php include 'include/alert/success.php' ?>
			</div>
		</div>
	</div>
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-app"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Dashboard</h2>
										<p>PPI / Dashboard</p>
									</div>
								</div>
							</div>
							<!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
	<div class="notika-status-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
						<div class="website-traffic-ctn">
							<h2><span class="counter">50,000</span></h2>
							<p>Total Website Traffics</p>
						</div>
						<div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
						<div class="website-traffic-ctn">
							<h2><span class="counter">90,000</span>k</h2>
							<p>Website Impressions</p>
						</div>
						<div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
						<div class="website-traffic-ctn">
							<h2>$<span class="counter">40,000</span></h2>
							<p>Total Online Sales</p>
						</div>
						<div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
						<div class="website-traffic-ctn">
							<h2><span class="counter">1,000</span></h2>
							<p>Total Support Tickets</p>
						</div>
						<div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sale-statistic-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-8 col-sm-7 col-xs-12">
					<div class="sale-statistic-inner notika-shadow mg-tb-30">
						<div class="curved-inner-pro">
							<div class="curved-ctn">
								<h2>Sales Statistics</h2>
								<p>Vestibulum purus quam scelerisque, mollis nonummy metus</p>
							</div>
						</div>
						<div id="bar-chart" class="flot-chart bar-three bar-hm-three"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'include/footer.php'; ?>
	<?php include 'include/jsfile.php'; ?>
</body>
</html>