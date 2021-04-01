<?php
ob_start();
session_start();
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load('index.php') ; }

include 'NavBar.php' ;

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{  
    
    $comment = $_POST['comment'];
    $user = $_SESSION['user_id'];
    $post = $_SESSION['post_id'];
    require('connect_db.php');

    /*Execute the code to connect to the database*/

    $comments_insert = "INSERT INTO Comments(post_id,user_id,comment) VALUES ('$post','$user','$comment')";
    $ret = mysqli_query($link,$comments_insert);
    $row = mysqli_fetch_array($ret);
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
    <title>Post | Server Monk Software</title>
    <link rel="shortcut icon" type="image/ico" href="assets/favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/post.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//www.w3schools.com/lib/w3data.js"></script>

</head>
<body>
<!--This is for the nav bar-->


<!--- This is for the profile pic + bio, think we also might need to add like follow button or something?-->


<!--- this is for the tab part-->


<div class="post-container">
 
        <div class="container">

            <div class="row">
                <div id="tab-1" class="col-12">
                    <div class="row">
                        <div class="col-2  p-3">
                          
                        </div>
                     <?php 
                        $location = "";
                        $caption = "";
                        $cursor = new mysqli('autumnlark.com.mysql','autumnlark_comexposure','exposure','autumnlark_comexposure');
                        $post_stmt = $cursor->prepare('SELECT * FROM Posts INNER JOIN Users ON Posts.user_id=Users.user_id WHERE Posts.post_id = ?;');
                        $post_stmt->bind_param("i", $_SESSION['post_id']);
                        $post_stmt->execute();
                        $post_result = $post_stmt->get_result();
                        if ($post_result->num_rows > 0):
                           $row = $post_result->fetch_assoc()
                        ?>
                                
                            <div class="col-8 p-3">
                                <div class="post">
                                    <div class="row">
                                          <div class="col-12 d-flex" >
                                            <!-- shorthand php echo -->
                                            <form class ="d-flex ">
                                            <input type="image" class="ms-auto me-0" id="image" style = "width:3%; height:20px;"src="assets/report.png">
                                           </form>
                                        </div>
                                        <div class="col-12 p-1" >
                                            <!-- shorthand php echo -->
                                            <img id="img-post" src="https://autumnlark.com/<?= $row['image'];?>">
                                        </div>
                                            <div class="col-12 p-1" >
                                            <!-- shorthand php echo -->
                                          
                                            <form id="<?php echo "like". $count;?>" method="post" action="likes.php" enctype="multipart/form-data" >
                                                 <input type="hidden" name="id" value="<?php echo $row['post_id']; ?>">
                                                 <input type="hidden" name="page" value="posts.php">
                                                 <p class = "mt-0 pt-1"><input type="submit" name="submit" value="like"></p>
                                            </form>
                                            <p >Likes: <?php echo $row['num_likes']?></p>
                                        </div>
                                        <div class="col-12  p-1" >
                                            <p class = "mt-0 pt-2">@<?php echo $row['screen_name'];?>: <?php echo $row['caption'];?> </p>
                                            <p>Location: <?php echo $row['location'];?> </p>
                                            <p>---------------------------------------------------------------</p>
                                            <p>
                                        <a  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Write Comment
  </a>
</p>

<div class="collapse" id="collapseExample">

  <form method="post" action="<?php echo$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
      <p class ="p-2">
      <textarea id="comment" name ="comment" style="width:100%;" rows="1" cols="80" maxlength = "150" placeholder = "Write Comment Here"></textarea>
      <input type="submit" value = "submit">
      </p>
  </form>
  
  
</div>
                                            <?php 
                                            
                                           
                                            $comments_stmt = $cursor->prepare('SELECT * FROM Comments INNER JOIN Users ON Comments.user_id=Users.user_id WHERE Comments.post_id ="'.$row['post_id'].'" ORDER BY Comments.comment DESC ');
                                            $comments_stmt->execute();
                                            $comments_result = $comments_stmt->get_result();
                                            $count2 = 0;
                                           
                                            if($comments_result->num_rows > 0):
                                            for($i = 0; $i < 4; $i++):
                                                 $count2++;
                                                    if ($comments_result->num_rows >= $count2 ):
                           
                                                        $row2 = $comments_result->fetch_assoc()  
                                            ?>
                                             <p>@<?php echo $row2['screen_name'];?>: <?php echo $row2['comment'];?>
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
                                    </div>
                                </div>
                            </div>
                              </div>
                        <?php
                            
                            $post_stmt->close();
                        else:
                        ?>
                            <div class="col-12">
                                <h2 class="no-posts">Create your first challenge</h2>
                                <a class="btn" href="https://autumnlark.com/create-updated.php">Start here</a>
                            </div
                        <?php
                        endif;
                        
                        $cursor->close();
                        ?>
                        <div class="col-2  p-3">
                          
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
