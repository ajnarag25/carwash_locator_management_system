<?php
include('connection.php');

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
        $sql='UPDATE admin SET image="'.$target_file.'" WHERE id=1';
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
    $username = $_POST['user'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $emails = $_POST['mail'];
    
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
        $conn->query("UPDATE admin SET username='$username', password='$pass1', email='$emails' WHERE id=1") or die($conn->error);
        header("Location: ../index.php");
    }



}

?>