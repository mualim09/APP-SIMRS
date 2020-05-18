<?php
// The function header by sending raw excel
date_default_timezone_set("Asia/Bangkok");
$datenow = date('d-m-Y h-i-s');
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan-Kegiatan-Date-Time-$datenow.doc");

// DATE
function tanggal_indo($tanggal, $cetak_hari = false)
{
  $hari = array ( 1 =>    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
  );
  $bulan = array (1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $split    = explode('-', $tanggal);
  $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
  
  if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo;
  }
  return $tgl_indo;
}
?>
<div align="center">
  <font style="font-size: 16px;"><b>LAPORAN KEGIATAN YANG TELAH DILAKSANAKAN</b></font><br>
  <font style="font-size: 16px;"><b>DI RS. KHUSUS GINJAL NY.R.A.HABIBIE</b></font><br>
  <font style="font-size: 16px;"><b>BULAN <?php echo date('F Y'); ?></b></font><br>
</div><br>
<table style="border-color: black;" border="1" width="625" align="center" class="table table-striped">
  <thead>
    <tr align="center" style="border-color: black; height: 20px">
      <th style="background-color: gray; height: 20px">No.</th>
      <th style="background-color: gray; height: 20px">Hari/Tanggal</th>
      <th style="background-color: gray; height: 20px">Kegiatan</th>
      <th style="background-color: gray; height: 20px">Nama Peserta</th>
      <th style="background-color: gray; height: 20px">Tempat</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $con=mysqli_connect("localhost","root","","rskg_sirskasir");
                        // Check connection
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $result = mysqli_query($con,"SELECT * FROM tb_laporankgt ORDER BY id_laporankgt DESC");

    $no=0;
    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_array($result))
      {
        $no++;
        echo "<tr align='center' style='border-color: black; height: 64px'>";
        echo "<td height='64px'>".$no.".</td>";
        if ($row['tanggal']==NULL){
          echo "<td height='64px'>empty</td>";
        }else{
          echo "<td height='64px'>".tanggal_indo($row['tanggal'], true) ." - ".tanggal_indo($row['selesai'], true) . "</td>";
        }
        if ($row['kegiatan']==NULL){
          echo "<td height='64px'>empty</td>";
        }else{
          echo "<td height='64px'>".$row['kegiatan'] . "</td>";
        }
        if ($row['username']==NULL){
          echo "<td height='64px'>empty</td>";
        }else{
          echo "<td height='64px'>".$row['username'] . "</td>";
       }
       if ($row['tempat']==NULL){
        echo "<td height='64px'>empty</td>";
      }else{
        echo "<td height='64px'>".$row['tempat'] . "</td>";
      }
      echo "</tr>";
      ?>
      <?php
    }
  }mysqli_close($con);
  ?>
</tbody>
</table>
<br><br><br>
<p style="text-align: left;">Bandung, <?php echo date('F Y'); ?></p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">Mengetahui,</p>
<p style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<table style="height: 50px;" width="641">
  <tbody>
    <tr>
      <td style="width: 312px; text-align: center;"><strong><u>Dr. Qania Mufliani., MM </u></strong></td>
      <td style="width: 313px; text-align: center;"><strong><u>DR. Yofy Syarkani,SE.,MM.,CRP</u></strong></td>
    </tr>
    <tr>
      <td style="width: 312px; text-align: center;">Direktur</td>
      <td style="width: 313px; text-align: center;">Pelaksana Harian Yayasan</td>
    </tr>
  </tbody>
</table>