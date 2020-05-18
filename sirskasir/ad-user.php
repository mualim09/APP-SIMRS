<?php
include "include/connection.php";

// ADD
if(isset($_POST["submit"]))    
{    
  $user_id      = $_POST['user_id'];
  $username     = $_POST['username'];
  $password     = $_POST['password'];
  $fullname     = $_POST['fullname'];
  $role         = $_POST['role'];
  $unit         = $_POST['unit'];
  $email        = $_POST['email'];
  $joindate     = $_POST['joindate'];
  $date_user    = $_POST['date_user'];

  $query = mysql_query("INSERT INTO tb_user 
    (user_id,username,password,fullname,role,unit,email,joindate,date_user) 
    VALUES 
    ('','$username','$password','$fullname','$role','$unit','$email','$joindate','$date_user')
    ");
  if ($query) {
    header("Location: ./ad-user.php?ntf=1");  
  } else {
    header("Location: ./ad-user.php?ntf=6");
  }
}

// EDIT
if(isset($_POST["update"]))    
{    
  $user_id      = $_POST['user_id'];
  $username     = $_POST['username'];
  $fullname     = $_POST['fullname'];
  $role         = $_POST['role'];
  $unit         = $_POST['unit'];
  $email        = $_POST['email'];
  $joindate     = $_POST['joindate'];
  $date_user    = $_POST['date_user'];

  $query = mysql_query("UPDATE tb_user SET 
    username ='$username',
    fullname = '$fullname',
    role = '$role',
    unit = '$unit',
    email = '$email',
    joindate = '$joindate',
    date_user = '$date_user'
    WHERE user_id ='$user_id'");
  if($query){
    header("Location: ./ad-user.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
}

// CHANGE PASSWORD
if(isset($_POST["changepassword"]))    
{    
  $user_id      = $_POST['user_id'];
  $password    = $_POST['password'];

  $query = mysql_query("UPDATE tb_user SET 
    password ='$password'
    WHERE user_id ='$user_id'");
  if($query){
    header("Location: ./ad-user.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// UBAH FOTO
if(isset($_POST["uploadfoto"]))    
{    
  $user_id           = $_POST['user_id'];

  $nama = $_FILES['foto']['name'];
  $file_tmp = $_FILES['foto']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/img/faces/'.$nama);
  
  $query = mysql_query("UPDATE tb_user SET 
    foto = '$nama'
    WHERE user_id ='$user_id'");
  if($query){
    header("Location: ./ad-user.php?ntf=5");                                                  
  } else {
    header("Location: ./ad-user.php?ntf=6");  
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $user_id    = $_POST['user_id'];

  if($user_id){
    $query = mysql_query("DELETE FROM tb_user WHERE user_id = '$user_id'");
    if($query){
     header("Location: ./ad-user.php?ntf=3");                     
   } else {
    header("Location: ./ad-user.php?ntf=6");  
  }
} else {
  header("Location: ./ad-user.php?ntf=6");  
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

<!-- CSS FOTO -->
<style type="text/css">
  .lingkaran1{
    width: 200px;
    height: 200px;
    background: #ffffff;
    border-radius: 100%;
  }

  .img{
    width: 200px;
    height: 200px;
    background: #ffffff;
    border-radius: 100%;
  }
</style>
<!-- END CSS -->

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
              <h1 class="m-0 text-dark">Pengguna</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
                <li class="breadcrumb-item active">SIRS ADM</li>
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
                  <label class="modal-title">Tambah Pengguna</label>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="POST">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control" name="username" placeholder="firtsname.lastname ...">
                          <input type="hidden" class="form-control" name="user_id">
                          <input type="hidden" class="form-control" name="joindate" value="<?php echo date('Y-m-d'); ?>">
                          <input type="hidden" class="form-control" name="date_user" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Password ...">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Fullname</label>
                          <input type="text" class="form-control" name="fullname" placeholder="Fullname ...">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Role</label>
                          <select class="form-control select2bs4" name="role" style="width: 100%;">
                            <option value="">-- Pilih Role --</option>
                            <option value="superadmin">Superadmin</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            <option value="unit">Unit</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Unit</label>
                          <input type="text" class="form-control" name="unit" placeholder="Unit ...">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" placeholder="@Email ...">
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
                <a href="#" target="_blank">
                  <span type="submit" name="search" value="search" class="btn bg-gray btn-flat">
                    <i class="fa fa-print"></i> 
                    Print
                  </span>
                </a>
                <span class="btn bg-info btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Data">
                  <i class="nav-icon far fa-plus-square"></i> 
                  Pengguna
                </span>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-striped">
                  <thead>
                    <tr align="center">
                      <th>No.</th>
                      <th>Username</th>
                      <th>Fullname</th>
                      <th>Role</th>
                      <th>Unit</th>
                      <th>Email</th>
                      <th>Join Date</th>
                      <th width="100px">Action</th>
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
                    $result = mysqli_query($con,"SELECT * FROM tb_user WHERE role != 'Superadmin' ORDER BY user_id DESC");

                    $no=0;
                    if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_array($result))
                      {
                        $no++;
                        echo "<tr>";
                        echo "<td>".$no.".</td>";
                        if ($row['username']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['username'] . "</td>";
                        }
                        if ($row['fullname']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['fullname'] . "</td>";
                        }
                        if ($row['role']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['role'] . "</td>";
                        }
                        if ($row['unit']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['unit'] . "</td>";
                        }
                        if ($row['email']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['email'] . "</td>";
                        }
                        if ($row['joindate']==NULL){
                          echo "<td>empty</td>";
                        }else{
                          echo "<td>".$row['joindate'] . "</td>";
                        }
                        echo "<td align= '' width='30px'>
                        <a href='#' data-toggle='modal' data-target='#edit$row[user_id]' title='Edit'><span class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> </span></a>
                        <a href='#' data-toggle='modal' data-target='#delete$row[user_id]' title='Delete'><span class='btn btn-danger btn-xs'><i class='fas fa-times'></i> </span></a>
                        <a href='#' data-toggle='modal' data-target='#updatefoto$row[user_id]' title='Ganti Foto'><span class='btn btn-default btn-xs'><i class='fas fa-camera'></i> </span></a>
                        <a href='#' data-toggle='modal' data-target='#change$row[user_id]' title='Ganti Password'><span class='btn btn-info btn-xs'><i class='fas fa-lock'></i> </span></a>
                        </td>";
                        echo "</tr>";
                        ?>

                        <!-- UPDATE -->
                        <div class="modal fade" id="edit<?php echo $row['user_id'];?>">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Update Pengguna</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="firtsname.lastname ..." value="<?php echo $row['username']; ?>">
                                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id']; ?>">
                                        <input type="hidden" class="form-control" name="date_user" value="<?php echo $row['date_user']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Fullname</label>
                                        <input type="text" class="form-control" name="fullname" placeholder="Fullname ..." value="<?php echo $row['fullname']; ?>">
                                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id']; ?>">
                                        <input type="hidden" class="form-control" name="date_user" value="<?php echo $row['date_user']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control select2bs4" name="role" style="width: 100%;">
                                          <option value="<?= $row['role'] ?>"><?= $row['role'] ?></option>
                                          <option value="">-- Pilih Role --</option>
                                          <option value="superadmin">Superadmin</option>
                                          <option value="admin">Admin</option>
                                          <option value="user">User</option>
                                          <option value="unit">Unit</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Unit</label>
                                        <input type="text" class="form-control" name="unit" value="<?php echo $row['unit']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="@Email ..." value="<?php echo $row['email']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Join Date</label>
                                        <input type="date" class="form-control" name="joindate" placeholder="Join Date ..." value="<?php echo $row['joindate']; ?>">
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
                        <div class="modal fade" id="delete<?php echo $row['user_id'];?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Delete Pengguna</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="">
                                  <div class="form-group">
                                    <div align="center">
                                      <img src="assets/img/faces/<?php echo $row['foto']; ?>"  class="lingkaran1">
                                    </div>
                                    <hr>
                                    <label>Hapus Data Pengguna?</label>
                                    <h6>Username : <b><u><?php echo $row['username'];?></u></b></h6>
                                    <h6>Fullname : <b><u><?php echo $row['fullname'];?></u></b></h6>
                                    <h6>Unit : <b><u><?php echo $row['unit'];?></u></b></h6>
                                    <h6>Role : <b><u><?php echo $row['role'];?></u></b></h6>
                                    <h6>Email : <b><u><?php echo $row['email'];?></u></b></h6>
                                    <input type="hidden" name="user_id" class="form-control" placeholder="client name" value="<?php echo $row['user_id'];?>" required>
                                  </div>
                                  <button type="submit" name="delete" class="btn btn-info btn-block btn-flat">Yes</button>
                                  <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">No</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- END DELETE -->

                        <!-- UPDATE FOTO -->
                        <div class="modal fade" id="updatefoto<?php echo $row['user_id'];?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Ubah Foto Profile</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <div align="center">
                                      <img src="assets/img/faces/<?php echo $row['foto']; ?>"  class="lingkaran1">
                                    </div>
                                    <hr>
                                    <label>Upload File</label>
                                    <input type="file" name="foto" placeholder="Upload ...">
                                    <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id'];?>" required>
                                  </div>
                                  <button type="submit" name="uploadfoto" class="btn btn-info btn-block btn-flat">Submit</button>
                                  <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">Close</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- END UPDATE FOTO -->

                        <!-- UPDATE PASSWORD -->
                        <div class="modal fade" id="change<?php echo $row['user_id'];?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title">Input Password Baru</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="">
                                  <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password Baru ..." required>
                                    <input type="hidden" name="user_id" class="form-control" placeholder="client name" value="<?php echo $row['user_id'];?>" required>
                                  </div>
                                  <button type="submit" name="changepassword" class="btn btn-info btn-block btn-flat">Ganti Password</button>
                                  <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal">Close</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- END UPDATE PASSWORD -->

                        <?php
                      }
                    }mysqli_close($con);
                    ?>
                  </tbody>
                  <tfoot>
                    <tr align="center">
                      <th>No.</th>
                      <th>Username</th>
                      <th>Fullname</th>
                      <th>Role</th>
                      <th>Unit</th>
                      <th>Email</th>
                      <th>Join Date</th>
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
