<?php 

// UPDATE DATA TO TBL_RESULT_REVIEW(PR WITH SAME ID FROM DATA "SUBMIT UI")
if(isset($_POST["update_pr"]))    
{
  $res_id           = $_POST['res_id'];
  $log_id           = $_POST['log_id'];    
  $po_res           = $_POST['potensi'];

  $cek = mysql_query("SELECT * FROM tb_result_review WHERE log_id ='$log_id'");
  $num = mysql_num_rows($cek);
  if($num == 1){
    $query = mysql_query("UPDATE tb_result_review SET po_res = '$po_res' WHERE log_id='$log_id'");  
    if($query){
      header("Location: ./mdr_working_paper.php?ntf=1");
    } else {
      echo "Updated Failed - Please contact your administrator";
    }
  } else {
    echo "Records cannot be found!! Please contact your System Administrator".mysql_error() ;
  }

}

?>