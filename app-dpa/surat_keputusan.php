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
  $id_sk          = $_POST['id_sk'];
  $no_urut_sk     = $_POST['no_urut_sk'];
  $tanggal_sk     = $_POST['tanggal_sk'];
  $no_dok_sk      = $_POST['no_dok_sk'];
  $judul_sk       = $_POST['judul_sk'];
  $bagian_sk      = $_POST['bagian_sk'];
  $keterangan_sk  = $_POST['keterangan_sk'];
  $date_sk        = $_POST['date_sk'];

  $nama = $_FILES['upload_sk']['name'];
  $file_tmp = $_FILES['upload_sk']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/surat_keputusan/lampiran/'.$nama);

  $query = mysql_query("INSERT INTO tb_suratkeputusan 
    (id_sk,no_urut_sk,tanggal_sk,no_dok_sk,judul_sk,bagian_sk,keterangan_sk,date_sk,upload_sk) 
    VALUES 
    ('','$no_urut_sk','$tanggal_sk','$no_dok_sk','$judul_sk','$bagian_sk','$keterangan_sk','$date_sk','$nama')
    ");
  if ($query) {
    header("Location: ./surat_keputusan.php?ntf=1");  
  } else {
    header("Location: ./surat_keputusan.php?ntf=6");
  }
}

