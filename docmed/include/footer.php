<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <!-- <div class="col-xl-4 col-md-6 col-lg-4"> -->
                    <div class="col-xl-6">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <!-- <img src="assets/img/rskg/logo-white.png" alt="" width="300px"> -->
                                </a>
                            </div>
                            <p align="center">
                                <img src="assets/img/rskg/logo-white.png" width="350px">
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="footer_widget" align="center">
                            <h3 class="footer_title">
                               <i class="fa fa-map"></i> Alamat Rumah Sakit
                           </h3>
                           <p>
                            Jl. Tubagus Ismail No. 46 Bandung 40134<br>
                            (022) 2502985. 2502984 <br>
                            rskginjal@yahoo.com
                        </p>
                        <a href="https://www.facebook.com/Rs-Khusus-Ginjal-Ny-Ra-Habibie-Bandung-417158451808795/" target="_blank">
                            <!-- <img src="assets/img/elements/facebook-1.png" width="30px"> -->
                        </a>
                        <a href="https://twitter.com/rskg_habibie" target="_blank">
                            <!-- <img src="assets/img/elements/twitter.png" width="30px"> -->
                        </a>
                        <a href="https://www.instagram.com/rskg_habibie/" target="_blank">
                            <!-- <img src="assets/img/elements/instagram.png" width="30px"> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        Rumah Sakit Khusus Ginjal Ny. R.A. Habibie. All Right Reserved | <?php echo date('Y'); ?> | RSKG CARE
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade" id="daftar" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div align="center">
                    <font style="font-size: 20px; font-family: arial; color: #56b16b">Daftar Online</font>
                    <br><small>RS. Khusus Ginjal Ny. R.A Habibie</small>
                </div>
                <form action="#">
                    <div class="mt-10">
                        <input type="text" name="first_name" placeholder="First Name"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required
                        class="single-input">
                    </div>
                    <div class="mt-10">
                        <input type="text" name="last_name" placeholder="Last Name"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required
                        class="single-input">
                    </div>
                    <div class="mt-10">
                        <input type="text" name="last_name" placeholder="Last Name"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required
                        class="single-input">
                    </div>
                    <div class="mt-10">
                        <input type="email" name="EMAIL" placeholder="Email address"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required
                        class="single-input">
                    </div>
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                        <input type="text" name="address" placeholder="Address" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Address'" required class="single-input">
                    </div>
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                        <div class="form-select" id="default-select">
                            <select>
                                <option value=" 1">City</option>
                                <option value="1">Dhaka</option>
                                <option value="1">Dilli</option>
                                <option value="1">Newyork</option>
                                <option value="1">Islamabad</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <button type="submit" name="submit" class="genric-btn success btn-block circle">Kirim</button>
                <button type="button" class="genric-btn warning btn-block circle" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
</div>