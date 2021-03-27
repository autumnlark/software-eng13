<!DOCTYPE html>

<html>
<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile | Server Monk Software</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/profile.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://www.w3schools.com/lib/w3data.js"></script>

</head>
<body>
<!--This is for the nav bar-->

<?php include "NavBar.html" ?>
<!--- This is for the profile pic + bio, think we also might need to add like follow button or something?-->
<div class = "text-container">
    <div class="py-5 text-break ">
        <div class="d-flex flex-row flex-wrap  justify-content-center flex-md-nowrap" >
            <div class="px-md-5">
                <img id="imageprof" src="">
            </div>
    
    
            <div id="user_info">
                <div>
                <h1 class =" d-flex justify-content-center pt-2 pt-md-0 justify-content-md-start">Name Here</h1>
                <div class =" d-flex justify-content-center  justify-content-md-start">
                    <button class="sbtn btn-outline-success my-1 mx-2" type="submit">Follow</button>
                    <button class="sbtn btn-outline-success my-1 mx-2" type="submit">Friend</button>
                    
                </div> 
                <div class =" d-flex justify-content-center  justify-content-md-start">
               
                    <p class=" my-1 mt-2 mx-2"> Followers: 1 </p>
                    <p class=" my-1 mt-2 mx-2"> Following: 1 </p>
                </div>  
                </div>
        
                <div  class="me-5 ms-md-0 ms-5 pt-2" id = "user_bio">
                <p>
                fjakdsjf;ajshdfkjshflaksjdhflaksjdhflskdjfhalskjdhflakjsdhflkadhflaksjdhflakdsjfhlaksjdhfkljsdhflakjhlkasjdfhjj</p>
                </div>
            </div>
        </div>
    

  
       
    </div>
</div>

<!--- this is for the tab part-->

<div class="btn-container">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <button id="show-tab-1" class="tab-button active">Posts</button>
            </div>
            <div class="col-6">
                <button id="show-tab-2" class="tab-button">Challenges</button>
            </div>
        </div>
    </div>
</div>
<div class="tabs-container">
    <div id="tabs">
        <div class="container">

            <div class="row">
                <div id="tab-1" class="col-12 tab">
                    <div class="row">
                        <div class="col-12 col-lg-6 p-3">
                            <div class="post">
                                <p>This is a post</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-3">
                            <div class="post">
                                <p>This is a post</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-3">
                            <div class="post">
                                <p>This is a post</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-3">
                            <div class="post">
                                <p>This is a post</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="col-12 tab hidden">
                    <div class="row">
                        <div class="col-12 col-lg-6 p-3">
                            <div class="post">
                                <p>This is a challenge</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-3">
                            <div class="post">
                                <p>This is a challenge</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-3">
                            <div class="post">
                                <p>This is a challenge</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-3">
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
