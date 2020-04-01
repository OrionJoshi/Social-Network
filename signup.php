<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
    #signup{
        width:60%;
        border-radius:30px;
    }
</style>
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
                    <h3 style="text-align:center;"><strong>Signup Social Network</strong></h3><hr>
                </div>
            
                <div class="l-part">
                    <form action="" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password"  name="u_password" class="form-control" placeholder="Password" required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" type="email" name="u_email" class="form-control" placeholder="Email" required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
                            <select name="u_country" class="form-control" id="" required="required">
                                <option disabled>Select Your Country</option>
                                <option>Nepal</option>
                                <option>Germany</option>
                                <option>China</option>
                                <option>Japan</option>
                                <option>USA</option>
                                <option>Norway</option>
                                <option>Finland</option>
                                <option>India</option>
                                <option>Pakistan</option>
                            </select>
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
                            <select name="u_gender" class="form-control input-md" id="" required="required">
                                <option disabled>Select Your Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>

                            </select>
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <input type="date" name="u_birthday" class="form-control input-md" placeholder="Date" required="required">
                        </div><br>
                        <a style="text-decoration:none; float:right;color:#187FAB;" data-toggle="tooltip" title="Signin" href="signin.php">Already have an account?</a><br><br>
                        <center><button id="signup" class="btn btn-info btn-lg" name="sign_up">Signup</button></center>
                        <!-- <?php  include("insert_user.php");?> -->
                    </form>
                </div>
             </div>
        </div>
    </div>    
</body>
</html>