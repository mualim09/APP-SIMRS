<?php
include "include/connection.php";
include 'include/restrict.php';

// ADD
if(isset($_POST["submit"]))    
{    
  $id_ppi_rawatinap = $_POST['id_ppi_rawatinap'];
  $user_id          = $_POST['user_id'];
  $date_audit       = $_POST['date_audit'];
  $ruangan          = $_POST['ruangan'];
  $RI_1             = $_POST['RI_1'];
  $RI_2             = $_POST['RI_2'];
  $RI_3             = $_POST['RI_3'];
  $RI_4             = $_POST['RI_4'];
  $RI_5             = $_POST['RI_5'];
  $RI_6             = $_POST['RI_6'];
  $RI_7             = $_POST['RI_7'];
  $RI_8             = $_POST['RI_8'];
  $RI_9             = $_POST['RI_9'];
  $RI_10            = $_POST['RI_10'];
  $RI_11            = $_POST['RI_11'];
  $RI_12            = $_POST['RI_12'];
  $RI_13            = $_POST['RI_13'];
  $RI_14            = $_POST['RI_14'];
  $RI_15            = $_POST['RI_15'];
  $RI_16            = $_POST['RI_16'];
  $RI_17            = $_POST['RI_17'];
  $RI_18            = $_POST['RI_18'];
  $RI_19            = $_POST['RI_19'];
  $RI_20            = $_POST['RI_20'];
  $RI_21            = $_POST['RI_21'];
  $RI_22            = $_POST['RI_22'];
  $RI_23            = $_POST['RI_23'];
  $RI_24            = $_POST['RI_24'];
  $RI_25            = $_POST['RI_25'];
  $RI_26            = $_POST['RI_26'];
  $RI_27            = $_POST['RI_27'];
  $RI_28            = $_POST['RI_28'];
  $RI_29            = $_POST['RI_29'];
  $RI_30            = $_POST['RI_30'];
  $RI_31            = $_POST['RI_31'];
  $RI_32            = $_POST['RI_32'];
  $RI_33            = $_POST['RI_33'];
  $RI_34            = $_POST['RI_34'];
  $RI_35            = $_POST['RI_35'];
  $RI_36            = $_POST['RI_36'];
  $RI_37            = $_POST['RI_37'];
  $RI_38            = $_POST['RI_38'];
  $RI_39            = $_POST['RI_39'];
  $RI_40            = $_POST['RI_40'];
  $RI_41            = $_POST['RI_41'];
  $RI_42            = $_POST['RI_42'];
  $RI_43            = $_POST['RI_43'];
  $RI_44            = $_POST['RI_44'];
  $RI_45            = $_POST['RI_45'];
  $RI_46            = $_POST['RI_46'];
  $RI_47            = $_POST['RI_47'];
  $RI_48            = $_POST['RI_48'];
  $RI_49            = $_POST['RI_49'];
  $RI_50            = $_POST['RI_50'];
  $RI_51            = $_POST['RI_51'];
  $RI_52            = $_POST['RI_52'];
  $RI_53            = $_POST['RI_53'];
  $RI_54            = $_POST['RI_54'];
  $RI_55            = $_POST['RI_55'];
  $RI_56            = $_POST['RI_56'];
  $RI_57            = $_POST['RI_57'];
  $RI_58            = $_POST['RI_58'];
  $RI_59            = $_POST['RI_59'];
  $RI_60            = $_POST['RI_60'];
  $RI_61            = $_POST['RI_61'];
  $RI_62            = $_POST['RI_62'];
  $RI_63            = $_POST['RI_63'];
  $RI_64            = $_POST['RI_64'];
  $RI_65            = $_POST['RI_65'];
  $RI_66            = $_POST['RI_66'];
  $RI_67            = $_POST['RI_67'];
  $RI_68            = $_POST['RI_68'];
  $RI_69            = $_POST['RI_69'];
  $RI_70            = $_POST['RI_70'];
  $RI_71            = $_POST['RI_71'];
  $RI_72            = $_POST['RI_72'];
  $RI_73            = $_POST['RI_73'];
  $RI_74            = $_POST['RI_74'];
  $RI_75            = $_POST['RI_75'];
  $RI_76            = $_POST['RI_76'];
  $RI_77            = $_POST['RI_77'];
  $RI_78            = $_POST['RI_78'];
  $RI_79            = $_POST['RI_79'];
  $RI_80            = $_POST['RI_80'];
  $RI_81            = $_POST['RI_81'];
  $RI_82            = $_POST['RI_82'];
  $RI_83            = $_POST['RI_83'];
  $RI_84            = $_POST['RI_84'];
  $RI_85            = $_POST['RI_85'];
  $RI_86            = $_POST['RI_86'];
  $RI_87            = $_POST['RI_87'];
  $RI_88            = $_POST['RI_88'];
  $RI_89            = $_POST['RI_89'];
  $RI_90            = $_POST['RI_90'];
  $RI_91            = $_POST['RI_91'];
  $RI_92            = $_POST['RI_92'];
  $RI_93            = $_POST['RI_93'];
  $RI_94            = $_POST['RI_94'];
  $RI_95            = $_POST['RI_95'];
  $RI_96            = $_POST['RI_96'];
  $RI_97            = $_POST['RI_97'];
  $RI_98            = $_POST['RI_98'];
  $RI_99            = $_POST['RI_99'];
  $RI_100           = $_POST['RI_100'];
  $RI_101           = $_POST['RI_101'];
  $RI_102           = $_POST['RI_102'];
  $RI_103           = $_POST['RI_103'];
  $RI_104           = $_POST['RI_104'];
  $RI_105           = $_POST['RI_105'];
  $RI_106           = $_POST['RI_106'];
  $RI_107           = $_POST['RI_107'];
  $RI_108           = $_POST['RI_108'];
  $RI_109           = $_POST['RI_109'];
  $RI_110           = $_POST['RI_110'];
  $RI_111           = $_POST['RI_111'];
  $RI_112           = $_POST['RI_112'];
  $RI_113           = $_POST['RI_113'];
  $RI_114           = $_POST['RI_114'];
  $RI_115           = $_POST['RI_115'];
  $RI_116           = $_POST['RI_116'];
  $RI_117           = $_POST['RI_117'];
  $RI_118           = $_POST['RI_118'];
  $RI_119           = $_POST['RI_119'];
  $RI_120           = $_POST['RI_120'];
  $RI_121           = $_POST['RI_121'];
  $RI_122           = $_POST['RI_122'];
  $RI_123           = $_POST['RI_123'];
  $RI_124           = $_POST['RI_124'];
  $RI_125           = $_POST['RI_125'];
  $RI_126           = $_POST['RI_126'];
  $RI_127           = $_POST['RI_127'];
  $RI_128           = $_POST['RI_128'];
  $RI_129           = $_POST['RI_129'];

  $query = mysql_query("INSERT INTO tb_ppi_rawatinap 
    (id_ppi_rawatinap,user_id,date_audit,ruangan,
    RI_1,RI_2,RI_3,RI_4,RI_5,RI_6,RI_7,RI_8,RI_9,RI_10,
    RI_11,RI_12,RI_13,RI_14,RI_15,RI_16,RI_17,RI_18,RI_19,RI_20,
    RI_21,RI_22,RI_23,RI_24,RI_25,RI_26,RI_27,RI_28,RI_29,RI_30,
    RI_31,RI_32,RI_33,RI_34,RI_35,RI_36,RI_37,RI_38,RI_39,RI_40,
    RI_41,RI_42,RI_43,RI_44,RI_45,RI_46,RI_47,RI_48,RI_49,RI_50,
    RI_51,RI_52,RI_53,RI_54,RI_55,RI_56,RI_57,RI_58,RI_59,RI_60,
    RI_61,RI_62,RI_63,RI_64,RI_65,RI_66,RI_67,RI_68,RI_69,RI_70,
    RI_71,RI_72,RI_73,RI_74,RI_75,RI_76,RI_77,RI_78,RI_79,RI_80,
    RI_81,RI_82,RI_83,RI_84,RI_85,RI_86,RI_87,RI_88,RI_89,RI_90,
    RI_91,RI_92,RI_93,RI_94,RI_95,RI_96,RI_97,RI_98,RI_99,RI_100,
    RI_101,RI_102,RI_103,RI_104,RI_105,RI_106,RI_107,RI_108,RI_109,
    RI_110,RI_111,RI_112,RI_113,RI_114,RI_115,RI_116,RI_117,RI_118,RI_119,RI_120,
    RI_121,RI_122,RI_123,RI_124,RI_125,RI_126,RI_127,RI_128,RI_129) 
    VALUES 
    ('','$user_id','$date_audit','$ruangan',
    '$RI_1','$RI_2','$RI_3','$RI_4','$RI_5','$RI_6','$RI_7','$RI_8','$RI_9','$RI_10',
    '$RI_11','$RI_12','$RI_13','$RI_14','$RI_15','$RI_16','$RI_17','$RI_18','$RI_19','$RI_20',
    '$RI_21','$RI_22','$RI_23','$RI_24','$RI_25','$RI_26','$RI_27','$RI_28','$RI_29','$RI_30',
    '$RI_31','$RI_32','$RI_33','$RI_34','$RI_35','$RI_36','$RI_37','$RI_38','$RI_39','$RI_40',
    '$RI_41','$RI_42','$RI_43','$RI_44','$RI_45','$RI_46','$RI_47','$RI_48','$RI_49','$RI_50',
    '$RI_51','$RI_52','$RI_53','$RI_54','$RI_55','$RI_56','$RI_57','$RI_58','$RI_59','$RI_60',
    '$RI_61','$RI_62','$RI_63','$RI_64','$RI_65','$RI_66','$RI_67','$RI_68','$RI_69','$RI_70',
    '$RI_71','$RI_72','$RI_73','$RI_74','$RI_75','$RI_76','$RI_77','$RI_78','$RI_79','$RI_80',
    '$RI_81','$RI_82','$RI_83','$RI_84','$RI_85','$RI_86','$RI_87','$RI_88','$RI_89','$RI_90',
    '$RI_91','$RI_92','$RI_93','$RI_94','$RI_95','$RI_96','$RI_97','$RI_98','$RI_99',RI_100,
    '$RI_101','$RI_102','$RI_103','$RI_104','$RI_105','$RI_106','$RI_107','$RI_108','$RI_109',
    '$RI_110','$RI_111','$RI_112','$RI_113','$RI_114','$RI_115','$RI_116','$RI_117','$RI_118','$RI_119','$RI_120',
    '$RI_121','$RI_122','$RI_123','$RI_124','$RI_125','$RI_126','$RI_127','$RI_128','$RI_129')
    ");
  if ($query) {
    header("Location: ./au-RI.php?ntf=1");  
  } else {
    header("Location: ./au-RI.php?ntf=6");
  }
}
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
                    <h2>Form Audit HH WHO</h2>
                    <p>Dashboard / WHO</p>
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
          <div class="col-xs-12">
            <div class="form-element-list mg-t-30">
              <?php include 'include/alert/success.php' ?>
              <form action="" method="POST">
                <div class="bsc-tbl-bdr">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td colspan="21" align="center">
                          <img src="assets/img/all-rs/who.jpg">
                        </td>
                      </tr>
                      <tr>
                        <td colspan="21">
                          <div align="center">
                            <font style="color: gray; font-size: 25px;">FORMULIR OBSERVASI</font>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3">
                          <label>Fasilitas:</label>
                        </td>
                        <td colspan="3">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                        <td colspan="5">
                          <label>No. Periode*:</label>
                        </td>
                        <td colspan="3">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                        <td colspan="3">
                          <label>No. sesi*:</label>
                        </td>
                        <td colspan="4">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3">
                          <label>Pelayanan:</label>
                        </td>
                        <td colspan="3">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                        <td colspan="5">
                          <label>Tgl:(hari/bln/th)</label>
                        </td>
                        <td colspan="3">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                        <td colspan="3">
                          <label>Observer:</label>(inisial)
                        </td>
                        <td colspan="4">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3">
                          <label>Bangsal:</label>
                        </td>
                        <td colspan="3">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                        <td colspan="5">
                          <label>Mulai/selesai Waktu:</label><br/> (jam:menit)
                        </td>
                        <td colspan="3">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                        <td colspan="3">
                          <label>No. Hal*:</label>
                        </td>
                        <td colspan="4">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3">
                          <label>Departemen:</label>
                        </td>
                        <td colspan="3">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                        <td colspan="5">
                          <label>Lama Sesi:</label> (menit)
                        </td>
                        <td colspan="3">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                        <td colspan="3">
                          <label>Kota*:</label>
                        </td>
                        <td colspan="4">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3">
                          <label>Negara*:</label>
                        </td>
                        <td colspan="18">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3">
                          <label>Prof.Cat:</label>
                        </td>
                        <td colspan="3">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                        <td colspan="5">
                          <label>Prof.Cat:</label>
                        </td>
                        <td colspan="3">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                        <td colspan="3">
                          <label>Prof.Cat:</label>
                        </td>
                        <td colspan="4">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3">
                          <label>Kode:</label>
                        </td>
                        <td colspan="3">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                        <td colspan="5">
                          <label>Kode:</label>
                        </td>
                        <td colspan="3">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                        <td colspan="3">
                          <label>Kode:</label>
                        </td>
                        <td colspan="4">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3">
                          <label>N&deg;:</label>
                        </td>
                        <td colspan="3">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                        <td colspan="5">
                          <label>N&deg;:</label>
                        </td>
                        <td colspan="3">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                        <td colspan="3">
                          <label>N&deg;:</label>
                        </td>
                        <td colspan="4">
                          <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                        </td>
                      </tr>
                      <tr>
                        <td >
                          Kesempatan
                        </td>
                        <td colspan="2">
                          Indikasi
                        </td>
                        <td colspan="2">
                          Tindakan HH
                        </td>
                        <td >
                          Kesempatan
                        </td>
                        <td colspan="3">
                          Indikasi
                        </td>
                        <td colspan="2">
                          Tindakan HH
                        </td>
                        <td >
                          Kesempatan
                        </td>
                        <td colspan="2">
                          Indikasi
                        </td>
                        <td colspan="2">
                          Tindakan HH
                        </td>
                        <td >
                          Kesempatan
                        </td>
                        <td colspan="2">
                          Indikasi
                        </td>
                        <td colspan="2">
                          Tindakan HH
                        </td>
                      </tr>
                      <tr>
                        <td rowspan="5" >
                          1
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          seb-ps.
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          HR
                        </td>
                        <td rowspan="5" >
                          1
                        </td>
                        <td colspan="2">
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          seb-ps.
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          HR
                        </td>
                        <td rowspan="5" >
                          1
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          seb-ps.
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          HR
                        </td>
                        <td rowspan="5" >
                          1
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          seb-ps.
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          HR
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          seb-asept.
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          HW
                        </td>
                        <td colspan="2">
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          seb-asept.
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          HW
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          seb-asept.
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          HW
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          seb-asept.
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          HW
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          set-drh.c tbh
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          Tidak
                        </td>
                        <td colspan="2">
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          set-drh.c tbh
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          Tidak
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          set-drh.c tbh
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          Tidak
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          set-drh.c tbh
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          Tidak
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          set-pas.
                        </td>
                        <td rowspan="2">
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td rowspan="2">
                          set.lepas srg tgn
                        </td>
                        <td colspan="2">
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          set-pas.
                        </td>
                        <td rowspan="2">
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td rowspan="2">
                          set.lepas srg tgn
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          set-pas.
                        </td>
                        <td rowspan="2">
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td rowspan="2">
                          set.lepas srg tgn
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          set-pas.
                        </td>
                        <td rowspan="2">
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td rowspan="2">
                          set.lepas srg tgn
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          set.lkg ps.
                        </td>
                        <td colspan="2">
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          set.lkg ps.
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          set.lkg ps.
                        </td>
                        <td>
                          <input type="checkbox" class="option-input radio" value="No" name="RI_109" name="example" />
                        </td>
                        <td>
                          set.lkg ps.
                        </td>
                      </tr>
                    </tbody>
                  </table>
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