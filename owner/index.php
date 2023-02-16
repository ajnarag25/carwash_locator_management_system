<?php 
include('connection.php');
session_start();
if (!isset($_SESSION['get_data']['email'])) {
      header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link href="assets/images/loder.png" rel="icon">
    <title>Carwash Locator Management System - Owner</title>
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

</head>


<style>
    .no-result-div{
        display:none;
    }
</style>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full"
        data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <div class="navbar-brand text-center">
                        <a href="index.php" class="logo">
                            <b class="logo-icon">
                                <img src="assets/images/loder.png" width="30" alt="homepage" class="light-logo" />
                            </b>
                            <span class="logo-text">
                                <span style="color: white">Carwash Owner</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item search-box">
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="assets/images/loder.png" alt="user" class="rounded-circle" width="30">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php"><i class="ti-user me-1 ms-1"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="logout.php"><i class="ti-shift-right me-1 ms-1"></i>
                                    Logout</a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php"
                                aria-expanded="false">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php"
                                aria-expanded="false">
                                <i class="mdi mdi-account-box"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="logout.php"
                                aria-expanded="false">
                                <i class="mdi mdi-arrow-left"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                       
                    </ul>
                </nav>
            
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="container-fluid">
                <?php 
                    $firstname = $_SESSION['get_data']['firstname'];
                    $lastmame = $_SESSION['get_data']['lastname']; 
                    $contact = $_SESSION['get_data']['contact']; 
                    $email = $_SESSION['get_data']['email']; 
                    $check_owner = $firstname .' '. $lastmame;
                ?>
                
                <?php 
                    $query = "SELECT * FROM system_carwash WHERE owner='$check_owner' AND email='$email'";
                    $result = mysqli_query($conn, $query);

                    if (!$result->num_rows > 0){

                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h3>Welcome, <?php echo $firstname. ' '. $lastmame; ?></h3>
                            <p>Owner's Account can only add one carwash per account.</p>
                            <button class="btn btn-success w-25" style="color:white" data-bs-toggle="modal" data-bs-target="#carwash">Add Carwash <i class="mdi mdi-plus"></i></button>
                            <br><br>
                        </div>
                        <!-- Add Carwash Modal -->
                        <div class="modal fade" id="carwash" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h3>Add Carwash</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="functions.php" method="POST"  enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <h5 class="modal-title">This is to add available carwash in the system</h5>
                                        <br>
                                        <label>Upload Image</label>
                                        <input type="file" class="form-control" name="carImage" accept="image/png, image/jpeg" required>
                                        <br>
                                        <label>Owner</label>
                                        <input type="text" class="form-control" name="carOwner" value="<?php echo $firstname.' '.$lastmame ?>" readonly>
                                        <br>
                                        <label>Contact Information</label>
                                        <input type="text" class="form-control" name="carContact" value="<?php echo $contact ?>" readonly>
                                        <br>
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="carEmail" value="<?php echo $email ?>" readonly>
                                        <br>
                                        <label>Name of Carwash</label>
                                        <input type="text" class="form-control" name="carName" required>
                                        <br>
                                        <label>Branch Name</label>
                                        <input type="text" class="form-control" name="carBranch" required>
                                        <br>
                                        <div class="row">
                                            <h5>Address</h5>
                                            <div class="col-md-4">
                                                <label>Barangay</label>
                                                <input type="text" class="form-control" name="carBarangay" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Municipality</label>
                                                <input type="text" class="form-control" name="carMunicipality" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Province</label>
                                                <input type="text" class="form-control" name="carProvince" required>
                                            </div>
                                        </div>
                                        <br>
                                        <label>Description</label>
                                        <textarea class="form-control" name="carDescription" id="" cols="30" rows="5" required></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" style="color:white" name="add_carwash">Add</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } 
                
                else {?>

                <div class="col-lg-12">
                
                <?php 
                    $query = "SELECT * FROM system_carwash WHERE owner='$check_owner' AND email='$email'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                
                <div class="single-card mb-30">
                <h3 class="text-center">Active Carwash:</h3>
                <br>
                    <div class="card-top text-center">
                        <img src="<?php echo $row['image'] ?>" width="300" alt="">
                        <br><br>
                        <h4><?php echo $row['name'] ?></h4>
                        
                    </div>
                    <div class="card-bottom text-center">
                        <p><?php echo $row['description'] ?></p>
                        <button class="form-control btn btn-danger w-25" style="color:white" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id'] ?>">Edit Carwash Details</button>
                        <button class="form-control btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#addService<?php echo $row['id'] ?>">Add Services & Promos</button>
                        <button class="form-control btn btn-secondary w-25" data-bs-toggle="modal" data-bs-target="#addBranch<?php echo $row['id'] ?>" style="color:white">Add Branch</button>
                    </div>
                         <!-- Edit Modal -->
                         <div class="modal fade" id="editModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h3>Edit Carwash Details</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="functions.php" method="POST">
                                    <div class="modal-body">
                                        <label for="">Carwash</label>
                                        <input class="form-control" type="text" name="carwash" value="<?php echo $row['name']; ?>">
                                        <br>
                                        <label for="">Contact</label>
                                        <input class="form-control" type="text" name="contact" value="<?php echo $row['contact']; ?>">
                                        <br>
                                        <div class="row">
                                            <h5>Address</h5>
                                            <div class="col-md-4">
                                                <label>Barangay</label>
                                                <input type="text" class="form-control" name="barangay" value="<?php echo $row['barangay']; ?>" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Municipality</label>
                                                <input type="text" class="form-control" name="municipality" value="<?php echo $row['municipality']; ?>" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Province</label>
                                                <input type="text" class="form-control" name="province" value="<?php echo $row['province']; ?>" required>
                                            </div>
                                        </div>
                                        <br>
                                        <label for="">Branch Name</label>
                                        <input class="form-control" type="text" name="branch" value="<?php echo $row['branch']; ?>">
                                        <br>
                                        <label for="">Description</label>
                                        <textarea class="form-control" name="description" value="<?php echo $row['description']; ?>" id="" cols="30" rows="5"><?php echo $row['description']; ?></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" value="<?php echo $row['id']; ?>" name="id_carwash">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" style="color:white" name="update_carwash">Update</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>

                        
                        <!-- Add Services Modal -->
                       <div class="modal fade" id="addService<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h3>Add Services & Promos</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="functions.php" method="POST">
                                    <div class="modal-body">
                                        <label for="">Current Services</label>
                                        <textarea class="form-control" value="<?php echo $row['services']; ?>" id="" cols="10" rows="3" readonly><?php echo $row['services']; ?></textarea>
                                        <label for="">Current Promos</label>
                                        <textarea class="form-control" value="<?php echo $row['promo']; ?>" id="" cols="10" rows="3" readonly><?php echo $row['promo']; ?></textarea>
                                        <br><br>
                                        <label for="">Add Services</label>
                                        <textarea class="form-control" name="services" id="" cols="10" rows="3" required></textarea>
                                        <br>
                                        <label for="">Add Promos</label>
                                        <textarea class="form-control" name="promo" id="" cols="10" rows="3" required></textarea>
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" value="<?php echo $row['email']; ?>" name="email_services">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" style="color:white" name="add_services">Add Services & Promo</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>

                        <!-- Add Branches Modal -->
                        <div class="modal fade" id="addBranch<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h3>Add Branch</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="functions.php" method="POST">
                                    <div class="modal-body">
                                        <label for="">Branch Name</label>
                                        <input class="form-control" type="text" name="branch" required>
                                        <br>
                                        <div class="row">
                                            <h5>Address</h5>
                                            <div class="col-md-4">
                                                <label>Barangay</label>
                                                <input type="text" class="form-control" name="barangay" value="<?php echo $row['barangay']; ?>" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Municipality</label>
                                                <input type="text" class="form-control" name="municipality" value="<?php echo $row['municipality']; ?>" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Province</label>
                                                <input type="text" class="form-control" name="province" value="<?php echo $row['province']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" value="<?php echo $row['owner']; ?>" name="owner">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" style="color:white" name="add_branch">Add Branch</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                </div>
               
                <?php } ?>
                </div>

                <?php }?>
                <br>
                <h4 class="page-title">Bookings</h4>
                <div class="col-lg-4" style="display: inline-flex;">
                    <input type="search" class="form-control rounded"  placeholder="Search" onkeyup="studentSearch()" id="searchStudent" />
                    <span class="input-group-text bg-success text-white"><i class='mdi mdi-magnify'></i></span>
                </div>
                   
                    
         
                <div class="col-12">
                        <div class="card card-body">
                            <button class="btn btn-success w-25" style="color:white" id="make_report" data-bs-toggle="tooltip" data-bs-placement="top" title="Make Report"><i class='bx bx-download' ></i> Make Report</button>
                            <div class="container-fluid">
                                <div class="card-body overflow-auto">
                                    <table class="table table-hover" id="studentTable">
                                        <thead class="thead-dark">
                                          <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Carwash</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Date & Time</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Note</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
                                            $firstname = $_SESSION['get_data']['firstname'];
                                            $lastmame = $_SESSION['get_data']['lastname']; 
                                            $check_owner = $firstname .' '. $lastmame;
                                            $query = "SELECT * FROM carwash WHERE owner='$check_owner'";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {

                                        ?>
                                          <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['person']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['address']?></td>
                                            <td><?php echo $row['contact']; ?></td>
                                            <td><?php echo $row['date']; ?> / <?php echo $row['time']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><?php echo $row['note']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-placement="top" title="Set Approval" data-bs-target="#editModal<?php echo $row['id'] ?>"> <i class="mdi mdi-pencil"></i></button>
                                                <button type="button" class="btn btn-danger" style="color:white" data-bs-toggle="modal" data-bs-placement="top" title="Delete Request" data-bs-target="#deleteModal<?php echo $row['id'] ?>"> <i class="mdi mdi-delete"></i></button>
                                            </td>
                                          </tr>
                                        </tbody>

                                         <!-- Modal Delete-->
                                         <div class="modal fade" id="deleteModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete request of user: <?php echo $row['person'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <h4>Are you sure you want to delete this user request?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a class="btn btn-danger" style="color:white" href="functions.php?deleteBooking=<?php echo $row["id"] ?>">Delete</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                         <!-- Approval Modal -->
                                         <div class="modal fade" id="editModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3>Set Approval</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="functions.php" method="POST">
                                                    <div class="modal-body">
                                                        <h5 class="modal-title" id="exampleModalLabel">Set Approval for User: <?php echo $row['person'] ?></h5>
                                                        <br>
                                                        <select class="form-select" name="stats" id="" required>
                                                            <option disabled selected value="">Select status</option>
                                                            <option value="APPROVED">Approve</option>
                                                            <option value="DECLINED">Decline</option>
                                                        </select>
                                                        <br>
                                                        <h5>Compose Message</h5>
                                                        <textarea class="form-control" name="msg" id="" cols="30" rows="5" required></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" value="<?php echo $row['email'] ?>" name="emails">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="set_approval">Send</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>

                                      
                                        <?php }; ?>

                                      </table>
                                      <br>
                                      <?php 
                                        $sql = "SELECT * FROM carwash ";
                                        $result=mysqli_query($conn, $sql);
                                        $row = mysqli_num_rows($result);
                                    ?>
                                    <p>Showing <?php echo $row; ?> entries </p>
                                    
                                    <div class="no-result-div mt-4 text-center" id="no-student">
                                        <div class="div">
                                            <img src="assets/images/search.svg" width="150" height="150" alt="">
                                            <h4 class="mt-3">Search not found...</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>


            <footer class="footer text-center">
                Carwash Locator Management System
            </footer>
        </div>
    </div>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="dist/js/waves.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <script src="dist/js/functions.js"></script>
    <script>
        // PRINT TABLE
        function printData(){
            var divToPrint=document.getElementById("studentTable");
            newWin= window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }
        $('#make_report').on('click',function(){
            printData();
        })
    </script>
</body>

</html>