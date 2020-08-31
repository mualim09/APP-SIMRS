<!-- Input IU(Informasi Umum) -->
<?php 
include "include/connection.php";

if(isset($_POST["create_na"]))    
{    
  $id_logbook = $_POST['id_logbook'];
  $Periode = $_POST['Periode'];
  $UsulanKolektibilitas = $_POST['UsulanKolektibilitas'];
  $UsulanWatchlist = $_POST['UsulanWatchlist'];
  $AccountStrategy = $_POST['AccountStrategy'];
  $CatatanUpBU = $_POST['CatatanUpBU'];
  $TindakLanjut = $_POST['TindakLanjut'];
  $Time_line = $_POST['Time_line'];
  $KemampuanMembayar = $_POST['KemampuanMembayar'];
  $KinerjaUsaha = $_POST['KinerjaUsaha'];
  $ProspekUsaha = $_POST['ProspekUsaha'];
  $ParameterWatchlist = $_POST['ParameterWatchlist'];
  $c_HasilReview = $_POST['c_HasilReview'];
  $c_TindakLanjut = $_POST['c_TindakLanjut'];
  $c_Timeline = $_POST['c_Timeline'];
  $c_Status = $_POST['c_Status'];
  $ap_HasilReview = $_POST['ap_HasilReview'];
  $ap_TindakLanjut = $_POST['ap_TindakLanjut'];
  $ap_Timeline = $_POST['ap_Timeline'];
  $ap_Status = $_POST['ap_Status'];
  $IBA = $_POST['IBA'];
  $EK = $_POST['EK'];
  $nt_AccountStrategy = $_POST['nt_AccountStrategy'];
  $WT = $_POST['WT'];
  $LK_1 = $_POST['LK_1'];
  $LK_2 = $_POST['LK_2'];
  $LK_3 = $_POST['LK_3'];
  $Sales1 = $_POST['Sales1'];
  $Sales2 = $_POST['Sales2'];
  $Sales3 = $_POST['Sales3'];
  $EBITDA1 = $_POST['EBITDA1'];
  $EBITDA2 = $_POST['EBITDA2'];
  $EBITDA3 = $_POST['EBITDA3'];
  $NPM1= $_POST['NPM1'];
  $NPM2= $_POST['NPM2'];
  $NPM3= $_POST['NPM3'];
  $CR1 = $_POST['CR1'];
  $CR2 = $_POST['CR2'];
  $CR3 = $_POST['CR3'];
  $Leverage1 = $_POST['Leverage1'];
  $Leverage2 = $_POST['Leverage2'];
  $Leverage3 = $_POST['Leverage3'];
  $EBITDAI1 = $_POST['EBITDAI1'];
  $EBITDAI2 = $_POST['EBITDAI2'];
  $EBITDAI3 = $_POST['EBITDAI3'];
  $DSCR1 = $_POST['DSCR1'];
  $DSCR2 = $_POST['DSCR2'];
  $DSCR3 = $_POST['DSCR3'];
  $Debt1 = $_POST['Debt1'];
  $Debt2 = $_POST['Debt2'];
  $Debt3 = $_POST['Debt3'];
  $CF_1 = $_POST['CF_1'];
  $CF_2 = $_POST['CF_2'];
  $CF_3 = $_POST['CF_3'];
    // var_dump($_POST);die();

  $cek = mysql_query("SELECT * FROM tb_upload_logbook WHERE id_logbook ='$id_logbook'");
  $num = mysql_num_rows($cek);
  if($num == 1){
    $query = mysql_query("UPDATE tb_upload_logbook SET
     Periode = '$Periode', 
     UsulanKolektibilitas = '$UsulanKolektibilitas', 
     UsulanWatchlist = '$UsulanWatchlist', 
     AccountStrategy = '$AccountStrategy', 
     CatatanUpBU = '$CatatanUpBU', 
     TindakLanjut = '$TindakLanjut', 
     Time_line = '$Time_line',
     KemampuanMembayar = '$KemampuanMembayar',
     KinerjaUsaha = '$KinerjaUsaha',
     ProspekUsaha = '$ProspekUsaha',
     ParameterWatchlist = '$ParameterWatchlist',
     c_HasilReview = '$c_HasilReview',
     c_TindakLanjut = '$c_TindakLanjut',
     c_Timeline = '$c_Timeline',
     c_Status = '$c_Status',
     ap_HasilReview = '$ap_HasilReview',
     ap_TindakLanjut = '$ap_TindakLanjut',
     ap_Timeline = '$ap_Timeline',
     ap_Status = '$ap_Status',
     IBA = '$IBA',
     EK = '$EK',
     nt_AccountStrategy = '$nt_AccountStrategy',
     WT = '$WT',
     LK_1 = '$LK_1',
     LK_2 = '$LK_2',
     LK_3 = '$LK_3',
     Sales1 = '$Sales1',
     Sales2 = '$Sales2',
     Sales3 = '$Sales3',
     EBITDA1 = '$EBITDA1',
     EBITDA2 = '$EBITDA2',
     EBITDA3 = '$EBITDA3',
     NPM1 = '$NPM1',
     NPM2 = '$NPM2',
     NPM3 = '$NPM3',
     CR1 = '$CR1',
     CR2 = '$CR2',
     CR3 = '$CR3',
     Leverage1 = '$Leverage1',
     Leverage2 = '$Leverage2',
     Leverage3 = '$Leverage3',
     EBITDAI1 = '$EBITDAI1',
     EBITDAI2 = '$EBITDAI2',
     EBITDAI3 = '$EBITDAI3',
     DSCR1 = '$DSCR1',
     DSCR2 = '$DSCR2',
     DSCR3 = '$DSCR3',
     Debt1 = '$Debt1',
     Debt2 = '$Debt2',
     Debt3 = '$Debt3',
     CF_1 = '$CF_1',
     CF_2 = '$CF_2',
     CF_3 = '$CF_3'
     WHERE id_logbook ='$id_logbook'");
    // var_dump($query);die();
    if($query){
      echo '<script>window.location.href = "./mdr_working_paper_kk.php?ntf=1"</script>';
    // var_dump($query);die();
      // header("Location: ./mdr_working_paper_kk.php");                                                  
    } else {
      echo "Updated Failed - Please contact your Administrator";
    }
  } else {
    echo "Records cannot be found!! Please contact your System Administrator" ;
  }
}

?>
<style type="text/css">
 html,body{font:14px arial,verdana,san-serif;}
 .container{
  display:table;
  width:400px;
  border-collapse:collapse;
  margin:0 auto;
  line-height:25px;
}
.table-row:hover{background-color:#99ccff;}
.heading{
  font-weight:bold;
  display:table-row;
  background-color:#C91622;
  text-align:center;
  line-height:35px;
  color:#ffffff;
}
.table-row{  
  display:table-row;
  text-align:center;
}
.strip{  
  display:table-row;
  text-align:center;
  background-color:#f0f0f0;
}
.col{ 
  display:table-cell;
  border:1px solid #CCC;
}
</style>

<div class="modal fade" id="NOTAALLERT<?php echo $row['id_logbook'];?>" role="dialog">
  <div class="box-header with-border">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div>
          <img src="assets/images/mandiri-logo.png" width="120px">
          <div class="col-lg-12">
            <div align="center">
              <br><h4><b>INFORMASI DEBITUR</b></h4><hr>
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
                <hr><h4><b>Nota Allert BU</b></h4><hr>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label align="center">Periode </label>
                <input type="text" name="Periode" class="form-control" placeholder="Periode..." value="<?php echo $row['Periode'];?>" required/>
              </div>
              <div class="form-group">
                <label align="center">Usulan Kolektibilitas </label>
                <input type="text" name="UsulanKolektibilitas" class="form-control" placeholder="Usulan Kolektibilitas..." value="<?php echo $row['UsulanKolektibilitas'];?>" required/>
              </div>
              <div class="form-group">
                <label align="center">Usulan Watchlist </label>
                <input type="text" name="UsulanWatchlist" class="form-control" placeholder="Usulan Watchlist..." value="<?php echo $row['UsulanWatchlist'];?>" required/>
              </div>
              <div class="form-group">
                <label align="center">Account Strategy </label>
                <input type="text" name="AccountStrategy" class="form-control" placeholder="Account Strategy..." value="<?php echo $row['AccountStrategy'];?>" required/>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label align="center">Catatan Up BU </label>
                <input type="text" name="CatatanUpBU" class="form-control" placeholder="Catatan Up BU..." value="<?php echo $row['CatatanUpBU'];?>" required/>
              </div>
              <div class="form-group">
                <label align="center">Tindak Lanjut </label>
                <input type="text" name="TindakLanjut" class="form-control" placeholder="Tindak Lanjut..." value="<?php echo $row['TindakLanjut'];?>" required/>
              </div>
              <div class="form-group">
                <label align="center">Timeline </label>
                <input type="text" name="Time_line" class="form-control" placeholder="Timeline..." value="<?php echo $row['Time_line'];?>" required/>
              </div>
            </div>
          </div>

          <div class="row">
            <div align="center">
              <hr><h4><b>Review (Kinerja Keuangan 3 periode)</b></h4><hr>
            </div>
            <div class="col-lg-12">
             <div class="divTable">
              <div class="divTableRow">
                <div class="divTableCellhd"></div>
                <div class="divTableCellhd">Periode LK</div>
                <div class="divTableCellhd">
                  <input type="month" name="LK_1" class="form-control" placeholder="Month Year" value="<?php echo $row['LK_1'] ?>" required="required">
                </div>
                <div class="divTableCellhd">
                  <input type="month" name="LK_2" class="form-control" placeholder="Month Year" value="<?php echo $row['LK_2'] ?>" required="required">
                </div>
                <div class="divTableCellhd">
                  <input type="month" name="LK_3" class="form-control" placeholder="Month Year" value="<?php echo $row['LK_3'] ?>" required="required">
                </div>
              </div>
              <div class="divTableRow">
                <div class="divTableCellhd"></div>
                <div class="divTableCellhd">Sales</div>
                <div class="divTableCell">
                  <input type="text" name="Sales1" placeholder="Sales..." class="form-control" value="<?php echo $row['Sales1'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="Sales2" placeholder="Sales..." class="form-control" value="<?php echo $row['Sales2'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="Sales3" placeholder="Sales..." class="form-control" value="<?php echo $row['Sales3'];?>" required>
                </div>
              </div>
              <div class="divTableRow">
                <div class="divTableCellhd"></div>
                <div class="divTableCellhd">EBITDA</div>
                <div class="divTableCell">
                  <input type="text" name="EBITDA1" placeholder="EBITDA..." class="form-control" value="<?php echo $row['EBITDA1'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="EBITDA2" placeholder="EBITDA..." class="form-control" value="<?php echo $row['EBITDA2'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="EBITDA3" placeholder="EBITDA..." class="form-control" value="<?php echo $row['EBITDA3'];?>" required>
                </div>
              </div>
              <div class="divTableRow">
                <div class="divTableCellhd"></div>
                <div class="divTableCellhd">NPM</div>
                <div class="divTableCell">
                  <input type="text" name="NPM1" placeholder="NPM..." class="form-control" value="<?php echo $row['NPM1'];?>" required>
                </div>
                <div class="divTableCell"><input type="text" name="NPM2" placeholder="NPM..." class="form-control" value="<?php echo $row['NPM2'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="NPM3" placeholder="NPM..." class="form-control" value="<?php echo $row['NPM3'];?>" required>
                </div>
              </div>
              <div class="divTableRow">
                <div class="divTableCellhd">Kinerja keuangan(IDRJuta)</div>
                <div class="divTableCellhd">CR</div>
                <div class="divTableCell">
                  <input type="text" name="CR1" placeholder="CR..." class="form-control" value="<?php echo $row['CR1'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="CR2" placeholder="CR..." class="form-control" value="<?php echo $row['CR2'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="CR3" placeholder="CR..." class="form-control" value="<?php echo $row['CR3'];?>" required>
                </div>
              </div>
              <div class="divTableRow">
                <div class="divTableCellhd"></div>
                <div class="divTableCellhd">Leverage</div>
                <div class="divTableCell">
                  <input type="text" name="Leverage1" placeholder="Leverage..." class="form-control" value="<?php echo $row['Leverage1'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="Leverage2" placeholder="Leverage..." class="form-control" value="<?php echo $row['Leverage2'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="Leverage3" placeholder="Leverage..." class="form-control" value="<?php echo $row['Leverage3'];?>" required>
                </div>
              </div>
              <div class="divTableRow">
                <div class="divTableCellhd"></div>
                <div class="divTableCellhd">EBITDA/I</div>
                <div class="divTableCell">
                  <input type="text" name="EBITDAI1" placeholder="EBITDA/I..." class="form-control" value="<?php echo $row['EBITDAI1'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="EBITDAI2" placeholder="EBITDA/I..." class="form-control" value="<?php echo $row['EBITDAI2'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="EBITDAI3" placeholder="EBITDA/I..." class="form-control" value="<?php echo $row['EBITDAI3'];?>" required>
                </div>
              </div>
              <div class="divTableRow">
                <div class="divTableCellhd"></div>
                <div class="divTableCellhd">DSCR</div>
                <div class="divTableCell">
                  <input type="text" name="DSCR1" placeholder="DSCR..." class="form-control" value="<?php echo $row['DSCR1'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="DSCR2" placeholder="DSCR..." class="form-control" value="<?php echo $row['DSCR2'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="DSCR3" placeholder="DSCR..." class="form-control" value="<?php echo $row['DSCR3'];?>" required>
                </div>
              </div>
              <div class="divTableRow">
                <div class="divTableCellhd"></div>
                <div class="divTableCellhd">Debt/EBITDA</div>
                <div class="divTableCell">
                  <input type="text" name="Debt1" placeholder="Debt/EBITDA..." class="form-control" value="<?php echo $row['Debt1'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="Debt2" placeholder="Debt/EBITDA..." class="form-control" value="<?php echo $row['Debt2'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="Debt3" placeholder="Debt/EBITDA..." class="form-control" value="<?php echo $row['Debt3'];?>" required>
                </div>
              </div>
              <div class="divTableRow">
                <div class="divTableCellhd"></div>
                <div class="divTableCellhd">CF From Operating</div>
                <div class="divTableCell">
                  <input type="text" name="CF_1" placeholder="CF From Operating..." class="form-control" value="<?php echo $row['CF_1'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="CF_2" placeholder="CF From Operating..." class="form-control" value="<?php echo $row['CF_2'];?>" required>
                </div>
                <div class="divTableCell">
                  <input type="text" name="CF_3" placeholder="CF From Operating..." class="form-control" value="<?php echo $row['CF_3'];?>" required>
                </div>
              </div>
            </div> 
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
            <textarea type="text" name="KemampuanMembayar" placeholder="Kemampuan Membayar..." class="form-control" required><?php echo $row['KemampuanMembayar'];?></textarea>
          </div>
          <div class="form-group col-lg-6 col-lg-6">
            <label align="center">Kinerja Usaha</label>
            <textarea type="text" name="KinerjaUsaha" placeholder="Kinerja Usaha..." class="form-control" required><?php echo $row['KinerjaUsaha'];?></textarea>
          </div>
          <div class="form-group col-lg-6 col-lg-6">
            <label align="center">Prospek Usaha</label>
            <textarea type="text" name="ProspekUsaha" placeholder="Prospek Usaha..." class="form-control" required><?php echo $row['ProspekUsaha'];?></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div align="center">
              <hr><h4><b>Parameter Watchlist</b></h4><hr>
            </div>
          </div>
          <div class="form-group col-lg-12 col-lg-12">
            <textarea type="text" name="ParameterWatchlist" placeholder="Parameter Watchlist..." class="form-control" required><?php echo $row['ParameterWatchlist'];?></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div align="center">
              <hr><h4><b>Covenant & Up BU</b></h4><hr>
            </div>
          </div>
          <div class="form-group col-lg-6 col-lg-6">
            <label align="center">Hasil Review</label>
            <textarea type="text" name="c_HasilReview" placeholder="Hasil Review..." class="form-control" required><?php echo $row['c_HasilReview'];?></textarea>
          </div>
          <div class="form-group col-lg-6 col-lg-6">
            <label align="center">Tindak Lanjut</label>
            <textarea type="text" name="c_TindakLanjut" placeholder="Tindak Lanjut..." class="form-control" required><?php echo $row['c_TindakLanjut'];?></textarea>
          </div>
          <div class="form-group col-lg-6 col-lg-6">
            <label align="center">Timeline</label>
            <textarea type="text" name="c_Timeline" placeholder="Timeline..." class="form-control" required><?php echo $row['c_Timeline'];?></textarea>
          </div>
          <div class="form-group col-lg-6 col-lg-6">
            <label align="center">Status</label>
            <textarea type="text" name="c_Status" placeholder="Status..." class="form-control" required><?php echo $row['c_Status'];?></textarea>
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
            <textarea type="text" name="ap_HasilReview" placeholder="Hasil Review..." class="form-control" required><?php echo $row['ap_HasilReview'];?></textarea>
          </div>
          <div class="form-group col-lg-6 col-lg-6">
            <label align="center">Tindak Lanjut</label>
            <textarea type="text" name="ap_TindakLanjut" placeholder="Tindak Lanjut..." class="form-control" required><?php echo $row['ap_TindakLanjut'];?></textarea>
          </div>
          <div class="form-group col-lg-6 col-lg-6">
            <label align="center">Timeline</label>
            <textarea type="text" name="ap_Timeline" placeholder="Timeline..." class="form-control" required><?php echo $row['ap_Timeline'];?></textarea>
          </div>
          <div class="form-group col-lg-6 col-lg-6">
            <label align="center">Status</label>
            <textarea type="text" name="ap_Status" placeholder="Status..." class="form-control" required><?php echo $row['ap_Status'];?></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div align="center">
              <hr><h4><b>Informasi 3 bulan terakhir</b></h4><hr>
            </div>
          </div>
          <div class="form-group col-lg-12 col-lg-12">
            <textarea type="text" name="IBA" placeholder="Informasi 3 bulan terakhir..." class="form-control" required><?php echo $row['IBA'];?></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div align="center">
              <hr><h4><b>Kesimpulan</b></h4><hr>
            </div>
          </div>
          <div class="form-group form-group col-lg-12 col-lg-12">
            <label align="center">Estimasi Kolektibilitas</label>
            <textarea type="text" name="EK" placeholder="Estimasi Kolektibilitas..." class="form-control" required><?php echo $row['EK'];?></textarea>
          </div>
          <div class="form-group form-group col-lg-12 col-lg-12">
            <label align="center">Account Strategy</label>
            <textarea type="text" name="nt_AccountStrategy" placeholder="Account Strategy..." class="form-control" required><?php echo $row['nt_AccountStrategy'];?></textarea>
          </div>
          <div class="form-group form-group col-lg-12 col-lg-12">
            <label align="center">Wacthlist</label>
            <textarea type="text" name="WT" placeholder="Wacthlist..." class="form-control" required><?php echo $row['WT'];?></textarea>
          </div>
        </div>
        <!-- /.form group -->
        <button type="submit" name="create_na" value="submit" class="btn btn-success btn-block btn-flat">Submit</button>
        <button type="button" data-dismiss="modal" class="btn bg-orange btn-block btn-flat">Close</button>
      </form>
    </div>
  </div>
</div>
</div>