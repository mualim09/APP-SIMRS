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
  $id_a          = $_POST['id_a'];
  $no_urut_a     = $_POST['no_urut_a'];
  $tanggal_a     = $_POST['tanggal_a'];
  $nm_kegiatan_a = $_POST['nm_kegiatan_a'];
  $date_a        = $_POST['date_a'];

  $namaone = $_FILES['undangan_a']['name'];
  $file_tmp = $_FILES['undangan_a']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/agenda_rapat/lampiran/undangan/'.$namaone);

  $namatwo = $_FILES['absensi_a']['name'];
  $file_tmp = $_FILES['absensi_a']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/agenda_rapat/lampiran/absensi/'.$namatwo);

  $namathree = $_FILES['notulensi_a']['name'];
  $file_tmp = $_FILES['notulensi_a']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/agenda_rapat/lampiran/notulensi/'.$namathree);

  $namafour = $_FILES['foto_kegiatan_a']['name'];
  $file_tmp = $_FILES['foto_kegiatan_a']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/agenda_rapat/lampiran/foto_kegiatan/'.$namafour);

  $query = mysql_query("INSERT INTO tb_agendarapat 
    (id_a,no_urut_a,tanggal_a,nm_kegiatan_a,date_a,undangan_a,absensi_a,notulensi_a,foto_kegiatan_a) 
    VALUES 
    ('','$no_urut_a','$tanggal_a','$nm_kegiatan_a','$date_a','$namaone','$namatwo','$namathree','$namafour')
    ");
  if ($query) {
    header("Location: ./agenda_rapat.php?ntf=1");  
  } else {
    header("Location: ./agenda_rapat.php?ntf=6");
  }
}

