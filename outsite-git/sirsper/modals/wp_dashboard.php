<!-- Input IU(Informasi Umum) -->
<?php 
include "include/connection.php";

if(isset($_POST["create_dh"]))    
{    
  $id_logbook = $_POST['id_logbook'];
  $D_1 = $_POST['D_1'];
  $D_2 = $_POST['D_2'];
  $D_3 = $_POST['D_3'];
  $D_4 = $_POST['D_4'];
  $D_5 = $_POST['D_5'];
  $D_6 = $_POST['D_6'];
  $D_7 = $_POST['D_7'];
  $D_8 = $_POST['D_8'];
  $D_9 = $_POST['D_9'];
  $D_10 = $_POST['D_10'];
  $D_11 = $_POST['D_11'];
  $D_12 = $_POST['D_12'];
  $D_13 = $_POST['D_13'];
  $D_14 = $_POST['D_14'];
  $D_15 = $_POST['D_15'];
  $D_16 = $_POST['D_16'];
  $D_17 = $_POST['D_17'];
    // var_dump($_POST);die();

  $cek = mysql_query("SELECT * FROM tb_upload_logbook WHERE id_logbook ='$id_logbook'");
  $num = mysql_num_rows($cek);
  if($num == 1){
    $query = mysql_query("UPDATE tb_upload_logbook SET 
     D_1 = '$D_1',
     D_2 = '$D_2',
     D_3 = '$D_3',
     D_4 = '$D_4',
     D_5 = '$D_5',
     D_6 = '$D_6',
     D_7 = '$D_7',
     D_8 = '$D_8',
     D_9 = '$D_9',
     D_10 = '$D_10',
     D_11 = '$D_11',
     D_12 = '$D_12',
     D_13 = '$D_13',
     D_14 = '$D_14',
     D_15 = '$D_15',
     D_16 = '$D_16',
     D_17 = '$D_17'
     WHERE id_logbook ='$id_logbook'");
    // var_dump($query);die();
    if($query){
    // var_dump($query);die();
      header("Location: ./mdr_working_paper.php");                                                  
    } else {
      echo "Updated Failed - Please contact your Administrator";
    }
  } else {
    echo "Records cannot be found!! Please contact your System Administrator" ;
  }
}

?>

<div class="modal fade" id="DASHBOARD<?php echo $row['id_logbook'];?>" role="dialog">
  <div class="box-header with-border">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div>
          <img src="assets/images/mandiri-logo.png" width="120px">
          <div class="col-lg-12">
            <div align="center">
              <br><h4><b>INFORMASI UMUM</b></h4><hr>
            </div>
          </div>
        </div>
        <!-- <h4 class="modal-title"><b>[Document] <b><u><?php echo $row['id_logbook'];?> <?php echo $row['nm_customer'];?></u></b></h4> -->
      </div>
      <div class="modal-body">
        <form method="POST" action="">
          <div class="form-group">
            <!-- <input type="text" name="file" class="form-control" required/> -->
            <input type="hidden" name="id_logbook" value="<?php echo $row['id_logbook'];?>" />
          </div><!-- /.form group -->
          <label>ID : <b> <?php echo $row['id_logbook'];?></b></label><br>
          <label>Debitur : <b> <?php echo $row['nm_customer'];?></b></label><br>
          <label>Unit Kerja : <b> <?php echo $row['CBC_NAME'];?></b></label>
          
          <div class="row">
            <div class="col-lg-12">
              <div align="center">
                <hr><h4><b>Parameter Hasil Review Kualitas NAK yang terdampak</b></h4><hr>
              </div>
            </div>
            <div class="form-group col-lg-6">
              <label>Struktur</label><br>
              <input type="radio" name="D_1" value="Yes" <?= $row['D_1'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_1" value="No" <?= $row['D_1'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Asumsi & Penentuan Limit</label><br>
              <input type="radio" name="D_2" value="Yes" <?= $row['D_2'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_2" value="No" <?= $row['D_2'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Analisa Risiko & Mitigasi</label><br>
              <input type="radio" name="D_3" value="Yes" <?= $row['D_3'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_3" value="No" <?= $row['D_3'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Performance Lap Keu</label><br>
              <input type="radio" name="D_4" value="Yes" <?= $row['D_4'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_4" value="No" <?= $row['D_4'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Kesesuaian ketentuan & syarat</label><br>
              <input type="radio" name="D_5" value="Yes" <?= $row['D_5'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_5" value="No" <?= $row['D_5'] == 'No' ? 'checked' : '' ?>> No
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div align="center">
                <hr><h4><b>Parameter Hasil Review Kualitas kredit yang terdampak</b></h4><hr>
              </div>
            </div>
            <div class="form-group col-lg-6">
              <label>Penilaian Tiga Pilar</label><br>
              <input type="radio" name="D_6" value="Yes" <?= $row['D_6'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_6" value="No" <?= $row['D_6'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Parameter Watchlist</label><br>
              <input type="radio" name="D_7" value="Yes" <?= $row['D_7'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_7" value="No" <?= $row['D_7'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Covenant & Up BU</label><br>
              <input type="radio" name="D_8" value="Yes" <?= $row['D_8'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_8" value="No" <?= $row['D_8'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Tindak Lanjut & Progress</label><br>
              <input type="radio" name="D_9" value="Yes" <?= $row['D_9'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_9" value="No" <?= $row['D_9'] == 'No' ? 'checked' : '' ?>> No
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div align="center">
                <hr><h4><b>Parameter Hasil Review Day to Day Monitoring yang terdampak</b></h4><hr>
              </div>
            </div>
            <div class="form-group col-lg-12">
              <label>Kesesuaian tujuan penggunaan</label><br>
              <input type="radio" name="D_10" value="Yes" <?= $row['D_10'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_10" value="No" <?= $row['D_10'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-12">
              <div class="col-lg-12">
                <div align="center">
                  <hr><strong><b>Covenant</b></strong><hr>
                </div>
              </div>
              <label>Financial</label><br>
              <input type="radio" name="D_11" value="Yes" <?= $row['D_11'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_11" value="No" <?= $row['D_11'] == 'No' ? 'checked' : '' ?>> No
              <br>
              <label>Non Financial</label><br>
              <input type="radio" name="D_12" value="Yes" <?= $row['D_12'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_12" value="No" <?= $row['D_12'] == 'No' ? 'checked' : '' ?>> No
            </div>

            <div class="col-lg-12">
              <div align="center">
                <hr><strong><b>Kesesuaian underlying penarikan</b></strong><hr>
              </div>
            </div>
            <div class="form-group col-lg-12">
              <label>Dokumen</label><br>
              <input type="radio" name="D_13" value="Yes" <?= $row['D_13'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_13" value="No" <?= $row['D_13'] == 'No' ? 'checked' : '' ?>> No
              <br>
              <label>Asset</label><br>
              <input type="radio" name="D_14" value="Yes" <?= $row['D_14'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_14" value="No" <?= $row['D_14'] == 'No' ? 'checked' : '' ?>> No
            </div>

            <div class="col-lg-12">
              <div align="center">
                <hr><strong><b>Kinerja usaha & keuangan</b></strong><hr>
              </div>
            </div>
            <div class="form-group col-lg-12">
              <label>Lap. Keu</label><br>
              <input type="radio" name="D_15" value="Yes" <?= $row['D_15'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_15" value="No" <?= $row['D_15'] == 'No' ? 'checked' : '' ?>> No
              <br>
              <label>Transaksi</label><br>
              <input type="radio" name="D_16" value="Yes" <?= $row['D_16'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_16" value="No" <?= $row['D_16'] == 'No' ? 'checked' : '' ?>> No
              <br>
              <label>Periodic Call</label><br>
              <input type="radio" name="D_17" value="Yes" <?= $row['D_17'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="D_17" value="No" <?= $row['D_17'] == 'No' ? 'checked' : '' ?>> No
            </div>
          </div>
          <!-- /.form group -->
          <button type="submit" name="create_dh" value="submit" class="btn btn-bg btn-info btn-block">Submit</button>                       
          <button type="button" data-dismiss="modal" class="btn btn-bg btn-danger btn-block">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
