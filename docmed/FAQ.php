<!doctype html>
<html class="no-js" lang="zxx">
<?php include 'include/head.php' ?>
<body>
    <div class="preloader">
        <div class="loading">
            <img src="assets/gif/radio.gif">
            <font style="font-family: arial; font-size: 25px; color: #56b16b">Loading</font>
        </div>
    </div>
    <?php include 'include/header.php' ?>
    <div class="bradcam_area breadcam_bg" style="background-image: url('assets/img/bg-pelayanan/bg-faq.png'); background-size: 100%; background-position: 50% 50%;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>FAQ</h3>
                        <p><a href="index.php">Beranda </a>/ FAQ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Kirim Pesan</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'" placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subjek'" placeholder="Subjek">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control valid" name="telepon" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Telepon'" placeholder="Telepon">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pesan'" placeholder=" Pesan"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Kirim</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Jl. Tubagus Ismail No. 46</h3>
                            <p>Bandung, 40134</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>(022) 2502985. 2502984 </h3>
                            <p>24 Jam</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>rskginjal@yahoo.com</h3>
                            <p>Anda dapat email kami kapanpun!</p>
                        </div>
                    </div>
                    <!-- <strong>Hubungi Kami<hr></strong>
                    <strong>Pusat Panggilan:</strong><font>(022)2502985</font><br>
                    <strong>IGD:</strong><font>(022)2502985</font><br>
                    <strong>Whatsapp:</strong><font>(022)2502985</font><br>
                    <strong>Email:</strong><font>rskghabibie@yahoo.com</font><br>
                    <strong>Pemasaran:</strong><font>rskghabibie@yahoo.com</font><br> -->
                </div>
            </div>
        </div>
    </section>
    <?php include 'include/footer.php' ?>
    <?php include 'include/jsfile.php'; ?>
</body>
</html>