<?php

    $con = mysqli_connect("localhost","root","","social_network")or die("Connection was not established");

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
               
            }else{
                if(strlen($upload_image)>=1 && strlen($content)>=1){
                    move_uploaded_file($image_tmp,"imagepost/$upload_image.$random_number");

                    $insert = "INSERT INTO posts(user_id, post_content, upload_image, post_date) VALUES ('$user_id','$content','$upload_image.$random_number', NOW())";
                    $run = mysqli_query($con,$insert);

                    if($run){
                        echo "<script>alert('Your Post Updated!')</script>";
                        echo "<script>window.open('home.php','_self')</script>";

                        $update = "UPDATE users SET posts = 'yes' WHERE user_id = '$user_id'";
                        $run_update = mysqli_query($con,$update);
               
                    }
                    exit();
                }else{
                    if($upload_image == '' && $content == ''){
                        echo "<script>alert('Error Occured while uploading!')</script>";
                        echo "<script>window.open('home.php','_self')</script>";

                    }else{
                        if($content == ''){
                            move_uploaded_file($image_tmp,"imagepost/$upload_image.$random_number");
                            $insert = "INSERT INTO posts(user_id, post_content, upload_image, post_date) VALUES ('$user_id','NO','$upload_image.$random_numbe', NOW())";
                            $run = mysqli_query($con,$insert);
                            if($run){
                                echo "<script>alert('Your Post Updated!')</script>";
                                echo "<script>window.open('home.php','_self')</script>";
        
                                $update = "UPDATE users SET posts = 'yes' WHERE user_id = '$user_id'";
                                $run_update = mysqli_query($con,$update);
                       
                            }
                            exit();
                        }else{

                            $insert = "INSERT INTO posts(user_id, post_content, post_date) VALUES ('$user_id','$content', NOW())";
                            $run = mysqli_query($con,$insert);
                            if($run){
                                echo "<script>alert('Your Post Updated!')</script>";
                                echo "<script>window.open('home.php','_self')</script>";
        
                                $update = "UPDATE users SET posts = 'yes' WHERE user_id = '$user_id'";
                                $run_update = mysqli_query($con,$update);
                            }
                        }
                    }
                }
            }
        }
    }
    function get_posts(){
        global $con;
        $per_page = 4;

        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page=1;
        }

        $start_from = ($page-1)*$per_page;

        $get_posts = "SELECT * FROM posts ORDER BY 1 DESC LIMIT $start_from, $per_page";
        $run_posts = mysqli_query($con,$get_posts);

        while($row_posts = mysqli_fetch_array($run_posts)){
            $post_id = $row_posts['post_id'];
            $user_id = $row_posts['user_id'];
            $content = substr($row_posts['post_content'],0,40);
            $upload_image = $row_posts['upload_image'];
            $post_date = $row_posts['post_date'];

            $user = "SELECT * FROM users WHERE user_id = '$user_id' AND posts='yes'";
            $run_user = mysqli_query($con,$user);
            $row_user = mysqli_fetch_array($run_user);

            $user_name = $row_user['user_name'];
            $user_image = $row_user['user_image'];

            //now displaying the post

            if($content=="NO" && strlen($upload_image)>=1){
                echo"
                    <div class='row'>
                        <div class='col-sm-3'>
                        </div>
                        <div id='posts' class='col-sm-6'>
                            <div class='row'>
                                <div class='col-sm-2'>
                                    <p><img src='$user_image' class = 'img-circle' width='100px' height='100px'</p>
                                </div>
                                <div class='col-sm-6'>
                                    <h3><a style='text-decoration:none; cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                                </div>
                                <div class='col-sm-4'>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
                                </div>
                            </div><br>
                            <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
                        </div>
                        <div class='col-sm-3'>

                        </div>
                    </div><br><br>
                ";
            }
            elseif (strlen($content)>=1 && strlen($upload_image)>=1) {
                echo"
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div class='col-sm-2'>
                                <p><img src='$user_image' class = 'img-circle' width='100px' height='100px'</p>
                            </div>
                            <div class='col-sm-6'>
                                <h3><a style='text-decoration:none; cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <p>$content</p>
                                <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
                            </div>
                        </div><br>
                        <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
                    </div>
                    <div class='col-sm-3'>

                    </div>
                </div><br><br>
            ";
            }else{
                echo"
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div class='col-sm-2'>
                                <p><img src='$user_image' class = 'img-circle' width='100px' height='100px'</p>
                            </div>
                            <div class='col-sm-6'>
                                <h3><a style='text-decoration:none; cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <h3><p>$content</p></h3>
                            </div>
                        </div><br>
                        <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
                    </div>
                    <div class='col-sm-3'>

                    </div>
                </div><br><br>
            ";
            }
        }
        include("pagination.php");
    }

    function single_post(){

        if(isset($_GET['post_id'])){
            global $con;

            $get_id = $_GET['post_id'];
            $get_posts = "SELECT * FROM posts WHERE post_id = '$get_id'";
            $run_posts =  mysqli_query($con,$get_posts);  
            $row_posts = mysqli_fetch_array($run_posts);

            $post_id = $row_posts['post_id'];
            $user_id = $row_posts['user_id'];
            $content = $row_posts['post_content'];
            $upload_image = $row_posts['upload_image'];
            $post_date = $row_posts['post_date'];

            $user = "SELECT * FROM users WHERE user_id='$user_id' AND post='yes'";

            $run_user = mysqli_query($con,$user);
            $row_user = mysqli_fetch_array($run_user);

            $user_name = $row_user['user_name'];
            $user_image = $row_user['user_image'];

            $user_email = $_SESSION['user_email'];
            $get_comment = "SELECT * FROM users WHERE  user_email = '$user_email'";
            $run_com = mysqli_query($con,$get_comment);
            $row_com = mysqli_fetch_array($run_com);

            $user_com_id = $row_com['user_id'];
            $user_com_name = $row_com['user_name'];

            if(isset($_GET['post_id'])){
                $post_id = $_GET['post_id'];
            }
            $get_posts = "SELECT post_id FROM users WHERE post_id = '$post_id'";

            $run_user = mysqli_query($con,$get_posts);
            $post_id = $_GET['post_id'];
            $get_user = "SELECT * FROM posts WHERE post_id = '$post_id'";
            $run_user = mysqli_query($con,$get_user);

            $row = mysqli_fetch_array($run_user);

            $p_id = $row['post_id'];

            if($p_id != $post_id ){
                echo "<script>alert('Error!')</script>";
                echo "<script>window.open('home.php','_self')</script>";

            }
            else{

                if($content=="NO" && strlen($upload_image)>=1){
                    echo"
                        <div class='row'>
                            <div class='col-sm-3'>
                            </div>
                            <div id='posts' class='col-sm-6'>
                                <div class='row'>
                                    <div class='col-sm-2'>
                                        <p><img src='$user_image' class = 'img-circle' width='100px' height='100px'</p>
                                    </div>
                                    <div class='col-sm-6'>
                                        <h3><a style='text-decoration:none; cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                        <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                                    </div>
                                    <div class='col-sm-4'>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
                                    </div>
                                </div><br>
                                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
                            </div>
                            <div class='col-sm-3'>
    
                            </div>
                        </div><br><br>
                    ";
                }
                elseif (strlen($content)>=1 && strlen($upload_image)>=1) {
                    echo"
                    <div class='row'>
                        <div class='col-sm-3'>
                        </div>
                        <div id='posts' class='col-sm-6'>
                            <div class='row'>
                                <div class='col-sm-2'>
                                    <p><img src='$user_image' class = 'img-circle' width='100px' height='100px'</p>
                                </div>
                                <div class='col-sm-6'>
                                    <h3><a style='text-decoration:none; cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                                </div>
                                <div class='col-sm-4'>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <p>$content</p>
                                    <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
                                </div>
                            </div><br>
                            <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
                        </div>
                        <div class='col-sm-3'>
    
                        </div>
                    </div><br><br>
                ";
                }else{
                    echo"
                    <div class='row'>
                        <div class='col-sm-3'>
                        </div>
                        <div id='posts' class='col-sm-6'>
                            <div class='row'>
                                <div class='col-sm-2'>
                                    <p><img src='$user_image' class = 'img-circle' width='100px' height='100px'</p>
                                </div>
                                <div class='col-sm-6'>
                                    <h3><a style='text-decoration:none; cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                                </div>
                                <div class='col-sm-4'>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <h3><p>$content</p></h3>
                                </div>
                            </div><br>
                            <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
                        </div>
                        <div class='col-sm-3'>
    
                        </div>
                    </div><br><br>
                ";
                }    //else condition ending

            }


            



        }

    }
?>