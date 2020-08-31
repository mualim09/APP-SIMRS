<?php
// The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");
date_default_timezone_set("Asia/Bangkok");
$datenow = date('d-m-Y h-i-s');

// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=Surat-Keluar-$datenow.xls");

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
<div>
  <h1>SURAT KELUAR</h1>
</div>
<table id="example1" border="2px" class="table table-striped">
  <thead>
    <tr align="center">
      <th colspan="2">Nomor</th>
      <th rowspan="2">Alamat Penerima</th>
      <th rowspan="2">Tanggal</th>
      <th rowspan="2">Perihal</th>
      <th rowspan="2">Keterangan</th>
      <th rowspan="2">Lampiran</th>
    </tr>
    <tr align="center">
      <th>Urut</th>
      <th>Berkas</th>
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
    $result = mysqli_query($con,"SELECT * FROM tb_ask ORDER BY id_ask DESC");

    $no=0;
    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_array($result))
      {
        $no++;
        echo "<tr>";
        echo "<td>".$no.".</td>";
        if ($row['berkas_ask']==NULL){
          echo "<td>empty</td>";
        }else{
          echo "<td>".$row['berkas_ask'] . "</td>";
        }
        if ($row['alamat_penerima']==NULL){
          echo "<td>empty</td>";
        }else{
          echo "<td>".$row['alamat_penerima'] . "</td>";
        }
        if ($row['tanggal']==NULL){
          echo "<td>empty</td>";
        }else{
          echo "<td>".tanggal_indo($row['tanggal'], true) . "</td>";
        }
        if ($row['perihal_ask']==NULL){
          echo "<td>empty</td>";
        }else{
          echo "<td>".$row['perihal_ask'] . "</td>";
        }
        if ($row['ket_ask']==NULL){
          echo "<td>empty</td>";
        }else{
          echo "<td>".$row['ket_ask'] . "</td>";
        }
        if ($row['lampiran_ask']==NULL){
          echo "<td>empty</td>";
        }else{
          echo "<td>".$row['lampiran_ask'] . "</td>";
        }
        echo "</tr>";
        ?>
        <?php
      }
    }mysqli_close($con);
    ?>
  </tbody>
  <tfoot>
    <tr align="center">
      <th>Urut</th>
      <th>Berkas</th>
      <th>Alamat Penerima</th>
      <th>Tanggal</th>
      <th>Perihal</th>
      <th>Keterangan</th>
      <th>Lampiran</th>
    </tr>
  </tfoot>
</table>