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
  $id_ask           = $_POST['id_ask'];
  $berkas_ask       = $_POST['berkas_ask'];
  $alamat_penerima  = $_POST['alamat_penerima'];
  $tanggal          = $_POST['tanggal'];
  $perihal_ask      = $_POST['perihal_ask'];
  $ket_ask          = $_POST['ket_ask'];
  $date_ask         = $_POST['date_ask'];

  $nama = $_FILES['lampiran_ask']['name'];
  $file_tmp = $_FILES['lampiran_ask']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/surat_keluar/lampiran/'.$nama);

  $query = mysql_query("INSERT INTO tb_ask 
    (id_ask,berkas_ask,alamat_penerima,tanggal,perihal_ask,ket_ask,date_ask,lampiran_ask) 
    VALUES 
    ('','$berkas_ask','$alamat_penerima','$tanggal','$perihal_ask','$ket_ask','$date_ask','$nama')
    ");
  if ($query) {
    header("Location: ./agenda-surat-keluar.php?ntf=1");  
  } else {
    header("Location: ./agenda-surat-keluar.php?ntf=6");
  }
}

// EDIT
if(isset($_POST["update"]))    
{    
  $id_ask           = $_POST['id_ask'];
  $berkas_ask       = $_POST['berkas_ask'];
  $alamat_penerima  = $_POST['alamat_penerima'];
  $tanggal          = $_POST['tanggal'];
  $perihal_ask      = $_POST['perihal_ask'];
  $ket_ask          = $_POST['ket_ask'];
  $date_ask         = $_POST['date_ask'];

  $query = mysql_query("UPDATE tb_ask SET 
    berkas_ask ='$berkas_ask',
    alamat_penerima ='$alamat_penerima',
    tanggal = '$tanggal',
    perihal_ask = '$perihal_ask',
    ket_ask = '$ket_ask',
    date_ask = '$date_ask'
    WHERE id_ask ='$id_ask'");
  if($query){
    header("Location: ./agenda-surat-keluar.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// TAMBAH LAMPIRAN
if(isset($_POST["uploadlampiran"]))    
{    
  $id_ask           = $_POST['id_ask'];

  $nama = $_FILES['lampiran_ask']['name'];
  $file_tmp = $_FILES['lampiran_ask']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/surat_keluar/lampiran/'.$nama);
  
  $query = mysql_query("UPDATE tb_ask SET 
    lampiran_ask = '$nama'
    WHERE id_ask ='$id_ask'");
  if($query){
    header("Location: ./agenda-surat-keluar.php?ntf=5");                                                  
  } else {
    header("Location: ./agenda-surat-keluar.php?ntf=6");  
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $id_ask    = $_POST['id_ask'];

  if($id_ask){
    $query = mysql_query("DELETE FROM tb_ask WHERE id_ask = '$id_ask'");
    if($query){
     header("Location: ./agenda-surat-keluar.php?ntf=3");                     
   } else {
    header("Location: ./agenda-surat-keluar.php?ntf=6");  
  }
} else {
  header("Location: ./agenda-surat-keluar.php?ntf=6");  
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
              <h1 class="m-0 text-dark">Agenda Surat Keluar</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Agenda Surat Keluar</a></li>
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
                  <label class="modal-title">Tambah Agenda Surat Keluar</label>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>File Upload</label>
                        <input type="file" name="lampiran_ask" placeholder="Upload ...">
                      </div>
                    </div>
                    <div align="center" style="background-color: gray">
                      <label>NOMOR</label>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>No Berkas<font style="color: red">*</font></label>
                          <input type="text" class="form-control" name="berkas_ask" placeholder="No Berkas ..." required="required">
                          <input type="hidden" class="form-control" name="id_ask" placeholder="No Berkas ...">
                          <input type="hidden" class="form-control" name="date_ask" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Alamat Penerima<font style="color: red">*</font></label>
                          <textarea class="form-control" rows="3" name="alamat_penerima" placeholder="Alamat Penerima ..." required="required"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Tanggal<font style="color: red">*</font></label>
                          <input type="date" class="form-control" name="tanggal" placeholder="No Berkas ..." required="required">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Perihal<font style="color: red">*</font></label>
                          <input type="text" class="form-control" name="perihal_ask" placeholder="Perihal ..." required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Keterangan</label>
                          <textarea class="form-control" rows="3" name="ket_ask" placeholder="Keterangan ..."></textarea>
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
                <a href="cetak-surat-keluar.php" target="_blank">
                  <span type="submit" name="search" value="search" class="btn bg-gray btn-flat">
                    <i class="fa fa-print"></i> 
                    Print
                  </span>
                </a>
                <a href="assets/file/surat_keluar/download/ex_surat-keluar.php">
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
                      <th colspan="2">Nomor</th>
                      <th rowspan="2">Alamat Penerima</th>
                      <th rowspan="2">Tanggal</th>
                      <th rowspan="2">Perihal</th>
                      <th rowspan="2">Keterangan</th>
                      <th rowspan="2">Lampiran</th>
                      <th rowspan="2" width="100px">Action</th>
                    </tr>
                    <tr>
                      <th>Urut</th>
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
                    $result = mysqli_query($con,"SELECT * FROM tb_ask ORDER BY id_ask DESC");

                    $no=0;
                    if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_array($result))
                      {
                        $no++;
                        echo "<tr>";
                        echo "<td>".$no.".</td>";
                        if ($row['berkas_ask']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['berkas_ask'] . "</td>";
                        }
                        if ($row['alamat_penerima']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['alamat_penerima'] . "</td>";
                        }
                        if ($row['tanggal']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".tanggal_indo($row['tanggal'], true) . "</td>";
                        }
                        if ($row['perihal_ask']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['perihal_ask'] . "</td>";
                        }
                        if ($row['ket_ask']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['ket_ask'] . "</td>";
                        }
                        if ($row['lampiran_ask']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td align= ''>
                          <a href='assets/file/surat_keluar/lampiran/$row[lampiran_ask]' target='_blank' title='Lihat'><span class='btn btn-info btn-xs'><i class='fa fa-eye'></i> Lihat</span></a>
                          </td>";
                        }
                        echo "<td align= '' width='30px'>
                        <a href='#' data-toggle='modal' data-target='#edit$row[id_ask]' title='Edit'><span class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> </span></a>
                        <a href='#' data-toggle='modal' data-target='#delete$row[id_ask]' title='Delete'><span class='btn btn-danger btn-xs'><i class='fas fa-times'></i> </span></a>
                        <a href='#' data-toggle='modal' data-target='#addfile$row[id_ask]' title='Tambah Lampiran'><span class='btn btn-default btn-xs'><i class='fas fa-file'></i> </span></a>
                        </td>";
                        echo "</tr>";
                        ?>

                        <!-- UPDATE -->
                        <div class="modal fade" id="edit<?php echo $row['id_ask'];?>">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Update Agenda Surat Keluar</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  <div align="center" style="background-color: gray">
                                    <label>NOMOR</label>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>No Berkas</label>
                                        <input type="text" class="form-control" name="berkas_ask" placeholder="No Berkas ..." value="<?php echo $row['berkas_ask']; ?>">
                                        <input type="hidden" class="form-control" name="id_ask" value="<?php echo $row['id_ask']; ?>">
                                        <input type="hidden" class="form-control" name="date_ask" value="<?php echo $row['date_ask']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Alamat Penerima</label>
                                        <textarea class="form-control" rows="3" placeholder="Alamat Penerima ..." name="alamat_penerima"><?php echo $row['alamat_penerima']; ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" value="<?php echo $row['tanggal']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Perihal</label>
                                        <input type="text" class="form-control" name="perihal_ask" placeholder="Perihal ..." value="<?php echo $row['perihal_ask']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" rows="3" name="ket_ask" placeholder="Keterangan ..."><?php echo $row['ket_ask']; ?></textarea>
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
                        <div class="modal fade" id="delete<?php echo $row['id_ask'];?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Delete Agenda Surat Keluar</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="">
                                  <div class="form-group">
                                    <label>Hapus Data Agenda Surat Keluar?</label>
                                    <h6>Nomor Berkas : <b><u><?php echo $row['berkas_ask'];?></u></b></h6>
                                    <h6>Alamat Penerima : <b><u><?php echo $row['alamat_penerima'];?></u></b></h6>
                                    <h6>Tanggal : <b><u><?php echo $row['tanggal'];?></u></b></h6>
                                    <input type="hidden" name="id_ask" class="form-control" placeholder="client name" value="<?php echo $row['id_ask'];?>" required>
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
                        <div class="modal fade" id="addfile<?php echo $row['id_ask'];?>" role="dialog">
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
                                    <input type="file" name="lampiran_ask" placeholder="Upload ...">
                                    <input type="hidden" name="id_ask" class="form-control" placeholder="client name" value="<?php echo $row['id_ask'];?>" required>
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
                      <th>Urut</th>
                      <th>Berkas</th>
                      <th>Alamat Penerima</th>
                      <th>Tanggal</th>
                      <th>Perihal</th>
                      <th>Keterangan</th>
                      <th>Lampiran</th>
                      <th width="100px">Action</th>
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
