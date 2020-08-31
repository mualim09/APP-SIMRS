<?php 
include "include/connection.php";
$result = mysql_query("SELECT * FROM tb_user WHERE username = '$user'");
$data = mysql_fetch_array($result);

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

// UBAH DATA
if(isset($_POST["update"]))    
{    
  $user_id      = $_POST['user_id'];
  $username     = $_POST['username'];
  $full_name    = $_POST['full_name'];
  $jabatan      = $_POST['jabatan'];
  $email        = $_POST['email'];
  
  $query = mysql_query("UPDATE tb_user SET 
    username = '$email',
    full_name = '$full_name',
    jabatan = '$jabatan',
    email = '$email'
    WHERE user_id ='$user_id'");
  if($query){
    header("Location: ./login.php?ntf=600");                                                  
  } else {
    header("Location: ./index.php?ntf=6");  
  }
}

// UBAH FOTO
if(isset($_POST["updatefoto"]))    
{    
  $user_id      = $_POST['user_id'];

  $nama = $_FILES['foto']['name'];
  $file_tmp = $_FILES['foto']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/images/user/'.$nama);
  
  $query = mysql_query("UPDATE tb_user SET 
    foto = '$nama'
    WHERE user_id ='$user_id'");
  if($query){
    header("Location: ./index.php?ntf=5");                                                  
  } else {
    header("Location: ./index.php?ntf=6");  
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/libs/css/style.css">
  <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
  <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
  <title>SIMDO | Home</title>
  <link rel="icon" type="assets/image/png" href="assets/images/simdo/favicon.png"/>
</head>
<style type="text/css">
  .lingkaran1{
    width: 40px;
    height: 40px;
    background: #ffffff;
    border-radius: 100%;
  }

  .lingkaran{
    width: 150px;
    height: 150px;
    background: #ffffff;
    border-radius: 100%;
  }
</style>

<body>
  <div class="dashboard-main-wrapper">
    <div class="dashboard-header">
      <?php include "include/header.php" ?>
    </div>
    <?php include "include/sidebar.php" ?>
    <div class="dashboard-wrapper">
      <div class="dashboard-influence">
        <div class="container-fluid dashboard-content">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="page-header">
                <h3 class="mb-2">Home </h3>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          
          <!-- ALERT -->
          <?php include 'include/alert/success.php' ?>
          <!-- END ALERT -->

          <!-- FOTO -->
          <div class="modal fade" id="foto<?php echo $data['user_id'];?>">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <label class="modal-title">Change Foto</label>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                      <div align="center">
                        <?php
                        if ($data['foto']==NULL) {
                          echo"<img src='assets/images/user/avatar.png' class='lingkaran'>";
                        }else{
                          echo"<img src='assets/images/user/$data[foto]' class='lingkaran'>";
                        }
                        ?>
                      </div>
                      <hr>
                      <label>Upload Foto</label><br>
                      <input type="file" name="foto" placeholder="Upload ...">
                      <input type="hidden" name="user_id" value="<?php echo $data['user_id'];?>">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <button type="submit" name="updatefoto" class="btn btn-block btn-dark">Update</button>
                      <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- END FOTO -->

          <!-- UPDATE -->
          <div class="modal fade" id="addfile<?php echo $data['user_id'];?>">
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
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>ID</label>
                          <input type="text" class="form-control" name="user_id" readonly="readonly" value="<?php echo $data['user_id'];?>">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control" name="username"  readonly="readonly" value="<?php echo $data['username'];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Fullname</label>
                          <input type="text" class="form-control" name="full_name" value="<?php echo $data['full_name'];?>">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Jabatan</label>
                          <input type="text" class="form-control" name="jabatan" value="<?php echo $data['jabatan'];?>">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" value="<?php echo $data['email'];?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <button type="submit" name="update" class="btn btn-block btn-dark">Update</button>
                      <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- END UPDATE -->

          <!-- UPDATE PASSWORD -->
          <div class="modal fade" id="change<?php echo $data['user_id'];?>" role="dialog">
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
                      <input type="hidden" name="user_id" class="form-control" value="<?php echo $data['user_id'];?>" required>
                    </div>
                    <button type="submit" name="changepassword" class="btn btn-dark btn-block btn-flat">Ganti Password</button>
                    <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Close</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END UPDATE PASSWORD -->

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card influencer-profile-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                      <div class="text-center">
                        <!-- <img src="assets/images/avatar-1.jpg" alt="User Avatar" class="rounded-circle user-avatar-xxl"> -->
                        <?php
                        if ($data['foto']==NULL) {
                          echo"<img src='assets/images/user/avatar.png' class='rounded-circle user-avatar-xxl'>";
                        }else{
                          echo"<img src='assets/images/user/$data[foto]' class='rounded-circle user-avatar-xxl'>";
                        }
                        ?>
                      </div>
                    </div>
                    <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                      <div class="user-avatar-info">
                        <div class="m-b-20">
                          <div class="user-avatar-name">
                            <h2 class="mb-1"><?php echo $data['full_name']; ?></h2>
                          </div>
                          <div class="rating-star  d-inline-block">
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                          </div>
                        </div>
                        <div class="user-avatar-address">
                          <p class="border-bottom pb-3">
                            <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-dark "></i><?php echo $data['alamat']; ?></span>
                            <span class="mb-2 ml-xl-4 d-xl-inline-block d-block">Joined date: <?php echo $data['date_user']; ?>  </span>
                            <span class=" mb-2 d-xl-inline-block d-block ml-xl-4"><?php echo $data['jabatan']; ?> 
                          </span>
                          <span class=" mb-2 d-xl-inline-block d-block ml-xl-4"><?php echo $data['unit']; ?> </span>
                          <span class=" mb-2 d-xl-inline-block d-block ml-xl-4"> </span>
                          <br>
                          <span class="btn btn-outline-dark btn-xs" data-toggle="modal" data-target="#foto<?php echo $data['user_id'];?>" title="Edit Profile">Change Foto</span>
                          <span class="btn btn-outline-dark btn-xs" data-toggle="modal" data-target="#addfile<?php echo $data['user_id'];?>" title="Edit Profile">Edit Profile</span>
                          <span class="btn btn-outline-dark btn-xs" data-toggle="modal" data-target="#change<?php echo $data['user_id'];?>" title="Change Password">Change Password</span>
                        </p>
                        <div class="mt-3">
                          <a href="#" class="badge badge-light mr-1"><?php echo $data['user_role']; ?></a> <a href="#" class="badge badge-light mr-1"><?php echo $data['email']; ?></a> <a href="#" class="badge badge-light"><?php echo $data['no_hp']; ?></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border-top user-social-box" align="center">
                <div class="user-social-media d-xl-inline-block"><span class="mr-2 instagram-color"> <i class="fab fa-instagram"></i></span><span>@rskghabibie</span></div>
                <div class="user-social-media d-xl-inline-block"><span class="mr-2 youtube-color"> <i class="fab fa-youtube"></i></span><span>RSKG Habibie Ny. R.A. Habibie Official</span></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <!-- ============================================================== -->
            <!-- headings  -->
            <!-- ============================================================== -->
            <div class="card" id="headings">
              <h5 class="card-header">Informasi</h5>
              <div class="card-body">
                <h1 align="center">Selamat Datang</h1>
                <h2 align="center">Di Sistem Manajamen Dokumen (SIMDO)</h2>
                <p align="center">-</p>
              </div>
            </div>
            <!-- ============================================================== -->
            <!-- end headings  -->
            <!-- ============================================================== -->
          </div>
        </div>
      </div>
    </div>
    <?php include "include/footer.php" ?>
    <?php include 'include/thirdparty.php'; ?>
  </body>
  </html>