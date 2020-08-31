<?php 

$ntf	= $_GET['ntf'];

// CODE 1 : FOR SUCCESS PROCESS RECORD
if ($ntf == 1) {
	?>
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-ok-circle"></i> Create Process!</h4>
		<p>Your data has been created!</p>
	</div>
	<?php
// CODE 2 : FOR DUPLICATE RECORD
} elseif ($ntf == 2) {
	?>
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-ban-circle"></i> Record Duplicate!</h4>
		<p>Check your data or contact your administrator!</p>
	</div>
	<?php
// CODE 3 : FOR FAILED PROCESS RECORD	
} elseif ($ntf == 3) {
	?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-remove-sign"></i> Data has been deleted!</h4>
	</div>
	<?php
// CODE 4 : RECORD HAS BEEN UPDATED
} elseif ($ntf == 4) {
	?>
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="glyphicon glyphicon-ok-circle"></i> Data has been updated!</h4>
	</div>
	<?php
}
?>