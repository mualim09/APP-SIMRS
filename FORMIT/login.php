<?php 
include "include/connection.php";

mysql_connect($host, $user, $password);
mysql_select_db($dbname);
if (isset($_POST['login'])) {

  $user =$_POST['username'];
  $pass =$_POST['password'];
  $log_type = "login";
  $date_log = date('Y-m-d H:i:m');

  // var_dump($user,$pass,$log_type,$date_log);exit;

  $q = mysql_query("SELECT * FROM tb_user WHERE username='$user' AND password='$pass'");

  if (mysql_num_rows($q) == 1) {
    session_start();
    $_SESSION['username']=$user;
    $query = mysql_query("insert into tb_log values(' ','$user','$log_type','$date_log',' ')");
    if ($query) {
      header("Location: ./index.php?ntf=100");
    } else {
      echo '<script>alert("Hai, ' . $user . '. kamu berhasil login");location.href = "index.php?ntf=100"</script>';
    }           
  } else {
   echo '<script>alert("Gagal Login! | Periksa username atau password anda.");window.history.go(-1);</script>';
 }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>FORMIT | Login</title>
  <link rel="icon" type="assets/image/png" href="assets/images/logo/header.png"/>
  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/libs/css/style.css">
  <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
  <style>
    html,
    body {
      height: 100%;
    }
    body {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
    }
  </style>
</head>
<body style="background-image: url('assets/images/bg/bgkota.png'); background-repeat: no-repeat; background-position: center center;background-size: cover;padding: 0; margin-top: 5px">
  <div class="splash-container">
    <!-- ALERT -->
    <?php include 'include/alert/success.php' ?>
    <!-- END ALERT -->
    <div class="card ">
      <div class="card-header text-center">
        <h3>FORMIT SIMRS</h3>
        <p>Silahkan masuk-kan username dan password anda untuk memulai session.</p>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <input class="form-control form-control-lg" id="username" name="username" type="email" placeholder="username@xyz.com" autocomplete="off" required="required">
          </div>
          <div class="form-group">
            <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password"  required="required">
          </div>
          <div class="form-group">
            <label class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox">
              <span class="custom-control-label">Remember Me</span>
            </label>
          </div>
          <button type="submit" name="login" class="btn btn-dark btn-block">Sign in</button>
        </form>
        <hr>
        <p align="center">Version 1.0.1</p>
        <hr>
        <div align="center">
          <p>
            Powered by
          </p>
          <img src="assets/img/rskgcare-icon/rskgcare.png" width="150px">
        </div>
      </div>
      <div class="card-footer bg-white p-0" align="center">
        <div class="card-footer-item card-footer-item-bordered">
          <a href="#" class="footer-link">Teknologi Informasi</a>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
