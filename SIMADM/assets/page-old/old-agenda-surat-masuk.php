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
  $id_asm           = $_POST['id_asm'];
  $berkas_asm       = $_POST['berkas_asm'];
  $alamat_pengirim  = $_POST['alamat_pengirim'];
  $tanggal          = $_POST['tanggal'];
  $nomor_asm        = $_POST['nomor_asm'];
  $perihal_asm      = $_POST['perihal_asm'];
  $ket_asm          = $_POST['ket_asm'];
  $date_asm         = $_POST['date_asm'];

  $nama = $_FILES['lampiran_asm']['name'];
  $file_tmp = $_FILES['lampiran_asm']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/surat_masuk/lampiran/'.$nama);

  $query = mysql_query("INSERT INTO tb_asm 
    (id_asm,berkas_asm,alamat_pengirim,tanggal,nomor_asm,perihal_asm,ket_asm,date_asm,lampiran_asm) 
    VALUES 
    ('','$berkas_asm','$alamat_pengirim','$tanggal','$nomor_asm','$perihal_asm','$ket_asm','$date_asm','$nama')
    ");
  if ($query) {
    header("Location: ./agenda-surat-masuk.php?ntf=1");  
  } else {
    header("Location: ./agenda-surat-masuk.php?ntf=3");
  }
}

