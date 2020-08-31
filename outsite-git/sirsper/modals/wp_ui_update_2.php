<?php
$con=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
    // Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// $result = mysqli_query($con,"SELECT * FROM tb_logbook ". (($query1 != '') ? " where $query1 " : " GROUP BY CBC_NAME");    
$tipe = mysqli_query($con,"SELECT * FROM tb_tipe");    

if(mysqli_num_rows($tipe)>0) {
  while($row_tipe = mysqli_fetch_array($tipe)) {
?>
  <div class="modal" id="REVIEW-<?php echo $row_tipe['id_tipe'];?>-<?php echo $row['id_logbook'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myModalLabel"><?= $row_tipe['nama_tipe'] ?></h4>
        </div>
        <!-- START OF MODAL BODY-->
        <div class="modal-body">  
          <?php
            $tema = mysqli_query($con,"SELECT * FROM tb_tema a JOIN tb_parameter b ON a.id_tema=b.tema_id WHERE tipe_id=".$row_tipe['id_tipe']." AND id_logbook='".$row['id_logbook']."' AND b.tindak_lanjut='Yes'");    
            if(mysqli_num_rows($tema)>0){
              while($row_tema = mysqli_fetch_array($tema)) {
          ?>
            <p><a href="#" data-toggle="modal" data-target="#layer<?= $row_tema['id_tema'] ?>-<?php echo $row['id_logbook'];?>" class="button"><button class="btn btn-block btn-primary"><font size="2px"><?= $row_tema['tema'] ?></font></button></a></p>
          <?php } } ?>
        </div>
        <!-- END OF APPLICATION FORM MODAL BODY -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->   

    <?php
      $tema_2 = mysqli_query($con,"SELECT * FROM tb_tema a JOIN tb_parameter b ON a.id_tema=b.tema_id WHERE tipe_id=".$row_tipe['id_tipe']." AND id_logbook='".$row['id_logbook']."'");    
      if(mysqli_num_rows($tema_2)>0){
        while($row_tema_2 = mysqli_fetch_array($tema_2)) {
        	$date = explode('-', $row_tema_2['target_date']);
        	$tanggal = $date[1] . '/' . $date[2] . '/' . $date[0];

    ?>
      <div class="modal" id="layer<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>" tabindex="1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
              <h4 class="modal-title" id="upload-avatar-title"><b><?= $row_tema_2['tema'] ?></b></h4>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <input type="hidden" name="id_logbook" value="<?= $row_tema_2['id_logbook'] ?>">
                <input type="hidden" name="id_tema" value="<?= $row_tema_2['id_tema'] ?>">
                <div class="form-group">
                  <label  class="">Hasil Review</label>
                  <textarea type="text" placeholder="Hasil Review..." name="hasil_review" class="form-control" value="<?= $row_tema_2['hasil_review'] ?>" required <?= ($_SESSION['role'] == 'Atasan I' || $_SESSION['role'] == 'Atasan II' ? 'readonly' : '') ?>></textarea>
                </div>
                <div class="form-group">
                  <label  class="">Tindak Lanjut</label>
                  <select class="form-control" name="tindak" <?= ($_SESSION['role'] == 'Atasan I' || $_SESSION['role'] == 'Atasan II' ? 'readonly' : '') ?>>
                    <option value="">--- Select ---</option>
                    <option value="Yes" <?= $row_tema_2['tindak_lanjut'] == 'Yes' ? 'selected' : null ?>>Yes</option>
                    <option value="No" <?= $row_tema_2['tindak_lanjut'] == 'No' ? 'selected' : null ?>>No</option>
                  </select>
                </div>
                <div class="form-group">
                  <label  class="">Saran Perbaikan</label>
                  <textarea type="text" placeholder="Saran Perbaikan..." name="saran" value="<?= $row_tema_2['saran_perbaikan'] ?>" class="form-control" <?= ($_SESSION['role'] == 'Atasan I' || $_SESSION['role'] == 'Atasan II' ? 'readonly' : '') ?>></textarea>
                </div>
                <div class="form-group">
                  <label  class="">Target Date</label>
                  <input type="date" name="target_date" class="form-control" value="<?= $tanggal ?>" <?= ($_SESSION['role'] == 'Atasan I' || $_SESSION['role'] == 'Atasan II' ? 'readonly' : '') ?>>
                </div>
                <div class="form-group">
                  <label  class="">Tanggapan</label>
                  <textarea type="text" placeholder="Tanggapan.." name="tanggapan" value="<?= $row_tema_2['tanggapan'] ?>" class="form-control" <?= ($_SESSION['role'] == 'Atasan I' || $_SESSION['role'] == 'Atasan II' ? 'readonly' : '') ?>></textarea>
                </div>
                <div class="form-group">
                  <label  class="">Report</label>
                  <select class="form-control" name="report" <?= ($_SESSION['role'] == 'Atasan I' || $_SESSION['role'] == 'Atasan II' ? 'readonly' : '') ?>>
                    <option value="">--- Select ---</option>
                    <option value="Quick Report" <?= $row_tema_2['report'] == 'Quick Report' ? 'selected' : null ?>>Quick Report</option>
                    <option value="Recommendation Report" <?= $row_tema_2['report'] == 'Recommendation Report' ? 'selected' : null ?>>Recommendation Report</option>
                  </select>
                </div>
                <div class="form-group">
                  <label  class="">CHR</label>
                  <select class="form-control" name="chr" <?= ($_SESSION['role'] == 'Atasan I' || $_SESSION['role'] == 'Atasan II' ? 'readonly' : '') ?>>
                    <option value="">--- Select ---</option>
                    <option value="0" <?= $row_tema_2['chr'] == 0 ? 'selected' : null ?>>0</option>
                    <option value="1" <?= $row_tema_2['chr'] == 1 ? 'selected' : null ?>>1</option>
                  </select>
                </div>
                <div class="form-group">
                  <label  class="">Bobot</label>
                  <select class="form-control" name="bobot" <?= ($_SESSION['role'] == 'Atasan I' || $_SESSION['role'] == 'Atasan II' ? 'readonly' : '') ?>>
                    <option value="" <?= $row_tema_2['bobot'] == '' ? 'selected' : null ?>></option>
                    <option value="Major" <?= $row_tema_2['bobot'] == 'Major' ? 'selected' : null ?>>Major</option>
                    <option value="Minor" <?= $row_tema_2['bobot'] == 'Minor' ? 'selected' : null ?>>Minor</option>
                  </select>
                </div>
                <div class="form-group">
                  <label  class="">Status</label>
                  <select class="form-control" name="status" <?= ($_SESSION['role'] == 'Atasan I' || $_SESSION['role'] == 'Atasan II' ? 'readonly' : '') ?>>
                    <option value="">--- Select ---</option>
                    <option value="0" <?= $row_tema_2['status'] == 0 ? 'selected' : null ?>>Pending</option>
                    <option value="1" <?= $row_tema_2['status'] == 1 ? 'selected' : null ?>>Close</option>
                    <option value="1" <?= $row_tema_2['status'] == 2 ? 'selected' : null ?>>Continue</option>
                  </select>
                </div>
                <div class="form-group">
                    <label  class="">Komentar</label>
                    <textarea type="text" placeholder="Komentar.." name="komentar" value="<?= $row_tema_2['komentar'] ?>" class="form-control" <?= ($_SESSION['role'] == 'Reviewer' ? 'readonly' : '') ?>></textarea>
                  </div>

                <?php if ($_SESSION['role'] == 'Atasan I' || $_SESSION['role'] == 'Atasan II') { ?>
                  <div class="form-group">
                    <label  class="">Komentar</label>
                    <textarea type="text" placeholder="Komentar.." name="komentar" value="<?= $row_tema_2['komentar'] ?>" class="form-control"></textarea>
                  </div>
                <?php } ?>
                <!-- <a href="#" data-toggle="modal" data-target="#res_layer1"><button type="button" class="btn btn-default">View</button></a> -->
                <button type="submit" name="review" value="review" class="btn btn-info btn-block">Save</button><br>
                <a href="#" data-toggle="modal" data-target="#layer<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>"><button type="button" class="btn btn-danger btn-block">Back</button></a>
              </form>
            </div>                                
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>
    <?php } } ?>

  </div>
<?php } } ?>