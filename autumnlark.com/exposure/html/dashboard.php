<?php
ob_start();
session_start();
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load('login.php') ; }

include 'NavBar.html' ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Your Dashboard</title>
    <link rel="shortcut icon" type="image/ico" href="assets/favicon.ico"/>
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    

</head>

<body>
   
    
    <div class ="filter-container">

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Filter
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <button id="show-tab-1" class="dropdown-item tab-button active">All</button>
            <button id="show-tab-2" class="dropdown-item tab-button ">Posts</button>
            <button id="show-tab-3" class="dropdown-item tab-button">Challenges</button>
        </div>
    </div>
    </div>

    <div class="tabs-container">
        <div id="tabs">
            <div class="container">
                <div class="row">
                    <div id="tab-1" class="col-12 tab">
                        <br>

                        <div class="all-posts">
                            <div class ="d-flex">
                            <h2>Top Posts</h2>
                            <button id="show-tab-4" class="tab-button ms-auto me-2 my-2 ">See More</button>
                            </div>
                            <div class="all-post-container">
                                <div class= "d-flex" style="height:100%;width:100%;overflow:auto;">
                               
                                        <div class="col-12 col-md-6 p-3" >
                                            <div class="post">
                                                <div class="row">
                                                    <div class="col-12 p-1" >
                                                        <img class="img-post" src="Images/Jonghyun2.JPG">
                                                    </div>
                                                    <div class="col-12  p-1" >
                                                        <p>This is a post</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 p-3">
                                            <div class="post">
                                                <div class="row">
                                                    <div class="col-12 p-1" >
                                                        <img class="img-post" src="Images/jonghyun3.JPG">
                                                    </div>
                                                    <div class="col-12  p-1" >
                                                        <p>This is a post</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 p-3">
                                            <div class="post">
                                                <div class="row">
                                                    <div class="col-12 p-1" >
                                                        <img class="img-post" src="Images/Jonghyun5.JPG">
                                                    </div>
                                                    <div class="col-12  p-1" >
                                                        <p>This is a post</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 p-3">
                                            <div class="post">
                                                <div class="row">
                                                    <div class="col-12 p-1" >
                                                        <img class="img-post" src="Images/Jonghyun2.JPG">
                                                    </div>
                                                    <div class="col-12  p-1" >
                                                        <p>This is a post</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>     
                                    
                                </div>
                            </div>
                        </div>    
                        <br>
                        <div class="all-challenges">
                            <div class ="d-flex">
                            <h2>Top Challenges</h2>
                            <button id="show-tab-5" class="tab-button ms-auto me-2 my-2">See More</button>
                            </div>
                            <div class="all-challenges-container">
                            
                                <div class= "d-flex" style="height:100%;width:100%;overflow:auto;">
                                    <div class="col-12 col-md-6 p-3">
                                        <div class="post">
                                            <div class="row">
                                                    <div class="col-12 p-1" >
                                                        <img class="img-post" src="Images/Jonghyun2.JPG">
                                                    </div>
                                                    <div class="col-12  p-1" >
                                                        <p>This is a post</p>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 p-3">
                                        <div class="post">
                                             <div class="row">
                                                    <div class="col-12 p-1" >
                                                        <img class="img-post" src="Images/Jonghyun2.JPG">
                                                    </div>
                                                    <div class="col-12  p-1" >
                                                        <p>This is a post</p>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 p-3">
                                        <div class="post">
                                             <div class="row">
                                                    <div class="col-12 p-1" >
                                                        <img class="img-post" src="Images/Jonghyun2.JPG">
                                                    </div>
                                                    <div class="col-12  p-1" >
                                                        <p>This is a post</p>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 p-3">
                                        <div class="post">
                                             <div class="row">
                                                    <div class="col-12 p-1" >
                                                        <img class="img-post" src="Images/Jonghyun2.JPG">
                                                    </div>
                                                    <div class="col-12  p-1" >
                                                        <p>This is a post</p>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>     
                                </div>
                            </div>
                        </div>
                        <br> 
                        <div class="all-locations">
                            <h2>Locations</h2>
                            <div class="all-locations-container">
                            <div id="map"></div>
                                     
                                
                            </div>
                        </div>
                    </div>


                    <div id="tab-2" class="col-12 tab  hidden">
                        <br>
                        <div class="posts">
                            <h2>Posts</h2>
                            <div class="post-container">
                                

                            
                            <div class="row">
                               
                                        <div class="col-12 col-md-6 p-3">
                                            <div class="post">
                                                <p>This is a post</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 p-3">
                                            <div class="post">
                                                <p>This is a post</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 p-3">
                                            <div class="post">
                                                <p>This is a post</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 p-3">
                                            <div class="post">
                                                <p>This is a post</p>
                                            </div>
                                        </div>     
                                    
                                </div>
                            </div>
                           
                            <br>

                        </div>

                    </div>

                    <div id="tab-3" class="col-12 tab hidden">
                        <br>
                        <div class="challenge-container">
                        <h2>Challenges</h2>
                            <div class="challenge-container">
                                

                            
                            <div class="row">
                               
                               <div class="col-12 col-md-6 p-3">
                                   <div class="post">
                                       <p>This is a challenge</p>
                                   </div>
                               </div>
                               <div class="col-12 col-md-6 p-3">
                                   <div class="post">
                                       <p>This is a challenge</p>
                                   </div>
                               </div>
                               <div class="col-12 col-md-6 p-3">
                                   <div class="post">
                                       <p>This is a challenge</p>
                                   </div>
                               </div>
                               <div class="col-12 col-md-6 p-3">
                                   <div class="post">
                                       <p>This is a challenge</p>
                                   </div>
                               </div>     
                           
                       </div>
                   </div>
                            </div>
                        </div>
                    </div>
                 
                  
                  
                </div>

            </div>
        </div>
    </div>
<footer class="container">
    <div class="row">
        <div class="col-12 col-sm-4" id="footer-site">
            
        </div>
    </div>






</footer>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 

    <script
        src="//maps.googleapis.com/maps/api/js?key=AIzaSyAsSFGDF9I8ccXM0XAHWQXLpjLwH-B5sGw&callback=initMap"
      async
    ></script>

    <script src="//code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
    
   

    <script src="js/dashboard.js"></script>
</body>

</html>