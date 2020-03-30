<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Signup</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<style>
    body{
        overflow-x:hidden;
    }
    #centered1{
        position:absolute;
        font-size:10vw;
        top:30%;
        left:30%
        transform:translate(-50%, -50%);
    }
    #centered2{
        position:absolute;
        font-size:10vw;
        top:50%;
        left:40%
        transform:translate(-50%, -50%);
    }
    #centered3{
        position:absolute;
        font-size:10vw;
        top:70%;
        left:30%
        transform:translate(-50%, -50%);
    }
    #signup{
        width:60%;
        border-radius:30px;
    }
    #login{
        width:60%;
        background-color:#fff;
        border:1px solid #1da1f2;
        color:#1da1f2;
        border-radius:30px;
    }
    #login:hover{
        width:60%;
        background-color:#fff;
        color:#1da1f2;
        border:1px solid #1da1f2;
        border-radius:30px;
    }
    .well{
        background-color:#187FAB;
    }
</style>
<body>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <center><h1 style="color:black;">Social Network</h1></center>
            </div>
        </div>
        <div class="col-sm-6" style="left:0.5%";>
            <img src="images/social-networks-background.jpg" alt="Instagram photo" class="img-rounded" title="Instagram" width="650px" height="500px">
             <div id="centered1" class="centered"><h3 style="color:white;"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>Flow Your Interset</strong></h3></div>
             <div id="centered2" class="centered"><h3 style="color:white;"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>Hear what people are talking about</strong></h3></div>
             <div id="centered3" class="centered"><h3 style="color:white;"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>Join the conversation</strong></h3></div>
        </div>
        <div class="col-sm-6" style="left:8%;">
        <img src="images/logo.webp" alt="Instagram photo" class="img-rounded" title="Instagram" width="200px" height="100px">
        <h2><strong>Lets Join To See The World</strong></h2><br><br>
        <h4><strong>Join Social Network Today</strong></h4>
        <form action="" method="post">
            <button id="signup" class="btn btn-info btn-lg" name="signup">Sign Up</button><br><br>
            <?php
                if(isset($_POST['signup'])){
                    echo "<script>window.open('signup.php','_self')</script>";
                }
            ?>
            <button id="login" class="btn btn-info btn-lg" name="login">Login</button><br><br>
            <?php
                if(isset($_POST['login'])){
                    echo "<script>window.open('login.php','_self')</script>";
                }
            ?>
        </form>
        </div>
        
    </div>
    
</body>
</html>