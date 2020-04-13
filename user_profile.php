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
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body>
    <div class="row">
        <?php
            if(isset($_GET['u_id'])){
                $u_id = $_GET['u_id'];
            }
            if($u_id < 0 || $u_id == ""){
                echo "<script>window.open('home.php','_self')</script>";
            }else{

        ?>
        <div class="col-sm-12">
            <?php
                if(isset($_GET['u_id'])){
                    global $con;
                    $user_id = $_GET['u_id'];

                    $select = "SELECT * FROM users WHERE user_id='$user_id'";
                    $run = mysqli_query($con,$select);
                    $row = mysqli_fetch_array($run);

                    $username = $row_user['user_name'];
        
                }
            ?>
            <?php
                if(isset($_GET['u_id'])){
                    global $con;

                    $user_id = $_GET['u_id'];
                    $select = "SELECT * FROM users WHERE user_id='$user_id'";
                    $run = mysqli_query($con,$select);
                    $row = mysqli_fetch_array($run);

                    $id = $row['user_id'];
                    $name = $row['user_name'];
                    $f_name =$row['f_name'];
                    $l_name = $row['l_name'];
                    $describe_user = $row['describe_user'];
                    $relationship_status = $row['relationship'];
                    $user_email = $row['user_email'];
                    $country = $row['user_country'];
                    $gender = $row['user_gender'];
                    $image = $row['user_image'];
                    $register_date = $row['user_reg_date'];

                    echo "
                        <div class='row'>
                            <div class='col-sm-1'></div>
                            <center>
                                <div style='background-color:#e6e6e6;' class='col-sm-3'></div>
                            </center>    
                        </div>
                    
                    ";
                }
            ?>
        </div>
    </div>
</body>
</html>