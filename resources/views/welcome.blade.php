<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> NighaTech Global Pvt Ltd </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
  <!-- CSS here -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">

    </head>
    <body>



     <!-- ? Preloader Start -->
     <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center bg-dark">
            <div class="preloader-inner position-relative ">
                <div class="preloader-circle bg-dark"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{url('/')}}"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="{{url('/')}}">Home</a></li>
                                                <li><a href="#">Products</a></li>
                                                <li><a href="#">Services</a></li>
                                                <li><a target="0" href="https://forms.gle/4g1ZccvRa11cQUBVA">Careers</a></li>


                                                @if (Route::has('login'))
                                                @auth
                                                <li class=" margin-left "><a href="{{ url('/home') }}" class="text-warning">DashBoard </a></li>

                                                <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       Logout bro
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>


                                                @else
                                                @if (Route::has('register'))
                                                <!-- Button -->
                                                <li class=" margin-left "><a href="{{ route('register') }}" class="text-warning">Sign Up</a></li>
                                                @endif
                                                <li class="button-header"><a href="{{ route('login') }}" class="btn">Sign In</a></li>

                                                @endauth
                                                @endif
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        <!-- Slider Area Start-->
        <div class="slider-area slider-bg ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider d-flex align-items-center slider-height ">
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-xl-5 col-lg-5 col-md-9 ">
                                <div class="hero__caption">
                                    <span data-animation="fadeInLeft" data-delay=".3s">Industrial Innovative Revolution</span>
                                    <h1 data-animation="fadeInLeft" data-delay=".6s ">With Cutting Edge Technologies</h1>
                                    <p data-animation="fadeInLeft" data-delay=".8s">Supercharge your industries with advanced
                                       Technologies like IIOT / AI in Industry 4.0 </p>
                                    <!-- Slider btn -->
                                    <div class="slider-btns">
                                        <!-- Hero-btn -->
                                        <a data-animation="fadeInLeft" data-delay="1s" href="industries.html" class="btn radius-btn">get started</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="hero__img d-none d-lg-block f-right">
                                    <img src="assets/img/hero/hero_right.png" alt="" data-animation="fadeInRight" data-delay="1s">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slider -->

            </div>
            <!-- Slider Shape -->
            <div class="slider-shape d-none d-lg-block">
                <img class="slider-shape1" src="assets/img/hero/top-left-shape.png" alt="">
            </div>
        </div>
        <!-- Slider Area End -->
        <!-- Domain-search start -->

    <!-- Domain-search End -->
    <!--? Team -->
    <section class="team-area section-padding40 section-bg1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="section-tittle text-center mb-105">
                        <h2>Our  Exclusive's</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6"">
                    <div class="single-cat">
                        <div class="cat-icon">
                            <img src="assets/img/icon/iiot.png" height="75px" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#"> Industrial Internet of Things</a></h5>
                            <p>Cutting-edge IoT and IIoT products that connect and optimize your devices for seamless integration and enhanced efficiency.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-cat">
                        <div class="cat-icon">
                            <img src="assets/img/icon/ai.png"  height="75px" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#">Artificial Intelligence</a></h5>
                            <p>Advanced AI solutions that drive innovation, automate processes, and deliver intelligent insights.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-cat">
                        <div class="cat-icon">
                            <img src="assets/img/icon/web.png"  height="75px" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#">Web Technologies</a></h5>
                            <p> Robust web technologies designed to create dynamic, responsive, and user-friendly websites and applications.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-cat">
                        <div class="cat-icon">
                            <img src="assets/img/icon/mob.png"  height="75px" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#">Mobile Applications</a></h5>
                            <p>High-performance mobile applications tailored to provide exceptional user experiences on both Android and iOS platforms.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-cat">
                        <div class="cat-icon">
                            <img src="assets/img/icon/industry.png"  height="75px"  alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#">Industry 4.0</a></h5>
                            <p>Supercharge your industries with advanced
                                Technologies like IIOT + AI in Industry 4.0 to your Real Time Darhboards </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-cat">
                        <div class="cat-icon">
                            <img src="assets/img/icon/secur.png" height="75px"  alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="#">Secured Servers</a></h5>
                            <p>SuperSecured Servers with desired network LAN / WAN / MAN & Internet with advanced layers and protocals</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services End -->
    <!--? Pricing Card Start -->

    <!-- Pricing Card End -->
    <!--? About-1 Area Start -->
    <div class="about-area1 section-padding40">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-5 col-md-8 col-sm-10">
                    <!-- about-img -->
                    <div class="about-img ">
                        <img src="assets/img/gallery/about1.png" alt="">
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div class="about-caption ">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-30">
                            <h2>Dedicated Servers</h2>
                        </div>
                        <p class="mb-40">Reliable and high-performance dedicated servers designed to meet your business / Industrial needs with maximum uptime and security.</p>
                        <ul>
                            <li>
                                <img src="assets/img/icon/right.svg" alt="">
                                <p> Unmatched Performance </p>
                            </li>
                            <li>
                                <img src="assets/img/icon/right.svg" alt="">
                                <p>Enhanced Security</p>
                            </li>
                            <li>
                                <img src="assets/img/icon/right.svg" alt="">
                                <p> Full Control and Customization</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About-1 Area End -->
    <!--? About-2 Area Start -->
    <div class="about-area1 pb-bottom">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div class="about-caption about-caption3 mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-30">
                            <h2>Security IIoT Devices</h2>
                        </div>
                        <p class="mb-40">Advanced security IoT devices that protect and monitor your assets, ensuring safety and peace of mind.</p>
                        <ul class="mb-30">
                            <li>
                                <img src="assets/img/icon/right.svg" alt="">
                                <p>Real-Time Monitoring</p>
                            </li>
                            <li>
                                <img src="assets/img/icon/right.svg" alt="">
                                <p>Advanced Encryption</p>
                            </li>
                            <li>
                                <img src="assets/img/icon/right.svg" alt="">
                                <p>  Seamless Integration</p>
                            </li>


                        </ul>
                        <!-- <a href="#" class="btn">Explore</a> -->
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-8 col-sm-10">
                    <!-- about-img -->
                    <div class="about-img ">
                        <img src="assets/img/gallery/about2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>




