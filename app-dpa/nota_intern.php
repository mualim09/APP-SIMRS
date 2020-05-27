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
  $id_ani           = $_POST['id_ani'];
  $berkas_ani       = $_POST['berkas_ani'];
  $tanggal          = $_POST['tanggal'];
  $nomor_intern     = $_POST['nomor_intern'];
  $perihal_ani      = $_POST['perihal_ani'];
  $ket_ani          = $_POST['ket_ani'];
  $date_ani         = $_POST['date_ani'];

  $nama = $_FILES['lampiran_ani']['name'];
  $file_tmp = $_FILES['lampiran_ani']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/nota_intern/lampiran/'.$nama);

  $query = mysql_query("INSERT INTO tb_ani 
    (id_ani,berkas_ani,tanggal,nomor_intern,perihal_ani,ket_ani,date_ani,lampiran_ani) 
    VALUES 
    ('','$berkas_ani','$tanggal','$nomor_intern','$perihal_ani','$ket_ani','$date_ani','$nama')
    ");
  if ($query) {
    header("Location: ./agenda-nota-intern.php?ntf=1");  
  } else {
    header("Location: ./agenda-nota-intern.php?ntf=6");
  }
}

// EDIT
if(isset($_POST["update"]))    
{    
  $id_ani           = $_POST['id_ani'];
  $berkas_ani       = $_POST['berkas_ani'];
  $tanggal          = $_POST['tanggal'];
  $nomor_intern     = $_POST['nomor_intern'];
  $perihal_ani      = $_POST['perihal_ani'];
  $ket_ani          = $_POST['ket_ani'];
  $date_ani         = $_POST['date_ani'];

  $query = mysql_query("UPDATE tb_ani SET 
    berkas_ani ='$berkas_ani',
    tanggal = '$tanggal',
    nomor_intern = '$nomor_intern',
    perihal_ani = '$perihal_ani',
    ket_ani = '$ket_ani',
    date_ani = '$date_ani'
    WHERE id_ani ='$id_ani'");
  if($query){
    header("Location: ./agenda-nota-intern.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// TAMBAH LAMPIRAN
if(isset($_POST["uploadlampiran"]))    
{    
  $id_ani           = $_POST['id_ani'];

  $nama = $_FILES['lampiran_ani']['name'];
  $file_tmp = $_FILES['lampiran_ani']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/nota_intern/lampiran/'.$nama);
  
  $query = mysql_query("UPDATE tb_ani SET 
    lampiran_ani = '$nama'
    WHERE id_ani ='$id_ani'");
  if($query){
    header("Location: ./agenda-nota-intern.php?ntf=5");                                                  
  } else {
    header("Location: ./agenda-nota-intern.php?ntf=6");  
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $id_ani    = $_POST['id_ani'];

  if($id_ani){
    $query = mysql_query("DELETE FROM tb_ani WHERE id_ani = '$id_ani'");
    if($query){
     header("Location: ./agenda-nota-intern.php?ntf=3");                     
   } else {
    header("Location: ./agenda-nota-intern.php?ntf=6");  
  }
} else {
  header("Location: ./agenda-nota-intern.php?ntf=6");  
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
    <title>DPA RSKG-Nota Intern</title>
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
                            <h2 class="pageheader-title">Nota Intern Page</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Nota Intern Page</li>
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
                        <label class="modal-title">Tambah Nota Intern</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>File Upload</label>
                              <input type="file" name="upload_n" placeholder="Upload Dokumen...">
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>No Urut<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="no_urut_n" placeholder="No Urut ..." required="required">
                                <input type="hidden" class="form-control" name="id_n" placeholder="No Berkas ...">
                                <input type="hidden" class="form-control" name="date_n" value="<?php echo date('Y-m-d'); ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Tanggal<font style="color: red">*</font></label>
                                <input type="date" class="form-control" name="tanggal_n" value="<?php echo date('d-m-Y') ?>" required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>No. Dokumen<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="no_dokumen_n" placeholder="No. Dokumen ..." required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Judul<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="judul_n" placeholder="Judul ..." required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Bagian<font style="color: red">*</font></label>
                                <select name="bagian_n" class="form-control">
                                    <option value="">-- Pilih Bagian --</option>
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
                                <textarea class="form-control" rows="3" name="ket_ani" placeholder="Keterangan ..."></textarea>
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
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Nota Intern"><i class="nav-icon far fa-plus-square"></i> Tambah Nota Intern
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No. Urut</th>
                                                <th>Tanggal</th>
                                                <th>No. Dokumen</th>
                                                <th>Judul</th>
                                                <th>Bagian</th>
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
                                            $result = mysqli_query($con,"SELECT * FROM tb_notaintern ORDER BY id_n DESC");

                                            $no=0;
                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    $no++;
                                                    echo "<tr>";
                                                    echo "<td>".$no.".</td>";
                                                    echo "<td>".$row['no_urut_n'] . "</td>";
                                                    echo "<td>".$row['tanggal_n'] . "</td>";
                                                    echo "<td>".$row['no_dokumen_n'] . "</td>";
                                                    echo "<td>".$row['judul_n'] . "</td>";
                                                    echo "<td>".$row['bagian_n'] . "</td>";
                                                    echo "<td>".$row['upload_n'] . "</td>";
                                                    echo "<td>".$row['keterangan_n'] . "</td>";
                                                    echo "<td align= '' width='30px'>
                                                    <a href='#' data-toggle='modal' data-target='#edit$row[id_n]' title='Edit'><span class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#delete$row[id_n]' title='Delete'><span class='btn btn-danger btn-xs'><i class='fas fa-times'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#addfile$row[id_n]' title='Tambah Lampiran'><span class='btn btn-default btn-xs'><i class='fas fa-file'></i> </span></a>
                                                    </td>";
                                                    echo "</tr>";
                                                    ?>
                                                    <!-- UPDATE -->
                                                    <div class="modal fade" id="Edit<?php echo $row['id_n'];?>" role="dialog">
                                                      <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Update Agenda Nota Intern</label>
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
                                                                    <input type="text" class="form-control" name="berkas_ani" placeholder="No Berkas ..." value="<?php echo $row['berkas_ani']; ?>">
                                                                    <input type="hidden" class="form-control" name="id_n" value="<?php echo $row['id_n']; ?>">
                                                                    <input type="hidden" class="form-control" name="date_ani" value="<?php echo $row['date_ani']; ?>">
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-4">
                                                                  <div class="form-group">
                                                                    <label>Tanggal</label>
                                                                    <input type="date" class="form-control" name="tanggal" value="<?php echo $row['tanggal']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                  <div class="form-group">
                                                                    <label>Nomor Intern</label>
                                                                    <input type="text" class="form-control" name="nomor_intern" placeholder="Nomor Intern ..." value="<?php echo $row['nomor_intern']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                  <div class="form-group">
                                                                    <label>Perihal</label>
                                                                    <input type="text" class="form-control" name="perihal_ani" placeholder="Perihal ..." value="<?php echo $row['perihal_ani']; ?>">
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Keterangan</label>
                                                                    <textarea class="form-control" rows="3" name="ket_ani" placeholder="Keterangan ..."><?php echo $row['ket_ani']; ?></textarea>
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
                                                    <div class="modal fade" id="delete<?php echo $row['id_n'];?>" role="dialog">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Delete Agenda Nota Intern</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form method="post" action="">
                                                              <div class="form-group">
                                                                <label>Hapus Data Agenda Nota Intern?</label>
                                                                <h6>Nomor Berkas : <b><u><?php echo $row['berkas_ani'];?></u></b></h6>
                                                                <h6>Tanggal : <b><u><?php echo $row['tanggal'];?></u></b></h6>
                                                                <h6>Nomor Intern : <b><u><?php echo $row['nomor_intern'];?></u></b></h6>
                                                                <input type="hidden" name="id_n" class="form-control" placeholder="client name" value="<?php echo $row['id_n'];?>" required>
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
                                                    <div class="modal fade" id="addfile<?php echo $row['id_n'];?>" role="dialog">
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
                                                                <input type="file" name="lampiran_ani" placeholder="Upload ...">
                                                                <input type="hidden" name="id_n" class="form-control" placeholder="client name" value="<?php echo $row['id_n'];?>" required>
                                                              </div>
                                                              <button type="submit" name="uploadlampiran" class="btn btn-info btn-block btn-flat">Submit</button>
                                                              <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">Close</button>
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
                                                    <th>No.</th>
                                                    <th>No. Urut</th>
                                                    <th>Tanggal</th>
                                                    <th>No. Dokumen</th>
                                                    <th>Judul</th>
                                                    <th>Bagian</th>
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