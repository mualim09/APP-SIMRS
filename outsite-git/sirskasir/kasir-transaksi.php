<?php
include "include/connection.php";


// ADD
if(isset($_POST["submit"]))    
{    
  $id_transaksi        = $_POST['id_transaksi'];
  $nama             = $_POST['nama'];
  $telepon          = $_POST['telepon'];
  $json_telepon     = json_encode($telepon);
  $fax              = $_POST['fax'];
  $email            = $_POST['email'];
  $alamat           = $_POST['alamat'];
  $date_transaksi      = $_POST['date_transaksi'];

  $query = mysql_query("INSERT INTO tb_client 
    (id_transaksi,nama,telepon,fax,email,alamat,date_transaksi) 
    VALUES 
    ('','$nama','$json_telepon','$fax','$email','$alamat','$date_transaksi')
    ");
  if ($query) {
    header("Location: ./kasir-transaksi.php?ntf=1");  
  } else {
    header("Location: ./kasir-transaksi.php?ntf=6");
  }
}

// EDIT
if(isset($_POST["update"]))    
{    
  $id_transaksi        = $_POST['id_transaksi'];
  $nama             = $_POST['nama'];
  $telepon          = $_POST['telepon'];
  $json_telepon     = json_encode($telepon);
  $fax              = $_POST['fax'];
  $email            = $_POST['email'];
  $alamat           = $_POST['alamat'];
  $date_transaksi      = $_POST['date_transaksi'];

  $query = mysql_query("UPDATE tb_client SET 
    nama ='$nama',
    telepon = '$json_telepon',
    fax = '$fax',
    email = '$email',
    alamat = '$alamat',
    date_transaksi = '$date_transaksi'
    WHERE id_transaksi ='$id_transaksi'");
  if($query){
    header("Location: ./kasir-transaksi.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// TAMBAH 
if(isset($_POST["upload"]))    
{    
  $id_transaksi        = $_POST['id_transaksi'];

  $nama_ = $_FILES['']['name'];
  $file_tmp = $_FILES['']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/kasir-transaksi//'.$nama);
  
  $query = mysql_query("UPDATE tb_client SET 
    _ani = '$nama'
    WHERE id_transaksi ='$id_transaksi'");
  if($query){
    header("Location: ./kasir-transaksi.php?ntf=5");                                                  
  } else {
    header("Location: ./kasir-transaksi.php?ntf=6");  
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $id_transaksi = $_POST['id_transaksi'];

  if($id_transaksi){
    $query = mysql_query("DELETE FROM tb_client WHERE id_transaksi = '$id_transaksi'");
    if($query){
     header("Location: ./kasir-transaksi.php?ntf=3");                     
   } else {
    header("Location: ./kasir-transaksi.php?ntf=6");  
  }
} else {
  header("Location: ./kasir-transaksi.php?ntf=6");  
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

function penyebut($nilai) {
  $nilai = abs($nilai);
  $huruf = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", "SEBELAS");
  $temp = "";
  if ($nilai < 12) {
    $temp = " ". $huruf[$nilai];
  } else if ($nilai <20) {
    $temp = penyebut($nilai - 10). " BELAS";
  } else if ($nilai < 100) {
    $temp = penyebut($nilai/10)." PULUH". penyebut($nilai % 10);
  } else if ($nilai < 200) {
    $temp = " SERATUS" . penyebut($nilai - 100);
  } else if ($nilai < 1000) {
    $temp = penyebut($nilai/100) . " RATUS" . penyebut($nilai % 100);
  } else if ($nilai < 2000) {
    $temp = " SERIBU" . penyebut($nilai - 1000);
  } else if ($nilai < 1000000) {
    $temp = penyebut($nilai/1000) . " RIBU" . penyebut($nilai % 1000);
  } else if ($nilai < 1000000000) {
    $temp = penyebut($nilai/1000000) . " JUTA" . penyebut($nilai % 1000000);
  } else if ($nilai < 1000000000000) {
    $temp = penyebut($nilai/1000000000) . " MILYAR" . penyebut(fmod($nilai,1000000000));
  } else if ($nilai < 1000000000000000) {
    $temp = penyebut($nilai/1000000000000) . " TRILIYUN" . penyebut(fmod($nilai,1000000000000));
  }     
  return $temp;
}

function terbilang($nilai) {
  if($nilai<0) {
    $hasil = "minus ". trim(penyebut($nilai));
  } else {
    $hasil = trim(penyebut($nilai));
  }         
  return $hasil;
}

function rupiah ($angka) {
  $hasil = 'Rp ' . number_format($angka, 2, ",", ".");
  return $hasil;
}

function kdauto($tabel, $inisial){
  $struktur   = mysql_query("SELECT * FROM $tabel");
  $field      = mysql_field_name($struktur,0);
  $panjang    = mysql_field_len($struktur,0);
  $qry  = mysql_query("SELECT max(".$field.") FROM ".$tabel);
  $row  = mysql_fetch_array($qry);
  if ($row[0]=="") {
    $angka=000;
  }
  else {
    $angka= substr($row[0], strlen($inisial));
  }
  $angka++;
  $angka      =strval($angka);
  $tmp  ="";
  for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
    $tmp=$tmp."0";
  }
  return $inisial.$tmp.$angka;
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
              <h1 class="m-0 text-dark">
                Transaksi Kasir
              </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Transaksi Kasir</a></li>
                <li class="breadcrumb-item active">SIRS KASIR</li>
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

          <!-- MODAL ADD -->
          <div class="modal fade" id="modal-add">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <label class="modal-title">Tambah Transaksi Kasir</label>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="POST">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>No. :</label>
                          <input type="text" class="form-control" name="nama" value="<?php echo date('Ymd');?><?php echo kdauto("tb_transaksi",""); ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Terima Dari<font style="color: red">*</font><br><i>Received from</i></label>
                          <input type="text" class="form-control" name="nama" placeholder="Terima Dari ..." required="required">
                          <input type="hidden" class="form-control" name="id_transaksi">
                          <input type="hidden" class="form-control" name="date_transaksi" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Untuk Pembayaran<font style="color: red">*</font><br><i>In settlement of</i></label>
                          <input type="text" class="form-control" name="date_transaksi" placeholder="Untuk Pembayaran ...">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Jumlah<br><i>Amount</i></label>
                          <input type="text" class="form-control" name="date_transaksi" readonly="readonly">
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
                <a href="cetak-kasir-transaksi.php" target="_blank">
                  <span type="submit" name="search" value="search" class="btn bg-gray btn-flat">
                    <i class="fa fa-print"></i> 
                    Print
                  </span>
                </a>
                <a href="assets/file/telepon_keluar/download/ex_kasir-transaksi.php">
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
                      <th>No.<br><i>No.</i></th>
                      <th>Terima Dari<br><i>Received from</i></th>
                      <th>Sejumlah Uang<br><i>For the amount of</i></th>
                      <th>Untuk Pembayaran<br><i>In settlement of</i></th>
                      <th>Jumlah<br><i>AMOUNT</i></th>
                      <th>Tindakan<br><i>Action</i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $con=mysqli_connect("localhost","root","","rskg_sirskasir");
                        // Check connection
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $result = mysqli_query($con,"SELECT * FROM tb_transaksi ORDER BY id_transaksi DESC");

                    $no=0;
                    if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_array($result))
                      {
                        $no++;
                        echo "<tr>";
                        if ($row['nomor']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['nomor'] . "</td>";
                        }
                        if ($row['pasien']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['pasien'] . "</td>";
                        }
                        if ($row['total']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td><i><b>" . terbilang($row['total'])."</b></i></td>";
                        }
                        if ($row['tindakan']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['tindakan'] . "</td>";
                        }
                        if ($row['total']==NULL){
                          echo "<td>empty</td>";
                        }else{
                         echo "<td>"."Rp. " . number_format($row['total'],0,',','.')."</td>";
                       }
                       echo "<td align= '' width='30px'>
                       <a href='#' data-toggle='modal' data-target='#edit$row[id_transaksi]' title='Edit'><span class='btn btn-warning btn-xs'><i class='fas fa-pen'></i> </span></a>
                       <a href='#' data-toggle='modal' data-target='#delete$row[id_transaksi]' title='Delete'><span class='btn btn-danger btn-xs'><i class='fas fa-times'></i> </span></a>
                       <a href='#' data-toggle='modal' data-target='#print$row[id_transaksi]' title='Cetakk Kwitansi'><span class='btn bg-orange btn-xs'><i class='fas fa-print'></i> </span></a>
                       </td>";
                       echo "</tr>";
                       ?>

                       <!-- UPDATE -->
                       <div class="modal fade" id="edit<?php echo $row['id_transaksi'];?>">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <label class="modal-title">Update Transaksi Kasir</label>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="" method="POST">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Nama</label>
                                      <input type="text" class="form-control" name="nama" placeholder="Nama ..." value="<?php echo $row['nama']; ?>" required="required">
                                      <input type="hidden" class="form-control" name="id_transaksi" value="<?php echo $row['id_transaksi']; ?>">
                                      <input type="hidden" class="form-control" name="date_transaksi" value="<?php echo $row['date_transaksi']; ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <div id="image">
                                        <div id="item">
                                          <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Telepon</label>
                                            <input id="inputText3" name="telepon[]" type="text" placeholder="Telepon ..." value="<?php echo $row['telepon']; ?>" required="required" class="form-control" style="position:unset;opacity:1">
                                          </div>
                                        </div>
                                        <a href="javascript:void(0)" onclick="tambahFile()" class="btn btn-primary">Tambah</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Fax</label>
                                      <input type="text" class="form-control" name="fax" placeholder="Fax ..." value="<?php echo $row['fax']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" class="form-control" name="email" placeholder="Email ..." value="<?php echo $row['email']; ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Alamat</label>
                                      <textarea type="text" class="form-control" name="alamat" placeholder="Alamat ..." required="required"><?php echo $row['alamat']; ?></textarea>
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
                      <div class="modal fade" id="delete<?php echo $row['id_transaksi'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <label class="modal-title">Delete Transaksi Kasir</label>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="">
                                <div class="form-group">
                                  <label>Hapus Data Transaksi Kasir?</label>
                                  <h6>Nama : <b><u><?php echo $row['nama'];?></u></b></h6>
                                  <h6>Telepon : <b><u><?php echo $row['telepon'];?></u></b></h6>
                                  <h6>Alamat : <b><u><?php echo $row['alamat'];?></u></b></h6>
                                  <input type="hidden" name="id_transaksi" class="form-control" placeholder="client name" value="<?php echo $row['id_transaksi'];?>" required>
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
                      <div class="modal fade" id="addfile<?php echo $row['id_transaksi'];?>" role="dialog">
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
                                  <input type="hidden" name="id_transaksi" class="form-control" placeholder="client name" value="<?php echo $row['id_transaksi'];?>" required>
                                </div>
                                <button type="submit" name="uploadlampiran" class="btn btn-info btn-block btn-flat">Submit</button>
                                <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">Close</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- END FILE -->

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

<script>
  function tambahFile() {
    var html = '<div id="item"><div class="form-group"><input id="inputText3" name="telepon[]" type="text" placeholder="Telepon ..." class="form-control" style="position:unset;opacity:1"></div><a href="javascript:void(0)" onclick="removeFile(this)" class="btn btn-danger">Hapus</a></div>';

    $('#image').append(html);
  }

  function removeFile(e) {
    let parent = e.parentNode;

    parent.remove()
  }
</script>
<?php include 'include/footer.php'; ?>
<?php include 'include/jsfile.php'; ?>
</body>
</html>
