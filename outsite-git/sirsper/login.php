<?php 
include "include/connection.php";
mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbname); 
if (isset($_POST['submit'])) 
{
  $user =$_POST['username'];
  $pass =$_POST['password'];
  $log_type = "login";
  $date_log = date('Y-m-d H:i:m');

  $q = mysql_query("SELECT * from tb_user where user_name='$user' and user_password='$pass'");

  if (mysql_num_rows($q) == 1) {
    session_start();
    $ses_user = mysql_fetch_array($q);
    $_SESSION['userid']=$ses_user['user_id'];
    $_SESSION['username']=$ses_user['user_name'];
    $_SESSION['role']=$ses_user['user_role'];
    $query = mysql_query("INSERT into tb_log values(' ','$user','$log_type','$date_log',' ')");
    if ($query) {
      header("Location: ./index.php");
    } else {
      echo "<h4>". "log error".mysql_error()."</h4>";
    }           
  } else {
    header("Location: ./index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>CCS Tools</title>
  <link rel="icon" type="image/png" href="assets/images/mandiri-logo.png"/>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="assets/login/css/default/app.min.css" rel="stylesheet" />
</head>
<body class="pace-top">
  <div id="page-loader" class="fade show"><span class="spinner"></span></div>
  <div id="page-container" class="fade">
    <div class="login login-with-news-feed">
      <div class="news-feed">
        <div class="news-image" style="background-image: url(assets/login/img/login-bg/login-bg-19-thumb.jpg)"></div>
        <div class="news-caption">
          <h4 class="caption-title"><b>CCS Tools</b></h4>
          <strong>Bank Mandiri</strong>
          <p>
            Credit Control & Supervision Group
          </p>
        </div>
      </div>
      <div class="right-content">
        <div class="login-header">
          <div class="brand">
            <div align="center">
              <img src="assets/images/mandiri-logo.png" width="250px">
            </div>
          </div>
          <div class="icon">
            <i class="fa fa-sign-in"></i>
          </div>
        </div>
        <div class="login-content">
          <form action=" " method="POST" class="margin-bottom-0" data-parsley-validate="true">
            <div class="form-group m-b-15">
              <input type="text" name="username" class="form-control form-control-lg" placeholder="Username"  data-parsley-required="true" data-parsley-required-message="Username tidak boleh kosong." />
            </div>
            <div class="form-group m-b-15">
              <input type="password" name="password" class="form-control form-control-lg" placeholder="Password"  data-parsley-required="true" data-parsley-required-message="Password tidak boleh kosong." />
            </div>
            <div class="checkbox checkbox-css m-b-30">
              <input type="checkbox" id="remember_me_checkbox" value="" />
              <label for="remember_me_checkbox">
                Remember Me
              </label>
            </div>
            <div class="login-buttons">
              <button type="submit" name="submit" class="btn btn-warning btn-block btn-lg">Sign in</button>
            </div>
            <hr>
            <p class="text-center text-grey-darker">
              <small>Copyright &copy; 2019<a href="#"><font color="#1d2e61"> incubea</font></a> All rights reserved.<br>Version 1.0</small><br>
              By  <img src="assets/images/H.png" width="15px" height="15px"><font style="color: #1b202b;"><b>ELLOS-ID</b></font>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/login/js/app.min.js"></script>
  <script src="assets/login/js/theme/default.min.js"></script>
  <script src="assets/login/plugins/parsleyjs/dist/parsley.min.js"></script>
</body>
</html>
