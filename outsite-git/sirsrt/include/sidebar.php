<?php
include 'include/restrict.php';

mysql_connect('localhost', 'root', '');
mysql_select_db('rskg_sirsrt'); 
$result = mysql_query("SELECT * FROM tb_user WHERE username = '$user'");
$access = mysql_fetch_array($result);
?>
<style type="text/css">
  .lingkaran1{
    width: 40px;
    height: 40px;
    background: transparent;
    border-radius: 0%;
  }

  .img{
    width: 40px;
    height: 40px;
    background: transparent;
    border-radius: 100%;
  }
</style>
<aside class="main-sidebar elevation-4 sidebar-dark-info">
  <div align="center">
    <a href="index.php?ntf=0" class="brand-link">
      <img src="assets/images/icon/logodef.png" alt="AdminLTE Logo" width="120px">
    </a>
  </div>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="assets/images/user/<?php echo $access['foto']; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $access['fullname']; ?></a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">NAVIGATION</li>
        <li class="nav-item">
          <a href="index.php?ntf=0" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        <?php if ($access['role'] == 'superadmin') { ?>
          <li class="nav-item">
            <a href="ad-ruangan.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Ruangan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-item.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Item Ruangan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-user.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-info.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Info
              </p>
            </a>
          </li>
        <?php } ?>
        <?php if ($access['role'] == 'admin') { ?>
          <li class="nav-header">LINEN</li>
          <li class="nav-item">
            <a href="ad-user.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Ruangan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-setting.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Item Ruangan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-info.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-info.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Info
              </p>
            </a>
          </li>
          <li class="nav-header">SUPIR</li>
          <li class="nav-item">
            <a href="ad-user.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Ruangan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-setting.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Item Ruangan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-info.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-info.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Info
              </p>
            </a>
          </li>
        <?php } ?>
        <?php if ($access['role'] == 'laundry') { ?>
          <li class="nav-item">
            <a href="ad-user.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-pasien.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-tint"></i>
              <p>
                Pasien
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-tindakan.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Tindakan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-setting.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Pengaturan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-info.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Info
              </p>
            </a>
          </li>
        <?php } ?>
        <?php if ($access['role'] == 'supir') { ?>
          <li class="nav-item">
            <a href="ad-user.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-pasien.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-tint"></i>
              <p>
                Pasien
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-tindakan.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Tindakan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-setting.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Pengaturan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-info.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Info
              </p>
            </a>
          </li>
        <?php } ?>
      </ul>
      <hr>
      <div align="center">
        <a href="surat-masuk-intern.php?ntf=0" class="nav-link">
          <p>
            Powered by
          </p>
          <img src="assets/img/rskgcare-icon/rskgcare.png" width="150px">
        </a>
      </div>
    </nav>
  </div>
</aside>
