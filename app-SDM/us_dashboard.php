<?php 
include "include/connection.php";
$result = mysql_query("SELECT * FROM tb_user WHERE username = '$user'");
$data = mysql_fetch_array($result);

// DATE
function tanggal_indo($tanggal, $cetak_hari = false)
{
  $hari = array ( 1 =>    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
  );
  $bulan = array (1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $split    = explode('-', $tanggal);
  $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

  if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo;
  }
  return $tgl_indo;
}

// $dataxs = $data['username'];
// $dashboard_sw = mysql_query("SELECT COUNT(*) AS total_sw FROM tb_ppd WHERE dokumen='Software' AND email_user='dataxs'");
// $dashboard_hw = mysql_query("SELECT COUNT(*) AS total_hw FROM tb_ppd WHERE dokumen='Hardware' AND email_user='dataxs'");
// $dashboard_pt = mysql_query("SELECT COUNT(*) AS total_pt FROM tb_ppd WHERE dokumen='Printer' AND email_user='dataxs'");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/libs/css/style.css">
  <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
  <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
  <title>SIMDO | Dashboard</title>
  <link rel="icon" type="assets/image/png" href="assets/images/logo/logo.png"/>
</head>
<style type="text/css">
  .lingkaran1{
    width: 40px;
    height: 40px;
    background: #ffffff;
    border-radius: 100%;
  }

  .lingkaran{
    width: 150px;
    height: 150px;
    background: #ffffff;
    border-radius: 100%;
  }
</style>
<body>
  <div class="dashboard-main-wrapper">
    <div class="dashboard-header">
      <?php include "include/header.php" ?>
    </div>
    <?php include "include/sidebar.php" ?>
    <div class="dashboard-wrapper">
      <div class="dashboard-influence">
        <div class="container-fluid dashboard-content">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="page-header">
                <h3 class="mb-2">Dashboard Dokumen</h3>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <!-- ALERT -->
          <?php include 'include/alert/success.php' ?>
          <!-- END ALERT -->
          <div align="center">
            <h2>Monitoring Progres Dokumen </h2><h3><?php echo tanggal_indo(date('Y-m-d')); ?></h3>
            <hr>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div align="center">
                <h5>Total Dokumen Yang Diajukan</h5>
              </div>
            </div>
            <div class="col-xl-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-inline-block">
                    <h5 class="text-muted">Pembuatan Dokumen</h5>
                    <?php
                    $con=mysqli_connect("localhost","root","","rskg_akreditasi");
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $datax = $_SESSION['username'];
                    $result = mysqli_query($con,"SELECT COUNT(*) AS total_sw FROM tb_ppd WHERE dokumen='Pembuatan' AND username='$datax'");

                    if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_array($result))
                      {
                        echo "<h2 class='mb-0'>".$row['total_sw'] . "</h2>";
                        ?>

                      <?php } } mysqli_close($con); ?>
                    </div>
                    <div class="float-right icon-circle-medium icon-box-lg bg-primary-light mt-1">
                      <i class="fa fa-file fa-fw fa-sm text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-inline-block">
                      <h5 class="text-muted">Perubahan Dokumen</h5>
                      <?php
                      $con=mysqli_connect("localhost","root","","rskg_akreditasi");
                      if (mysqli_connect_errno())
                      {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      }
                      $datax = $_SESSION['username'];
                      $result = mysqli_query($con,"SELECT COUNT(*) AS total_hw FROM tb_ppd WHERE dokumen='Perubahan' AND username='$datax'");

                      if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result))
                        {
                          echo "<h2 class='mb-0'>".$row['total_hw'] . "</h2>";
                          ?>
                          
                        <?php } } mysqli_close($con); ?>
                      </div>
                      <div class="float-right icon-circle-medium icon-box-lg bg-primary-light mt-1">
                        <i class="fa fa-file fa-fw fa-sm text-info"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-inline-block">
                        <h5 class="text-muted">Pe-Non Aktifan Dokumen</h5>
                        <?php
                        $con=mysqli_connect("localhost","root","","rskg_akreditasi");
                        if (mysqli_connect_errno())
                        {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
                        $datax = $_SESSION['username'];
                        $result = mysqli_query($con,"SELECT COUNT(*) AS total_pt FROM tb_ppd WHERE dokumen='Nonaktif' AND username='$datax'");

                        if(mysqli_num_rows($result)>0){
                          while($row = mysqli_fetch_array($result))
                          {
                            echo "<h2 class='mb-0'>".$row['total_pt'] . "</h2>";
                            ?>

                          <?php } } mysqli_close($con); ?>
                        </div>
                        <div class="float-right icon-circle-medium icon-box-lg bg-primary-light mt-1">
                          <i class="fa fa-file fa-fw fa-sm text-info"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="col-xl-12">
                    <div align="center">
                      <h5>Dokumen Publish</h5>
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-inline-block">
                          <h5 class="text-muted">Pembuatan Dokumen</h5>
                          <?php
                          $con=mysqli_connect("localhost","root","","rskg_akreditasi");
                          if (mysqli_connect_errno())
                          {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          }
                          $datax = $_SESSION['username'];
                          $result = mysqli_query($con,"SELECT COUNT(*) AS total_sw FROM tb_ppd WHERE dokumen='Pembuatan' AND username='$datax' AND publish='OK' ");

                          if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result))
                            {
                              echo "<h2 class='mb-0'>".$row['total_sw'] . "</h2>";
                              ?>

                            <?php } } mysqli_close($con); ?>
                          </div>
                          <div class="float-right icon-circle-medium icon-box-lg bg-primary-light mt-1">
                            <i class="fa fa-file fa-fw fa-sm text-info"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-inline-block">
                            <h5 class="text-muted">Perubahan Dokumen</h5>
                            <?php
                            $con=mysqli_connect("localhost","root","","rskg_akreditasi");
                            if (mysqli_connect_errno())
                            {
                              echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            }
                            $datax = $_SESSION['username'];
                            $result = mysqli_query($con,"SELECT COUNT(*) AS total_hw FROM tb_ppd WHERE dokumen='Perubahan' AND username='$datax' AND publish='OK'");

                            if(mysqli_num_rows($result)>0){
                              while($row = mysqli_fetch_array($result))
                              {
                                echo "<h2 class='mb-0'>".$row['total_hw'] . "</h2>";
                                ?>

                              <?php } } mysqli_close($con); ?>
                            </div>
                            <div class="float-right icon-circle-medium icon-box-lg bg-primary-light mt-1">
                              <i class="fa fa-file fa-fw fa-sm text-info"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="d-inline-block">
                              <h5 class="text-muted">Pe-Non Aktifan Dokumen</h5>
                              <?php
                              $con=mysqli_connect("localhost","root","","rskg_akreditasi");
                              if (mysqli_connect_errno())
                              {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                              }
                              $datax = $_SESSION['username'];
                              $result = mysqli_query($con,"SELECT COUNT(*) AS total_pt FROM tb_ppd WHERE dokumen='Nonaktif' AND username='$datax' AND publish='OK'");

                              if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_array($result))
                                {
                                  echo "<h2 class='mb-0'>".$row['total_pt'] . "</h2>";
                                  ?>

                                <?php } } mysqli_close($con); ?>
                              </div>
                              <div class="float-right icon-circle-medium icon-box-lg bg-primary-light mt-1">
                                <i class="fa fa-file fa-fw fa-sm text-info"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php include "include/footer.php" ?>
              <?php include 'include/thirdparty.php'; ?>
            </body>
            </html>