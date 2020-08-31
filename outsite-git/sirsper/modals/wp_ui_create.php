<!-- Input IU(Informasi Umum) -->
<?php 
include "include/connection.php";

if(isset($_POST["create_iu"]))    
{    
  $id_logbook = $_POST['id_logbook'];
  $JNS_KRD = $_POST['JNS_KRD'];
  $KOL_LOG = $_POST['KOL_LOG'];
  $BidangUsaha = $_POST['BidangUsaha'];
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
    $query = mysql_query("UPDATE tb_upload_logbook SET 
     JNS_KRD = '$JNS_KRD',KOL_LOG = '$KOL_LOG',BidangUsaha = '$BidangUsaha',
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
    // var_dump($query);exit();
    if($query){
    // var_dump($query);exit();
      echo '<script>window.location.href = "./mdr_working_paper_nak.php?ntf=98"</script>';
     // header("Location: ./mdr_working_paper_nak.php?ntf=1");                              
   } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} else {
  echo "Records cannot be found!! Please contact your System Administrator";
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
            <div class="col-lg-12">
              <br><h5><b>PEMENUHAN DATA</b></h5><hr>
            </div>
            <div class="form-group col-lg-4">
              <label>1. NAK, CBI, dan SS (Untuk KMK minimal 2 tahun terakhir dan KI Pemberian, Perubahandan Review Tahunan)</label><br>
              <input type="radio" name="C_1" value="Yes" <?= $row['C_1'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_1" value="No" <?= $row['C_1'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-4">
              <label>2. Laporan Watchlist</label><br>
              <input type="radio" name="C_2" value="Yes" <?= $row['C_2'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_2" value="No" <?= $row['C_2'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-4">
              <label>3. Laporan Review Kolektibilitas</label><br>
              <input type="radio" name="C_3" value="Yes" <?= $row['C_3'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_3" value="No" <?= $row['C_3'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-4">
              <label>4. Laporan Keuangan Inhouse maupun Audited</label><br>
              <input type="radio" name="C_4" value="Yes" <?= $row['C_4'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_4" value="No" <?= $row['C_4'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-4">
              <label>5. Stock & Piutang</label><br>
              <input type="radio" name="C_5" value="Yes" <?= $row['C_5'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_5" value="No" <?= $row['C_5'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-4">
              <label>6. Laporan OTS dan Call Report</label><br>
              <input type="radio" name="C_6" value="Yes" <?= $row['C_6'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_6" value="No" <?= $row['C_6'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-4">
              <label>7. Laporan Trade Checking/konfirmasi Bouwheer/Sejenis</label><br>
              <input type="radio" name="C_7" value="Yes" <?= $row['C_7'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_7" value="No" <?= $row['C_7'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-4">
              <label>8. Laporan Annual Review</label><br>
              <input type="radio" name="C_8" value="Yes" <?= $row['C_8'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_8" value="No" <?= $row['C_8'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-4">
              <label>9. Laporan Obligo</label><br>
              <input type="radio" name="C_9" value="Yes" <?= $row['C_9'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_9" value="No" <?= $row['C_9'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-4">
              <label>10. Transaksi Keuangan Usaha</label><br>
              <input type="radio" name="C_10" value="Yes" <?= $row['C_10'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_10" value="No" <?= $row['C_10'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-4">
              <label>11. SLIK OJK</label><br>
              <input type="radio" name="C_11" value="Yes" <?= $row['C_11'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_11" value="No" <?= $row['C_11'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-4">
              <label>12. Dokumen Underlying</label><br>
              <input type="radio" name="C_12" value="Yes" <?= $row['C_12'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_12" value="No" <?= $row['C_12'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-4">
              <label>13. KJPP Report dan Review CO</label><br>
              <input type="radio" name="C_13" value="Yes" <?= $row['C_13'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_13" value="No" <?= $row['C_13'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-4">
              <label>14. Review Covenant</label><br>
              <input type="radio" name="C_14" value="Yes" <?= $row['C_14'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="C_14" value="No" <?= $row['C_14'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="col-lg-12">
              <div align="center">
                <br><h4><b></b></h4><hr>
              </div>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Total Limit</label>
              <div class="input-group">
                <span class="input-group-addon">Rp.</span>
                <input type="text" value="<?php echo "Rp. " . number_format($row['LIMIT_LOG'],0,',','.').""?>" class="form-control" readonly/>
              </div>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Total Bade</label>
              <div class="input-group">
                <span class="input-group-addon">Rp.</span>
                <input type="text" value="<?php echo "Rp. " . number_format($row['BADE_LOG'],0,',','.').""?>" class="form-control" readonly/>
              </div>
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
              <input type="text" name="BidangUsaha" placeholder="Bidang Usaha..." value="<?php echo $row['BidangUsaha'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Total Limit Bank Lain</label>
              <div class="input-group">
                <span class="input-group-addon">Rp.</span>
                <input type="text" name="limit_ex" id="uang" placeholder="Rp. ...." value="<?php echo $row['limit_ex'];?>" class="form-control"/>
              </div>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Total Bade Bank Lain</label>
              <div class="input-group">
                <span class="input-group-addon">Rp.</span>
                <input type="text" name="bade_bank_lain" id="uang1" placeholder="Rp. ...." value="<?php echo $row['bade_bank_lain'];?>" class="form-control"/>
              </div>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Group Usaha</label>
              <input type="text" name="gusaha" placeholder="Group Usaha..." value="<?php echo $row['gusaha'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Rating</label>
              <input type="text" name="rating" placeholder="Rating..." value="<?php echo $row['rating'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Industri Outlook</label>
              <input type="text" name="ioutlook" placeholder="Industri Outlook..." value="<?php echo $row['ioutlook'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Portfolio Guideline</label>
              <input type="text" name="PG" placeholder="Portfolio Guideline..." value="<?php echo $row['PG'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Historical Pembayaran</label>
              <input type="text" name="HP" placeholder="Historical Pembayaran..." value="<?php echo $row['HP'];?>" class="form-control"/>
            </div>
          </div>
          <!-- /.form group -->
          <button type="submit" name="create_iu" value="submit" class="btn btn-bg btn-success btn-block btn-flat">Submit</button>
          <button type="button" data-dismiss="modal" class="btn bg-orange btn-block btn-flat">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  // $(function () {
    function formatRupiah(angka, prefix) {
      var number_string = angka.toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    $('#wp').dataTable({
      "footerCallback": function ( row, data, start, end, display ) {
          var api = this.api(), data;
          var intVal = function ( i ) {
              return typeof i === 'string' ? i.replace(/[\Rp.]/g, '')*1 :
                  typeof i === 'number' ?
                      i : 0;
          };
          total = api
              .column(5)
              .data()
              .reduce( function (a, b) {
                  return intVal(a) + intVal(b);
              }, 0 );
          $( api.column(5).footer() ).html(
              formatRupiah(total, 'Rp. ')
          );

          var intVal2 = function ( i ) {
              return typeof i === 'string' ? i.replace(/[\Rp.]/g, '')*1 :
                  typeof i === 'number' ?
                      i : 0;
          };
          total2 = api
              .column(6)
              .data()
              .reduce( function (a, b) {
                  return intVal2(a) + intVal2(b);
              }, 0 );
          $( api.column(6).footer() ).html(
              formatRupiah(total2, 'Rp. ')
          );
      }
    });
  // });
</script>
