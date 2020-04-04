<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
<title>Signin</title>
</head>
<body>
<div class="row">
        <div class="col-sm-12">
            <div class="well well-sm">
                <center><h1 style="color:black;">Social Network</h1></center>
            </div>
        </div>  
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="main-content">
                <div class="header">
                    <h3>Login To Social Network</h3>
                </div>
                <div class="l-part">
                    <form action="" method="post">
                        <input type="email" name="email" placeholder="Email" required="required" class="form-control input-md"><br>
                        <div class="overlap-text">
                            <input type="password" name="pass" placeholder="Password" required = "required" class="form-control input-md"><br>
                            <a style="text-decoration:none;float:right;color:#187FAB;" data-toggle="tooltip" title="Reset Password" href="forget_password.php">Forgot Password?</a>
                            <a style="text-decoration:none; float:right;color:#187FAB;" data-toggle="tooltip" title="Signin" href="signin.php">Dont have an account?</a><br><br>
                            <center><button id="signin" class="btn btn-info btn-lg" name="login">Login</button></center>
                            <?php include("login.php");?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>