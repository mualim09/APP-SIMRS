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

// EDIT
if(isset($_POST["updatedok"]))    
{    
  $id_peru           = $_POST['id_peru'];
  $non_tgl           = $_POST['non_tgl'];
  $username          = $_POST['username'];
  $date_verify       = $_POST['date_verify'];
  $verify            = $_POST['verify'];
  $status_pengecekan = $_POST['status_pengecekan'];
  $non_dokumen       = $_POST['non_dokumen'];
  $non_judul         = $_POST['non_judul'];
  $kode              = $_POST['kode'];

  $query = mysql_query("UPDATE tb_ppd SET 
    non_tgl ='$non_tgl',
    date_verify ='$date_verify',
    verify ='$verify',
    status_pengecekan ='$status_pengecekan'
    WHERE id_peru ='$id_peru'");

  $query .= mysql_query("UPDATE tb_ppd_his SET 
    his_non_tgl ='$non_tgl',
    his_date_verify ='$date_verify',
    his_verify ='$verify',
    his_status_pengecekan ='$status_pengecekan'
    WHERE id_his ='$id_peru'");

  $query .= mysql_query("INSERT INTO tb_notif 
    (id_notif,username,dokumen,judul,kode,date_notif)
    VALUES 
    ('','$username','$non_dokumen','$non_judul','$kode','$date_verify')
    "); 


  if($query){
    header("Location: ./ad_penonaktif_dok.php?ntf=402");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 


// PENONAKTFIAN DOKUMEN
// if(isset($_POST["nonaktif"]))    
// {    
//   $id_peru           = $_POST['id_peru'];
//   $publish           = $_POST['publish'];
//   $date_verify       = $_POST['date_verify'];

//   $query = mysql_query("UPDATE tb_ppd SET 
//     publish = '$publish',
//     date_verify = '$date_verify'
//     WHERE id_peru ='$id_peru'");

//   $query .= mysql_query("UPDATE tb_ppd_his SET 
//     his_publish = '$publish',
//     his_date_verify = '$date_verify'
//     WHERE id_his ='$id_peru'");

//   if($query){
//     header("Location: ./ad_penonaktif_dok.php?ntf=4");                                                  
//   } else {
//     echo "Updated Failed - Please contact your Administrator";
//   }
// } 

// AKTFIKAN DOKUMEN
if(isset($_POST["tarik"]))    
{    
  $id_peru           = $_POST['id_peru'];
  $non_tgl           = $_POST['non_tgl'];
  $date_verify       = $_POST['date_verify'];
  $verify            = $_POST['verify'];
  $username          = $_POST['username'];
  $non_dokumen       = $_POST['non_dokumen'];
  $non_judul         = $_POST['non_judul'];
  $kode              = $_POST['kode'];

  $query = mysql_query("UPDATE tb_ppd SET 
    non_tgl = NULL
    WHERE id_peru ='$id_peru'");

  $query .= mysql_query("UPDATE tb_ppd_his SET 
    his_non_tgl = NULL
    WHERE id_his ='$id_peru'");
  
  $query .= mysql_query("INSERT INTO tb_notif 
    (id_notif,username,dokumen,judul,kode,date_notif)
    VALUES 
    ('','$username','$non_dokumen','$non_judul','$kode','$date_verify')
    "); 

  if($query){
    header("Location: ./ad_penonaktif_dok.php?ntf=400");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
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
  <title>SIMDO | Pe-Non Aktifan Dokumen</title>
  <link rel="icon" type="assets/image/png" href="assets/images/logo/logo.png"/>
  <!-- CKEDITOR -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
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
            <h2 class="pageheader-title">Form Pe-Non Aktifan Dokumen</h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Form</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form Pe-Non Aktifan Dokumen</li>
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
              <label>Pe-Non Aktifan (<i>OBSOLETE</i>) Dokumen</label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                  <thead align="center">
                    <tr>
                      <th>ID</th>
                      <th>Kode</th>
                      <th>Detail Dokumen</th>
                      <th>Tanggal Penon-Aktifan</th>
                      <th>Form Awal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $con=mysqli_connect("localhost","root","","rskg_akreditasi");
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $result = mysqli_query($con,"SELECT * FROM tb_ppd WHERE dokumen='Nonaktif' AND publish is NULL ORDER BY id_peru DESC");

                    if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_array($result))
                      {
                        echo "<tr align='center'>";
                        echo "<td>".$row['id_peru'] . "</td>";
                        echo "<td>".$row['kode'] . "</td>";
                        if ($row['pemohon']==NULL) {
                          echo "<td>Tidak Memiliki Isi Dokumen</td>";
                        }else{
                          echo "<td align='center'>
                          <a href='#' data-toggle='modal' data-target='#lihatdok$row[id_peru]' title='Lihat Detail Dokumen'><button class='btn btn-dark btn-sm'>Lihat</button></a>
                          </td>";
                        }
                        if ($row['non_tgl']==NULL) {
                         echo "<td>
                         <a href='#' data-toggle='modal' data-target='#updatenodok$row[id_peru]' title='Input No. Dokumen'><span class='btn btn-dark btn-sm'>Lengkapi</span></a>
                         </td>";
                       }else{
                        echo "<td><small>Dokumen ini telah di non-aktifkan pada tanggal</small><br>".tanggal_indo($row['non_tgl'], true) . "</td>";
                      }
                      echo "<td>
                      <a href='assets/file/template/formppd.php?id=$row[id_peru]' title='Print Dokumen'><span class='btn btn-rounded btn-dark'><font style='font-size: 10px'><i class='fa fas fa-print'></i></font></span></a>
                      </td>";
                      if ($row['non_tgl']==NULL) {
                        echo "<td align='center'><buton class='btn btn-dark btn-sm'><i class='fa fas fa-hourglass' title='Belum Respon Petugas'></i></buton></td>";
                      }else{
                       // echo "<td>
                       // <a href='#' data-toggle='modal' data-target='#nonaktifkan$row[id_peru]' title='Nonaktifkan'><span class='btn btn-dark btn-sm'><i class='fas fa-ban'></i> </span></a>
                       // </td>"; 
                        echo "<td>
                        <a href='#' data-toggle='modal' data-target='#aktifkan$row[id_peru]' title='Nonaktifkan'><span class='btn btn-dark btn-sm'><i class='fas fa-share'></i> </span></a>
                        </td>"; 
                      }
                      echo "</tr>";
                      ?>

                      <!-- LIHAT DOKUMEN -->
                      <div class="modal fade" id="lihatdok<?php echo $row['id_peru'];?>" role="dialog">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Detail Dokumen</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="" method="POST">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <h5><b>Kode :</b> <?php echo $row['kode'];?></h5>
                                      <h5><b>Pemohon :</b> <?php echo $row['pemohon'];?></h5>
                                      <h5><b>Bagian :</b> <?php echo $row['bagian'];?></h5>
                                      <h5><b>Tanggal :</b> <?php echo tanggal_indo($row['tanggal'], true) ?></h5>
                                      <h5><b>Dokumen :</b> <?php echo $row['non_dokumen'];?></h5>
                                      <h5><b>Judul :</b> <?php echo $row['non_judul'];?></h5>
                                      <h5><b>No. Dokumen :</b> 
                                        <?php
                                        if ($row['non_no_dok']==NULL) {
                                          echo "<i>Belum Memiliki No. Dokumen</i>";
                                        }
                                        echo $row['non_no_dok'];
                                        ?>
                                      </h5>
                                      <h5><b>Tanggal Penon-Aktifan :</b> 
                                        <?php
                                        if ($row['non_tgl']==NULL) {
                                          echo "<i>Belum Di Nonaktifkan Oleh Petugas</i>";
                                        }
                                        echo $row['non_tgl'];
                                        ?>
                                      </h5>
                                      <hr>
                                      <div align="center">
                                        <h5>Dokumen Yang Akan Di Non-Aktifkan</h5>
                                      </div>
                                      <?php
                                      if ($row['upload_lam']==NULL){
                                        echo "<td>empty</td>";
                                      }else{
                                        echo "
                                        <div align='center'>
                                        <a href='./assets/file/perubahan/user/$row[upload_lam]' target='_blank'><img src='assets/images/icon/file.png' width='90px'></a>
                                        </div>
                                        ";
                                      }
                                      ?>
                                    </div>
                                    <label><b><font style="color: black">Status Revisi :</font></b></label> <button class="btn btn-warning btn-sm"><?php echo $row['non_status_revisi'];?></button>
                                    <h5><b>Alasan Penonaktifan :</b></h5>
                                    <textarea class="form-control" readonly="readonly"><?php echo $row['non_alasan']; ?></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- END LIHAT DOKUMEN -->

                      <!-- UPDATE TANGGAL PENON-AKTIFAN -->
                      <div class="modal fade" id="updatenodok<?php echo $row['id_peru'];?>" role="dialog">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Update Tanggal Penon-Aktifan Dokumen</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="" method="POST">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <h5><b>Kode :</b> <?php echo $row['kode'];?></h5>
                                      <h5><b>Pemohon :</b> <?php echo $row['pemohon'];?></h5>
                                      <h5><b>Bagian :</b> <?php echo $row['bagian'];?></h5>
                                      <h5><b>Tanggal :</b> <?php echo tanggal_indo($row['tanggal'], true) ?></h5>
                                      <h5><b>Dokumen :</b> <?php echo $row['non_dokumen'];?></h5>
                                      <h5><b>Judul :</b> <?php echo $row['non_judul'];?></h5>
                                      <h5><b>No. Dokumen :</b> 
                                        <?php
                                        if ($row['non_no_dok']==NULL) {
                                          echo "<i>Belum Memiliki No. Dokumen</i>";
                                        }
                                        echo $row['non_no_dok'];
                                        ?>
                                      </h5>
                                      <h5><b>Tanggal Penon-Aktifan :</b> 
                                        <?php
                                        if ($row['non_tgl']==NULL) {
                                          echo "<i>Belum Di Nonaktifkan Oleh Petugas</i>";
                                        }
                                        echo $row['non_tgl'];
                                        ?>
                                      </h5>
                                      <hr>
                                      <div align="center">
                                        <h5>Dokumen Yang Akan Di Non-Aktifkan</h5>
                                      </div>
                                      <?php
                                      if ($row['upload_lam']==NULL){
                                        echo "<td>empty</td>";
                                      }else{
                                        echo "
                                        <div align='center'>
                                        <a href='./assets/file/perubahan/user/$row[upload_lam]' target='_blank'><img src='assets/images/icon/file.png' width='90px'></a>
                                        </div>
                                        ";
                                      }
                                      ?>
                                    </div>
                                    <label><b><font style="color: black">Status Revisi :</font></b></label> <button class="btn btn-warning btn-sm"><?php echo $row['non_status_revisi'];?></button>
                                    <h5><b>Alasan Penonaktifan :</b></h5>
                                    <textarea class="form-control" readonly="readonly"><?php echo $row['non_alasan']; ?></textarea>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Tanggal Penonaktifan</label>
                                      <input type="hidden" class="form-control" name="id_peru" value="<?php echo $row['id_peru']; ?>">
                                      <input type="hidden" class="form-control" name="status_pengecekan" value="Disetujui" required>
                                      <input type="hidden" class="form-control" name="date_verify" value="<?php echo date('Y-m-d H:i:sa'); ?>">
                                      <input type="hidden" class="form-control" name="verify" value="<?php echo $data['full_name']; ?>">
                                      <input type="hidden" class="form-control" name="kode" value="<?php echo $row['kode']; ?>">
                                      <input type="hidden" class="form-control" name="username" value="<?php echo $row['username']; ?>">
                                      <input type="hidden" class="form-control" name="non_dokumen" value="Dokumen Non-Aktif">
                                      <input type="hidden" class="form-control" name="non_judul" value="Judul: <?php echo $row['non_judul']; ?>">
                                      <input type="date" class="form-control" name="non_tgl" value="<?php echo $row['non_tgl']; ?>" required>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <button type="submit" name="updatedok" class="btn btn-block btn-primary">Update</button>
                                  <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- END UPDATE TANGGAL PENON-AKTIFAN -->

                      <!-- NONAKTIFKAN -->
                      <!-- <div class="modal fade" id="nonaktifkan<?php echo $row['id_peru'];?>" role="dialog">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Non-Aktifkan Dokumen</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="" method="POST">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <div align="center">
                                        <img src="assets/images/icon/nonaktif.png" width="200px">
                                      </div>
                                    </div>
                                    <p align="center">Anda yakin akan menghapus data ini?</p>
                                    <hr>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <h5><b>Kode :</b> <?php echo $row['kode'];?></h5>
                                      <h5><b>Pemohon :</b> <?php echo $row['pemohon'];?></h5>
                                      <h5><b>Bagian :</b> <?php echo $row['bagian'];?></h5>
                                      <h5><b>Tanggal :</b> <?php echo tanggal_indo($row['tanggal'], true) ?></h5>
                                      <h5><b>Dokumen :</b> <?php echo $row['non_dokumen'];?></h5>
                                      <h5><b>Judul :</b> <?php echo $row['non_judul'];?></h5>
                                      <h5><b>No. Dokumen :</b> 
                                        <?php
                                        if ($row['non_no_dok']==NULL) {
                                          echo "<i>Belum Memiliki No. Dokumen</i>";
                                        }
                                        echo $row['non_no_dok'];
                                        ?>
                                      </h5>
                                      <h5><b>Tanggal Penon-Aktifan :</b> 
                                        <?php
                                        if ($row['non_tgl']==NULL) {
                                          echo "<i>Belum Di Nonaktifkan Oleh Petugas</i>";
                                        }
                                        echo $row['non_tgl'];
                                        ?>
                                      </h5>
                                      <hr>
                                      <div align="center">
                                        <h5>Dokumen Yang Akan Di Non-Aktifkan</h5>
                                      </div>
                                      <?php
                                      if ($row['upload_lam']==NULL){
                                        echo "<td>empty</td>";
                                      }else{
                                        echo "
                                        <div align='center'>
                                        <a href='./assets/file/perubahan/user/$row[upload_lam]' target='_blank'><img src='assets/images/icon/file.png' width='90px'></a>
                                        </div>
                                        ";
                                      }
                                      ?>
                                    </div>
                                    <label><b><font style="color: black">Status Revisi :</font></b></label> <button class="btn btn-warning btn-sm"><?php echo $row['non_status_revisi'];?></button>
                                    <h5><b>Alasan Penonaktifan :</b></h5>
                                    <textarea class="form-control" readonly="readonly"><?php echo $row['non_alasan']; ?></textarea>
                                    <input type="hidden" class="form-control" name="id_peru" value="<?php echo $row['id_peru']; ?>">
                                    <input type="hidden" class="form-control" name="publish" value="Nonaktif">
                                    <input type="hidden" class="form-control" name="date_verify" value="<?php echo date('Y-m-d H:i:sa'); ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <button type="submit" name="nonaktif" class="btn btn-danger btn-block btn-flat">Non-Aktikan Dokumen</button>
                                  <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div> -->
                      <!-- END NONAKTIFKAN -->

                      <!-- AKTIFKAN -->
                      <div class="modal fade" id="aktifkan<?php echo $row['id_peru'];?>" role="dialog">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Aktifkan Dokumen</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="" method="POST">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <h5><b>Kode :</b> <?php echo $row['kode'];?></h5>
                                      <h5><b>Pemohon :</b> <?php echo $row['pemohon'];?></h5>
                                      <h5><b>Bagian :</b> <?php echo $row['bagian'];?></h5>
                                      <h5><b>Tanggal :</b> <?php echo tanggal_indo($row['tanggal'], true) ?></h5>
                                      <h5><b>Dokumen :</b> <?php echo $row['non_dokumen'];?></h5>
                                      <h5><b>Judul :</b> <?php echo $row['non_judul'];?></h5>
                                      <h5><b>No. Dokumen :</b> 
                                        <?php
                                        if ($row['non_no_dok']==NULL) {
                                          echo "<i>Belum Memiliki No. Dokumen</i>";
                                        }
                                        echo $row['non_no_dok'];
                                        ?>
                                      </h5>
                                      <h5><b>Tanggal Penon-Aktifan :</b> 
                                        <?php
                                        if ($row['non_tgl']==NULL) {
                                          echo "<i>Belum Di Nonaktifkan Oleh Petugas</i>";
                                        }
                                        echo $row['non_tgl'];
                                        ?>
                                      </h5>
                                      <hr>
                                      <div align="center">
                                        <h5>Dokumen Yang Akan Di Non-Aktifkan</h5>
                                      </div>
                                      <?php
                                      if ($row['upload_lam']==NULL){
                                        echo "<td>empty</td>";
                                      }else{
                                        echo "
                                        <div align='center'>
                                        <a href='./assets/file/perubahan/user/$row[upload_lam]' target='_blank'><img src='assets/images/icon/file.png' width='90px'></a>
                                        </div>
                                        ";
                                      }
                                      ?>
                                    </div>
                                    <label><b><font style="color: black">Status Revisi :</font></b></label> <button class="btn btn-warning btn-sm"><?php echo $row['non_status_revisi'];?></button>
                                    <h5><b>Alasan Penonaktifan :</b></h5>
                                    <textarea class="form-control" readonly="readonly"><?php echo $row['non_alasan']; ?></textarea>
                                    <input type="hidden" class="form-control" name="id_peru" value="<?php echo $row['id_peru']; ?>">
                                    <input type="hidden" class="form-control" name="non_tgl"><input type="hidden" class="form-control" name="date_verify" value="<?php echo date('Y-m-d H:i:sa'); ?>">
                                    <input type="hidden" class="form-control" name="verify" value="<?php echo $data['full_name']; ?>">
                                    <input type="hidden" class="form-control" name="kode" value="<?php echo $row['kode']; ?>">
                                    <input type="hidden" class="form-control" name="username" value="<?php echo $row['username']; ?>">
                                    <input type="hidden" class="form-control" name="non_dokumen" value="Dokumen Di Aktifkan">
                                    <input type="hidden" class="form-control" name="non_judul" value="Judul: <?php echo $row['non_judul']; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <button type="submit" name="tarik" class="btn btn-danger btn-block btn-flat">Aktikan Dokumen</button>
                                  <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- END AKTIFKAN -->

                    <?php } }  mysqli_close($con); ?>
                  </tbody>
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