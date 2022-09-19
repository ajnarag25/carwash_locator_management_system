<?php 
  include('connection.php');
  session_start();
  if (!isset($_SESSION['get_data']['username'])) {
        header("Location: index.php");
    }
?>


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
                                                <li><a href="" data-toggle="modal" data-target="#transaction">Transaction</a></li>
                                                <li><a href="#services">Services</a></li>
                                                <li><a href="profile.php">Profile</a></li>
                                                <li><a href="#contact">Contact</a></li>
                                                <li><a href="functions.php?logout" type="submit" >Logout</a></li>                                      
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
          <!-- Modal Transaction-->
          <div class="modal fade" id="transaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel"> <i class='bx bxs-book-bookmark'></i> Transactions</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Bookings</h3>
                        <div class="card-body overflow-auto">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">Carwash</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Note</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $get_email = $_SESSION['get_data']['email'];
                                    $query = "SELECT * FROM carwash WHERE email='$get_email' ";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {

                                ?>
                                    <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['address']?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['note']; ?></td>
                                    <td>
                                        <a class="btn btn-danger" style="color:white" href="functions.php?deleteBook=<?php echo $row['id'] ?>">Delete</a>
                                    </td>
                                    </tr>
                                </tbody>

                                <?php }; ?>
                            </table>
                        </div>
                        <h3>Concerns</h3>
                        <div class="card-body overflow-auto">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">Concern</th>
                                    <th scope="col">Feedback</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $get_email = $_SESSION['get_data']['email'];
                                    $query = "SELECT * FROM concern WHERE email='$get_email' ";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {

                                ?>
                                    <tr>
                                    <td><?php echo $row['message']; ?></td>
                                    <td><?php echo $row['feedback']?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <a class="btn btn-danger" style="color:white" href="functions.php?deleteConcern=<?php echo $row['id'] ?>">Delete</a>
                                    </td>
                                    </tr>
                                </tbody>

                                <?php }; ?>
                            </table>
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
                                    <h2><i class='bx bx-user' style="font-size: 70px; color: rgb(62, 62, 255);"></i> Welcome, <?php echo $_SESSION['get_data']['firstname'] ?> <?php echo $_SESSION['get_data']['lastname'] ?></h2>
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
                                    <a href="" class="btn" data-toggle="modal" data-target="#carwash">Add Carwash</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal Add Carwash-->
        <div class="modal fade" id="carwash" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel"> <i class='bx bx-car'></i>Add Carwash</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="form-contact contact_form" method="post" action="addcarwash.php">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <p>Please submit all the necessary informations needed <br> make sure you check the nearest carwash in your area.</p>
                                    <label for="">Complete Name of the Carwash <span style="color:red">*</span></label>
                                    <input class="form-control valid" name="carName" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Complete Address of Carwash <span style="color:red">*</span></label></label>
                                    <input class="form-control valid" name="carAddress" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'" placeholder="Enter Address" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Contact Information of Carwash <span style="color:red">*</span> <br> if no available contact please type NA instead</label>
                                    <input class="form-control" name="carContact" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Contact'" placeholder="Enter Contact" required>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="addCarwash">Add</button>
                            <button type="button" class="btn" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                        <form class="form-contact contact_form" method="post" action="functions.php">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="cmessage" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="cname" id="name" type="text" value="<?php echo $_SESSION['get_data']['firstname'] ?> <?php echo $_SESSION['get_data']['lastname'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="cemail" id="email" type="email" value="<?php echo $_SESSION['get_data']['email'] ?>"  readonly>
                                    </div>
                                </div>   
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn" name="ccompose">Send</button>
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
                                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="#" >Carwash Locator Management System</a></p>
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