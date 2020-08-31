<?php 
$user = $_SESSION['username'];
mysql_connect('localhost', 'root', '');
mysql_select_db('rskg_dpa'); 
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
            Front Office
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="index.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="nav-icon fas fa-tachometer-alt"></i>Dashboard</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="transaksi.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-book"></i>Transaksi</a>
          </li>
          <li class="nav-divider">
            Backend Office
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="tindakan.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-th-list"></i>Tindakan</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="alkes.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-list-alt"></i>Alat Kesehatan</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="Pasien.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-user"></i>Pasien</a>
          </li>
          <li class="nav-divider">
            Laporan
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="lapmingguan.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-bookmark"></i>Laporan Mingguan</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="lapbulanan.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-bookmark"></i>Laporan Bulanan</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="laptahunan.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-bookmark"></i>Laporan Tahunan</a>
          </li>
          <li class="nav-divider">
            Sistem Eksekutif
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="users.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-users"></i>Pengguna</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>