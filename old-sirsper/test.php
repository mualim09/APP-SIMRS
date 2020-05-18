<?php
include "include/connection.php";
include 'include/restrict.php';

$id_ppi_rawatinap  = $_GET['id'];
?>
<html class="no-js" lang="en">
<?php include 'include/head.php'; ?>
<body>
  <?php include 'include/header.php'; ?>
  <?php include 'include/sidebar.php'; ?>
  <div class="breadcomb-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="breadcomb-list">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="breadcomb-wp">
                  <div class="breadcomb-icon">
                    <img src="assets/icon/green/png/upload-3.png" width="50px"> 
                  </div>
                  <div class="breadcomb-ctn">
                    <h2>Form Audit Rawat Inap</h2>
                    <p>Dashboard / Rawat Inap</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcomb area End-->
    <div class="notika-status-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-element-list mg-t-30">
              <!-- <?php include 'include/alert/success.php' ?> -->
              <form action="" method="POST">
                <div class="bsc-tbl-bdr">
                  <table width="100%" border="3px" class="table table-striped">
                    <tbody>
                      <tr>
                        <td style="text-align: center;" rowspan="2" width="91">
                          <p><img src="assets/img/all-rs/rskg.png" width="auto" ></p>
                        </td>
                        <td style="text-align: center;" width="259">
                          <p><strong>FROM</strong></p>
                        </td>
                        <td style="text-align: center;" colspan="3" width="170">
                          <p>
                            <strong>Tanggal: <input type="date" name="date_audit" class="form-control" required="required"></strong>
                            <input type="hidden" class="form-control" name="ruangan" value="Rawat Inap">
                            <input type="hidden" class="form-control" name="id_ppi_rawatinap">
                            <input type="hidden" class="form-control" name="user_id" value="<?php echo $access['user_id']; ?>">
                          </p>
                        </td>
                        <td style="text-align: center;" rowspan="2" width="94">
                          <p><strong>Rencana Tindak Lanjut</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td style="text-align: center;" colspan="4" width="430">
                          <p><strong>Monitoring/ Audit PPI di Ruang Rawat Inap</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p><strong>Elemen untuk Evaluasi</strong></p>
                        </td>
                        <td width="36">
                          <p><strong>Ya</strong></p>
                        </td>
                        <td width="48">
                          <p><strong>Tidak</strong></p>
                        </td>
                        <td width="81">
                          <p><strong>Temuan</strong></p>
                        </td>
                        <td width="94">
                          <p><strong>Keterangan</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="6" width="619">
                          <p><strong>Personal</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Personal Hygiene baik</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_1"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_1"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_2" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_3" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Pakaian rapih</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_4"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_4"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_5" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_6" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Rambut bersih dan rapih</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_7"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_7"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_8" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_9" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Tidak menggunakan perhiasan tangan</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_10"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_10"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_11" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_12" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Kuku pendek dan bersih</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_13"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_13"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_14" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_15" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Penggunaan APD sesuai prosedur</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_16"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_16"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_17" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_18" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Melakukan kebersihan tangan sesuai 6 langkah 5 moment</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_19"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_19"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_20" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_21" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Melapor kepada atasan jika diduga mengalami penyakit infeksi</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_22"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_22"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_23" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_24" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="6" width="619">
                          <p><strong>Bedside Stand / Fasilitas</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Hand rub tersedia</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_25"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_25"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_26" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_27" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Sarana cuci tangan lengkap</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_28"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_28"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_29" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_30" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Wastafel dalam keadaan bersih</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_31"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_31"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_32" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_33" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Meja pasien bersih</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_34"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_34"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_35" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_36" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Tidak ada sisa makanan di sekitar pasien</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_37"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_37"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_38" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_39" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Pispot / Urinal tertutup bersih disimpan di spoelhook</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_40"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_40"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_41" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_42" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Alat -&nbsp; alat yang ada di sekitar pasien bersih</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_43"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_43"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_44" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_45" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Tiang infus bersih</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_46"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_46"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_47" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_48" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Alat section, selang feeding, dan oksigen bersih</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_49"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_49"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_50" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_51" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="6" width="619">
                          <p><strong>Bed</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Ralling bersih</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_52"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_52"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_53" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_54" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Kasur menggunakan kedap air</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_55"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_55"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_56" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_57" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Tempat tidur bersih tidak berdebu</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_58"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_58"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_59" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_60" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="6" width="619">
                          <p><strong>Elemen untuk Evaluasi</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Linen, bersih, tidak sobek, dan tidak ada noda</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_61"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_61"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_62" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_63" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Alat lain ditempat tidur bersih, restraint, bantal</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_64"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_64"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_65" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_66" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="6" width="619">
                          <p><strong>Lemari Pasien</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Lemari bersih dan tertutup</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_67"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_67"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_68" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_69" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Pakaian diberi label</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_70"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_70"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_71" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_72" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Pakaian bersih tidak berbau</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_73"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_73"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_74" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_75" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="6" width="619">
                          <p><strong>Kamar Mandi</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Shower bersih dan berfungsi dengan baik</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_76"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_76"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_77" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_78" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Tempat duduk toilet bersih dan tidak ada kerusakan</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_79"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_79"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_80" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_81" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Paper towel / tissue toilet tersedia</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_82"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_82"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_83" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_84" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Alat - alat pribadi pasien bersih</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_85"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_85"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_86" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_87" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="6" width="619">
                          <p><strong>Ruang Kotor</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Terdapat sarana cuci tangan yang bersih dan berfungsi dengan baik</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_88"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_88"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_89" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_90" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Pump flusher berfungsi dengan baik</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_91"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_91"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_92" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_93" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Instrumen kotor ditempatkan dalam container tertutup</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_94"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_94"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_95" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_96" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Linen kotor ditempatkan dalam trolley linen kotor tertutup</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_97"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_97"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_98" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_99" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Linen kotor ditempatkan dalam trolley linen kotor infeksius / plastik kuning</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_100"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_100"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_101" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_102" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="6" width="619">
                          <p><strong>Elemen untuk Evaluasi</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Area kotor terpisah dari area bersih</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_103"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_103"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_104" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_105" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="6" width="619">
                          <p><strong>Pembuangan Limbah</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Tersedia wadah limbah infeksius, non infeksius, dan limbah benda tajam</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_106"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_106"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_107" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_108" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Ada label di setiap tempat sampah</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_109"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_109"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_110" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_111" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Tempat sampah infeksius menggunakan kantong kuning</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_112"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_112"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_113" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_114" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Tempat sampah non infeksius menggunakan kantong hitam</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_115"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_115"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_116" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_117" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Tempat limbah tajam menggunakan container yang tahan air, tidak tembus</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_118"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_118"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_119" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_120" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Limbah dibuang setelah 3/4 atau 2/3 penuh</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_121"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_121"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_122" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_123" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Tempat limbah dalam keadaan bersih dan tertutup</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_124"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_124"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_125" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_126" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" width="351">
                          <p>Pedal tempat sampah berfungsi dengan baik</p>
                        </td>
                        <td width="36" align="center">
                          <p><input type="radio" value="Yes" name="RI_127"></p>
                        </td>
                        <td width="48" align="center">
                          <p><input type="radio" value="No" name="RI_127"></p>
                        </td>
                        <td width="81">
                          <p><textarea class="form-control" name="RI_128" placeholder="Temuan..."></textarea></p>
                        </td>
                        <td width="94">
                          <p><textarea class="form-control" name="RI_129" placeholder="Keterangan..."></textarea></p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <button class="btn btn-block btn-success waves-effect" name="submit">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'include/footer.php'; ?>
  <!-- End Footer area-->
  <?php include 'include/jsfile.php' ?>
</body>
</html>