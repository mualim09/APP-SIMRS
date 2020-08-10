<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RSKGCARE - Login</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/vendor/bootstrap/css/bootstrap.min.css')?>">
  <link href="<?php echo base_url('assets/admin/assets/vendor/fonts/circular-std/style.css')?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/libs/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')?>">
  <link rel="icon" type="assets/image/png" href="<?php echo base_url('assets/admin/assets/img/all-rs/rskg.png')?>"/>
  <style>
    html,
    body {
      height: 100%;
    }
    body {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
    }
  </style>
</head>
<body style="background-color: black">
  <div class="splash-container">
    <div class="card ">
      <div class="card-header text-center">
        <h2>ADMIN RSKGCARE</h2>
        <hr>
        <span class="splash-description"><small>Silahkan masuk-kan username dan password anda untuk memulai session.</small></span>
      </div>
      <div class="card-body">
        <?php //echo form_open_multipart(site_url('admin/aksi_login')); ?>
        <form method="POST" action="<?php echo base_url() ?>index.php/Admin/aksi_login">
        <div class="form-group">
          <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Username" autocomplete="off">
        </div>
        <div class="form-group">
          <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
        </div>
        <div class="form-group">
          <label class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox">
            <span class="custom-control-label">Remember Me</span>
          </label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
      </form>
      <hr>
      <p align="center">Version 2.0.1</p>
      <hr>
      <div align="center">
        <p>
          Powered by
        </p>
        <img src="<?php echo base_url('assets/admin/assets/img/rskgcare-icon/rskgcare.png')?>" width="150px">
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url('assets/admin/assets/vendor/jquery/jquery-3.3.1.min.js')?>"></script>
<script src="<?php echo base_url('assets/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js')?>"></script>
</body>
</html>
