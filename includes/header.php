<?php
    
    include("connection.php");
    include("functions/functions.php");
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a href="home.php" class="navbar-brand">Social Network</a>
        </div>
        <div class="collapse navbar-collapse" id="#bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                   
                    $user =  $_SESSION['user_email'];

                    $get_user = "SELECT * FROM users WHERE user_email='$user'";
                    $run_user = mysqli_query($con,$get_user);
                    $row = mysqli_fetch_array($run_user);

                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $first_name =$row['f_name'];
                    $last_name = $row['l_name'];
                    $describe_user = $row['describe_user'];
                    $relationship_status = $row['relationship'];
                    $user_pass = $row['user_pass'];
                    $user_email = $row['user_email'];
                    $user_country = $row['user_country'];
                    $user_gender = $row['user_gender'];
                    $user_birthday = $row['user_birthdate'];
                    $user_image = $row['user_image'];
                    $user_cover = $row['user_cover'];
                    $register_date = $row['user_reg_date'];
                    $recovery_account =$row['recovery_account'];

                    $user_posts = "SELECT * FROM posts WHERE user_id = '$user_id'";
                    $run_posts = mysqli_query($con,$user_posts);
                    $posts = mysqli_num_rows($run_posts);
                ?>
                <li><a href='profile.php?<?php echo "u_id=$user_id" ?>'><?php echo $first_name;?></a></li>
                <li><a href="home.php">Home</a></li>
                <li><a href="member.php">find people</a></li>
                <li><a href="messages.php?u_id=new">Messages</a></li>
                <?php
                    echo "
                        <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span> <i class='glyphicon glyphicon-chevron-down'></i></span></a>
                            <ul class='dropdown-menu'>
                                <li>
                                    <a href='my_post.php?u_id=$user_id'>My Posts <span class='badge badge-secondary'>$posts</span></a>
                                </li>
                                <li>
                                    <a href='edit_profile.php?u_id=$user_id'>Edit Account</a>
                                </li>
                                <li role='separator' class='divider'></li>
                                <li>
                                    <a href='logout.php'>Logout</a>
                                </li>
                            </ul>
                        </li>
                    
                    ";
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <form action="results.php" method="get" class=" navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_query" placeholder="Search">
                            <button type="submit" class="btn btn-info" name="search">Search</button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>

</nav>