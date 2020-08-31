<?php 
$hasil_review 		= $_POST['hasil_review'];
$option 			= $_POST['option'];
$rekomendasi 		= $_POST['rekomendasi'];
$tanggapan 			= $_POST['tanggapan'];
$target_date 		= $_POST['target_date'];
$group 				= $_POST['group'];
$log_id 			= $_POST['log_id'];

$query = mysql_query("INSERT into tb_result_dua values('','','$log_id','$hasil_review','$option','$rekomendasi','$tanggapan','$target_date','','$group')");

if ($query) {
	header("Location: ./mdr_working_paper.php?ntf=1");
} else {
	echo "Error";
}

?>