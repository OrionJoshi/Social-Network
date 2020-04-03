<?php
    include('includes/connection.php');

    if(isset($_POST['sign_up'])){
        $first_name = htmlentities(mysqli_real_escape_string($conn,$_POST['first_name']));
        $last_name = htmlentities(mysqli_real_escape_string($conn,$_POST['last_name']));
        $pass = htmlentities(mysqli_real_escape_string($conn,$_POST['u_pass']));
        $email = htmlentities(mysqli_real_escape_string($conn,$_POST['u_email']));
        $country = htmlentities(mysqli_real_escape_string($conn,$_POST['u_country']));
        $gender = htmlentities(mysqli_real_escape_string($conn,$_POST['u_gender']));
        $birthday = htmlentities(mysqli_real_escape_string($conn,$_POST['u_birthday']));
        $status = "Verified";
        $posts = "no";
        $newgid = sprintf('%05d',rand(0,999999));
        $username = strtolower($first_name."_".$last_name."_". $newgid);
        $check_username_query = "SELECT user_name FROM users WHERE user_emial='$email'";
        $run_username = mysqli_query($con,$check_username_query);

        if(strlen($pass)<9){
            echo "<script>alert('Password Should be minimun 9 character!');</script>";
            exit();
        }
        $check_email = "SELECT * FROM users WHERE user_email = '$email'";
        $run_email = mysqli_query($check_email);

        $check = mysqli_num_rows($run_email);

        if($check == 1){
            echo "<script>alert('Email Already exits,Please try using another email');</script>";
            echo "<script>window.open('signup.php','_self')</script>";
            exit();
        }

    }

?>