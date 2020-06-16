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
      header("Location: ./index.php");
    } else {
      echo "<h4>". "log error"."</h4>";
    }           
  } else {
    echo '<script>alert("Gagal Login");window.history.go(-1);</script>';
    header("Location: ./index.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login - SIRS ADM</title>
  <link rel="shortcut icon" type="image/png" href="assets/img/all-rs/logo/sirs-adm.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url('assets/img/all-rs/bg2.jpg'); background-repeat: no-repeat; background-position: center center;background-size: cover;padding: 0; margin-top: 5px">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>SIRS</b>ADM</a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <div align="center">
          <img src="assets/img/all-rs/rskg1.png" width="100px">
          <p align="center">
            <font style="color: #056539; font-family: Arial; font-size: 15px">Sistem Informasi Operator RSKG</font>
          </p>
        </div>
        <hr>
        <form action="" method="POST">
          <div class="input-group mb-3">
            <input type="username" name="username" class="form-control" required="required" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" required="required" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-default">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" name="login" class="btn btn-success btn-block">Sign In</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
