<?php
ob_start();
session_start();
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load('login.php') ; }

include 'NavBar.html' ?>
<!DOCTYPE html>

<html>
<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Post | Server Monk Software</title>
    <link rel="shortcut icon" type="image/ico" href="assets/favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/post.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://www.w3schools.com/lib/w3data.js"></script>

</head>
<body>
<!--This is for the nav bar-->


<!--- This is for the profile pic + bio, think we also might need to add like follow button or something?-->


<!--- this is for the tab part-->


<div class="post-container">
 
        <div class="container">

            <div class="row">
                <div id="tab-1" class="col-12">
                    <div class="row">
                        <div class="col-2  p-3">
                          
                        </div>
                        <div class="col-8  p-3">
                            <div class="post">
                                <div class="row">
                                    <div class="col-12  p-1">
                                        <img id="img-post"src="Images/Jonghyun2.JPG">
                                    </div>
                                    <div class="col-12  p-1">
                                        <p>This is a post</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2  p-3">
                          
                        </div>
                      
                      
                    </div>
                </div>
                
            </div>
        </div>


   
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/profile.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   

</body>
</html>
