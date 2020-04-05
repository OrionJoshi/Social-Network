<!DOCTYPE html>
<html>
<head>
    <title>Signin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<style>
    body{
        overflow-x: hidden;
    }
    .main-content{
        width:50%;
        height:40%;
        margin:10px auto;
        background-color:#fff;
        border:2px solid #e6e6e6;
        padding:40px 50px;
    }
    .header{
        border:0px solid #000;
        margin-bottom:5px;
    }
    .well{
        background-color:#187FAB;
    }
    #signin{
        width:60%;
        border-radius:30px;
    }
    .overlap-text{
        position:relative;
    }
    .overlap-text a{
        position:absolute;
        top: 8px;
        right: 10px;
        font-size: 14px;
        text-decoration:none;
        font-family:'Overpass Mono',monospace;
        letter-spacing: -1px;
    }
</style>
<body>
<div class="row">
     <div class="col-sm-12">
        <div class="well ">
            <center><h1 style="color:black;">Social Network</h1></center>
        </div>
    </div>  
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="main-content">
            <div class="header">
                <h3 style="text-align:center;"><strong>Login Social Network</strong></h3><hr>
            </div>
            <div class="l-part">
                <form action="" method="post">
                    <input type="email" name="email" placeholder="Email" required="required" class="form-control input-md"><br>
                    <div class="overlap-text">
                        <input type="password" name="pass" placeholder="Password" required = "required" class="form-control input-md"><br>
                        <a style="text-decoration:none;float:right;color:#187FAB;" data-toggle="tooltip" title="Reset Password" href="forget_password.php">Forgot Password?</a>
                    </div>
                    <a style="text-decoration:none; float:right;color:#187FAB;" data-toggle="tooltip" title="Create Account!" href="signup.php">Dont have an account?</a><br><br>
                    <center><button id="signin" class="btn btn-info btn-lg" name="login">Login</button></center>
                    <?php include('signin.php');?>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>