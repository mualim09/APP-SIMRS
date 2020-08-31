<!-- Input IU(Informasi Umum) -->
<?php 
include "include/connection.php";

if(isset($_POST["create_dh"]))    
{    
  $id_logbook = $_POST['id_logbook'];
  $D_1 = $_POST['D_1'];
  $D_2 = $_POST['D_2'];
  $D_3 = $_POST['D_3'];
  $D_4 = $_POST['D_4'];
  $D_5 = $_POST['D_5'];
  $D_6 = $_POST['D_6'];
  $D_7 = $_POST['D_7'];
  $D_8 = $_POST['D_8'];
  $D_9 = $_POST['D_9'];
  $D_10 = $_POST['D_10'];
  $D_11 = $_POST['D_11'];
  $D_12 = $_POST['D_12'];
  $D_13 = $_POST['D_13'];
  $D_14 = $_POST['D_14'];
  $D_15 = $_POST['D_15'];
  $D_16 = $_POST['D_16'];
  $D_17 = $_POST['D_17'];
    // var_dump($_POST);die();

  $cek = mysql_query("SELECT * FROM tb_upload_logbook WHERE id_logbook ='$id_logbook'");
  $num = mysql_num_rows($cek);
  if($num == 1){
    $query = mysql_query("UPDATE tb_upload_logbook SET 
     D_1 = '$D_1',
     D_2 = '$D_2',
     D_3 = '$D_3',
     D_4 = '$D_4',
     D_5 = '$D_5',
     D_6 = '$D_6',
     D_7 = '$D_7',
     D_8 = '$D_8',
     D_9 = '$D_9',
     D_10 = '$D_10',
     D_11 = '$D_11',
     D_12 = '$D_12',
     D_13 = '$D_13',
     D_14 = '$D_14',
     D_15 = '$D_15',
     D_16 = '$D_16',
     D_17 = '$D_17'
     WHERE id_logbook ='$id_logbook'");
    // var_dump($query);die();
    if($query){
    // var_dump($query);die();
      header("Location: ./mdr_working_paper_kk.php");                                                  
    } else {
      echo "Updated Failed - Please contact your Administrator";
    }
  } else {
    echo "Records cannot be found!! Please contact your System Administrator" ;
  }
}

?>

<!-- <link rel="stylesheet" href="include/chart/css/bootstrap.min.css"> -->
<script src="include/chart/js/Chart.js"></script>
<script src="include/chart/js/Gauge.js"></script>

<!-- <style type="text/css">
  .container{
    width: 50%;
    height: 50%;
  }
</style> -->

<div class="modal fade" id="DASHBOARD-KK<?php echo $row['id_logbook'];?>" role="dialog">
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
          
          <div class="col-lg-12">
            <div align="center">
              <hr><h4><b>Dashboard Kualitas Kredit</b></h4><hr>
            </div>
          </div>
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="box box-solid">
                  <div align="center" style="width:500px;margin:0 auto;text-align: center;">
                    <canvas id="canvas-<?= $row['id_logbook'] ?>" style="width: 100%; height: 300px; text-align: center;"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- /.form group -->
          <button type="button" data-dismiss="modal" class="btn bg-orange btn-block btn-flat">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
$dashboard = mysql_query("SELECT COUNT(id_logbook) AS jumlah_dashboard FROM tb_parameter WHERE id_logbook ='".$row['id_logbook']."' AND status_ccr='".$tipe_ccr."' AND dashboard!='blank' GROUP BY dashboard");
$row_dashboard = mysql_num_rows($dashboard);
$count = $row_dashboard*25;
?>

<script  type="text/javascript">
  var ctx = document.getElementById("canvas-<?= $row['id_logbook'] ?>").getContext("2d");
  new Chart(ctx, {
    type: "tsgauge",
    data: {
      datasets: [{
        backgroundColor: ["#ff0000", "#fab01b", "#ffff00", "#327ba8", "#008000"],
        borderWidth: 0,
        gaugeData: {
          value: <?= 100-$count ?>,
          valueColor: "#ff7143"
        },
        gaugeLimits: [0, 20, 40, 60, 80, 100]
      }]
    },
    options: {
      events: [],
      showMarkers: true
    }
  });
</script>