<?php 
include 'include/restrict.php';
include 'include/connection.php';

mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbname); 
$result = mysql_query("SELECT * FROM tb_user WHERE user_name = '$user'");
$data = mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<?php include 'include/head.php';?>

<body class="skin-blue">
  <?php include 'include/header.php';?>
  <?php include 'include/sidebar.php';?>

  <!-- SHOW FIRTS MODAL REMINDER -->
  <!-- <button id="button_modal" type="button" data-toggle="modal" data-target="#myModal" style="display:none">Open Modal</button> -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="col-md-12 login-box-body">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div>
            <img src="assets/images/mandiri-logo.png" width="150px">
            <h3 align="left" class="modal-title"><b>CCS Reminder</b></h3>
          </div>
        </div>
        <div class="modal-body">
          <div class="box-body table-responsive no-padding">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><font style="font-size: 12px">No.</font></th>
                  <th><font style="font-size: 12px">Unit Kerja</font></th>
                  <th><font style="font-size: 12px">Debitur</font></th>
                  <th><font style="font-size: 12px">CIF</font></th>
                  <!-- <th><font style="font-size: 12px">Dashboard</font></th> -->
                  <th><font style="font-size: 12px">Deadline</font></th>
                  <th><font style="font-size: 12px">Update Tindak Lanjut</font></th>
                  <th><font style="font-size: 12px">Status</font></th>
                  <th><font style="font-size: 12px">Periode</font></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $con=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
                  // Check connection
                if (mysqli_connect_errno())
                {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $result = mysqli_query($con,"SELECT 
                a.id_par,
                a.id_logbook, 
                b.CIF,
                b.CBC_NAME,
                b.month_logbook,
                b.nm_customer, 
                b.reviewer,
                b.status_tindaklanjut, 
                a.status_ccr,
                a.dashboard,
                a.tindak_lanjut,
                a.target_date,
                a.process_date,
                a.status 
                FROM tb_parameter a JOIN tb_upload_logbook b
                ON a.id_logbook=b.id_logbook WHERE b.status_tindaklanjut='YES' AND a.tindak_lanjut='Yes' AND b.reviewer=".$_SESSION['userid']." ORDER BY b.CIF");       
                if(mysqli_num_rows($result)>0){
                  $no = 0;
                  while($row = mysqli_fetch_array($result))
                  {
                    $no++;
                      echo "<tr>";
                      echo "<td><font style='font-size: 12px'><b>" . $no . ".</b></font></td>";
                      echo "<td><font style='font-size: 12px'>" . $row['CBC_NAME'] . "</font></td>";
                      echo "<td><font style='font-size: 12px'>" . $row['nm_customer'] . "</font></td>";
                      echo "<td><font style='font-size: 12px'>" . $row['CIF'] . "</font></td>";
                      // echo "<td><font style='font-size: 12px'>" . $row['status_ccr'] . "</font></td>";
                      // echo "<td><font style='font-size: 12px'>" . $row['dashboard'] . "</font></td>";
                      echo "<td><font style='font-size: 12px'>" . $row['target_date'] . "</font></td>";
                      echo "<td><font style='font-size: 12px'>" . $row['process_date'] . "</font></td>";
                      echo "<td><font style='font-size: 12px'>" . $row['status'] . "</font></td>";
                      echo "<td><font style='font-size: 12px'>" . $row['month_logbook'] . "</font></td>";
                      echo "</tr>";
                    ?>
                    <?php
                  }
                } 
                mysqli_close($con);
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">

        <div class="row">
          <div class="col-md-12">
            <div class="box box-solid">
              <div class="box-body text-center">
                <!-- <img src="assets/images/mandiri-logo.png" width="250px"> -->
                <h4><b><font style="color: #1d2f5e">Application Credit Control </font><font style="color: #f7c103">&nbsp;& Supervision Group</font></b></h4>
                <!-- <marquee><h1><b>Welcome back</b></h1></marquee> -->
              </div>
            </div>
            <!-- /.box -->
          </div>

          <!-- /.col  -->
          <div class="col-md-12">
            <div class="box box-solid">
              <div class="box-body text-center">
                <h3 class="box-title"><font color="#1d2e61"><b><u>Visi</u></b></font></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="text-center">
                  Menjadi unit credit risk review handal & kredibel yang berperan sebagai strategic partner
                </div>
              </div>
              <!-- /.box-body -->


              <div class="box-body text-center">
                <h3 class="box-title"><font color="#1d2e61"><b><u>Misi</u></b></font></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="text-center">
                  (1) Melaksanakan <i>credit risk review</i> secara independen dan objektif dengan memberikan nilai tambah
                </div>
                <div class="text-center">
                  (2) Mengevaluasi efektivitas <i>internal control, risk management</i>, dan <i>governance process</i> melalui <i>feedback</i> proses <i>end to end</i> perkreditan
                </div>
                <div class="text-center">
                  (3) Mengelola aktivitas group secara efektif dan efisien <i>(operational excellence)</i>
                </div>
                <div class="text-center">
                  (4) Mengembangkan kompetensi <i>reviewer</i> dan mengintensifkan penggunaan <i>tools</i> dan <i>database</i>
                </div>
                <div class="text-center">
                  (5) Meningkatkan sinergi fungsi control perkreditan dengan unit terkait (CPR, OPR, SORH, WRS, DIA)
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="  glyphicon glyphicon-duplicate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Working Paper<br> Kualitas NAK</span>
                <span class="info-box-number">90</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="  glyphicon glyphicon-duplicate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Working Paper<br> Kualitas Kredit</span>
                <span class="info-box-number">90</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="  glyphicon glyphicon-duplicate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Working Paper Supervisi<br> Loan Monitoring</span>
                <span class="info-box-number">90</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="  glyphicon glyphicon-duplicate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Working Paper<br> Completed</span>
                <span class="info-box-number">90</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="  glyphicon glyphicon-duplicate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">DMHR<br> Tindak Lanjut</span>
                <span class="info-box-number">90</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="  glyphicon glyphicon-duplicate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Quick<br> Report</span>
                <span class="info-box-number">90</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="  glyphicon glyphicon-duplicate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Recommendation<br> Report</span>
                <span class="info-box-number">90</span>
              </div>
            </div>
          </div> -->

<!--           <div class="col-md-6">
            <div class="box box-solid">
              <div class="box-body">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="assets/images/4.jpg" style="width:570px; height: 300px" alt="First slide">
                    </div>
                    <div class="item">
                      <img src="assets/images/lowongan-kerja-bank-mandiri.jpg" style="width:570px; height: 300px" alt="Second slide">
                    </div>
                    <div class="item">
                      <img src="assets/images/asd3.jpg" style="width:570px; height: 300px" alt="Third slide">
                    </div>
                  </div>
                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                  </a>
                </div>
              </div>
            </div>
          </div> -->

          <!-- <div class="col-md-6">
           <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">
                <span class="label label-warning pull-right">Hot News</span>
              </h3>
            </div>
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Samsung TV</a>
                    <span class="product-description">
                      Samsung 32" 1080p 60Hz LED Smart HDTV.
                    </span>
                  </div>
                </li>
                <li class="item">
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Bicycle</a>
                    <span class="product-description">
                      26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                    </span>
                  </div>
                </li>
                <li class="item">
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Xbox One</a>
                    <span class="product-description">
                      Xbox One Console Bundle with Halo Master Chief Collection.
                    </span>
                  </div>
                </li>
                <li class="item">
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">PlayStation 4</a>
                    <span class="product-description">
                      PlayStation 4 500GB Console (PS4)
                    </span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div> -->

      <!-- Main row -->
      <!-- <div class="row">
        <div class="col-md-12">
          <div class="info-box" style="background-color: #ffffff">
           <div class="info-box-content">
          <div class="text-center">
            <img src="assets/images/mandiri-logo.png" width="200px"><br>
            <a target="_blank" href="#" class="btn btn-neutral btn-icon btn-twitter btn-round" rel="tooltip" data-original-title="Follow us">
              <i class="fa fa-twitter"></i>
            </a>
            <a target="_blank" href="#" class="btn btn-neutral btn-icon btn-twitter btn-round" rel="tooltip" data-original-title="Follow us">
              <i class="fa fa-instagram"></i>
            </a>
            <a target="_blank" href="#" class="btn btn-neutral btn-icon btn-twitter btn-round" rel="tooltip" data-original-title="Follow us">
              <i class="fa fa-facebook"></i>
            </a>
            <a target="_blank" href="#" class="btn btn-neutral btn-icon btn-twitter btn-round" rel="tooltip" data-original-title="Follow us">
              <i class="fa fa-google"></i>
            </a>
          </div><br>
          <div class="text-center">
            <h4><b><font style="color: #1d2f61">Bank Mandiri || All rights reserved. Version 1.0.0</font></b></h4>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- /.row -->
</section>
<!-- /.content -->
</div><!-- <div class="content-wrapper"> -->
</div><!-- <div class="wrapper"> -->

  <!-- FOOTER -->
  <?php include 'include/jquery.php'; ?>
</body>
</html>