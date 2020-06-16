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

// ADD
if(isset($_POST["submit"]))    
{    
  $id_rtsi       = $_POST['id_rtsi'];
  $tanggal       = $_POST['tanggal'];
  $no_berkas     = $_POST['no_berkas'];
  $jam           = $_POST['jam'];
  $mutasi        = $_POST['mutasi'];
  $penerima      = $_POST['penerima'];
  $json_penerima = json_encode($penerima);
  $date_rtsi     = $_POST['date_rtsi'];

  $nama = $_FILES['lampiran']['name'];
  $file_tmp = $_FILES['lampiran']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/respon_time/surat_intern/lampiran/'.$nama);

  $query = mysql_query("INSERT INTO tb_rtsi 
    (id_rtsi,tanggal,no_berkas,jam,mutasi,penerima,date_rtsi,lampiran) 
    VALUES 
    ('','$tanggal','$no_berkas','$jam','$mutasi','$json_penerima','$date_rtsi','$nama')
    ");
  if ($query) {
    header("Location: ./respon-surat-intern.php?ntf=1");  
  } else {
    header("Location: ./respon-surat-intern.php?ntf=6");
  }
}

// EDIT
if(isset($_POST["update"]))    
{    
  $id_rtsi       = $_POST['id_rtsi'];
  $tanggal       = $_POST['tanggal'];
  $no_berkas     = $_POST['no_berkas'];
  $jam           = $_POST['jam'];
  $mutasi        = $_POST['mutasi'];
  $penerima      = $_POST['penerima'];
  $json_penerima = json_encode($penerima);
  $date_rtsi     = $_POST['date_rtsi'];

  $query = mysql_query("UPDATE tb_rtsi SET 
    tanggal ='$tanggal',
    no_berkas = '$no_berkas',
    jam = '$jam',
    mutasi = '$mutasi',
    penerima = '$json_penerima',
    date_rtsi = '$date_rtsi'
    WHERE id_rtsi ='$id_rtsi'");
  if($query){
    header("Location: ./respon-surat-intern.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// TAMBAH LAMPIRAN
if(isset($_POST["uploadlampiran"]))    
{    
  $id_rtsi           = $_POST['id_rtsi'];

  $nama = $_FILES['lampiran']['name'];
  $file_tmp = $_FILES['lampiran']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/respon_time/surat_intern/lampiran/'.$nama);
  
  $query = mysql_query("UPDATE tb_rtsi SET 
    lampiran = '$nama'
    WHERE id_rtsi ='$id_rtsi'");
  if($query){
    header("Location: ./respon-surat-intern.php?ntf=5");                                                  
  } else {
    header("Location: ./respon-surat-intern.php?ntf=6");  
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $id_rtsi    = $_POST['id_rtsi'];

  if($id_rtsi){
    $query = mysql_query("DELETE FROM tb_rtsi WHERE id_rtsi = '$id_rtsi'");
    if($query){
     header("Location: ./respon-surat-intern.php?ntf=3");                     
   } else {
    header("Location: ./respon-surat-intern.php?ntf=6");  
  }
} else {
  header("Location: ./respon-surat-intern.php?ntf=6");  
}
}

// SEARCH
if(isset($_POST["search"]))
{    
  $query1 = '';
  if ($_POST['month']) {
    $query1 = "tanggal[month] ='$_POST[month]'";
  } else {
    if ($_POST['year']) {
      if ($query1 != '') {
        $query1 .= ' and ';
      }
      $query1 .= "tanggal[year] ='$_POST[year]'";
    }
  }
} else {
  $query1 = "tanggal[month] ='No Data' ";
  $query1 .= "and tanggal[year] ='No Data' ";
}

$penerima = mysql_query("SELECT fullname FROM tb_user");
?>
<!DOCTYPE html>
<html>
<?php include 'include/header.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include 'include/top-header.php'; ?>
    <?php include 'include/sidebar.php'; ?>
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Respon Time Surat Intern</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Respon Time Surat Intern</a></li>
                <li class="breadcrumb-item active">SIRS ADM</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- ISI -->
      <section class="content">
        <div class="container-fluid">

          <!-- SEARCH -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-search"></i> Cari Data</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <?php
            $month_ = '';
            $year_ = '';
            if (isset($_POST['month'])) {
              $month_ = $_POST['month'];
            }
            if (isset($_POST['year'])) {
              $year_ = $_POST['year'];
            }
            ?>
            <form method="post" action="">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Bulan</label>
                      <select name="month" class="form-control" id="month">
                        <option value>-- Pilih Bulan --</option>
                        <option value="1" <?= !empty($month_) && $month_ == '1' ? 'selected' : '' ?>>Januari</option>
                        <option value="2" <?= !empty($month_) && $month_ == '2' ? 'selected' : '' ?>>Februari</option>
                        <option value="3" <?= !empty($month_) && $month_ == '3' ? 'selected' : '' ?>>Maret</option>
                        <option value="4" <?= !empty($month_) && $month_ == '4' ? 'selected' : '' ?>>April</option>
                        <option value="5" <?= !empty($month_) && $month_ == '5' ? 'selected' : '' ?>>Mei</option>
                        <option value="6" <?= !empty($month_) && $month_ == '6' ? 'selected' : '' ?>>Juni</option>
                        <option value="7" <?= !empty($month_) && $month_ == '7' ? 'selected' : '' ?>>Juli</option>
                        <option value="8" <?= !empty($month_) && $month_ == '8' ? 'selected' : '' ?>>Agustus</option>
                        <option value="9" <?= !empty($month_) && $month_ == '9' ? 'selected' : '' ?>>September</option>
                        <option value="10" <?= !empty($month_) && $month_ == '10' ? 'selected' : '' ?>>Oktober</option>
                        <option value="11" <?= !empty($month_) && $month_ == '11' ? 'selected' : '' ?>>November</option>
                        <option value="12" <?= !empty($month_) && $month_ == '12' ? 'selected' : '' ?>>Desember</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tahun</label>
                      <select name="year" class="form-control" id="year">
                        <option value>-- Pilih Tahun --</option>
                        <?php for ($i=2015; $i < 2031; $i++) { ?>
                          <option value="<?= $i ?>" <?= !empty($year_) && $year_ == $i ? 'selected' : '' ?>><?= $i ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" name="search" id="search" class="btn btn-block btn-info">Search</button>
              </div>
            </form>
          </div>
          <!-- END SEARCH -->

          <!-- ALERT -->
          <?php include 'include/alert/success.php' ?>
          <!-- END ALERT -->

          <!-- MODAL ADD -->
          <div class="modal fade" id="modal-add">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <label class="modal-title">Tambah Respon Time Surat Intern</label>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>File Upload</label>
                        <input type="file" name="lampiran" placeholder="Upload ...">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Tanggal<font style="color: red">*</font></label>
                          <input type="date" class="form-control" name="tanggal" placeholder="Tanggal ..." required="respon_time" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>No Berkas<font style="color: red">*</font></label>
                          <input type="text" class="form-control" name="no_berkas" placeholder="No Berkas ..." required="required">
                          <input type="hidden" class="form-control" name="id_rtsi">
                          <input type="hidden" class="form-control" name="date_rtsi" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Jam<font style="color: red">*</font></label>
                          <!-- <input type="time" class="form-control" name="jam" placeholder="Jam ..." required="required"> -->
                          <div class="input-group date" id="timepicker" data-target-input="nearest">
                            <input type="text" name="jam" class="form-control datetimepicker-input" data-target="#timepicker"/>
                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Mutasi<font style="color: red">*</font></label>
                          <!-- <input type="time" class="form-control" name="mutasi" placeholder="Mutasi ..." required="required"> -->
                          <div class="input-group date" id="timepicker1" data-target-input="nearest">
                            <input type="text" name="mutasi" class="form-control datetimepicker-input" data-target="#timepicker1"/>
                            <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Penerima<font style="color: red">*</font></label>
                          <select class="select2bs4" multiple="multiple" name="penerima[]" data-placeholder="Pilih Penerima" style="width: 100%;" required="required">
                            <option value="">-- Pilih Penerima --</option>
                            <?php 
                            while ($row_penerima = mysql_fetch_assoc($penerima)) {
                              ?>
                              <option value="<?= $row_penerima['fullname'] ?>"><?= $row_penerima['fullname'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-block btn-info">Submit</button>
                      <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- END MODAL ADD -->

          <!-- DATA -->
          <div class="card">
            <div class="card-header">
              <div align="right">
                <a href="cetak-respon-intern.php" target="_blank">
                  <span type="submit" name="search" value="search" class="btn bg-gray btn-flat">
                    <i class="fa fa-print"></i> 
                    Print
                  </span>
                </a>
                <a href="assets/file/respon_time/surat_intern/download/ex_surat-intern.php">
                  <span type="submit" name="search" value="search" class="btn bg-olive btn-flat">
                    <i class="fa fa-file-excel"></i> 
                    Export Excel
                  </span>
                </a>
                <button class="btn bg-info btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Data"><i class="nav-icon far fa-plus-square"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-striped">
                  <thead>
                    <tr align="center">
                      <th rowspan="2">No.</th>
                      <th colspan="2">Nomor</th>
                      <th rowspan="2">Jam Diterima</th>
                      <th rowspan="2">Jam Eksposisi Mutasi Surat</th>
                      <th rowspan="2">Penerima</th>
                      <th rowspan="2">Lampiran</th>
                      <th rowspan="2" width="100px">Action</th>
                    </tr>
                    <tr>
                      <th>Tanggal</th>
                      <th>Berkas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $con=mysqli_connect("localhost","root","","rskg_sirsadm");
                        // Check connection
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $result = mysqli_query($con,"SELECT * FROM tb_rtsi ORDER BY id_rtsi DESC");

                    $no=0;
                    if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_array($result))
                      {
                        $no++;
                        echo "<tr>";
                        echo "<td>".$no.".</td>";
                        if ($row['tanggal']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".tanggal_indo($row['tanggal'], true) . "</td>";
                        }
                        if ($row['no_berkas']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['no_berkas'] . "</td>";
                        }
                        if ($row['jam']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['jam'] . "</td>";
                        }
                        if ($row['mutasi']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['mutasi'] . "</td>";
                        }
                        if ($row['penerima']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['penerima'] . "</td>";
                        }
                        if ($row['lampiran']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td align= ''>
                          <a href='assets/file/respon_time/surat_intern/lampiran/$row[lampiran]' target='_blank' title='Lihat'><span class='btn btn-info btn-xs'><i class='fa fa-eye'></i> Lihat</span></a>
                          </td>";
                        }
                        echo "<td align= '' width='30px'>
                        <a href='#' data-toggle='modal' data-target='#edit$row[id_rtsi]' title='Edit'><span class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> </span></a>
                        <a href='#' data-toggle='modal' data-target='#delete$row[id_rtsi]' title='Delete'><span class='btn btn-danger btn-xs'><i class='fas fa-times'></i> </span></a>
                        <a href='#' data-toggle='modal' data-target='#addfile$row[id_rtsi]' title='Tambah Lampiran'><span class='btn btn-default btn-xs'><i class='fas fa-file'></i> </span></a>
                        </td>";
                        echo "</tr>";
                        ?>

                        <!-- UPDATE -->
                        <div class="modal fade" id="edit<?php echo $row['id_rtsi'];?>">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Update Respon Time Surat Intern</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" placeholder="Tanggal ..." value="<?php echo $row['tanggal']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>No Berkas</label>
                                        <input type="text" class="form-control" name="no_berkas" placeholder="No Berkas ..." value="<?php echo $row['no_berkas']; ?>">
                                        <input type="hidden" class="form-control" name="id_rtsi" value="<?php echo $row['id_rtsi']; ?>">
                                        <input type="hidden" class="form-control" name="date_rtsi"value="<?php echo $row['date_rtsi']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Jam</label>
                                        <!-- <input type="times" class="form-control" name="jam" placeholder="Jam ..." value="<?php echo $row['jam']; ?>"> -->
                                        <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                          <input type="text" name="jam" class="form-control datetimepicker-input" data-target="#timepicker2" value="<?php echo $row['jam']; ?>"/>
                                          <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Mutasi</label>
                                        <!-- <input type="times" class="form-control" name="mutasi" placeholder="Mutasi ..." value="<?php echo $row['mutasi']; ?>"> -->
                                        <div class="input-group date" id="timepicker3" data-target-input="nearest">
                                          <input type="text" name="mutasi" class="form-control datetimepicker-input" data-target="#timepicker3" value="<?php echo $row['mutasi']; ?>"/>
                                          <div class="input-group-append" data-target="#timepicker3" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Penerima</label>
                                        <select class="select2bs4" multiple="multiple" name="penerima[]" data-placeholder="Pilih Penerima" style="width: 100%;" required="required">
                                          <option value="<?php echo $row['penerima']; ?>"><?php echo $row['penerima']; ?></option>
                                          <option value="">-- Pilih Penerima --</option>
                                          <?php
                                          $con=mysqli_connect("localhost","root","","rskg_sirsadm");
                                          if (mysqli_connect_errno())
                                          {
                                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                          }
                                          $resultpenerima=mysql_query("SELECT fullname FROM tb_user");
                                          while($datapenerima=mysql_fetch_array($resultpenerima)) { ?>
                                            <option value="<?php echo $datapenerima['fullname']; ?>"><?php echo $datapenerima['fullname']; ?></option>
                                            <?php
                                          }
                                          ?>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <button type="submit" name="update" class="btn btn-block btn-info">Submit</button>
                                    <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- END UPDATE -->

                        <!-- DELETE -->
                        <div class="modal fade" id="delete<?php echo $row['id_rtsi'];?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Delete Respon Time Surat Intern</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="">
                                  <div class="form-group">
                                    <label>Hapus Data Respon Time Surat Intern?</label>
                                    <h6>Tanggal : <b><u><?php echo $row['tanggal'];?></u></b></h6>
                                    <h6>Nomor Berkas : <b><u><?php echo $row['no_berkas'];?></u></b></h6>
                                    <h6>Jam : <b><u><?php echo $row['jam'];?></u></b></h6>
                                    <h6>Mutasi : <b><u><?php echo $row['mutasi'];?></u></b></h6>
                                    <h6>Penerima : <b><u><?php echo $row['penerima'];?></u></b></h6>
                                    <input type="hidden" name="id_rtsi" class="form-control" placeholder="client name" value="<?php echo $row['id_rtsi'];?>" required>
                                  </div>
                                  <button type="submit" name="delete" class="btn btn-info btn-block btn-flat">Yes</button>
                                  <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">No</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- END DELETE -->

                        <!-- ADD FILE -->
                        <div class="modal fade" id="addfile<?php echo $row['id_rtsi'];?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Tambah File Lampiran</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <label>Upload File</label>
                                    <input type="file" name="lampiran" placeholder="Upload ...">
                                    <input type="hidden" name="id_rtsi" class="form-control" placeholder="client name" value="<?php echo $row['id_rtsi'];?>" required>
                                  </div>
                                  <button type="submit" name="uploadlampiran" class="btn btn-info btn-block btn-flat">Submit</button>
                                  <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">Close</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- END FILE -->

                        <?php
                      }
                    }mysqli_close($con);
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Tanggal</th>
                      <th>Berkas</th>
                      <th>Jam Diterima</th>
                      <th>Jam Eksposisi Mutasi Surat</th>
                      <th>Penerima</th>
                      <th>Lampiran</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <!-- END DATA -->

        </div>
      </section>
      <!-- END ISI -->
    </div>
  </div>
  <?php include 'include/footer.php'; ?>
  <?php include 'include/jsfile.php'; ?>
</body>
</html>
