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
    <title>Forget Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
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
                            <span class="input-group-addon"><i clas="glyphicon glyphicon-user"></i></span>
                            <input type="email" name="email" placeholder="Enter Your Email" required>
                        </div><br>
                        <hr>
                        <pre class="text">Enter Your Best Friend Name </pre>
                        <div class="input-group">
                            <span class="input-group-addon"><i clas="glyphicon glyphicon-pencil"></i></span>
                            <input type="text" class="form-control" placeholder="Someone" name="recovery_account" required>
                        </div><br>
                        <a style="text-decoration:none; float:right;color=#187FAB;" data-toggle="tooltip" title="Signin" href="signin.php">Back To Signin ?</a>
                        <center><button id="signup" class="btn btn-info btn-lg" name="submit">Submit</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>