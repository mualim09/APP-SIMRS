<?php 
include "include/connection.php";

// KODE AUTO TICKET
function kdauto($tabel, $no_tick){
  $struktur   = mysql_query("SELECT * FROM $tabel");
  $field      = mysql_field_name($struktur,0);
  $panjang    = mysql_field_len($struktur,0);
  $qry  = mysql_query("SELECT max(".$field.") FROM ".$tabel);
  $row  = mysql_fetch_array($qry);
  if ($row[0]=="") {
    $angka=1000;
  }
  else {
    $angka= substr($row[0], strlen($no_tick));
  }
  $angka++;
  $angka      =strval($angka);
  $tmp  ="";
  for($i=1; $i<=($panjang-strlen($no_tick)-strlen($angka)); $i++) {
    $tmp=$tmp."0";
  }
  return $no_tick.$tmp.$angka;
}
// DATE
function tanggal_indo($tanggal, $cetak_hari = false)
{
  $hari = array ( 1 =>    
    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
  );
  $bulan = array (1 =>   
    'Januari',
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

$auto_kode = "SELECT MAX(id_tick) FROM `tb_ticket`";

//////////////////////////ADD//////////////////////

// ADD TICKET USER SOFTWARE
if(isset($_POST["submitsoftware"]))
{

  $id_tick      = $_POST['id_tick'];
  $no_tick      = $_POST['no_tick'];
  $req_date     = $_POST['req_date'];
  $due_date     = $_POST['due_date'];
  $subject      = $_POST['subject'];
  $detail       = $_POST['detail'];
  $url          = $_POST['url'];
  $priority     = $_POST['priority'];
  $trouble      = $_POST['trouble'];
  $req_by       = $_POST['req_by'];
  $assign_to    = $_POST['assign_to'];
  $admin_assign = $_POST['admin_assign'];
  $progress     = $_POST['progress'];
  $summary      = $_POST['summary'];
  $email_user   = $_POST['email_user'];
  $unit         = $_POST['unit'];
  $id_perangkat = $_POST['id_perangkat'];

  $path = $_FILES['proof']['name'];
  $file_tmp = $_FILES['proof']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/lampiran/'.$path);
  $query = mysql_query("INSERT INTO tb_ticket 
    (id_tick,no_tick,req_date,due_date,subject,detail,url,priority,trouble,req_by,assign_to,admin_assign,progress,summary,email_user,unit,proof,id_perangkat) 
    VALUES 
    ('','$no_tick','$req_date','$due_date','$subject','$detail','$url','$priority','$trouble','$req_by','$assign_to','$admin_assign','$progress','$summary','$email_user','$unit','$path','$id_perangkat')
    ");

  $query .= mysql_query("INSERT INTO tb_his_ticket
    (id_his,no_tick,req_by,assign_to,progress,date_progress,subject,detail,id_perangkat,email_user,trouble)
    VALUES
    ('','$no_tick','$req_by','$assign_to','$progress','$req_date','$summary','$detail','$id_perangkat','$email_user','$trouble')");
  if($query){
    header("Location: ./user_create_ticket.php?ntf=1");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }

  $path = 'upload/' . $_FILES["proof"]["name"];
  move_uploaded_file($_FILES["proof"]["tmp_name"], $path);
  $message = '  <!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>ITicket Problem!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">New Ticket Software Problem </h4><h4 align="center"><br>No. Ticket <b>'.$no_tick.'</b><hr><br>'.$priority.' Ticket!</h4> <p style="text-align: center;font-size: 16px;letter-spacing: .5px;">Hai, <span style="font-weight:600">'.$assign_to.'</span><br><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: red;color: #fff !important;padding: 10px 15px;text-decoration: none;">'.$progress.'</a></p><p style="text-align: center;font-size: 14px;">Saya mengalami masalah pada sistem dengan dengan detail masalah:<br><b>'.$detail.'</b><br> dengan lampiran yang tertera pada Aplikasi ITicket.</p><br><p align="left">Terimakasih,<br><b><u>'.$req_by.'</u></b><br><i>'.$unit.'</i></p><hr><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">Cek Aktivitas</a></p></div></body></html>';

  require 'class/class.phpmailer.php';
  $mail = new PHPMailer;
  $mail->IsSMTP();                //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "adm.rskghabibie@gmail.com";
  $mail->Password = "@10Rskghabibie";       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = $_POST['email_user'];         //Sets the From email address for the message
  $mail->FromName = ('ITicket RS. Khusus Ginjal Ny. R.A. Habibie');     //Sets the From name of the message
  $mail->AddAddress($_POST['admin_assign']);   //Adds a "To" address
  $mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);              //Sets message type to HTML
  $mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
  $mail->Subject = $_POST['subject'];       //Sets the Subject of the message
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

// ADD TICKET USER HARDWARE
if(isset($_POST["submithardware"]))
{

  $id_tick      = $_POST['id_tick'];
  $no_tick      = $_POST['no_tick'];
  $req_date     = $_POST['req_date'];
  $due_date     = $_POST['due_date'];
  $subject      = $_POST['subject'];
  $detail       = $_POST['detail'];
  $priority     = $_POST['priority'];
  $trouble      = $_POST['trouble'];
  $req_by       = $_POST['req_by'];
  $assign_to    = $_POST['assign_to'];
  $admin_assign = $_POST['admin_assign'];
  $progress     = $_POST['progress'];
  $summary      = $_POST['summary'];
  $email_user   = $_POST['email_user'];
  $unit         = $_POST['unit'];
  $id_perangkat         = $_POST['id_perangkat'];

  $path = $_FILES['proof']['name'];
  $file_tmp = $_FILES['proof']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/lampiran/'.$path);
  $query = mysql_query("INSERT INTO tb_ticket 
    (id_tick,no_tick,req_date,due_date,subject,detail,priority,trouble,req_by,assign_to,admin_assign,progress,summary,email_user,unit,proof,id_perangkat) 
    VALUES 
    ('','$no_tick','$req_date','$due_date','$subject','$detail','$priority','$trouble','$req_by','$assign_to','$admin_assign','$progress','$summary','$email_user','$unit','$path','$id_perangkat')
    ");

  $query .= mysql_query("INSERT INTO tb_his_ticket
    (id_his,no_tick,req_by,assign_to,progress,date_progress,subject,detail,id_perangkat,email_user,trouble)
    VALUES
    ('','$no_tick','$req_by','$assign_to','$progress','$req_date','$summary','$detail','$id_perangkat','$email_user','$trouble')");
  if($query){
    header("Location: ./user_create_ticket.php?ntf=1");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }

  $path = 'upload/' . $_FILES["proof"]["name"];
  move_uploaded_file($_FILES["proof"]["tmp_name"], $path);
  $message = '  <!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>ITicket Problem!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">New Ticket Hardware & Network Problem </h4><h4 align="center"><br>No. Ticket <b>'.$no_tick.'</b><hr><br>'.$priority.' Ticket!</h4> <p style="text-align: center;font-size: 16px;letter-spacing: .5px;">Hai, <span style="font-weight:600">'.$assign_to.'</span><br><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: red;color: #fff !important;padding: 10px 15px;text-decoration: none;">'.$progress.'</a></p><p style="text-align: center;font-size: 14px;">Saya mengalami masalah pada hardware/network dengan dengan detail masalah:<br><b>'.$detail.'</b><br> dengan lampiran yang tertera pada Aplikasi ITicket.</p><br><p align="left">Terimakasih,<br><b><u>'.$req_by.'</u></b><br><i>'.$unit.'</i></p><hr><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">Cek Aktivitas</a></p></div></body></html>';

  require 'class/class.phpmailer.php';
  $mail = new PHPMailer;
  $mail->IsSMTP();                //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "adm.rskghabibie@gmail.com";
  $mail->Password = "@10Rskghabibie";       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = $_POST['email_user'];         //Sets the From email address for the message
  $mail->FromName = ('ITicket RS. Khusus Ginjal Ny. R.A. Habibie');     //Sets the From name of the message
  $mail->AddAddress($_POST['admin_assign']);   //Adds a "To" address
  $mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);              //Sets message type to HTML
  $mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
  $mail->Subject = $_POST['subject'];       //Sets the Subject of the message
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

// ADD TICKET USER PRINTER
if(isset($_POST["submitprinter"]))
{

  $id_tick      = $_POST['id_tick'];
  $no_tick      = $_POST['no_tick'];
  $req_date     = $_POST['req_date'];
  $due_date     = $_POST['due_date'];
  $subject      = $_POST['subject'];
  $detail       = $_POST['detail'];
  $priority     = $_POST['priority'];
  $trouble      = $_POST['trouble'];
  $req_by       = $_POST['req_by'];
  $assign_to    = $_POST['assign_to'];
  $admin_assign = $_POST['admin_assign'];
  $progress     = $_POST['progress'];
  $summary      = $_POST['summary'];
  $email_user   = $_POST['email_user'];
  $unit         = $_POST['unit'];

  $path = $_FILES['proof']['name'];
  $file_tmp = $_FILES['proof']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/lampiran/'.$path);
  $query = mysql_query("INSERT INTO tb_ticket 
    (id_tick,no_tick,req_date,due_date,subject,detail,priority,trouble,req_by,assign_to,admin_assign,progress,summary,email_user,unit,proof) 
    VALUES 
    ('','$no_tick','$req_date','$due_date','$subject','$detail','$priority','$trouble','$req_by','$assign_to','$admin_assign','$progress','$summary','$email_user','$unit','$path')
    ");

  $query .= mysql_query("INSERT INTO tb_his_ticket
    (id_his,no_tick,req_by,assign_to,progress,date_progress,subject,detail,id_perangkat,email_user,trouble)
    VALUES
    ('','$no_tick','$req_by','$assign_to','$progress','$req_date','$summary','$detail',NULL,'$email_user','$trouble')");
  if($query){
    header("Location: ./user_create_ticket.php?ntf=1");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }

  $path = 'upload/' . $_FILES["proof"]["name"];
  move_uploaded_file($_FILES["proof"]["tmp_name"], $path);
  $message = '  <!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>ITicket Problem!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">New Ticket Printer Problem </h4><h4 align="center"><br>No. Ticket <b>'.$no_tick.'</b><hr><br>'.$priority.' Ticket!</h4> <p style="text-align: center;font-size: 16px;letter-spacing: .5px;">Hai, <span style="font-weight:600">'.$assign_to.'</span><br><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: red;color: #fff !important;padding: 10px 15px;text-decoration: none;">'.$progress.'</a></p><p style="text-align: center;font-size: 14px;">Saya mengalami masalah pada mesin printer dengan dengan detail masalah:<br><b>'.$detail.'</b><br> dengan lampiran yang tertera pada Aplikasi ITicket.</p><br><p align="left">Terimakasih,<br><b><u>'.$req_by.'</u></b><br><i>'.$unit.'</i></p><hr><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">Cek Aktivitas</a></p></div></body></html>';

  require 'class/class.phpmailer.php';
  $mail = new PHPMailer;
  $mail->IsSMTP();                //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "adm.rskghabibie@gmail.com";
  $mail->Password = "@10Rskghabibie";       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = $_POST['email_user'];         //Sets the From email address for the message
  $mail->FromName = ('ITicket RS. Khusus Ginjal Ny. R.A. Habibie');     //Sets the From name of the message
  $mail->AddAddress($_POST['admin_assign']);   //Adds a "To" address
  $mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);              //Sets message type to HTML
  $mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
  $mail->Subject = $_POST['subject'];       //Sets the Subject of the message
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

//////////////////////////END ADD//////////////////////
//////////////////////////UPDATE//////////////////////
// EDIT
if(isset($_POST["update"]))    
{    
  $id_tick       = $_POST['id_tick'];
  $no_urut_n     = $_POST['no_urut_n'];
  $tanggal_n     = $_POST['tanggal_n'];
  $no_dokumen_n  = $_POST['no_dokumen_n'];
  $judul_n       = $_POST['judul_n'];
  $bagian_n      = $_POST['bagian_n'];
  $keterangan_n  = $_POST['keterangan_n'];
  $date_n        = $_POST['date_n'];

  $query = mysql_query("UPDATE tb_ticket SET 
    no_urut_n ='$no_urut_n',
    tanggal_n = '$tanggal_n',
    no_dokumen_n = '$no_dokumen_n',
    judul_n = '$judul_n',
    bagian_n = '$bagian_n',
    keterangan_n = '$keterangan_n',
    date_n = '$date_n'
    WHERE id_tick ='$id_tick'");
  if($query){
    header("Location: ./user_create_ticket.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// TAMBAH LAMPIRAN
if(isset($_POST["uploadlampiran"]))    
{    
  $id_tick           = $_POST['id_tick'];

  $nama = $_FILES['upload_n']['name'];
  $file_tmp = $_FILES['upload_n']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/'.$nama);
  
  $query = mysql_query("UPDATE tb_ticket SET 
    upload_n = '$nama'
    WHERE id_tick ='$id_tick'");
  if($query){
    header("Location: ./user_create_ticket.php?ntf=5");                                                  
  } else {
    header("Location: ./user_create_ticket.php?ntf=6");  
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $id_tick    = $_POST['id_tick'];

  if($id_tick){
    $query = mysql_query("DELETE FROM tb_ticket WHERE id_tick = '$id_tick'");
    if($query){
     header("Location: ./user_create_ticket.php?ntf=3");                     
   } else {
    header("Location: ./user_create_ticket.php?ntf=6");  
  }
} else {
  header("Location: ./user_create_ticket.php?ntf=6");  
}
$message = '  <!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>ITicket Problem!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">Ticket Delete!</h4><h4 align="center"><br>No. Ticket <b>'.$_POST["no_tick"].'</b><hr><br>'.$_POST["priority"].' Ticket!</h4> <p style="text-align: center;font-size: 16px;letter-spacing: .5px;">Hai, <span style="font-weight:600">'.$_POST["assign_to"].'</span><br><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: gray;color: #fff !important;padding: 10px 15px;text-decoration: none;">'.$_POST["progress"].'</a></p><p style="text-align: center;font-size: 14px;">Keterangan:<br><b>'.$_POST["detail"].'</b><br><p align="left">Terimakasih,<br><b><u>'.$_POST["req_by"].'</u></b><br><i>'.$_POST["unit"].'</i></p><hr><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-rskg/Repository-APP-Hospital/app-iticket" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">Cek Aktivitas</a></p></div></body></html>';

require 'class/class.phpmailer.php';
$mail = new PHPMailer;
  $mail->IsSMTP();                //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "adm.rskghabibie@gmail.com";
  $mail->Password = "@10Rskghabibie";       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = $_POST['email_user'];         //Sets the From email address for the message
  $mail->FromName = ('ITicket RS. Khusus Ginjal Ny. R.A. Habibie');     //Sets the From name of the message
  $mail->AddAddress($_POST['admin_assign']);   //Adds a "To" address
  $mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);              //Sets message type to HTML
  $mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
  $mail->Subject = ('ITicket Delete');       //Sets the Subject of the message
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
  <title>ITicket - Create Ticket</title>
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

  .responsive img {
    max-width:100%;
    /*width:100%;*/
    height: auto;
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
            <h2 class="pageheader-title">Create Ticket Page</h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create Ticket Page</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- MODAL ADD SOFTWARE -->
      <div class="modal fade" id="modal-add-software">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <label class="modal-title">Create Ticket Software Problem</label>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="col-sm-12">
                  <p align="justify" style="color: red">Lampiran Diharapakan untuk diupload, agar kami dapat melakukan validasi terhadap masalah yang diinput ke sistem, untuk mendukung penyelesaian masalah lebih cepat. File bisa diupload dengan berbagai format dan batas Max file <u>2000KB</u></p>
                  <div class="form-group">
                    <label>Lampirkan Bukti Jika Ada</label>
                    <br>
                    <input type="file" name="proof">
                    <br>
                    <small><b>File Maximal 2MB</b></small>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>No Ticket</label>
                      <input type="text" class="form-control" name="no_tick" value="ITRSKGSW<?php echo kdauto("tb_ticket",""); ?>" readonly>
                      <input type="hidden" class="form-control" name="id_tick">
                      <input type="hidden" class="form-control" name="trouble" value="Software">
                      <input type="hidden" class="form-control" name="admin_assign" value="amranrskg@gmail.com">
                      <input type="hidden" class="form-control" name="email_user" value="<?php echo $data['email']; ?>">
                      <input type="hidden" class="form-control" name="req_by" value="<?php echo $data['full_name']; ?>">
                      <input type="hidden" class="form-control" name="assign_to" value="Muhammad Amran">
                      <input type="hidden" class="form-control" name="progress" value="New">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Bagian/Unit/Instalasi<font style="color: red">*</font></label>
                      <input type="text" class="form-control" name="unit" value="<?php echo $data['unit']; ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Tanggal Permintaan<font style="color: red">*</font></label>
                      <input type="text" class="form-control" name="req_date" value="<?php echo date('Y-m-d H:i:sa'); ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Tanggal Terakhir<font style="color: red">*</font></label>
                      <input type="datetime-local" class="form-control" name="due_date" value="<?php echo date('Y-m-d'); ?>" required="required">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Pilih Perangkat Utama<font style="color: red">*</font></label>
                      <select name="id_perangkat" class="form-control" required="required">
                          <option value="">-- Pilih Perangkat Utama --</option>
                          <?php
                          //Membuat coneksi ke database 
                          $con = mysqli_connect("localhost",'root',"","rskg_ticket");
                          if (!$con){
                            die("coneksi database gagal:".mysqli_connect_error());
                          }
                          
                          //Perintah sql untuk menampilkan semua data pada tabel department
                          $sql="SELECT * FROM tb_perangkat";

                          $hasil=mysqli_query($con,$sql);
                          $no=0;
                          while ($xyz = mysqli_fetch_array($hasil)) {
                          $no++;
                          ?>
                          <option value="<?php echo $xyz['id_perangkat'];?>"><?php echo $xyz['kode_unit'];?><?php echo $xyz['no_perangkat'];?></option>
                          <?php 
                          }
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Status Summary<font style="color: red">*</font></label>
                      <select class="form-control" name="summary" required="required">
                        <option value="">-- Select Summary --</option>
                        <option value="Perbaikan">Perbaikan</option>
                        <option value="Permintaan">Permintaan</option>
                        <option value="Pemberitahuan">Pemberitahuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Perihal/Subject<font style="color: red">*</font></label>
                      <input type="text" class="form-control" name="subject" placeholder="Perihal/Subject ..." required="required">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Status Prioritas<font style="color: red">*</font></label>
                      <select class="form-control" name="priority" required="required">
                        <option value="">-- Select Priority --</option>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Detail Masalah<font style="color: red">*</font></label>
                      <textarea class="form-control" rows="3" name="detail" placeholder="Detail Masalah ..." required="required"></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>URL</label>
                      <br><small>Jika ada</small>
                      <input type="text" class="form-control" name="url" placeholder="URL ...">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <button type="submit" name="submitsoftware" class="btn btn-block btn-dark">Submit</button>
                  <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- END MODAL ADD SOFTWARE -->
      <!-- MODAL ADD HARDWARE -->
      <div class="modal fade" id="modal-add-hardware">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <label class="modal-title">Create Ticket Hardware & Network Problem</label>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="col-sm-12">
                  <p align="justify" style="color: red">Lampiran Diharapakan untuk diupload, agar kami dapat melakukan validasi terhadap masalah yang diinput ke sistem, untuk mendukung penyelesaian masalah lebih cepat. File bisa diupload dengan berbagai format dan batas Max file <u>2000KB</u></p>
                  <div class="form-group">
                    <label>Lampirkan Bukti Jika Ada</label>
                    <br>
                    <input type="file" name="proof">
                    <br>
                    <small><b>File Maximal 2MB</b></small>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>No Ticket</label>
                      <input type="text" class="form-control" name="no_tick" value="ITRSKGHW<?php echo kdauto("tb_ticket",""); ?>" readonly>
                      <input type="hidden" class="form-control" name="id_tick">
                      <input type="hidden" class="form-control" name="trouble" value="Hardware">
                      <!-- <input type="hidden" class="form-control" name="admin_assign" value="6436a.40261@gmail.com"> -->
                      <input type="hidden" class="form-control" name="admin_assign" value="amranmhd10@gmail.com">
                      <input type="hidden" class="form-control" name="email_user" value="<?php echo $data['email']; ?>">
                      <input type="hidden" class="form-control" name="req_by" value="<?php echo $data['full_name']; ?>">
                      <input type="hidden" class="form-control" name="assign_to" value="Ari Rifan">
                      <input type="hidden" class="form-control" name="progress" value="New">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Bagian/Unit/Instalasi<font style="color: red">*</font></label>
                      <input type="text" class="form-control" name="unit" value="<?php echo $data['unit']; ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Tanggal Permintaan<font style="color: red">*</font></label>
                      <input type="text" class="form-control" name="req_date" value="<?php echo date('Y-m-d H:i:sa'); ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Tanggal Terakhir<font style="color: red">*</font></label>
                      <input type="datetime-local" class="form-control" name="due_date" value="<?php echo date('Y-m-d'); ?>" required="required">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Pilih Perangkat Utama<font style="color: red">*</font></label>
                      <select name="id_perangkat" class="form-control" required="required">
                          <option value="">-- Pilih Perangkat Utama --</option>
                          <?php
                          //Membuat coneksi ke database 
                          $con = mysqli_connect("localhost",'root',"","rskg_ticket");
                          if (!$con){
                            die("coneksi database gagal:".mysqli_connect_error());
                          }
                          
                          //Perintah sql untuk menampilkan semua data pada tabel department
                          $sql="SELECT * FROM tb_perangkat";

                          $hasil=mysqli_query($con,$sql);
                          $no=0;
                          while ($abc = mysqli_fetch_array($hasil)) {
                          $no++;
                          ?>
                          <option value="<?php echo $abc['id_perangkat'];?>"><?php echo $abc['kode_unit'];?><?php echo $abc['no_perangkat'];?></option>
                          <?php 
                          }
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Status Summary<font style="color: red">*</font></label>
                      <select class="form-control" name="summary" required="required">
                        <option value="">-- Select Summary --</option>
                        <option value="Perbaikan">Perbaikan</option>
                        <option value="Permintaan">Permintaan</option>
                        <option value="Pemberitahuan">Pemberitahuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Perihal/Subject<font style="color: red">*</font></label>
                      <input type="text" class="form-control" name="subject" placeholder="Perihal/Subject ..." required="required">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Status Prioritas<font style="color: red">*</font></label>
                      <select class="form-control" name="priority" required="required">
                        <option value="">-- Select Priority --</option>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Detail Masalah<font style="color: red">*</font></label>
                      <textarea class="form-control" rows="3" name="detail" placeholder="Detail Masalah ..." required="required"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <button type="submit" name="submithardware" class="btn btn-block btn-dark">Submit</button>
                  <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- END MODAL ADD HARDWARE -->
      <!-- MODAL ADD PRINTER -->
      <div class="modal fade" id="modal-add-printer">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <label class="modal-title">Create Ticket Printer Problem</label>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="col-sm-12">
                  <p align="justify" style="color: red">Lampiran Diharapakan untuk diupload, agar kami dapat melakukan validasi terhadap masalah yang diinput ke sistem, untuk mendukung penyelesaian masalah lebih cepat. File bisa diupload dengan berbagai format dan batas Max file <u>2000KB</u></p>
                  <div class="form-group">
                    <label>Lampirkan Bukti Jika Ada</label>
                    <br>
                    <input type="file" name="proof">
                    <br>
                    <small><b>File Maximal 2MB</b></small>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>No Ticket</label>
                      <input type="text" class="form-control" name="no_tick" value="ITRSKGPR<?php echo kdauto("tb_ticket",""); ?>" readonly>
                      <input type="hidden" class="form-control" name="id_tick">
                      <input type="hidden" class="form-control" name="trouble" value="Printer">
                      <!-- <input type="hidden" class="form-control" name="admin_assign" value="eurapermanarskg@gmail.com"> -->
                      <input type="hidden" class="form-control" name="admin_assign" value="amranhakimsiregar@gmail.com">
                      <input type="hidden" class="form-control" name="email_user" value="<?php echo $data['email']; ?>">
                      <input type="hidden" class="form-control" name="req_by" value="<?php echo $data['full_name']; ?>">
                      <input type="hidden" class="form-control" name="assign_to" value="Yura Permana">
                      <input type="hidden" class="form-control" name="progress" value="New">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Bagian/Unit/Instalasi<font style="color: red">*</font></label>
                      <input type="text" class="form-control" name="unit" value="<?php echo $data['unit']; ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Tanggal Permintaan<font style="color: red">*</font></label>
                      <input type="text" class="form-control" name="req_date" value="<?php echo date('Y-m-d H:i:sa'); ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Tanggal Terakhir<font style="color: red">*</font></label>
                      <input type="datetime-local" class="form-control" name="due_date" value="<?php echo date('Y-m-d'); ?>" required="required">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Status Summary<font style="color: red">*</font></label>
                      <select class="form-control" name="summary" required="required">
                        <option value="">-- Select Summary --</option>
                        <option value="Perbaikan">Perbaikan</option>
                        <option value="Permintaan">Permintaan</option>
                        <option value="Pemberitahuan">Pemberitahuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Perihal/Subject<font style="color: red">*</font></label>
                      <input type="text" class="form-control" name="subject" placeholder="Perihal/Subject ..." required="required">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Status Prioritas<font style="color: red">*</font></label>
                      <select class="form-control" name="priority" required="required">
                        <option value="">-- Select Priority --</option>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Detail Masalah<font style="color: red">*</font></label>
                      <textarea class="form-control" rows="3" name="detail" placeholder="Detail Masalah ..." required="required"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <button type="submit" name="submitprinter" class="btn btn-block btn-dark">Submit</button>
                  <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- END MODAL ADD PRINTER -->
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header pills-regular">
              <ul class="nav nav-pills card-header-pills" id="myTab2" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="card-pills-1" data-toggle="tab" href="#card-pill-1" role="tab" aria-controls="card-1" aria-selected="true">Panduan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="card-pills-2" data-toggle="tab" href="#card-pill-2" role="tab" aria-controls="card-2" aria-selected="false">Tentang Software</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="card-pills-3" data-toggle="tab" href="#card-pill-3" role="tab" aria-controls="card-3" aria-selected="false">Tentang Hardware & Network</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="card-pills-4" data-toggle="tab" href="#card-pill-4" role="tab" aria-controls="card-3" aria-selected="false">Tentang Printer</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="myTabContent2">
                <div class="tab-pane fade show active" id="card-pill-1" role="tabpanel" aria-labelledby="card-tab-1">
                  <div class="row">
                    <div class="col-md-6">
                      <p><h2>Panduan Aplikasi <span class="responsive"><img src="assets/images/logo/logo.png" width="100px"></span></h2></p>
                      <p>
                        Aplikasi <img src="assets/images/logo/logo.png" width="50px"> merupakan platform untuk melakukan 3 transasksi yaitu:
                        <ul>
                          <li>Perbaikan (Software, Hardware dan Printer)</li>
                          <li>Permintaan (Perangakat Komputer, Pembuatan Aplikasi)</li>
                          <li>Pemberitahuan (Informasi Update Versi Terbaru <font style="font-size: 10px">Contoh: SISMADAK Harus di Upgrade ke versi terbaru v- x.x.x.</font>)</li>
                        </ul>
                        Dari 3 Transaksi diatas, diharapkan melampirkan, berupa:
                        <ul>
                          <li>Foto/Screenshot</li>
                          <li>Upload File</li>
                          <li>dsb.</li>
                        </ul>
                        Petugas akan melakukan pengecekan dari laporan yang diinput oleh pengguna untuk ditinjak lanjuti sesuai dengan permintaan dari pengguna.
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p>
                        Prioritas Tindakan pada Aplikasi <img src="assets/images/logo/logo.png" width="50px"> dibagi menjadi 3 level, yaitu:
                        <ul>
                          <li>High</li>
                          <li>Medium</li>
                          <li>Low</li>
                        </ul>
                        Dari 3 level diatas, petugas akan fokus pada tindakan prioritas pada level High terlebih dahulu, dengan <i>crosscheck</i> yang akan dilakuan.
                      </p>
                      <p>
                        Shorting Tindakan <img src="assets/images/logo/logo.png" width="50px"> akan dilakukan berdasarkan nomor ticket terkecil sampai dengan terbesar.
                      </p>
                      <p>
                        Status <img src="assets/images/logo/logo.png" width="50px"> dibagi menjadi 3, yaitu.
                        <ul>
                          <li><span class="badge badge-danger">New</span> (Ticket baru yang dibuat pengguna dan belum di lihat oleh petugas)</li>
                          <!-- <li><span class="badge badge-primary">Open</span> (Ticket pengguna sudah di lihat oleh petugas)</li> -->
                          <li><span class="badge badge-warning">On Progress</span> (Ticket pengguna sudah eksekusi petugas untuk diselesaikan)</li>
                          <!-- <li><span class="badge badge-success">Done</span> (Ticket pengguna sudah diselesaikan petugas)</li> -->
                          <li><span class="badge badge-info">Done</span> (Ticket pengguna sudah selesai/ditutup/non-aktif)</li>
                        </ul>
                      </p>
                      <p><i><font style="color: red">Note : Setiap transaksi yang terjadi pada aplikasi <img src="assets/images/logo/logo.png" width="50px"> akan memiliki notifikasi email (pengguna & petugas)</font></i></p>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="card-pill-2" role="tabpanel" aria-labelledby="card-tab-2">
                  <div class="row">
                    <div class="col-md-4">
                      <p>
                       <span class="responsive"><img src="assets/images/icon/sf.png" width="500px"></span>
                     </p>
                   </div>
                   <div class="col-md-8">
                    <h4><u>PIC : Muhammad Amran</u></h4>
                    <p>
                     <b>Software</b> adalah sebuah perangkat operasi kerja untuk menjalankan berbagai komponen pada hardware yang memiliki sifat maya (tidak terlihat) tetapi bermanfaat bagi user-nya.
                   </p>
                   <ul>
                    <label>Fungsi Software secara umum:</label>
                    <li>Menyediakan fungsi dasar dari sebuah komputer sehingga dapat dioperasikan. Misalnya ketersediaan sistem operasi dan sistem pendukung pada komputer.</li>
                    <li>Mengatur setiap hardware yang ada pada komputer sehingga dapat bekerja secara simultan.</li>
                    <li>Menjadi penghubung antara beberapa perangkat lunak lainnya dengan hardware yang ada pada komputer.</li>
                    <li>Perangkat lunak juga berfungsi sebagai penerjemah suatu perintah software lainnya ke dalam bahasa mesin, sehingga dapat dimengerti oleh hardware.</li>
                    <li>Software juga dapat mengidentifikasi suatu program yang ada pada sebuah komputer.</li>
                  </ul>
                  <ul>
                    <label>Software Berdasarkan Jenisnya:</label>
                    <li><b><i>Operating System</i> (Sistem Operasi)</b>, yaitu perangkat lunak yang berfungsi untuk mengelola dan mengkoordinasikan setiap komponen dan fungsi komputer. Beberapa contoh operating sistem adalah; Windows, Linux, UNIX, DOS.</li>
                    <li><b><i>Programming Language</i> (Bahasa Pemrograman)</b>, yaitu perangkat lunak yang berfungsi sebagai pemberi instruksi standar yang melibatkan sintak dan semantik yang dipakai untuk mendefinisikan suatu program aplikasi komputer (computer application program). Beberapa contoh Bahasa Pemrograman adalah; PHP, Java, Microsoft Visual Basic.</li>
                    <li><b><i>Application Program</i> (Program Aplikasi)</b>, yaitu perangkat lunak yang memiliki fungsi tertentu, misalnya software untuk presentasi, software akuntansi, dan lain sebagainya. Beberapa contoh Program Aplikasi adalah; Microsoft Office Word, Microsoft Office Excel, MYOB, OpenOffice.org, dan lainnya.</li>
                  </ul>
                  <ul>
                    <label>Perbaikan Sistem: SIMRS, SISMADAK dsb.</label>
                  </ul>
                  <ul>
                    <label>Contoh Perangkat Lunak (Software):</label>
                    <p align="center"><span class="responsive"><img src="assets/images/icon/contoh-software.jpg"></span></p>
                  </ul>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="card-pill-3" role="tabpanel" aria-labelledby="card-tab-3">
              <div class="row">
                <div class="col-md-4">
                  <p>
                   <span class="responsive"><img src="assets/images/icon/hw.png" width="500px"></span>
                 </p>
               </div>
               <div class="col-md-8">
                <h4><u>PIC : Ari Rifan</u></h4>
                <p><b>Hardware</b> adalah kumpulan komponen fisik yang menyusun perangkat komputer. Atau dengan bahasa lain hardware adalah  komponen komputer atau elektronik yang mempunyai bentuk fisik, yang dapat dipegang, dan berkaitan dengan sistem komputer.</p>
                <p>Hardware dibagi menjadi 3 secara garis besar yaitu input hardware, process hardware, output hardware. Hardware adalah komponen yang saling berkaitan dengan sofware dan brainware pada komputer.</p>
                <p>Apabila hardware tidak ada, maka tidak ada komputer. Untuk komputer dapat digunakan dengan normal, maka antara hardware, sotware dan brainware harus ada. Karena jika salah satunya tidak ada, maka sebuah perangkat komputer tidak dapat digunakan.</p>
                <p>Misalnya adalah sebuah komputer tidak ada monitornya maka tidak dapat menampilkan visual dari proses yang diperintahkan. Dan sebaliknya apabila semua sudah ada tetapi sistem atau software belum di instal maka tidak bisa bekerja. </p>
                <p>Misalnya adalah sebuah komputer tidak ada monitornya maka tidak dapat menampilkan visual dari proses yang diperintahkan. Dan sebaliknya apabila semua sudah ada tetapi sistem atau software belum di instal maka tidak bisa bekerja.</p>
                <ul>
                  <label>Contoh Hardware dan Fungsinya</label>
                  <li>Casing: Melindungi bagian dalam komputer (motherboard)</li>
                  <li>Power Supply: Penyedia daya untuk digunakan motherboard</li>
                  <li>Motherboard :Sebagai papan sirkuit utama yang sebagai penghubung komponen harware lainnya.</li>
                  <li>Processor: Pemroses data/otak dari komputer</li>
                  <li>RAM: Menyimpan data yang dibutuhkan CPU secara acak dan sementara. Data akan hilang jika komputer dimatikan</li>
                  <li>ROM: Memori pada komputer yang dapat menyimpan data lebih lama dibandingkan dengan RAM. ROM ini berhubungan dengan BIOS komputer</li>
                  <li>Hard Disk Drive: Perangkat penyimpan data pada komputer</li>
                  <li>DVD/ CD ROOM: Membaca dan menulis data ke media CD/DVD</li>
                  <li>Keyboard: Papan Ketik</li>
                  <li>Mouse: Sebagai penunjuk</li>
                  <li>Webcam: Mengambil dan merekan gambar</li>
                  <li>Mikrofon: Mengambil suara</li>
                  <li>Scanner: Memindah berkas</li>
                  <li>Touchpad: Sama seperti mouse, tetapi adanya di laptop saja</li>
                  <li>Trakball: Seperti mouse tapi lebih mudah dalam menggunakannya</li>
                  <li>Monitor: Menampilkan visual dari komputer ke layar monitor</li>
                  <li>Speaker: Pengeras suara</li>
                </ul>
                <ul>
                  <label>Perbaikan Sistem: Koneksi wifi, Windows/Linux Trouble dsb.</label>
                </ul>
                <ul>
                  <label>Contoh Perangkat Keras (Hardware):</label>
                  <p align="center"><span class="responsive"><img src="assets/images/icon/hw1.png"></span></p>
                </ul>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="card-pill-4" role="tabpanel" aria-labelledby="card-tab-4">
            <div class="row">
              <div class="col-md-4">
                <p>
                 <span class="responsive"><img src="assets/images/icon/printer.png" width="500px"></span>
               </p>
             </div>
             <div class="col-md-8">
              <h4><u>PIC : Yura Permana</u></h4>
              <p><b>Printer</b> adalah sebuah alat untuk mencetak. Dalam dunia komputer, printer termasuk perangkat peripheral output yang menyajikan representasi tulisan atau grafis pada sebuah kertas atau media semacamnya. Desain printer komputer pertama kali dibuat secara mekanik pada abad 19. Sedangkan printer elektronik pertama dibuat oleh Epson dengan nama EP-101, perusahaan Jepang itu merilisnya pada tahun 1968.</p>
              <ul>
                <label>Funsgi Printer</label>
                <p>Fungsi printer yang paling utama tentu saja untuk mencetak atau menyajikan data dari komputer kepada penggunanya secara langsung. Data yang dicetak ini bisa bermacam-macam, yang pertama biasanya berupa dokumen seperti surat, arsip, dan dokumen penting lainnya. Kebanyakan jenis dokumen seperti ini dibuat dengan Microsoft Office, bisa dengan Word, Excel, atau Powerpoint. Namun ada juga yang hanya menggunakan notepad sederhana.</p>
              </ul>
              <ul>
                <label>Perbaikan Sistem: Printer Error dsb.</label>
              </ul>
              <ul>
                <label>Printer Problems:</label>
                <p align="center"><span class="responsive"><img src="assets/images/icon/maxresdefault.jpg" width="400px"></span></p>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- ALERT -->
<?php include 'include/alert/success.php' ?>
<!-- END ALERT -->
<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
      <div class="card-header">
        <button class="btn btn-dark btn-flat" data-toggle="modal" data-target="#modal-add-software" title="Create Ticket"><i class="nav-icon far fa-plus-square"></i>  Software Problem
        </button>
        <button class="btn btn-dark btn-flat" data-toggle="modal" data-target="#modal-add-hardware" title="Create Ticket"><i class="nav-icon far fa-plus-square"></i>  Hardware & Network Problem
        </button>
        <button class="btn btn-dark btn-flat" data-toggle="modal" data-target="#modal-add-printer" title="Create Ticket"><i class="nav-icon far fa-plus-square"></i>  Printer Problem
        </button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered second" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>No. Ticket</th>
                <th>Request Date</th>
                <!-- <th>Due Date</th> -->
                <th>Subject</th>
                <th>Status Priority</th>
                <th>Trouble About</th>
                <th>Assign to</th>
                <th>Progress</th>
                <th>Date Respon</th>
                <th>File</th>
                <th>Remark Petugas</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $con=mysqli_connect("localhost","root","","rskg_ticket");
              if (mysqli_connect_errno())
              {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
              $datax = $_SESSION['username'];
              $result = mysqli_query($con,"SELECT * FROM tb_ticket WHERE email_user='$datax' ORDER BY no_tick ASC");

              if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result))
                {
                  echo "<tr>";
                  echo "<td>".$row['id_tick'] . "</td>";
                  echo "<td>".$row['no_tick'] . "</td>";
                  echo "<td>".$row['req_date'] . "</td>";
                  // echo "<td>".tanggal_indo($row['due_date'], true) . "</td>";
                  echo "<td>".$row['subject'] . "</td>";
                  echo "<td>".$row['priority'] . "</td>";
                  echo "<td>".$row['trouble'] . "</td>";
                  echo "<td>".$row['assign_to'] . "</td>";
                  if ($row['progress']=='New'){
                    echo "<td><span class='badge badge-danger'>New</span></td>";
                  }elseif ($row['progress']=='On Progress') {
                    echo "<td><span class='badge badge-warning'>On Progress</span></td>";
                  }elseif ($row['progress']=='Done') {
                    echo "<td><span class='badge badge-info'>Done</span></td>";
                  }
                  if ($row['date_progress']==NULL){
                    echo "<td><span class='badge badge-danger'>Belum Direspon Petugas</span></td>";
                  }else{
                    echo "<td><span class='badge badge-dark'>".$row['date_progress'] . "</span></td>";
                  }
                  if ($row['proof']==NULL){
                    echo "<td>empty</td>";
                  }else{
                    echo "<td align='center'>
                    <a href='./assets/lampiran/$row[proof]' target='_blank'><img src='assets/images/icon/unnamed.png' width='40px'></a>
                    </td>";
                  }
                  if ($row['remark_it']==NULL){
                    echo "<td>empty</td>";
                  }else{
                   echo "<td>
                   <a href='#' data-toggle='modal' data-target='#lihat$row[id_tick]' title='Delete'><span class='badge badge-primary'>Lihat Remark Petugas </span></a>
                   </td>";
                 }
                 echo "<td>
                 <a href='#' data-toggle='modal' data-target='#delete$row[id_tick]' title='Delete'><span class='badge badge-danger'><i class='fas fa-times'></i> </span></a>
                 </td>";
                 echo "</tr>";
                 ?>

                 <!-- Lihat -->
                 <div class="modal fade" id="lihat<?php echo $row['id_tick'];?>" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <label class="modal-title">Remark Petugas ITicket</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="">
                          <div class="form-group">
                            <label>Detail Ticket</label>
                            <h6>No. Ticket : <b><u><?php echo $row['no_tick'];?></u></b></h6>
                            <h6>Subject : <b><u><?php echo $row['subject'];?></u></b></h6>
                            <h6><u>Detail Masalah</u><br><p align="justify"><?php echo $row['detail'];?></p></h6>
                          </div>
                          <hr>
                          <h5 align="center">Detail Petugas ITicket</h5>
                          <hr>
                          <div class="form-group">
                            <h6><u>Remark :</u> <br><?php echo $row['remark_it'];?></h6>
                          </div> 
                          <div class="form-group">
                            <h6><u>Lampiran :</u></h6>
                            <div align="center">
                              <?php
                              if ($row['remark_file']==NULL) {
                                echo"<label>Tidak ada file</label>";
                              }else{
                                echo"<span class='responsive'><img src='assets/lampiran/$row[remark_file]'></span>";
                              }
                              ?>
                            </div>
                          </div>
                          <!-- <button type="submit" name="delete" class="btn btn-danger btn-block btn-flat">Yes</button> -->
                          <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Close</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END LIHAT -->

                <!-- DELETE -->
                <div class="modal fade" id="delete<?php echo $row['id_tick'];?>" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <label class="modal-title">Delete Ticket</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="">
                          <div class="form-group">
                            <label>Hapus Ticket?</label>
                            <h6>No. Ticket : <b><u><?php echo $row['no_tick'];?></u></b></h6>
                            <h6>Subject : <b><u><?php echo $row['subject'];?></u></b></h6>
                            <h6><u>Detail Masalah</u><br><p align="justify"><?php echo $row['detail'];?></p></h6>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Keterangan<font style="color: red">*</font></label>
                                <textarea class="form-control" rows="3" name="detail" placeholder="Keterangan ..." required="required"></textarea>
                              </div>
                            </div>
                            <input type="hidden" name="id_tick" class="form-control" value="<?php echo $row['id_tick'];?>" required>
                            <input type="hidden" name="admin_assign" class="form-control" value="<?php echo $row['admin_assign'];?>" required>
                            <input type="hidden" name="no_tick" class="form-control" value="<?php echo $row['no_tick'];?>" required>
                            <input type="hidden" name="priority" class="form-control" value="<?php echo $row['priority'];?>" required>
                            <input type="hidden" name="progress" class="form-control" value="<?php echo $row['progress'];?>" required>
                            <input type="hidden" name="req_by" class="form-control" value="<?php echo $row['req_by'];?>" required>
                            <input type="hidden" name="unit" class="form-control" value="<?php echo $row['unit'];?>" required>
                            <input type="hidden" name="assign_to" class="form-control" value="<?php echo $row['assign_to'];?>" required>
                          </div>
                          <button type="submit" name="delete" class="btn btn-danger btn-block btn-flat">Yes</button>
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
                <th>#</th>
                <th>No. Ticket</th>
                <th>Request Date</th>
                <!-- <th>Due Date</th> -->
                <th>Subject</th>
                <th>Status Priority</th>
                <th>Trouble About</th>
                <th>Assign to</th>
                <th>Progress</th>
                <th>Date Respon</th>
                <th>File</th>
                <th>Remark Petugas</th>
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