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
                                <div class= "d-flex " style="height:100%;width:100%;overflow:auto;">
                               
                     <?php 
                        $location = "";
                        $caption = "";
                        $date = date("Y-m-d H:i:s",strtotime('-8 days'));
                        $dateTom = date("Y-m-d",strtotime('+1 days'));
                        $cursor = new mysqli('autumnlark.com.mysql','autumnlark_comexposure','exposure','autumnlark_comexposure');
                        $posts_stmt = $cursor->prepare('SELECT * FROM Posts INNER JOIN Users ON Posts.user_id=Users.user_id WHERE Posts.type="Post" AND Posts.upload_date >= "'.$date.'" AND Posts.upload_date < "'.$dateTom.'" ORDER BY Posts.num_likes DESC ');
                        $posts_stmt->execute();
                        $posts_result = $posts_stmt->get_result();
                        $count = 0;
                            for($x = 0; $x < 4; $x++):
                            $count++;
                             if ($posts_result->num_rows >= $count ):
                           
                               $row = $posts_result->fetch_assoc()  
                            
                        ?>
                                
                            <div class="col-12 col-lg-6 p-3">
                                <div class="post ">
                                    <div class="row mt-0 mb-auto">
                                       <div class="col-12 d-flex" >
                                            <!-- shorthand php echo -->
                                            <form class ="d-flex ">
                                            <input type="image" class="ms-auto me-0" id="image" style = "width:3%; height:20px;"src="assets/report.png">
                                           </form>
                                        </div>
                                        <div class="col-12 p-1" >
                                            <!-- shorthand php echo -->
                                            <form id="<?php echo "myForm". $count;?>" method="post" action="<?php echo$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" >
                                                <input type="hidden" name="posts" value="posts">
                                               <input type="hidden" name="id" value="<?php echo $row['post_id']; ?>">
                                                <img type="submit" class="img-post" Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "myForm". $count;?>').submit();" src="https://autumnlark.com/<?= $row['image'];?>">
                                            </form>
                                        </div>
                                         <div class="col-12 p-1" >
                                            <!-- shorthand php echo -->
                                          
                                            <form id="<?php echo "like". $count;?>" method="post" action="likes.php" enctype="multipart/form-data" >
                                                 <input type="hidden" name="id" value="<?php echo $row['post_id']; ?>">
                                                 <input type="hidden" name="page" value="dashboard.php">
                                                     <?php 
                                                 
                                                    $likes_stmt = $cursor->prepare('SELECT * FROM Likes WHERE user_id = ? AND post_id= ?');
                                                    $likes_stmt->bind_param("ii", $_SESSION['profile_user'],$row['post_id']);
                                                    $likes_stmt->execute();
                                                    $likes_result = $likes_stmt->get_result();
                                                    
                                                    if ($likes_result->num_rows == 1):
                                                     
                        
                                                     ?>
                                                    <p class = "mt-0 pt-1"><input type="submit" name="submit" value="unlike"></p>
                                                     <?php
                                                    else:
                                                     ?>
                                                  <p class = "mt-0 pt-1"><input type="submit" name="submit" value="like"></p>
                                                    <?php endif;
                                                    $likes_stmt->close();?>
                                                
                                            </form>
                                            <p >Likes: <?php echo $row['num_likes']?></p>
                                        </div>
                                         <div class="col-12  p-1" >
                                            <form id="<?php echo "user". $count;?>" method="post" action="<?php echo$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" >
                                                <input type="hidden" name="users" value="users">
                                                <input type="hidden" name="userid" value="<?php echo $row['user_id']; ?>">
                                                </form>
                                            <p class = "mt-0 pt-2"><span  Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "user". $count;?>').submit();">@<?php echo $row['screen_name'];?></span>: <?php echo $row['caption'];?> </p>
                                            <p>---------------------------------------------------------------</p>
                                            <p Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "myForm". $count;?>').submit();"><b>View all comments</b></p>
                                            <?php 
                                            
                                           
                                            $comments_stmt = $cursor->prepare('SELECT * FROM Comments INNER JOIN Users ON Comments.user_id=Users.user_id WHERE Comments.post_id ="'.$row['post_id'].'" ORDER BY Comments.comment DESC ');
                                            $comments_stmt->execute();
                                            $comments_result = $comments_stmt->get_result();
                                            $count2 = 0;
                                           
                                            if($comments_result->num_rows > 0):
                                            for($i = 0; $i < 2; $i++):
                                                 $count2++;
                                                    if ($comments_result->num_rows >= $count2 ):
                           
                                                        $row = $comments_result->fetch_assoc()  
                                            ?>
                                             <p><span  Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "user". $count;?>').submit();">@<?php echo $row['screen_name'];?></span>: <?php echo $row['comment'];?>
                                             </p>
                                            <?php
                                             endif;
                                            endfor;
                                            else:
                                            ?>
                                            <p>       There are no comments</p>
                                            <?php
                                            endif;
                                            $comments_stmt->close();
                    
                                            ?>
                                          
                                            <p style = "font-size: 0.8rem;"><?php echo $row['upload_date'];?> </p>
                                        </div>
                                
                                    </div>
                                </div>
                            </div>
                        <?php
                            
                       
                        endif;
                        endfor;
                        $posts_stmt->close();
                        $cursor->close();
                        ?>
                           
                                    
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
                                    
                                               
                     <?php 
                        $location = "";
                        $caption = "";
                        $date = date("Y-m-d H:i:s",strtotime('-8 days'));
                        $dateTom = date("Y-m-d",strtotime('+1 days'));
                        $cursor = new mysqli('autumnlark.com.mysql','autumnlark_comexposure','exposure','autumnlark_comexposure');
                        $posts_stmt = $cursor->prepare('SELECT * FROM Posts INNER JOIN Users ON Posts.user_id=Users.user_id WHERE Posts.type="Challenge" AND Posts.upload_date >= "'.$date.'" AND Posts.upload_date < "'.$dateTom.'" ORDER BY Posts.num_likes DESC ');
                        $posts_stmt->execute();
                        $posts_result = $posts_stmt->get_result();
                        
                        $count = 0;
                        
                            for($x = 0; $x < 4; $x++):
                            $count++;
                             if ($posts_result->num_rows >= $count ):
                           
                               $row = $posts_result->fetch_assoc()  
                            
                        ?>
                                
                            <div class="col-12 col-lg-6 p-3">
                                <div class="post">
                                    <div class="row mt-0 mb-auto">
                                        <div class="col-12 d-flex" >
                                            <!-- shorthand php echo -->
                                            <form class ="d-flex ">
                                            <input type="image" class="ms-auto me-0" id="image" style = "width:3%; height:20px;" src="assets/report.png">
                                           </form>
                                        </div>
                                        <div class="col-12 p-1" >
                                            
                                            <!-- shorthand php echo -->
                                            <form id="<?php echo "myFormchallenge". $count;?>" method="post" action="<?php echo$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" >
                                               <input type="hidden" name="id" value="<?php echo $row['post_id']; ?>">
                                                <img type="submit" class="img-post" Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "myFormchallenge". $count;?>').submit();" src="https://autumnlark.com/<?= $row['image'];?>">
                                            </form>
                                        </div>
                                            <div class="col-12 p-1" >
                                            <!-- shorthand php echo -->
                                          
                                             <form id="<?php echo "like". $count;?>" method="post" action="likes.php" enctype="multipart/form-data" >
                                                 <input type="hidden" name="id" value="<?php echo $row['post_id']; ?>">
                                                 <input type="hidden" name="page" value="dashboard.php">
                                                     <?php 
                                                 
                                                    $likes_stmt = $cursor->prepare('SELECT * FROM Likes WHERE user_id = ? AND post_id= ?');
                                                    $likes_stmt->bind_param("ii", $_SESSION['profile_user'],$row['post_id']);
                                                    $likes_stmt->execute();
                                                    $likes_result = $likes_stmt->get_result();
                                                    
                                                    if ($likes_result->num_rows == 1):
                                                     
                        
                                                     ?>
                                                    <p class = "mt-0 pt-1"><input type="submit" name="submit" value="unlike"></p>
                                                     <?php
                                                    else:
                                                     ?>
                                                  <p class = "mt-0 pt-1"><input type="submit" name="submit" value="like"></p>
                                                    <?php endif;
                                                    $likes_stmt->close();?>
                                                
                                            </form>
                                            <p >Likes: <?php echo $row['num_likes']?></p>
                                        </div>
                                         <div class="col-12  p-1" >
                                            <form id="<?php echo "userChallenge". $count;?>" method="post" action="<?php echo$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" >
                                                <input type="hidden" name="users" value="users">
                                                <input type="hidden" name="userid" value="<?php echo $row['user_id']; ?>">
                                                </form>
                                            <p class = "mt-0 pt-2"><span  Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "userChallenge". $count;?>').submit();">@<?php echo $row['screen_name'];?></span>: <?php echo $row['caption'];?> </p>
                                            <p>---------------------------------------------------------------</p>
                                            <p Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "myFormchallenge". $count;?>').submit();"><b>View all comments</b></p>
                                             <?php 
                                            
                                           
                                            $comments_stmt = $cursor->prepare('SELECT * FROM Comments INNER JOIN Users ON Comments.user_id=Users.user_id WHERE Comments.post_id ="'.$row['post_id'].'" ORDER BY Comments.comment DESC ');
                                            $comments_stmt->execute();
                                            $comments_result = $comments_stmt->get_result();
                                            $count2 = 0;
                                           
                                            if($comments_result->num_rows > 0):
                                            for($i = 0; $i < 2; $i++):
                                                 $count2++;
                                                    if ($comments_result->num_rows >= $count2 ):
                           
                                                        $row = $comments_result->fetch_assoc()  
                                            ?>
                                             
                                             <p><span Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "user". $count; ;?>').submit(); <?php $comment =true;?>">@<?php echo $row['screen_name'];?></span>: <?php echo $row['comment'];?>
                                             </p>
                                            <?php
                                             endif;
                                            endfor;
                                            else:
                                            ?>
                                            <p>       There are no comments</p>
                                            <?php
                                            endif;
                                            
                                            $comments_stmt->close();
                    
                                            ?>
                                           
                                          
                                            <p style = "font-size: 0.8rem;"><?php echo $row['upload_date'];?> </p>
                                        </div>
                                
                                    </div>
                                </div>
                            </div>
                        <?php
                            
                       
                        endif;
                        endfor;
                        $posts_stmt->close();
                        $cursor->close();
                        ?>
                                    
                                     
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