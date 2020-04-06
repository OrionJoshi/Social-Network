<!DOCTYPE html>
<?php
    session_start();
    include("includes/header.php");

    if(isset($_SESSION['user_email'])){
        header("location:index.php");
    }
?>
<html lang="en">
<head>
    <?php
        $user = $_SESSION['user_email'];

        $get_user = "SELECT * FROM users WHERE user_email='$user'";
        $run_user = mysqli_query($con,$get_user);
        $row = mysqli_fetch_array($run_user);
        $user_name = $row['user_name'];
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$user_name";?>t</title>
</head>
<body>
    
</body>
</html>