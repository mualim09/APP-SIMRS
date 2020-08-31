<?php 

if(isset($_POST["input_aspek_gr1"]))    
{    
	$hasil_review    	= $_POST['hasil_review'];
	$option          	= $_POST['option'];
	$rekomendasi    	= $_POST['rekomendasi'];
	$tanggapan      	= $_POST['tanggapan'];
	$target_date    	= $_POST['target_date'];
	$group           	= $_POST['group'];
	$log_id       		= $_POST['log_id'];
	$res_id       		= $_POST['res_id'];

	$periode_rs_year	= date('Y');
	$periode_rs_month	= date('m');
	$periode_rs 		= date('Y-m-d');

	$CBC_NAME 		= $_POST['CBC_NAME'];
	$Debitur 		= $_POST['Debitur'];

	$query = mysql_query("INSERT into tb_result_dua values('','$res_id','$log_id','$periode_rs_year','$periode_rs_month','$periode_rs','$hasil_review','$option','$rekomendasi','$tanggapan','$target_date','','$group','$CBC_NAME','$Debitur')");
	if ($query) {
		header("Location: ./mdr_working_paper.php?ntf=1");
	} else {
		echo "skflsdkjflksdjflkjsd".mysql_error();
	}
}

if(isset($_POST["input_aspek_gr2"]))    
{    
	$hasil_review    	= $_POST['hasil_review'];
	$option          	= $_POST['option'];
	$rekomendasi    	= $_POST['rekomendasi'];
	$tanggapan      	= $_POST['tanggapan'];
	$target_date    	= $_POST['target_date'];
	$group           	= $_POST['group'];
	$log_id       		= $_POST['log_id'];
	$res_id       		= $_POST['res_id'];

	$periode_rs_year	= date('Y');
	$periode_rs_month	= date('m');
	$periode_rs 		= date('Y-m-d');

	$CBC_NAME 		= $_POST['CBC_NAME'];
	$Debitur 		= $_POST['Debitur'];

	$query = mysql_query("INSERT into tb_result_dua values('','$res_id','$log_id','$periode_rs_year','$periode_rs_month','$periode_rs','$hasil_review','$option','$rekomendasi','$tanggapan','$target_date','','$group','$CBC_NAME','$Debitur')");
	if ($query) {
		header("Location: ./mdr_working_paper.php?ntf=1");
	} else {
		echo "skflsdkjflksdjflkjsd".mysql_error();
	}
}

if(isset($_POST["input_aspek_gr3"]))    
{    
	$hasil_review    	= $_POST['hasil_review'];
	$option          	= $_POST['option'];
	$rekomendasi    	= $_POST['rekomendasi'];
	$tanggapan      	= $_POST['tanggapan'];
	$target_date    	= $_POST['target_date'];
	$group           	= $_POST['group'];
	$log_id       		= $_POST['log_id'];
	$res_id       		= $_POST['res_id'];

	$periode_rs_year	= date('Y');
	$periode_rs_month	= date('m');
	$periode_rs 		= date('Y-m-d');

	$CBC_NAME 		= $_POST['CBC_NAME'];
	$Debitur 		= $_POST['Debitur'];

	$query = mysql_query("INSERT into tb_result_dua values('','$res_id','$log_id','$periode_rs_year','$periode_rs_month','$periode_rs','$hasil_review','$option','$rekomendasi','$tanggapan','$target_date','','$group','$CBC_NAME','$Debitur')");
	if ($query) {
		header("Location: ./mdr_working_paper.php?ntf=1");
	} else {
		echo "skflsdkjflksdjflkjsd".mysql_error();
	}
}

if(isset($_POST["input_aspek_gr4"]))    
{    
	$hasil_review    	= $_POST['hasil_review'];
	$option          	= $_POST['option'];
	$rekomendasi    	= $_POST['rekomendasi'];
	$tanggapan      	= $_POST['tanggapan'];
	$target_date    	= $_POST['target_date'];
	$group           	= $_POST['group'];
	$log_id       		= $_POST['log_id'];
	$res_id       		= $_POST['res_id'];

	$periode_rs_year	= date('Y');
	$periode_rs_month	= date('m');
	$periode_rs 		= date('Y-m-d');

	$CBC_NAME 		= $_POST['CBC_NAME'];
	$Debitur 		= $_POST['Debitur'];

	$query = mysql_query("INSERT into tb_result_dua values('','$res_id','$log_id','$periode_rs_year','$periode_rs_month','$periode_rs','$hasil_review','$option','$rekomendasi','$tanggapan','$target_date','','$group','$CBC_NAME','$Debitur')");
	if ($query) {
		header("Location: ./mdr_working_paper.php?ntf=1");
	} else {
		echo "skflsdkjflksdjflkjsd".mysql_error();
	}
}

if(isset($_POST["input_aspek_gr5"]))    
{    
	$hasil_review    	= $_POST['hasil_review'];
	$option          	= $_POST['option'];
	$rekomendasi    	= $_POST['rekomendasi'];
	$tanggapan      	= $_POST['tanggapan'];
	$target_date    	= $_POST['target_date'];
	$group           	= $_POST['group'];
	$log_id       		= $_POST['log_id'];
	$res_id       		= $_POST['res_id'];

	$periode_rs_year	= date('Y');
	$periode_rs_month	= date('m');
	$periode_rs 		= date('Y-m-d');

	$CBC_NAME 		= $_POST['CBC_NAME'];
	$Debitur 		= $_POST['Debitur'];

	$query = mysql_query("INSERT into tb_result_dua values('','$res_id','$log_id','$periode_rs_year','$periode_rs_month','$periode_rs','$hasil_review','$option','$rekomendasi','$tanggapan','$target_date','','$group','$CBC_NAME','$Debitur')");
	if ($query) {
		header("Location: ./mdr_working_paper.php?ntf=1");
	} else {
		echo "skflsdkjflksdjflkjsd".mysql_error();
	}
}

if(isset($_POST["input_aspek_gr6"]))    
{    
	$hasil_review    	= $_POST['hasil_review'];
	$option          	= $_POST['option'];
	$rekomendasi    	= $_POST['rekomendasi'];
	$tanggapan      	= $_POST['tanggapan'];
	$target_date    	= $_POST['target_date'];
	$group           	= $_POST['group'];
	$log_id       		= $_POST['log_id'];
	$res_id       		= $_POST['res_id'];

	$periode_rs_year	= date('Y');
	$periode_rs_month	= date('m');
	$periode_rs 		= date('Y-m-d');

	$CBC_NAME 		= $_POST['CBC_NAME'];
	$Debitur 		= $_POST['Debitur'];

	$query = mysql_query("INSERT into tb_result_dua values('','$res_id','$log_id','$periode_rs_year','$periode_rs_month','$periode_rs','$hasil_review','$option','$rekomendasi','$tanggapan','$target_date','','$group','$CBC_NAME','$Debitur')");
	if ($query) {
		header("Location: ./mdr_working_paper.php?ntf=1");
	} else {
		echo "Error".mysql_error();
	}
}

?>