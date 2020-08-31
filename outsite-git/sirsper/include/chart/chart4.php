<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sales Target Achievement Current Month</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/Chart.js"></script>
    <script src="js/Gauge.js"></script>
  </head>
  <body>
    <div class="container">
      <h3 align="center">Current Month Percentage</h3>
      <div class="row" align="center">
        <a href="saleschartprogressytd.php" class="btn btn-primary">Show Last Month Percentage</a>
        <canvas id="canvas" width="100" height="100"></canvas>
        <br><br>
      </div>
    </div>

  </body>
</html>

<script  type="text/javascript">
var ctx = document.getElementById("canvas").getContext("2d");
new Chart(ctx, {
  type: "tsgauge",
  data: {
    datasets: [{
      backgroundColor: ["#ff0000", "#ffff00", "#008000"],
      borderWidth: 0,
      gaugeData: {
        value: 40,
        valueColor: "#ff7143"
      },
      gaugeLimits: [0, 35, 70, 100]
    }]
  },
  options: {
            events: [],
            showMarkers: true
  }
});
</script>
