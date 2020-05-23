<?php 
include "include/connection.php";
$result = mysql_query("SELECT * FROM tb_user WHERE username = '$user'");
$data = mysql_fetch_array($result);
?>

<!doctype html>
<html lang="en">
<?php include "include/head.php" ?>
<body>
  <div class="dashboard-main-wrapper">
    <div class="dashboard-header">
      <?php include "include/header.php" ?>
    </div>
    <?php include "include/sidebar.php" ?>
    <div class="dashboard-wrapper">
      <div class="influence-profile">
        <div class="container-fluid dashboard-content ">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="page-header">
                <h3 class="mb-2">Dashboard </h3>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Dashboard Page</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
              <div class="card">
                <div class="card-body">
                  <div class="user-avatar text-center d-block">
                    <?php
                    if ($data['foto']==NULL) {
                      echo"<img src='assets/images/user/avatar.png' class='lingkaran'>";
                    }else{
                      echo"<img src='assets/images/user/$data[foto]' class='lingkaran'>";
                    }
                    ?>
                  </div>
                  <div class="text-center">
                    <h2 class="font-24 mb-0"><?php echo $data['full_name']; ?></h2>
                    <p><?php echo $data['unit']; ?> - <?php echo $data['jabatan']; ?></p>
                  </div>
                </div>
                <div class="card-body border-top">
                  <h3 class="font-16">Contact Information</h3>
                  <div class="">
                    <ul class="list-unstyled mb-0">
                      <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i><?php echo $data['email']; ?></li>
                      <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i><?php echo $data['no_hp']; ?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
              <div class="influence-profile-content pills-regular">
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                    <div class="row">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block">
                          <h3 class="section-title">Dashboard E-DPA</h3> <a align="right"><?php echo date('d-m-Y'); ?></a>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card">
                          <div class="card-body">
                            <h1 class="mb-1">9</h1>
                            <p>Nota Intern</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card">
                          <div class="card-body">
                            <h1 class="mb-1">35</h1>
                            <p>Finished Campaigns</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card">
                          <div class="card-body">
                            <h1 class="mb-1">8</h1>
                            <p>Accepted Campaigns</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card">
                          <div class="card-body">
                            <h1 class="mb-1">1</h1>
                            <p>Declined Campaigns</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="media influencer-profile-data d-flex align-items-center p-2">
                              <div class="mr-4">
                                <img src="assets/images/dropbox.png" alt="User Avatar" class="user-avatar-lg">
                              </div>
                              <div class="media-body">
                                <h3 class="m-b-10">Your Campaign Title Here</h3>
                                <p><span class="m-r-20 d-inline-block">Draft Due Date
                                  <span class="m-l-10 text-primary">05 Feb 2018</span>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="border-top card-footer p-0">
                        <div class="campaign-metrics d-xl-inline-block">
                          <h4 class="mb-0">40k</h4>
                          <p>Total Reach</p>
                        </div>
                        <div class="campaign-metrics d-xl-inline-block">
                          <h4 class="mb-0 ">35k</h4>
                          <p>Total Views</p>
                        </div>
                        <div class="campaign-metrics d-xl-inline-block">
                          <h4 class="mb-0">5k</h4>
                          <p>Total Click</p>
                        </div>
                        <div class="campaign-metrics d-xl-inline-block">
                          <h4 class="mb-0">15k</h4>
                          <p>Engagement</p>
                        </div>
                        <div class="campaign-metrics d-xl-inline-block">
                          <h4 class="mb-0">14k</h4>
                          <p>Conversion</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include "include/footer.php" ?>
  </div>
  <?php include "include/thirdparty.php" ?>
</body>
</html>