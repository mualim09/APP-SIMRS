<?php
include 'include/restrict.php';

$user = $_SESSION['username'];
mysql_connect('localhost', 'root', '');
mysql_select_db('rskg_akreditasi'); 
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
  <a class="navbar-brand" href="index.php?ntf=0"><font style="color: #4ac144">SIMDO</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <div align="center">
      <img src="assets/images/icon/clock2.png" width="40px">
      <body onload=display_ct();>
        <span id='ct' ></span>
      </body>
    </div>
    <ul class="navbar-nav ml-auto navbar-right-top">
      <li class="nav-item dropdown notification">
        <?php
        $con=mysqli_connect("localhost","root","","rskg_akreditasi");
        if (mysqli_connect_errno())
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $datax = $_SESSION['username'];
        //$result = mysqli_query($con,"SELECT COUNT(*) AS total FROM tb_notif WHERE username='$datax'");
        $result = mysqli_query($con,"SELECT COUNT(*) AS total FROM tb_notif WHERE status is NULL ORDER BY id_notif DESC");

        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_array($result))
          {
            ?>
            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <button class="btn btn-warning">Publish Dokumen <i class="fas fa-fw fa-bell"></i> <?php echo $row['total']; ?></button>
            </a>
          <?php } } mysqli_close($con); ?>
          <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
            <li>
              <div class="notification-title"> Publish Dokumen</div>
              <div class="notification-list">
                <div class="list-group">
                  <?php
                  $con=mysqli_connect("localhost","root","","rskg_akreditasi");
                  if (mysqli_connect_errno())
                  {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                  $datax = $_SESSION['username'];
                  //$result = mysqli_query($con,"SELECT * FROM tb_notif WHERE username='$datax' ORDER BY id_notif DESC");
                  $result = mysqli_query($con,"SELECT * FROM tb_notif WHERE status is NULL ORDER BY id_notif DESC");

                  if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result))
                    {
                      ?>
                      <a href='tampilan_revisi.php?id=$row[id_notif]' target=_blank title='Template WP' title='Lihat Detail' class="list-group-item list-group-item-action active">
                        <div class="notification-info">
                          <div class="notification-list-user-img">
                            <img src="assets/images/header.png" alt="" class="user-avatar-md rounded-circle">
                          </div>
                          <div class="notification-list-user-block">
                            <span class="notification-list-user-name"><font style="color: black"><?php echo $row['kode']; ?></font></span>
                            <br>
                            <small><?php echo $row['dokumen']; ?></small>
                            <br>
                            <small><?php echo $row['judul']; ?></small>
                            <div class="notification-date"><?php echo $row['date_notif']; ?>
                          </div>
                        </div>
                      </div>
                      <!-- <button class='btn btn-block btn-dark btn-sm'>Klik Disini</i></button> -->
                    </a>
                  <?php } } mysqli_close($con); ?>
                </div>
              </div>
            </li>
          <!-- <li>
            <div class="list-footer"> <a href="#">Lihat semua pemberitahuan</a></div>
          </li> -->
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
                <a href="http://rskghabibie.com:616/" target="_blank" class="connection-item"><img src="assets/img/all-rs/logo/sismadak1.png" alt="" > <span>SISMADAK</span></a>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                <a href="http://127.0.0.1/rskgsirsadm" target="_blank" class="connection-item"><img src="assets/img/all-rs/logo/sirs-adm1.png" alt=""> <span>SIRS-ADM</span></a>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                <a href="https://sisrute.kemkes.go.id/baru/index.php" target="_blank" class="connection-item"><img src="assets/img/rskgcare-icon/back-ok/sisrute.png" alt="" ><span>SIRS-RUTE</span></a>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                <a href="#" target="_blank" class="connection-item"><img src="assets/img/rskgcare-icon/back-ok/simaids.png" alt="" > <span>SIMAIDS</span></a>
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

