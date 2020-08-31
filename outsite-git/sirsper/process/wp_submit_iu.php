<?php 

if(isset($_POST["create_iu"]))    
{    
  $id_logbook = $_POST['id_logbook'];
  $LIMIT_LOG = $_POST['LIMIT_LOG'];
  $BADE_LOG = $_POST['BADE_LOG'];
  $JNS_KRD = $_POST['JNS_KRD'];
  $KOL_LOG = $_POST['KOL_LOG'];
  $BidangUsaha = $_POST['BidangUsaha'];
  $his_pem_kre = $_POST['his_pem_kre'];
  $cur_is_in = $_POST['cur_is_in'];
  $his_pem_kol = $_POST['his_pem_kol'];
  $earl_war = $_POST['earl_war'];
  $EKA = $_POST['EKA'];
  $UAS = $_POST['UAS'];
  $WTC = $_POST['WTC'];
  $AP = $_POST['AP'];
  $KB = $_POST['KB'];
  $EKN = $_POST['EKN'];
  $LL = $_POST['LL'];

  $cek = mysql_query("SELECT * FROM tb_upload_logbook WHERE id_logbook ='$id_logbook'");
  $num = mysql_num_rows($cek);
  if($num == 1){
    $query = mysql_query("UPDATE tb_upload_logbook SET LIMIT_LOG = '$LIMIT_LOG', BADE_LOG = '$BADE_LOG', JNS_KRD = '$JNS_KRD', 
     KOL_LOG = '$KOL_LOG', BidangUsaha = '$BidangUsaha', 
     his_pem_kre = '$his_pem_kre', cur_is_in = '$cur_is_in', 
     his_pem_kol = '$his_pem_kol', earl_war = '$earl_war', 
     EKA = '$EKA', UAS = '$UAS', 
     WTC = '$WTC', AP = '$AP', 
     KB = '$KB', EKN = '$EKN', LL = '$LL'
     WHERE id_logbook ='$id_logbook'");
    // var_dump($query);die();
    if($query){
      header("Location: ./mdr_working_paper.php");                                                  
    } else {
      echo "Updated Failed - Please contact your Administrator";
    }
  } else {
    echo "Records cannot be found!! Please contact your System Administrator" ;
  }
}

?>
