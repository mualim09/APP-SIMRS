<?php 

// UPDATE DATA TO TBL_RESULT_REVIEW(EKDS WITH SAME ID FROM DATA "SUBMIT UI")
if(isset($_POST["update_ekds"]))    
{
  $res_id           = $_POST['res_id'];
  $log_id           = $_POST['log_id'];    
  $account_str      = $_POST['account_str'];
  $est_kol          = $_POST['est_kol'];
  $us_wl            = $_POST['us_wl'];
  $root_cause       = $_POST['root_cause'];

  $cek = mysql_query("SELECT * FROM tb_result_review WHERE log_id ='$log_id'");
  $num = mysql_num_rows($cek);
  if($num == 1){
    $query = mysql_query("UPDATE tb_result_review SET account_str ='$account_str',est_kol = '$est_kol',us_wl = '$us_wl', root_cause = '$root_cause' WHERE log_id='$log_id'");
    if($query){
      header("Location: ./mdr_working_paper.php?ntf=5");
    } else {
      echo "Updated Failed - Please contact your administrator";
    }
  } else {
    echo "Records cannot be found!! Please contact your System Administrator".mysql_error() ;
  }

}

?>