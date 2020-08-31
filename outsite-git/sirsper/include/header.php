<?php
mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbname); 
$result = mysql_query("SELECT * FROM tb_user WHERE user_name = '$user'");
$data = mysql_fetch_array($result);
?>
<script type="text/javascript"> 
  function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}
function display_ct() {
  var x = new Date()
  document.getElementById('ct').innerHTML = x;
  display_c();
}
</script>
<header class="main-header">
  <a href="index.php" class="logo" style="color: #f0ad4e">
    <small><b>CCS</b></small>
  </a>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="user user-menu">
          <a>
            <span class="hidden-xs">
              <i style="color: #f0ad4e" class="fa fa-calendar">&nbsp;</i>
              <span style="color: #f0ad4e" id="ct"> </span>  
            </span>
          </a>
        </li>
        <li class="user user-menu">
          <a>
            <span class="hidden-xs">
              <font style="color: #f0ad4e"><b>Active Role - <?php echo $data['user_role'];?></b></font>
              <span id="ct"> </span>
            </span>
          </a>
        </li>

        <li class="user user-menu">
          <a>
            <span class="hidden-xs">
              <span id="ct"> </span>
            </span>
          </a>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="hidden-xs"><i class="glyphicon glyphicon-cog" style="color: #f0ad4e"></i><font style="color: #f0ad4e"><b> Setting</b></font>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <?php 
                echo"<img src='include/profile/$data[user_foto]' class='lingkaran1'>&nbsp;&nbsp;";
                ?>
                <p>
                  <font style="color: #f0ad4e"><b><?php echo $data['FirstName'];?> <?php echo $data['LastName'];?></b></font>
                  <small><?php echo $data['NIP'];?></small>
                  <small><?php echo $data['user_dept'];?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-warning btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-warning btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <body class="skin-<?php echo ($_SESSION['user_role'] != 'User') ? 'blue' : 'green';?>" onload="display_ct()">