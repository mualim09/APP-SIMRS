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
      <div class="box-header with-border">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><?= $row_tipe['nama_tipe'] ?></h4>
          </div>
          <!-- START OF MODAL BODY-->
          <div class="modal-body">  
            <?php
            $tema = mysqli_query($con,"SELECT * FROM tb_tema WHERE tipe_id=".$row_tipe['id_tipe']."");    
            if(mysqli_num_rows($tema)>0){
              while($row_tema = mysqli_fetch_array($tema)) {
                ?>
                <p><a href="#" data-toggle="modal" data-target="#layer<?= $row_tema['id_tema'] ?>-<?php echo $row['id_logbook'];?>" class="button"><button class="btn bg-navy btn-block btn-flat"><font size="2px"><?= $row_tema['tema'] ?></font></button></a></p>
              <?php } } ?>
            </div>
            <!-- END OF APPLICATION FORM MODAL BODY -->
            <div class="modal-footer">
              <button type="button" class="btn bg-orange btn-block btn-flat" data-dismiss="modal">Close</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->   

        <?php
        $tema_2 = mysqli_query($con,"SELECT * FROM tb_tema WHERE tipe_id=".$row_tipe['id_tipe']."");    
        if(mysqli_num_rows($tema_2)>0){
          while($row_tema_2 = mysqli_fetch_array($tema_2)) {
            $tema_3 = mysqli_query($con,"SELECT * FROM tb_parameter WHERE id_logbook=".$row['id_logbook']." AND tema_id=".$row_tema_2['id_tema']." AND status_ccr='".$tipe_ccr."'");
            $row_tema_3 = mysqli_fetch_array($tema_3);
            // var_dump('<pre>',$row_tema_3);
            ?>
            <div class="modal" id="layer<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>" tabindex="1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
              <div class="box-header with-border">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="upload-avatar-title"><b><?= $row_tema_2['tema'] ?></b></h4>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="">
                      <input type="hidden" name="id_logbook" value="<?= $row['id_logbook'] ?>">
                      <input type="hidden" name="id_tema" value="<?= $row_tema_2['id_tema'] ?>">
                      <input type="hidden" name="status_ccr" value="<?= $tipe_ccr ?>">
                      <div class="form-group">
                        <label  class="">Hasil Review</label>
                        <textarea type="text" placeholder="Hasil Review..." name="hasil_review" class="form-control" required><?= $row_tema_3['hasil_review'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <label  class="">Dashboard</label>
                        <select class="form-control" name="dashboard" required>
                          <option value="">--- Select ---</option>
                          <option value="blank" <?= !empty($row_tema_3['dashboard']) && $row_tema_3['dashboard'] == 'blank' ? 'selected' : '' ?>>Blank</option>
                          <option value="Penilaian Tiga Pilar" <?= !empty($row_tema_3['dashboard']) && $row_tema_3['dashboard'] == 'Penilaian Tiga Pilar' ? 'selected' : '' ?>>Penilaian Tiga Pilar</option>
                          <option value="Parameter Watchlist" <?= !empty($row_tema_3['dashboard']) && $row_tema_3['dashboard'] == 'Parameter Watchlist' ? 'selected' : '' ?>>Parameter Watchlist</option>
                          <option value="Covenant & Up BU" <?= !empty($row_tema_3['dashboard']) && $row_tema_3['dashboard'] == 'Covenant & Up BU' ? 'selected' : '' ?>>Covenant & Up BU</option>
                          <option value="Tindak Lanjut & Progress" <?= !empty($row_tema_3['dashboard']) && $row_tema_3['dashboard'] == 'Tindak Lanjut & Progress' ? 'selected' : '' ?>>Tindak Lanjut & Progress</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label  class="">Tindak Lanjut</label>
                        <select class="form-control" name="tindak" required>
                          <option value="">--- Select ---</option>
                          <option value="Yes" <?= !empty($row_tema_3['tindak_lanjut']) && $row_tema_3['tindak_lanjut'] == 'Yes' ? 'selected' : '' ?>>Yes</option>
                          <option value="No" <?= !empty($row_tema_3['tindak_lanjut']) && $row_tema_3['tindak_lanjut'] == 'No' ? 'selected' : '' ?>>No</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label  class="">Saran Perbaikan</label>
                        <textarea type="text" placeholder="Saran Perbaikan..." name="saran" class="form-control" required><?= $row_tema_3['saran_perbaikan'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <label  class="">Target Date</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="date" value="<?= $row_tema_3['target_date'] ?>" name="target_date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="">Tanggapan</label>
                        <textarea type="text" placeholder="Tanggapan.." name="tanggapan" class="form-control"><?= $row_tema_3['tanggapan'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <label  class="">Report</label>
                        <select id="report-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>" class="form-control" name="report" required>
                          <option value="">--- Select ---</option>
                          <option value="Quick Report" <?= !empty($row_tema_3['report']) && $row_tema_3['report'] == 'Quick Report' ? 'selected' : '' ?>>Quick Report</option>
                          <option value="Recommendation Report" <?= !empty($row_tema_3['report']) && $row_tema_3['report'] == 'Recommendation Report' ? 'selected' : '' ?>>Recommendation Report</option>
                        </select>
                      </div>
                      <!-- Rekomendasi Report -->
                      <!-- <div id="report1-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>" style="<?= !empty($row_tema_3['report']) && $row_tema_3['report'] != 'Quick Report' ? 'display:block' : 'display:none' ?>" class="form-group">
                        <label  class="">Risiko</label>
                        <input type="text" value="<?= $row_tema_3['Risiko'] ?>" name="Risiko" class="form-control">
                      </div>
                      <div id="report2-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>" style="<?= !empty($row_tema_3['report']) && $row_tema_3['report'] != 'Quick Report' ? 'display:block' : 'display:none' ?>" class="form-group">
                        <label  class="">Dampak</label>
                        <input type="text" value="<?= $row_tema_3['Dampak'] ?>" name="Dampak" class="form-control">
                      </div>
                      <div id="report3-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>" style="<?= !empty($row_tema_3['report']) && $row_tema_3['report'] != 'Quick Report' ? 'display:block' : 'display:none' ?>" class="form-group">
                        <label  class="">Mitigasi</label>
                        <input type="text" value="<?= $row_tema_3['Mitigasi'] ?>" name="Mitigasi" class="form-control">
                      </div> -->
                      <!-- Quick Report -->
                      <div id="report4-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>" style="<?= !empty($row_tema_3['report']) && $row_tema_3['report'] == 'Quick Report' ? 'display:block' : 'display:none' ?>" class="form-group">
                        <label  class="">Kronologis Permasalahan</label>
                        <input type="text" value="<?= $row_tema_3['KP'] ?>" name="KP" class="form-control">
                      </div>
                      <!-- <div class="form-group">
                        <label  class="">CHR</label>
                        <select id="chr-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>" class="form-control" name="chr">
                          <option value="">--- Select ---</option>
                          <option value="0" <?= !empty($row_tema_3['CHR']) && $row_tema_3['CHR'] == 0 ? 'selected' : '' ?>>0</option>
                          <option value="1" <?= !empty($row_tema_3['CHR']) && $row_tema_3['CHR'] == 1 ? 'selected' : '' ?>>1</option>
                        </select>
                      </div>
                      <div id="bobot1-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>" style="<?= !empty($row_tema_3['CHR']) && $row_tema_3['CHR'] == 0 ? 'display:block' : 'display:none' ?>" class="form-group">
                        <label  class="">Bobot</label>
                        <select class="form-control" name="bobot">
                          <option value=""></option>
                        </select>
                      </div> -->
                      <div id="bobot2-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>" style="<?= !empty($row_tema_3['CHR']) && $row_tema_3['CHR'] == 1 ? 'display:block' : 'display:none' ?>" class="form-group">
                        <label  class="">Bobot</label>
                        <select class="form-control" name="bobot">
                          <option value="Major" <?= !empty($row_tema_3['bobot']) && $row_tema_3['bobot'] == 'Major' ? 'selected' : '' ?>>Major</option>
                          <option value="Minor" <?= !empty($row_tema_3['bobot']) && $row_tema_3['bobot'] == 'Minor' ? 'selected' : '' ?>>Minor</option>
                        </select>
                      </div>
                      <?php if (!empty($row_tema_3['id_logbook'])) { ?>
                        <input type="hidden" name="id_par" value="<?= !empty($row_tema_3['id_par']) ? $row_tema_3['id_par'] : '' ?>">
                      <?php } ?>
                      <button type="submit" name="<?= !empty($row_tema_3['id_logbook']) ? 'review_update' : 'review' ?>" value="<?= !empty($row_tema_3['id_logbook']) ? 'review_update' : 'review' ?>" class="btn btn-success btn-block btn-flat">Submit</button>
                      <a href="#" data-toggle="modal" data-target="#layer<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>"><button type="button" class="btn btn-primary btn-block btn-flat">Back</button></a>
                    </form>
                  </div>                                
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
            <script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
            <script type="text/javascript">
              $('#chr-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>').on('change', function () {
                var chr = $(this).val()
                var bobot1 = $('#bobot1-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>')
                var bobot2 = $('#bobot2-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>')

                if (chr == 1 || chr == '1') {
                  bobot1.hide()
                  bobot2.show()
                } else {
                  bobot2.hide()
                  bobot1.show()
                }
              })


              $('#report-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>').on('change', function() {
                var report = $(this).val()
                var report1 = $('#report1-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>')
                var report2 = $('#report2-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>')
                var report3 = $('#report3-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>')
                var report4 = $('#report4-<?= $row_tema_2['id_tema'] ?>-<?php echo $row['id_logbook'];?>')

                if (report == 'Quick Report') {
                  report1.hide()
                  report2.hide()
                  report3.hide()
                  report4.show()
                } else if (report == 'Recommendation Report') {
                  report1.show()
                  report2.show()
                  report3.show()
                  report4.hide()
                } else {
                  report1.hide()
                  report2.hide()
                  report3.hide()
                  report4.hide()
                }
              });
            </script>
          <?php } } ?>

        </div>
        <?php } } ?>