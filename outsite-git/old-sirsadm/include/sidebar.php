<?php
include 'include/restrict.php';

mysql_connect('localhost', 'root', '');
mysql_select_db('rskg_sirsadm'); 
$result = mysql_query("SELECT * FROM tb_user WHERE username = '$user'");
$access = mysql_fetch_array($result);
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="index.php?ntf=0" class="brand-link">
    <img src="assets/img/all-rs/logo/sirs-adm1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light"><b>SIRS</b> ADM</span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="assets/img/faces/<?php echo $access['foto']; ?>" class="img-circle elevation-2" alt="User Image">
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
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php if ($access['role'] == 'admin') { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Agenda
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="agenda-surat-masuk.php?ntf=0" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agenda Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="agenda-surat-keluar.php?ntf=0" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agenda Surat Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="agenda-nota-intern.php?ntf=0" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agenda Nota Intern</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="laporan-kegiatan.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Laporan Kegiatan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-phone"></i>
              <p>
                Telepon
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="kontak-telepon.php?ntf=0" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kontak Telepon</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="telepon-keluar.php?ntf=0" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Telepon Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="extention-rskg.php?ntf=0" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Extention RSKG</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="seminar-workshop.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Seminar & Workshop
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ekspedisi-intern.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                Ekspedisi Intern RSKG
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hourglass"></i>
              <p>
                Respon Time Surat
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="respon-surat-masuk.php?ntf=0" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Respon Time Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="respon-surat-intern.php?ntf=0" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Respon Time Surat Intern</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="ad-user.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>
        <?php } ?>
        <?php if ($access['role'] == 'superadmin') { ?>
          <li class="nav-item">
            <a href="ad-user.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-group.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Gruop
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ad-setting.php?ntf=0" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Setting
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
