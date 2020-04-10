<!DOCTYPE html>
<?php
    session_start();
    include("includes/header.php");

    if(!isset($_SESSION['user_email'])){
        header("location:index.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
    <title>Edit Post</title>
</head>
<body>
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
            <?php
                if(isset($_GET['post_id'])){
                    $get_post_id = $_GET['post_id'];

                    $get_post = "SELECT * FROM posts WHERE post_id = '$get_post_id'";
                    $run_post = mysqli_query($con,$get_post);
                    $row = mysqli_fetch_array($run_post);
                    $post_con = $row['post_content'];
                }
            
            ?>
            <form action="" method="post" id ="f">
                <center><h2>Edit Your Post</h2></center><br>
                <textarea name="content" id="" cols="83" rows="4" class="form-control"><?php echo $post_con;?></textarea>
            </form>
        </div>
    </div>
    
</body>
</html>