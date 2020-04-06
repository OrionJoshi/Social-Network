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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>