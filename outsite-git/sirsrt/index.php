<?php
include "include/connection.php";

// CHANGE PASSWORD
if(isset($_POST["changepassword"]))    
{    
  $user_id      = $_POST['user_id'];
  $password    = $_POST['password'];

  $query = mysql_query("UPDATE tb_user SET 
    password ='$password'
    WHERE user_id ='$user_id'");
  if($query){
    header("Location: ./logout.php");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// UBAH FOTO
if(isset($_POST["update"]))    
{    
  $user_id      = $_POST['user_id'];
  $username     = $_POST['username'];
  $fullname     = $_POST['fullname'];
  $unit         = $_POST['unit'];
  $email        = $_POST['email'];

  $nama = $_FILES['foto']['name'];
  $file_tmp = $_FILES['foto']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/img/faces/'.$nama);
  
  $query = mysql_query("UPDATE tb_user SET 
    username = '$username',
    fullname = '$fullname',
    unit = '$unit',
    email = '$email',
    foto = '$nama'
    WHERE user_id ='$user_id'");
  if($query){
    header("Location: ./index.php?ntf=5");                                                  
  } else {
    header("Location: ./index.php?ntf=6");  
  }
}

$dashboard_asm = mysql_query("SELECT COUNT(*) AS total_asm FROM tb_asm");
$dashboard_ask = mysql_query("SELECT COUNT(*) AS total_ask FROM tb_ask");
$dashboard_ani = mysql_query("SELECT COUNT(*) AS total_ani FROM tb_ani");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIRS RT</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/icon/logodef.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include 'include/top-header.php'; ?>
    <?php include 'include/sidebar.php'; ?>
    <div class="content-wrapper">
      <!-- ISI -->
      <br>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-solid">
              <div class="box-body text-center">
                <img src="assets/img/all-rs/rskg2.png" width="250px">
                <hr>
                <h1>SIRS RT</h1>
                <h3><i>(Sistem Informasi Rumah Tangga)</i></h3>
                <hr>
                <h6>Copyright © <?php echo date('Y'); ?> IT RSKG<br>All rights reserved.<br><i>Version 1.0.1</i></h6>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- END ISI -->
    </div>
  </div>
  <!-- <?php include 'include/footer.php'; ?> -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/plugins/chart.js/Chart.min.js"></script>
  <script src="assets/plugins/sparklines/sparkline.js"></script>
  <script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="assets/plugins/moment/moment.min.js"></script>
  <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
  <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="assets/dist/js/adminlte.js"></script>
  <script src="assets/dist/js/pages/dashboard.js"></script>
  <script src="assets/dist/js/demo.js"></script>
</body>
</html>
