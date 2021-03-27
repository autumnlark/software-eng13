<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Your Settings</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Settings.css">
    <link rel="stylesheet" href="main-style.css">

</head>

<body>
    <?php include "NavBar.html" ?>


    <div class="tab">
        <button class="tablinks" onclick="openSettings(event, 'Edit')" id="defaultOpen">Edit Profile</button>
        <button class="tablinks" onclick="openSettings(event, 'Password')">Change Password</button>
        <button class="tablinks" onclick="openSettings(event, 'Privacy')">Privacy and Security</button>
        <button class="tablinks" onclick="openSettings(event, 'Email')">Email & SMS</button>
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
      </div>
      
      <div id="Privacy" class="tabcontent">
        <h3>Adjust Privacy Settings</h3>
        <p>Toggle the switches to choose what information you wish to share</p>
        <div>
        <p>Location:</p>
        <label class="switch">
           
            <input type="checkbox">
           
            <span class="slider round"></span>
        </label>
        </div>
      </div>

      <div id="Email" class="tabcontent">
        <h3>Change your Email</h3>
        <p>Tokyo is the capital of Japan.</p>
      </div>

      <div id="Bug" class="tabcontent">
        <h3 id="bug-center">Send us a bug report!</h3>
        <div class="report">
            <form id="BugForm" action="test.php" method="POST">
            <textarea id="maxChar" name="bug-rep" placeholder="Report Max 2000 characters"
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


    <!--
    <div class="tab-holder">
        
            <div class="tab-col">
                <div class="col-2">
                    <button id="show-tab-1" class="tab-button active">All</button>
                </div>
                <div class="col-4">
                    <button id="show-tab-2" class="tab-button">Posts</button>
                </div>
                <div class="col-6">
                    <button id="show-tab-3" class="tab-button">Location</button>
                </div>
                <div class="col-8">
                    <button id="show-tab-4" class="tab-button">People</button>
                </div>
                <div class="col-10">
                    <button id="show-tab-5" class="tab-button">Challenges</button>
                </div>
                <div class="col-12">
                    <button id="show-tab-6" class="tab-button">Hashtags</button>
                </div>
            </div>
    
    </div> -->











    <footer class="container">
        <div class="row">
            <div class="col-12 col-sm-4" id="footer-site">
                
            </div>
        </div>
     </footer>

</body>

<script src="Settings.js"></script>




</html>