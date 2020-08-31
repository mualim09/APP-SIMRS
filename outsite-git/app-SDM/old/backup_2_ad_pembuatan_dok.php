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
  $id_peru            = $_POST['id_peru'];
  $pem_no_dok         = $_POST['pem_no_dok'];
  $pem_tgl_berlaku    = $_POST['pem_tgl_berlaku'];

  $query = mysql_query("UPDATE tb_ppd SET 
    pem_no_dok ='$pem_no_dok',
    pem_tgl_berlaku = '$pem_tgl_berlaku'
    WHERE id_peru ='$id_peru'");

  $query .= mysql_query("UPDATE tb_ppd_his SET 
    his_pem_no_dok ='$pem_no_dok',
    his_pem_tgl_berlaku = '$pem_tgl_berlaku'
    WHERE id_his ='$id_peru'");

  if($query){
    header("Location: ./ad_pembuatan_dok.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// SETUJUI
if(isset($_POST["setujui"]))    
{    
  $id_peru           = $_POST['id_peru'];
  $status_pengecekan = $_POST['status_pengecekan'];
  $verify            = $_POST['verify'];
  $date_verify       = $_POST['date_verify'];

  $query = mysql_query("UPDATE tb_ppd SET 
    status_pengecekan = '$status_pengecekan',
    verify = '$verify',
    date_verify = '$date_verify'
    WHERE id_peru ='$id_peru'");

  $query .= mysql_query("UPDATE tb_ppd_his SET 
    his_status_pengecekan = '$status_pengecekan',
    his_verify = '$verify',
    his_date_verify = '$date_verify'
    WHERE id_his ='$id_peru'");
  if($query){
    header("Location: ./ad_pembuatan_dok.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

//TIDAK SETUJUI
if(isset($_POST["tidakdisetujui"]))    
{    
  $id_peru           = $_POST['id_peru'];
  $status_pengecekan = $_POST['status_pengecekan'];
  $admin_dok         = $_POST['admin_dok'];
  $oleh              = $_POST['oleh'];
  $date_revisi       = $_POST['date_revisi'];

  $query = mysql_query("UPDATE tb_ppd SET 
    status_pengecekan = '$status_pengecekan',
    admin_dok = '$admin_dok'
    WHERE id_peru ='$id_peru'");

  $query .= mysql_query("INSERT INTO tb_revisi 
    (id_revisi,id_peru,date_revisi,keterangan,oleh)
    VALUES 
    ('','$id_peru','$date_revisi','$admin_dok','$oleh')
    ");
  if($query){
    header("Location: ./ad_pembuatan_dok.php?ntf=4");                                                  
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
  <title>SIMDO | Pembuatan Dokumen</title>
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
            <h2 class="pageheader-title">Form Pembuatan Dokumen</h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form Pembuatan Dokumen</li>
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
              <label>Pembuatan Dokumen</label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                  <thead align="center">
                    <tr>
                      <th>ID</th>
                      <th>Kode</th>
                      <th>Lihat Detail Dokumen</th>
                      <th>Lengkapi No. Dokumen & Tanggal</th>
                      <th>Pengajuan Dokumen</th>
                      <th>Status Pengecekan</th>
                      <th>Form Pembuatan</th>
                      <th>Upload File Akhir</th>
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
                    $result = mysqli_query($con,"SELECT * FROM tb_ppd WHERE dokumen='Pembuatan' ORDER BY id_peru DESC");

                    if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_array($result))
                      {
                        echo "<tr align='center'>";
                        echo "<td>".$row['id_peru'] . "</td>";
                        echo "<td>".$row['kode'] . "</td>";
                        // LIHAT DETAIL
                        if ($row['pemohon']==NULL) {
                          echo "<td>Tidak Memiliki Isi Dokumen</td>";
                        }else{
                          echo "<td align='center'>
                          <a href='#' data-toggle='modal' data-target='#lihatdok$row[id_peru]' title='Lihat Detail Dokumen'><button class='btn btn-light'><i class='fa fa-eye'></i></button></a>
                          </td>";
                        }
                        // END LIHAT DETAIL
                        // UPDATE NO DOK & TANGGAL BERLAKU
                        if ($row['pem_no_dok']==NULL){
                          echo "<td>
                          <a href='#' data-toggle='modal' data-target='#updatenodok$row[id_peru]' title='Input No. Dokumen'><span class='btn btn-dark'><i class='fas fa-hand-up'></i> Lengkapi </span></a>
                          </td>";
                        }else{
                          echo "<td>
                          <a href='#' data-toggle='modal' data-target='#updatenodok$row[id_peru]' title='Input No. Dokumen'><span class='btn btn-success'><i class='fas fa-check'></i> </span></a>
                          </td>";
                        }
                        // END UPDATE NO DOK & TANGGAL BERLAKU
                        // LIHAT UPLOAD FILE DARI USER
                        if ($row['upload_lam']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td align='center'>
                          <a href='./assets/file/pembuatan/user/$row[upload_lam]' target='_blank'><img src='assets/images/icon/unnamed.png' width='40px'></a>
                          </td>";
                        }
                        // END LIHAT UPLOAD FILE DARI USER
                        // STATUS PENGECEKAN
                        if ($row['status_pengecekan']=='New') {
                          echo "<td align='center'><buton class='btn btn-light'><i class='fa fas fa-hourglass' title='Belum Respon Petugas'></i></buton></td>";
                        }elseif ($row['status_pengecekan']=='Revisi') {
                          echo "<td align='center'>
                          <a href='#' data-toggle='modal' data-target='#revisi$row[id_peru]' title='Lihat Revisi'><button class='btn btn-light'><i class='fa fas fa-eye'></i></button></a>
                          </td>";                                                      
                        }elseif ($row['status_pengecekan']=='Disetujui') {
                          echo "<td align='center'><buton class='btn btn-light'><i class='fa fas fa-check' title='Disetujui'></i></buton></td>";
                        }
                        // END STATUS PENGECEKAN
                        // FILE RESULT
                        if ($row['pem_no_dok']==NULL) {
                          echo "<td>Lengkapi No. Dokumen & Tanggal</td>";
                        }else{
                          echo "<td>
                          <a href='assets/file/template/formppd.php?id=$row[id_peru]' title='Print Dokumen'><span class='btn btn-rounded btn-dark'><font style='font-size: 10px'><i class='fa fas fa-print'></i></font></span></a>
                          </td>";
                        }
                        // END FILE RESULT
                        // AKSI
                        if ($row['pem_no_dok']==NULL) {
                          echo "<td>
                          <a href='#' data-toggle='modal' data-target='#edit$row[id_peru]' title='Tidak Disetujui'><span class='badge badge-dark'><i class='fas fa-ban'></i> </span></a>
                          </td>";
                        }else{
                          echo "<td>
                          <a href='#' data-toggle='modal' data-target='#delete$row[id_peru]' title='Disetujui'><span class='badge badge-dark'><i class='fas fa-check'></i> </span></a>
                          <a href='#' data-toggle='modal' data-target='#edit$row[id_peru]' title='Tidak Disetujui'><span class='badge badge-dark'><i class='fas fa-ban'></i> </span></a>
                          </td>";
                        }
                        // END AKSI
                        echo "</tr>";
                        ?>

                        <!-- LIHAT DOKUMEN -->
                        <div class="modal fade" id="lihatdok<?php echo $row['id_peru'];?>" role="dialog">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Lihat Detail Dokumen</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label><b>Pemohon :</b> <?php echo $row['pemohon'];?></label>
                                        <br>
                                        <label><b>Bagian :</b> <?php echo $row['bagian'];?></label>
                                        <br>
                                        <label><b>Tanggal :</b> <?php echo tanggal_indo($row['tanggal'], true) ?></label>
                                        <br>
                                        <label><b>Dokumen :</b> <?php echo $row['pem_dokumen'];?></label>
                                        <br>
                                        <label><b>Judul :</b> <?php echo $row['pem_judul'];?></label>
                                        <br>
                                        <label><b>No. Dokumen :</b> 
                                          <?php
                                          if ($row['pem_no_dok']==NULL) {
                                            echo "<label><i>Belum Memiliki No. Dokumen</i></label>";
                                          }
                                          echo $row['pem_no_dok'];
                                          ?>
                                        </label>
                                        <br>
                                        <label><b>Tanggal Berlaku :</b> 
                                          <?php
                                          if ($row['pem_tgl_berlaku']==NULL) {
                                            echo "<label><i>Belum Memiliki Tanggal Berlaku</i></label>";
                                          }
                                          echo $row['pem_tgl_berlaku'];
                                          ?>
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Cencel</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- END LIHAT DOKUMEN -->

                        <!-- UPDATE NO DOKUMEN & TANGGAL BERLAKU -->
                        <div class="modal fade" id="updatenodok<?php echo $row['id_peru'];?>" role="dialog">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Update No. Dokumen & Tanggal Berlaku</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Kode</label>
                                        <input type="text" class="form-control" placeholder="kode ..." value="<?php echo $row['kode']; ?>" readonly>
                                        <input type="hidden" class="form-control" name="id_peru" value="<?php echo $row['id_peru']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Pemohon</label>
                                        <input type="text" class="form-control" placeholder="Pemohon ..." value="<?php echo $row['pemohon']; ?>" readonly>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Bagian</label>
                                        <input type="text" class="form-control" value="<?php echo $row['bagian']; ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" value="<?php echo $row['tanggal']; ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>No. Dokumen</label>
                                        <input type="text" class="form-control" name="pem_no_dok" placeholder="No. Dokumen ..." value="<?php echo $row['pem_no_dok']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Tanggal Berlaku</label>
                                        <input type="date" class="form-control" name="pem_tgl_berlaku" value="<?php echo $row['pem_tgl_berlaku']; ?>">
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
                        <!-- END UPDATE NO DOKUMEN & TANGGAL BERLAKU -->

                        <!-- DISETUJUI -->
                        <div class="modal fade" id="delete<?php echo $row['id_peru'];?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Setujui Dokumen</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="">
                                  <div class="form-group">
                                    <label><b>Pemohon :</b> <?php echo $row['pemohon'];?></label>
                                    <br>
                                    <label><b>Bagian :</b> <?php echo $row['bagian'];?></label>
                                    <br>
                                    <label><b>Tanggal :</b> <?php echo tanggal_indo($row['tanggal'], true) ?></label>
                                    <br>
                                    <label><b>Dokumen :</b> <?php echo $row['pem_dokumen'];?></label>
                                    <br>
                                    <label><b>Judul :</b> <?php echo $row['pem_judul'];?></label>
                                    <br>
                                    <label><b>No. Dokumen :</b> 
                                      <?php
                                      if ($row['pem_no_dok']==NULL) {
                                        echo "<label><i>Belum Memiliki No. Dokumen</i></label>";
                                      }
                                      echo $row['pem_no_dok'];
                                      ?>
                                    </label>
                                    <br>
                                    <label><b>Tanggal Berlaku :</b> 
                                      <?php
                                      if ($row['pem_tgl_berlaku']==NULL) {
                                        echo "<label><i>Belum Memiliki Tanggal Berlaku</i></label>";
                                      }
                                      echo $row['pem_tgl_berlaku'];
                                      ?>
                                    </label>
                                    <input type="hidden" name="id_peru" class="form-control" placeholder="client name" value="<?php echo $row['id_peru'];?>" required>
                                    <input type="hidden" name="status_pengecekan" class="form-control" value="Disetujui" required>
                                    <input type="hidden" name="verify" class="form-control" value="<?php echo $data['full_name']; ?>" required>
                                    <input type="hidden" name="date_verify" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                                  </div>
                                  <button type="submit" name="setujui" class="btn btn-danger btn-block btn-flat">Yes</button>
                                  <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- END DISETUJUI -->

                        <!-- TIDAK DISETUJUI/REVISI -->
                        <div class="modal fade" id="edit<?php echo $row['id_peru'];?>" role="dialog">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Catatan Revisi</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label><b>Pemohon :</b> <?php echo $row['pemohon'];?></label>
                                        <br>
                                        <label><b>Bagian :</b> <?php echo $row['bagian'];?></label>
                                        <br>
                                        <label><b>Tanggal :</b> <?php echo tanggal_indo($row['tanggal'], true) ?></label>
                                        <br>
                                        <label><b>Dokumen :</b> <?php echo $row['pem_dokumen'];?></label>
                                        <br>
                                        <label><b>Judul :</b> <?php echo $row['pem_judul'];?></label>
                                        <br>
                                        <label><b>No. Dokumen :</b> 
                                          <?php
                                          if ($row['pem_no_dok']==NULL) {
                                            echo "<label><i>Belum Memiliki No. Dokumen</i></label>";
                                          }
                                          echo $row['pem_no_dok'];
                                          ?>
                                        </label>
                                        <br>
                                        <label><b>Tanggal Berlaku :</b> 
                                          <?php
                                          if ($row['pem_tgl_berlaku']==NULL) {
                                            echo "<label><i>Belum Memiliki Tanggal Berlaku</i></label>";
                                          }
                                          echo $row['pem_tgl_berlaku'];
                                          ?>
                                        </label>
                                        <input type="hidden" name="id_peru" class="form-control" placeholder="client name" value="<?php echo $row['id_peru'];?>" required>
                                        <input type="hidden" name="status_pengecekan" class="form-control" value="Revisi" required>
                                        <input type="hidden" name="oleh" class="form-control" value="<?php echo $data['full_name'];?>" required>
                                        <input type="hidden" name="date_revisi" class="form-control" value="<?php echo date('Y-m-d');?>" required>
                                      </div>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Detail Revisi<font style="color: red">*</font></label>
                                        <textarea class="ckeditor" id="ckedtor" name="admin_dok" placeholder="Penjelasan Revisi ..." required="required"><?php echo $row['admin_dok'];?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <button type="submit" name="tidakdisetujui" class="btn btn-block btn-primary">Kirim</button>
                                    <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- END TIDAK DISETUJUI/REVISI -->
                        <!-- CATATAN REVISI -->
                        <div class="modal fade" id="revisi<?php echo $row['id_peru'];?>" role="dialog">
                        <?php } }  mysqli_close($con); ?>
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <label class="modal-title">Komentar Revisi</label>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="" method="POST">
                              <div class="modal-body">
                                <div class="row">
                                  <?php
                                  $con=mysqli_connect("localhost","root","","rskg_akreditasi");
                                  if (mysqli_connect_errno())
                                  {
                                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                  }
                                  $result = mysqli_query($con,"SELECT * FROM tb_revisi WHERE id_revisi='$id_peru'");

                                  if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_array($result))
                                    {
                                      ?>
                                      <div class="col-sm-12">
                                        <div class="form-group">
                                          <label>Detail Revisi</label>
                                          <textarea class="ckeditor" id="ckedtor" name="admin_dok" placeholder="Penjelasan Revisi ..." readonly="readonly"><?php echo $row['keterangan'];?></textarea>
                                          <small><i class="fa fas fa-calendar"></i> <?php echo $row['date_revisi'];?></small>
                                          <small><?php echo $row['oleh'];?></small>
                                        </div>
                                      </div>
                                    <?php } }  mysqli_close($con); ?>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <!-- <button type="submit" name="tidakdisetujui" class="btn btn-block btn-primary">Kirim</button> -->
                                    <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- END CATATAN REVISI -->
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