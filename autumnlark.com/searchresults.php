<?php
ob_start();
session_start();
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load('index.php') ; }

include 'NavBar.html';


/*Recieve variables from NavBar.html*/
    $searchkey = $_POST['searchkey'];

    /*Create a query */
    $query_posts = "SELECT * FROM Posts WHERE type = 'challenge' AND (caption LIKE '%" . $searchkey . "%' OR  Hashtags WHERE hashtag = '%" . $searchkey . "%') ORDER BY num_likes DESC";

    /*Execute the code to connect to the database*/
    $cursor = new mysqli('autumnlark.com.mysql','autumnlark_comexposure','exposure','autumnlark_comexposure');

    $result = $cursor->query($query_posts);
    
    /*echo $result;
    
    /*If the query is successful*/
    
        /*    
        if ($result->num_rows > 0){
            echo 'valid username/email and password <br>';
            echo '<a href="index.html">back</a>';
            
            $data = $result->fetch_assoc();
            echo "<p>Full Name: " . $data['first_name'] . " " . $data['surname'] . "</p>";
            echo "<p>User ID: " . $data['user_id'] . "</p>";
            
        } else {
            header('Location: https://autumnlark.com/dashboard.php');
            require_once "index.html";
            echo "<br>invalid username or password, please try again";
        }*/
   



?>

<html lang="en">

<head>

     <!-- Tab and window settings -->
    <title>Search Results | Exposure</title>
    <link rel="shortcut icon" type="image/ico" href="assets/favicon.ico"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- SEO -->
    <meta name="keywords" content="exposure,social media,photography">
    <meta name="description" content="Exposure: A photography based social media platform.">

    <!-- Style sheet -->
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/search.css">
    
</head>
<body>    

    <!--nav bar-->

    <div class="title-container">
        <h2>Search results:</h2>
        <h3 style="padding-left: 1%">No results found. Feel free to explore our site below.</h3>
    </div>

    <div class="results-container">
            
            <div class="results-category">
                <div class="cat-head">
                    <h3>Users</h3>
                    <button class="more-button">See More</button>
                </div>
                <div class="results">
                    <div class="user">
                        <img src="assets\default-avatar-blue.png" alt="User1" name="profilepic" class="pics">
                        <p name="username">person 1</p>
                        <p name="about" style="font-size: 14px;">about</p>
                    </div>
                    <div class="user">
                        <img src="assets\default-avatar-green.png" alt="User2" name="profilepic" class="pics">
                        <p name="username">person 2</p>
                        <p name="about" style="font-size: 14px;">about</p>
                    </div>
                    <div class="user">
                        <img src="assets\default-avatar-orange.png" alt="User3" name="profilepic" class="pics">
                        <p name="username">person 3</p>
                        <p name="about" style="font-size: 14px;">about</p>
                    </div>
                    <div class="user">
                        <img src="assets\default-avatar-purple.png" alt="User4" name="profilepic" class="pics">
                        <p name="username">person 4</p>
                        <p name="about" style="font-size: 14px;">about</p>
                    </div>
                    <div class="user">
                        <img src="assets\default-avatar-yellow.png" alt="User5" name="profilepic" class="pics">
                        <p name="username">person 5</p>
                        <p name="about" style="font-size: 14px;">about</p>
                    </div>

                </div>
            </div>

            <div class="results-category">
                <div class="cat-head">
                    <h3>Challenges</h3>
                    <button class="more-button">See More</button>
                </div>
                <div class="results">
                    <div class="challenge">
                        <p name="username">person 1</p>
                        <p style="font-size: 14px;">This is the challenge post you were looking for!</p>
                        <p name="tags" style="font-size: 14px;">#searchterm</p>
                    </div>
                </div>
            </div>

            <div class="results-category">
                <div class="cat-head">
                    <h3>Photos</h3>
                    <button class="more-button">See More</button>
                </div>
                <div class="results">
                    <div class="photo">
                        <img src="assets\default-avatar-purple.png" alt="Image1" name="photograph" class="pics">
                        <p name="username">person 1</p>
                        <p name="description" style="font-size: 14px;">description</p>
                        <p name="tags" style="font-size: 14px;">#searchterm</p>
                    </div>
                    <div class="photo">
                        <img src="assets\default-avatar-purple.png" alt="Image2" name="photograph" class="pics">
                        <p name="username">person 2</p>
                        <p name="description" style="font-size: 14px;">description</p>
                        <p name="tags" style="font-size: 14px;">#searchterm #yourmum</p>
                    </div>
                    <div class="photo">
                        <img src="assets\default-avatar-purple.png" alt="Image3" name="photograph" class="pics">
                        <p name="username">person 3</p>
                        <p name="description" style="font-size: 14px;">description</p>
                        <p name="tags" style="font-size: 14px;">#searchterm</p>
                    </div>
                </div>
            </div>
    </div>
</body>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</html>