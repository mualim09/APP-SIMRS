<div class="modal" id="CHR<?php echo $row['id_logbook'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Repayment Capacity</h4>
      </div>
      <!-- START OF MODAL BODY-->
      <div class="modal-body">  
        <p><a href="#" data-toggle="modal" data-target="#layer01" class="button"><button class="btn btn-block btn-primary"><font size="2px">Kewajaran Penetapan Asumsi Dalam Proyeksi Keuangan</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer02" class="button"><button class="btn btn-block btn-primary"><font size="2px">Posisi Baki Debet Terhadap Underlying Aset Dan Kesesuaian Penggunaan Fasilitas Kredit</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer03" class="button"><button class="btn btn-block btn-primary"><font size="2px">Kewajaran Penetapan Asumsi Dalam Perhitungan Limit Kredit</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer04" class="button"><button class="btn btn-block btn-primary"><font size="2px">Penyaluran Transaksi Aktivitas Keuangan</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer05" class="button"><button class="btn btn-block btn-primary"><font size="2px">Past Performance Dan Kinerja Keuangan</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer06" class="button"><button class="btn btn-block btn-primary"><font size="2px">Kemampuan Penyediaan Self  Financing</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer07" class="button"><button class="btn btn-block btn-primary"><font size="2px">Pengalaman Para Pengurus Dan Pemegang Saham Dalam Menjalankan Usaha Yang Dibiayai</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer08" class="button"><button class="btn btn-block btn-primary"><font size="2px">Current Issues Sektor Industri Yang Dibiayai</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer09" class="button"><button class="btn btn-block btn-primary"><font size="2px">Pengaruh Perubahan Regulasi/Kebijakan Pemerintah Yang Bedampak Pada Usaha Debitur</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer010" class="button"><button class="btn btn-block btn-primary"><font size="2px">Tingkat Persaingan Di Bidang Usaha Debitur</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer011" class="button"><button class="btn btn-block btn-primary"><font size="2px">Kontinuitas Produksi Dan Suplai Barang/Bahan Baku</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer012" class="button"><button class="btn btn-block btn-primary"><font size="2px">Kewajaran Obyek Kredit (Khusus KI)</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer013" class="button"><button class="btn btn-block btn-primary"><font size="2px">Kesesuaian Antara Struktur Kredit Dengan Pola Usaha</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer014" class="button"><button class="btn btn-block btn-primary"><font size="2px">Risiko Utama Telah Terindentifikasi Dan Termitigasi Dengan Tepat</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer015" class="button"><button class="btn btn-block btn-primary"><font size="2px">Kesesuaian Penetapan Ketentuan/Syarat Penarikan/ Covenant Kredit</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer016" class="button"><button class="btn btn-block btn-primary"><font size="2px">Pemenuhan Covenant Yang Terkait Dengan Repayment Capacity</font></button></a></p>
        <p><a href="#" data-toggle="modal" data-target="#layer017" class="button"><button class="btn btn-block btn-primary"><font size="2px">Pelaksanaan Dan Laporan OTS</font></button></a></p>
      </div>
      <!-- END OF APPLICATION FORM MODAL BODY -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->   

   <!--LAYER 1-->
  <div class="modal" id="layer01" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">

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
            <a href="#" data-toggle="modal" data-target="#layer01"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 1 -->


  <!--LAYER 2-->
  <div class="modal" id="layer02" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer02"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 2 -->

  <!--LAYER 3-->
  <div class="modal" id="layer03" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer03"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 3 -->

  <!--LAYER 4-->
  <div class="modal" id="layer04" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer04"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 4 -->

  <!--LAYER 5-->
  <div class="modal" id="layer05" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer05"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 5 -->

  <!--LAYER 6-->
  <div class="modal" id="layer06" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer06"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 6 -->

  <!--LAYER 7-->
  <div class="modal" id="layer07" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer07"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 7 -->

  <!--LAYER 8-->
  <div class="modal" id="layer08" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer08"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 8 -->

  <!--LAYER 9-->
  <div class="modal" id="layer09" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer09"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 9 -->

  <!--LAYER 10-->
  <div class="modal" id="layer010" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer010"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 10 -->

  <!--LAYER 11-->
  <div class="modal" id="layer011" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer011"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 11 -->

  <!--LAYER 12-->
  <div class="modal" id="layer012" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer012"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 12 -->

  <!--LAYER 13-->
  <div class="modal" id="layer013" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer013"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 13 -->

  <!--LAYER 14-->
  <div class="modal" id="layer014" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer014"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 14 -->

  <!--LAYER 15-->
  <div class="modal" id="layer015" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer015"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 15 -->

  <!--LAYER 16-->
  <div class="modal" id="layer016" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer016"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 16 -->

  <!--LAYER 17-->
  <div class="modal" id="layer017" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="upload-avatar-title" aria-hidden="true">
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
            <a href="#" data-toggle="modal" data-target="#layer017"><button type="button" class="btn btn-warning">Back</button></a>
          </form>
        </div>                                
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- END LAYER 17 -->

</div>