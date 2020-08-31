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
  <title>SIMDO | History Pembuatan Dokumen</title>
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
            <h2 class="pageheader-title">History Pembuatan Dokumen</h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">History</a></li>
                  <li class="breadcrumb-item active" aria-current="page">History Pembuatan Dokumen</li>
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
              <label>History Pembuatan Dokumen</label>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                  <thead align="center">
                    <tr>
                      <th>ID</th>
                      <th>Kode</th>
                      <th>Detail Dokumen</th>
                      <th>No. Dokumen & Tanggal</th>
                      <th>Revisi</th>
                      <th>Form Awal</th>
                      <th>File Yang Disetujui</th>
                      <th>Tanggal Publish</th>
                      <th>Penghapusan Dokumen</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $con=mysqli_connect("localhost","root","","rskg_akreditasi");
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $result = mysqli_query($con,"SELECT * FROM tb_ppd_his WHERE his_dokumen='Pembuatan' ORDER BY id_his DESC");

                    if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_array($result))
                      {
                        echo "<tr align='center'>";
                        echo "<td>".$row['id_his'] . "</td>";
                        echo "<td>".$row['his_kode'] . "</td>";
                        if ($row['his_pemohon']==NULL) {
                          echo "<td>Tidak Memiliki Isi Dokumen</td>";
                        }else{
                          echo "<td align='center'>
                          <a href='#' data-toggle='modal' data-target='#lihatdok$row[id_his]' title='Lihat Detail Dokumen'><button class='btn btn-dark btn-sm'>Lihat</button></a>
                          </td>";
                        }
                        if ($row['his_pem_no_dok']==NULL){
                          echo "<td>
                          <a href='#' data-toggle='modal' data-target='#updatenodok$row[id_his]' title='Input No. Dokumen'><span class='btn btn-dark btn-sm'><small>Dokumen di Hapus Sebelum Diajukan</small></span></a>
                          </td>";
                        }else{
                          echo "<td>
                          <a href='#' data-toggle='modal' data-target='#updatenodok$row[id_his]' title='Input No. Dokumen'><span class='btn btn-dark btn-sm'><i class='fas fa-check'></i> </span></a>
                          </td>";
                        }
                        if ($row['his_status_pengecekan']=='New') {
                          echo "<td align='center'><buton class='btn btn-dark btn-sm'><small>Dokumen di Hapus Sebelum Diajukan</small></buton></td>";
                        }elseif ($row['his_status_pengecekan']=='Revisi') {
                          echo "<td>
                          <a href='tampilan_revisi_pembuatan.php?id=$row[id_his]' target=_blank title='Template WP'><button class='btn btn-dark btn-sm'>Revisi</button></a>
                          </td>";                                                      
                        }elseif ($row['his_status_pengecekan']=='Disetujui') {
                          echo "<td>
                          <a href='tampilan_revisi_pembuatan.php?id=$row[id_his]' target=_blank title='Template WP'><button class='btn btn-dark btn-sm'><i class='fa fas fa-check' title='Disetujui'></i></button></a>
                          </td>";    
                        }
                        echo "<td>
                        <a href='assets/file/template/formppd.php?id=$row[id_his]' title='Print Dokumen'><span class='btn btn-rounded btn-dark'><font style='font-size: 10px'><i class='fa fas fa-print'></i></font></span></a>
                        </td>";
                        if ($row['his_file_result']==NULL) {
                          echo "<td align='center'><buton class='btn btn-dark btn-sm'><small>Dokumen di Hapus Sebelum Diajukan</small></buton></td>";
                        }else{
                        echo "<td align='center'>
                        <a href='./assets/file/pembuatan/admin/$row[his_file_result]' target='_blank'><img src='assets/images/icon/file.png' width='40px'></a>
                        </td>";
                        }
                        if ($row['his_date_verify']==NUll) {
                          echo "<td><small>Dokumen Belum Di Publish</small></td>";
                        }else{
                          echo "<td>".tanggal_indo($row['his_date_verify'], true) . "</td>";
                        }
                        if ($row['his_hapus']==NUll) {
                          echo "<td><small>Tidak Penghapusan Dokumen</small></td>";
                        }else{
                          echo "<td><button class='btn btn-blok btn-danger btn-sm'><small>Dokumen Di Hapus pada tanggal<br><span class='btn btn-light btn-sm'>".$row['his_date_hapus'] . "</span></small></button></td>";
                        }
                        echo "</tr>";
                      ?>

                      <!-- LIHAT DOKUMEN -->
                      <div class="modal fade" id="lihatdok<?php echo $row['id_his'];?>" role="dialog">
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
                                      <h5><b>Kode :</b> <?php echo $row['his_kode'];?></h5>
                                      <h5><b>Pemohon :</b> <?php echo $row['his_pemohon'];?></h5>
                                      <h5><b>Bagian :</b> <?php echo $row['his_bagian'];?></h5>
                                      <h5><b>Tanggal :</b> <?php echo tanggal_indo($row['his_tanggal'], true) ?></h5>
                                      <h5><b>Dokumen :</b> <?php echo $row['his_pem_dokumen'];?></h5>
                                      <h5><b>Judul :</b> <?php echo $row['his_pem_judul'];?></h5>
                                      <h5><b>No. Dokumen :</b> 
                                        <?php
                                        if ($row['his_pem_no_dok']==NULL) {
                                          echo "<i>Belum Memiliki No. Dokumen</i>";
                                        }
                                        echo $row['his_pem_no_dok'];
                                        ?>
                                      </h5>
                                      <h5><b>Tanggal Berlaku :</b> 
                                        <?php
                                        if ($row['his_pem_tgl_berlaku']==NULL) {
                                          echo "<i>Belum Memiliki Tanggal Berlaku</i>";
                                        }
                                        echo $row['his_pem_tgl_berlaku'];
                                        ?>
                                      </h5>
                                      <hr>
                                      <div align="center">
                                        <h5>Dokumen Awal</h5>
                                      </div>
                                      <?php
                                      if ($row['his_upload_lam']==NULL){
                                        echo "<td>empty</td>";
                                      }else{
                                        echo "
                                        <div align='center'>
                                        <a href='./assets/file/pembuatan/user/$row[his_upload_lam]' target='_blank'><img src='assets/images/icon/file.png' width='90px'></a>
                                        </div>
                                        ";
                                      }
                                      ?>
                                    </div>
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

                      <!-- UPDATE NO DOKUMEN & TANGGAL BERLAKU -->
                      <div class="modal fade" id="updatenodok<?php echo $row['id_his'];?>" role="dialog">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Update No. Dokumen & Tanggal Berlaku</h4>
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
                                      <input type="text" class="form-control" placeholder="kode ..." value="<?php echo $row['his_kode']; ?>" readonly>
                                      <input type="hidden" class="form-control" name="id_his" value="<?php echo $row['id_his']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Pemohon</label>
                                      <input type="text" class="form-control" placeholder="Pemohon ..." value="<?php echo $row['his_pemohon']; ?>" readonly>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Bagian</label>
                                      <input type="text" class="form-control" value="<?php echo $row['his_bagian']; ?>" readonly>
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Tanggal</label>
                                      <input type="date" class="form-control" value="<?php echo $row['his_tanggal']; ?>" readonly>
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>No. Dokumen</label>
                                      <input type="text" class="form-control" name="pem_no_dok" placeholder="No. Dokumen ..." value="<?php echo $row['his_pem_no_dok']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Tanggal Berlaku</label>
                                      <input type="date" class="form-control" name="pem_tgl_berlaku" value="<?php echo $row['his_pem_tgl_berlaku']; ?>">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <!-- <button type="submit" name="updatedok" class="btn btn-block btn-primary">Update</button> -->
                                  <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- END UPDATE NO DOKUMEN & TANGGAL BERLAKU -->

                      <!-- REVISI -->
                      <div class="modal fade" id="revisi<?php echo $row['id_his'];?>" role="dialog">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Catatan Revisi</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="" method="POST">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <h5><b>Kode :</b> <?php echo $row['his_kode'];?></h5>
                                      <h5><b>Pemohon :</b> <?php echo $row['his_pemohon'];?></h5>
                                      <h5><b>Bagian :</b> <?php echo $row['his_bagian'];?></h5>
                                      <h5><b>Tanggal :</b> <?php echo tanggal_indo($row['his_tanggal'], true) ?></h5>
                                      <h5><b>Dokumen :</b> <?php echo $row['his_pem_dokumen'];?></h5>
                                      <h5><b>Judul :</b> <?php echo $row['his_pem_judul'];?></h5>
                                      <h5><b>No. Dokumen :</b> 
                                        <?php
                                        if ($row['his_pem_no_dok']==NULL) {
                                          echo "<i>Belum Memiliki No. Dokumen</i>";
                                        }
                                        echo $row['his_pem_no_dok'];
                                        ?>
                                      </h5>
                                      <h5><b>Tanggal Berlaku :</b> 
                                        <?php
                                        if ($row['his_pem_tgl_berlaku']==NULL) {
                                          echo "<i>Belum Memiliki Tanggal Berlaku</i>";
                                        }
                                        echo $row['his_pem_tgl_berlaku'];
                                        ?>
                                      </h5>
                                      <hr>
                                      <div align="center">
                                        <h5>Dokumen Awal</h5>
                                      </div>
                                      <?php
                                      if ($row['his_upload_lam']==NULL){
                                        echo "<td>empty</td>";
                                      }else{
                                        echo "
                                        <div align='center'>
                                        <a href='./assets/file/pembuatan/user/$row[his_upload_lam]' target='_blank'><img src='assets/images/icon/file.png' width='90px'></a>
                                        </div>
                                        ";
                                      }
                                      ?>
                                      <input type="hidden" name="id_his" class="form-control" placeholder="client name" value="<?php echo $row['id_his'];?>" required>
                                      <input type="hidden" name="his_status_pengecekan" class="form-control" value="Revisi" required>
                                      <input type="hidden" name="oleh" class="form-control" value="<?php echo $data['full_name'];?>" required>
                                      <input type="hidden" name="date_revisi" class="form-control" value="<?php echo date('Y-m-d H:i:sa'); ?>" required>
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
                      <!-- END REVISI -->

                      <!-- ADD FILE -->
                      <div class="modal fade" id="addfile<?php echo $row['id_his'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Tambah File Lampiran</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Upload File</label>
                                      <input type="file" name="file_result">
                                      <input type="hidden" name="id_his" class="form-control" value="<?php echo $row['id_his'];?>" required>
                                      <input type="hidden" name="his_status_pengecekan" class="form-control" value="Disetujui">
                                    </div>
                                  </div>
                                </div>
                                <button type="submit" name="uploadlampiran" class="btn btn-primary btn-block btn-flat">Upload</button>
                                <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Tutup</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- END FILE -->

                      <!-- PUBLISH -->
                      <div class="modal fade" id="publish<?php echo $row['id_his'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Publish Dokumen</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="">
                                <div class="form-group">
                                  <h5><b>Kode :</b> <?php echo $row['his_kode'];?></h5>
                                  <h5><b>Pemohon :</b> <?php echo $row['his_pemohon'];?></h5>
                                  <h5><b>Bagian :</b> <?php echo $row['his_bagian'];?></h5>
                                  <h5><b>Tanggal :</b> <?php echo tanggal_indo($row['his_tanggal'], true) ?></h5>
                                  <h5><b>Dokumen :</b> <?php echo $row['his_pem_dokumen'];?></h5>
                                  <h5><b>Judul :</b> <?php echo $row['his_pem_judul'];?></h5>
                                  <h5><b>No. Dokumen :</b> 
                                    <?php
                                    if ($row['his_pem_no_dok']==NULL) {
                                      echo "<i>Belum Memiliki No. Dokumen</i>";
                                    }
                                    echo $row['his_pem_no_dok'];
                                    ?>
                                  </h5>
                                  <h5><b>Tanggal Berlaku :</b> 
                                    <?php
                                    if ($row['his_pem_tgl_berlaku']==NULL) {
                                      echo "<i>Belum Memiliki Tanggal Berlaku</i>";
                                    }
                                    echo $row['his_pem_tgl_berlaku'];
                                    ?>
                                  </h5>
                                  <hr>
                                  <div align="center">
                                    <h5>Dokumen Awal</h5>
                                  </div>
                                  <?php
                                  if ($row['his_upload_lam']==NULL){
                                    echo "<p>empty</p>";
                                  }else{
                                    echo "
                                    <div align='center'>
                                    <a href='./assets/file/pembuatan/user/$row[his_upload_lam]' target='_blank'><img src='assets/images/icon/file.png' width='90px'></a>
                                    </div>
                                    ";
                                  }
                                  ?>
                                  <hr>
                                  <div align="center">
                                    <h5>Dokumen Akhir</h5>
                                  </div>
                                  <?php
                                  if ($row['his_file_result']==NULL){
                                    echo "<p>empty</p>";
                                  }else{
                                    echo "
                                    <div align='center'>
                                    <a href='./assets/file/pembuatan/admin/$row[his_file_result]' target='_blank'><img src='assets/images/icon/file.png' width='90px'></a>
                                    </div>
                                    ";
                                  }
                                  ?>
                                  <input type="hidden" name="id_his" class="form-control" value="<?php echo $row['id_his'];?>" required>
                                  <!-- NOTIF -->
                                  <input type="hidden" name="username" class="form-control" value="<?php echo $row['username'];?>" required>
                                  <input type="hidden" name="pem_dokumen" class="form-control" value="<?php echo $row['his_pem_dokumen'];?>" required>
                                  <input type="hidden" name="pem_judul" class="form-control" value="<?php echo $row['his_pem_judul'];?>" required>
                                  <input type="hidden" name="kode" class="form-control" value="<?php echo $row['his_kode'];?>" required>
                                  <!-- END NOTIF -->
                                  <input type="hidden" name="publish" class="form-control" value="OK">
                                  <input type="hidden" name="verify" class="form-control" value="<?php echo $data['full_name']; ?>" required>
                                  <input type="hidden" name="date_verify" class="form-control" value="<?php echo date('Y-m-d H:i:sa'); ?>" required>
                                </div>
                                <div class="form-group">
                                  <button type="submit" name="setujui" class="btn btn-success btn-block btn-flat">Publish</button>
                                  <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Tutup</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- END PUBLISH -->

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