// EDIT
if(isset($_POST["update"]))    
{    
  $id_sk          = $_POST['id_sk'];
  $no_urut_sk     = $_POST['no_urut_sk'];
  $tanggal_sk     = $_POST['tanggal_sk'];
  $no_dok_sk      = $_POST['no_dok_sk'];
  $judul_sk       = $_POST['judul_sk'];
  $bagian_sk      = $_POST['bagian_sk'];
  $keterangan_sk  = $_POST['keterangan_sk'];
  $date_sk        = $_POST['date_sk'];

  $query = mysql_query("UPDATE tb_suratkeputusan SET 
    no_urut_sk ='$no_urut_sk',
    tanggal_sk = '$tanggal_sk',
    no_dok_sk = '$no_dok_sk',
    judul_sk = '$judul_sk',
    bagian_sk = '$bagian_sk',
    keterangan_sk = '$keterangan_sk',
    date_sk = '$date_sk'
    WHERE id_sk ='$id_sk'");
  if($query){
    header("Location: ./surat_keputusan.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// TAMBAH LAMPIRAN
if(isset($_POST["uploadlampiran"]))    
{    
  $id_sk           = $_POST['id_sk'];

  $nama = $_FILES['upload_sk']['name'];
  $file_tmp = $_FILES['upload_sk']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/surat_keputusan/lampiran/'.$nama);
  
  $query = mysql_query("UPDATE tb_suratkeputusan SET 
    upload_sk = '$nama'
    WHERE id_sk ='$id_sk'");
  if($query){
    header("Location: ./surat_keputusan.php?ntf=5");                                                  
  } else {
    header("Location: ./surat_keputusan.php?ntf=6");  
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $id_sk    = $_POST['id_sk'];

  if($id_sk){
    $query = mysql_query("DELETE FROM tb_suratkeputusan WHERE id_sk = '$id_sk'");
    if($query){
     header("Location: ./surat_keputusan.php?ntf=3");                     
   } else {
    header("Location: ./surat_keputusan.php?ntf=6");  
  }
} else {
  header("Location: ./surat_keputusan.php?ntf=6");  
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
    <title>DPA RSKG-Surat Keputusan</title>
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
                            <h2 class="pageheader-title">Surat Keputusan Page</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Surat Keputusan Page</li>
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
                        <label class="modal-title">Tambah Surat Keputusan</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>File Upload</label>
                              <input type="file" name="upload_sk">
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>No Urut<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="no_urut_sk" placeholder="No Urut ..." required="required">
                                <input type="hidden" class="form-control" name="id_sk">
                                <input type="hidden" class="form-control" name="date_sk" value="<?php echo date('Y-m-d'); ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Tanggal<font style="color: red">*</font></label>
                                <input type="date" class="form-control" name="tanggal_sk" value="<?php echo date('Y-m-d'); ?>" required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>No. Dokumen<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="no_dok_sk" placeholder="No. Dokumen ..." required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Judul<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="judul_sk" placeholder="Judul ..." required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Bagian/Instalasi/Komite<font style="color: red">*</font></label>
                                <select name="bagian_sk" class="form-control" required="required">
                                    <option value="">-- Pilih Bagian/Instalasi/Komite --</option>
                                    <?php
                                    //Membuat coneksi ke database 
                                    $con = mysqli_connect("localhost",'root',"","rskg_dpa");
                                    if (!$con){
                                      die("coneksi database gagal:".mysqli_connect_error());
                                    }
                                    
                                    //Perintah sql untuk menampilkan semua data pada tabel department
                                    $sql="SELECT * FROM tb_bagian";

                                    $hasil=mysqli_query($con,$sql);
                                    $no=0;
                                    while ($data = mysqli_fetch_array($hasil)) {
                                    $no++;
                                    ?>
                                    <option value="<?php echo $data['nama_bg'];?>"><?php echo $data['nama_bg'];?></option>
                                    <?php 
                                    }
                                    ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" rows="3" name="keterangan_sk" placeholder="Keterangan ..."></textarea>
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
                                <button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Surat Keputusan"><i class="nav-icon far fa-plus-square"></i> Tambah Surat Keputusan
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
                                                <th>Judul</th>
                                                <th>Bagian/Instalasi/Komite</th>
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
                                            $result = mysqli_query($con,"SELECT * FROM tb_suratkeputusan ORDER BY id_sk DESC");

                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['id_sk'] . "</td>";
                                                    echo "<td>".$row['no_urut_sk'] . "</td>";
                                                    echo "<td>".tanggal_indo($row['tanggal_sk'], true) . "</td>";
                                                    echo "<td>".$row['no_dok_sk'] . "</td>";
                                                    echo "<td>".$row['judul_sk'] . "</td>";
                                                    echo "<td>".$row['bagian_sk'] . "</td>";
                                                     if ($row['upload_sk']==NULL){
                                                        echo "<td>empty</td>";
                                                      }else{
                                                        echo "<td align='center'>
                                                        <a href='./assets/file/surat_keputusan/lampiran/$row[upload_sk]' target='_blank'><img src='assets/images/icon/unnamed.png' width='40px'></a>
                                                        </td>";
                                                      }
                                                    echo "<td>".$row['keterangan_sk'] . "</td>";
                                                    echo "<td width='100px'>
                                                    <a href='#' data-toggle='modal' data-target='#edit$row[id_sk]' title='Edit'><span class='badge badge-success'><i class='fa fa-edit'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#delete$row[id_sk]' title='Delete'><span class='badge badge-danger'><i class='fas fa-times'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#addfile$row[id_sk]' title='Tambah Lampiran'><span class='badge badge-dark'><i class='fas fa-file'></i> </span></a>
                                                    </td>";
                                                    echo "</tr>";
                                                    ?>
                                                    <!-- UPDATE -->
                                                    <div class="modal fade" id="edit<?php echo $row['id_sk'];?>" role="dialog">
                                                      <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Update Surat Keputusan</label>
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
                                                                    <input type="text" class="form-control" name="no_urut_sk" placeholder="No. Ururt ..." value="<?php echo $row['no_urut_sk']; ?>">
                                                                    <input type="hidden" class="form-control" name="id_sk" value="<?php echo $row['id_sk']; ?>">
                                                                    <input type="hidden" class="form-control" name="date_sk" value="<?php echo $row['date_sk']; ?>">
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Tanggal</label>
                                                                    <input type="date" class="form-control" name="tanggal_sk" value="<?php echo $row['tanggal_sk']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>No. Dokumen</label>
                                                                    <input type="text" class="form-control" name="no_dok_sk" placeholder="No. Dokumen ..." value="<?php echo $row['no_dok_sk']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Judul</label>
                                                                    <input type="text" class="form-control" name="judul_sk" placeholder="Judul ..." value="<?php echo $row['judul_sk']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Bagian/Instalasi/Komite</label>
                                                                    <select name="bagian_sk" class="form-control" required="required">
                                                                        <option value="<?php echo $row['bagian_sk']; ?>"><?php echo $row['bagian_sk']; ?></option>
                                                                        <option value=""></option>
                                                                        <?php
                                                                        //Membuat coneksi ke database 
                                                                        $con = mysqli_connect("localhost",'root',"","rskg_dpa");
                                                                        if (!$con){
                                                                          die("coneksi database gagal:".mysqli_connect_error());
                                                                        }
                                                                        
                                                                        //Perintah sql untuk menampilkan semua data pada tabel department
                                                                        $sql="SELECT * FROM tb_bagian";

                                                                        $hasil=mysqli_query($con,$sql);
                                                                        $no=0;
                                                                        while ($data = mysqli_fetch_array($hasil)) {
                                                                        $no++;
                                                                        ?>
                                                                        <option value="<?php echo $data['nama_bg'];?>"><?php echo $data['nama_bg'];?></option>
                                                                        <?php 
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Keterangan</label>
                                                                    <textarea class="form-control" rows="3" name="keterangan_sk" placeholder="Keterangan ..."><?php echo $row['keterangan_sk']; ?></textarea>
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
                                                    <div class="modal fade" id="delete<?php echo $row['id_sk'];?>" role="dialog">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Delete Surat Keputusan</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form method="post" action="">
                                                              <div class="form-group">
                                                                <label>Hapus Surat Keputusan?</label>
                                                                <h6>No. Urut : <b><u><?php echo $row['no_urut_sk'];?></u></b></h6>
                                                                <h6>Tanggal : <b><u><?php echo $row['tanggal_sk'];?></u></b></h6>
                                                                <h6>No. Dokumen : <b><u><?php echo $row['no_dok_sk'];?></u></b></h6>
                                                                <h6>Judul : <b><u><?php echo $row['judul_sk'];?></u></b></h6>
                                                                <h6>Bagian/Instalasi/Komite : <b><u><?php echo $row['bagian_sk'];?></u></b></h6>
                                                                <h6><u>Keterangan</u><br><p align="justify"><?php echo $row['keterangan_sk'];?></p></h6>
                                                                <input type="hidden" name="id_sk" class="form-control" placeholder="client name" value="<?php echo $row['id_sk'];?>" required>
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
                                                    <div class="modal fade" id="addfile<?php echo $row['id_sk'];?>" role="dialog">
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
                                                                <input type="file" name="upload_sk">
                                                                <input type="hidden" name="id_sk" class="form-control" value="<?php echo $row['id_sk'];?>" required>
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
                                                    <th>Judul</th>
                                                    <th>Bagian/Instalasi/Komite</th>
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