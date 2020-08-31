<?php

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Sales Dashboard</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">
  <h2 align="center">Welcome</h2>

  <div class="row">
    <div class="col-sm-3">
      <div class="panel-group">
        <div class="panel panel-primary">
          <div class="panel-heading" align="center">Speed Chart 1</div>
          <div class="panel-body"><iframe src="chart1.php" width="100%" height="400"></iframe></div>
        </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="panel-group">
        <div class="panel panel-success">
          <div class="panel-heading" align="center">Speed Chart 2</div>
          <div class="panel-body"><iframe src="chart2.php" width="100%" height="400"></iframe></div>
        </div>
      </div>
    </div>

   <div class="col-sm-3">
     <div class="panel-group">
       <div class="panel panel-warning">
         <div class="panel-heading" align="center">Speed Chart 3</div>
         <div class="panel-body"><iframe src="chart3.php" width="100%" height="400"></iframe></div>
       </div>
     </div>
   </div>

   <div class="col-sm-3">
     <div class="panel-group">
       <div class="panel panel-danger">
         <div class="panel-heading" align="center">Speed Chart 4</div>
         <div class="panel-body"><iframe src="chart4.php" width="100%" height="400"></iframe></div>
       </div>
     </div>
   </div>
  </div>

</div>
</body>
</html>
