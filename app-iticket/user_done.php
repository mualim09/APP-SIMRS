<?php 
include "include/connection.php";

// KODE AUTO TICKET
function kdauto($tabel, $no_tick){
  $struktur   = mysql_query("SELECT * FROM $tabel");
  $field      = mysql_field_name($struktur,0);
  $panjang    = mysql_field_len($struktur,0);
  $qry  = mysql_query("SELECT max(".$field.") FROM ".$tabel);
  $row  = mysql_fetch_array($qry);
  if ($row[0]=="") {
    $angka=1000;
  }
  else {
    $angka= substr($row[0], strlen($no_tick));
  }
  $angka++;
  $angka      =strval($angka);
  $tmp  ="";
  for($i=1; $i<=($panjang-strlen($no_tick)-strlen($angka)); $i++) {
    $tmp=$tmp."0";
  }
  return $no_tick.$tmp.$angka;
}
// DATE
function tanggal_indo($tanggal, $cetak_hari = false)
{
  $hari = array ( 1 =>    
    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
  );
  $bulan = array (1 =>   
    'Januari',
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
  <title>ITicket - Ticket Status: Done</title>
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
    width: 200px;
    height: 200px;
    background: #ffffff;
    border-radius: 100%;
  }

  .responsive img {
    max-width:100%;
    /*width:100%;*/
    height: auto;
  }
</style>
<body>
  <div class="dashboard-main-wrapper">
   <div class="dashboard-header">
    <?php include "include/header.php" ?>
  </div>
  <?php include "include/sidebar.php" ?>
  <div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Ticket Done Page</h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Monitoring Ticket</li>
                  <li class="breadcrumb-item active" aria-current="page">Ticket Done Page</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- ALERT -->
      <?php include 'include/alert/success.php' ?>
      <!-- END ALERT -->
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <div class="card-header">
              <span class="btn btn-info">Done</span>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>No. Ticket</th>
                      <th>Request date</th>
                      <th>Due date</th>
                      <th>Date respon</th>
                      <th>Subject</th>
                      <th>Status priority</th>
                      <th>Trouble about</th>
                      <th>Assign to</th>
                      <th>Progress</th>
                      <th>File</th>
                      <th>Detail remark IT</th>
                      <th>Detail laporan ticket</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $con=mysqli_connect("localhost","root","","rskg_ticket");
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $datax = $_SESSION['username'];
                    $result = mysqli_query($con,"SELECT * FROM tb_ticket WHERE email_user='$datax' AND progress='Done' ORDER BY no_tick ASC");

                    if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_array($result))
                      {
                        echo "<tr>";
                        echo "<td>".$row['id_tick'] . "</td>";
                        echo "<td>".$row['no_tick'] . "</td>";
                        echo "<td><button class='btn btn-dark'><i class='fa fas fa-clock'></i> ".$row['req_date'] . "</button></td>";
                        echo "<td><button class='btn btn-light'><i class='fa fas fa-clock'></i> ".$row['due_date'] . "</button></td>";
                        if ($row['date_progress']==NULL){
                          echo "<td><span class='badge badge-danger'>Belum direspon petugas</span></td>";
                        }else{
                          echo "<td><button class='btn btn-dark'><i class='fa fas fa-clock'></i> ".$row['date_progress'] . "</button></td>";
                        }
                        echo "<td>".$row['subject'] . "</td>";
                        echo "<td>".$row['priority'] . "</td>";
                        echo "<td>".$row['trouble'] . "</td>";
                        echo "<td>".$row['assign_to'] . "</td>";
                        if ($row['progress']=='New'){
                          echo "<td><span class='badge badge-danger'>New</span></td>";
                        }elseif ($row['progress']=='On Progress') {
                          echo "<td><span class='badge badge-warning'>On Progress</span></td>";
                        }elseif ($row['progress']=='Done') {
                          echo "<td><span class='badge badge-info'>Done</span></td>";
                        }
                        if ($row['proof']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td align='center'>
                          <a href='./assets/lampiran/$row[proof]' target='_blank'><img src='assets/images/icon/unnamed.png' width='40px'></a>
                          </td>";
                        }
                        if ($row['remark_it']==NULL){
                          echo "<td>empty</td>";
                        }else{
                         echo "<td>
                         <a href='#' data-toggle='modal' data-target='#lihat$row[id_tick]' title='Lihat Detail'><button class='btn btn-light'><i class='fa fas fa-eye'></i></button></a>
                         </td>";
                       }
                       echo "<td>
                       <a href='#' data-toggle='modal' data-target='#detail$row[id_tick]' title='Lihat Detail'><button class='btn btn-light'><i class='fa fas fa-eye'></i></button></a>
                       </td>";
                       echo "</tr>";
                       ?>

                       <!-- LIHAT REMARK IT -->
                       <div class="modal fade" id="lihat<?php echo $row['id_tick'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <label class="modal-title">Remark Petugas ITicket</label>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="">
                                <div class="form-group">
                                  <label>Detail Ticket</label>
                                  <h6>No. Ticket : <b><u><?php echo $row['no_tick'];?></u></b></h6>
                                  <h6>Subject : <b><u><?php echo $row['subject'];?></u></b></h6>
                                  <h6><u>Detail Masalah</u><br><p align="justify"><?php echo $row['detail'];?></p></h6>
                                </div>
                                <hr>
                                <h5 align="center">Detail Petugas ITicket</h5>
                                <hr>
                                <div class="form-group" align="center">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Remark IT</label>
                                      <textarea class="form-control" rows="3" name="remark_it" placeholder="Remark ..." readonly="readonly"><?php echo $row['remark_it'];?></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group" align="center">
                                  <label>Lihat Lampiran Remark Petugas</label>
                                  <br>
                                  <?php
                                  echo "<a href='./assets/lampiran/$row[remark_file]' target='_blank'><img src='assets/images/icon/unnamed.png' width='100px'></a>";
                                  ?>
                                </div>
                                <!-- <button type="submit" name="delete" class="btn btn-danger btn-block btn-flat">Yes</button> -->
                                <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Close</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- END LIHAT REMARK IT -->

                      <!-- DETAIL LAPORAN TICKET -->
                      <div class="modal fade" id="detail<?php echo $row['id_tick'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <label class="modal-title">Detail Laporan ITicket</label>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="">
                                <div class="form-group">
                                  <h6>No. Ticket : <b><u><?php echo $row['no_tick'];?></u></b></h6>
                                  <h6>Subject : <b><u><?php echo $row['subject'];?></u></b></h6>
                                  <h6><u>Detail Masalah</u><br><p align="justify"><?php echo $row['detail'];?></p></h6>
                                </div>
                                <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Close</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- END DETAIL LAPORAN TICKET -->

                    <?php } } mysqli_close($con); ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>No. Ticket</th>
                      <th>Request date</th>
                      <th>Due date</th>
                      <th>Date respon</th>
                      <th>Subject</th>
                      <th>Status priority</th>
                      <th>Trouble about</th>
                      <th>Assign to</th>
                      <th>Progress</th>
                      <th>File</th>
                      <th>Detail remark IT</th>
                      <th>Detail laporan ticket</th>
                    </tr>
                  </tfoot>
                </table>
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