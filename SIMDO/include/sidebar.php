<?php 
$user = $_SESSION['username'];
mysql_connect('localhost', 'root', '');
mysql_select_db('rskg_akreditasi'); 
$role = mysql_query("SELECT * FROM tb_user WHERE username = '$user' ");
$data = mysql_fetch_array($role);
/*VALIDATION FOR FILTER USER = ADMINISTARTOR ALL */
/*START VALIDATION AND SHOW MENU LIST*/
?>
<div class="nav-left-sidebar sidebar-dark">
  <div class="menu-list">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav flex-column">
          <li class="nav-divider">
            Menu
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="index.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="nav-icon fas fa-home"></i>Home</a>
          </li>
          <!-- ///////////////////////////////USER///////////////////////////////// -->
          <?php if ($data['user_role'] == 'user') { ?>
            <li class="nav-item ">
              <a class="nav-link" href="us_dashboard.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="nav-icon fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fas fa-file"></i>Form</a>
              <div id="submenu-2" class="collapse submenu" style="">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="us_pembuatan_dok.php?ntf=0">Pembuatan Dokumen</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="us_perubahan_dok.php?ntf=0">Perubahan Dokumen</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="us_penonaktif_dok.php?ntf=0">Pe-Non Aktifan Dokumen</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-divider">
              Features
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2"><i class="fas fa-clipboard-check"></i>Dokumen Publish</a>
              <div id="submenu-1-2" class="collapse submenu" style="">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="sis_publish_pembuatan.php?ntf=0">Publish Pembuatan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="sis_publish_perubahan.php?ntf=0">Publish Perubahan</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="nav-icon fas fa-clock"></i> History </a>
              <div id="submenu-6" class="collapse submenu" style="">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="his_pembuatan.php?ntf=0">History Pembuatan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="his_perubahan.php?ntf=0">History Perubahan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="his_penonaktif.php?ntf=0">History Pe-Non Aktifan</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="us_kode.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-cogs"></i>Bagian/Instalasi/Komite</a>
            </li>
          <?php } ?>
          <!-- ///////////////////////////////ADMIN///////////////////////////////// -->
          <?php if ($data['user_role'] == 'admin') { ?>
            <li class="nav-item ">
              <a class="nav-link" href="ad_dashboard.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="nav-icon fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fas fa-file"></i>Form</a>
              <div id="submenu-2" class="collapse submenu" style="">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="ad_pembuatan_dok.php?ntf=0">Pembuatan Dokumen</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="ad_perubahan_dok.php?ntf=0">Perubahan Dokumen</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="ad_penonaktif_dok.php?ntf=0">Pe-Non Aktifan Dokumen</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-divider">
              Features
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2"><i class="fas fa-clipboard-check"></i>Dokumen Publish</a>
              <div id="submenu-1-2" class="collapse submenu" style="">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="sis_ad_publish_pembuatan.php?ntf=0">Publish Pembuatan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="sis_ad_publish_perubahan.php?ntf=0">Publish Perubahan</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="nav-icon fas fa-clock"></i> History </a>
              <div id="submenu-6" class="collapse submenu" style="">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="his_pembuatan.php?ntf=0">History Pembuatan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="his_perubahan.php?ntf=0">History Perubahan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="his_penonaktif.php?ntf=0">History Pe-Non Aktifan</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-divider">
              Administrator Section
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="sis_kode.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-cogs"></i>Bagian/Instalasi/Komite</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="sis_users.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-users"></i>Manage Users</a>
            </li>
          <?php } ?>
          <!-- ///////////////////////////////SUPERADMIN///////////////////////////////// -->
          <?php if ($data['user_role'] == 'superadmin') { ?>
            <li class="nav-item ">
              <a class="nav-link" href="nota_intern.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-bookmark"></i>Nota Intern</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="agenda_rapat.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-calendar"></i>Agenda Rapat</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="surat_keputusan.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-clipboard"></i>Surat Keputusan</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="dokumen_eksternal.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Dokumen Eksternal</a>
            </li>
            <li class="nav-divider">
              Features
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="kode.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Kode Bagian/Instalasi/Komite</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="users.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-users"></i>Users</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </div>
</div>