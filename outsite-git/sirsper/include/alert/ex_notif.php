<?php 

$ntf	= $_GET['ntf'];

if ($ntf == 1) {
	?>
	<!-- CODE 1 : FOR SUCCESS PROCESS RECORD -->
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-ok-sign"></i> Record Submitted!</h4>		
	</div>
	<?php
} elseif ($ntf == 2) {
	?>
	<!-- CODE 2 : FOR DUPLICATE RECORD -->
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-warning"></i> Record Duplicate!</h4>
		Please contact your administrator
	</div>
	<?php	
} elseif ($ntf == 3) {
	?>
	<!-- CODE 3 : FOR FAILED PROCESS RECORD -->
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-remove-circle"></i> Process Failed!</h4>
		Please contact your administrator
	</div>
	<?php
} elseif ($ntf == 4) {
	?>
	<!-- CSV Bidang Usaha has been Uploaded! -->
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-exclamation-sign"></i> CSV Bidang Usaha has been Uploaded!</h4>
		Check Detail data on <a href="mdr_eam_log.php?ntf=0"> EAM Tools</a>
	</div>
	<?php
}elseif ($ntf == 5) {
	?>
	<!-- CSV LogBook has been Uploaded! -->
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-exclamation-sign"></i> CSV LogBook has been Uploaded!</h4>
		Check Detail data on <a href="mdr_eam_log.php?ntf=0"> EAM Tools</a>
	</div>
	<?php
}elseif ($ntf == 6) {
	?>
	<!-- CSV Watchlist Berhasil di Upload! -->
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-exclamation-sign"></i> CSV Watchlist has been Uploaded!</h4>
		Check Detail data on <a href="mdr_eam_log.php?ntf=0"> EAM Tools</a>	
	</div>
	<?php
}elseif ($ntf == 7) {
	?>
	<!-- CSV Sector Usaha has been Uploaded! -->
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-exclamation-sign"></i> CSV Sector Usaha has been Uploaded!</h4>
		Check Detail data on <a href="mdr_eam_log.php?ntf=0"> EAM Tools</a>	
	</div>
	<?php
}elseif ($ntf == 8) {
	?>
	<!-- CSV IC Criteria has been Uploaded! -->
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-exclamation-sign"></i> CSV IC Criteria has been Uploaded!</h4>
		Check Detail data on <a href="mdr_eam_log.php?ntf=0"> EAM Tools</a>	
	</div>
	<?php
}elseif ($ntf == 9) {
	?>
	<!-- CSV Yoyo has been Uploaded! -->
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-exclamation-sign"></i> CSV Yoyo has been Uploaded!</h4>
		Check Detail data on <a href="mdr_eam_log.php?ntf=0"> EAM Tools</a>	
	</div>
	<?php
}elseif ($ntf == 98) {
	?>
	<!-- Informasi Umum -->
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-ok-sign"></i> Informasi Umum NAK has been updated!</h4>		
	</div>
	<?php
}elseif ($ntf == 99) {
	?>
	<!-- Informasi Umum -->
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-ok-sign"></i> Informasi Umum Kualitas Kredit has been updated!</h4>		
	</div>
	<?php
}elseif ($ntf == 100) {
	?>
	<!-- Data updated -->
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-ok-sign"></i> Data has been updated!</h4>		
	</div>
	<?php
}elseif ($ntf == 101) {
	?>
	<!-- Moved Tindak Lanjut -->
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-resize-full"></i> Data has been moved to DMHR!</h4>		
	</div>
	<?php
}
?>