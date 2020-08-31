<?php
include 'include/restrict.php';

$user = $_SESSION['username'];
mysql_connect('localhost', 'root', '');
mysql_select_db('rskg_ticket'); 
$role = mysql_query("SELECT * FROM tb_user WHERE username = '$user' ");
$data = mysql_fetch_array($role);
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
<nav class="navbar navbar-expand-lg bg-white fixed-top">
  <a class="navbar-brand" href="index.php?ntf=0"><font style="color: black">IT</font><font style="color: red">icket</font>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <div align="center">
      <img src="assets/images/icon/clock1.png" width="30px">
        <body onload=display_ct();>
          <span id='ct' ></span>
        </body>
    </div>
    <ul class="navbar-nav ml-auto navbar-right-top">
      <li class="nav-item dropdown notification">
        <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
        <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
          <li>
            <div class="notification-title"> Notification</div>
            <div class="notification-list">
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">
                  <div class="notification-info">
                    <div class="notification-list-user-img"><img src="assets/images/header.png" alt="" class="user-avatar-md rounded-circle"></div>
                    <div class="notification-list-user-block"><span class="notification-list-user-name">Administrator Sistem E-DPA</span>Aplikasi Elektronik pengelolaan Dokumen, Pelaporan & Akreditasi Rumah Sakit Ny. R.A. Habibie.
                      <div class="notification-date">Created 30 May 2020</div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action active">
                  <div class="notification-info">
                    <div class="notification-list-user-img"><img src="assets/images/header.png" alt="" class="user-avatar-md rounded-circle"></div>
                    <div class="notification-list-user-block"><span class="notification-list-user-name">RSKG Care</span>Powered By RSKG Care.
                      <div class="notification-date">Created 30 May 2020</div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action active">
                  <div class="notification-info">
                    <div class="notification-list-user-img"><img src="assets/images/header.png" alt="" class="user-avatar-md rounded-circle"></div>
                    <div class="notification-list-user-block"><span class="notification-list-user-name">RSKG Care</span>
                      <p>Hak Akses</p>
                      <ul>
                        <li>Superadmin = Dapat melakukan created, edit dan delete pada Sistem E-DPA</li>
                        <li>Admin = Dapat melakukan created, edit dan delete pada Sistem E-DPA (Tidak Bisa Menambahkan Users)</li>
                        <li>Users = Akses dibawah perintah Admin</li>
                      </ul>
                      <div class="notification-date">Created 30 May 2020</div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li>
            <div class="list-footer"> <a href="#">View all notifications</a></div>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown connection">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
        <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
          <li class="connection-list">
            <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                <a href="http://rskghabibie.com/" target="_blank" class="connection-item"><img src="assets/images/header.png" alt="" > <span>Website</span></a>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                <a href="http://192.168.55.127:127/index.php?r=site/login" target="_blank" class="connection-item"><img src="assets/img/all-rs/logo/simrs1.png" alt="" > <span>SIMRS</span></a>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                <a href="http://192.168.55.164/" target="_blank" class="connection-item"><img src="assets/img/rskgcare-icon/rskgcare.png" alt="" > <span>RSKG CARE</span></a>
              </div>
            </div>
          </li>
          <li>
            <div class="conntection-footer"><a href="#">More</a></div>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown nav-user">
        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <!-- <img src="assets/images/user/avatar.png" alt="" class="user-avatar-md rounded-circle"> -->
          <?php
          if ($data['foto']==NULL) {
            echo"<img src='assets/images/user/avatar.png' class='lingkaran1'>";
          }else{
            echo"<img src='assets/images/user/$data[foto]' class='lingkaran1'>";
          }
          ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
          <div class="nav-user-info">
            <h5 class="mb-0 text-white nav-user-name"><?php echo $data['full_name'];?> </h5>
            <span class="status"></span><span class="ml-2">Available</span>
          </div>
          <!-- <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a> -->
          <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

