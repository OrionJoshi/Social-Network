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
                    <h3 style="text-align:center;"><strong>Change Your Password</strong></h3><br>
                </div>
                <div class="l_pass">
                    <form action="" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" name="pass" class="form-control" placeholder="New Password" required>
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" placeholder="Confirm New Password" name="pass1" required>
                        </div><br>
                        <center><button id="signup" class="btn btn-info btn-lg" name="change">Change Password</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>