// EDIT
if(isset($_POST["update"]))    
{    
  $id_asm           = $_POST['id_asm'];
  $berkas_asm       = $_POST['berkas_asm'];
  $alamat_pengirim  = $_POST['alamat_pengirim'];
  $tanggal          = $_POST['tanggal'];
  $nomor_asm        = $_POST['nomor_asm'];
  $perihal_asm      = $_POST['perihal_asm'];
  $ket_asm          = $_POST['ket_asm'];
  $date_asm         = $_POST['date_asm'];

  $query = mysql_query("UPDATE tb_asm SET 
    berkas_asm ='$berkas_asm',
    alamat_pengirim ='$alamat_pengirim',
    tanggal = '$tanggal',
    nomor_asm = '$nomor_asm',
    perihal_asm = '$perihal_asm',
    ket_asm = '$ket_asm',
    date_asm = '$date_asm'
    WHERE id_asm ='$id_asm'");
  if($query){
    header("Location: ./agenda-surat-masuk.php?ntf=1");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// TAMBAH LAMPIRAN
if(isset($_POST["uploadlampiran"]))    
{    
  $id_asm           = $_POST['id_asm'];

  $nama = $_FILES['lampiran_asm']['name'];
  $file_tmp = $_FILES['lampiran_asm']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/file/surat_masuk/lampiran/'.$nama);
  
  $query = mysql_query("UPDATE tb_asm SET 
    lampiran_asm = '$nama'
    WHERE id_asm ='$id_asm'");
  if($query){
    header("Location: ./agenda-surat-masuk.php?ntf=1");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $id_asm    = $_POST['id_asm'];

  if($id_asm){
    $query = mysql_query("DELETE FROM tb_asm WHERE id_asm = '$id_asm'");
    if($query){
     header("Location: ./agenda-surat-masuk.php?ntf=1");                     
   } else {
    echo "Operation Failed! Please contact your Administrator".mysql_errno();
  }
} else {
  echo "Operation Failed! Please contact your Administrator".mysql_errno();
}
}

// SEARCH
// if(isset($_POST["search"]))
// {    
//   $query1 = '';
//   if ($_POST['cr_berkas']) {
//     $query1 = "berkas_asm ='$_POST[cr_berkas]'";
//   } else {
//     if ($_POST['cr_alamat']) {
//       if ($query1 != '') {
//         $query1 .= ' and ';
//       }
//       $query1 .= "alamat_pengirim ='$_POST[cr_alamat]'";
//     }
//   }
// } else {
//   $query1 = "berkas_asm ='No Data' ";
//   $query1 .= "and alamat_pengirim ='No Data' ";
// }

$berkas = mysql_query("SELECT berkas_asm FROM tb_asm");
$alamat = mysql_query("SELECT alamat_pengirim FROM tb_asm");
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
              <h1 class="m-0 text-dark">Agenda Surat Masuk</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Agenda Surat Masuk</a></li>
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
            <form method="post" action="">
              <div class="card-body">
                <div class="row">
                  <!-- <div class="col-sm-4">
                    <div class="form-group">
                      <label>Nomor Berkas</label>
                      <select class="form-control select2bs4" name="cr_berkas" style="width: 100%;">
                        <option value="">-- Pilih No Berkas --</option>
                        <?php 
                        while ($row_berkas = mysql_fetch_assoc($berkas)) {
                          ?>
                          <option value="<?= $row_berkas['berkas_asm'] ?>"><?= $row_berkas['berkas_asm'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div> -->
                  <!-- <div class="col-sm-4">
                    <div class="form-group">
                      <label>Nomor Berkas</label>
                      <select class="form-control select2bs4" name="cr_alamat" style="width: 100%;">
                        <option value="">-- Pilih No Berkas --</option>
                        <?php 
                        while ($row_alamat = mysql_fetch_assoc($alamat)) {
                          ?>
                          <option value="<?= $row_alamat['alamat_pengirim'] ?>"><?= $row_alamat['alamat_pengirim'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div> -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Dari tanggal</label>
                      <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Sampai tanggal</label>
                      <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Enter ...">
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
                  <label class="modal-title">Tambah Agenda Surat Masuk</label>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>File Upload</label>
                        <input type="file" name="lampiran_asm" placeholder="Upload ...">
                      </div>
                    </div>
                    <div align="center" style="background-color: gray">
                      <label>NOMOR</label>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>No Berkas</label>
                          <input type="text" class="form-control" name="berkas_asm" placeholder="No Berkas ...">
                          <input type="hidden" class="form-control" name="id_asm" placeholder="No Berkas ...">
                          <input type="hidden" class="form-control" name="date_asm" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Alamat Pengirim</label>
                          <textarea class="form-control" rows="3" name="alamat_pengirim" placeholder="Alamat Pengirim ..."></textarea>
                        </div>
                      </div>
                    </div>
                    <div align="center" style="background-color: gray">
                      <label>DARI SURAT MASUK</label>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Tanggal</label>
                          <input type="date" class="form-control" name="tanggal" placeholder="No Berkas ...">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Nomor</label>
                          <input type="text" class="form-control" name="nomor_asm" placeholder="Nomor ...">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Perihal</label>
                          <input type="text" class="form-control" name="perihal_asm" placeholder="Perihal ...">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Keterangan</label>
                          <textarea class="form-control" rows="3" name="ket_asm" placeholder="Keterangan ..."></textarea>
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
                <a href="cetak-surat-masuk.php" target="_blank"><span type="submit" name="search" value="search" class="btn bg-gray btn-flat"><i class="fa fa-print"></i> Print</a></span>
                <a href="assets/file/surat_masuk/download/ex_surat-masuk.php"><span type="submit" name="search" value="search" class="btn bg-olive btn-flat"><i class="fa fa-file-excel"></i> Export Excel</a></span>
                <button class="btn bg-info btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Data"><i class="nav-icon far fa-plus-square"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-striped">
                  <thead>
                    <tr align="center">
                      <th colspan="2">Nomor</th>
                      <th rowspan="2">Alamat Pengirim</th>
                      <th colspan="3">Dari Surat Masuk</th>
                      <th rowspan="2">Keterangan</th>
                      <th rowspan="2">Lampiran</th>
                      <th rowspan="2" width="100px">Action</th>
                    </tr>
                    <tr align="center">
                      <th>Urut</th>
                      <th>Berkas</th>
                      <th>Tanggal</th>
                      <th>Nomor</th>
                      <th>Perihal</th>
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
                    $result = mysqli_query($con,"SELECT * FROM tb_asm ORDER BY id_asm DESC");
                    // $result = mysqli_query($con,"SELECT * FROM tb_asm ". (($query1 != '') ? " where $query1 " : "where id_asm") );
                    // $result = mysqli_query($con,"SELECT * FROM tb_asm WHERE berkas_asm LIKE '%query1%' OR alamat_pengirim LIKE '%$query1%'");

                    $no=0;
                    if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_array($result))
                      {
                        $no++;
                        echo "<tr>";
                        echo "<td>".$no.".</td>";
                        if ($row['berkas_asm']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['berkas_asm'] . "</td>";
                        }
                        if ($row['alamat_pengirim']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['alamat_pengirim'] . "</td>";
                        }
                        if ($row['tanggal']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".tanggal_indo($row['tanggal'], true) . "</td>";
                        }
                        if ($row['nomor_asm']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['nomor_asm'] . "</td>";
                        }
                        if ($row['perihal_asm']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['perihal_asm'] . "</td>";
                        }
                        if ($row['ket_asm']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['ket_asm'] . "</td>";
                        }
                        if ($row['lampiran_asm']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td align= ''>
                          <a href='assets/file/surat_masuk/lampiran/$row[lampiran_asm]' target='_blank' title='Lihat'><span class='btn btn-info btn-xs'><i class='fa fa-eye'></i> Lihat</span></a>
                          </td>";
                        }
                        echo "<td align= '' width='30px'>
                        <a href='#' data-toggle='modal' data-target='#edit$row[id_asm]' title='Edit'><span class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> Edit</span></a>
                        <a href='#' data-toggle='modal' data-target='#delete$row[id_asm]' title='Delete'><span class='btn btn-danger btn-xs'><i class='fas fa-times'></i> Hapus</span></a>
                        <a href='#' data-toggle='modal' data-target='#addfile$row[id_asm]' title='Tambah Lampiran'><span class='btn btn-default btn-xs'><i class='fas fa-file'></i> Lampiran</span></a>
                        </td>";
                        echo "</tr>";
                        ?>

                        <!-- UPDATE -->
                        <div class="modal fade" id="edit<?php echo $row['id_asm'];?>">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Update Agenda Surat Masuk</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
                                <form action="" method="POST">
                                  <div class="modal-body">
                                  <!-- <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Lampiran</label>
                                      <input type="file" class="form-control" name="lampiran_asm" value="<?php echo $row['lampiran_asm']; ?>">
                                    </div>
                                  </div> -->
                                  <div align="center" style="background-color: gray">
                                    <label>NOMOR</label>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>No Berkas</label>
                                        <input type="text" class="form-control" name="berkas_asm" placeholder="No Berkas ..." value="<?php echo $row['berkas_asm']; ?>">
                                        <input type="hidden" class="form-control" name="id_asm" value="<?php echo $row['id_asm']; ?>">
                                        <input type="hidden" class="form-control" name="date_asm" value="<?php echo $row['date_asm']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Alamat Pengirim</label>
                                        <textarea class="form-control" rows="3" placeholder="Alamat Pengirim ..." name="alamat_pengirim"><?php echo $row['alamat_pengirim']; ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div align="center" style="background-color: gray">
                                    <label>DARI SURAT MASUK</label>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" value="<?php echo $row['tanggal']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Nomor</label>
                                        <input type="text" class="form-control" name="nomor_asm" placeholder="Nomor ..." value="<?php echo $row['nomor_asm']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Perihal</label>
                                        <input type="text" class="form-control" name="perihal_asm" placeholder="Perihal ..." value="<?php echo $row['perihal_asm']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" rows="3" name="ket_asm" placeholder="Keterangan ..."><?php echo $row['ket_asm']; ?></textarea>
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
                        <div class="modal fade" id="delete<?php echo $row['id_asm'];?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Delete Agenda Surat Masuk</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="">
                                  <div class="form-group">
                                    <label>Hapus Data Agenda Surat Masuk?</label>
                                    <h6>Nomor Berkas : <b><u><?php echo $row['berkas_asm'];?></b></u></h6>
                                    <h6>Pengirim : <b><u><?php echo $row['alamat_pengirim'];?></b></u></h6>
                                    <h6>Tanggal : <b><u><?php echo $row['tanggal'];?></b></u></h6>
                                    <input type="hidden" name="id_asm" class="form-control" placeholder="client name" value="<?php echo $row['id_asm'];?>" required>
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
                        <div class="modal fade" id="addfile<?php echo $row['id_asm'];?>" role="dialog">
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
                                    <input type="file" name="lampiran_asm" placeholder="Upload ...">
                                    <input type="hidden" name="id_asm" class="form-control" placeholder="client name" value="<?php echo $row['id_asm'];?>" required>
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
                  <tfoot>
                    <tr align="center">
                      <th>Urut</th>
                      <th>Berkas</th>
                      <th>Alamat Pengirim</th>
                      <th>Tanggal</th>
                      <th>Nomor</th>
                      <th>Perihal</th>
                      <th>Keterangan</th>
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
