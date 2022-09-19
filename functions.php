<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<?php 
include('connection.php');
session_start();
error_reporting(0);


#LOGOUT
if (isset($_GET['logout'])) {
    session_destroy();
    header('location:index.php');
} 

#LOGIN
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login="SELECT * FROM user WHERE username='$username'";
    $prompt = mysqli_query($conn, $login);
    $getData = mysqli_fetch_array($prompt);

    if (password_verify($password, $getData['password'])){
        $_SESSION['get_data'] = $getData;
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


#SIGNUP PART
if (isset($_POST['signup'])) {
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    $contact = $_POST['contact'];
    $emails = $_POST['email'];
    $user = $_POST['username'];
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
            $conn->query("INSERT INTO user (firstname, lastname, contact, email, username, password, otp) 
                VALUES('$first','$last', '$contact', '$emails', '$user', '".password_hash($pass1, PASSWORD_DEFAULT)."', 0)") or die($conn->error);
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
    $cperson = $_POST['carperson'];
    $cname = $_POST['carname'];
    $caddress = $_POST['caraddress'];
    $ccontact = $_POST['carcontact'];
    $cemail = $_POST['caremail'];
    $cdate = $_POST['cardate'];
    $ctime = $_POST['cartime'];
    if ($cemail != null){
        $conn->query("INSERT INTO carwash (person, name, address, contact, email, date, time,status, note) 
        VALUES('$cperson','$cname','$caddress', '$ccontact', '$cemail', '$cdate', '$ctime','PENDING','NA')") or die($conn->error);
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
    $username = $_POST['pusername'];
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
        $conn->query("UPDATE user SET username='$username', password='".password_hash($pass1, PASSWORD_DEFAULT)."', email='$emails' WHERE id='$id'") or die($conn->error);
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