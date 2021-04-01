<?php # DISPLAY COMPLETE LOGIN PAGE.
ob_start();
# Access session.
session_start() ;

# Set page title and display header section.
$page_title = 'Login' ;

if ( isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load('dashboard.php') ; }
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
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">
<?php
session_start();
# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<p id="err_msg">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a href="register.php">Register</a></p>' ;
}
?>

    <form action="login_action.php" method="post">
        
        <!-- Fields for username and password  -->
        <div class="flex-item">
        
            <input type="text" class="textbox" placeholder="Enter Username" name="email" >
            <input type="password" class="textbox" placeholder="Enter Password" name="pass" >
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
            <button type="submit" class="btn btn-primary btn-block" role = "button">Log in</button>
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
