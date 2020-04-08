<?php

    $con = mysqli_connect("localhost","root","","social_network");

    //function for inserting the post
    function insertPost(){
        if(isset($_POST['sub'])){
            global $con;
            global $user_id;

            $content = htmlentities($_POST['content']);
            $upload_image = $_FILES['upload_image']['name'];
            $image_tmp = $_FILES['upload_image']['tmp_name'];

            $random_number = rand(1,100);

            if(strlen($content)>250){
                echo "<script>alert('Please use 250 or less than 250 word!')</script>";
                echo "<script>window.open('home.php','_self')</script>";
               
            }
        }
    }

?>