<!-- Input IU(Informasi Umum) -->
<?php 
include "include/connection.php";

if(isset($_POST["create_iu_NA"]))    
{    
  $id_logbook = $_POST['id_logbook'];
  $JNS_KRD = $_POST['JNS_KRD'];
  $KOL_LOG = $_POST['KOL_LOG'];
  $BidangUsaha_NA = $_POST['BidangUsaha_NA'];
  $NT_1 = $_POST['NT_1'];
  $NT_2 = $_POST['NT_2'];
  $NT_3 = $_POST['NT_3'];
  $NT_4 = $_POST['NT_4'];
  $NT_5 = $_POST['NT_5'];
  $NT_6 = $_POST['NT_6'];
  $limit_ex_NA = $_POST['limit_ex_NA'];
  $bade_bank_lain_NA = $_POST['bade_bank_lain_NA'];
  $gusaha_NA = $_POST['gusaha_NA'];
  $rating_NA = $_POST['rating_NA'];
  $ioutlook_NA = $_POST['ioutlook_NA'];
  $PG_NA = $_POST['PG_NA'];
  $HP_NA = $_POST['HP_NA'];
    // var_dump($_POST);die();

  $cek = mysql_query("SELECT * FROM tb_upload_logbook WHERE id_logbook ='$id_logbook'");
  $num = mysql_num_rows($cek);
  if($num == 1){
    $query = mysql_query("UPDATE tb_upload_logbook SET 
     JNS_KRD = '$JNS_KRD',KOL_LOG = '$KOL_LOG',BidangUsaha_NA = '$BidangUsaha_NA',
     NT_1 = '$NT_1',
     NT_2 = '$NT_2',
     NT_3 = '$NT_3',
     NT_4 = '$NT_4',
     NT_5 = '$NT_5',
     NT_6 = '$NT_6',
     limit_ex_NA = '$limit_ex_NA',
     bade_bank_lain_NA = '$bade_bank_lain_NA',
     gusaha_NA = '$gusaha_NA',
     rating_NA = '$rating_NA',
     ioutlook_NA = '$ioutlook_NA',
     PG_NA = '$PG_NA',
     HP_NA = '$HP_NA'
     WHERE id_logbook ='$id_logbook'");
    // var_dump($query);exit();
    if($query){
    // var_dump($query);exit();
      echo '<script>window.location.href = "./mdr_working_paper_kk.php?ntf=99"</script>';
     // header("Location: ./mdr_working_paper_kk.php?ntf=1");                              
   } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} else {
  echo "Records cannot be found!! Please contact your System Administrator";
}
}

?>

<div class="modal fade" id="IUCREATENA<?php echo $row['id_logbook'];?>" role="dialog">
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
              <label>1. Nota Alert dan Review Kolektibilitas</label><br>
              <input type="radio" name="NT_1" value="Yes" <?= $row['NT_1'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="NT_1" value="No" <?= $row['NT_1'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>2. SS Keuangan 3 tahun terakhir</label><br>
              <input type="radio" name="NT_2" value="Yes" <?= $row['NT_2'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="NT_2" value="No" <?= $row['NT_2'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>3. Laporan Review Kolektibilitas \ Financial Highlight</label><br>
              <input type="radio" name="NT_3" value="Yes" <?= $row['NT_3'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="NT_3" value="No" <?= $row['NT_3'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>4. Review Covenant</label><br>
              <input type="radio" name="NT_4" value="Yes" <?= $row['NT_4'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="NT_4" value="No" <?= $row['NT_4'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>5. IDEB OJK</label><br>
              <input type="radio" name="NT_5" value="Yes" <?= $row['NT_5'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="NT_5" value="No" <?= $row['NT_5'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="form-group col-lg-6">
              <label>6. PG_NA dan OCE</label><br>
              <input type="radio" name="NT_6" value="Yes" <?= $row['NT_6'] == 'Yes' ? 'checked' : '' ?>> Yes
              <input type="radio" name="NT_6" value="No" <?= $row['NT_6'] == 'No' ? 'checked' : '' ?>> No
            </div>
            <div class="col-lg-12">
              <div align="center">
                <br><h4><b></b></h4><hr>
              </div>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Total Limit</label>
              <input type="text" value="<?php echo "Rp. " . number_format($row['LIMIT_LOG'],0,',','.').""?>" class="form-control" readonly/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Total Bade</label>
              <input type="text" value="<?php echo "Rp. " . number_format($row['BADE_LOG'],0,',','.').""?>" class="form-control" readonly/>
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
              <input type="text" name="BidangUsaha_NA" placeholder="Bidang Usaha..." value="<?php echo $row['BidangUsaha_NA'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Total Limit Bank Lain</label>
              <input type="text" name="limit_ex_NA" placeholder="Rp. ..." value="<?php echo $row['limit_ex_NA'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Total Bade Bank Lain</label>
              <input type="text" name="bade_bank_lain_NA" placeholder="Rp. ..." value="<?php echo $row['bade_bank_lain_NA'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Group Usaha</label>
              <input type="text" name="gusaha_NA" placeholder="Group Usaha..." value="<?php echo $row['gusaha_NA'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Rating</label>
              <input type="text" name="rating_NA" placeholder="Rating..." value="<?php echo $row['rating_NA'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Industri Outlook</label>
              <input type="text" name="ioutlook_NA" placeholder="Industri Outlook..." value="<?php echo $row['ioutlook_NA'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Portfolio Guideline</label>
              <input type="text" name="PG_NA" placeholder="Portfolio Guideline..." value="<?php echo $row['PG_NA'];?>" class="form-control"/>
            </div>
            <div class="form-group col-lg-6 col-lg-6">
              <label align="center">Historical Pembayaran</label>
              <input type="text" name="HP_NA" placeholder="Historical Pembayaran..." value="<?php echo $row['HP_NA'];?>" class="form-control"/>
            </div>
          </div>
          <!-- /.form group -->
          <button type="submit" name="create_iu_NA" value="submit" class="btn btn-bg btn-success btn-block btn-flat">Submit</button>
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
