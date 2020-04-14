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
    <title>Messages</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body>
    <div class="row">
      <?php
        if(isset($_GET['u_id'])){
            global $con;

            $get_id = $_GET['u_id'];

            $get_user = "SELECT * FROM users WHERE user_id = '$get_id'";
            $run_user = mysqli_query($con,$get_user);
            $row_user = mysqli_fetch_array($run_user);

            $user_to_msg = $row_user['user_id'];
            $user_to_name = $row_user['user_name'];
        }
        $user = $_SESSION['user_email'];
        $get_user = "SELECT * FROM users WHERE user_email='$user'";
        $run_user = mysqli_query($con,$get_user);
        $row = mysqli_fetch_array($run_user);

        $user_from_msg = $row['user_id'];
        $user_from_name = $row['user_name'];
      ?>
      <div id="select_user" class="col-sm-3">
            <?php
                $user = "SELECT * FROM users";
                $run_user = mysqli_query($con,$user);

                while($row_user = mysqli_fetch_array($run_user)){
                    $user_id = $row_user['user_id'];
                    $user_name = $row_user['user_name'];
                    $first_name = $row_user['f_name'];
                    $last_name = $row_user['l_name'];
                    $user_image = $row_user['user_image'];

                    echo"
                        <div class='container-fluid'>
                            <a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='messages.php?u_id=$user_id'>
                            <img class='img-circle' src='$user_image' width='90px' height='80px' title='$user_name'><strong>&nbsp $first_name $last_name</strong><br><br>
                            </a>
                        </div>
                    
                    ";
                }


            ?>
      </div>
      <div class="col-sm-6">
            <div class="load_msg" id="scroll_messages">
                <?php
                  $sel_msg = "SELECT * FROM user_messages WHERE (user_to = '$user_to_msg' AND user_from = '$user_from_msg') OR (user_from = '$user_to_msg' AND user_to = '$user_from_msg') ORDER BY 1 ASC";
                  $run_msg = mysqli_query($con,$sel_msg);

                  while($row_msg = mysqli_fetch_array($run_msg)){
                      $user_to = $row_msg['user_to'];
                      $user_from = $row_msg['user_from'];
                      $msg_body = $row_msg['message_body'];
                      $msg_date = $row_msg['date'];
                ?>
                      <div id="loaded_msg">
                            <p><?php
                                if($user_to == $user_to_msg AND $user_from == $user_from_msg){
                                    echo"<div class='message' id='blue' data-toggle = 'tooltip' title = '$msg_date'>$msg_body</div><br><br><br>";
                                 } 
                                elseif($user_from == $user_to_msg AND $user_to == $user_from_msg){
                                    echo"<div class='message' id='green' data-toggle = 'tooltip' title = '$msg_date'>$msg_body</div><br><br><br>";                      
                                } 
                              ?>
                            </p>
                      </div>
                        <?php
                    }
                        ?>
            </div>
            <?php
                if(isset($_GET['u_id'])){
                    $u_id = $_GET['u_id'];
                    if($u_id == 'new'){
                        echo "
                            <form>
                                <center><h3>Select Someone to start conversation</h3></center>
                                <textarea disabled class='form-control' placeholder='Enter Your Message'></textarea>
                                <input type='submit' class='btn btn-default' disabled value='Send'>
                            </form><br><br>
                        
                        ";
                    }
                }
            ?>
      </div>
    </div> 
</body>
</html>