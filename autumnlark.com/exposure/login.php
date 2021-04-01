<?php
//Connect to the database
session_start();
require("connect_db.php");
//If the form is submitted
if(isset($_POST["login"])){
    //Get the value of the form
    $sur = $_POST["screen_name"];
    $pass = SHA1($_POST["password"]);
    //If the username and password are empty
    if($sur == ""||$pass == ""){
        echo '<script>alert("Username or password cannot be empty!");</script>';
        echo '<script>window.location="login.php"</script>';
        exit;
    }
    $sql_select = "select screen_name,password from Users where screen_name = '$sur' and password = '$pass'";
    //Associative array
    $result = mysqli_query($link,$sql_select);
    $row = mysqli_fetch_array($result);
//
//    //User and password are correct
    if($sur == $row['screen_name']&&$pass == $row['password']){
//        echo '<script>alert("Username ==");</script>';
//    }else{
//        echo '<script>alert("Username or password cannot be empty!");</script>';
//    }
    //if ($row['screen_name'] === $sur && $row['password'] === $pass) {
        $_SESSION['screen_name'] = $sur;
        $_SESSION['user_id'] = $pass;
        //echo '<script>alert("Username =!=");</script>';
        echo '<script>window.location="home.php"</script>';
        exit();
    }else{
        echo '<script>alert("Username or password cannot be empty!");</script>';
        exit();
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Tab and window settings -->
    <title>Log In | Exposure</title>
    <link rel="shortcut icon" type="image/ico" href="assets/favicon.ico"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
   
    <!-- SEO -->
    <meta name="keywords" content="exposure,social media,photography,log in,login,sign in,signin">
    <meta name="description" content="Exposure: A photography based social media platform.">

    <!-- Style sheet and fonts -->
    <link rel="stylesheet" href="css/login-reg-CSS.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">
</head>
<body>

<span><input id="back-btn" type="image" src="assets/back.png" name="backBtn" alt="Back" onclick="goBack()"></span>
<span><button type="button" class="button" onclick="window.location.href='register.php'">Sign up</button></span>

<!-- This is a responsive block in the centre of the page, which holds the site logo and login form. -->
<div class="flex-container">
    <br>
    
    <!-- Header (logo and name)-->
    <img id="site-logo" src="assets/Logo-merged.png" alt="Exposure logo">
    <h1 class="flex-item" id="header">Exposure</h1>

    <h2 class="flex-item" id="top-message">Welcome Back!</h2>

    <form id="login" action="login.php" method="post">
        
        <!-- Fields for username and password  -->
        <div class="flex-item">

            <input type="text" class="textbox" placeholder="Enter Username" name="screen_name" >
            <input type="password" class="textbox" placeholder="Enter Password" name="password" >
        </div>
        
        <!-- Remember me feature (unsure whether to keep?)-->
        <span>
                <input type="checkbox" class="flex-item" checked="checked" style="margin-right: 0;">
                <span class="flex-item-message" style="margin-right: 30%;">Remember Me?</span>
            </span>

        <!-- This could lead to either an email being sent or a security question thing -->
        <span><a href="https://www.youtube.com/watch?v=CQeezCdF4mk" class="flex-item-message" target="_blank">Forgot Password?</a></span>
        
        <br><br>
        
        <!-- Submit button -->
        <div class="flex-item">
            <button type="submit" class="submit-btn" name = "login">Log in</button>
        </div>
    </form>
    <br>
</div>

<script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>
