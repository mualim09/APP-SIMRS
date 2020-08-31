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
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login - SIRS RT</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="assets/images/icon/logodef.png"/>
  <link rel="stylesheet" href="assets/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/assets/css/themify-icons.css">
  <link rel="stylesheet" href="assets/assets/css/metisMenu.css">
  <link rel="stylesheet" href="assets/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/assets/css/slicknav.min.css">
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <link rel="stylesheet" href="assets/assets/css/typography.css">
  <link rel="stylesheet" href="assets/assets/css/default-css.css">
  <link rel="stylesheet" href="assets/assets/css/styles.css">
  <link rel="stylesheet" href="assets/assets/css/responsive.css">
  <script src="assets/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
  <div id="preloader">
    <div class="loader"></div>
  </div>
  <div class="login-area login-s2">
    <div class="container">
      <div class="login-box ptb--100">
        <form action="" method="POST">
          <div class="login-form-head">
            <h4>Login</h4>
            <p>Silahkan masukkan <b>Username</b> dan <b>Password</b> yang milik anda untuk masuk ke dalam sistem</p>
          </div>
          <div class="login-form-body">
            <div class="form-gp">
              <label>Username</label>
              <input type="text" name="username">
              <i class="ti-user"></i>
              <div class="text-danger"></div>
            </div>
            <div class="form-gp">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" id="exampleInputPassword1" name="password">
              <i class="ti-lock"></i>
              <div class="text-danger"></div>
            </div>
            <div class="row mb-4 rmber-area">
              <div class="col-6">
                <div class="custom-control custom-checkbox mr-sm-2">
                  <input type="checkbox" class="custom-control-input" name="password" id="customControlAutosizing">
                  <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                </div>
              </div>
            </div>
            <div class="submit-btn-area">
              <button id="form_submit" name="login" type="submit">Login <i class="ti-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="assets/assets/js/vendor/jquery-2.2.4.min.js"></script>
  <script src="assets/assets/js/popper.min.js"></script>
  <script src="assets/assets/js/bootstrap.min.js"></script>
  <script src="assets/assets/js/owl.carousel.min.js"></script>
  <script src="assets/assets/js/metisMenu.min.js"></script>
  <script src="assets/assets/js/jquery.slimscroll.min.js"></script>
  <script src="assets/assets/js/jquery.slicknav.min.js"></script>
  <script src="assets/assets/js/plugins.js"></script>
  <script src="assets/assets/js/scripts.js"></script>
</body>
</html>
