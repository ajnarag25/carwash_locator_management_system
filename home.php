<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Carwash Locator Management System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/loder.png">

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
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
</head>

<style>
    html{scroll-behavior: smooth;}
</style>

<body class="full-wrapper">
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="home.php"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">                                                                                          
                                                <li><a href="home.php">Home</a></li>
                                                <li><a href="#">Transaction</a></li>
                                                <li><a href="#services">Services</a></li>
                                                <li><a href="#">Profile</a></li>
                                                <li><a href="#contact">Contact</a></li>
                                                <li><a href="">Logout</a></li>                                      
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
        <!--? Hero Start -->
        <div class="container-fluid">
            <div class="slider-area2">
                <div class="slider-height2 hero-overly d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="hero-cap hero-cap2">
                                    <h2>Welcome User</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="office-environments section-padding30" >
            <div class="container">
                <div class="environments-wrapper environments-wrapper2 section-bg02" data-background="assets/img/gallery/location.jpg">
                    <div class="row">
                        <div class="col-xl-7 col-lg-8 offset-xl-5 offset-lg-4">
                            <div class="office-pera">
                                <div class="section-tittle">
                                    <h2 class="mb-30">Your Current Location Details:</h2>
                                    <?php 
                                     $query = @unserialize (file_get_contents('http://ip-api.com/php/'));
                                     if ($query && $query['status'] == 'success') {
                                        $country = $query['country'];
                                        $city = $query['city'];
                                        $region = $query['regionName'];
                                        $zip = $query['zip'];
                                        $lat = $query['lat'];
                                        $long = $query['lon'];
                                     }
                                    ?>
                                    <h3>Country: <?php echo $country ?></h3>
                                    <h3>City: <?php echo $city ?></h3>
                                    <h3>Region: <?php echo $region ?></h3>
                                    <h3>Zip Code: <?php echo $zip ?></h3>
                                    <h3>Latitude: <?php echo $lat ?></h3>
                                    <h3>Longitude: <?php echo $long ?></h3>
                                    <br>
                                    <a href="https://www.google.com/maps/search/car+wash+near+me/" class="btn" target="_blank">View Carwash Near Me</a>
                                    <a href="" class="btn">Add Carwash</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pricing-card-area fix section-padding30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-md-10">
                        <div class="section-tittle text-center mb-90">
                            <h2>Available Carwash in Pangasinan</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                        <div class="single-card text-center mb-30">
                            <div class="card-top">
                                <img src="assets/img/gallery/section_bg02.jpg" width="300" alt="">
                                <h4>Car wash</h4>
                            </div>
                            <div class="card-bottom">
                                <p>Description</p>
                                <a href="#" class="borders-btn">Check Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                        <div class="single-card text-center mb-30">
                            <div class="card-top">
                                <img src="assets/img/icon/price1.svg" alt="">
                                <h4>Detailing</h4>
                                <p>Starting at</p>
                            </div>
                            <div class="card-mid">
                                <h4>$100.00</h4>
                            </div>
                            <div class="card-bottom">
                                <ul>
                                    <li>2 TB of space</li>
                                    <li>unlimited bandwidth</li>
                                    <li>full backup systems</li>
                                    <li>free domain</li>
                                    <li>unlimited database</li>
                                </ul>
                                <a href="#" class="borders-btn">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                        <div class="single-card text-center mb-30">
                            <div class="card-top">
                                <img src="assets/img/icon/price1.svg" alt="">
                                <h4>Wash & Detailing</h4>
                                <p>Starting at</p>
                            </div>
                            <div class="card-mid">
                                <h4>$200.00</h4>
                            </div>
                            <div class="card-bottom">
                                <ul>
                                    <li>2 TB of space</li>
                                    <li>unlimited bandwidth</li>
                                    <li>full backup systems</li>
                                    <li>free domain</li>
                                    <li>unlimited database</li>
                                </ul>
                                <a href="#" class="borders-btn">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Card End -->

        <div id="services"></div>

        <section class="categories-area section-padding40" >
            <div class="container">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-10 col-sm-11">
                        <div class="section-tittle mb-60">
                            <h2>Our Services</h2>
                            <p>We provide quality services according to your needs for locating and inquiring/booking some of the carwash near in your place.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <i class='bx bx-book-bookmark' style="font-size: 70px; color: rgb(62, 62, 255);"></i>
                            <br><br>
                            <div class="cat-cap">
                                <h5>Inquire/Book your desired carwash</h5>
                                <p>Select existing carwash saved in this system.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <i class='bx bx-location-plus' style="font-size: 70px; color: rgb(62, 62, 255);"></i>
                            <br><br>
                            <div class="cat-cap">
                                <h5>Request for a specific carwash near you</h5>
                                <p>You can provide the exact place of your desired carwash.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                            <i class='bx bx-chat' style="font-size: 70px; color: rgb(62, 62, 255);"></i>
                            <br><br>
                            <div class="cat-cap">
                                <h5>Send your concerns </h5>
                                <p>Simply compose your concerns and we will give our feedback right away.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div id="contact"></div>

    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-10 col-sm-11">
                    <div class="section-tittle mb-60">
                        <h2>Submit your Concern</h2>
                        <p>We will review your concern and give our feedback right away.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                
                <div class="col-lg-8">
                    <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <form class="form-contact contact_form" method="post"  >
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Pangasinan State University Bayambang Campus</h3>
                            <p>RF72+5X2, Quezon Blvd, Bayambang, 2423 Pangasinan</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>(+63) 9318066384</h3>
                            <p>Contact Number</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>sample@gmail.com</h3>
                            <p>Email Address</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-wrapper section-bg2"  data-background="assets/img/gallery/footer-bg.png">
            <!-- Footer Start-->
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo mb-35">
                                        <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>The Carwash Locator Management System is intended for finding accurate location of Carwash near in your place.</p>
                                        </div>
                                        <ul class="mb-40">
                                            <li class="number"><a href="#">(+63) 9318066384</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Navigation</h4>
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="#">Transaction</a></li>
                                        <li><a href="#services">Services</a></li>
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="#contact">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
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
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                 <p>
                                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="" target="_blank">Carwash Locator Management System</a></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Footer End-->
      </div>
  </footer>
      <!-- Scroll Up -->
      <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.slicknav.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>
    <script src="./assets/js/gijgo.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/jquery.barfiller.js"></script>
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
    
</body>
</html>