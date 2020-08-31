<?php 

$userid = $_SESSION['username'];
mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbname); 
$role = mysql_query("SELECT * FROM tb_user WHERE user_name = '$userid' ");
$access = mysql_fetch_array($role);

?>
<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="treeview">
        <a href="./index.php?ntf=0">
          <img src="assets/images/homehome.png" width="50px"><span>Home</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="assets/images/crr.png" width="50px"><span> EAM Tools</span>
          <i class="fa fa-angle-right pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="mdr_eam_log.php?ntf=0"> EAM Logbook</a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="assets/images/eamlogbook.png" width="50px"><span> CRR Tools</span>
          <i class="fa fa-angle-right pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="mdr_working_paper_nak.php?ntf=0"> Working Paper Kualitas NAK</a>
          </li>
          <li>
            <a href="mdr_working_paper_kk.php?ntf=0"> Working Paper Kualitas Kredit</a>
          </li>
          <li>
            <a href="mdr_working_paper_sl.php?ntf=0"> Working Paper Supervisi Loan Monitor</a>
          </li>
          <li>
            <a href="mdr_working_paper_pick_DMHR.php?ntf=0"> Working Paper Pick DMHR</a>
          </li>
          <li>
            <a href="mdr_working_paper_complete.php?ntf=0"> Working Paper Completed</a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="assets/images/dmhr1.png" width="50px"> <span> DMHR</span> 
          <i class="fa fa-angle-right pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="mdr_tindaklanjut.php?ntf=0"> Tindak Lanjut</a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="assets/images/dashboard.png" width="50px"><span> Reporting</span>
          <i class="fa fa-angle-right pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <!-- <li>
            <a href="mdr_rept_scoring.php?ntf=0"> Scoring</a>
          </li> -->
          <li>
            <a href="mdr_rept_quick_report.php?ntf=0"> Quick Report</a>
          </li>
          <li>
            <a href="mdr_rept_rekomendasi_report.php?ntf=0"> Recommendation Report</a>
          </li>
          <!-- <li>
            <a href="mdr_rept_us_wl.php?ntf=0"> Usulan Account Strategy</a>
          </li>
          <li>
            <a href="mdr_rept_.php?ntf=0"> Estimasi Kol</a>
          </li>
          <li>
            <a href="mdr_rept_quick_report.php?ntf=0"> Usulan Watchlist</a>
          </li> -->
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="assets/images/4288567andglobehandsinsuranceprotectionseoweb-115789_115724.png" width="50px"> <span> Customer Info</span> 
          <i class="fa fa-angle-right pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="http://www.facebook.com" target="_blank"> CBIC Corporate</a>
          </li>
          <li>
            <a href="http://www.twitter.com" target="_blank"> Tableu</a>
          </li>
          <li>
            <a href="http://www.instagram.com" target="_blank"> CMS</a>
          </li>
          <li>
            <a href="http://www.linkend.com" target="_blank"> IPS</a>
          </li>
          <li>
            <a href="#"> CAPS</a>
          </li>
          <li>
            <a href="#"> Eximbills</a>
          </li>
          <li>
            <a href="#"> WRS/CMA</a>
          </li>
          <li>
            <a href="#"> CCS</a>
          </li>
          <li>
            <a href="www.kmsdbsvrbl/kms_mandiri/ui/default.aspx"> KMS</a>
          </li>
          <li>
            <a href="#"> Logbook Commercial</a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="assets/images/report.png" width="50px"> <span> Dashboard</span>
          <i class="fa fa-angle-right pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="#"> Dashboard per Debitur</a>
          </li>
          <li>
            <a href="#"> Aktifitas per Reviewer</a>
          </li>
          <li>
            <a href="#"> Group</a>
          </li>
          <li>
            <a href="#"> Pemenuhan Data</a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="assets/images/admin.png" width="50px"><span> Admin</span>
          <i class="fa fa-angle-right pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="mdr_upload_Commercial.php?ntf=0"> Upload Commercial</a>
          </li>
          <li>
            <a href="mdr_upload_Corporate.php?ntf=0"> Upload Corporate</a>
          </li>
          <li>
            <a href="mdr_admin_usrmanage.php?ntf=0"> Users Management</a>
          </li>
          <li>
            <a href="mdr_admin_unitkerja.php?ntf=0"> Data Master Department</a>
          </li>
          <li>
            <a href="mdr_admin_news.php?ntf=0"> Master News CCS</a>
          </li>
        </ul>
      </li>
    </ul>
  </section>
  <footer class="site-footer">
    <div class="text-center">
      <small>Copyright &copy; 2019<a href="#"><font color="#1d2e61"><b> incubea</b></font></a><br>All rights reserved.<br><b>Version 1.0.0</b></small>
    </div>
  </footer>
</aside>

<style type="text/css">
  .treeview-menu {
    background: #f5eadc !important;
  }
  .treeview-menu > li > a {
    padding: 5px 5px 5px 5px !important;
    font-size: 10px !important;
    color: #191919 !important;
  }
  .treeview-menu > li > a:hover {
    color: #e4900e !important;
  }
  .skin-blue .sidebar-menu > li > a:hover, .skin-blue .sidebar-menu > li.active > a {
    color: #e4900e !important;
    background: #ffffff !important;
    border-left-color: #e4900e !important;
  }
</style>