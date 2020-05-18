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
  $id_laporankgt    = $_POST['id_laporankgt'];
  $tanggal          = $_POST['tanggal'];
  $selesai          = $_POST['selesai'];
  $kegiatan         = $_POST['kegiatan'];
  $username         = $_POST['username'];
  $json_username    = json_encode($username);
  $tempat           = $_POST['tempat'];
  $date_laporankgt  = $_POST['date_laporankgt'];

  $query = mysql_query("INSERT INTO tb_laporankgt 
    (id_laporankgt,tanggal,selesai,kegiatan,username,tempat,date_laporankgt) 
    VALUES 
    ('','$tanggal','$selesai','$kegiatan','$json_username','$tempat','$date_laporankgt')
    ");
  if ($query) {
    header("Location: ./laporan-kegiatan.php?ntf=1");  
  } else {
    header("Location: ./laporan-kegiatan.php?ntf=6");
  }
}

// EDIT
if(isset($_POST["update"]))    
{    
  $id_laporankgt    = $_POST['id_laporankgt'];
  $tanggal          = $_POST['tanggal'];
  $selesai          = $_POST['selesai'];
  $kegiatan         = $_POST['kegiatan'];
  $username         = $_POST['username'];
  $json_username    = json_encode($username);
  $tempat           = $_POST['tempat'];
  $date_laporankgt  = $_POST['date_laporankgt'];

  $query = mysql_query("UPDATE tb_laporankgt SET 
    tanggal = '$tanggal',
    selesai = '$selesai',
    kegiatan = '$kegiatan',
    username = '$json_username',
    tempat = '$tempat',
    date_laporankgt = '$date_laporankgt'
    WHERE id_laporankgt ='$id_laporankgt'");
  if($query){
    header("Location: ./laporan-kegiatan.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $id_laporankgt    = $_POST['id_laporankgt'];

  if($id_laporankgt){
    $query = mysql_query("DELETE FROM tb_laporankgt WHERE id_laporankgt = '$id_laporankgt'");
    if($query){
     header("Location: ./laporan-kegiatan.php?ntf=3");                     
   } else {
    header("Location: ./laporan-kegiatan.php?ntf=6");  
  }
} else {
  header("Location: ./laporan-kegiatan.php?ntf=6");  
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

$peserta = mysql_query("SELECT fullname FROM tb_user");
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
              <h1 class="m-0 text-dark">Laporan Kegiatan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Laporan Kegiatan</a></li>
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
                  <label class="modal-title">Tambah Laporan Kegiatan</label>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="POST">
                  <div class="modal-body">
                    <div align="center" style="background-color: gray">
                      <label>Hari/Tanggal</label>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Mulai<font style="color: red">*</font></label>
                          <input type="date" class="form-control" name="tanggal" required="required">
                          <input type="hidden" class="form-control" name="id_laporankgt">
                          <input type="hidden" class="form-control" name="date_laporankgt" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Selesai<font style="color: red">*</font></label>
                          <input type="date" class="form-control" name="selesai" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Kegiatan<font style="color: red">*</font></label>
                          <textarea class="form-control" rows="3" name="kegiatan" placeholder="Kegiatan ..." required="required"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Nama Peserta</label>
                          <select class="select2bs4" multiple="multiple" name="username[]" data-placeholder="Pilih Peserta" style="width: 100%;">
                            <option value="">-- Pilih Peserta --</option>
                            <?php 
                            while ($row_peserta = mysql_fetch_assoc($peserta)) {
                              ?>
                              <option value="<?= $row_peserta['fullname'] ?>"><?= $row_peserta['fullname'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Tempat<font style="color: red">*</font></label>
                          <textarea class="form-control" rows="3" name="tempat" placeholder="Tempat ..." required="required"></textarea>
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
                <a href="cetak-laporan-kegiatan.php" target="_blank">
                  <span type="submit" name="search" value="search" class="btn bg-gray btn-flat">
                    <i class="fa fa-print"></i> 
                    Print
                  </span>
                </a>
                <a href="assets/file/laporan_kegiatan/word/ex-laporan-kegiatan.php">
                  <span type="submit" name="search" value="search" class="btn bg-blue btn-flat">
                    <i class="fa fa-file-word"></i> 
                    Export Word
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
                      <th colspan="2">Hari/Tanggal</th>
                      <th rowspan="2">Kegiatan</th>
                      <th rowspan="2">Nama Peserta</th>
                      <th rowspan="2">Tempat</th>
                      <th rowspan="2" width="100px">Action</th>
                    </tr>
                    <tr align="center">
                      <th>Mulai</th>
                      <th>Selesai</th>
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
                    $result = mysqli_query($con,"SELECT * FROM tb_laporankgt ORDER BY id_laporankgt DESC");

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
                        if ($row['selesai']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".tanggal_indo($row['tanggal'], true) . "</td>";
                        }
                        if ($row['kegiatan']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['kegiatan'] . "</td>";
                        }
                        if ($row['username']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td align= '' width='30px'>
                          <a href='#' data-toggle='modal' data-target='#lihatpeserta$row[id_laporankgt]' title='Lihat Peserta'><span class='btn btn-info btn-xs'><i class='fas fa-eye'></i> Peserta</span></a>
                          </td>";
                        }
                        if ($row['tempat']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['tempat'] . "</td>";
                        }
                        echo "<td align= '' width='30px'>
                        <a href='#' data-toggle='modal' data-target='#edit$row[id_laporankgt]' title='Edit'><span class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> </span></a>
                        <a href='#' data-toggle='modal' data-target='#delete$row[id_laporankgt]' title='Delete'><span class='btn btn-danger btn-xs'><i class='fas fa-times'></i> </span></a>
                        </td>";
                        echo "</tr>";
                        ?>

                        <!-- UPDATE -->
                        <div class="modal fade" id="edit<?php echo $row['id_laporankgt'];?>">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Update Laporan Kegiatan</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  <div align="center" style="background-color: gray">
                                    <label>Hari/Tanggal</label>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Mulai</label>
                                        <input type="date" class="form-control" name="tanggal" value="<?php echo $row['tanggal']; ?>">
                                        <input type="hidden" class="form-control" name="id_laporankgt" value="<?php echo $row['id_laporankgt']; ?>">
                                        <input type="hidden" class="form-control" name="date_laporankgt" value="<?php echo $row['date_laporankgt']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Selesai</label>
                                        <input type="date" class="form-control" name="selesai" value="<?php echo $row['selesai']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Kegiatan</label>
                                        <textarea class="form-control" rows="3" name="kegiatan" placeholder="Kegiatan ..."><?php echo $row['kegiatan']; ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Nama Peserta</label>
                                        <select class="select2bs4" multiple="multiple" name="username[]" data-placeholder="Pilih Peserta" style="width: 100%;">
                                          <option value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></option>
                                          <option value="">-- Pilih Peserta --</option>
                                          <?php
                                          $con=mysqli_connect("localhost","root","","rskg_sirsadm");
                                          if (mysqli_connect_errno())
                                          {
                                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                          }
                                          $resultpeserta=mysql_query("SELECT fullname FROM tb_user");
                                          while($datapeserta=mysql_fetch_array($resultpeserta)) { ?>
                                            <option value="<?php echo $datapeserta['fullname']; ?>"><?php echo $datapeserta['fullname']; ?></option>
                                            <?php
                                          }
                                          ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Tempat</label>
                                        <textarea class="form-control" rows="3" name="tempat" placeholder="Tempat ..."><?php echo $row['tempat']; ?></textarea>
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
                        <div class="modal fade" id="delete<?php echo $row['id_laporankgt'];?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Delete Laporan Kegiatan</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="">
                                  <div class="form-group">
                                    <label>Hapus Data Laporan Kegiatan?</label>
                                    <h6>Hari/Tanggal : <b><u><?php echo tanggal_indo($row['tanggal'], true);?></u></b></h6>
                                    <h6>Kegiatan : <b><u><?php echo $row['kegiatan'];?></u></b></h6>
                                    <h6>Peserta : <b><u><?php echo $row['username'];?></u></b></h6>
                                    <h6>Tempat : <b><u><?php echo $row['tempat'];?></u></b></h6>
                                    <input type="hidden" name="id_laporankgt" class="form-control" placeholder="client name" value="<?php echo $row['id_laporankgt'];?>" required>
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
                        <div class="modal fade" id="lihatpeserta<?php echo $row['id_laporankgt'];?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Daftar Peserta</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <?php echo $row['username']; ?>
                                  </div>
                                  <!-- <button type="submit" name="uploadlampiran" class="btn btn-info btn-block btn-flat">Submit</button> -->
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
                    <tr align="center">
                      <th>No.</th>
                      <th>Mulai</th>
                      <th>Selesai</th>
                      <th>Kegiatan</th>
                      <th>Nama Peserta</th>
                      <th>Tempat</th>
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
