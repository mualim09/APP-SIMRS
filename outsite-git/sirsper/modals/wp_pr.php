<div class="modal" id="PR<?php echo $row['id_logbook'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Input - Catatan Hasil Review</h4>
      </div>
      <!-- START OF MODAL BODY-->
      <div class="modal-body">  
        <p><a href="#" data-toggle="modal" data-target="#layer001" class="button"><button class="btn btn-block btn-primary"><font size="2px">Penyerahan Agunan Oleh Debitur</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer002" class="button"><button class="btn btn-block btn-primary"><font size="2px">Kualitas Agunan</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer003" class="button"><button class="btn btn-block btn-primary"><font size="2px">Kepemilikan Dan Legalitas Agunan</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer004" class="button"><button class="btn btn-block btn-primary"><font size="2px">Kewajaran Nilai Agunan</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer005" class="button"><button class="btn btn-block btn-primary"><font size="2px">Penilaian Bonafiditas Pemberi Guarantor (Jika Ada PG/CG/Cashflow Guarantee)</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer006" class="button"><button class="btn btn-block btn-primary"><font size="2px">Penilaian Stock Dan Piutang (Hasil Dari Merchandise Inspection)</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer007" class="button"><button class="btn btn-block btn-primary"><font size="2px">Perhitungan SCR Agunan NFA Dan FA</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer008" class="button"><button class="btn btn-block btn-primary"><font size="2px">Penutupan Asuransi</font></button></a></p>
      </div>
      <!-- END OF APPLICATION FORM MODAL BODY -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->   

   <!--LAYER 1-->
  <div class="modal" id="layer001" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
          <h4 class="modal-title" id="upload-avatar-title"><b>Pelaksanaan Trade Checking Informasi</b></h4>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <div class="form-group">
              <label  class="">Hasil Review</label>
              <input type="text" placeholder="Hasil Review..." name="hasil_review" class="form-control" required>
            </div>
            <div class="form-group">
              <label  class="">Tindak Lanjut</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Report</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Quick Report">Quick Report</option>
                <option value="Recomendasi Report">Recomendasi Report</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">CHR</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="0">0</option>
                <option value="1">1</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Bobot</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value=""></option>
                <option value="Major">Major</option>
                <option value="Minor">Minor</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Saran Perbaikan</label>
              <input type="text" placeholder="Saran Perbaikan..." name="Saran_Perbaikan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Tanggapan</label>
              <input type="text" placeholder="Tanggapan.." name="tanggapan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Target Date</label>
              <input type="date" name="target_date" class="form-control">
            </div>
            <!-- <a href="#" data-toggle="modal" data-target="#res_layer1"><button type="button" class="btn btn-default">View</button></a> -->
            <button type="submit" name="input_aspek_gr1" value="input_aspek_gr1" class="btn btn-primary">Save</button>
            <a href="#" data-toggle="modal" data-target="#layer001"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 1 -->


  <!--LAYER 2-->
  <div class="modal" id="layer002" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
          <h4 class="modal-title" id="upload-avatar-title"><b>Ketertiban Pemenuhan Covenant/Informasi/Laporan Keuangan</b></h4>
        </div>
        <div class="modal-body">
         <form method="post" action="">
            <div class="form-group">
              <label  class="">Hasil Review</label>
              <input type="text" placeholder="Hasil Review..." name="hasil_review" class="form-control" required>
            </div>
            <div class="form-group">
              <label  class="">Tindak Lanjut</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Report</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Quick Report">Quick Report</option>
                <option value="Recomendasi Report">Recomendasi Report</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">CHR</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="0">0</option>
                <option value="1">1</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Bobot</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value=""></option>
                <option value="Major">Major</option>
                <option value="Minor">Minor</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Saran Perbaikan</label>
              <input type="text" placeholder="Saran Perbaikan..." name="Saran_Perbaikan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Tanggapan</label>
              <input type="text" placeholder="Tanggapan.." name="tanggapan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Target Date</label>
              <input type="date" name="target_date" class="form-control">
            </div>
            <!-- <a href="#" data-toggle="modal" data-target="#res_layer1"><button type="button" class="btn btn-default">View</button></a> -->
            <button type="submit" name="input_aspek_gr1" value="input_aspek_gr1" class="btn btn-primary">Save</button>
            <a href="#" data-toggle="modal" data-target="#layer002"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 2 -->

  <!--LAYER 3-->
  <div class="modal" id="layer003" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
          <h4 class="modal-title" id="upload-avatar-title"><b>Deteksi Ultimate Owner, Bonafiditas & Kapabilitas</b></h4>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <div class="form-group">
              <label  class="">Hasil Review</label>
              <input type="text" placeholder="Hasil Review..." name="hasil_review" class="form-control" required>
            </div>
            <div class="form-group">
              <label  class="">Tindak Lanjut</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Report</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Quick Report">Quick Report</option>
                <option value="Recomendasi Report">Recomendasi Report</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">CHR</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="0">0</option>
                <option value="1">1</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Bobot</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value=""></option>
                <option value="Major">Major</option>
                <option value="Minor">Minor</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Saran Perbaikan</label>
              <input type="text" placeholder="Saran Perbaikan..." name="Saran_Perbaikan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Tanggapan</label>
              <input type="text" placeholder="Tanggapan.." name="tanggapan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Target Date</label>
              <input type="date" name="target_date" class="form-control">
            </div>
            <!-- <a href="#" data-toggle="modal" data-target="#res_layer1"><button type="button" class="btn btn-default">View</button></a> -->
            <button type="submit" name="input_aspek_gr1" value="input_aspek_gr1" class="btn btn-primary">Save</button>
            <a href="#" data-toggle="modal" data-target="#layer003"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 3 -->

  <!--LAYER 4-->
  <div class="modal" id="layer004" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
          <h4 class="modal-title" id="upload-avatar-title"><b>Historical Pembayaran Kewajiban</b></h4>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <div class="form-group">
              <label  class="">Hasil Review</label>
              <input type="text" placeholder="Hasil Review..." name="hasil_review" class="form-control" required>
            </div>
            <div class="form-group">
              <label  class="">Tindak Lanjut</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Report</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Quick Report">Quick Report</option>
                <option value="Recomendasi Report">Recomendasi Report</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">CHR</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="0">0</option>
                <option value="1">1</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Bobot</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value=""></option>
                <option value="Major">Major</option>
                <option value="Minor">Minor</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Saran Perbaikan</label>
              <input type="text" placeholder="Saran Perbaikan..." name="Saran_Perbaikan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Tanggapan</label>
              <input type="text" placeholder="Tanggapan.." name="tanggapan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Target Date</label>
              <input type="date" name="target_date" class="form-control">
            </div>
            <!-- <a href="#" data-toggle="modal" data-target="#res_layer1"><button type="button" class="btn btn-default">View</button></a> -->
            <button type="submit" name="input_aspek_gr1" value="input_aspek_gr1" class="btn btn-primary">Save</button>
            <a href="#" data-toggle="modal" data-target="#layer004"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 4 -->

  <!--LAYER 5-->
  <div class="modal" id="layer005" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
          <h4 class="modal-title" id="upload-avatar-title"><b>Dukungan positif Dari Perusahaan Afiliasi Atau Grup Usaha</b></h4>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <div class="form-group">
              <label  class="">Hasil Review</label>
              <input type="text" placeholder="Hasil Review..." name="hasil_review" class="form-control" required>
            </div>
            <div class="form-group">
              <label  class="">Tindak Lanjut</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Report</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Quick Report">Quick Report</option>
                <option value="Recomendasi Report">Recomendasi Report</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">CHR</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="0">0</option>
                <option value="1">1</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Bobot</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value=""></option>
                <option value="Major">Major</option>
                <option value="Minor">Minor</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Saran Perbaikan</label>
              <input type="text" placeholder="Saran Perbaikan..." name="Saran_Perbaikan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Tanggapan</label>
              <input type="text" placeholder="Tanggapan.." name="tanggapan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Target Date</label>
              <input type="date" name="target_date" class="form-control">
            </div>
            <!-- <a href="#" data-toggle="modal" data-target="#res_layer1"><button type="button" class="btn btn-default">View</button></a> -->
            <button type="submit" name="input_aspek_gr1" value="input_aspek_gr1" class="btn btn-primary">Save</button>
            <a href="#" data-toggle="modal" data-target="#layer005"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 5 -->

  <!--LAYER 6-->
  <div class="modal" id="layer006" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
          <h4 class="modal-title" id="upload-avatar-title"><b>Dukungan positif Dari Perusahaan Afiliasi Atau Grup Usaha</b></h4>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <div class="form-group">
              <label  class="">Hasil Review</label>
              <input type="text" placeholder="Hasil Review..." name="hasil_review" class="form-control" required>
            </div>
            <div class="form-group">
              <label  class="">Tindak Lanjut</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Report</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Quick Report">Quick Report</option>
                <option value="Recomendasi Report">Recomendasi Report</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">CHR</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="0">0</option>
                <option value="1">1</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Bobot</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value=""></option>
                <option value="Major">Major</option>
                <option value="Minor">Minor</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Saran Perbaikan</label>
              <input type="text" placeholder="Saran Perbaikan..." name="Saran_Perbaikan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Tanggapan</label>
              <input type="text" placeholder="Tanggapan.." name="tanggapan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Target Date</label>
              <input type="date" name="target_date" class="form-control">
            </div>
            <!-- <a href="#" data-toggle="modal" data-target="#res_layer1"><button type="button" class="btn btn-default">View</button></a> -->
            <button type="submit" name="input_aspek_gr1" value="input_aspek_gr1" class="btn btn-primary">Save</button>
            <a href="#" data-toggle="modal" data-target="#layer006"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 6 -->

  <!--LAYER 7-->
  <div class="modal" id="layer007" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
          <h4 class="modal-title" id="upload-avatar-title"><b>Dukungan positif Dari Perusahaan Afiliasi Atau Grup Usaha</b></h4>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <div class="form-group">
              <label  class="">Hasil Review</label>
              <input type="text" placeholder="Hasil Review..." name="hasil_review" class="form-control" required>
            </div>
            <div class="form-group">
              <label  class="">Tindak Lanjut</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Report</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Quick Report">Quick Report</option>
                <option value="Recomendasi Report">Recomendasi Report</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">CHR</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="0">0</option>
                <option value="1">1</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Bobot</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value=""></option>
                <option value="Major">Major</option>
                <option value="Minor">Minor</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Saran Perbaikan</label>
              <input type="text" placeholder="Saran Perbaikan..." name="Saran_Perbaikan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Tanggapan</label>
              <input type="text" placeholder="Tanggapan.." name="tanggapan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Target Date</label>
              <input type="date" name="target_date" class="form-control">
            </div>
            <!-- <a href="#" data-toggle="modal" data-target="#res_layer1"><button type="button" class="btn btn-default">View</button></a> -->
            <button type="submit" name="input_aspek_gr1" value="input_aspek_gr1" class="btn btn-primary">Save</button>
            <a href="#" data-toggle="modal" data-target="#layer007"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 7 -->

  <!--LAYER 8-->
  <div class="modal" id="layer008" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
          <h4 class="modal-title" id="upload-avatar-title"><b>Dukungan positif Dari Perusahaan Afiliasi Atau Grup Usaha</b></h4>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <div class="form-group">
              <label  class="">Hasil Review</label>
              <input type="text" placeholder="Hasil Review..." name="hasil_review" class="form-control" required>
            </div>
            <div class="form-group">
              <label  class="">Tindak Lanjut</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Report</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="Quick Report">Quick Report</option>
                <option value="Recomendasi Report">Recomendasi Report</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">CHR</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value="0">0</option>
                <option value="1">1</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Bobot</label>
              <select class="form-control" name="option">
                <option value="">--- Select ---</option>
                <option value=""></option>
                <option value="Major">Major</option>
                <option value="Minor">Minor</option>
              </select>
            </div>
            <div class="form-group">
              <label  class="">Saran Perbaikan</label>
              <input type="text" placeholder="Saran Perbaikan..." name="Saran_Perbaikan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Tanggapan</label>
              <input type="text" placeholder="Tanggapan.." name="tanggapan" class="form-control">
            </div>
            <div class="form-group">
              <label  class="">Target Date</label>
              <input type="date" name="target_date" class="form-control">
            </div>
            <!-- <a href="#" data-toggle="modal" data-target="#res_layer1"><button type="button" class="btn btn-default">View</button></a> -->
            <button type="submit" name="input_aspek_gr1" value="input_aspek_gr1" class="btn btn-primary">Save</button>
            <a href="#" data-toggle="modal" data-target="#layer008"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 8 -->

</div>