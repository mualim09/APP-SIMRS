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
////////////////////////////////////////////////////////ACTION PERANGKAT///////////////////////////////////////////////////////
// ADD PERANGKAT
if(isset($_POST["submitperangkat"]))    
{    
  $id_perangkat   = $_POST['id_perangkat'];
  $no_perangkat   = $_POST['no_perangkat'];
  $kode_unit      = $_POST['kode_unit'];
  $nama_perangkat = $_POST['nama_perangkat'];
  $sn 			  = $_POST['sn'];
  $ip_address 	  = $_POST['ip_address'];
  $date_beli      = $_POST['date_beli'];
  $os 			  = $_POST['os'];
  $merek 		  = $_POST['merek'];
  $RAM 			  = $_POST['RAM'];
  $remark 		  = $_POST['remark'];
  $username 	  = $_POST['username'];

  $query = mysql_query("INSERT INTO tb_perangkat 
    (id_perangkat,no_perangkat,kode_unit,nama_perangkat,sn,ip_address,date_beli,os,merek,RAM,remark,username) 
    VALUES 
    ('','$no_perangkat','$kode_unit','$nama_perangkat','$sn','$ip_address','$date_beli','$os','$merek','$RAM','$remark','$username')
    ");
  if ($query) {
    header("Location: ./sa_perangkat.php?ntf=1");  
  } else {
    header("Location: ./sa_perangkat.php?ntf=6");
  }
}

// EDIT PERANGKAT
if(isset($_POST["updateperangkat"]))    
{    
  $id_kode        = $_POST['id_kode'];
  $nama_kode      = $_POST['nama_kode'];
  $username_kode  = $_POST['username_kode'];

  $query = mysql_query("UPDATE tb_kode SET 
    nama_kode ='$nama_kode',
    username_kode = '$username_kode'
    WHERE id_kode ='$id_kode'");
  if($query){
    header("Location: ./sa_perangkat.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// DELETE PERANGKAT
if(isset($_POST['deleteperangkat']))
{
  $id_perangkat    = $_POST['id_perangkat'];

  if($id_perangkat){
    $query = mysql_query("DELETE FROM tb_perangkat WHERE id_perangkat = '$id_perangkat'");
    if($query){
     header("Location: ./sa_perangkat.php?ntf=3");                     
   } else {
    header("Location: ./sa_perangkat.php?ntf=6");  
  }
} else {
  header("Location: ./sa_perangkat.php?ntf=6");  
}
}
////////////////////////////////////////////////////////END ACTION PERANGKAT///////////////////////////////////////////////////////
////////////////////////////////////////////////////////ACTION BIDANG///////////////////////////////////////////////////////
// ADD KODE
if(isset($_POST["submitdevice"]))    
{    
  $id_device       	= $_POST['id_device'];
  $nama_device     	= $_POST['nama_device'];
  $jenis_device     = $_POST['jenis_device'];
  $date_device     	= $_POST['date_device'];
  $id_perangkat 	= $_POST['id_perangkat'];
  $merek 			= $_POST['merek'];
  $remark_device 	= $_POST['remark_device'];

  $query = mysql_query("INSERT INTO tb_device 
    (id_device,nama_device,jenis_device,date_device,id_perangkat,merek,remark_device)
    VALUES 
    ('','$nama_device','$jenis_device','$date_device','$id_perangkat','$merek','$remark_device')
    ");
  if ($query) {
    header("Location: ./sa_perangkat.php?ntf=1");  
  } else {
    header("Location: ./sa_perangkat.php?ntf=6");
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
    header("Location: ./sa_perangkat.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// DELETE KODE
if(isset($_POST['deletebidang']))
{
  $id_device    = $_POST['id_device'];

  if($id_device){
    $query = mysql_query("DELETE FROM tb_device WHERE id_device = '$id_device'");
    if($query){
     header("Location: ./sa_perangkat.php?ntf=3");                     
   } else {
    header("Location: ./sa_perangkat.php?ntf=6");  
  }
} else {
  header("Location: ./sa_perangkat.php?ntf=6");  
}
}
////////////////////////////////////////////////////////END ACTION BIDANG///////////////////////////////////////////////////////
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
    <title>ITicket | Perangkat IT</title>
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
                            <h2 class="pageheader-title">Perangkat IT</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Perangkat IT</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL ADD PERANGKAT -->
                <div class="modal fade" id="modal-perangkat">
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
                                <label>No. Perangkat<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="no_perangkat" placeholder="No. Perangkat ..." required="required">
                                <input type="hidden" class="form-control" name="id_perangkat">
                                <input type="hidden" class="form-control" name="username" value="<?php echo $data['username']; ?>">
                              </div>
                              <div class="form-group">
                                <label>Kode Unit<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="kode_unit" placeholder="Kode Unit ..." required="required">
                              </div>
                              <div class="form-group">
                                <label>Nama Perangkat<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="nama_perangkat" placeholder="Nama Perangkat ..." required="required">
                              </div>
                              <div class="form-group">
                                <label>Serial Number<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="sn" placeholder="Serial Number ..." required="required">
                              </div>
                              <div class="form-group">
                                <label>IP Address<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="ip_address" placeholder="IP Address ..." required="required">
                              </div>
                              <div class="form-group">
                                <label>OS<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="os" placeholder="OS ..." required="required">
                              </div>
                              <div class="form-group">
                                <label>Merek<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="merek" placeholder="Merek ..." required="required">
                              </div>
                              <div class="form-group">
                                <label>RAM<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="RAM" placeholder="RAM ..." required="required">
                              </div>
                              <div class="form-group">
                                <label>Tanggal Beli<font style="color: red">*</font></label>
                                <input type="date" class="form-control" name="date_beli" required="required">
                              </div>
	                          <div class="form-group">
	                            <label>Remark</label>
	                            <textarea class="form-control" rows="3" name="remark" placeholder="Remark ..."></textarea>
	                          </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <button type="submit" name="submitperangkat" class="btn btn-block btn-primary">Submit</button>
                            <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END MODAL ADD PERANGKAT -->

                <!-- MODAL ADD DEVICE -->
                <div class="modal fade" id="modal-device">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <label class="modal-title">Tambah Device Pendukung</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST" >
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Nama Device Pendukung<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="nama_device" placeholder="Nama Device Pendukung ..." required="required">
                                <input type="hidden" class="form-control" name="id_device">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Pilih Perangkat Utama<font style="color: red">*</font></label>
                                <select name="id_perangkat" class="form-control" required="required">
                                    <option value="">-- Pilih Perangkat Utama --</option>
                                    <?php
                                    //Membuat coneksi ke database 
                                    $con = mysqli_connect("localhost",'root',"","rskg_formit");
                                    if (!$con){
                                      die("coneksi database gagal:".mysqli_connect_error());
                                    }
                                    
                                    //Perintah sql untuk menampilkan semua data pada tabel department
                                    $sql="SELECT * FROM tb_perangkat";

                                    $hasil=mysqli_query($con,$sql);
                                    $no=0;
                                    while ($data = mysqli_fetch_array($hasil)) {
                                    $no++;
                                    ?>
                                    <option value="<?php echo $data['id_perangkat'];?>"><?php echo $data['kode_unit'];?><?php echo $data['no_perangkat'];?></option>
                                    <?php 
                                    }
                                    ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Jenis Device<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="jenis_device" placeholder="Jenis Device ..." required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Merek<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="merek" placeholder="Merek ..." required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Tanggal Beli<font style="color: red">*</font></label>
                                <input type="date" class="form-control" name="date_device" required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                        		<div class="form-group">
	                            	<label>Remark Device</label>
	                            	<textarea class="form-control" rows="3" name="remark_device" placeholder="Remark ..."></textarea>
	                          	</div>
                            </div>
                          </div>
                          </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <button type="submit" name="submitdevice" class="btn btn-block btn-primary">Submit</button>
                            <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END MODAL ADD DEVICE -->

                <!-- ALERT -->
                <?php include 'include/alert/success.php' ?>
                <!-- END ALERT -->
                
                <!-- JOIN PERANGKAT DAN DEVICE PENDUKUNG -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <b>Tabel JOIN Perangkat IT Singkatan</b>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                              <th>ID</th>
                                              <th>No. Perangkat</th>
                                              <th>Nama Perangkat</th>
                                              <th>Serial Number</th>
                                              <th>Tahun Beli</th>
                                              <th>Detail Spesifikasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $con=mysqli_connect("localhost","root","","rskg_formit");
                                            if (mysqli_connect_errno())
                                            {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }
                                            $result = mysqli_query($con,"SELECT a.id_perangkat,
                                            									a.no_perangkat,
                                            									a.barcode,
                                            									a.kode_unit,
                                            									a.nama_perangkat,
                                            									a.sn,
                                            									a.ip_address,
                                            									a.date_beli,
                                            									a.os,
                                            									a.merek,
                                            									a.RAM,
                                            									a.remark,
                                            									a.username,
                                            									b.id_device,
                                            									b.nama_device,
                                            									b.jenis_device,
                                            									b.date_device,
                                            									b.id_perangkat,
                                            									b.merek,
                                            									b.remark_device
                                            									FROM tb_perangkat a JOIN tb_device b
                                            									ON a.id_perangkat=b.id_perangkat GROUP BY a.id_perangkat ORDER BY a.id_perangkat ASC");
                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['no_perangkat'] . "</td>";
                                                    echo "<td>".$row['kode_unit'] . "".$row['no_perangkat'] . "</td>";
                                                    echo "<td>".$row['nama_perangkat'] . "</td>";
                                                    echo "<td>".$row['sn'] . "</td>";
                                                    echo "<td>".$row['date_beli'] . "</td>";
                                                    echo "<td width='100px'>
                                                    <a href='#' data-toggle='modal' data-target='#viewperangkat$row[id_perangkat]' title='Edit'><span class='badge badge-info'><i class='fa fa-info'></i> Detail</span></a>
                                                    </td>";
                                                    echo "</tr>";
                                                    ?>
                                                    <!-- VIEW PERANGKAT -->
                                                    <div class="modal fade" id="viewperangkat<?php echo $row['id_perangkat'];?>" role="dialog">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Spesifikasi Perangkat <b><?php echo $row['kode_unit'];?><?php echo $row['no_perangkat'];?></b></label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form method="post" action="">
                                                              <div class="form-group">
                                                                <h6>ID : <b><u><?php echo $row['id_perangkat'];?></u></b></h6>
                                                                <h6>No. Perangkat : <b><u><?php echo $row['kode_unit'];?><?php echo $row['no_perangkat'];?></u></b></h6>
                                                                <h6>S/N : <b><u><?php echo $row['sn'];?></u></b></h6>
                                                                <h6>IP Address: <b><u><?php echo $row['ip_address'];?></u></b></h6>
                                                                <h6>OS: <b><u><?php echo $row['os'];?></u></b></h6>
                                                                <h6>RAM : <b><u><?php echo $row['RAM'];?></u></b></h6>
                                                                <h6>Merek : <b><u><?php echo $row['merek'];?></u></b></h6>
                                                                <h6>Tanggal Beli : <b><u><?php echo $row['date_beli'];?></u></b></h6>
                                                                <h6>Remark : <b><u><?php echo $row['remark'];?></u></b></h6>
                                                              </div>
                                                              <hr>
                                                              <div class="form-group">
                                                                <h6>ID Device : <b><u><?php echo $row['id_device'];?></u></b></h6>
                                                                <h6>Nama Device : <b><u><?php echo $row['nama_device'];?></u></b></h6>
                                                                <h6>Jenis Device : <b><u><?php echo $row['jenis_device'];?></u></b></h6>
                                                                <h6>Tanggal Beli : <b><u><?php echo $row['date_device'];?></u></b></h6>
                                                                <h6>Merek : <b><u><?php echo $row['merek'];?></u></b></h6>
                                                                <h6>Remark : <b><u><?php echo $row['remark_device'];?></u></b></h6>
                                                              </div>
                                                              <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END VIEW PERANGKAT -->
												<?php } } mysqli_close($con); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                  <th>ID</th>
	                                              <th>No. Perangkat</th>
	                                              <th>Nama Perangkat</th>
	                                              <th>Serial Number</th>
	                                              <th>Tahun Beli</th>
	                                              <th>Detail Spesifikasi</th>
                                                </tr>
                                            </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PERANGKAT DAN DEVICE PENDUKUNG -->

                <!-- PERANGKAT -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <b>Tabel Perangkat</b>
                                <br><hr>
                                <button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-perangkat" title="Tambah Perangkat IT"><i class="nav-icon far fa-plus-square"></i> Tambah Perangkat
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                               	<th>ID</th>
                                              	<th>No. Perangkat</th>
                                              	<th>Nama Perangkat</th>
                                              	<th>S/N</th>
                                              	<th>IP Address</th>
                                              	<th>OS</th>
                                              	<th>Merek</th>
                                              	<th>RAM</th>
                                              	<th>Tanggal Beli</th>
                                              	<th>Input by</th>
                                              	<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $con=mysqli_connect("localhost","root","","rskg_formit");
                                            if (mysqli_connect_errno())
                                            {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }
                                            $result = mysqli_query($con,"SELECT * FROM tb_perangkat ORDER BY id_perangkat DESC");

                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['id_perangkat'] . "</td>";
                                                    echo "<td>".$row['kode_unit'] ."".$row['no_perangkat'] ."</td>";
                                                    echo "<td>".$row['nama_perangkat'] . "</td>";
                                                    echo "<td>".$row['sn'] . "</td>";
                                                    echo "<td>".$row['ip_address'] . "</td>";
                                                    echo "<td>".$row['os'] . "</td>";
                                                    echo "<td>".$row['merek'] . "</td>";
                                                    echo "<td>".$row['RAM'] . "</td>";
                                                    echo "<td>".tanggal_indo($row['date_beli'], true) . "</td>";
                                                    echo "<td>".$row['username'] . "</td>";
                                                    echo "<td width='100px'>
                                                    <a href='#' data-toggle='modal' data-target='#editkode$row[id_perangkat]' title='Edit'><span class='badge badge-success'><i class='fa fa-edit'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#deletekode$row[id_perangkat]' title='Delete'><span class='badge badge-danger'><i class='fas fa-times'></i> </span></a>
                                                    </td>";
                                                    echo "</tr>";
                                                    ?>
                                                    <!-- UPDATE -->
                                                    <div class="modal fade" id="editkode<?php echo $row['id_perangkat'];?>" role="dialog">
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
                                                                    <input type="hidden" class="form-control" name="id_perangkat"  value="<?php echo $row['id_perangkat']; ?>">
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
                                                    <div class="modal fade" id="deletekode<?php echo $row['id_perangkat'];?>" role="dialog">
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
                                                                <input type="hidden" name="id_perangkat" class="form-control" placeholder="client name" value="<?php echo $row['id_perangkat'];?>" required>
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
                                              	<th>No. Perangkat</th>
                                              	<th>Nama Perangkat</th>
                                              	<th>S/N</th>
                                              	<th>IP Address</th>
                                              	<th>OS</th>
                                              	<th>Merek</th>
                                              	<th>RAM</th>
                                              	<th>Tanggal Beli</th>
                                              	<th>Input by</th>
                                              	<th>Action</th>
                                            </tr>
                                            </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PERANGKAT -->

                <!-- DEVICE PENDUKUNG -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <b>Tabel Device Pendukung</b>
                                <br><hr>
                                <button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-device" title="Tambah Perangkat IT"><i class="nav-icon far fa-plus-square"></i> Tambah Device Pendukung
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Device</th>
                                                <th>Jenis Device</th>
                                                <th>Tanggal Beli</th>
                                                <th>Merek</th>
                                                <th>Remark</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $con=mysqli_connect("localhost","root","","rskg_formit");
                                            if (mysqli_connect_errno())
                                            {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }
                                            $result = mysqli_query($con,"SELECT * FROM tb_device ORDER BY id_device DESC");

                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['id_device'] . "</td>";
                                                    echo "<td>".$row['nama_device'] . "</td>";
                                                    echo "<td>".$row['jenis_device'] . "</td>";
                                                    echo "<td>".tanggal_indo($row['date_device'], true) . "</td>";
                                                    echo "<td>".$row['merek'] . "</td>";
                                                     if ($row['remark_device']==NULL){
                                                        echo "<td>empty</td>";
                                                      }else{
                                                        echo "<td>".$row['remark_device'] . "</td>";
                                                      }
                                                    echo "<td width='100px'>
                                                    <a href='#' data-toggle='modal' data-target='#editbidang$row[id_device]' title='Edit'><span class='badge badge-success'><i class='fa fa-edit'></i> </span></a>
                                                    <a href='#' data-toggle='modal' data-target='#deletebidang$row[id_device]' title='Delete'><span class='badge badge-danger'><i class='fas fa-times'></i> </span></a>
                                                    </td>";
                                                    echo "</tr>";
                                                    ?>
                                                    <!-- UPDATE -->
                                                    <div class="modal fade" id="editbidang<?php echo $row['id_device'];?>" role="dialog">
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
                                                                    <input type="hidden" class="form-control" name="id_bg" value="<?php echo $row['id_device'];?>">
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
                                                                        $con = mysqli_connect("localhost",'root',"","rskg_formit");
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
                                                    <div class="modal fade" id="deletebidang<?php echo $row['id_device'];?>" role="dialog">
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
                                                                <input type="hidden" name="id_bg" class="form-control" placeholder="client name" value="<?php echo $row['id_device'];?>" required>
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
                                                  	<th>ID</th>
	                                                <th>Nama Device</th>
	                                                <th>Jenis Device</th>
	                                                <th>Tanggal Beli</th>
	                                                <th>Merek</th>
	                                                <th>Remark</th>
	                                                <th>Action</th>
                                                </tr>
                                            </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END DEVICE PENDUKUNG -->

            </div>
        </div>
    </div>
    <?php include "include/footer.php" ?>
    <?php include 'include/thirdparty.php'; ?>
</body>
</html>