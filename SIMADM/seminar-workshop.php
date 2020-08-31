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

// FORMAT UANG
function rupiah($angka){

  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
}

// ADD
if(isset($_POST["submit"]))    
{    
  $id_snw      = $_POST['id_snw'];
  $kegiatan    = $_POST['kegiatan'];
  $tempat      = $_POST['tempat'];
  $wp_mulai    = $_POST['wp_mulai'];
  $wp_selesai  = $_POST['wp_selesai'];
  $dp_nama     = $_POST['dp_nama'];
  $dp_nik      = $_POST['dp_nik'];
  $email       = $_POST['email'];
  $date_snw    = $_POST['date_snw'];

  $query = mysql_query("INSERT INTO tb_snw 
    (id_snw,kegiatan,tempat,wp_mulai,wp_selesai,dp_nama,dp_nik,email,date_snw) 
    VALUES 
    ('','$kegiatan','$tempat','$wp_mulai','$wp_selesai','$dp_nama','$dp_nik','$email','$date_snw')
    ");
  if ($query) {
    header("Location: ./seminar-workshop.php?ntf=1");  
  } else {
    header("Location: ./seminar-workshop.php?ntf=6");
  }
}

// EDIT
if(isset($_POST["update"]))    
{    
  $id_snw      = $_POST['id_snw'];
  $kegiatan    = $_POST['kegiatan'];
  $tempat      = $_POST['tempat'];
  $wp_mulai    = $_POST['wp_mulai'];
  $wp_selesai  = $_POST['wp_selesai'];
  $dp_nama     = $_POST['dp_nama'];
  $dp_nik      = $_POST['dp_nik'];
  $email       = $_POST['email'];
  $date_snw    = $_POST['date_snw'];

  $query = mysql_query("UPDATE tb_snw SET 
    kegiatan ='$kegiatan',
    tempat = '$tempat',
    wp_mulai = '$wp_mulai',
    wp_selesai = '$wp_selesai',
    dp_nama = '$dp_nama',
    dp_nik = '$dp_nik',
    email = '$email',
    date_snw = '$date_snw'
    WHERE id_snw ='$id_snw'");

  if($query){
    header("Location: ./seminar-workshop.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
$message = '';

function clean_text($string)
{
  $string = trim($string);
  $string = stripslashes($string);
  $string = htmlspecialchars($string);
  return $string;
}


if(isset($_POST["updateregisted"]))
{

  $id_snw      = $_POST['id_snw'];
  $kegiatan    = $_POST['kegiatan'];
  $tempat      = $_POST['tempat'];
  $dp_nama     = $_POST['dp_nama'];
  $dp_nik      = $_POST['dp_nik'];
  $email       = $_POST['email'];
  $wp_mulai    = $_POST['wp_mulai'];
  $wp_selesai  = $_POST['wp_selesai'];
  $rg_nama   = $_POST['rg_nama'];
  $rg_biaya    = $_POST['rg_biaya'];
  $rg_bp       = $_POST['rg_bp'];
  $rg_lampiran = $_POST['rg_lampiran'];
  $date_rgl    = $_POST['date_rgl'];

  $query = mysql_query("UPDATE tb_snw SET 
    kegiatan ='$kegiatan',
    tempat = '$tempat',
    dp_nama = '$dp_nama',
    dp_nik = '$dp_nik',
    email = '$email',
    wp_mulai = '$wp_mulai',
    wp_selesai = '$wp_selesai',
    rg_nama = '$rg_nama',
    rg_biaya = '$rg_biaya',
    rg_bp = '$rg_bp',
    date_rgl = '$date_rgl'
    WHERE id_snw ='$id_snw'");

  if($query){
    header("Location: ./seminar-workshop.php?ntf=64");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }

  $path = 'upload/' . $_FILES["rg_lampiran"]["name"];
  move_uploaded_file($_FILES["rg_lampiran"]["tmp_name"], $path);
  $message = '
  <p>Kepada Yth,</p>
  <p>Ibu/Bapak <strong>'.$_POST["dp_nama"].'</strong></p>
  <p>&nbsp;</p>
  <p>Berikut kami lampirkan bukti pembayaran pendaftaran Seminar/Workshop <strong>'.$_POST["kegiatan"].'</strong> yang akan dilaksanakan pada <strong>'.$_POST["wp_mulai"].' </strong>sampai dengan <strong>'.$_POST["wp_selesai"].'</strong> di <strong>'.$_POST["tempat"].'</strong>.</p>
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
$mail->AddAddress($_POST['email']);   //Adds a "To" address
$mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
$mail->IsHTML(true);              //Sets message type to HTML
$mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
$mail->Subject = 'Registrasi Seminar & Workshop';       //Sets the Subject of the message
$mail->Body = $message;             //An HTML or plain text message body
if($mail->Send())               //Send an Email. Return true on success or false on error
{
  $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
  unlink($path);
}
else
{
  $message = '<div class="alert alert-danger">There is an Error</div>';
}
}

if(isset($_POST["updatetransport"]))
{

  $id_snw      = $_POST['id_snw'];
  $kegiatan    = $_POST['kegiatan'];
  $tempat      = $_POST['tempat'];
  $dp_nama     = $_POST['dp_nama'];
  $dp_nik      = $_POST['dp_nik'];
  $email       = $_POST['email'];
  $wp_mulai    = $_POST['wp_mulai'];
  $wp_selesai  = $_POST['wp_selesai'];
  $tt_jenis   = $_POST['tt_jenis'];
  $tt_biaya    = $_POST['tt_biaya'];
  $tt_bp       = $_POST['tt_bp'];
  $tt_lampiran = $_POST['tt_lampiran'];
  $date_ttl    = $_POST['date_ttl'];

  $query = mysql_query("UPDATE tb_snw SET 
    kegiatan ='$kegiatan',
    tempat = '$tempat',
    dp_nama = '$dp_nama',
    dp_nik = '$dp_nik',
    email = '$email',
    wp_mulai = '$wp_mulai',
    wp_selesai = '$wp_selesai',
    tt_jenis = '$tt_jenis',
    tt_biaya = '$tt_biaya',
    tt_bp = '$tt_bp',
    date_ttl = '$date_ttl'
    WHERE id_snw ='$id_snw'");

  if($query){
    header("Location: ./seminar-workshop.php?ntf=65");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }

  $path = 'upload/' . $_FILES["tt_lampiran"]["name"];
  move_uploaded_file($_FILES["tt_lampiran"]["tmp_name"], $path);
  $message = '
  <p>Kepada Yth,</p>
  <p>Ibu/Bapak <strong>'.$_POST["dp_nama"].'</strong></p>
  <p>&nbsp;</p>
  <p>Berikut kami lampirkan bukti pembayaran transportasi/<em>e-ticket</em> <strong>'.$_POST["tt_jenis"].'</strong> untuk keperluan&nbsp; Seminar/Workshop <strong>'.$_POST["kegiatan"].'</strong> yang akan dilaksanakan pada <strong>'.$_POST["wp_mulai"].'</strong> sampai dengan <strong>'.$_POST["wp_selesai"].' </strong>di <strong>'.$_POST["tempat"].'</strong>.</p>
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
$mail->AddAddress($_POST['email']);   //Adds a "To" address
$mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
$mail->IsHTML(true);              //Sets message type to HTML
$mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
$mail->Subject = 'Transportasi Seminar & Workshop';       //Sets the Subject of the message
$mail->Body = $message;             //An HTML or plain text message body
if($mail->Send())               //Send an Email. Return true on success or false on error
{
  $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
  unlink($path);
}
else
{
  $message = '<div class="alert alert-danger">There is an Error</div>';
}
}

if(isset($_POST["updateakomodasi"]))
{

  $id_snw      = $_POST['id_snw'];
  $kegiatan    = $_POST['kegiatan'];
  $tempat      = $_POST['tempat'];
  $dp_nama     = $_POST['dp_nama'];
  $dp_nik      = $_POST['dp_nik'];
  $email       = $_POST['email'];
  $wp_mulai    = $_POST['wp_mulai'];
  $wp_selesai  = $_POST['wp_selesai'];
  $ak_mulai    = $_POST['ak_mulai'];
  $ak_selesai  = $_POST['ak_selesai'];
  $ak_tempat   = $_POST['ak_tempat'];
  $ak_biaya    = $_POST['ak_biaya'];
  $ak_bp       = $_POST['ak_bp'];
  $ak_lampiran = $_POST['ak_lampiran'];
  $date_akl    = $_POST['date_akl'];

  $query = mysql_query("UPDATE tb_snw SET 
    kegiatan ='$kegiatan',
    tempat = '$tempat',
    dp_nama = '$dp_nama',
    dp_nik = '$dp_nik',
    email = '$email',
    wp_mulai = '$wp_mulai',
    wp_selesai = '$wp_selesai',
    ak_mulai = '$ak_mulai',
    ak_selesai = '$ak_selesai',
    ak_tempat = '$ak_tempat',
    ak_biaya = '$ak_biaya',
    ak_bp = '$ak_bp',
    date_akl = '$date_akl'
    WHERE id_snw ='$id_snw'");

  if($query){
    header("Location: ./seminar-workshop.php?ntf=66");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }

  $path = 'upload/' . $_FILES["ak_lampiran"]["name"];
  move_uploaded_file($_FILES["ak_lampiran"]["tmp_name"], $path);
  $message = '
  <p>Kepada Yth,</p>
  <p>Ibu/Bapak <strong>'.$_POST["dp_nama"].'</strong></p>
  <p>&nbsp;</p>
  <p>Berikut kami lampirkan bukti pembayaran <strong>Akomodasi</strong> di <strong>'.$_POST["ak_tempat"].'</strong>, tanggal <em>Check in</em> <strong>'.$_POST["ak_mulai"].'</strong> tanggal <em>Check out</em><strong> '.$_POST["ak_selesai"].'</strong> untuk keperluan Seminar/Workshop <strong>'.$_POST["kegiatan"].'</strong> yang akan dilaksanakan pada tanggal<strong> '.$_POST["wp_mulai"].'</strong> sampai tanggal <strong> '.$_POST["ak_mulai"].'</strong> di <strong>'.$_POST["tempat"].'</strong>.</p>
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
$mail->AddAddress($_POST['email']);   //Adds a "To" address
$mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
$mail->IsHTML(true);              //Sets message type to HTML
$mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
$mail->Subject = 'Akomodasi Seminar & Workshop';       //Sets the Subject of the message
$mail->Body = $message;             //An HTML or plain text message body
if($mail->Send())               //Send an Email. Return true on success or false on error
{
  $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
  unlink($path);
}
else
{
  $message = '<div class="alert alert-danger">There is an Error</div>';
}
}

if(isset($_POST["konfirmasi"]))
{

  $id_snw           = $_POST['id_snw'];
  $kegiatan         = $_POST['kegiatan'];
  $tempat           = $_POST['tempat'];
  $dp_nama          = $_POST['dp_nama'];
  $dp_nik           = $_POST['dp_nik'];
  $email            = $_POST['email'];
  $wp_mulai         = $_POST['wp_mulai'];
  $wp_selesai       = $_POST['wp_selesai'];
  $remark           = $_POST['remark'];
  $remark_lampiran  = $_POST['remark_lampiran  '];
  $date_remark      = $_POST['date_remark'];

  $query = mysql_query("UPDATE tb_snw SET 
    kegiatan ='$kegiatan',
    tempat = '$tempat',
    dp_nama = '$dp_nama',
    dp_nik = '$dp_nik',
    email = '$email',
    wp_mulai = '$wp_mulai',
    wp_selesai = '$wp_selesai',
    remark = '$remark',
    date_remark = '$date_remark'
    WHERE id_snw ='$id_snw'");

  if($query){
    header("Location: ./seminar-workshop.php?ntf=63");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }

  $path = 'upload/' . $_FILES["remark_lampiran"]["name"];
  move_uploaded_file($_FILES["remark_lampiran"]["tmp_name"], $path);
  $message = '
  <p>Kepada Yth,</p>
  <p>Ibu/Bapak <strong>'.$_POST["dp_nama"].'</strong></p>
  <p>&nbsp;</p>
  <p>'.$_POST["remark"].'</p>
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
$mail->AddAddress($_POST['email']);   //Adds a "To" address
$mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
$mail->IsHTML(true);              //Sets message type to HTML
$mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
$mail->Subject = 'Konfirmasi Seminar & Workshop';       //Sets the Subject of the message
$mail->Body = $message;             //An HTML or plain text message body
if($mail->Send())               //Send an Email. Return true on success or false on error
{
  $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
  unlink($path);
}
else
{
  $message = '<div class="alert alert-danger">There is an Error</div>';
}
}


// DELETE
if(isset($_POST['delete']))
{
  $id_snw    = $_POST['id_snw'];

  if($id_snw){
    $query = mysql_query("DELETE FROM tb_snw WHERE id_snw = '$id_snw'");
    if($query){
      header("Location: ./seminar-workshop.php?ntf=3");                     
    } else {
      header("Location: ./seminar-workshop.php?ntf=6");  
    }
  } else {
    header("Location: ./seminar-workshop.php?ntf=6");  
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
              <h1 class="m-0 text-dark">Seminar & Workshop</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Seminar & Workshop</a></li>
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
                  <label class="modal-title">Tambah Seminar & Workshop</label>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Nama Kegiatan<font style="color: red">*</font></label>
                          <input type="text" class="form-control" name="kegiatan" placeholder="Nama Kegiatan ..." required="required">
                          <input type="hidden" class="form-control" name="id_snw">
                          <input type="hidden" class="form-control" name="date_snw" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Tempat Kegiatan<font style="color: red">*</font></label>
                          <textarea class="form-control" rows="3" name="tempat" placeholder="Tempat Kegiatan ..." required="required"></textarea>
                        </div>
                      </div>
                    </div>
                    <div align="center">
                      <label>Waktu Pelaksanaan</label>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Mulai<font style="color: red">*</font></label>
                          <input type="date" class="form-control" name="wp_mulai" required="required">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Selesai<font style="color: red">*</font></label>
                          <input type="date" class="form-control" name="wp_selesai" required="required">
                        </div>
                      </div>
                    </div>
                    <div align="center">
                      <label>Data Peserta</label>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Nama<font style="color: red">*</font></label>
                          <input type="text" class="form-control" name="dp_nama" placeholder="Nama ..." required="required">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>NIK<font style="color: red">*</font></label>
                          <input type="number" class="form-control" name="dp_nik" placeholder="NIK ...." >
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" placeholder="@Email ....">
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
                <a href="cetak-seminar-workshop.php" target="_blank">
                  <span type="submit" name="search" value="search" class="btn bg-gray btn-flat">
                    <i class="fa fa-print"></i> 
                    Print
                  </span>
                </a>
                <a href="assets/file/seminar_workshop/download/ex_seminar-workshop.php">
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
                      <th rowspan="2">No</th>
                      <th rowspan="2">Kegiatan</th>
                      <th rowspan="2">Tempat</th>
                      <th colspan="2">Waktu Pelaksanaan</th>
                      <th rowspan="2">Data Peserta</th>
                      <th rowspan="2">Registrasi</th>
                      <th rowspan="2">Transportasi</th>
                      <th rowspan="2">Akomodasi</th>
                      <th rowspan="2">Action</th>
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
                    $result = mysqli_query($con,"SELECT * FROM tb_snw ORDER BY id_snw DESC");

                    $no=0;
                    if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_array($result))
                      {
                        $no++;
                        echo "<tr>";
                        echo "<td>".$no.".</td>";
                        if ($row['kegiatan']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['kegiatan'] . "</td>";
                        }
                        if ($row['tempat']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['tempat'] . "</td>";
                        }
                        if ($row['wp_mulai']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".tanggal_indo($row['wp_mulai'], true) . "</td>";
                        }
                        if ($row['wp_selesai']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".tanggal_indo($row['wp_selesai'], true) . "</td>";
                        }
                        if ($row['dp_nama']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td align= ''>
                          <a href='#' data-toggle='modal' data-target='#Peserta$row[id_snw]' title='Data Peserta'><span class='btn bg-blue btn-xs'>Klik disini </span></a>
                          </td>";
                        }
                        if ($row['rg_bp']==NULL){
                          echo "<td align= ''>
                          <a href='#' data-toggle='modal' data-target='#registrasi$row[id_snw]' title='Data Peserta'><span class='btn bg-blue btn-xs'>Klik disini </span></a>
                          </td>";
                        }else{
                          echo "<td align= ''>
                          <a href='#' data-toggle='modal' data-target='#registrasi$row[id_snw]' title='Data Peserta'><span class='btn bg-green btn-xs'>Klik disini </span></a>
                          </td>";
                        }

                        if ($row['tt_bp']==NULL){
                         echo "<td align= ''>
                         <a href='#' data-toggle='modal' data-target='#transportasi$row[id_snw]' title='Data Peserta'><span class='btn bg-blue btn-xs'>Klik disini </span></a>
                         </td>";
                       }else{
                         echo "<td align= ''>
                         <a href='#' data-toggle='modal' data-target='#transportasi$row[id_snw]' title='Data Peserta'><span class='btn bg-green btn-xs'>Klik disini </span></a>
                         </td>";
                       }
                       if ($row['ak_bp']==NULL){
                         echo "<td align= ''>
                         <a href='#' data-toggle='modal' data-target='#akomodasi$row[id_snw]' title='Data Peserta'><span class='btn bg-blue btn-xs'>Klik disini </span></a>
                         </td>";
                       }else{
                         echo "<td align= ''>
                         <a href='#' data-toggle='modal' data-target='#akomodasi$row[id_snw]' title='Data Peserta'><span class='btn bg-green btn-xs'>Klik disini </span></a>
                         </td>";
                       }
                       echo "<td>
                       <a href='#' data-toggle='modal' data-target='#edit$row[id_snw]' title='Edit'><span class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> </span></a>
                       <a href='#' data-toggle='modal' data-target='#delete$row[id_snw]' title='Delete'><span class='btn btn-danger btn-xs'><i class='fas fa-times'></i> </span></a>
                       <a href='#' data-toggle='modal' data-target='#konfirm$row[id_snw]' title='Konfirmasi Selesai'><span class='btn bg-pink btn-xs'><i class='fas fa-envelope'></i> </span></a>
                       </td>";
                       echo "</tr>";
                       ?>

                       <!-- UPDATE -->
                       <div class="modal fade" id="edit<?php echo $row['id_snw'];?>">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <label class="modal-title">Update Seminar & Workshop</label>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="" method="POST">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Nama Kegiatan<font style="color: red">*</font></label>
                                      <input type="text" class="form-control" name="kegiatan" value="<?php echo $row['kegiatan']; ?>">
                                      <input type="hidden" class="form-control" name="id_snw" value="<?php echo $row['id_snw']; ?>">
                                      <input type="hidden" class="form-control" name="date_snw" value="<?php echo $row['date_snw']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Tempat Kegiatan<font style="color: red">*</font></label>
                                      <textarea class="form-control" rows="3" name="tempat" placeholder="Tempat Kegiatan ..."><?php echo $row['tempat']; ?></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div align="center">
                                  <label>Waktu Pelaksanaan</label>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Mulai<font style="color: red">*</font></label>
                                      <input type="date" class="form-control" name="wp_mulai" value="<?php echo $row['wp_mulai']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Selesai<font style="color: red">*</font></label>
                                      <input type="date" class="form-control" name="wp_selesai" value="<?php echo $row['wp_selesai']; ?>">
                                    </div>
                                  </div>
                                </div>
                                <div align="center">
                                  <label>Data Peserta</label>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>Nama<font style="color: red">*</font></label>
                                      <input type="text" class="form-control" name="dp_nama" value="<?php echo $row['dp_nama']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>NIK<font style="color: red">*</font></label>
                                      <input type="number" class="form-control" name="dp_nik" value="<?php echo $row['dp_nik']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
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
                      <div class="modal fade" id="delete<?php echo $row['id_snw'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <label class="modal-title">Delete Seminar & Workshop</label>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="">
                                <div class="form-group">
                                  <label>Hapus Data Seminar & Workshop?</label>
                                  <h6>Nama Kegiatan : <b><u><?php echo $row['kegiatan'];?></u></b></h6>
                                  <h6>Tempat Kegiatan : <b><u><?php echo $row['tempat'];?></u></b></h6>
                                  <h6>Nama : <b><u><?php echo $row['dp_nama'];?></u></b></h6>
                                  <h6>NIK : <b><u><?php echo $row['dp_nik'];?></u></b></h6>
                                  <h6>Email : <b><u><?php echo $row['email'];?></u></b></h6>
                                  <input type="hidden" name="id_snw" class="form-control" placeholder="client name" value="<?php echo $row['id_snw'];?>" required>
                                </div>
                                <button type="submit" name="delete" class="btn btn-info btn-block btn-flat">Yes</button>
                                <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">No</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- END DELETE -->

                      <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa  -->
                      <!-- Data Peserta -->
                      <div class="modal fade" id="Peserta<?php echo $row['id_snw'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <label class="modal-title">Data Peserta</label>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-sm-4">
                                  <div class="form-group">
                                    <label>Nama Peserta</label><hr>
                                    <font style="font-size: 12px; font-family: Arial"><b><?php echo $row['dp_nama']; ?></b></font>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="form-group">
                                    <label>NIK</label><hr>
                                    <font style="font-size: 12px; font-family: Arial"><b><?php echo $row['dp_nik']; ?></b></font>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="form-group">
                                    <label>Email</label><hr>
                                    <font style="font-size: 12px; font-family: Arial"><b><?php echo $row['email']; ?></b></font>
                                  </div>
                                </div>
                              </div>
                              <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End Data Peserta -->

                      <!-- Data Registrasi -->
                      <div class="modal fade" id="registrasi<?php echo $row['id_snw'];?>">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <label class="modal-title">Update Seminar & Workshop (Registrasi)</label>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Registrasi<font style="color: red">*</font></label>
                                      <input type="text" name="rg_nama" class="form-control" placeholder="Registrasi ..." required="required" value="<?php echo $row['rg_nama']; ?>">
                                      <input type="hidden" class="form-control" name="id_snw" value="<?php echo $row['id_snw']; ?>">
                                      <input type="hidden" class="form-control" name="kegiatan" value="<?php echo $row['kegiatan']; ?>">
                                      <input type="hidden" class="form-control" name="tempat" value="<?php echo $row['tempat']; ?>">
                                      <input type="hidden" class="form-control" name="dp_nama" value="<?php echo $row['dp_nama']; ?>">
                                      <input type="hidden" class="form-control" name="dp_nik" value="<?php echo $row['dp_nik']; ?>">
                                      <input type="hidden" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                      <input type="hidden" class="form-control" name="wp_mulai" value="<?php echo $row['wp_mulai']; ?>">
                                      <input type="hidden" class="form-control" name="wp_selesai" value="<?php echo $row['wp_selesai']; ?>">
                                      <input type="hidden" class="form-control" name="date_ttl" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>Biaya<font style="color: red">*</font></label>
                                      <input type="number" id="rupiah" class="form-control" name="rg_biaya" placeholder="Biaya ..." required="required" value="<?php echo $row['rg_biaya']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>No. Bukti Pembayaran</label>
                                      <input type="text" class="form-control" placeholder="No. Bukti Pembayaran" name="rg_bp" value="<?php echo $row['rg_bp']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>Bukti Pembayaran<font style="color: red">*</font></label><br>
                                      <input type="file" name="rg_lampiran" accept=".doc,.docx, .pdf" required />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <button type="submit" name="updateregisted" class="btn btn-block btn-info">Submit</button>
                                  <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Data Registrasi -->

                      <!-- Data Transportasi -->
                      <div class="modal fade" id="transportasi<?php echo $row['id_snw'];?>">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <label class="modal-title">Update Seminar & Workshop (Transportasi)</label>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Jenis Transportasi<font style="color: red">*</font></label>
                                      <input type="text" name="tt_jenis" class="form-control" placeholder="Jenis Transportasi ..." required="required" value="<?php echo $row['tt_jenis']; ?>">
                                      <input type="hidden" class="form-control" name="id_snw" value="<?php echo $row['id_snw']; ?>">
                                      <input type="hidden" class="form-control" name="kegiatan" value="<?php echo $row['kegiatan']; ?>">
                                      <input type="hidden" class="form-control" name="tempat" value="<?php echo $row['tempat']; ?>">
                                      <input type="hidden" class="form-control" name="dp_nama" value="<?php echo $row['dp_nama']; ?>">
                                      <input type="hidden" class="form-control" name="dp_nik" value="<?php echo $row['dp_nik']; ?>">
                                      <input type="hidden" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                      <input type="hidden" class="form-control" name="wp_mulai" value="<?php echo $row['wp_mulai']; ?>">
                                      <input type="hidden" class="form-control" name="wp_selesai" value="<?php echo $row['wp_selesai']; ?>">
                                      <input type="hidden" class="form-control" name="date_ttl" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>Biaya<font style="color: red">*</font></label>
                                      <input type="number" class="form-control" name="tt_biaya" placeholder="Biaya ..." required="required" value="<?php echo $row['tt_biaya']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>No. Bukti Pembayaran</label>
                                      <input type="text" class="form-control" placeholder="No. Bukti Pembayaran" name="tt_bp" value="<?php echo $row['tt_bp']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>Bukti Pembayaran<font style="color: red">*</font></label><br>
                                      <input type="file" name="tt_lampiran" accept=".doc,.docx, .pdf" required />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <button type="submit" name="updatetransport" class="btn btn-block btn-info">Submit</button>
                                  <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Data Transportasi -->

                      <!-- Data Akomodasi -->
                      <div class="modal fade" id="akomodasi<?php echo $row['id_snw'];?>">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <label class="modal-title">Update Seminar & Workshop (Akomodasi)</label>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>Nama Hotel/Penginapan<font style="color: red">*</font></label>
                                      <input type="text" name="ak_tempat" class="form-control" placeholder="Nama Hotel/Penginapan ..." required="required" value="<?php echo $row['ak_tempat']; ?>">
                                      <input type="hidden" class="form-control" name="id_snw" value="<?php echo $row['id_snw']; ?>">
                                      <input type="hidden" class="form-control" name="kegiatan" value="<?php echo $row['kegiatan']; ?>">
                                      <input type="hidden" class="form-control" name="tempat" value="<?php echo $row['tempat']; ?>">
                                      <input type="hidden" class="form-control" name="dp_nama" value="<?php echo $row['dp_nama']; ?>">
                                      <input type="hidden" class="form-control" name="dp_nik" value="<?php echo $row['dp_nik']; ?>">
                                      <input type="hidden" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                      <input type="hidden" class="form-control" name="wp_mulai" value="<?php echo $row['wp_mulai']; ?>">
                                      <input type="hidden" class="form-control" name="wp_selesai" value="<?php echo $row['wp_selesai']; ?>">
                                      <input type="hidden" class="form-control" name="date_akl" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label><i>Check in</i><font style="color: red">*</font></label>
                                      <input type="date" name="ak_mulai" class="form-control" placeholder="Check in ..." required="required" value="<?php echo $row['ak_mulai']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label><i>Check out</i><font style="color: red">*</font></label>
                                      <input type="date" name="ak_selesai" class="form-control" placeholder="Check out ..." required="required" value="<?php echo $row['ak_selesai']; ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>Biaya<font style="color: red">*</font></label>
                                      <input type="number" class="form-control" name="ak_biaya" placeholder="Biaya ..." required="required" value="<?php echo $row['ak_biaya']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>No. Bukti Pembayaran</label>
                                      <input type="text" class="form-control" placeholder="No. Bukti Pembayaran" name="ak_bp" value="<?php echo $row['ak_bp']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>Bukti Pembayaran<font style="color: red">*</font></label><br>
                                      <input type="file" name="ak_lampiran" accept=".doc,.docx, .pdf" required />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <button type="submit" name="updateakomodasi" class="btn btn-block btn-info">Update</button>
                                  <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Data Akomodasi -->

                      <!-- Data Konfirmasi -->
                      <div class="modal fade" id="konfirm<?php echo $row['id_snw'];?>">
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
                                      <textarea class="form-control" name="remark"><?php echo $row['remark']; ?></textarea>
                                      <input type="hidden" class="form-control" name="id_snw" value="<?php echo $row['id_snw']; ?>">
                                      <input type="hidden" class="form-control" name="kegiatan" value="<?php echo $row['kegiatan']; ?>">
                                      <input type="hidden" class="form-control" name="tempat" value="<?php echo $row['tempat']; ?>">
                                      <input type="hidden" class="form-control" name="dp_nama" value="<?php echo $row['dp_nama']; ?>">
                                      <input type="hidden" class="form-control" name="dp_nik" value="<?php echo $row['dp_nik']; ?>">
                                      <input type="hidden" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                      <input type="hidden" class="form-control" name="wp_mulai" value="<?php echo $row['wp_mulai']; ?>">
                                      <input type="hidden" class="form-control" name="wp_selesai" value="<?php echo $row['wp_selesai']; ?>">
                                      <input type="hidden" class="form-control" name="date_remark" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Lampirkan file jika ada</label><br>
                                      <input type="file" name="remark_lampiran" accept=".doc,.docx, .pdf"/>
                                    </div>
                                  </div>
                                </div>
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
                      <!-- End Data Konfirmasi -->
                      <?php
                    }
                  }mysqli_close($con);
                  ?>
                </tbody>
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
