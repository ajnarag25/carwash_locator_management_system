<link rel="stylesheet" href="dist/css/bootstrap.min.css">

<?php
include('connection.php');
session_start();
error_reporting(0);


// login
if (isset($_POST['login_admin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login="SELECT * FROM user WHERE email='$email' AND account_type='Admin'";
    $prompt = mysqli_query($conn, $login);
    $getData = mysqli_fetch_array($prompt);

    if (password_verify($password, $getData['password'])){
        $_SESSION['email'] = $getData['email'];
        header('location:dashboard.php');
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

// change profile pic
if (isset($_POST['change_profile'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);

    if($check !== false) {
    
        $uploadOk = 1;
        if ($uploadOk == 0) {
            echo "<script type=\"text/javascript\">
            alert(\"Sorry, your file was not uploaded.\");
            window.location = \"profile.php\"
            </script>";
    } else {
      move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
    }
        $sql='UPDATE user SET image="'.$target_file.'" WHERE account_type="Admin"';
        $result = mysqli_query($conn, $sql);
        header('location: profile.php');
        
      } else {
        echo "<script type=\"text/javascript\">
        alert(\"File is not an image!\");
        window.location = \"profile.php\"
        </script>";
        $uploadOk = 0;
      }
}

// update credentials
if (isset($_POST['updateAdmin'])) {
    $emails = $_POST['mail'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    
    if ($pass1 != $pass2){
        ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'Password does not match',
                text: 'Something went wrong!',
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
        $conn->query("UPDATE user SET password='".password_hash($pass1, PASSWORD_DEFAULT)."', email='$emails' WHERE account_type='Admin'") or die($conn->error);
        header("Location: index.php");
    }

}

// set approval for bookings
if (isset($_POST['set_approval'])) {
    $status = $_POST['stats'];
    $messages = $_POST['msg'];
    $emails = $_POST['emails'];

    if ($emails != null){
        $conn->query("UPDATE carwash SET status='$status', note='$messages' WHERE email='$emails'") or die($conn->error);
        include 'send_email_booking.php';
        ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully sent',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "booking.php";
                    }else{
                        window.location.href = "booking.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{

    }

}

// delete bookings
if (isset($_GET['deleteBooking'])) {
    $id = $_GET['deleteBooking'];
    $conn->query("DELETE FROM carwash WHERE id=$id") or die($conn->error);
    header("Location: booking.php");
}

// add carwash
if (isset($_POST['add_carwash'])){
    $names = $_POST['carName'];
    $address = $_POST['carAddress'];
    $contacts = $_POST['carContact'];
    $descriptions = $_POST['carDescription'];

    $target_dir = "uploads/";
    
    $target_file = $target_dir . time(). basename($_FILES["carImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["carImage"]["tmp_name"]);

    $sql = "SELECT * FROM system_carwash WHERE name='$names' AND address='$address' ";
    $result = mysqli_query($conn, $sql);

    if (!$result->num_rows > 0){
        move_uploaded_file($_FILES["carImage"]["tmp_name"], $target_file);
        if ($check == false ){
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'Uploaded file is not an image!',
                    text: 'Please upload an image format',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "carwash.php";
                        }else{
                            window.location.href = "carwash.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }else{
            $conn->query("INSERT INTO system_carwash (image, name, contact, address, description) 
            VALUES('$target_file','$names','$contacts', '$address', '$descriptions')") or die($conn->error);
              ?>
              <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
              <script>
                  $(document).ready(function(){
                      Swal.fire({
                      icon: 'success',
                      title: 'Successfully Added',
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'Okay'
                      }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.href = "carwash.php";
                          }else{
                              window.location.href = "carwash.php";
                          }
                      })
                      
                  })
          
              </script>
              <?php
        }
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'warning',
                title: 'Carwash already existed',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "carwash.php";
                    }else{
                        window.location.href = "carwash.php";
                    }
                })
                
            })
    
        </script>
    <?php
    }
}

// update carwash
if (isset($_POST['update_carwash'])){
    $id = $_POST['id_carwash'];
    $car = $_POST['carwash'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $desc = $_POST['description'];

    if ($id != null){
        $conn->query("UPDATE system_carwash SET name='$car', contact='$contact', address='$address', description='$desc' WHERE id='$id'") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Updated',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "carwash.php";
                    }else{
                        window.location.href = "carwash.php";
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
                title: 'No available data',
                text: 'Somthing went wrong',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "carwash.php";
                    }else{
                        window.location.href = "carwash.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }

}

// delete carwash
if (isset($_GET['deleteCarwash'])) {
    $id = $_GET['deleteCarwash'];
    $conn->query("DELETE FROM system_carwash WHERE id=$id") or die($conn->error);
    header("Location: carwash.php");
}

// update users
if (isset($_POST['updateUser'])){
    $id = $_POST['id'];
    $first = $_POST['fname'];
    $last = $_POST['lname'];
    $contacts = $_POST['contact'];
    $email = $_POST['mail'];
    
    if ($id != null){
        $conn->query("UPDATE user SET firstname='$first', lastname='$last', contact='$contacts', email='$email' WHERE id='$id'") or die($conn->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Updated',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "users.php";
                    }else{
                        window.location.href = "users.php";
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
                title: 'No available data',
                text: 'Somthing went wrong',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "users.php";
                    }else{
                        window.location.href = "users.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }

}

// delete user
if (isset($_GET['deleteUser'])) {
    $id = $_GET['deleteUser'];
    $conn->query("DELETE FROM user WHERE id=$id") or die($conn->error);
    header("Location: users.php");
}


// send message concern
if (isset($_POST['composeMessage'])){
    $id = $_POST['id'];
    $messages = $_POST['msg'];
    $emails = $_POST['email'];

    if ($id != null){
        $conn->query("UPDATE concern SET feedback='$messages', status='COMPOSED' WHERE email='$emails'") or die($conn->error);
        include 'send_email_concern.php';
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Sent your Message',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "concern.php";
                    }else{
                        window.location.href = "concern.php";
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
                title: 'No available data',
                text: 'Somthing went wrong',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "concern.php";
                    }else{
                        window.location.href = "concern.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }

}


// delete user
if (isset($_GET['deleteConcern'])) {
    $id = $_GET['deleteConcern'];
    $conn->query("DELETE FROM concern WHERE id=$id") or die($conn->error);
    header("Location: concern.php");
}

// add account owner
if (isset($_POST['add_owner'])) {
    $first = $_POST['fname'];
    $last = $_POST['lname'];
    $contact = $_POST['contact'];
    $emails = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    $sql = "SELECT * FROM user WHERE email='$emails' OR firstname='$first' AND lastname='$last' AND account_type='Owner'";
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
                    window.location.href = "users.php";
                    }else{
                        window.location.href = "users.php";
                    }
                })
                
            })

        </script>
        <?php
    }else{
        if (!$result->num_rows > 0) {
            $conn->query("INSERT INTO user (image, account_type ,firstname, lastname, contact, email, password, otp) 
                VALUES('uploads/default.png','Owner','$first','$last', '$contact', '$emails', '".password_hash($pass1, PASSWORD_DEFAULT)."', 0)") or die($conn->error);
                include 'send_email_verification.php';
                ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                        icon: 'success',
                        title: 'Successfully Created Owner Account',
                        text: 'Please login your credentials now',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "users.php";
                            }else{
                                window.location.href = "users.php";
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
                            window.location.href = "users.php";
                            }else{
                                window.location.href = "users.php";
                            }
                        })
                        
                    })
            
                </script>
                <?php
        }

    }
}

?>