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
              <h1 class="m-0 text-dark">Pengaturan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Pengaturan</a></li>
                <li class="breadcrumb-item active">SIRS RT</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- ISI -->
      <section class="content">
        <div class="container-fluid">

          <!-- ALERT -->
          <?php include 'include/alert/success.php' ?>
          <!-- END ALERT -->

        </div>
      </section>
      <!-- END ISI -->
    </div>
  </div>
  <?php include 'include/footer.php'; ?>
  <?php include 'include/jsfile.php'; ?>
</body>
</html>