// EDIT
if(isset($_POST["update"]))    
{    
  $id_a          = $_POST['id_a'];
  $no_urut_a     = $_POST['no_urut_a'];
  $tanggal_a     = $_POST['tanggal_a'];
  $nm_kegiatan_a = $_POST['nm_kegiatan_a'];
  $date_a        = $_POST['date_a'];

  $query = mysql_query("UPDATE tb_agendarapat SET 
    no_urut_a ='$no_urut_a',
    tanggal_a = '$tanggal_a',
    nm_kegiatan_a = '$nm_kegiatan_a',
    date_a = '$date_a'
    WHERE id_a ='$id_a'");
  if($query){
    header("Location: ./agenda_rapat.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// TAMBAH LAMPIRAN
if(isset($_POST["uploadlampiran"]))    
{    
  $id_a           = $_POST['id_a'];

  $namaone = $_FILES['undangan_a']['name'];
  $file_tmp = $_FILES['undangan_a']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/agenda_rapat/lampiran/undangan/'.$namaone);

  $namatwo = $_FILES['absensi_a']['name'];
  $file_tmp = $_FILES['absensi_a']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/agenda_rapat/lampiran/absensi/'.$namatwo);

  $namathree = $_FILES['notulensi_a']['name'];
  $file_tmp = $_FILES['notulensi_a']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/agenda_rapat/lampiran/notulensi/'.$namathree);

  $namafour = $_FILES['foto_kegiatan_a']['name'];
  $file_tmp = $_FILES['foto_kegiatan_a']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/agenda_rapat/lampiran/foto_kegiatan/'.$namafour);
  
  $query = mysql_query("UPDATE tb_agendarapat SET 
    undangan_a = '$namaone',
    absensi_a = '$namatwo',
    notulensi_a = '$namathree',
    foto_kegiatan_a = '$namafour'
    WHERE id_a ='$id_a'");
  if($query){
    header("Location: ./agenda_rapat.php?ntf=5");                                                  
  } else {
    header("Location: ./agenda_rapat.php?ntf=6");  
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $id_a    = $_POST['id_a'];

  if($id_a){
    $query = mysql_query("DELETE FROM tb_agendarapat WHERE id_a = '$id_a'");
    if($query){
     header("Location: ./agenda_rapat.php?ntf=3");                     
   } else {
    header("Location: ./agenda_rapat.php?ntf=6");  
  }
} else {
  header("Location: ./agenda_rapat.php?ntf=6");  
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
    <title>DPA RSKG-Agenda Rapat</title>
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
                            <h2 class="pageheader-title">Agenda Rapat Page</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Agenda Rapat Page</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL ADD -->
                <div class="modal fade" id="modal-add">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <label class="modal-title">Tambah Agenda Rapat</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Upload Undangan</label><br>
                              <input type="file" name="undangan_a" placeholder="Upload Dokumen...">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Upload Absensi</label><br>
                              <input type="file" name="absensi_a" placeholder="Upload Dokumen...">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Upload Notulensi</label><br>
                              <input type="file" name="notulensi_a" placeholder="Upload Dokumen...">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Upload Foto Kegiatan</label><br>
                              <input type="file" name="foto_kegiatan_a" placeholder="Upload Dokumen...">
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>No Urut<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="no_urut_a" placeholder="No Urut ..." required="required">
                                <input type="hidden" class="form-control" name="id_a">
                                <input type="hidden" class="form-control" name="date_a" value="<?php echo date('Y-m-d'); ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Tanggal<font style="color: red">*</font></label>
                                <input type="date" class="form-control" name="tanggal_a" value="<?php echo date('Y-m-d'); ?>" required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Nama Kegiatan<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="nm_kegiatan_a" placeholder="Nama Kegiatan ..." required="required">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
                            <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END MODAL ADD -->
                <!-- ALERT -->
                <?php include 'include/alert/success.php' ?>
                <!-- END ALERT -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Agenda Rapat"><i class="nav-icon far fa-plus-square"></i> Tambah Agenda Rapat
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                          <tr>
                                            <td rowspan="2">ID</td>
                                            <td rowspan="2">No. Urut</td>
                                            <td rowspan="2">Tanggal</td>
                                            <td rowspan="2">Nama Kegiatan</td>
                                            <td colspan="3" align="center">Upload UAN</td>
                                            <td rowspan="2">Foto Kegiatan</td>
                                            <td rowspan="2">Action</td>
                                          </tr>
                                          <tr>
                                              <td>Undangan</td>
                                              <td>Absensi</td>
                                              <td>Notulensi</td>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $con=mysqli_connect("localhost","root","","rskg_dpa");
                                            if (mysqli_connect_errno())
                                            {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }
                                            $result = mysqli_query($con,"SELECT * FROM tb_agendarapat ORDER BY id_a DESC");

                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['id_a'] . "</td>";
                                                    echo "<td>".$row['no_urut_a'] . "</td>";
                                                    echo "<td>".tanggal_indo($row['tanggal_a'], true) . "</td>";
                                                    echo "<td>".$row['nm_kegiatan_a'] . "</td>";
                                                    if ($row['undangan_a']==NULL){
                                                        echo "<td>empty</td>";
                                                      }else{
                                                        echo "<td align='center'>
                                                        <a href='./assets/file/agenda_rapat/lampiran/undangan/$row[undangan_a]' target='_blank'><img src='assets/images/icon/unnamed.png' width='40px'></a>
                                                        </td>";
                                                      }
                                                    if ($row['absensi_a']==NULL){
                                                        echo "<td>empty</td>";
                                                      }else{
                                                        echo "<td align='center'>
                                                        <a href='./assets/file/agenda_rapat/lampiran/absensi/$row[absensi_a]' target='_blank'><img src='assets/images/icon/unnamed.png' width='40px'></a>
                                                        </td>";
                                                      }
                                                     if ($row['notulensi_a']==NULL){
                                                        echo "<td>empty</td>";
                                                      }else{
                                                        echo "<td align='center'>
                                                        <a href='./assets/file/agenda_rapat/lampiran/notulensi/$row[notulensi_a]' target='_blank'><img src='assets/images/icon/unnamed.png' width='40px'></a>
                                                        </td>";
                                                      }
                                                    if ($row['foto_kegiatan_a']==NULL){
                                                        echo "<td>empty</td>";
                                                      }else{
                                                        echo "<td align='center'>
                                                        <a href='./assets/file/agenda_rapat/lampiran/foto_kegiatan/$row[foto_kegiatan_a]' target='_blank'><img src='assets/images/icon/picture.png' width='40px'></a>
                                                        </td>";
                                                      }
                                                    echo "<td width='100px'>
                                                    <a href='#' data-toggle='modal' data-target='#edit$row[id_a]' title='Edit'><span class='badge badge-success'><i class='fa fa-edit'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#delete$row[id_a]' title='Delete'><span class='badge badge-danger'><i class='fas fa-times'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#addfile$row[id_a]' title='Tambah Lampiran'><span class='badge badge-dark'><i class='fas fa-file'></i> </span></a>
                                                    </td>";
                                                    echo "</tr>";
                                                    ?>
                                                    <!-- UPDATE -->
                                                    <div class="modal fade" id="edit<?php echo $row['id_a'];?>" role="dialog">
                                                      <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Update Agenda Rapat</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <form action="" method="POST">
                                                            <div class="modal-body">
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>No. Urut</label>
                                                                    <input type="text" class="form-control" name="no_urut_a" placeholder="No. Ururt ..." value="<?php echo $row['no_urut_a']; ?>">
                                                                    <input type="hidden" class="form-control" name="id_a" value="<?php echo $row['id_a']; ?>">
                                                                    <input type="hidden" class="form-control" name="date_a" value="<?php echo $row['date_a']; ?>">
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Tanggal</label>
                                                                    <input type="date" class="form-control" name="tanggal_a" value="<?php echo $row['tanggal_a']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Nama Kegiatan</label>
                                                                    <input type="text" class="form-control" name="nm_kegiatan_a" placeholder="Nama Kegiatan ..." value="<?php echo $row['nm_kegiatan_a']; ?>">
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                              <div class="form-group">
                                                                <button type="submit" name="update" class="btn btn-block btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                                                              </div>
                                                            </div>
                                                          </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END UPDATE -->

                                                    <!-- DELETE -->
                                                    <div class="modal fade" id="delete<?php echo $row['id_a'];?>" role="dialog">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Delete Agenda Rapat</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form method="post" action="">
                                                              <div class="form-group">
                                                                <label>Hapus Agenda Rapat?</label>
                                                                <h6>No. Urut : <b><u><?php echo $row['no_urut_a'];?></u></b></h6>
                                                                <h6>Tanggal : <b><u><?php echo $row['tanggal_a'];?></u></b></h6>
                                                                <h6>Nama Kegiatan : <b><u><?php echo $row['nm_kegiatan_a'];?></u></b></h6>
                                                                <input type="hidden" name="id_a" class="form-control" placeholder="client name" value="<?php echo $row['id_a'];?>" required>
                                                              </div>
                                                              <button type="submit" name="delete" class="btn btn-danger btn-block btn-flat">Yes</button>
                                                              <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END DELETE -->

                                                    <!-- ADD FILE -->
                                                    <div class="modal fade" id="addfile<?php echo $row['id_a'];?>" role="dialog">
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
                                                              <div class="col-sm-12">
                                                                <div class="form-group">
                                                                  <label>Upload Undangan</label><br>
                                                                  <input type="file" name="undangan_a">
                                                                  <input type="hidden" name="id_a" class="form-control" value="<?php echo $row['id_a'];?>" required>
                                                                </div>
                                                              </div>
                                                              <div class="col-sm-12">
                                                                <div class="form-group">
                                                                  <label>Upload Absensi</label><br>
                                                                  <input type="file" name="absensi_a">
                                                                </div>
                                                              </div>
                                                              <div class="col-sm-12">
                                                                <div class="form-group">
                                                                  <label>Upload Notulensi</label><br>
                                                                  <input type="file" name="notulensi_a">
                                                                </div>
                                                              </div>
                                                              <div class="col-sm-12">
                                                                <div class="form-group">
                                                                  <label>Upload Foto Kegiatan</label><br>
                                                                  <input type="file" name="foto_kegiatan_a">
                                                                </div>
                                                              </div>
                                                              <button type="submit" name="uploadlampiran" class="btn btn-primary btn-block btn-flat">Submit</button>
                                                              <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Close</button>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END FILE -->
                                                <?php } } mysqli_close($con); ?>
                                            </tbody>
                                            <tfoot>
                                              <tr>
                                                <td rowspan="2">ID</td>
                                                <td rowspan="2">No. Urut</td>
                                                <td rowspan="2">Tanggal</td>
                                                <td rowspan="2">Nama Kegiatan</td>
                                                <td colspan="3" align="center">Upload UAN</td>
                                                <td rowspan="2">Foto Kegiatan</td>
                                                <td rowspan="2">Action</td>
                                              </tr>
                                              <tr>
                                                  <td>Undangan</td>
                                                  <td>Absensi</td>
                                                  <td>Notulensi</td>
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