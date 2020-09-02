<?php 
$user = $_SESSION['username'];
mysql_connect('localhost', 'root', '');
mysql_select_db('rskg_formit'); 
$role = mysql_query("SELECT * FROM tb_user WHERE username = '$user' ");
$data = mysql_fetch_array($role);
?>
<div class="nav-left-sidebar sidebar-dark">
  <div class="menu-list">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="d-xl-none d-lg-none" href="logout.php">Logout</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav flex-column">
          <?php if ($data['user_role'] == 'superadmin') { ?>
            <li class="nav-divider">
              FrontOffice
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-home"></i>Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="sa_dashboard.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li class="nav-divider">
              BackOffice
            </li>
            <!-- <li class="nav-item ">
              <a class="nav-link" href="sa_faq.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-question"></i>Create FAQ</a>
            </li> -->
            <li class="nav-item ">
              <a class="nav-link" href="sa_kritik_saran.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-flag"></i>Look Kritik & Saran</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="sa_kode.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Kode Bagian/Instalasi/Komite</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="sa_users.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-users"></i>Manage Users</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="sa_perangkat.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-laptop"></i>Perangkat IT</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="sa_history.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa far fa-clock"></i>History Ticket</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="pemberitahuan.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa far fa-bullhorn"></i>Pemberitahuan</a>
            </li>
          <?php } ?>
          <?php if ($data['user_role'] == 'user') { ?>
            <li class="nav-divider">
              FrontOffice
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="nav-icon fas fa-home"></i>Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="user_dashboard.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="nav-icon fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="user_create_ticket.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-tag"></i>Create Ticket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fas fa-laptop"></i>Minitoring Ticket</a>
              <div id="submenu-2" class="collapse submenu" style="">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="user_onprogress.php?ntf=0">On Porgress</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="user_done.php?ntf=0">Done</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-divider">
              BackOffice
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="user_history_ticket.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa far fa-clock"></i>History Ticket</a>
            </li>
            <!-- <li class="nav-item ">
              <a class="nav-link" href="user_FAQ.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-question"></i>FAQ</a>
            </li> -->
            <li class="nav-item ">
              <a class="nav-link" href="user_kritik_saran.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-flag"></i>Kritik/Saran</a>
            </li>
          <?php } ?>
          <?php if ($data['user_role'] == 'it_software') { ?>
            <li class="nav-divider">
              FrontOffice
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="nav-icon fas fa-home"></i>Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="sw_admin_dashboard.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="nav-icon fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <!-- <li class="nav-item ">
              <a class="nav-link" href="sw_admin_task_ticket.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-tags"></i>Task Ticket</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fas fa-tags"></i>Task Ticket</a>
              <div id="submenu-2" class="collapse submenu" style="">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="sw_admin_task_ticket.php?ntf=0">New Ticket</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="sw_admin_task_ticket_onprogress.php?ntf=0">On Porgress</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="sw_admin_task_ticket_done.php?ntf=0">Done</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-divider">
              Executive System
            </li>
            <!-- <li class="nav-item ">
              <a class="nav-link" href="sw_admin_report_week.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Report Week</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="sw_admin_report_month.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Report Month</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="sw_admin_report_year.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Report Year</a>
            </li> -->
            <li class="nav-item ">
              <a class="nav-link" href="sw_admin_history_ticket.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa far fa-clock"></i>History Ticket</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="sw_admin_report.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Report ITicket</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="pemberitahuan.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa far fa-bullhorn"></i>Pemberitahuan</a>
            </li>
          <?php } ?>
          <?php if ($data['user_role'] == 'it_hardware') { ?>
            <li class="nav-divider">
              FrontOffice
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="nav-icon fas fa-home"></i>Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="hw_admin_dashboard.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="nav-icon fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <!-- <li class="nav-item ">
              <a class="nav-link" href="hw_admin_task_ticket.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-tags"></i>Task Ticket</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fas fa-tags"></i>Task Ticket</a>
              <div id="submenu-2" class="collapse submenu" style="">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="hw_admin_task_ticket.php?ntf=0">New Ticket</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="hw_admin_task_ticket_onprogress.php?ntf=0">On Porgress</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="hw_admin_task_ticket_done.php?ntf=0">Done</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-divider">
              Executive System
            </li>
            <!-- <li class="nav-item ">
              <a class="nav-link" href="hw_admin_report_week.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Report Week</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="hw_admin_report_month.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Report Month</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="hw_admin_report_year.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Report Year</a>
            </li> -->
            <li class="nav-item ">
              <a class="nav-link" href="hw_admin_history_ticket.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa far fa-clock"></i>History Ticket</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="hw_admin_report.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Report ITicket</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="pemberitahuan.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa far fa-bullhorn"></i>Pemberitahuan</a>
            </li>
          <?php } ?>
          <?php if ($data['user_role'] == 'printer_task') { ?>
            <li class="nav-divider">
              FrontOffice
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="nav-icon fas fa-home"></i>Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="pr_admin_dashboard.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="nav-icon fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <!-- <li class="nav-item ">
              <a class="nav-link" href="pr_admin_task_ticket.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-tags"></i>Task Ticket</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fas fa-tags"></i>Task Ticket</a>
              <div id="submenu-2" class="collapse submenu" style="">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="pr_admin_task_ticket.php?ntf=0">New Ticket</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pr_admin_task_ticket_onprogress.php?ntf=0">On Porgress</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pr_admin_task_ticket_done.php?ntf=0">Done</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-divider">
              Executive System
            </li>
            <!-- <li class="nav-item ">
              <a class="nav-link" href="pr_admin_report_week.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Report Week</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="pr_admin_report_month.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Report Month</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="pr_admin_report_year.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Report Year</a>
            </li> -->
            <li class="nav-item ">
              <a class="nav-link" href="pr_admin_history_ticket.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa far fa-clock"></i>History Ticket</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="pr_admin_report.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fas fa-file"></i>Report ITicket</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="pemberitahuan.php?ntf=0" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa far fa-bullhorn"></i>Pemberitahuan</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </div>
</div>