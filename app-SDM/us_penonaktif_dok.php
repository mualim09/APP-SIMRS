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
    $angka=0;
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

// ADD PENONAKTIFAN
if(isset($_POST["submit"]))    
{    
  $id_peru              = $_POST['id_peru'];
  $kode                 = $_POST['kode'];
  $pemohon              = $_POST['pemohon'];
  $bagian               = $_POST['bagian'];
  $tanggal              = $_POST['tanggal'];
  $date_ppd             = $_POST['date_ppd'];
  $non_dokumen          = $_POST['non_dokumen'];
  $non_judul            = $_POST['non_judul'];
  $non_no_dok           = $_POST['non_no_dok'];
  $non_status_revisi    = $_POST['non_status_revisi'];
  $non_alasan           = $_POST['non_alasan'];
  $username             = $_POST['username'];
  $dokumen              = $_POST['dokumen'];
  $status_pengecekan    = $_POST['status_pengecekan'];

  $nama = $_FILES['upload_lam']['name'];
  $file_tmp = $_FILES['upload_lam']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/penonaktifan/user/'.$nama);

  $query = mysql_query("INSERT INTO tb_ppd 
    (id_peru,kode,pemohon,bagian,tanggal,date_ppd,non_dokumen,non_judul,non_no_dok,non_status_revisi,non_alasan,username,dokumen,status_pengecekan,upload_lam)
    VALUES 
    ('','$kode','$pemohon','$bagian','$tanggal','$date_ppd','$non_dokumen','$non_judul','$non_no_dok','$non_status_revisi','$non_alasan','$username','$dokumen','$status_pengecekan','$nama')
    "); 

  $query .= mysql_query("INSERT INTO tb_ppd_his 
    (id_his,his_id_peru,his_kode,his_pemohon,his_bagian,his_tanggal,his_date_ppd,his_non_dokumen,his_non_judul,his_non_no_dok,his_non_status_revisi,his_non_alasan,his_username,his_dokumen,his_status_pengecekan,his_upload_lam)
    VALUES 
    ('','$id_peru','$kode','$pemohon','$bagian','$tanggal','$date_ppd','$non_dokumen','$non_judul','$non_no_dok','$non_status_revisi','$non_alasan','$username','$dokumen','$status_pengecekan','$nama')
    "); 
  if ($query) { header("Location: ./us_penonaktif_dok.php?ntf=1");   
} else {
  header("Location: ./us_penonaktif_dok.php?ntf=6"); 
} 
}

// EDIT
if(isset($_POST["update"]))    
{    
  $id_peru            = $_POST['id_peru'];
  $pemohon            = $_POST['pemohon'];
  $bagian             = $_POST['bagian'];
  $tanggal            = $_POST['tanggal'];
  $non_dokumen        = $_POST['non_dokumen'];
  $non_judul          = $_POST['non_judul'];
  $non_no_dok         = $_POST['non_no_dok'];
  $non_status_revisi  = $_POST['non_status_revisi'];
  $non_alasan         = $_POST['non_alasan'];

  $query = mysql_query("UPDATE tb_ppd SET 
    pemohon ='$pemohon',
    bagian = '$bagian',
    tanggal = '$tanggal',
    non_dokumen = '$non_dokumen',
    non_judul = '$non_judul',
    non_no_dok = '$non_no_dok',
    non_status_revisi = '$non_status_revisi',
    non_alasan = '$non_alasan'
    WHERE id_peru ='$id_peru'");

  $query .= mysql_query("UPDATE tb_ppd_his SET 
    his_pemohon ='$pemohon',
    his_bagian = '$bagian',
    his_tanggal = '$tanggal',
    his_non_dokumen = '$non_dokumen',
    his_non_judul = '$non_judul',
    his_non_no_dok = '$non_no_dok',
    his_non_status_revisi = '$non_status_revisi',
    his_non_alasan = '$non_alasan'
    WHERE id_his ='$id_peru'");

  if($query){
    header("Location: ./us_penonaktif_dok.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// TAMBAH LAMPIRAN
if(isset($_POST["uploadlampiran"]))    
{    
  $id_peru                 = $_POST['id_peru'];
  $status_pengecekan       = $_POST['status_pengecekan'];

  $nama = $_FILES['upload_lam']['name'];
  $file_tmp = $_FILES['upload_lam']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/penonaktifan/user/'.$nama);

  $query = mysql_query("UPDATE tb_ppd SET 
    upload_lam = '$nama',
    status_pengecekan = '$status_pengecekan'
    WHERE id_peru ='$id_peru'");

  $query .= mysql_query("UPDATE tb_ppd_his SET 
    his_upload_lam = '$nama',
    his_status_pengecekan = '$status_pengecekan'
    WHERE id_his = '$id_peru'");
  if($query){
    header("Location: ./us_penonaktif_dok.php?ntf=5");                                                  
  } else {
    header("Location: ./us_penonaktif_dok.php?ntf=6");  
  }
} 

// DELETE
if(isset($_POST["delete"]))    
{    
  $id_peru     = $_POST['id_peru'];
  $hapus       = $_POST['hapus'];
  $date_hapus  = $_POST['date_hapus'];

  $query = mysql_query("UPDATE tb_ppd SET 
    hapus = '$hapus',
    date_hapus = '$date_hapus'
    WHERE id_peru ='$id_peru'");

  $query .= mysql_query("UPDATE tb_ppd_his SET 
    his_hapus = '$hapus',
    his_date_hapus = '$date_hapus'
    WHERE id_his = '$id_peru'");
  if($query){
    header("Location: ./us_penonaktif_dok.php?ntf=3");                                                  
  } else {
    header("Location: ./us_penonaktif_dok.php?ntf=6");  
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
  <title>SIMDO | Pe-Non Aktifan Dokumen</title>
  <link rel="icon" type="assets/image/png" href="assets/images/simdo/favicon.png"/>
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
            <h2 class="pageheader-title">Form Pe-Non Aktifan Dokumen</h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Form</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form Pe-Non Aktifan Dokumen</li>
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
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <br>
          <div class="row">
            <div class="col-lg-12" align="center">
             <img src="assets/images/header.png" width="80px" align="center">
             <br>
             <h4>Form Pe-Non Aktifan Dokumen</h4>
           </div>
         </div>
         <form action="" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Kode</label>
                  <input type="text" class="form-control" name="kode" value="DOKNON<?php echo kdauto("tb_ppd",""); ?>" readonly>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Pemohon</label>
                  <input type="text" class="form-control" name="pemohon" value="<?php echo $data['full_name']; ?>" readonly>
                  <input type="hidden" class="form-control" name="username" value="<?php echo $data['username']; ?>" readonly>
                  <input type="hidden" class="form-control" name="id_peru">
                  <input type="hidden" class="form-control" name="dokumen" value="Nonaktif">
                  <input type="hidden" class="form-control" name="date_ppd" value="<?php echo date('Y-m-d H:i:sa'); ?>">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Bagian/Instalasi/Komite<font style="color: red">*</font></label>
                  <select name="bagian" class="form-control" required="required">
                    <option value="">-- Pilih Bagian/Instalasi/Komite --</option>
                    <?php
                    //Membuat coneksi ke database 
                    $con = mysqli_connect("localhost",'root',"","rskg_akreditasi");
                    if (!$con){
                      die("coneksi database gagal:".mysqli_connect_error());
                    }
                    $sql="SELECT * FROM tb_bagian";

                    $hasil=mysqli_query($con,$sql);
                    $no=0;
                    while ($row = mysqli_fetch_array($hasil)) {
                      $no++;
                      ?>
                      <option value="<?php echo $row['nama_bg'];?>"><?php echo $row['nama_bg'];?></option>
                      <?php 
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Tanggal<font style="color: red">*</font></label>
                  <input type="date" class="form-control" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required="required">
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
             <div class="col-sm-12" align="center" style="background-color: #c1c1c1; border-color: black">
              <br>
              <h4 style="color: black"><b>Usulan Pe-Non Aktifan (<i>OBSOLETE</i>) Dokumen</b></h4>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Dokumen<font style="color: red">*</font></label>
                <input type="text" class="form-control" name="non_dokumen" placeholder="Dokumen ..." required="required">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Judul<font style="color: red">*</font></label>
                <input type="text" class="form-control" name="non_judul" placeholder="Judul ..." required="required">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>No. Dokumen<font style="color: red">*</font></label>
                <input type="text" class="form-control" name="non_no_dok" placeholder="No. Dokumen ..." required="required">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Status Revisi<font style="color: red">*</font></label>
                <input type="text" class="form-control" name="non_status_revisi" placeholder="Status Revisi ..." required="required">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Alasan Penonaktifan<font style="color: red">*</font></label>
                <textarea class="form-control" name="non_alasan" placeholder="Alasan Penonaktifan ..." required="required"></textarea>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Lampirkan File<font style="color: red">*</font></label>
                <input type="file" class="form-control" name="upload_lam" required="required">
                <input type="hidden" class="form-control" name="status_pengecekan" value="New">
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-block btn-primary">Kirim</button>
            <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
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
<!-- TABEL PEMBUATAN -->
<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
      <div class="card-header">
        <button class="btn bg-primary" data-toggle="modal" data-target="#modal-add" title="Tambah Nota Intern"><i class="nav-icon far fa-plus-square"></i> Pe-Non Aktifan Dokumen
        </button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered second" style="width:100%">
            <thead align="center">
              <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Detail Dokumen</th>
                <th>Tanggal Non-Aktif</th>
                <th>Remark</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $con=mysqli_connect("localhost","root","","rskg_akreditasi");
              if (mysqli_connect_errno())
              {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
              $datax = $_SESSION['username'];
              $result = mysqli_query($con,"SELECT * FROM tb_ppd WHERE username='$datax' AND dokumen='Nonaktif' AND publish is NULL AND hapus is NULL ORDER BY id_peru DESC");

              if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result))
                {
                  echo "<tr align='center'>";
                  echo "<td>".$row['id_peru'] . "</td>";
                  echo "<td>".$row['kode'] . "</td>";
                  if ($row['pemohon']==NULL) {
                    echo "<td>Tidak Memiliki Isi Dokumen</td>";
                  }else{
                    echo "<td align='center'>
                    <a href='#' data-toggle='modal' data-target='#lihatdok$row[id_peru]' title='Lihat Detail Dokumen'><button class='btn btn-dark btn-sm'>Lihat</button></a>
                    </td>";
                  }
                  if ($row['non_tgl']==NULL) {
                   echo "<td>
                   <a href='#' data-toggle='modal' data-target='#updatenodok$row[id_peru]' title='Input No. Dokumen'><span class='btn btn-dark btn-sm'><i class='fa fas fa-hourglass' title='Belum Respon Petugas'></i></span></a>
                   </td>";
                 }else{
                  echo "<td><small>Dokumen ini telah di non-aktifkan pada tanggal</small><br>".tanggal_indo($row['non_tgl'], true) . "</td>";
                }
                if ($row['non_tgl']==NULL) {
                  echo "<td>
                  <a href='#' data-toggle='modal' data-target='#edit$row[id_peru]' title='Update Data'><span class='badge badge-dark'><i class='fa fa-edit'></i> </span></a>
                  <a href='#' data-toggle='modal' data-target='#delete$row[id_peru]' title='Hapus Penonaktifan Dokumen'><span class='badge badge-dark'><i class='fa fas fa-times'></i> </span></a>
                  </td>";
                }else{
                  echo "<td><small>Dokumen Sudah Disetujui Di Nonaktif</small></td>";
                }
                echo "</tr>";
                ?>

                <!-- LIHAT DOKUMEN -->
                <div class="modal fade" id="lihatdok<?php echo $row['id_peru'];?>" role="dialog">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Detail Dokumen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <h5><b>Kode :</b> <?php echo $row['kode'];?></h5>
                                <h5><b>Pemohon :</b> <?php echo $row['pemohon'];?></h5>
                                <h5><b>Bagian :</b> <?php echo $row['bagian'];?></h5>
                                <h5><b>Tanggal :</b> <?php echo tanggal_indo($row['tanggal'], true) ?></h5>
                                <h5><b>Dokumen :</b> <?php echo $row['non_dokumen'];?></h5>
                                <h5><b>Judul :</b> <?php echo $row['non_judul'];?></h5>
                                <h5><b>No. Dokumen :</b> 
                                  <?php
                                  if ($row['non_no_dok']==NULL) {
                                    echo "<i>Belum Memiliki No. Dokumen</i>";
                                  }
                                  echo $row['non_no_dok'];
                                  ?>
                                </h5>
                                <h5><b>Tanggal Penonaktifan :</b> 
                                  <?php
                                  if ($row['non_tgl']==NULL) {
                                    echo "<i>Belum Di Nonaktifkan Oleh Petugas</i>";
                                  }
                                  echo $row['non_tgl'];
                                  ?>
                                </h5>
                                <hr>
                                <div align="center">
                                  <h5>Dokumen Yang Akan Di Non-Aktifkan</h5>
                                </div>
                                <?php
                                if ($row['upload_lam']==NULL){
                                  echo "<td>empty</td>";
                                }else{
                                  echo "
                                  <div align='center'>
                                  <a href='./assets/file/penonaktifan/user/$row[upload_lam]' target='_blank'><img src='assets/images/icon/file.png' width='90px'></a>
                                  </div>
                                  ";
                                }
                                ?>
                              </div>
                              <label><b><font style="color: black">Status Revisi :</font></b></label> <button class="btn btn-warning btn-sm"><?php echo $row['non_status_revisi'];?></button>
                              <h5><b>Alasan Penonaktifan :</b></h5>
                              <textarea class="form-control" readonly="readonly"><?php echo $row['non_alasan']; ?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END LIHAT DOKUMEN -->

                <!-- UPDATE -->
                <div class="modal fade" id="edit<?php echo $row['id_peru'];?>" role="dialog">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Update Penonaktifan Dokumen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Kode</label>
                                <input type="text" class="form-control" name="kode" value="DOKNON<?php echo kdauto("tb_ppd",""); ?>" readonly>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Pemohon</label>
                                <input type="hidden" class="form-control" name="id_peru" value="<?php echo $row['id_peru']; ?>">
                                <input type="text" class="form-control" name="pemohon" value="<?php echo $data['full_name']; ?>" readonly>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Bagian/Instalasi/Komite</label>
                                <input type="text" class="form-control" name="bagian" value="<?php echo $row['bagian']; ?>">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required="required">
                              </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                           <div class="col-sm-12" align="center" style="background-color: #c1c1c1; border-color: black">
                            <br>
                            <h4 style="color: black"><b>Usulan Pe-Non Aktifan (<i>OBSOLETE</i>) Dokumen</b></h4>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Dokumen</label>
                              <input type="text" class="form-control" name="non_dokumen" value="<?php echo $row['non_dokumen']; ?>" required="required">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Judul</label>
                              <input type="text" class="form-control" name="non_judul" value="<?php echo $row['non_judul']; ?>" required="required">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>No. Dokumen</label>
                              <input type="text" class="form-control" name="non_no_dok" value="<?php echo $row['non_no_dok']; ?>" required="required">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Status Revisi</label>
                              <input type="text" class="form-control" name="non_status_revisi" value="<?php echo $row['non_status_revisi']; ?>" required="required">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Alasan Penonaktifan</label>
                              <textarea class="form-control" name="non_alasan" placeholder="Alasan Penonaktifan ..." required="required"><?php echo $row['non_alasan']; ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <button type="submit" name="update" class="btn btn-block btn-primary">Update</button>
                          <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- END UPDATE -->

              <!-- DELETE -->
              <div class="modal fade" id="delete<?php echo $row['id_peru'];?>" role="dialog">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Hapus Dokumen</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="" method="POST">
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <div align="center">
                                <img src="assets/images/icon/delete.png" width="100px">
                                <p>Anda yakin akan menghapus data ini?</p>
                                <hr>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input type="hidden" class="form-control" name="id_peru" value="<?php echo $row['id_peru']; ?>">
                              <input type="hidden" class="form-control" name="hapus" value="Hapus">
                              <input type="hidden" class="form-control" name="date_hapus" value="<?php echo date('Y-m-d H:i:sa'); ?>">
                              <h5><b>Kode :</b> <?php echo $row['kode'];?></h5>
                              <h5><b>Pemohon :</b> <?php echo $row['pemohon'];?></h5>
                              <h5><b>Bagian :</b> <?php echo $row['bagian'];?></h5>
                              <h5><b>Tanggal :</b> <?php echo tanggal_indo($row['tanggal'], true) ?></h5>
                              <h5><b>Dokumen :</b> <?php echo $row['non_dokumen'];?></h5>
                              <h5><b>Judul :</b> <?php echo $row['non_judul'];?></h5>
                              <h5><b>No. Dokumen :</b> 
                                <?php
                                if ($row['non_no_dok']==NULL) {
                                  echo "<i>Belum Memiliki No. Dokumen</i>";
                                }
                                echo $row['non_no_dok'];
                                ?>
                              </h5>
                              <h5><b>Tanggal Penonaktifan :</b> 
                                <?php
                                if ($row['non_tgl']==NULL) {
                                  echo "<i>Belum Di Nonaktifkan Oleh Petugas</i>";
                                }
                                echo $row['non_tgl'];
                                ?>
                              </h5>
                              <hr>
                              <div align="center">
                                <h5>Dokumen Yang Akan Di Non-Aktifkan</h5>
                              </div>
                              <?php
                              if ($row['upload_lam']==NULL){
                                echo "<td>empty</td>";
                              }else{
                                echo "
                                <div align='center'>
                                <a href='./assets/file/penonaktifan/user/$row[upload_lam]' target='_blank'><img src='assets/images/icon/file.png' width='90px'></a>
                                </div>
                                ";
                              }
                              ?>
                            </div>
                            <label><b><font style="color: black">Status Revisi :</font></b></label> <button class="btn btn-warning btn-sm"><?php echo $row['non_status_revisi'];?></button>
                            <h5><b>Alasan Penonaktifan :</b></h5>
                            <textarea class="form-control" readonly="readonly"><?php echo $row['non_alasan']; ?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <button type="submit" name="delete" class="btn btn-danger btn-block btn-flat">Hapus</button>
                          <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Tutup</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- END DELETE -->
            <?php } } mysqli_close($con); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<!-- TABEL REVISI -->

</div>
<?php include "include/footer.php" ?>
<?php include 'include/thirdparty.php'; ?>
</body>
</html>