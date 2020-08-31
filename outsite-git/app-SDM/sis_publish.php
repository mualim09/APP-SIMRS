<?php 
include "include/connection.php";

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
    <title>Manajemen Dokumen Akre | Publish Dokumen</title>
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
                            <h2 class="pageheader-title">Publish Dokumen</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Publish Dokumen</li>
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
                              <img src="assets/images/header.png" width="50px">
                              </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Pemohon</th>
                                                <th>Bagian</th>
                                                <th>Tanggal</th>
                                                <th>Usulan Dokumen</th>
                                                <th>Dokumen</th>
                                                <th>Judul</th>
                                                <th>No. Dokumen</th>
                                                <th>Tgl Mulai Berlaku</th>
                                                <th>File</th>
                                                <th>Status Pengecekan</th>
                                                <th>Tanggal Publish</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $con=mysqli_connect("localhost","root","","rskg_akreditasi");
                                            if (mysqli_connect_errno())
                                            {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }
                                            $datax = $_SESSION['username'];
                                            $result = mysqli_query($con,"SELECT * FROM tb_ppd WHERE username='$datax' AND status_pengecekan='Disetujui' ORDER BY id_peru DESC");

                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['id_peru'] . "</td>";
                                                    echo "<td>".$row['pemohon'] . "</td>";
                                                    echo "<td>".$row['bagian'] . "</td>";
                                                    echo "<td>".tanggal_indo($row['tanggal'], true) . "</td>";
                                                    echo "<td>".$row['dokumen'] . "</td>";
                                                    echo "<td>".$row['pem_dokumen'] . "</td>";
                                                    echo "<td>".$row['pem_judul'] . "</td>";
                                                    if ($row['pem_no_dok']==NULL) {
                                                      echo "<td>Belum memiliki No. Dokumen</td>";
                                                    }else{
                                                      echo "<td>".$row['pem_no_dok'] . "</td>";
                                                    }
                                                    if ($row['pem_tgl_berlaku']==NULL) {
                                                      echo "<td>Belum memiliki Tgl Berlaku</td>";
                                                    }else{
                                                      echo "<td>".tanggal_indo($row['pem_tgl_berlaku'], true) . "</td>";
                                                    }
                                                    if ($row['upload_lam']==NULL){
                                                        echo "<td>empty</td>";
                                                      }else{
                                                        echo "<td align='center'>
                                                        <a href='./assets/file/pembuatan_dokumen/file/$row[upload_lam]' target='_blank'><img src='assets/images/icon/unnamed.png' width='40px'></a>
                                                        </td>";
                                                    }
                                                    if ($row['status_pengecekan']=='New') {
                                                        echo "<td><span class='badge badge-danger'>Belum Respon Petugas</span></td>";
                                                      }elseif ($row['status_pengecekan']=='Revisi') {
                                                        echo "<td>
                                                        <a href='#' data-toggle='modal' data-target='#edit$row[id_peru]' title='Lihat Revisi'><span class='badge badge-warning'>Lihat Keterangan Revisi</span></a>
                                                        </td>";                                                      
                                                      }elseif ($row['status_pengecekan']=='Disetujui') {
                                                        echo "<td><span class='badge badge-info'>Disetujui</span></td>";
                                                      }
                                                    echo "<td>".tanggal_indo($row['date_verify'], true) . "</td>";
                                                    echo "</tr>";
                                                    ?>
                                                <?php } } mysqli_close($con); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                  <th>ID</th>
                                                  <th>Pemohon</th>
                                                  <th>Bagian</th>
                                                  <th>Tanggal</th>
                                                  <th>Usulan Dokumen</th>
                                                  <th>Dokumen</th>
                                                  <th>Judul</th>
                                                  <th>No. Dokumen</th>
                                                  <th>Tgl Mulai Berlaku</th>
                                                  <th>File</th>
                                                  <th>Status Pengecekan</th>
                                                  <th>Tanggal Publish</th>
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