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
  <title>SIRS ADM</title>
  <link rel="shortcut icon" type="image/png" href="assets/img/all-rs/logo/sirs-adm.png">
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
<!-- CSS FOTO -->
<style type="text/css">
  .lingkaran1{
    width: 200px;
    height: 200px;
    background: #ffffff;
    border-radius: 10%;
  }

  .img{
    width: 200px;
    height: 200px;
    background: #ffffff;
    border-radius: 100%;
  }
</style>
<!-- END CSS -->
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include 'include/top-header.php'; ?>
    <?php include 'include/sidebar.php'; ?>
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Home</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">SIRS ADM</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- ISI -->
      <section class="content">
        <div class="container-fluid">
          <!-- DASHBOARD -->
          <div class="row">
            <div class="col-lg-4 col-6">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>
                    <?php 
                    while ($row_asm = mysql_fetch_assoc($dashboard_asm)) {
                      ?>
                      <?= $row_asm['total_asm'] ?>
                    <?php } ?>
                  </h3>
                  <p>Agenda Surat Masuk <?php echo date('Y');?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-envelope"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>
                    <?php 
                    while ($row_ask = mysql_fetch_assoc($dashboard_ask)) {
                      ?>
                      <?= $row_ask['total_ask'] ?>
                    <?php } ?>
                  </h3>
                  <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
                  <p>Agenda Surat Keluar <?php echo date('Y');?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-envelope-open"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>
                    <?php 
                    while ($row_ani = mysql_fetch_assoc($dashboard_ani)) {
                      ?>
                      <?= $row_ani['total_ani'] ?>
                    <?php } ?>
                  </h3>
                  <p>Agenda Nota Intern <?php echo date('Y');?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-sticky-note"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <!-- END DASHBOARD -->
          <div class="row">
            <div class="col-md-3">
              <div class="card card-default card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                    src="assets/img/faces/<?php echo $access['foto']; ?>"
                    alt="User profile picture">
                  </div>
                  <h3 class="profile-username text-center"><?php echo $access['fullname']; ?></h3>
                  <p class="text-muted text-center"><?php echo $access['unit']; ?></p>
                  <button class="btn btn-default btn-block" data-toggle="modal" data-target="#addfile<?php echo $access['user_id'];?>" title="Edit Profile">Edit Profile</button>
                  <button class="btn btn-default btn-block" data-toggle="modal" data-target="#change<?php echo $access['user_id'];?>" title="Change Password">Change Password</button>
                </div>
              </div>
              <div class="card bg-gradient-info">
                <div class="card-header border-0">
                  <h3 class="card-title">
                    <i class="far fa-calendar-alt"></i>
                    Calendar
                  </h3>
                  <div class="card-tools">
                    <div class="btn-group">
                      <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-bars"></i></button>
                        <div class="dropdown-menu float-right" role="menu">
                          <a href="#" class="dropdown-item">Add new event</a>
                          <a href="#" class="dropdown-item">Clear events</a>
                          <div class="dropdown-divider">
                          </div>
                          <a href="#" class="dropdown-item">View calendar</a>
                        </div>
                      </div>
                      <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-info btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body pt-0">
                    <div id="calendar" style="width: 100%">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="card" style="background-color: #ffffff">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Post</a></li>
                    </ul>
                  </div>
                  <div class="card-body" style="background-color: #ffffff">
                    <div class="tab-content">
                      <div class="active tab-pane" id="activity">
                        <div class="post clearfix">
                          <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="assets/img/all-rs/rskg.png" alt="User Image">
                            <span class="username">
                              <a href="#">RSKG</a>
                            </span>
                            <span class="description">Rumah Sakit Khusus Ginjal Ny. R.A. Habibie</span>
                          </div>
                          <div align="center">
                            <img src="assets/img/all-rs/logo/sirs-adm1.png">
                          </div>
                          <br>
                          <br>
                          <hr>
                          <p align="center">
                            <font style="font-size: 21px">Aplikasi Sistem Informasi Operator <br> Rumah Sakit Khusus Ginjal Ny. R.A. Habibie</font>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- UPDATE -->
          <div class="modal fade" id="addfile<?php echo $access['user_id'];?>">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <label class="modal-title">Update Profile</label>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                      <div align="center">
                        <img src="assets/img/faces/<?php echo $access['foto']; ?>"  class="lingkaran1">
                      </div>
                      <hr>
                      <label>Upload File</label>
                      <input type="file" name="foto" placeholder="Upload ...">
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>ID</label>
                          <input type="text" class="form-control" name="user_id" readonly="readonly" value="<?php echo $access['user_id'];?>">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control" name="username"  readonly="readonly" value="<?php echo $access['username'];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Fullname</label>
                          <input type="text" class="form-control" name="fullname" value="<?php echo $access['fullname'];?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Unit</label>
                          <input type="text" class="form-control" name="unit" value="<?php echo $access['unit'];?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" value="<?php echo $access['email'];?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <button type="submit" name="update" class="btn btn-block btn-info">Update</button>
                      <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- END UPDATE -->

          <!-- UPDATE PASSWORD -->
          <div class="modal fade" id="change<?php echo $access['user_id'];?>" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <label class="modal-title">Input Password Baru</label>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="">
                    <div class="form-group">
                      <label>Password Baru</label>
                      <input type="password" name="password" class="form-control" placeholder="Password Baru ..." required>
                      <input type="hidden" name="user_id" class="form-control" placeholder="client name" value="<?php echo $access['user_id'];?>" required>
                    </div>
                    <button type="submit" name="changepassword" class="btn btn-info btn-block btn-flat">Ganti Password</button>
                    <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">Close</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END UPDATE PASSWORD -->

        </section>
        <!-- END ISI -->
      </div>
    </div>

    <div id="sparkline-1">
    </div>
    <div id="sparkline-2">
    </div>
    <div id="sparkline-3">
    </div>
    <?php include 'include/footer.php'; ?>
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
