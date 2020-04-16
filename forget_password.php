<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forget Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>
    body{
        overflow-x:hidden;
    }
    .main-content{
        width:50%;
        height:40%;
        margin:10px auto;
        background-color:#fff;
        border: 2px solid #e6e6e6;
        padding:40px 50px;
    }
    .header{
        border:0px solid #000;
        margin-bottom:5px;
    }
    .well{
        background-color:#187FAB;
    }
    #signup{
        width:60%;
        border-radius:30px;
    }
</style>
<body>
    <div class="row">
       <div class="col-sm-12">
            <div class="well">
                <center><h1 style="color:white;"><strong>Social Network</strong></h1></center>
            </div>
       </div> 
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="main-content">
                <div class="header">
                    <h3 style="text-align:center;"><strong>Forget Password</strong></h3><br>
                </div>
                <div class="l_pass">
                    <form action="" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
                        </div><br>
                        <hr>
                        <pre class="text">Enter Your Best Friend Name </pre>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input type="text" class="form-control" placeholder="Someone" name="recovery_account" required>
                        </div><br>
                        <a style="text-decoration:none; float:right;color=#187FAB;" data-toggle="tooltip" title="Signin" href="login.php">Back To Signin ?</a>
                        <center><button id="signup" class="btn btn-info btn-lg" name="submit">Submit</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    session_start();
    include("includes/connection.php");
    
    if(isset($_POST['submit'])){

        $email = htmlentities(mysqli_real_escape_string($con,$_POST['email']));
        $recovery_account = htmlentities(mysqli_real_escape_string($con,$_POST['recovery_account']));

        $select_user = "SELECT * FROM users WHERE user_email = '$email' AND recovery_account='$recovery_account'";
        $query = mysqli_query($con,$select_user);
        $check_user = mysqli_num_rows($query);

        if($check_user == 1){
            $_SESSION['user_email'] = $email;

            echo "<script>window.open('change_password.php','_self')</script>";
        }else{
            echo "<script>alert('Your Email or recovery input incorrect!')</script>";
        }
    }

?>