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
        <?php
           
            if(isset($_POST['update'])){

                $u_image = $_FILES['u_image']['name'];
                $image_temp = $_FILES['u_image']['tmp_name'];

                //$random_number = rand(1,100);

                if($u_image==''){
                    echo "<script>alert('Please Select profile Image')</script>";
                    echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
                    exit();
                }else{
                    move_uploaded_file($image_temp,"users/$u_image");
                    $update = "UPDATE users SET user_image='users/$u_image' WHERE user_id = '$user_id'";
                    $run = mysqli_query($con,$update);

                    if($run){
                        echo "<script>alert('Your Profile Image Updated')</script>";
                        echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
                    
                    }
                }
            }
        ?>
    </div>
    <!-- New Column -->
    <div class="col-sm-2">
            
    </div>
</div>

    <!-- New Row  -->
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-2" style="background-color: #e6e6e6; text-align:center;left:0.9%;border-radius: 5px;">
            <?php
                 echo "
                    <center><h2><strong>About</strong></h2></center>
                    <center><h4><strong>$first_name $last_name</strong></h4></center>
                    <p><strong><i style='color:grey;'>$describe_user</i></strong></p><br>
                    <p><strong>Relationship Status: </strong> $relationship_status</p><br>
                    <p><strong>Lives In: </strong> $user_country</p><br>
                    <p><strong>Member Since: </strong> $register_date</p><br>
                    <p><strong>Gender: </strong> $user_gender</p><br>
                    <p><strong>Date of Birth: </strong> $user_birthday</p><br>
                    ";
            ?>
        </div>
        <div class="col-sm-6">
            <?php
                global $con;
                if(isset($_GET['u_id'])){
                    $u_id = $_GET['u_id'];
                }
                $get_posts = "SELECT * FROM posts WHERE user_id='$u_id' ORDER BY 1 DESC LIMIT 5";
                $run_posts = mysqli_query($con,$get_posts);

                while($row_posts = mysqli_fetch_array($run_posts)){
                    $posts_id = $row_posts['post_id'];
                    $user_id = $row_posts['user_id'];
                    $content = $row_posts['post_content'];
                    $upload_image = $row_posts['upload_image'];
                    $post_date = $row_posts['post_date'];

                    $user = "SELECT * FROM users WHERE user_id = '$user_id' AND posts='yes'";
                    $run_user = mysqli_query($con,$user);
                    $row_user = mysqli_fetch_array($run_user);

                    $user_name = $row_user['user_name'];
                    $user_image = $row_user['user_image'];

                    //for displaying the posts

                    if($content=="NO" && strlen($upload_image)>=1){
                        echo"
                            <div id='own_posts'>
                                <div class='row'>
                                    <div class='col-sm-2'>
                                        <p><img src='$user_image' class = 'img-circle' width='100px' height='100px'</p>
                                    </div>
                                    <div class='col-sm-6'>
                                        <h3><a style='text-decoration:none; cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                        <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                                    </div>
                                    <div class='col-sm-4'>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
                                    </div>
                                </div><br>
                                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a><br>
                                <a herf='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br>

                            </div><br><br>
                        
                        ";

                    }
                    elseif(strlen($content)>=1 && strlen($upload_image)>=1){
                        echo"
                            <div id='own_posts'>
                                <div class='row'>
                                    <div class='col-sm-2'>
                                        <p><img src='$user_image' class = 'img-circle' width='100px' height='100px'</p>
                                    </div>
                                    <div class='col-sm-6'>
                                        <h3><a style='text-decoration:none; cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                        <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                                    </div>
                                    <div class='col-sm-4'>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <p>$content</p>
                                        <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
                                    </div>
                                </div><br>
                                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a><br>
                                <a herf='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br>

                            </div><br><br>
                        
                        ";

                    }
                }
            ?>
        </div>
    </div>
</body>
</html>