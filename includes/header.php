<?php
        include("includes/connection.php");
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" aria-expanded="false"></button>
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <a href="home.php" class="navbar-brand">Social Network</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php
                    $user = $_SESSION['user_email'];

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
                    $user_birthday = $row['user_birthday'];
                    $user_image = $row['user_image'];
                    $user_cover = $row['user_cover'];
                    $register_date = $row['user_reg_date'];
                    $recovery_account =$row['recovery_account'];
                ?>
            </ul>
        </div>
    </div>

</nav>