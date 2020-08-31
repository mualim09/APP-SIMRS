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
  $id_ekspedisi     = $_POST['id_ekspedisi'];
  $tanggal          = $_POST['tanggal'];
  $nomor_surat      = $_POST['nomor_surat'];
  $perihal          = $_POST['perihal'];
  $penerima         = $_POST['penerima'];
  $json_penerima    = json_encode($penerima);
  $date_ekspedisi   = $_POST['date_ekspedisi'];

  $nama = $_FILES['lampiran']['name'];
  $file_tmp = $_FILES['lampiran']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/ekspedisi_intern/lampiran/'.$nama);

  $query = mysql_query("INSERT INTO tb_ekspedisi 
    (id_ekspedisi,tanggal,nomor_surat,perihal,penerima,date_ekspedisi,lampiran) 
    VALUES 
    ('','$tanggal','$nomor_surat','$perihal','$json_penerima','$date_ekspedisi','$nama')
    ");
  if ($query) {
    header("Location: ./ekspedisi-intern.php?ntf=1");  
  } else {
    header("Location: ./ekspedisi-intern.php?ntf=6");
  }
}

// EDIT
if(isset($_POST["update"]))    
{    
  $id_ekspedisi     = $_POST['id_ekspedisi'];
  $tanggal          = $_POST['tanggal'];
  $nomor_surat      = $_POST['nomor_surat'];
  $perihal          = $_POST['perihal'];
  $penerima         = $_POST['penerima'];
  $json_penerima    = json_encode($penerima);
  $date_ekspedisi   = $_POST['date_ekspedisi'];

  $query = mysql_query("UPDATE tb_ekspedisi SET 
    tanggal = '$tanggal',
    nomor_surat = '$nomor_surat',
    perihal = '$perihal',
    penerima = '$json_penerima',
    date_ekspedisi = '$date_ekspedisi'
    WHERE id_ekspedisi ='$id_ekspedisi'");
  if($query){
    header("Location: ./ekspedisi-intern.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// TAMBAH LAMPIRAN
if(isset($_POST["uploadlampiran"]))    
{    
  $id_ekspedisi           = $_POST['id_ekspedisi'];

  $nama = $_FILES['lampiran']['name'];
  $file_tmp = $_FILES['lampiran']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/ekspedisi_intern/lampiran/'.$nama);
  
  $query = mysql_query("UPDATE tb_ekspedisi SET 
    lampiran = '$nama'
    WHERE id_ekspedisi ='$id_ekspedisi'");
  if($query){
    header("Location: ./ekspedisi-intern.php?ntf=5");                                                  
  } else {
    header("Location: ./ekspedisi-intern.php?ntf=6");  
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $id_ekspedisi    = $_POST['id_ekspedisi'];

  if($id_ekspedisi){
    $query = mysql_query("DELETE FROM tb_ekspedisi WHERE id_ekspedisi = '$id_ekspedisi'");
    if($query){
     header("Location: ./ekspedisi-intern.php?ntf=3");                     
   } else {
    header("Location: ./ekspedisi-intern.php?ntf=6");  
  }
} else {
  header("Location: ./ekspedisi-intern.php?ntf=6");  
}
}

if(isset($_POST["konfirmasi"]))
{

  // $penerima         = $_POST['penerima'];
  // $json_penerima    = json_encode($penerima);

 // var_dump($penerima);exit();

  $message = '
  <p>Kepada Yth,</p>
  <p>Ibu/Bapak <strong></strong></p>
  <p>&nbsp;</p>
  <p></p>
  <p>&nbsp;</p>
  <p>Demikian kami sampaikan, atas perhatiannya kami ucapkan terima kasih.</p>
  ';

require 'class/class.phpmailer.php';
$mail = new PHPMailer;
$mail->IsSMTP();                //Sets Mailer to send message using SMTP
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "adm.rskghabibie@gmail.com";
$mail->Password = "@10Rskghabibie";       //Sets connection prefix. Options are "", "ssl" or "tls"
$mail->From = ('Rumah Sakit Khusus Ginjal Ny. R.A. Habibie');         //Sets the From email address for the message
$mail->FromName = ('Administrasi RSKG');     //Sets the From name of the message
// $mail->AddAddress(implode(', ',$_POST['penerima']));
// $mail->AddAddress = implode(',', $recipients);
// $mail->AddAddress($penerima);
// $to = implode(',', $_POST['penerima']);
// $mail->to('amranrskg@gmail.com,amranhakim9@gmail.com');
$mail->AddAddress('amranrskg@gmail.com,amranhakim9@gmail.com');   //Adds a "To" address
$mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
$mail->IsHTML(true);              //Sets message type to HTML
$mail->Subject = 'Konfirmasi Seminar & Workshop';       //Sets the Subject of the message
$mail->Body = $message;             //An HTML or plain text message body
if($mail->Send())               //Send an Email. Return true on success or false on error
{
  $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
}
else
{
  $message = '<div class="alert alert-danger">There is an Error</div>';
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
              <h1 class="m-0 text-dark">Ekspedisi Intern RSKG</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Ekspedisi Intern RSKG</a></li>
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
                  <label class="modal-title">Tambah Ekspedisi Intern RSKG</label>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>File Lampiran</label>
                        <input type="file" name="lampiran">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Tanggal<font style="color: red">*</font></label>
                          <input type="date" class="form-control" name="tanggal" required="required" value="<?php echo date('Y-m-d'); ?>">
                          <input type="hidden" class="form-control" name="date_ekspedisi" required="required" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Nomor Surat<font style="color: red">*</font></label>
                          <input type="text" class="form-control" name="nomor_surat" placeholder="Nomor Surat ..." required="required">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Perihal<font style="color: red">*</font></label>
                          <input type="text" class="form-control" name="perihal" placeholder="Perihal ..." required="required">
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
                    <div class="col-sm-12">
                      <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-block btn-info">Submit</button>
                        <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Close</button>
                      </div>
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
                <a href="cetak-ekspedisi-intern.php" target="_blank">
                  <span type="submit" name="search" value="search" class="btn bg-gray btn-flat">
                    <i class="fa fa-print"></i> 
                    Print
                  </span>
                </a>
                <a href="assets/file/ekspedisi_intern/download/ex_ekspedisi-intern.php">
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
                    <tr>
                      <th>No.</th>
                      <th>Hari/Tanggal</th>
                      <th>Nomor Surat</th>
                      <th>Perihal</th>
                      <th>Dikirim Kepada</th>
                      <th>Lampiran</th>
                      <th>Action</th>
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
                    $result = mysqli_query($con,"SELECT * FROM tb_ekspedisi ORDER BY id_ekspedisi DESC");

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
                        if ($row['nomor_surat']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['nomor_surat'] . "</td>";
                        }
                        if ($row['perihal']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['perihal'] . "</td>";
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
                          <a href='assets/file/ekspedisi_intern/lampiran/$row[lampiran]' target='_blank' title='Lihat'><span class='btn btn-info btn-xs'><i class='fa fa-eye'></i> Lihat</span></a>
                          </td>";
                        }
                        echo "<td align= '' width='30px'>
                        <a href='#' data-toggle='modal' data-target='#edit$row[id_ekspedisi]' title='Edit'><span class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> </span></a>
                        <a href='#' data-toggle='modal' data-target='#delete$row[id_ekspedisi]' title='Delete'><span class='btn btn-danger btn-xs'><i class='fas fa-times'></i> </span></a>
                        <a href='#' data-toggle='modal' data-target='#addfile$row[id_ekspedisi]' title='Tambah Lampiran'><span class='btn btn-default btn-xs'><i class='fas fa-file'></i> </span></a>
                        <a href='#' data-toggle='modal' data-target='#konfirm$row[id_ekspedisi]' title='Konfirmasi Selesai'><span class='btn bg-pink btn-xs'><i class='fas fa-envelope'></i> </span></a>
                        </td>";
                        echo "</tr>";
                        ?>

                        <!-- UPDATE -->
                        <div class="modal fade" id="edit<?php echo $row['id_ekspedisi'];?>">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Update Ekspedisi Intern RSKG</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" required="required" value="<?php echo $row['tanggal']; ?>">
                                        <input type="hidden" class="form-control" name="date_ekspedisi" value="<?php echo $row['date_ekspedisi']; ?>">
                                        <input type="hidden" class="form-control" name="id_ekspedisi" value="<?php echo $row['id_ekspedisi']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Nomor Surat</label>
                                        <input type="text" class="form-control" name="nomor_surat" placeholder="Nomor Surat ..." required="required" value="<?php echo $row['nomor_surat']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Perihal</label>
                                        <input type="text" class="form-control" name="perihal" placeholder="Perihal ..." required="required" value="<?php echo $row['perihal']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Penerima</label>
                                        <select class="select2bs4" multiple="multiple" name="penerima[]" data-placeholder="Pilih Penerima" style="width: 100%;">
                                          <option value="<?php echo $row['penerima']; ?>"><?php echo $row['penerima']; ?></option>
                                          <option value="">-- Pilih Penerima --</option>
                                          <?php
                                          $con=mysqli_connect("localhost","root","","rskg_sirsadm");
                                          if (mysqli_connect_errno())
                                          {
                                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                          }
                                          $resultpenerima=mysql_query("SELECT fullname,email FROM tb_user");
                                          while($datapenerima=mysql_fetch_array($resultpenerima)) { ?>
                                            <option value="<?php echo $datapenerima['email']; ?>"><?php echo $datapenerima['fullname']; ?></option>
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
                        <div class="modal fade" id="delete<?php echo $row['id_ekspedisi'];?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Delete Ekspedisi Intern RSKG</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="">
                                  <div class="form-group">
                                    <label>Hapus Data Ekspedisi Intern RSKG?</label>
                                    <h6>Nomor Surat : <b><u><?php echo $row['nomor_surat'];?></u></b></h6>
                                    <h6>Perihal : <b><u><?php echo $row['perihal'];?></u></b></h6>
                                    <h6>Dikirim Kepada : <b><u><?php echo $row['penerima'];?></u></b></h6>
                                    <input type="hidden" name="id_ekspedisi" class="form-control" placeholder="client name" value="<?php echo $row['id_ekspedisi'];?>" required>
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
                        <div class="modal fade" id="addfile<?php echo $row['id_ekspedisi'];?>" role="dialog">
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
                                    <input type="hidden" name="id_ekspedisi" class="form-control" placeholder="client name" value="<?php echo $row['id_ekspedisi'];?>" required>
                                  </div>
                                  <button type="submit" name="uploadlampiran" class="btn btn-info btn-block btn-flat">Submit</button>
                                  <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">Close</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- END FILE -->

                        <!-- KONFIRMASI -->
                        <div class="modal fade" id="konfirm<?php echo $row['id_ekspedisi'];?>">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Konfirmasi Seminar & Workshop</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Remark<font style="color: red">*</font></label>
                                        <select class="select2bs4" multiple="multiple" name="penerima[]" data-placeholder="Pilih Penerima" style="width: 100%;">
                                          <option value="<?php echo $row['penerima']; ?>"><?php echo $row['penerima']; ?></option>
                                          <option value="">-- Pilih Penerima --</option>
                                          <?php
                                          $con=mysqli_connect("localhost","root","","rskg_sirsadm");
                                          if (mysqli_connect_errno())
                                          {
                                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                          }
                                          $resultpenerima=mysql_query("SELECT fullname,email FROM tb_user");
                                          while($datapenerima=mysql_fetch_array($resultpenerima)) { ?>
                                            <option value="<?php echo $datapenerima['email']; ?>"><?php echo $datapenerima['fullname']; ?></option>
                                            <?php
                                          }
                                          ?>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Lampirkan file jika ada</label><br>
                                        <input type="file" name="lampiran" accept=".doc,.docx, .pdf"/>
                                      </div>
                                    </div>
                                  </div> -->
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <button type="submit" name="konfirmasi" class="btn btn-block btn-info">Konfirmasi</button>
                                    <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- END KONFIRMASI -->

                        <?php
                      }
                    }mysqli_close($con);
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Hari/Tanggal</th>
                      <th>Nomor Surat</th>
                      <th>Perihal</th>
                      <th>Dikirim Kepada</th>
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
