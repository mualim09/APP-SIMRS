<?php 

// UPDATE DATA TO TBL_RESULT_REVIEW (INFORMASI UMUM)
if(isset($_POST["update_iu"]))    
{ 

  $res_id           = $_POST['res_id'];
  $log_id           = $_POST['log_id'];

  $his_pem_kre      = $_POST['his_pem_kre'];
  $cur_is_in        = $_POST['cur_is_in'];
  $his_pem_kol      = $_POST['his_pem_kol'];
  $earl_war         = $_POST['earl_war'];

  $cek = mysql_query("SELECT * FROM tb_result_review WHERE log_id ='$log_id'");
  $num = mysql_num_rows($cek);
  if($num == 1){
    $query = mysql_query("UPDATE tb_result_review SET his_pem_kre = '$his_pem_kre',cur_is_in = '$cur_is_in',his_pem_kol = '$his_pem_kol',earl_war = '$earl_war'WHERE log_id='$log_id'");
    if($query){
      header("Location: ./mdr_working_paper.php?ntf=5");
    } else {
      echo "Updated Failed - Please contact your administrator";
    }
  } else {
    echo "Records cannot be found!! Please contact your System Administrator" ;
  }

}

?>