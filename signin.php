<?php
    session_start();

    include("includes/connection.php");
    
    if(isset($_POST['login'])){

        $email = htmlentities(mysqli_real_escape_string($con,$_POST['email']));
        $pass = htmlentities(mysqli_real_escape_string($con,$_POST['pass']));

       
    }

?>