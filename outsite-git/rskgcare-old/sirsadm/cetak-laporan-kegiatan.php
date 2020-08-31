<?php
include "include/connection.php";

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
<!DOCTYPE html>
<html>
<script>
	window.print();
</script>
<?php include 'include/header.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row">
					<!-- <div align="left">
						<img src="assets/img/all-rs/rskg.png" width="100px">
					</div> -->
				</div>
			</div>
		</div>
		<!-- ISI -->
		<section class="content">
			<div align="center" class="col-sm-12">
				<h1 class="m-0 text-dark">LAPORAN KEGIATAN</h1>
			</div>
      <hr>
			<div class="container-fluid">
				<!-- DATA -->
				<table border="2px" class="table table-striped">
          <thead>
            <tr align="center">
              <th rowspan="2">No.</th>
              <th colspan="2">Hari/Tanggal</th>
              <th rowspan="2">Kegiatan</th>
              <th rowspan="2">Nama Peserta</th>
              <th rowspan="2">Tempat</th>
            </tr>
            <tr align="center">
              <th>Mulai</th>
              <th>Selesai</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $con=mysqli_connect("localhost","root","","rskg_sirsadm");
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
                echo "<tr>";
                echo "<td>".$no.".</td>";
                if ($row['tanggal']==NULL){
                  echo "<td>empty</td>";
                }else{
                  echo "<td>".tanggal_indo($row['tanggal'], true) . "</td>";
                }
                if ($row['selesai']==NULL){
                  echo "<td>empty</td>";
                }else{
                  echo "<td>".tanggal_indo($row['tanggal'], true) . "</td>";
                }
                if ($row['kegiatan']==NULL){
                  echo "<td>empty</td>";
                }else{
                  echo "<td>".$row['kegiatan'] . "</td>";
                }
                if ($row['username']==NULL){
                  echo "<td>empty</td>";
                }else{
                  echo "<td>".$row['username'] . "</td>";
                }
                if ($row['tempat']==NULL){
                  echo "<td>empty</td>";
                }else{
                  echo "<td>".$row['tempat'] . "</td>";
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
              <th>No.</th>
              <th>Mulai</th>
              <th>Selesai</th>
              <th>Kegiatan</th>
              <th>Nama Peserta</th>
              <th>Tempat</th>
            </tr>
          </tfoot>
        </table>
        <!-- END DATA -->
      </div>
    </section>
    <!-- END ISI -->
  </div>
  <?php include 'include/jsfile.php'; ?>
</body>
</html>
