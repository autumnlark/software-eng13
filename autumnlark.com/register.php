<?php
//Connect to the database
ob_start();
require("connect_db.php");
require("login_tools.php");
//If the form is submitted
if(isset($_POST["register"])) {
    //Get the value of the form
//            $sur = $_POST["surname"];
//            $first = $_POST["first_name"];
    $fname = "bob";
    $screen = $_POST["screen_name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $re_pass = $_POST["re_password"];
    //If the username and password are empty
    if ($screen == "" || $pass == "") {
        echo '<script>alert("Username or password cannot be empty!");</script>';
        echo '<script>window.location="login.php"</script>';
        exit;
    }
    //If two passwords are the same
    if ($pass == $re_pass) {
        $sql_select = "select screen_name,email from Users where screen_name = '$screen' or email = '$email'";
        //Associative array
        $result = mysqli_query($link, $sql_select);
        $num = mysqli_num_rows($result);
        //Determine if username and email exist
        if ($num) {
            echo '<script>alert("Username or email already exists!");</script>';
            echo '<script>window.location="register.php"</script>';
            exit;
        } else {
//                    $sql_insert = "insert into Users(surname,first_name,screen_name,email,password) values('$sur','$first','$screen','$email',SHA1('$pass'))";
            $sql_insert = "INSERT INTO Users(screen_name,email,password) VALUES('$screen','$email', SHA1('$pass'))";
            $ret = mysqli_query($link, $sql_insert);
            $row = mysqli_fetch_array($ret);
            
            load();
        }
    } else {
        echo '<script>alert("Different password!");</script>';
        echo '<script>window.location="register.php"</script>';
        exit;
    }
}


?>
<html lang="en">
<head>

    <!-- Tab and window settings -->
    <title>Register | Exposure</title>
    <link rel="shortcut icon" type="image/ico" href="assets/favicon.ico" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- SEO -->
    <meta name="keywords" content="exposure,social media,photography,register,signup,sign up">
    <meta name="description" content="Exposure: A photography based social media platform.">

    <!-- Style sheet and fonts -->
   <link rel="stylesheet" href="css/login-reg-CSS.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">

</head>
<body>

<span><input id="back-btn" type="image" src="assets/back.png" name="backBtn" alt="Back" onclick="goBack()"></span>
<span><button type="button" class="button" onclick="window.location.href='index.php'">Log in</button></span>


<!-- This is a responsive block in the centre of the page, which holds the site logo and registration form. -->
<div class="flex-container-reg">

    <!-- Header (logo and name)-->
    <img  id="site-logo" src="assets/Logo-merged.png" alt="Exposure logo" >
    <h1 class="flex-item" id="header">Exposure</h1>

    <h2 class="flex-item" id="top-message">Sign up to join our amazing creators!</h2>

    <form id="signin" method="post" name="regform">

        <div class="flex-item" id="row">
            <div class="flex-item" id="column">
                <div class="flex-item">
                    <input type="text" class="textbox" placeholder="Enter your email address"  name="email">
                    <input type="text" class="textbox" placeholder="Enter username"  name="screen_name">
                </div>
            </div>
            <div class="flex-item" id="column">
                <div class="flex-item">
                    <input type="password" class="textbox" placeholder="Create password" name="password">
                    <input type="password" class="textbox" placeholder="Verify password" name="re_password">
                </div>
            </div>
        </div>
        <!-- Terms of use and privacy policy yet to be written, these are placeholders -->
        <div class="flex-item">
            <span class="flex-item-message">I agree to the:</span>
            <input type="checkbox" class="check-box" required>
            <span><a class="flex-item-message" href="https://bit.ly/2PkFFsq">Terms of Use </a></span>

            <input type="checkbox" class="check-box" required>
            <span><a class="flex-item-message" href="privacypolicy.html">Privacy Policy.</a></span>
        </div>
        
        <br>
        
        <!-- Submit button -->
        <div class="flex-item">
            <button type="submit" name ='register' class="submit-btn" onclick="return CheckPassword(password)">Join Now!</button>
        </div>
    </form>
    <br>
</div>
<script>
    function goBack() {
        window.history.back();
    }

    function CheckPassword(inputtxt) { 
        var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
        
        if(inputtxt.value.match(passw)) { 
            return true;
        }
        else { 
            alert("Passwords must contain between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter.")
            return false;
        }
    }
    
</script>
</body>
</html>


