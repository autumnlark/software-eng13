<?php
ob_start();
session_start();
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load('index.php') ; }
$comment = false;
include 'NavBar.php' ;
// get the logged in user
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset($_POST['users']))
{  
         $_SESSION['profile_user'] = $_POST['userid'];

    require 'login_tools.php';
    load('profile.php');
}
//get the posts
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset($_POST['post']))
{  
    
    $_SESSION['post_id'] = $_POST['id'];
    require 'login_tools.php';
    load('posts.php');
}
?>
<!DOCTYPE html>

<html>
<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile | Server Monk Software</title>
    <link rel="shortcut icon" type="image/ico" href="assets/favicon.ico"/>
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/profile.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//www.w3schools.com/lib/w3data.js"></script>

</head>
<body>
<!--This is for the nav bar-->


<!--- This is for the profile pic + bio, think we also might need to add like follow button or something?-->
<div class = "text-container" style = "margin-bottom:-8px;">
  <h1>User Posts</h1>
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
                        
                        <?php 
                          $location = "";
                          $caption = "";
                          $date = date("Y-m-d H:i:s",strtotime('-8 days'));
                          $dateTom = date("Y-m-d",strtotime('+1 days'));
                          $cursor = new mysqli('autumnlark.com.mysql','autumnlark_comexposure','exposure','autumnlark_comexposure');
                           $feedP_stmt = $cursor->prepare('SELECT Relationships.secondary_user_id FROM ((Users INNER JOIN Posts ON Users.user_id =Posts.user_id) INNER JOIN Relationships ON Users.user_id=Relationships.primary_user_id) WHERE Relationships.primary_user_id = ?');
                         $feedP_stmt->bind_param("i", $_SESSION['user_id']);
                          $feedP_stmt->execute();
                          $feedP_result = $feedP_stmt->get_result();
                          $array = array();
                          while($row = $feedP_result->fetch_assoc()){
                              $array[]=$row['secondary_user_id'];
                          }
                          
                            
                          $arrays = implode(',',$array);
                        
                         if(count($array) != 0):
                          $sql = $cursor->prepare('SELECT * FROM Posts INNER JOIN Users ON Posts.user_id=Users.user_id WHERE Posts.user_id IN ('.$arrays.') AND Posts.type="Post" AND Posts.upload_date >= "'.$date.'" AND Posts.upload_date < "'.$dateTom.'" ORDER BY Posts.post_id DESC');
                        
                         
                          $sql->execute();
                          $sql_result = $sql->get_result();
                         
                          
                        $count = 0;
                        if ($sql_result->num_rows > 0):
                            
                            while ($row = $sql_result->fetch_assoc() ): 
                            $count++;
                        ?>
                                
                            <div class="col-12 col-lg-6 p-3">
                                <div class="post">
                                    <div class="row">
                                        <div class="col-12 d-flex" >
                                            <!-- shorthand php echo -->
                                            <form class ="d-flex ">
                                            <input type="image" class="ms-auto me-0" id="image" style = "width:2%"src="assets/report.png">
                                           </form>
                                        </div>
                                        <div class="col-12 p-1" >
                                            <!-- shorthand php echo -->
                                          <form id="<?php echo "myForm". $count;?>" method="post" action="<?php echo$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" >
                                               <input type="hidden" name="post" value="post">
                                               <input type="hidden" name="id" value="<?php echo $row['post_id']; ?>">
                                                <img type="submit" class="img-post" Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "myForm". $count;?>').submit();" src="https://autumnlark.com/<?= $row['image'];?>">
                                            </form>
                                        </div>
                                            <div class="col-12 p-1" >
                                            <!-- shorthand php echo -->
                                          
                                             <form id="<?php echo "like". $count;?>" method="post" action="likes.php" enctype="multipart/form-data" >
                                                 <input type="hidden" name="id" value="<?php echo $row['post_id']; ?>">
                                                 <input type="hidden" name="page" value="feed.php">
                                                     <?php 
                                                 
                                                    $likes_stmt = $cursor->prepare('SELECT * FROM Likes WHERE user_id = ? AND post_id= ?');
                                                    $likes_stmt->bind_param("ii", $_SESSION['user_id'],$row['post_id']);
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
                                            <p Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "myForm". $count;?>').submit();">View all comments</p>
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
                                            <p  style = "font-size: 0.8rem;"><?php echo $row['upload_date'];?> </p>
                                        </div>
                                
                                    </div>
                                </div>
                            </div>
                        <?php
                            endwhile;
                            endif;
                            $sql->close();
                            $feedP_stmt->close();
                        else:
                        ?>
                            <div class="col-12">
                                <h2 class="no-posts">There are no recent posts</h2>
                               
                            </div
                        <?php
                        endif;
                        
                        $cursor->close();
                        ?>
                        
                        
                       
                        
                      
                    </div>
                </div>
                <div id="tab-2" class="col-12 tab hidden">
                    <div class="row">
                         
                       <?php 
                          $location = "";
                          $caption = "";
                          $date = date("Y-m-d H:i:s",strtotime('-8 days'));
                          $dateTom = date("Y-m-d",strtotime('+1 days'));
                          $cursor = new mysqli('autumnlark.com.mysql','autumnlark_comexposure','exposure','autumnlark_comexposure');
                           $feedP_stmt = $cursor->prepare('SELECT Relationships.secondary_user_id FROM ((Users INNER JOIN Posts ON Users.user_id =Posts.user_id) INNER JOIN Relationships ON Users.user_id=Relationships.primary_user_id) WHERE Relationships.primary_user_id = ?');
                         $feedP_stmt->bind_param("i", $_SESSION['user_id']);
                          $feedP_stmt->execute();
                          $feedP_result = $feedP_stmt->get_result();
                          $array = array();
                          while($row = $feedP_result->fetch_assoc()){
                              $array[]=$row['secondary_user_id'];
                          }
                          
                            
                          $arrays = implode(',',$array);
                        
                         if(count($array) != 0):
                          $sql = $cursor->prepare('SELECT * FROM Posts INNER JOIN Users ON Posts.user_id=Users.user_id WHERE Posts.user_id IN ('.$arrays.') AND Posts.type="Challenge" AND Posts.upload_date >= "'.$date.'" AND Posts.upload_date < "'.$dateTom.'" ORDER BY Posts.post_id DESC');
                        
                         
                          $sql->execute();
                          $sql_result = $sql->get_result();
                         
                          
                        $count = 0;
                        if ($sql_result->num_rows > 0):
                            
                            while ($row = $sql_result->fetch_assoc() ): 
                            $count++;
                        ?>
                                
                            <div class="col-12 col-lg-6 p-3">
                                <div class="post">
                                    <div class="row">
                                        <div class="col-12 d-flex" >
                                            <!-- shorthand php echo -->
                                            <form class ="d-flex ">
                                            <input type="image" class="ms-auto me-0" id="image" style = "width:2%"src="assets/report.png">
                                           </form>
                                        </div>
                                        <div class="col-12 p-1" >
                                            <!-- shorthand php echo -->
                                          <form id="<?php echo "myForm". $count;?>" method="post" action="<?php echo$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" >
                                               <input type="hidden" name="post" value="post">
                                               <input type="hidden" name="id" value="<?php echo $row['post_id']; ?>">
                                                <img type="submit" class="img-post" Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "myForm". $count;?>').submit();" src="https://autumnlark.com/<?= $row['image'];?>">
                                            </form>
                                        </div>
                                            <div class="col-12 p-1" >
                                            <!-- shorthand php echo -->
                                          
                                             <form id="<?php echo "like". $count;?>" method="post" action="likes.php" enctype="multipart/form-data" >
                                                 <input type="hidden" name="id" value="<?php echo $row['post_id']; ?>">
                                                 <input type="hidden" name="page" value="feed.php">
                                                     <?php 
                                                 
                                                    $likes_stmt = $cursor->prepare('SELECT * FROM Likes WHERE user_id = ? AND post_id= ?');
                                                    $likes_stmt->bind_param("ii", $_SESSION['user_id'],$row['post_id']);
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
                                                <input type="hidden" name="userid" value="<?php echo $row['user_id']; ?>">
                                                </form>
                                            <p class = "mt-0 pt-2"><span  Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "user". $count;?>').submit();">@<?php echo $row['screen_name'];?></span>: <?php echo $row['caption'];?> </p>
                                            <p>---------------------------------------------------------------</p>
                                            <p Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "myForm". $count;?>').submit();">View all comments</p>
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
                                            <p  style = "font-size: 0.8rem;"><?php echo $row['upload_date'];?> </p>
                                        </div>
                                
                                    </div>
                                </div>
                            </div>
                        <?php
                            endwhile;
                             endif;
                            $sql->close();
                            $feedP_stmt->close();
                        else:
                        ?>
                            <div class="col-12">
                                <h2 class="no-posts">There are no recent challenges</h2>
                               
                            </div
                        <?php
                        endif;
                       
                        $cursor->close();
                        ?>
                        
             
                </div>
            </div>
        </div>


    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/profile.js"></script>


    <script src="//code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
