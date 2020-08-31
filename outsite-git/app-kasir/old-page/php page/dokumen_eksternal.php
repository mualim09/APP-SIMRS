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
  $id_de          = $_POST['id_de'];
  $no_urut_de     = $_POST['no_urut_de'];
  $tanggal_de     = $_POST['tanggal_de'];
  $no_dok_de      = $_POST['no_dok_de'];
  $judul_de       = $_POST['judul_de'];
  $penerbit_de    = $_POST['penerbit_de'];
  $keterangan_de  = $_POST['keterangan_de'];
  $date_de        = $_POST['date_de'];

  $nama = $_FILES['upload_de']['name'];
  $file_tmp = $_FILES['upload_de']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/dokumen_eksternal/lampiran/'.$nama);

  $query = mysql_query("INSERT INTO tb_dokumeneksternal 
    (id_de,no_urut_de,tanggal_de,no_dok_de,judul_de,penerbit_de,keterangan_de,date_de,upload_de) 
    VALUES 
    ('','$no_urut_de','$tanggal_de','$no_dok_de','$judul_de','$penerbit_de','$keterangan_de','$date_de','$nama')
    ");
  if ($query) {
    header("Location: ./dokumen_eksternal.php?ntf=1");  
  } else {
    header("Location: ./dokumen_eksternal.php?ntf=6");
  }
}

