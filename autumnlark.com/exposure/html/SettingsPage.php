<?php
ob_start();
session_start();
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load('login.php') ; }

include 'NavBar.html' ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Your Settings</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/Settings.css">
    <link rel="stylesheet" href="css/main-style.css">

</head>

<body>
    <?php include "NavBar.html" ?>


    <div class="tab">
        <button class="tablinks" onclick="openSettings(event, 'Edit')" id="defaultOpen">Edit Profile</button>
        <button class="tablinks" onclick="openSettings(event, 'Password')">Change Password or Email</button>
        <button class="tablinks" onclick="openSettings(event, 'Privacy')">Privacy and Security</button>
        <button class="tablinks" onclick="openSettings(event, 'Bug')">Bug Report</button>
        
      </div>
      
      <div id="Edit" class="tabcontent">
        <h3>Change Profile Picture</h3>
        <form action="/settings.php">
            <input type="file" id="profile-pic" name="PicFilename">
            <input type="submit">
          </form>
          <br>
        <h3>Change Background Image</h3>
        <form action="/settings.php">
            <input type="file" id="background-pic" name="backgroundFilename">
            <input type="submit">
          </form>
          
           <h3 id="Add-bio">Add a personalised bio!</h3>
        <div class="Bio">
            <form id="BioMaker" action="test.php" method="POST">
            <textarea cols="12" rows="1" id="maxCharBio" name="bio-rep" placeholder="Max 2000 characters"
                maxlength="2500"></textarea>
            <p><span id="countBio"></span>/2500 characters
               <p style="display: none; color: red;" id="bio-message"> Bio cannot be left blank</p>
           
            </p> </div>
        <div id="submitBio" class="btn">Send</div>
    </form>
         
    
         
      </div>
      
      <div id="Password" class="tabcontent">
        <h3>Change Your Password</h3>
        <section>
        <label for="pwd">Enter old password:</label>
        <input type="password" id="pwd" name="pwd" required>
        <button id="toggle-password" type="button" aria-label="Show password as plain text. Warning: this will reveal your password on screen.">Show Old Password</button>
        <br>
            <label for="pwd">Enter new password:</label>
            <input type="password" id="pwd" name="pwd" required>
            <button id="toggle-password" type="button" aria-label="Show password as plain text. Warning: this will reveal your password on screen.">Show New Password</button>
            </section>
            
        <div id="Changepwd" class="btn">Change Password</div>
            <br>
            <br>
        <label for="Email"> Change your account's Email:</label>
        <input type="email" id="em" name="em" required>
        
        <label for="pwd">Enter your password:</label>
            <input type="password" id="pwd" name="pwd" required>
            <button id="toggle-password" type="button" aria-label="Show password as plain text. Warning: this will reveal your password on screen.">Show Password</button>
            <div id="ChangePWD" class="btn">Update Email</div>
        
      </div>
      
      
      
      
      
      
      
      
      <div id="Privacy" class="tabcontent">
        <h3>Adjust Privacy Settings</h3>
        <p>Toggle the switches to choose what information you wish to share</p>
        
        <div>Location:
        <label class="switch">
           <input type="checkbox">
         <span class="slider rounded"></span>
        </div>
        <div>Email
           <label class="switch2">
           <input type="checkbox">
         <span class="slider rounded"></span>
        </label>
        </div>
      </div>

     

      <div id="Bug" class="tabcontent">
        <h3 id="bug-center">Send us a bug report!</h3>
        <div class="report">
            <form id="BugForm" action="test.php" method="POST">
            <textarea id="maxChar" name="bug-rep" placeholder="Max 2000 characters"
                maxlength="2000" required></textarea>
            <p><span id="count"></span>/2000 characters
            <p style="display: none; color: red;" id="report-message"> Bug Report cannot be left blank</p>
            </p>

        </div>
        <div id="submitB" class="btn">Send</div>
    </form>
      </div>
<br>
 <div>
      <a type="button" class="btn btn-primary btn-sm" id="app" href="dashboard.html">Apply & Exit</a>
      <a type="button" class="btn btn-secondary btn-sm" id="app" href="dashboard.html">Exit</a>
      </div>


   


    <footer class="container">
        <div class="row">
            <div class="col-12 col-sm-4" id="footer-site">
                
            </div>
        </div>
     </footer>

</body>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script src="Settings.js"></script>




</html>