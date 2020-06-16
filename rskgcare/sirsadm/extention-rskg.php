<?php
include "include/connection.php";

// ADD
if(isset($_POST["submit"]))    
{    
  $id_ext        = $_POST['id_ext'];
  $ruangan       = $_POST['ruangan'];
  $nama          = $_POST['nama'];
  $nomor         = $_POST['nomor'];
  $date_ext      = $_POST['date_ext'];

  $query = mysql_query("INSERT INTO tb_extention 
    (id_ext,ruangan,nama,nomor,date_ext) 
    VALUES 
    ('','$ruangan','$nama','$nomor','$date_ext')
    ");
  if ($query) {
    header("Location: ./extention-rskg.php?ntf=1");  
  } else {
    header("Location: ./agenda-nota-intern.php?ntf=6");
  }
}


// EDIT
if(isset($_POST["update"]))    
{    
  $id_ext        = $_POST['id_ext'];
  $ruangan       = $_POST['ruangan'];
  $nama          = $_POST['nama'];
  $nomor         = $_POST['nomor'];
  $date_ext      = $_POST['date_ext'];

  $query = mysql_query("UPDATE tb_extention SET 
    ruangan ='$ruangan',
    nama = '$nama',
    nomor = '$nomor',
    date_ext = '$date_ext'
    WHERE id_ext ='$id_ext'");
  if($query){
    header("Location: ./extention-rskg.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $id_ext    = $_POST['id_ext'];

  if($id_ext){
    $query = mysql_query("DELETE FROM tb_extention WHERE id_ext = '$id_ext'");
    if($query){
     header("Location: ./extention-rskg.php?ntf=3");                     
   } else {
    header("Location: ./extention-rskg.php?ntf=6");  
  }
} else {
  header("Location: ./extention-rskg.php?ntf=6");  
}
}

// SEARCH
if(isset($_POST["search"]))
{    
  $query1 = '';
  if ($_POST['room']) {
    $query1 = "ruangan ='$_POST[room]'";
  } else {
    if ($_POST['sn']) {
      if ($query1 != '') {
        $query1 .= ' and ';
      }
      $query1 .= "pr_sn ='$_POST[sn]'";
    }
  }
} else {
  $query1 = "ruangan ='No Data' ";
  $query1 .= "and pr_sn ='No Data' ";
}

$room = mysql_query("SELECT ruangan FROM tb_ruangan");
$room1 = mysql_query("SELECT ruangan FROM tb_ruangan");
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
              <h1 class="m-0 text-dark">Extention RSKG</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Extention RSKG</a></li>
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
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Ruangan</label>
                      <select name="room" class="form-control" id="room">
                        <option value="">-- Pilih Ruangan --</option>
                        <?php 
                        while ($row_room = mysql_fetch_assoc($room)) {
                          ?>
                          <option value="<?= $row_room['ruangan'] ?>"><?= $row_room['ruangan'] ?></option>
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
                  <label class="modal-title">Tambah Extention RSKG</label>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="POST">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Ruangan<font style="color: red">*</font></label>
                          <select name="ruangan" class="form-control" required="required">
                            <option value="">-- Pilih Ruangan --</option>
                            <?php 
                            while ($row_room1 = mysql_fetch_assoc($room1)) {
                              ?>
                              <option value="<?= $row_room1['ruangan'] ?>"><?= $row_room1['ruangan'] ?></option>
                            <?php } ?>
                          </select>
                          <input type="hidden" class="form-control" name="id_ext">
                          <input type="hidden" class="form-control" name="date_ext" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Nama<font style="color: red">*</font></label>
                          <input type="text" class="form-control" name="nama" placeholder="Nama ..." required="required">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>No. Extention<font style="color: red">*</font></label>
                          <input type="text" class="form-control" name="nomor" placeholder="No. Extention ..." required="required">
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
                <a href="extention-view.php" target="_blank">
                  <span type="submit" name="search" value="search" class="btn bg-blue btn-flat">
                    <i class="fa fa-eye"></i> 
                    Lihat Ext
                  </span>
                </a>
                <a href="cetak-extention-rskg.php" target="_blank">
                  <span type="submit" name="search" value="search" class="btn bg-gray btn-flat">
                    <i class="fa fa-print"></i> 
                    Print
                  </span>
                </a>
                <a href="assets/file/extention_rskg/download/ex_extention-rskg.php">
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
                      <th>No</th>
                      <th>Ruangan</th>
                      <th>Nama</th>
                      <th>No. Extention</th>
                      <th width="100px">Action</th>
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
                    $result = mysqli_query($con,"SELECT * FROM tb_extention ORDER BY id_ext DESC");
                    // $result = mysqli_query($con,"SELECT * FROM tb_extention ". (($query1 != '') ? " where $query1 " : "where id_ext is null") );
                    
                    $no=0;
                    if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_array($result))
                      {
                        $no++;
                        echo "<tr>";
                        echo "<td>".$no.".</td>";
                        if ($row['ruangan']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['ruangan'] . "</td>";
                        }
                        if ($row['nama']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['nama'] . "</td>";
                        }
                        if ($row['nomor']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['nomor'] . "</td>";
                        }
                        echo "<td align= '' width='30px'>
                        <a href='#' data-toggle='modal' data-target='#edit$row[id_ext]' title='Edit'><span class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> </span></a>
                        <a href='#' data-toggle='modal' data-target='#delete$row[id_ext]' title='Delete'><span class='btn btn-danger btn-xs'><i class='fas fa-times'></i> </span></a>
                        </td>";
                        echo "</tr>";
                        ?>

                        <!-- UPDATE -->
                        <div class="modal fade" id="edit<?php echo $row['id_ext'];?>">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Update Extention RSKG</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Ruangan</label>
                                        <select name="ruangan" class="form-control" id="room">
                                          <option value="<?php echo $row['ruangan']; ?>"><?php echo $row['ruangan']; ?></option>
                                          <option value="">-- Pilih Ruangan --</option>
                                          <?php
                                          $con=mysqli_connect("localhost","root","","rskg_sirsadm");
                                          if (mysqli_connect_errno())
                                          {
                                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                          }
                                          $resultroom=mysql_query("SELECT ruangan FROM tb_ruangan");
                                          while($dataroom=mysql_fetch_array($resultroom)) { ?>
                                            <option value="<?php echo $dataroom['ruangan']; ?>"><?php echo $dataroom['ruangan']; ?></option>
                                            <?php
                                          }
                                          ?>
                                        </select>
                                        <input type="hidden" class="form-control" name="id_ext" value="<?php echo $row['id_ext']; ?>">
                                        <input type="hidden" class="form-control" name="date_ext" value="<?php echo $row['date_ext']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Nama</font></label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama ..." value="<?php echo $row['nama']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>No. Extention</label>
                                        <input type="text" class="form-control" name="nomor" placeholder="No. Extention ..." value="<?php echo $row['nomor']; ?>">
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
                        <div class="modal fade" id="delete<?php echo $row['id_ext'];?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Delete Extention RSKG</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="">
                                  <div class="form-group">
                                    <label>Hapus Data Extention RSKG?</label>
                                    <h6>Ruangan : <b><u><?php echo $row['ruangan'];?></u></b></h6>
                                    <h6>Nama : <b><u><?php echo $row['nama'];?></u></b></h6>
                                    <h6>No. Extention : <b><u><?php echo $row['nomor'];?></u></b></h6>
                                    <input type="hidden" name="id_ext" class="form-control" placeholder="client name" value="<?php echo $row['id_ext'];?>" required>
                                  </div>
                                  <button type="submit" name="delete" class="btn btn-info btn-block btn-flat">Yes</button>
                                  <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">No</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- END DELETE -->

                        <?php
                      }
                    }mysqli_close($con);
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Ruangan</th>
                      <th>Nama</th>
                      <th>No. Extention</th>
                      <th width="100px">Action</th>
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
