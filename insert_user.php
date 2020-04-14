<?php
    include('includes/connection.php');

    if(isset($_POST['sign_up'])){
        $first_name = htmlentities(mysqli_real_escape_string($con,$_POST['first_name']));
        $last_name = htmlentities(mysqli_real_escape_string($con,$_POST['last_name']));
        $pass = htmlentities(mysqli_real_escape_string($con,$_POST['u_password']));
        $email = htmlentities(mysqli_real_escape_string($con,$_POST['u_email']));
        $country = htmlentities(mysqli_real_escape_string($con,$_POST['u_country']));
        $gender = htmlentities(mysqli_real_escape_string($con,$_POST['u_gender']));
        $birthday = htmlentities(mysqli_real_escape_string($con,$_POST['u_birthday']));
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
            echo "<script>window.open('login.php','_self')</script>";
            exit();
        }
        $rand = rand(1,3);    //Random Number between 1 to 3 generated

            if($rand == 1){
                $profile_pic = "users/male.jpg";
            }
            elseif($rand ==2){
                $profile_pic = "users/male1.jpg";
            }elseif($rand == 3){
                $profile_pic = "users/female.png";
            }
        $insert = "INSERT INTO users(f_name,l_name,user_name,describe_user,relationship
        ,user_pass,user_email,user_country,user_gender,user_birthdate,user_image,user_cover
        ,user_reg_date,status,posts,recovery_account)
        VALUES('$first_name','$last_name','$username','Hello new user! Welcome Here',
        '...','$pass','$email','$country','$gender','$birthday','$profile_pic','cover/default-cover.jpg',
        NOW(),'$status','$posts','Iwanttoputdingintheuniverse')";

        $query = mysqli_query($con,$insert);

        if($query){
            echo "<script>alert('Well Done $first_name, you are good to go.');</script>";
            echo "<script>window.open('signin.php','_self')</script>";
            
        }else{
            echo "<script>alert('Registration Failed, Please try agian!');</script>";
            echo "<script>window.open('signup.php','_self')</script>";
           
        }
    }

?>