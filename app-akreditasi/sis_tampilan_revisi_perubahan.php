<?php 
include "include/connection.php";
$id_peru  = $_GET['id'];
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

// UPDATE
if(isset($_POST["update"]))    
{    
  $id_revisi          = $_POST['id_revisi'];
  $balasan            = $_POST['balasan'];

  $nama = $_FILES['file_revisi']['name'];
  $file_tmp = $_FILES['file_revisi']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/perubahan/admin/revisi/'.$nama);

  $query = mysql_query("UPDATE tb_revisi SET 
    balasan ='$balasan',
    file_revisi = '$nama'
    WHERE id_revisi ='$id_revisi'");

  if($query){
    header("Location: ./tampilan_revisi.php?id=$id_peru");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    $con=mysqli_connect("localhost","root","","rskg_akreditasi");
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $result = mysqli_query($con,"SELECT * FROM tb_ppd WHERE id_peru='$id_peru' ORDER BY id_peru DESC");

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result))
        {
    ?>
    <title>SIMDO Revisi | Kode:<?php echo $row['kode']; ?></title>
    <?php } }  mysqli_close($con); ?>
    <link rel="icon" type="assets/image/png" href="assets/images/logo/logo.png"/>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <!-- CKEDITOR -->
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
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
    <?php include 'include/sidebar.php'; ?>
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                       <h2 class="pageheader-title">Revisi Dokumen </h2>
                       <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                       <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Revisi Dokumen</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-danger">TOTAL REVISI 
                            <?php
                            $con=mysqli_connect("localhost","root","","rskg_akreditasi");
                            if (mysqli_connect_errno())
                            {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            }
                            $datax = $_SESSION['username'];
                            $result = mysqli_query($con,"SELECT COUNT(*) AS total FROM tb_revisi WHERE id_peru='$id_peru'");

                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_array($result))
                                {
                            echo "<h2 class='mb-0'><font style='color: white;'>".$row['total'] . "</font></h2>";
                            ?>
                                                    
                            <?php } } mysqli_close($con); ?>

                        </button>
                    </div>
                    <div class="card-body">
                        <?php
                        $con=mysqli_connect("localhost","root","","rskg_akreditasi");
                        if (mysqli_connect_errno())
                        {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
                        $result = mysqli_query($con,"SELECT * FROM tb_ppd WHERE id_peru='$id_peru' ORDER BY id_peru DESC");

                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result))
                            {
                        ?>
                        <div class="row">
                            <div class="col-sm-12">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <h5><b>Kode :</b> <?php echo $row['kode'];?></h5>
                                  <h5><b>Pemohon :</b> <?php echo $row['pemohon'];?></h5>
                                  <h5><b>Bagian :</b> <?php echo $row['bagian'];?></h5>
                                  <h5><b>Tanggal :</b> <?php echo tanggal_indo($row['tanggal'], true) ?></h5>
                                  <h5><b>Dokumen :</b> <?php echo $row['peru_dokumen'];?></h5>
                                  <h5><b>Judul :</b> <?php echo $row['peru_judul'];?></h5>
                                  <h5><b>No. Dokumen :</b> 
                                    <?php
                                    if ($row['peru_no_dok']==NULL) {
                                      echo "<i>Belum Memiliki No. Dokumen</i>";
                                    }
                                    echo $row['peru_no_dok'];
                                    ?>
                                  </h5>
                                  <h5><b>Tanggal Berlaku :</b> 
                                    <?php
                                    if ($row['peru_tgl_berlaku']==NULL) {
                                      echo "<i>Belum Memiliki Tanggal Berlaku</i>";
                                    }
                                    echo $row['peru_tgl_berlaku'];
                                    ?>
                                  </h5>
                                  <input type="hidden" name="id_peru" class="form-control" placeholder="client name" value="<?php echo $row['id_peru'];?>" required>
                                  <input type="hidden" name="status_pengecekan" class="form-control" value="Revisi" required>
                                  <input type="hidden" name="oleh" class="form-control" value="<?php echo $data['full_name'];?>" required>
                                  <input type="hidden" name="date_revisi" class="form-control" value="<?php echo date('Y-m-d H:i:sa'); ?>" required>
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <hr>
                                <div align="center">
                                  <h5>Dokumen Awal</h5>
                                </div>
                                <?php
                                if ($row['upload_lam']==NULL){
                                  echo "<td>empty</td>";
                                }else{
                                  echo "
                                  <div align='center'>
                                  <a href='./assets/file/perubahan/user/$row[upload_lam]' target='_blank'><img src='assets/images/icon/file.png' width='90px'></a>
                                  </div>
                                  ";
                                }
                                ?>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <h5><b>Status Revisi :</b> <button class="btn btn-warning btn-sm"><?php echo $row['peru_status_revisi'];?></button></h5>
                              <h5><b>Bagian Yang Diubah :</b></h5>
                              <textarea class="ckeditor" id="ckedtor" readonly="readonly"><?php echo $row['peru_bagian_revisi']; ?></textarea>
                              <h5><b>Diubah Menjadi :</b></h5>
                              <textarea class="ckeditor" id="ckedtor" readonly="readonly"><?php echo $row['peru_diubah_menjadi']; ?></textarea>
                              <h5><b>Alasan Perubahan :</b></h5>
                              <textarea class="form-control" readonly="readonly"><?php echo $row['peru_alasan']; ?></textarea>
                            </div>
                          </div>
                        <?php } }  mysqli_close($con); ?>
                    </div>
                </div>
            </div>
        </div>
        <section class="cd-timeline js-cd-timeline">
            <div class="cd-timeline__container">
                <?php
                $con=mysqli_connect("localhost","root","","rskg_akreditasi");
                if (mysqli_connect_errno())
                {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
              $result = mysqli_query($con,"SELECT * FROM tb_revisi WHERE id_peru='$id_peru' ORDER BY id_revisi DESC");

              if(mysqli_num_rows($result)>0){
                  while($row = mysqli_fetch_array($result))
                  {
                    ?>
                    <div class="cd-timeline__block js-cd-block">
                        <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                            <img src="assets/vendor/timeline/img/cd-icon-location.svg" alt="Picture">
                        </div>
                        <div class="cd-timeline__content js-cd-content">
                            <h6>Diperiksa oleh: <?php echo $row['oleh']; ?></h6>
                            <textarea class="ckeditor" id="ckedtor" name="admin_dok" placeholder="Penjelasan Revisi ..." readonly="readonly"><?php echo $row['keterangan'];?></textarea>
                            <br>
                            <hr>
                            <font style="color: red"><small>Balas Hasil Revisi Beserta File (Yang Sudah Diperbaiki)</small></font>
                            <?php
                                if ($row['balasan']==NULL) {
                            ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label><small>Komentar</small></label>
                                    <textarea type="text" class="form-control" name="balasan"></textarea>
                                </div>
                            <?php
                                }else{
                            ?>
                                <div class="form-group">
                                    <label><small>Komentar</small></label>
                                    <textarea type="text" class="form-control" readonly="readonly"><?php echo $row['balasan']; ?></textarea>
                                </div>
                            <?php
                                }
                                if ($row['file_revisi']==NULL) {
                            ?>
                                    <div class="form-group">
                                        <label><small>File Perbaikan</small></label>
                                        <input type="file" class="form-control" name="file_revisi">
                                        <input type="hidden" class="form-control" name="id_revisi" value="<?php echo $row['id_revisi']; ?>">
                                    </div>
                                <div class="form-group">
                                    <button type="submit" name="update" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>
                            <?php
                                }else{
                                    echo "
                                     <div class='form-group'>
                                        <label><small>Upload File</small></label>
                                        <a href='./assets/file/perubahan/admin/revisi/$row[file_revisi]' target='_blank'><img src='assets/images/icon/file.png' width='90px'></a>
                                    </div>
                                    ";
                                }
                            
                            ?>
                            <span class="cd-timeline__date"><label><?php echo $row['date_revisi']; ?></label></span>
                        </div>
                    </div>
                <?php } }  mysqli_close($con); ?>
            </div>
        </section>
    </div>
    <?php include 'include/footer.php'; ?>
</div>
</div>
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="assets/libs/js/main-js.js"></script>
<script src="assets/vendor/timeline/js/main.js"></script>
</body>
</html>