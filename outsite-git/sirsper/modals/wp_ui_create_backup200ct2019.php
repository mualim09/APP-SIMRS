<!-- Input IU(Informasi Umum) -->
<?php 
include "include/connection.php";

if(isset($_POST["create_iu"]))    
{    
  $id_logbook = $_POST['id_logbook'];
  $LIMIT_LOG = $_POST['LIMIT_LOG'];
  $BADE_LOG = $_POST['BADE_LOG'];
  $JNS_KRD = $_POST['JNS_KRD'];
  $KOL_LOG = $_POST['KOL_LOG'];
  $BidangUsaha = $_POST['BidangUsaha'];
  $his_pem_kre = $_POST['his_pem_kre'];
  $cur_is_in = $_POST['cur_is_in'];
  $his_pem_kol = $_POST['his_pem_kol'];
  $earl_war = $_POST['earl_war'];
  $EKA = $_POST['EKA'];
  $UAS = $_POST['UAS'];
  $WTC = $_POST['WTC'];
  $AP = $_POST['AP'];
  $KB = $_POST['KB'];
  $EKN = $_POST['EKN'];
  $LL = $_POST['LL'];
  $C_1 = $_POST['C_1'];
  $C_2 = $_POST['C_2'];
  $C_3 = $_POST['C_3'];
  $C_4 = $_POST['C_4'];
  $C_5 = $_POST['C_5'];
  $C_6 = $_POST['C_6'];
  $C_7 = $_POST['C_7'];
  $C_8 = $_POST['C_8'];
  $C_9 = $_POST['C_9'];
  $C_10 = $_POST['C_10'];
  $C_11 = $_POST['C_11'];
  $C_12 = $_POST['C_12'];
  $C_13 = $_POST['C_13'];
  $C_14 = $_POST['C_14'];
  $limit_ex = $_POST['limit_ex'];
  $bade_bank_lain = $_POST['bade_bank_lain'];
  $gusaha = $_POST['gusaha'];
  $rating = $_POST['rating'];
  $ioutlook = $_POST['ioutlook'];
  $PG = $_POST['PG'];
  $HP = $_POST['HP'];
    // var_dump($_POST);die();

  $cek = mysql_query("SELECT * FROM tb_upload_logbook WHERE id_logbook ='$id_logbook'");
  $num = mysql_num_rows($cek);
  if($num == 1){
    $query = mysql_query("UPDATE tb_upload_logbook SET LIMIT_LOG = '$LIMIT_LOG', BADE_LOG = '$BADE_LOG', JNS_KRD = '$JNS_KRD', 
     KOL_LOG = '$KOL_LOG', BidangUsaha = '$BidangUsaha', 
     his_pem_kre = '$his_pem_kre', cur_is_in = '$cur_is_in', 
     his_pem_kol = '$his_pem_kol', earl_war = '$earl_war', 
     EKA = '$EKA', UAS = '$UAS', 
     WTC = '$WTC', AP = '$AP', 
     KB = '$KB', EKN = '$EKN', LL = '$LL',
     C_1 = '$C_1',
     C_2 = '$C_2',
     C_3 = '$C_3',
     C_4 = '$C_4',
     C_5 = '$C_5',
     C_6 = '$C_6',
     C_7 = '$C_7',
     C_8 = '$C_8',
     C_9 = '$C_9',
     C_10 = '$C_10',
     C_11 = '$C_11',
     C_12 = '$C_12',
     C_13 = '$C_13',
     C_14 = '$C_14',
     limit_ex = '$limit_ex',
     bade_bank_lain = '$bade_bank_lain',
     gusaha = '$gusaha',
     rating = '$rating',
     ioutlook = '$ioutlook',
     PG = '$PG',
     HP = '$HP'
     WHERE id_logbook ='$id_logbook'");
    var_dump($query);die();
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

<div class="modal fade" id="IUCREATE<?php echo $row['id_logbook'];?>" role="dialog">
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
          <hr>
          <div class="row">
            <div class="form-group col-lg-6">
              <label>NAK, CBI, dan SS (Untuk KMK minimal 2 tahunterakhirdan KI Pemberian, Perubahandan Review Tahunan)</label><br>
              <input type="radio" name="C_1" value="Yes" <?= $row['C_1'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_1" value="No" <?= $row['C_1'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Laporan Watchlist</label><br>
              <input type="radio" name="C_2" value="Yes" <?= $row['C_2'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_2" value="No" <?= $row['C_2'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Laporan Review Kolektibilitas</label><br>
              <input type="radio" name="C_3" value="Yes" <?= $row['C_3'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_3" value="No" <?= $row['C_3'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Laporan Keuangan Inhouse maupun Audited</label><br>
              <input type="radio" name="C_4" value="Yes" <?= $row['C_4'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_4" value="No" <?= $row['C_4'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Laporan Stock & Piutang</label><br>
              <input type="radio" name="C_5" value="Yes" <?= $row['C_5'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_5" value="No" <?= $row['C_5'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Laporan OTS dan Call Report</label><br>
              <input type="radio" name="C_6" value="Yes" <?= $row['C_6'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_6" value="No" <?= $row['C_6'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Laporan Trade Checking/konfirmasiBouwheer/Sejenis</label><br>
              <input type="radio" name="C_7" value="Yes" <?= $row['C_7'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_7" value="No" <?= $row['C_7'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Laporan Annual Review</label><br>
              <input type="radio" name="C_8" value="Yes" <?= $row['C_8'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_8" value="No" <?= $row['C_8'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Laporan Obligo</label><br>
              <input type="radio" name="C_9" value="Yes" <?= $row['C_9'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_9" value="No" <?= $row['C_9'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Transaksi Keuangan Usaha</label><br>
              <input type="radio" name="C_10" value="Yes" <?= $row['C_10'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_10" value="No" <?= $row['C_10'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>SLIK OJK</label><br>
              <input type="radio" name="C_11" value="Yes" <?= $row['C_11'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_11" value="No" <?= $row['C_11'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Dokumen Underlying</label><br>
              <input type="radio" name="C_12" value="Yes" <?= $row['C_12'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_12" value="No" <?= $row['C_12'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>KJPP Report dan Review CO</label><br>
              <input type="radio" name="C_13" value="Yes" <?= $row['C_13'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_13" value="No" <?= $row['C_13'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>Review Covenant</label><br>
              <input type="radio" name="C_14" value="Yes" <?= $row['C_14'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_14" value="No" <?= $row['C_14'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Total Limit</label>
              <input type="text" name="LIMIT_LOG" value="<?php echo $row['LIMIT_LOG'];?>" class="form-control" readonly/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Total Bade</label>
              <input type="text" name="BADE_LOG" value="<?php echo $row['BADE_LOG'];?>" class="form-control" readonly/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Fasilitas Kredit</label>
              <input type="text" name="JNS_KRD" value="<?php echo $row['JNS_KRD'];?>" class="form-control" readonly/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Kolektibilitas</label>
              <input type="text" name="KOL_LOG" value="<?php echo $row['KOL_LOG'];?>" class="form-control" readonly/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Bidang Usaha</label>
              <input type="text" name="BidangUsaha" value="<?php echo $row['BidangUsaha'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Total Limit Bank Lain</label>
              <input type="text" name="limit_ex" value="<?php echo $row['limit_ex'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Total Bade Bank Lain</label>
              <input type="text" name="bade_bank_lain" value="<?php echo $row['bade_bank_lain'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Group Usaha</label>
              <input type="text" name="gusaha" value="<?php echo $row['gusaha'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Rating</label>
              <input type="text" name="rating" value="<?php echo $row['rating'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Industri Outlook</label>
              <input type="text" name="ioutlook" value="<?php echo $row['ioutlook'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Portfolio Guideline</label>
              <input type="text" name="PG" value="<?php echo $row['PG'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Historical Pembayaran</label>
              <input type="text" name="HP" value="<?php echo $row['HP'];?>" class="form-control"/>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div align="center">
                <hr><h4><b>Nota Allert</b></h4><hr>
              </div>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Periode </label>
              <textarea type="text" name="his_pem_kre" class="form-control" required><?php echo $row['his_pem_kre'];?></textarea>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Usulan Kolektibilitas </label>
              <textarea type="text" name="his_pem_kre" class="form-control" required><?php echo $row['his_pem_kre'];?></textarea>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Usulan Watchlist </label>
              <textarea type="text" name="his_pem_kre" class="form-control" required><?php echo $row['his_pem_kre'];?></textarea>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Account Strategy </label>
              <textarea type="text" name="his_pem_kre" class="form-control" required><?php echo $row['his_pem_kre'];?></textarea>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Catatan Up BU </label>
              <textarea type="text" name="his_pem_kre" class="form-control" required><?php echo $row['his_pem_kre'];?></textarea>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">TindakLanjut </label>
              <textarea type="text" name="his_pem_kre" class="form-control" required><?php echo $row['his_pem_kre'];?></textarea>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Time line </label>
              <textarea type="text" name="his_pem_kre" class="form-control" required><?php echo $row['his_pem_kre'];?></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div align="center">
                <hr><h4><b>Concern Penilaian Tiga Pilar (Root Cause)</b></h4><hr>
              </div>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Kemampuan Membayar</label>
              <textarea type="text" name="cur_is_in" class="form-control" required><?php echo $row['cur_is_in'];?></textarea>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Kinerja Usaha</label>
              <textarea type="text" name="cur_is_in" class="form-control" required><?php echo $row['cur_is_in'];?></textarea>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Prospek Usaha</label>
              <textarea type="text" name="cur_is_in" class="form-control" required><?php echo $row['cur_is_in'];?></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div align="center">
                <hr><h4><b>Parameter Watchlist</b></h4><hr>
              </div>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <textarea type="text" name="cur_is_in" class="form-control" required><?php echo $row['cur_is_in'];?></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div align="center">
                <hr><h4><b>Covenant& Up BU</b></h4><hr>
              </div>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Hasil Review</label>
              <textarea type="text" name="cur_is_in" class="form-control" required><?php echo $row['cur_is_in'];?></textarea>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Tindak Lanjut</label>
              <textarea type="text" name="cur_is_in" class="form-control" required><?php echo $row['cur_is_in'];?></textarea>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Timeline</label>
              <textarea type="text" name="cur_is_in" class="form-control" required><?php echo $row['cur_is_in'];?></textarea>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Status</label>
              <textarea type="text" name="cur_is_in" class="form-control" required><?php echo $row['cur_is_in'];?></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div align="center">
                <hr><h4><b>Action Plan & Progress</b></h4><hr>
              </div>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Hasil Review</label>
              <textarea type="text" name="cur_is_in" class="form-control" required><?php echo $row['cur_is_in'];?></textarea>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Tindak Lanjut</label>
              <textarea type="text" name="cur_is_in" class="form-control" required><?php echo $row['cur_is_in'];?></textarea>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Timeline</label>
              <textarea type="text" name="cur_is_in" class="form-control" required><?php echo $row['cur_is_in'];?></textarea>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Status</label>
              <textarea type="text" name="cur_is_in" class="form-control" required><?php echo $row['cur_is_in'];?></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div align="center">
                <hr><h4><b>Histori Pembayaran & Kolektibilitas</b></h4><hr>
              </div>
            </div>
          <!-- <div class="form-group">
            <label align="center">Histori Pembayaran dan Kolektibilitas</label>
            <textarea type="text" name="his_pem_kol" class="form-control" required><?php echo $row['his_pem_kol'];?></textarea>
          </div>
          <div class="form-group">
            <hr><h4><label align="center">EARLY WARNING</label></h4><hr>
          </div>
          <div class="form-group">
            <label align="center">Early Warning</label>
            <textarea type="text" name="earl_war" class="form-control" required><?php echo $row['earl_war'];?></textarea>
          </div>
          <div class="form-group">
            <hr><h4><label align="center">Keterangan</label></h4><hr>
          </div> -->
          <div class="form-group form-group col-lg-12 col-lg-12">
            <label align="center">Estimasi Kolektibilitas</label>
            <textarea type="text" name="EKA" class="form-control" required><?php echo $row['EKA'];?></textarea>
          </div>
          <div class="form-group form-group col-lg-12 col-lg-12">
            <label align="center">Account Strategy</label>
            <textarea type="text" name="UAS" class="form-control" required><?php echo $row['UAS'];?></textarea>
          </div>
          <div class="form-group form-group col-lg-12 col-lg-12">
            <label align="center">Wacthlist</label>
            <textarea type="text" name="WTC" class="form-control" required><?php echo $row['WTC'];?></textarea>
          </div>
          <!-- <div class="form-group">
            <label align="center">Action Plan</label>
            <textarea type="text" name="AP" class="form-control" required><?php echo $row['AP'];?></textarea>
          </div>
          <div class="form-group">
            <label align="center">Klasifikasi Debitur</label>
            <textarea type="text" name="KB" class="form-control" required><?php echo $row['KB'];?></textarea>
          </div>
          <div class="form-group">
            <label align="center">% Error Kualitas NAK</label>
            <textarea type="text" name="EKN" class="form-control" required><?php echo $row['EKN'];?></textarea>
          </div>
          <div class="form-group">
            <label align="center">Lesson Learned</label>
            <textarea type="text" name="LL" class="form-control" required><?php echo $row['LL'];?></textarea>
          </div> -->
        </div>
        <!-- /.form group -->
        <button type="submit" name="create_iu" value="submit" class="btn btn-bg btn-info">Submit</button>                       
        <button type="button" data-dismiss="modal" class="btn btn-bg btn-warning">Close</button>
      </form>
    </div>
  </div>
</div>
</div>