</main>
<footer>
    <div class="footer-wrappr " data-background="assets/img/gallery/footer-bg.png">
        <div class="footer-area footer-padding ">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <!-- logo -->
                            <div class="footer-logo mb-25">
                                <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                            </div>

                            <!-- social -->
                            <div class="footer-social mt-50">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1"></div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Company</h4>
                                <ul>
                                    <li><a href="#">Why choose us</a></li>
                                    <li><a target="1" href="https://g.page/r/CfGOtJbUmc5CEB0/review"> Review</a></li>
                                    <li><a href="#">Customers</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a target="0" href="https://forms.gle/4g1ZccvRa11cQUBVA">Careers</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Products</h4>
                                <ul>
                                    <li><a href="#">IOT / IIOT</a></li>
                                    <li><a href="#">Artificial Intelligence </a></li>
                                    <li><a href="#">Web Technologies</a></li>
                                    <li><a href="#">Mobile Apps</a></li>
                                    <li><a href="#">Other</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Support</h4>
                                <ul>
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Products</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Customers</a></li>
                                    <li><a href="#">Quality</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer-copy-right text-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made by <a href="https://nighatechglobal.com" target="_blank">NighaTech Global</a>
                                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!-- Scroll Up -->
  <div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->

<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Date Picker -->
<script src="./assets/js/gijgo.min.js"></script>

<!-- Video bg -->
<script src="./assets/js/jquery.vide.js"></script>

<!-- Nice-select, sticky -->
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>
<!-- Progress -->
<script src="./assets/js/jquery.barfiller.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="./assets/js/jquery.counterup.min.js"></script>
<script src="./assets/js/waypoints.min.js"></script>
<script src="./assets/js/jquery.countdown.min.js"></script>
<script src="./assets/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>


    </body>
</html>
