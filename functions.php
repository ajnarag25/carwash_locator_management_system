<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<?php 
include('connection.php');
session_start();
// error_reporting(0);


#LOGOUT
if (isset($_GET['logout'])) {
    session_destroy();
    header('location:index.php');
} 

#LOGIN
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $account = $_POST['account'];

    $login1="SELECT * FROM user WHERE email='$email' AND account_type='Customer'";
    $prompt1 = mysqli_query($conn, $login1);
    $getData1 = mysqli_fetch_array($prompt1);

    $login2="SELECT * FROM user WHERE email='$email' AND account_type='Owner'";
    $prompt2 = mysqli_query($conn, $login2);
    $getData2 = mysqli_fetch_array($prompt2);

    if ($account == 'Customer'){
        if (password_verify($password, $getData1['password'])){
            $_SESSION['get_data'] = $getData1;
            header('location:home.php');
        }else{
        ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'Username and/or Password is incorrect',
                    text: 'Something went wrong!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "login.php";
                        }else{
                            window.location.href = "login.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    }elseif ($account == 'Owner'){
        if (password_verify($password, $getData2['password'])){
            $_SESSION['get_data'] = $getData2;
            header('location:./owner/index.php');
        }else{
        ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'Username and/or Password is incorrect',
                    text: 'Something went wrong!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "login.php";
                        }else{
                            window.location.href = "login.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    } else{
        ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'An Error Occured',
                    text: 'Something went wrong!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "login.php";
                        }else{
                            window.location.href = "login.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
    }
 

}


#SIGNUP PART
if (isset($_POST['signup'])) {
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    $contact = $_POST['contact'];
    $emails = $_POST['email'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];

    $sql = "SELECT * FROM user WHERE email='$emails' OR firstname='$first' AND lastname='$last'";
    $result = mysqli_query($conn, $sql);

    if ($pass1 != $pass2){
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
                Swal.fire({
                icon: 'warning',
                title: 'Your password does not match',
                text: 'Check your password again',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                    }else{
                        window.location.href = "index.php";
                    }
                })
                
            })

        </script>
        <?php
    }else{
        if (!$result->num_rows > 0) {
            $conn->query("INSERT INTO user (image, account_type ,firstname, lastname, contact, email, password, otp) 
                VALUES('../assets/default.png','Customer','$first','$last', '$contact', '$emails', '".password_hash($pass1, PASSWORD_DEFAULT)."', 0)") or die($conn->error);
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                        icon: 'success',
                        title: 'Successfully Registered',
                        text: 'Please login your credentials now',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "index.php";
                            }else{
                                window.location.href = "index.php";
                            }
                        })
                        
                    })
            
                </script>
                <?php
        }else{
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                        icon: 'error',
                        title: 'User is already registered',
                        text: 'Please login your credentials now',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "index.php";
                            }else{
                                window.location.href = "index.php";
                            }
                        })
                        
                    })
            
                </script>
                <?php
        }

    }
}



#ADD CARWASH
if (isset($_POST['bookCar'])) {
    $cowner = $_POST['carowner'];
    $cperson = $_POST['carperson'];
    $cname = $_POST['carname'];
    $caddress = $_POST['caraddress'];
    $ccontact = $_POST['carcontact'];
    $cemail = $_POST['caremail'];
    $cdate = $_POST['cardate'];
    $ctime = $_POST['cartime'];
    $cpayment = $_POST['carpayment'];
    date_default_timezone_set('Asia/Manila');
    $set_date = date("Y-m-d");

    $sql = "SELECT * FROM carwash WHERE date_submit='$set_date'";
    $result = mysqli_query($conn, $sql);
    
    if ($result->num_rows >= 10) {
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'Cannot Exceed in 10 Bookings for today',
                text: 'Please submit another booking tommorrow',
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
    }else{
            if ($cemail != null){
                $conn->query("INSERT INTO carwash (owner ,person, name, address, contact, email, date, time,status, note, date_submit, payment) 
                VALUES('$cowner','$cperson','$cname','$caddress', '$ccontact', '$cemail', '$cdate', '$ctime','PENDING','NA', '$set_date', '$cpayment')") or die($conn->error);
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                        icon: 'success',
                        title: 'Successfully Booked',
                        text: 'We will update your transaction, for the meantime check your transaction to see the status of your booking',
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
            }else{
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                        icon: 'error',
                        title: 'No Data Available',
                        text: 'Something went wrong!',
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
    }
 

}

#DELETE TRANSACTION
if (isset($_GET['deleteBook'])) {
    $id = $_GET['deleteBook'];
    if ($id != null){
        $conn->query("DELETE FROM carwash WHERE id=$id") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Deleted',
                text: 'Transaction details removed',
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

    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'No Data Available',
                text: 'Something went wrong!',
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

}
if (isset($_GET['deleteConcern'])) {
    $id = $_GET['deleteConcern'];
    if ($id != null){
        $conn->query("DELETE FROM concern WHERE id=$id") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Deleted',
                text: 'Transaction details removed',
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

    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'No Data Available',
                text: 'Something went wrong!',
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

}

#CONCERN SUBMISSION
if (isset($_POST['ccompose'])) {
    $msg = $_POST['cmessage'];
    $name = $_POST['cname'];
    $email = $_POST['cemail'];

    $sql = "SELECT * FROM concern WHERE email='$email' AND name='$name'";
    $result = mysqli_query($conn, $sql);

    if (!$result->num_rows > 0) {
        $conn->query("INSERT INTO concern (name, email, message, feedback, status) 
        VALUES('$name','$email', '$msg', 'NA','PENDING')") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Submitted your Concern',
                text: 'We will update your transaction, for the meantime check your transaction to see the status of your concern',
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
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'warning',
                title: 'You have already sent your concern',
                text: 'Please wait for your response',
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
}

#UPDATE ACCOUNT
if (isset($_POST['updateAcc'])) {
    $id = $_POST['pid'];
    $email = $_POST['pemail'];
    $pass1 = $_POST['ppass1'];
    $pass2 = $_POST['ppass2'];

    if ($pass1 != $pass2){
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
                Swal.fire({
                icon: 'warning',
                title: 'Your password does not match',
                text: 'Check your password again',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "profile.php";
                    }else{
                        window.location.href = "profile.php";
                    }
                })
                
            })

        </script>
        <?php
    }else{
        $conn->query("UPDATE user SET email='$email', password='".password_hash($pass1, PASSWORD_DEFAULT)."' WHERE id='$id'") or die($conn->error);
        session_destroy();
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Updated your Account',
                text: 'You will be automatically logout and simply login your new account credentials',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                    }else{
                        window.location.href = "index.php";
                    }
                })
                
            })

        </script>
        <?php
    }

}



?>