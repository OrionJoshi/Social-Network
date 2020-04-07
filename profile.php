<!DOCTYPE html>
<?php
    session_start();
    include("includes/header.php");

    if(!isset($_SESSION['user_email'])){
        header("location:index.php");
    }
?>
<html lang="en">
<head>
    <?php
        $user = $_SESSION['user_email'];

        $get_user = "SELECT * FROM users WHERE user_email='$user'";
        $run_user = mysqli_query($con,$get_user);
        $row = mysqli_fetch_array($run_user);
        $user_name = $row['user_name'];
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>
    #cover-img{
        height:400px;
        width:100%;
    }#profile-img{
        position:absolute;
        top:160px;
        left:40px;
    }#update_profile{
        position:relative;
        top:-33px;
        cursor:pointer;
        left:93px;
        border-radius:4px;
        background-color: rgba(0,0,0,0.1);
        transform:translate(-50%,-50%);
    }#button_profile{
        position:absolute;
        top:80%;
        left:50%;
        cursor:pointer;
        transform:translate(-50%,-50%);

    }
</style>
<body>
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <?php
                echo"
                    <div>
                        <div><img id='cover-img' class='img-rounded' src='$user_cover' alt ='cover'</div>
                        <form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>
                            <ul class= 'nav pull-left' style='position:absolute;top:10px;left:40px;'>
                                <li class='dropdown'>
                                    <button class='dropdown-toggle btn btn-default' data-toggle='dropdown'>Change Cover</button>
                                    <div class='dropdown-menu'>
                                        <center>
                                        <label class='btn btn-info'>Select Cover
                                        <input type='file' name='u_cover' size='60' />
                                        </label><br><br>
                                        <button name='submit' class='btn btn-info'>Update Cover</button>
                                        </center>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div id='profile-img'>
                        <img src='$user_image' alt='profile' class='img-circle' width='180px' height='185px'>
                        <form action'= 'profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>
                                <label id='update_profile'>Select profile
                                <input type='file' name='u_image' size='60' />
                                </label><br><br>
                                <button id = 'button_profile' name='update' class='btn btn-info'>Update Profile</button>        
                        </form>
                    </div><br>
                ";
            ?>
            <?php
                if(isset($_POST['submit'])){

                    $u_cover = $_FILES['u_cover']['name'];
                    $image_temp = $_FILES['u_cover']['tmp_name'];

                    //$random_number = rand(1,100);

                    if($u_cover==''){
                        echo "<script>alert('Please Select Cover Image')</script>";
                        echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
                        exit();
                    }else{
                        move_uploaded_file($image_temp,"cover/$u_cover");
                        $update = "UPDATE users SET user_cover='cover/$u_cover' WHERE user_id = '$user_id'";
                        $run = mysqli_query($con,$update);

                        if($run){
                            echo "<script>alert('Cover Image Updated')</script>";
                            echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
                           
                        }
                    }

                }
            ?>
        </div>
    </div>
</body>
</html>