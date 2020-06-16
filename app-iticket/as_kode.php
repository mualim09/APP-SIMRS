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
////////////////////////////////////////////////////////ACTION KODE///////////////////////////////////////////////////////
// ADD KODE
if(isset($_POST["submitkode"]))    
{    
  $id_kode       = $_POST['id_kode'];
  $nama_kode     = $_POST['nama_kode'];
  $date_kode     = $_POST['date_kode'];
  $username_kode = $_POST['username_kode'];

  $query = mysql_query("INSERT INTO tb_kode 
    (id_kode,nama_kode,date_kode,username_kode) 
    VALUES 
    ('','$nama_kode','$date_kode','$username_kode')
    ");
  if ($query) {
    header("Location: ./as_kode.php?ntf=1");  
  } else {
    header("Location: ./as_kode.php?ntf=6");
  }
}

// EDIT KODE
if(isset($_POST["updatekode"]))    
{    
  $id_kode        = $_POST['id_kode'];
  $nama_kode      = $_POST['nama_kode'];
  $username_kode  = $_POST['username_kode'];

  $query = mysql_query("UPDATE tb_kode SET 
    nama_kode ='$nama_kode',
    username_kode = '$username_kode'
    WHERE id_kode ='$id_kode'");
  if($query){
    header("Location: ./as_kode.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// DELETE KODE
if(isset($_POST['deletekode']))
{
  $id_kode    = $_POST['id_kode'];

  if($id_kode){
    $query = mysql_query("DELETE FROM tb_kode WHERE id_kode = '$id_kode'");
    if($query){
     header("Location: ./as_kode.php?ntf=3");                     
   } else {
    header("Location: ./as_kode.php?ntf=6");  
  }
} else {
  header("Location: ./as_kode.php?ntf=6");  
}
}
////////////////////////////////////////////////////////END ACTION KODE///////////////////////////////////////////////////////
////////////////////////////////////////////////////////ACTION BIDANG///////////////////////////////////////////////////////
// ADD KODE
if(isset($_POST["submitbidang"]))    
{    
  $id_bg       = $_POST['id_bg'];
  $id_kode     = $_POST['id_kode'];
  $nama_bg     = $_POST['nama_bg'];
  $date_bg     = $_POST['date_bg'];
  $username_bg = $_POST['username_bg'];

  $query = mysql_query("INSERT INTO tb_bagian 
    (id_bg,id_kode,nama_bg,date_bg,username_bg) 
    VALUES 
    ('','$id_kode','$nama_bg','$date_bg','$username_bg')
    ");
  if ($query) {
    header("Location: ./as_kode.php?ntf=1");  
  } else {
    header("Location: ./as_kode.php?ntf=6");
  }
}

// EDIT KODE
if(isset($_POST["updatebidang"]))    
{    
  $id_bg       = $_POST['id_bg'];
  $id_kode     = $_POST['id_kode'];
  $nama_bg     = $_POST['nama_bg'];
  $username_bg = $_POST['username_bg'];

  $query = mysql_query("UPDATE tb_bagian SET 
    id_kode ='$id_kode',
    nama_bg ='$nama_bg',
    username_bg = '$username_bg'
    WHERE id_bg ='$id_bg'");
  if($query){
    header("Location: ./as_kode.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// DELETE KODE
if(isset($_POST['deletebidang']))
{
  $id_bg    = $_POST['id_bg'];

  if($id_bg){
    $query = mysql_query("DELETE FROM tb_bagian WHERE id_bg = '$id_bg'");
    if($query){
     header("Location: ./as_kode.php?ntf=3");                     
   } else {
    header("Location: ./as_kode.php?ntf=6");  
  }
} else {
  header("Location: ./as_kode.php?ntf=6");  
}
}
////////////////////////////////////////////////////////END ACTION BIDANG///////////////////////////////////////////////////////
////////////////////////////////////////////////////////ACTION SINGKATAN///////////////////////////////////////////////////////
// ADD SINGKATAN
if(isset($_POST["submitsingakatan"]))    
{    
  $id_sing       = $_POST['id_sing'];
  $id_bg         = $_POST['id_bg'];
  $kode_sing     = $_POST['kode_sing'];
  $date_sing     = $_POST['date_sing'];

  $query = mysql_query("INSERT INTO tb_singkatan 
    (id_sing,id_bg,kode_sing,date_sing) 
    VALUES 
    ('','$id_bg','$kode_sing','$date_sing')
    ");
  if ($query) {
    header("Location: ./as_kode.php?ntf=1");  
  } else {
    header("Location: ./as_kode.php?ntf=6");
  }
}

// EDIT SINGKATAN
if(isset($_POST["updatesingkatan"]))    
{    
  $id_sing       = $_POST['id_sing'];
  $id_bg         = $_POST['id_bg'];
  $kode_sing     = $_POST['kode_sing'];

  $query = mysql_query("UPDATE tb_singkatan SET 
    id_bg ='$id_bg',
    kode_sing ='$kode_sing'
    WHERE id_sing ='$id_sing'");
  if($query){
    header("Location: ./as_kode.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// DELETE SINGKATAN
if(isset($_POST['deletesingkatan']))
{
  $id_sing    = $_POST['id_sing'];

  if($id_sing){
    $query = mysql_query("DELETE FROM tb_singkatan WHERE id_sing = '$id_sing'");
    if($query){
     header("Location: ./as_kode.php?ntf=3");                     
   } else {
    header("Location: ./as_kode.php?ntf=6");  
  }
} else {
  header("Location: ./as_kode.php?ntf=6");  
}
}
////////////////////////////////////////////////////////END ACTION SINGKATAN///////////////////////////////////////////////////////


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
    <title>DPA RSKG-Kode Bagian/Instalasi/Komite</title>
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

                <!-- MODAL ADD KODE -->
                <div class="modal fade" id="modal-kode">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <label class="modal-title">Tambah Kode</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Kode<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="nama_kode" placeholder="Kode ..." required="required">
                                <input type="hidden" class="form-control" name="id_kode">
                                <input type="hidden" class="form-control" name="date_kode" value="<?php echo date('Y-m-d'); ?>">
                                <input type="hidden" class="form-control" name="username_kode" value="<?php echo $data['full_name']; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <button type="submit" name="submitkode" class="btn btn-block btn-primary">Submit</button>
                            <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END MODAL ADD KODE-->

                <!-- MODAL ADD BIDANG-->
                <div class="modal fade" id="modal-bidang">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <label class="modal-title">Tambah Bidang/Instalasi/Komite</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Nama Bidang/Instalasi/Komite<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="nama_bg" placeholder="Nama Bidang/Instalasi/Komite ..." required="required">
                                <input type="hidden" class="form-control" name="id_bg">
                                <input type="hidden" class="form-control" name="date_bg" value="<?php echo date('Y-m-d'); ?>">
                                <input type="hidden" class="form-control" name="username_bg" value="<?php echo $data['full_name']; ?>">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Pilih Kode<font style="color: red">*</font></label>
                                <select name="id_kode" class="form-control" required="required">
                                    <option value="">-- Pilih Kode --</option>
                                    <?php
                                    //Membuat coneksi ke database 
                                    $con = mysqli_connect("localhost",'root',"","rskg_iticket");
                                    if (!$con){
                                      die("coneksi database gagal:".mysqli_connect_error());
                                    }
                                    
                                    //Perintah sql untuk menampilkan semua data pada tabel department
                                    $sql="SELECT * FROM tb_kode";

                                    $hasil=mysqli_query($con,$sql);
                                    $no=0;
                                    while ($data = mysqli_fetch_array($hasil)) {
                                    $no++;
                                    ?>
                                    <option value="<?php echo $data['id_kode'];?>"><?php echo $data['nama_kode'];?></option>
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
                            <button type="submit" name="submitbidang" class="btn btn-block btn-primary">Submit</button>
                            <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END MODAL ADD BIDANG -->

                <!-- MODAL ADD SINGKATAN-->
                <div class="modal fade" id="modal-singkatan">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <label class="modal-title">Tambah Singkatan</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Pilih Bagian/Instalasi/Komite<font style="color: red">*</font></label>
                                <select name="id_bg" class="form-control" required="required">
                                    <option value="">-- Pilih Bagian/Instalasi/Komite --</option>
                                    <?php
                                    //Membuat coneksi ke database 
                                    $con = mysqli_connect("localhost",'root',"","rskg_iticket");
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
                                    <option value="<?php echo $data['id_bg'];?>"><?php echo $data['nama_bg'];?></option>
                                    <?php 
                                    }
                                    ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Nama Singkatan<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="kode_sing" placeholder="Nama Singkatan ..." required="required">
                                <input type="text" class="form-control" name="id_sing">
                                <input type="text" class="form-control" name="date_sing" value="<?php echo date('Y-m-d'); ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <button type="submit" name="submitsingakatan" class="btn btn-block btn-primary">Submit</button>
                            <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END MODAL ADD SINGKATAN -->

                <!-- ALERT -->
                <?php include 'include/alert/success.php' ?>
                <!-- END ALERT -->
                
                <!-- JOIN KODE BIDANG/INSTALASI/KOMITE -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <b>Tabel JOIN Kode Bagian/Instalasi/Komite Singkatan</b>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                              <th>Kode</th>
                                              <th>Bagian/Instalasi/Komite</th>
                                              <th>Singkatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $con=mysqli_connect("localhost","root","","rskg_iticket");
                                            if (mysqli_connect_errno())
                                            {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }
                                            $result = mysqli_query($con,"SELECT a.id_kode AS satu,a.nama_kode AS dua,a.date_kode,a.username_kode AS tiga,
                                              b.id_bg AS empat,b.id_kode AS lima,b.nama_bg AS enam,b.date_bg AS tujuh,b.username_bg AS delapan,
                                              c.id_sing AS sembilan,c.id_bg AS sepuluh,c.kode_sing AS sebelas,c.date_sing AS duabelas
                                                                         FROM tb_kode a JOIN tb_bagian b
                                                                         ON a.id_kode=b.id_kode 
                                                                         JOIN tb_singkatan c
                                                                         ON b.id_bg=c.id_bg ORDER BY c.kode_sing ASC");

                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['dua'] . "</td>";
                                                    echo "<td>".$row['enam'] . "</td>";
                                                    echo "<td>".$row['sebelas'] . "</td>";
                                                    echo "</tr>";
                                                    ?>
                                                <?php } } mysqli_close($con); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                  <th>Kode</th>
                                                  <th>Bagian/Instalasi/Komite</th>
                                                  <th>Singkatan</th>
                                                </tr>
                                            </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END KODE BIDANG/INSTALASI/KOMITE -->

                <!-- KODE -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <b>Tabel Kode</b>
                                <br><hr>
                                <button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-kode" title="Tambah Kode Bagian/Instalasi/Komite"><i class="nav-icon far fa-plus-square"></i> Tambah Kode
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Kode</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Pembuat Kode</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $con=mysqli_connect("localhost","root","","rskg_iticket");
                                            if (mysqli_connect_errno())
                                            {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }
                                            $result = mysqli_query($con,"SELECT * FROM tb_kode ORDER BY id_kode DESC");

                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['id_kode'] . "</td>";
                                                    echo "<td>".$row['nama_kode'] . "</td>";
                                                    echo "<td>".tanggal_indo($row['date_kode'], true) . "</td>";
                                                     if ($row['username_kode']==NULL){
                                                        echo "<td>empty</td>";
                                                      }else{
                                                        echo "<td>".$row['username_kode'] . "</td>";
                                                      }
                                                    echo "<td width='100px'>
                                                    <a href='#' data-toggle='modal' data-target='#editkode$row[id_kode]' title='Edit'><span class='badge badge-success'><i class='fa fa-edit'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#deletekode$row[id_kode]' title='Delete'><span class='badge badge-danger'><i class='fas fa-times'></i> </span></a>
                                                    </td>";
                                                    echo "</tr>";
                                                    ?>
                                                    <!-- UPDATE -->
                                                    <div class="modal fade" id="editkode<?php echo $row['id_kode'];?>" role="dialog">
                                                      <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Update Kode</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <form action="" method="POST">
                                                            <div class="modal-body">
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Kode<font style="color: red">*</font></label>
                                                                    <input type="text" class="form-control" name="nama_kode" placeholder="Kode ..." value="<?php echo $row['nama_kode']; ?>" required="required">
                                                                    <input type="hidden" class="form-control" name="id_kode"  value="<?php echo $row['id_kode']; ?>">
                                                                    <input type="hidden" class="form-control" name="username_kode" value="<?php echo $data['full_name']; ?>">
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                              <div class="form-group">
                                                                <button type="submit" name="updatekode" class="btn btn-block btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                                                              </div>
                                                            </div>
                                                          </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END UPDATE -->

                                                    <!-- DELETE -->
                                                    <div class="modal fade" id="deletekode<?php echo $row['id_kode'];?>" role="dialog">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Delete Kode</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form method="post" action="">
                                                              <div class="form-group">
                                                                <label>Hapus Kode?</label>
                                                                <h6>Kode : <b><u><?php echo $row['nama_kode'];?></u></b></h6>
                                                                <input type="hidden" name="id_kode" class="form-control" placeholder="client name" value="<?php echo $row['id_kode'];?>" required>
                                                              </div>
                                                              <button type="submit" name="deletekode" class="btn btn-danger btn-block btn-flat">Yes</button>
                                                              <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END DELETE -->
                                                <?php } } mysqli_close($con); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                  <th>ID</th>
                                                  <th>Kode</th>
                                                  <th>Tanggal Dibuat</th>
                                                  <th>Pembuat Kode</th>
                                                  <th>Action</th>
                                                </tr>
                                            </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END KODE -->

                <!-- BIDANG -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <b>Tabel Bidang/Instalasi/Komite</b>
                                <br><hr>
                                <button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-bidang" title="Tambah Kode Bagian/Instalasi/Komite"><i class="nav-icon far fa-plus-square"></i> Tambah Bidang/Instalasi/Komite
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama Bidang/Instalasi/Komite</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Pembuat Kode</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $con=mysqli_connect("localhost","root","","rskg_iticket");
                                            if (mysqli_connect_errno())
                                            {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }
                                            $result = mysqli_query($con,"SELECT a.id_bg AS braveone,a.id_kode AS bravetwo,a.nama_bg AS bravethree,a.date_bg AS barvefour,a.username_bg AS bravefive,
                                              b.id_kode AS mzone,b.nama_kode AS mztwo,b.date_kode AS mzthree,b.username_kode AS mzfour
                                                                         FROM tb_bagian a JOIN tb_kode b
                                                                         ON a.id_kode=b.id_kode ORDER BY a.id_bg DESC");

                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['mztwo'] . "</td>";
                                                    echo "<td>".$row['bravethree'] . "</td>";
                                                    echo "<td>".tanggal_indo($row['barvefour'], true) . "</td>";
                                                     if ($row['mzfour']==NULL){
                                                        echo "<td>empty</td>";
                                                      }else{
                                                        echo "<td>".$row['mzfour'] . "</td>";
                                                      }
                                                    echo "<td width='100px'>
                                                    <a href='#' data-toggle='modal' data-target='#editbidang$row[braveone]' title='Edit'><span class='badge badge-success'><i class='fa fa-edit'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#deletebidang$row[braveone]' title='Delete'><span class='badge badge-danger'><i class='fas fa-times'></i> </span></a>
                                                    </td>";
                                                    echo "</tr>";
                                                    ?>
                                                    <!-- UPDATE -->
                                                    <div class="modal fade" id="editbidang<?php echo $row['braveone'];?>" role="dialog">
                                                      <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Update Kode</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <form action="" method="POST">
                                                            <div class="modal-body">
                                                               <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Nama Bidang/Instalasi/Komite<font style="color: red">*</font></label>
                                                                    <input type="text" class="form-control" name="nama_bg" placeholder="Nama Bidang/Instalasi/Komite ..." value="<?php echo $row['bravethree'];?>" required="required">
                                                                    <input type="hidden" class="form-control" name="id_bg" value="<?php echo $row['braveone'];?>">
                                                                    <input type="hidden" class="form-control" name="username_bg" value="<?php echo $data['full_name']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Pilih Kode<font style="color: red">*</font></label>
                                                                    <select name="id_kode" class="form-control" required="required">
                                                                        <option value="<?php echo $row['mzone'];?>"><?php echo $row['mztwo'];?></option>
                                                                        <option value="">-- Pilih Kode --</option>
                                                                        <?php
                                                                        //Membuat coneksi ke database 
                                                                        $con = mysqli_connect("localhost",'root',"","rskg_iticket");
                                                                        if (!$con){
                                                                          die("coneksi database gagal:".mysqli_connect_error());
                                                                        }
                                                                        
                                                                        //Perintah sql untuk menampilkan semua data pada tabel department
                                                                        $sql="SELECT * FROM tb_kode";

                                                                        $hasil=mysqli_query($con,$sql);
                                                                        $no=0;
                                                                        while ($data = mysqli_fetch_array($hasil)) {
                                                                        $no++;
                                                                        ?>
                                                                        <option value="<?php echo $data['id_kode'];?>"><?php echo $data['nama_kode'];?></option>
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
                                                                <button type="submit" name="updatebidang" class="btn btn-block btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                                                              </div>
                                                            </div>
                                                          </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END UPDATE -->

                                                    <!-- DELETE -->
                                                    <div class="modal fade" id="deletebidang<?php echo $row['braveone'];?>" role="dialog">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Delete Bidang/Instalasi/Komite</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form method="post" action="">
                                                              <div class="form-group">
                                                                <label>Hapus Bidang/Instalasi/Komite?</label>
                                                                <h6>Kode : <b><u><?php echo $row['mztwo'];?></u></b></h6>
                                                                <h6>Nama Bidang/Instalasi/Komite : <b><u><?php echo $row['bravethree'];?></u></b></h6>
                                                                <input type="hidden" name="id_bg" class="form-control" placeholder="client name" value="<?php echo $row['braveone'];?>" required>
                                                              </div>
                                                              <button type="submit" name="deletebidang" class="btn btn-danger btn-block btn-flat">Yes</button>
                                                              <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END DELETE -->
                                                <?php } } mysqli_close($con); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                  <th>Kode</th>
                                                  <th>Nama Bidang/Instalasi/Komite</th>
                                                  <th>Tanggal Dibuat</th>
                                                  <th>Pembuat Kode</th>
                                                  <th>Action</th>
                                                </tr>
                                            </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END BIDANG -->

                <!-- SINGKATAN -->
                 <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <b>Tabel Singkatan</b>
                                <br><hr>
                                <button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-singkatan" title="Tambah Kode Bagian/Instalasi/Komite"><i class="nav-icon far fa-plus-square"></i> Tambah Singkatan
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nama Bidang/Instalasi/Komite</th>
                                                <th>Nama Singkatan</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $con=mysqli_connect("localhost","root","","rskg_iticket");
                                            if (mysqli_connect_errno())
                                            {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }
                                            $result = mysqli_query($con,"SELECT a.id_sing AS chone,a.id_bg AS chtwo,a.kode_sing AS chthree,a.date_sing AS chfour,
                                              b.id_bg AS mlone,b.nama_bg AS mltwo
                                                                         FROM tb_singkatan a JOIN tb_bagian b
                                                                         ON a.id_bg=b.id_bg ORDER BY a.id_sing DESC");

                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['mltwo'] . "</td>";
                                                    echo "<td>".$row['chthree'] . "</td>";
                                                    echo "<td>".tanggal_indo($row['chfour'], true) . "</td>";
                                                    echo "<td width='100px'>
                                                    <a href='#' data-toggle='modal' data-target='#editsingkatan$row[chone]' title='Edit'><span class='badge badge-success'><i class='fa fa-edit'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#deletesingkatan$row[chone]' title='Delete'><span class='badge badge-danger'><i class='fas fa-times'></i> </span></a>
                                                    </td>";
                                                    echo "</tr>";
                                                    ?>
                                                    <!-- UPDATE -->
                                                    <div class="modal fade" id="editsingkatan<?php echo $row['chone'];?>" role="dialog">
                                                      <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Update Singkatan</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <form action="" method="POST">
                                                            <div class="modal-body">
                                                               <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Nama Singkatan<font style="color: red">*</font></label>
                                                                    <input type="text" class="form-control" name="kode_sing" placeholder="Nama Singkatan ..." value="<?php echo $row['chthree'];?>" required="required">
                                                                    <input type="hidden" class="form-control" name="id_sing" value="<?php echo $row['chone'];?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Pilih Nama Bidang/Instalasi/Komite<font style="color: red">*</font></label>
                                                                    <select name="id_bg" class="form-control" required="required">
                                                                        <option value="<?php echo $row['chtwo'];?>"><?php echo $row['mltwo'];?></option>
                                                                        <option value="">-- Pilih Nama Bidang/Instalasi/Komite --</option>
                                                                        <?php
                                                                        //Membuat coneksi ke database 
                                                                        $con = mysqli_connect("localhost",'root',"","rskg_iticket");
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
                                                                        <option value="<?php echo $data['id_bg'];?>"><?php echo $data['nama_bg'];?></option>
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
                                                                <button type="submit" name="updatesingkatan" class="btn btn-block btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                                                              </div>
                                                            </div>
                                                          </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END UPDATE -->

                                                    <!-- DELETE -->
                                                    <div class="modal fade" id="deletesingkatan<?php echo $row['chone'];?>" role="dialog">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Delete Singkatan</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form method="post" action="">
                                                              <div class="form-group">
                                                                <label>Hapus Singkatan?</label>
                                                                <h6>Nama Bidang/Instalasi/Komite : <b><u><?php echo $row['mltwo'];?></u></b></h6>
                                                                <h6>Nama Singkatan : <b><u><?php echo $row['chthree'];?></u></b></h6>
                                                                <input type="hidden" name="id_sing" class="form-control" placeholder="client name" value="<?php echo $row['chone'];?>" required>
                                                                <input type="hidden" name="username_bg" class="form-control" placeholder="client name" value="<?php echo $data['full_name'];?>" required>
                                                              </div>
                                                              <button type="submit" name="deletesingkatan" class="btn btn-danger btn-block btn-flat">Yes</button>
                                                              <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END DELETE -->
                                                <?php } } mysqli_close($con); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                  <th>Nama Bidang/Instalasi/Komite</th>
                                                  <th>Nama Singkatan</th>
                                                  <th>Tanggal Dibuat</th>
                                                  <th>Action</th>
                                                </tr>
                                            </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SINGKATAN -->
            </div>
        </div>
    </div>
    <?php include "include/footer.php" ?>
    <?php include 'include/thirdparty.php'; ?>
</body>
</html>