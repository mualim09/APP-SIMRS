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
  $id_spo          = $_POST['id_spo'];
  $no_urut_spo     = $_POST['no_urut_spo'];
  $tanggal_spo     = $_POST['tanggal_spo'];
  $no_dok_spo      = $_POST['no_dok_spo'];
  $judul_spo       = $_POST['judul_spo'];
  $bagian_spo      = $_POST['bagian_spo'];
  $keterangan_spo  = $_POST['keterangan_spo'];
  $date_spo        = $_POST['date_spo'];

  $nama = $_FILES['upload_spo']['name'];
  $file_tmp = $_FILES['upload_spo']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/SPO/lampiran/'.$nama);

  $query = mysql_query("INSERT INTO tb_spo 
    (id_spo,no_urut_spo,tanggal_spo,no_dok_spo,judul_spo,bagian_spo,keterangan_spo,date_spo,upload_spo) 
    VALUES 
    ('','$no_urut_spo','$tanggal_spo','$no_dok_spo','$judul_spo','$bagian_spo','$keterangan_spo','$date_spo','$nama')
    ");
  if ($query) {
    header("Location: ./SPO.php?ntf=1");  
  } else {
    header("Location: ./SPO.php?ntf=6");
  }
}

// EDIT
if(isset($_POST["update"]))    
{    
  $id_spo          = $_POST['id_spo'];
  $no_urut_spo     = $_POST['no_urut_spo'];
  $tanggal_spo     = $_POST['tanggal_spo'];
  $no_dok_spo      = $_POST['no_dok_spo'];
  $judul_spo       = $_POST['judul_spo'];
  $bagian_spo      = $_POST['bagian_spo'];
  $keterangan_spo  = $_POST['keterangan_spo'];
  $date_spo        = $_POST['date_spo'];

  $query = mysql_query("UPDATE tb_spo SET 
    no_urut_spo ='$no_urut_spo',
    tanggal_spo = '$tanggal_spo',
    no_dok_spo = '$no_dok_spo',
    judul_spo = '$judul_spo',
    bagian_spo = '$bagian_spo',
    keterangan_spo = '$keterangan_spo',
    date_spo = '$date_spo'
    WHERE id_spo ='$id_spo'");
  if($query){
    header("Location: ./SPO.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// TAMBAH LAMPIRAN
if(isset($_POST["uploadlampiran"]))    
{    
  $id_spo           = $_POST['id_spo'];

  $nama = $_FILES['upload_spo']['name'];
  $file_tmp = $_FILES['upload_spo']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/SPO/lampiran/'.$nama);
  
  $query = mysql_query("UPDATE tb_spo SET 
    upload_spo = '$nama'
    WHERE id_spo ='$id_spo'");
  if($query){
    header("Location: ./SPO.php?ntf=5");                                                  
  } else {
    header("Location: ./SPO.php?ntf=6");  
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $id_spo    = $_POST['id_spo'];

  if($id_spo){
    $query = mysql_query("DELETE FROM tb_spo WHERE id_spo = '$id_spo'");
    if($query){
     header("Location: ./SPO.php?ntf=3");                     
   } else {
    header("Location: ./SPO.php?ntf=6");  
  }
} else {
  header("Location: ./SPO.php?ntf=6");  
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
    <title>DPA RSKG-SPO</title>
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
                            <h2 class="pageheader-title">SPO Page</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">SPO Page</li>
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
                        <label class="modal-title">Tambah SPO</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>File Upload</label>
                              <input type="file" name="upload_spo">
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>No Urut<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="no_urut_spo" placeholder="No Urut ..." required="required">
                                <input type="hidden" class="form-control" name="id_spo">
                                <input type="hidden" class="form-control" name="date_spo" value="<?php echo date('Y-m-d'); ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Tanggal<font style="color: red">*</font></label>
                                <input type="date" class="form-control" name="tanggal_spo" value="<?php echo date('Y-m-d'); ?>" required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>No. Dokumen<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="no_dok_spo" placeholder="No. Dokumen ..." required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Judul<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="judul_spo" placeholder="Judul ..." required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Bagian/Instalasi/Komite<font style="color: red">*</font></label>
                                <select name="bagian_spo" class="form-control" required="required">
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
                                <textarea class="form-control" rows="3" name="keterangan_spo" placeholder="Keterangan ..."></textarea>
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
                                <button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah SPO"><i class="nav-icon far fa-plus-square"></i> Tambah SPO
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
                                            $result = mysqli_query($con,"SELECT * FROM tb_spo ORDER BY id_spo DESC");

                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['id_spo'] . "</td>";
                                                    echo "<td>".$row['no_urut_spo'] . "</td>";
                                                    echo "<td>".tanggal_indo($row['tanggal_spo'], true) . "</td>";
                                                    echo "<td>".$row['no_dok_spo'] . "</td>";
                                                    echo "<td>".$row['judul_spo'] . "</td>";
                                                    echo "<td>".$row['bagian_spo'] . "</td>";
                                                     if ($row['upload_spo']==NULL){
                                                        echo "<td>empty</td>";
                                                      }else{
                                                        echo "<td align='center'>
                                                        <a href='./assets/file/SPO/lampiran/$row[upload_spo]' target='_blank'><img src='assets/images/icon/unnamed.png' width='40px'></a>
                                                        </td>";
                                                      }
                                                    echo "<td>".$row['keterangan_spo'] . "</td>";
                                                    echo "<td width='100px'>
                                                    <a href='#' data-toggle='modal' data-target='#edit$row[id_spo]' title='Edit'><span class='badge badge-success'><i class='fa fa-edit'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#delete$row[id_spo]' title='Delete'><span class='badge badge-danger'><i class='fas fa-times'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#addfile$row[id_spo]' title='Tambah Lampiran'><span class='badge badge-dark'><i class='fas fa-file'></i> </span></a>
                                                    </td>";
                                                    echo "</tr>";
                                                    ?>
                                                    <!-- UPDATE -->
                                                    <div class="modal fade" id="edit<?php echo $row['id_spo'];?>" role="dialog">
                                                      <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Update SPO</label>
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
                                                                    <input type="text" class="form-control" name="no_urut_spo" placeholder="No. Ururt ..." value="<?php echo $row['no_urut_spo']; ?>">
                                                                    <input type="hidden" class="form-control" name="id_spo" value="<?php echo $row['id_spo']; ?>">
                                                                    <input type="hidden" class="form-control" name="date_spo" value="<?php echo $row['date_spo']; ?>">
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Tanggal</label>
                                                                    <input type="date" class="form-control" name="tanggal_spo" value="<?php echo $row['tanggal_spo']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>No. Dokumen</label>
                                                                    <input type="text" class="form-control" name="no_dok_spo" placeholder="No. Dokumen ..." value="<?php echo $row['no_dok_spo']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Judul</label>
                                                                    <input type="text" class="form-control" name="judul_spo" placeholder="Judul ..." value="<?php echo $row['judul_spo']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Bagian/Instalasi/Komite</label>
                                                                    <select name="bagian_spo" class="form-control" required="required">
                                                                        <option value="<?php echo $row['bagian_spo']; ?>"><?php echo $row['bagian_spo']; ?></option>
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
                                                                    <textarea class="form-control" rows="3" name="keterangan_spo" placeholder="Keterangan ..."><?php echo $row['keterangan_spo']; ?></textarea>
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
                                                    <div class="modal fade" id="delete<?php echo $row['id_spo'];?>" role="dialog">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Delete SPO</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form method="post" action="">
                                                              <div class="form-group">
                                                                <label>Hapus SPO?</label>
                                                                <h6>No. Urut : <b><u><?php echo $row['no_urut_spo'];?></u></b></h6>
                                                                <h6>Tanggal : <b><u><?php echo $row['tanggal_spo'];?></u></b></h6>
                                                                <h6>No. Dokumen : <b><u><?php echo $row['no_dok_spo'];?></u></b></h6>
                                                                <h6>Judul : <b><u><?php echo $row['judul_spo'];?></u></b></h6>
                                                                <h6>Bagian/Instalasi/Komite : <b><u><?php echo $row['bagian_spo'];?></u></b></h6>
                                                                <h6><u>Keterangan</u><br><p align="justify"><?php echo $row['keterangan_spo'];?></p></h6>
                                                                <input type="hidden" name="id_spo" class="form-control" placeholder="client name" value="<?php echo $row['id_spo'];?>" required>
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
                                                    <div class="modal fade" id="addfile<?php echo $row['id_spo'];?>" role="dialog">
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
                                                                <input type="file" name="upload_spo">
                                                                <input type="hidden" name="id_spo" class="form-control" value="<?php echo $row['id_spo'];?>" required>
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