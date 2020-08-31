<?php
// include 'include/restrict.php';

mysql_connect('localhost', 'root', '');
mysql_select_db('rskg_sirsper'); 
$result = mysql_query("SELECT * FROM tb_user WHERE username = '$user'");
$access = mysql_fetch_array($result);
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
<div class="header" style="background-color: #fff">
  <div class="container">
    <div class="row" style="padding-top: 10px">
      <div class="col-12">
        <div class="header-top-menu">
          <ul class="nav navbar-nav notika-top-nav">
            <!-- <li><img src="assets/images/user/<?php echo $access['foto']; ?>" class="lingkaran1"></li> -->
            <li><h5>
              <i style="color: #00c292" class="fa fa-calendar">&nbsp;</i>
              <body onload=display_ct();>
                <span id='ct' ></span>
              </body>
            </h5></li>
            <li><h5><b style="color: #00c292">&nbsp;Pengguna :</b> <?php echo $access['fullname']; ?></h5></li>
            <li><h5><b style="color: #00c292">&nbsp;- Active Role :</b> <?php echo $access['role']; ?></h5></li>
            <li><h5><b style="color: #00c292">&nbsp;- Unit :</b> <?php echo $access['unit']; ?></h5></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- HEADER -->
<div class="header-top-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="logo-area" align="center">
          <a href="index.php?ntf=0"><img src="assets/img/all-rs/logo-white.png" alt="" width="300px" /></a>
        </div>
      </div>
    </div>
  </div>
</div>