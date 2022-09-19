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
                                                <li><a href="home.php#services">Services</a></li>
                                                <li><a href="profile.php">Profile</a></li>
                                                <li><a href="home.php#contact">Contact</a></li>
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

        <section class="office-environments section-padding30" >
            <div class="container">
                <div class="environments-wrapper environments-wrapper2 section-bg02" data-background="assets/img/gallery/carwash.jpg">
                    <div class="row">
                        <div class="col-xl-7 col-lg-8 offset-xl-5 offset-lg-4">
                            <div class="office-pera">
                                <div class="section-tittle">
                                    <form action="functions.php" method="post">
                                        <h2 class="mb-30">Carwash to be added:</h2>
                                            <?php 
                                                $emails = $_SESSION['get_data']['email'];
                                                $sql = "SELECT * FROM carwash WHERE email='$emails' AND status='PENDING'";
                                                $result = mysqli_query($conn, $sql);
                                                if (!$result->num_rows > 0) {
                                                    if (isset($_POST['addCarwash'])) {
                                                        $name = $_POST['carName']; 
                                                        $address = $_POST['carAddress'];
                                                        $contact = $_POST['carContact'];
                                                        $date = $_POST['carDate'];
                                                        $time = $_POST['carTime'];
                                                        echo"
                                                        <h3>Carwash: $name</h3>
                                                        <br>
                                                        <h3>Address: $address</h3>
                                                        <br>
                                                        <h3>Contact: $contact</h3>
                                                        <br>
                                                        <h3>Date: $date</h3>
                                                        <br>
                                                        <h3>Time: $time</h3>
                                                        ";
                                                    }else{
                                                        echo '<h2 class="mb-30">No Available Data!</h2>';
                                                    }
                                                }else{
                                                    echo '<h2 class="mb-30">No Available Data!</h2>';
                                                    ?>
                                                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                                    <script>
                                                        $(document).ready(function(){
                                                            Swal.fire({
                                                            icon: 'error',
                                                            title: 'You have a pending transaction',
                                                            text: 'Please wait for the updated status of your booking.',
                                                            confirmButtonColor: '#3085d6',
                                                            confirmButtonText: 'Okay'
                                                            }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                window.location.href = "home.php";
                                                                }else{
                                                                    window.location.href = "home.php";
                                                                }
                                                            })
                                                            
                                                        })
                                                
                                                    </script>
                                                    <?php
                                                }
                                               
                                            
                                            ?>
                                        <br>
                                        <input type="hidden" value="<?php echo $name ?>" name="carname">
                                        <input type="hidden" value="<?php echo $address ?>" name="caraddress">
                                        <input type="hidden" value="<?php echo $contact ?>" name="carcontact">
                                        <input type="hidden" value="<?php echo $date ?>" name="cardate">
                                        <input type="hidden" value="<?php echo $time ?>" name="cartime">
                                        <input type="hidden" value="<?php echo $_SESSION['get_data']['email'] ?>" name="caremail">
                                        <a href="home.php" class="btn">Cancel</a>
                                        <button type="submit" class="btn" name="bookCar">Book Now</submit>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       

        
    </main>

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
                                        <li><a href="home.php">Home</a></li>
                                        <li><a href="#">Transaction</a></li>
                                        <li><a href="home.php#services">Services</a></li>
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="home.php#contact">Contact</a></li>
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