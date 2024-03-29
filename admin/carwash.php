<?php 
include('connection.php');
session_start();
if (!isset($_SESSION['email'])) {
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
    <title>Carwash Locator Management System - Carwash</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/niceadmin-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link href="dist/css/style.min.css" rel="stylesheet">
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
                        <a href="dashboard.php" class="logo">
                            <b class="logo-icon">
                                <img src="assets/images/loder.png" width="30" alt="homepage" class="light-logo" />
                            </b>
                            <span class="logo-text">
                                <span style="color: white">System Administrator</span>
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php"
                                aria-expanded="false">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="booking.php"
                                aria-expanded="false">
                                <i class="mdi mdi-book"></i>
                                <span class="hide-menu">Bookings</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="carwash.php"
                                aria-expanded="false">
                                <i class="mdi mdi-car"></i>
                                <span class="hide-menu">Carwash</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="concern.php"
                                aria-expanded="false">
                                <i class="mdi mdi-message-reply-text"></i>
                                <span class="hide-menu">Concerns</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="users.php"
                                aria-expanded="false">
                                <i class="mdi mdi-account"></i>
                                <span class="hide-menu">Users</span>
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
                        <h4 class="page-title">Carwash</h4>
                        <div class="col-lg-10" style="display: inline-flex;">
                            <input type="search" class="form-control rounded"  placeholder="Search" onkeyup="studentSearch()" id="searchStudent" />
                            <span class="input-group-text bg-success text-white"><i class='mdi mdi-magnify'></i></span>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">List of Bookings</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-body">
                            <div class="container-fluid">
                                <div class="card-body overflow-auto">
                                    <button class="btn btn-success" style="color:white" data-bs-toggle="modal" data-bs-target="#carwash">Add Carwash <i class="mdi mdi-plus"></i></button>
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
                                                    <label>Name of Carwash</label>
                                                    <input type="text" class="form-control" name="carName" required>
                                                    <br>
                                                    <label>Complete Address</label>
                                                    <input type="text" class="form-control" name="carAddress" required>
                                                    <br>
                                                    <label>Contact Information</label>
                                                    <input type="text" class="form-control" name="carContact" required>
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
                                    <table class="table table-hover" id="studentTable">
                                        <thead class="thead-dark">
                                          <tr>
                                            <th scope="col">Image</th>
                                            <th scope="col">Carwash</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
                                            $query = "SELECT * FROM system_carwash ";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {

                                        ?>
                                          <tr>
                                            <td><img src="<?php echo $row['image'] ?>" width="80" alt=""></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['contact']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-placement="top" title="Edit Carwash Details" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id'] ?>"> <i class="mdi mdi-pencil"></i></button>
                                                <button type="button" class="btn btn-danger" data-bs-placement="top" title="Delete Carwash" style="color:white" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id'] ?>"> <i class="mdi mdi-delete"></i></button>
                                            </td>
                                          </tr>
                                        </tbody>

                                         <!-- Modal Delete-->
                                         <div class="modal fade" id="deleteModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Carwash</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <h4>Are you sure you want to delete this carwash?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a class="btn btn-danger" style="color:white" href="functions.php?deleteCarwash=<?php echo $row["id"] ?>">Delete</a>
                                                </div>
                                            </div>
                                            </div>
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
                                                        <label for="">Address</label>
                                                        <input class="form-control" type="text" name="address" value="<?php echo $row['address']; ?>">
                                                        <br>
                                                        <label for="">Description</label>
                                                        <textarea class="form-control" name="description" value="<?php echo $row['description']; ?>" id="" cols="30" rows="5"><?php echo $row['description']; ?></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" value="<?php echo $row['id']; ?>" name="id_carwash">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="update_carwash">Update</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>

                                      
                                        <?php }; ?>

                                      </table>
                                      <br>
                                      <?php 
                                        $sql = "SELECT * FROM system_carwash ";
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
</body>

</html>