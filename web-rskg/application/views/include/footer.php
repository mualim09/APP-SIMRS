<!-- footer-28 block -->
<section class="w3l-medpill-footer ">
  <footer class="footer-28">
    <div class="footer-bg-layer">
      <div class="container py-lg-3">
        <div class="row footer-top-28">
          <div class="col-lg-4 col-md-6 col-sm-7 footer-list-28 mt-sm-5 mt-4">
            <h6 class="footer-title-28">Contact information</h6>
            <ul class="address">
              <li>
                <p> #135 block, Barnard St. Brooklyn, <br>NY 10036, USA</p>
              </li>
              <li class="mt-4">
                <p><span class="fa fa-phone"></span> 
                  <a href="tel:+404-11-22-89">+1-2345-345-678-11</a>
                </p>
              </li>
              <li>
                <p><span class="fa fa-envelope"></span> 
                  <a href="mailto:medpillhospital@mail.com">medpillhospital@mail.com</a>
                </p>
              </li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-5 footer-list-28 mt-sm-5 mt-4">
            <h6 class="footer-title-28">Company</h6>
            <ul>
              <li><a href="#url">Mission and values</a></li>
              <li><a href="#url">Publications and reports</a></li>
              <li><a href="#url">Ladership and Awards</a></li>
              <li><a href="#url">Diversity is Our Specialty</a></li>
              <li><a href="#url">Policies & Procedures</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-4 footer-list-28 mt-sm-5 mt-4">
            <h6 class="footer-title-28">Our Services</h6>
            <ul>
              <li><a href="#url">Orthopaedic</a></li>
              <li><a href="#url">Dental Service</a></li>
              <li><a href="#url">Lung Diseases</a></li>
              <li><a href="#url">Heart Attact</a></li>
              <li><a href="#url">Sport Injury</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-8 footer-list-28 mt-sm-5 mt-4">
            <h6 class="footer-title-28">Hospital hours</h6>
            <ul class="timing mb-lg-4">
              <li><a href="#URL"><span class="fa fa-clock-o"></span>Mon to Fri : <span>08:00 - 20:00</span></a></li>
              <li><a href="#URL"><span class="fa fa-clock-o"></span>Saturday : <span>08:00 - 20:00</span></a></li>
              <li><a href="#URL"><span class="fa fa-clock-o"></span>Sunday : <span>08:00 - 20:00</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="midd-footer-28 align-center py-lg-4 py-3 mt-md-5 mt-3">
      <div class="container">
        <p class="copy-footer-28 text-center"> &copy; 2020 Medpill. All Rights Reserved. Design by 
          <a href="https://w3layouts.com/">W3Layouts</a>
        </p>
      </div>
    </div>
  </footer>
  <button onclick="topFunction()" id="movetop" title="Go to top">
    &#10548;
  </button>
  <script>
    window.onscroll = function () {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
      } else {
        document.getElementById("movetop").style.display = "none";
      }
    }

    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
  <script>
    $('#notify').change(function () {
      if ($('#notify').is("Active")) {
        $('body').css('overflow', 'hidden');
      } else {
        $('body').css('overflow', 'auto');
      }
    });
  </script>
  <script src="<?php echo base_url('assets/js/owl.carousel.js');?>"></script>
  <script>
    $(document).ready(function () {
      $('.owl-one').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        responsiveClass: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          480: {
            items: 1,
            nav: false
          },
          667: {
            items: 1,
            nav: true
          },
          1000: {
            items: 1,
            nav: true
          }
        }
      })
    })
  </script>
  <script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
  </script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
</section>

<!-- GetButton.io widget -->
<script type="text/javascript">
  (function () {
    var options = {
      <?php
      $con=mysqli_connect("localhost","root","","db_kepasaraja");
      if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $result = mysqli_query($con,"SELECT * FROM tb_profile ORDER BY id DESC");

      if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result))
        {
          ?>
          whatsapp: "<?php echo $row['telepone'];?>", // WhatsApp number
        <?php } } mysqli_close($con); ?>
          call_to_action: "Pesan disini", // Call to action
          position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
      })();
    </script>
    <!-- /GetButton.io widget -->