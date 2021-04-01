<?php
ob_start();
session_start();


if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset($_POST['profile']))
{  
    $_SESSION['profile_user'] = $_SESSION['user_id'];
    require 'login_tools.php';
    load('profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    
    <title>Exposure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="css/NavBar.css">
   

</head>

<body>
  
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark py-0">
        <div class="container-fluid">
        
            <a class="navbar-brand" href="https://autumnlark.com/dashboard.php"><img src="assets/EXP-logo.jpg" class="logo">Exposure</a>
            <button class="navbar-toggler ms-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
       
        <div class="collapse navbar-collapse" id= "navbarSupportedContent">
           
            <span class = "ms-auto me-0 my-2">
                <form class="d-flex" action="https://autumnlark.com/searchresults.php" method='post' >
                    <input class="form-control me-2 mw-100" name='searchkey' style = "width: 21rem;" type="search" placeholder="Search" aria-label="Search">
                    <button class="sbtn btn-outline-success my-1 mx-2" type="submit">Search</button>
                </form>
            </span>

                <ul class="navbar-nav ms-auto me-2 mb-2 mb-lg-0 " >
                    <li class="nav-item active">
                        <a class="nav-link" href="https://autumnlark.com/dashboard.php">Home</a>
                    </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="https://autumnlark.com/feed.php">Feed</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://autumnlark.com/create-updated.php">Create Post</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://autumnlark.com/SettingsPage.php">Settings</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://autumnlark.com/admin.php">Admin Panel</a>
                    </li>
                    <li class="nav-item active">
                           <form id="myForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" >
                               <input type="hidden" name="profile" value="profile">
                                <a class="nav-link" Style ="cursor: pointer;" onclick="document.getElementById('myForm').submit()" >Profile</a>          
                          </form>
          
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
              
        </div>
    </div>
    </nav>
  
</body>
</html>