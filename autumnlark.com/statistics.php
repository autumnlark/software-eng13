<?php
ob_start();
session_start();
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load('index.php') ; }

include 'NavBar.php' ;
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset($_POST['users']))
{

    $_SESSION['profile_user'] = $_POST['userid'];
    require 'login_tools.php';
    load('profile.php');
}

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset($_POST['posts']))
{

    $_SESSION['post_id'] = $_POST['id'];
    require 'login_tools.php';
    load('posts.php');
}
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" content="Profile Statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Your Statistics</title>
    <link rel="shortcut icon" type="image/ico" href="assets/favicon.ico"/>
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="range-btns">
                    <button class="button" type="button" id="range-1-d">1 Day</button>
                    <button class="button" type="button" id="range-7-d">7 Day</button>
                    <button class="button" type="button" id="range-30-d">30 Day</button>
                </div>
            </div>

        </div>

    </div>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
    


</body>