// EDIT
if(isset($_POST["update"]))    
{    
  $id_de          = $_POST['id_de'];
  $no_urut_de     = $_POST['no_urut_de'];
  $tanggal_de     = $_POST['tanggal_de'];
  $no_dok_de      = $_POST['no_dok_de'];
  $judul_de       = $_POST['judul_de'];
  $penerbit_de    = $_POST['penerbit_de'];
  $keterangan_de  = $_POST['keterangan_de'];
  $date_de        = $_POST['date_de'];

  $query = mysql_query("UPDATE tb_dokumeneksternal SET 
    no_urut_de ='$no_urut_de',
    tanggal_de = '$tanggal_de',
    no_dok_de = '$no_dok_de',
    judul_de = '$judul_de',
    penerbit_de = '$penerbit_de',
    keterangan_de = '$keterangan_de',
    date_de = '$date_de'
    WHERE id_de ='$id_de'");
  if($query){
    header("Location: ./dokumen_eksternal.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// TAMBAH LAMPIRAN
if(isset($_POST["uploadlampiran"]))    
{    
  $id_de           = $_POST['id_de'];

  $nama = $_FILES['upload_de']['name'];
  $file_tmp = $_FILES['upload_de']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/dokumen_eksternal/lampiran/'.$nama);
  
  $query = mysql_query("UPDATE tb_dokumeneksternal SET 
    upload_de = '$nama'
    WHERE id_de ='$id_de'");
  if($query){
    header("Location: ./dokumen_eksternal.php?ntf=5");                                                  
  } else {
    header("Location: ./dokumen_eksternal.php?ntf=6");  
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $id_de    = $_POST['id_de'];

  if($id_de){
    $query = mysql_query("DELETE FROM tb_dokumeneksternal WHERE id_de = '$id_de'");
    if($query){
     header("Location: ./dokumen_eksternal.php?ntf=3");                     
   } else {
    header("Location: ./dokumen_eksternal.php?ntf=6");  
  }
} else {
  header("Location: ./dokumen_eksternal.php?ntf=6");  
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
    <title>DPA RSKG-Dokumen Eksternal</title>
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
                            <h2 class="pageheader-title">Dokumen Eksternal Page</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Dokumen Eksternal Page</li>
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
                        <label class="modal-title">Tambah Dokumen Eksternal</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>File Upload</label>
                              <input type="file" name="upload_de">
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>No Urut<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="no_urut_de" placeholder="No Urut ..." required="required">
                                <input type="hidden" class="form-control" name="id_de">
                                <input type="hidden" class="form-control" name="date_de" value="<?php echo date('Y-m-d'); ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Tanggal<font style="color: red">*</font></label>
                                <input type="date" class="form-control" name="tanggal_de" value="<?php echo date('Y-m-d'); ?>" required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>No. Dokumen<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="no_dok_de" placeholder="No. Dokumen ..." required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Judul Dokumen<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="judul_de" placeholder="Judul Dokumen ..." required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Penerbit<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="penerbit_de" placeholder="Penerbit ..." required="required">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" rows="3" name="keterangan_de" placeholder="Keterangan ..."></textarea>
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
                                <button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Dokumen Eksternal"><i class="nav-icon far fa-plus-square"></i> Tambah Dokumen Eksternal
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>No. Urut</th>
                                                <th>Tanggal</th>
                                                <th>No. Dokumen</th>
                                                <th>Judul Dokumen</th>
                                                <th>Penerbit</th>
                                                <th>Upload Dokumen</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $con=mysqli_connect("localhost","root","","rskg_dpa");
                                            if (mysqli_connect_errno())
                                            {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }
                                            $result = mysqli_query($con,"SELECT * FROM tb_dokumeneksternal ORDER BY id_de DESC");

                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['id_de'] . "</td>";
                                                    echo "<td>".$row['no_urut_de'] . "</td>";
                                                    echo "<td>".tanggal_indo($row['tanggal_de'], true) . "</td>";
                                                    echo "<td>".$row['no_dok_de'] . "</td>";
                                                    echo "<td>".$row['judul_de'] . "</td>";
                                                    echo "<td>".$row['penerbit_de'] . "</td>";
                                                     if ($row['upload_de']==NULL){
                                                        echo "<td>empty</td>";
                                                      }else{
                                                        echo "<td align='center'>
                                                        <a href='./assets/file/dokumen_eksternal/lampiran/$row[upload_de]' target='_blank'><img src='assets/images/icon/unnamed.png' width='40px'></a>
                                                        </td>";
                                                      }
                                                    echo "<td>".$row['keterangan_de'] . "</td>";
                                                    echo "<td width='100px'>
                                                    <a href='#' data-toggle='modal' data-target='#edit$row[id_de]' title='Edit'><span class='badge badge-success'><i class='fa fa-edit'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#delete$row[id_de]' title='Delete'><span class='badge badge-danger'><i class='fas fa-times'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#addfile$row[id_de]' title='Tambah Lampiran'><span class='badge badge-dark'><i class='fas fa-file'></i> </span></a>
                                                    </td>";
                                                    echo "</tr>";
                                                    ?>
                                                    <!-- UPDATE -->
                                                    <div class="modal fade" id="edit<?php echo $row['id_de'];?>" role="dialog">
                                                      <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Update Dokumen Eksternal</label>
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
                                                                    <input type="text" class="form-control" name="no_urut_de" placeholder="No. Ururt ..." value="<?php echo $row['no_urut_de']; ?>">
                                                                    <input type="hidden" class="form-control" name="id_de" value="<?php echo $row['id_de']; ?>">
                                                                    <input type="hidden" class="form-control" name="date_de" value="<?php echo $row['date_de']; ?>">
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Tanggal</label>
                                                                    <input type="date" class="form-control" name="tanggal_de" value="<?php echo $row['tanggal_de']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>No. Dokumen</label>
                                                                    <input type="text" class="form-control" name="no_dok_de" placeholder="No. Dokumen ..." value="<?php echo $row['no_dok_de']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Judul</label>
                                                                    <input type="text" class="form-control" name="judul_de" placeholder="Judul ..." value="<?php echo $row['judul_de']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Penerbit</label>
                                                                    <input type="text" class="form-control" name="penerbit_de" placeholder="Penerbit ..." value="<?php echo $row['judul_de']; ?>">
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Keterangan</label>
                                                                    <textarea class="form-control" rows="3" name="keterangan_de" placeholder="Keterangan ..."><?php echo $row['keterangan_de']; ?></textarea>
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
                                                    <div class="modal fade" id="delete<?php echo $row['id_de'];?>" role="dialog">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Delete Dokumen Eksternal</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form method="post" action="">
                                                              <div class="form-group">
                                                                <label>Hapus Dokumen Eksternal?</label>
                                                                <h6>No. Urut : <b><u><?php echo $row['no_urut_de'];?></u></b></h6>
                                                                <h6>Tanggal : <b><u><?php echo $row['tanggal_de'];?></u></b></h6>
                                                                <h6>No. Dokumen : <b><u><?php echo $row['no_dok_de'];?></u></b></h6>
                                                                <h6>Judul : <b><u><?php echo $row['judul_de'];?></u></b></h6>
                                                                <h6>Bagian : <b><u><?php echo $row['penerbit_de'];?></u></b></h6>
                                                                <h6><u>Keterangan</u><br><p align="justify"><?php echo $row['keterangan_de'];?></p></h6>
                                                                <input type="hidden" name="id_de" class="form-control" placeholder="client name" value="<?php echo $row['id_de'];?>" required>
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
                                                    <div class="modal fade" id="addfile<?php echo $row['id_de'];?>" role="dialog">
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
                                                                <input type="file" name="upload_de">
                                                                <input type="hidden" name="id_de" class="form-control" value="<?php echo $row['id_de'];?>" required>
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
                                                    <th>ID</th>
                                                    <th>No. Urut</th>
                                                    <th>Tanggal</th>
                                                    <th>No. Dokumen</th>
                                                    <th>Judul Dokumen</th>
                                                    <th>Penerbit</th>
                                                    <th>Upload Dokumen</th>
                                                    <th>Keterangan</th>
                                                    <th>Action</th>
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