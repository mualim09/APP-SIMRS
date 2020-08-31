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
				<h1 class="m-0 text-dark">TELEPON KELUAR</h1>
			</div>
      <hr>
			<div class="container-fluid">
				<!-- DATA -->
				<table border="2px" class="table table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Hari/Tanggal</th>
              <th>Ext</th>
              <th>Nomor Tujuan</th>
              <th>PIC</th>
              <th>Keterangan</th>
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
            $result = mysqli_query($con,"SELECT * FROM tb_tlpkel ORDER BY id_tlpkel DESC");

            $no=0;
            if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_array($result))
              {
                $no++;
                echo "<tr>";
                echo "<td>".$no.".</td>";
                if ($row['date_tlpkel']==NULL){
                  echo "<td>empty</td>";
                }else{
                  echo "<td>".tanggal_indo($row['date_tlpkel'], true) . "</td>";
                }
                if ($row['ext']==NULL){
                  echo "<td>empty</td>";
                }else{
                  echo "<td>".$row['ext'] . "</td>";
                }
                if ($row['telepon']==NULL){
                  echo "<td>empty</td>";
                }else{
                  echo "<td>".$row['telepon'] . "</td>";
                }
                if ($row['PIC']==NULL){
                  echo "<td>empty</td>";
                }else{
                  echo "<td>".$row['PIC'] . "</td>";
                }
                if ($row['keterangan']==NULL){
                  echo "<td>empty</td>";
                }else{
                  echo "<td>".$row['keterangan'] . "</td>";
                }
                echo "</tr>";
                ?>
                <?php
              }
            }mysqli_close($con);
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Hari/Tanggal</th>
              <th>Ext</th>
              <th>Nomor Tujuan</th>
              <th>PIC</th>
              <th>Keterangan</th>
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
