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

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset($_POST['userscom']))
{  
    
    $_SESSION['profile_user'] = $_POST['useridcom'];
    require 'login_tools.php';
    load('profile.php');
}

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset($_POST['post']))
{  
    
    $_SESSION['post_id'] = $_POST['id'];
    require 'login_tools.php';
    load('posts.php');
}


$conn = new mysqli('autumnlark.com.mysql','autumnlark_comexposure','exposure','autumnlark_comexposure');

$stats_queries = array(
        'likes'=>'SELECT DISTINCT Likes.post_id, (SELECT image FROM Posts WHERE Posts.post_id = Likes.post_id), caption FROM Likes INNER JOIN Posts ON Likes.user_id = Posts.user_id WHERE Likes.user_id = 7 GROUP BY Likes.like_id;',
        'relations'=>'SELECT secondary_user_id FROM Relationships WHERE secondary_user_id = ?;',
        'comments' => 'SELECT post_id FROM Likes WHERE user_id = ?;'
);

function row_to_json( $type, $data ) {
    echo '<script> var '. $type . ' = ' . json_encode($data) . '</script>';
}

foreach ( $stats_queries as $type => $query ) {
    $stmt = $conn->prepare( $query );
    
    $stmt->execute();
    $result = $stmt->get_result();

    if ( $result->num_rows > 0 ) {
        row_to_json($type, $result->fetch_all());
    }

    $stmt->close();
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
<div class = "text-container">
    <div class="py-5 text-break ">
        <div class="d-flex flex-row flex-wrap  justify-content-center flex-md-nowrap" >
            <div class="px-md-5">
                <img id="imageprof" src="">
            </div>
    
    
            <div id="user_info">
                <div>
                <h1 class =" d-flex justify-content-center pt-2 pt-md-0 justify-content-md-start">
                <?php
                require "connect_db.php";
              
                $user =$_SESSION[ 'profile_user' ];
                $query="SELECT screen_name FROM Users WHERE user_id ='$user'";
                $ret = mysqli_query($link, $query);
                $row = mysqli_fetch_array($ret);
                echo $row['screen_name'];
                
                ?>
            </h1>
                <div class =" d-flex justify-content-center  justify-content-md-start">
                    <?php if($_SESSION['user_id'] != $_SESSION['profile_user']):
                        $cursor = new mysqli('autumnlark.com.mysql','autumnlark_comexposure','exposure','autumnlark_comexposure');
                        $following_stmt = $cursor->prepare('SELECT * FROM Relationships WHERE primary_user_id = ? AND secondary_user_id =? ;');
                        $following_stmt->bind_param("ii", $_SESSION['user_id'], $_SESSION['profile_user']);
                        $following_stmt->execute();
                        $following_result = $following_stmt->get_result();
            
                        require('login_tools.php');
                        if($following_result->num_rows == 1):
                            
                    ?>
                        
                        <form id="followForm" method="post" action="follow.php" enctype="multipart/form-data">
                        <button class="sbtn btn-outline-success my-1 mx-2" type="submit" name="submit">Following</button>
                        </form>
                    <?php else:
                    
                     ?>
                    <form id="followForm" method="post" action="follow.php" enctype="multipart/form-data">
                    <button class="sbtn btn-outline-success my-1 mx-2" type="submit" name="submit">Follow</button>
                    </form>
                    <?php endif;
                            $cursor->close();
                            endif;
                             
                    ?>
                    
                </div> 
                <div class =" d-flex justify-content-center  justify-content-md-start">
               
                    <p class=" my-1 mt-2 mx-2"> Followers: 1 </p>
                    <p class=" my-1 mt-2 mx-2"> Following: 1 </p>
                </div>  
                </div>
        
                <div  class="me-5 ms-md-0 ms-5 pt-2" id = "user_bio">
                <?php $varTemp= $_POST["bio-rep"]; ?>
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
                        
                        <?php 
                        $location = "";
                        $caption = "";
                        $cursor = new mysqli('autumnlark.com.mysql','autumnlark_comexposure','exposure','autumnlark_comexposure');
                        $posts_stmt = $cursor->prepare('SELECT * FROM Posts INNER JOIN Users ON Users.user_id=Posts.user_id WHERE Posts.user_id = ? AND Posts.type="Post" ORDER BY Posts.post_id DESC ;');
                        $posts_stmt->bind_param("i", $_SESSION['profile_user']);
                        $posts_stmt->execute();
                        $posts_result = $posts_stmt->get_result();
                        $count = 0;
                        if ($posts_result->num_rows > 0):
                            while ($row = $posts_result->fetch_assoc() ): 
                            $count++;
                        ?>
                                
                            <div class="col-12 col-lg-6 p-3">
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
                                                 <input type="hidden" name="page" value="profile.php">
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
                           
                                                        $row2 = $comments_result->fetch_assoc()  
                                            ?>
                                            
                                             <p><span Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "usercom". $count; ;?>').submit()">@<?php echo $row2['screen_name'];?></span>: <?php echo $row2['comment'];?>
                                              <form id="<?php echo "usercom". $count;?>" method="post" action="<?php echo$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" >
                                                <input type="hidden" name="userscom" value="userscom">
                                                <input type="hidden" name="useridcom" value="<?php echo $row2['user_id']; ?>">
                                                </form>
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
                            $posts_stmt->close();
                        else:
                        ?>
                            <div class="col-12">
                                <h2 class="no-posts">Create your first post</h2>
                                <a class="btn" style="border: 1px solid #132e2a;" href="https://autumnlark.com/create-updated.php">Start here</a>
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
                        $cursor = new mysqli('autumnlark.com.mysql','autumnlark_comexposure','exposure','autumnlark_comexposure');
                        $challenge_stmt = $cursor->prepare('SELECT * FROM Posts INNER JOIN Users ON Users.user_id=Posts.user_id WHERE Posts.user_id = ? AND Posts.type="Challenge" ORDER BY Posts.post_id DESC ;');
                        $challenge_stmt->bind_param("i", $_SESSION['profile_user']);
                        $challenge_stmt->execute();
                        $challenge_result = $challenge_stmt->get_result();
                        
                        if ($challenge_result->num_rows > 0):
                            while ($row = $challenge_result->fetch_assoc() ): 
                        ?>
                                
                            <div class="col-12 col-lg-6 p-3">
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
                                            
                                           <form id="<?php echo "myFormchallenge". $count;?>" method="post" action="<?php echo$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" >
                                              
                                               <input type="hidden" name="id" value="<?php echo $row['post_id']; ?>">
                                                <img type="submit" class="img-post" Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "myFormchallenge". $count;?>').submit();" src="https://autumnlark.com/<?= $row['image'];?>">
                                            </form>
                                        </div>
                                          <div class="col-12 p-1" >
                                            <!-- shorthand php echo -->
                                          
                                         <form id="<?php echo "like". $count;?>" method="post" action="likes.php" enctype="multipart/form-data" >
                                                 <input type="hidden" name="id" value="<?php echo $row['post_id']; ?>">
                                                 <input type="hidden" name="page" value="profile.php">
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
                                            <p class = " mt-0 pt-2"><span Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "user". $count;?>').submit();">@<?php echo $row['screen_name'];?></span>: <?php echo $row['caption'];?> </p>
                                            <p>---------------------------------------------------------------</p>
                                             <form id="<?php echo "user". $count;?>" method="post" action="other_users.php" enctype="multipart/form-data" >
                                                <input type="hidden" name="form" value="users">
                                                <input type="hidden" name="userid" value="<?php echo $row['user_id']; ?>">
                                                </form>
                                            <p Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "myFormchallenge". $count;?>').submit();">View all comments</p>
                                            <?php 
                                            
                                           
                                            $comments_stmt = $cursor->prepare('SELECT * FROM Comments INNER JOIN Users ON Comments.user_id=Users.user_id WHERE Comments.post_id ="'.$row['post_id'].'" ORDER BY Comments.comment DESC ');
                                            $comments_stmt->execute();
                                            $comments_result = $comments_stmt->get_result();
                                            $count2 = 0;
                                           
                                            if($comments_result->num_rows > 0):
                                            for($i = 0; $i < 2; $i++):
                                                 $count2++;
                                                    if ($comments_result->num_rows >= $count2 ):
                           
                                                        $row2 = $comments_result->fetch_assoc()  
                                            ?>
                                              <form id="<?php echo "userCom". $count;?>" method="post" action="other_users.php" enctype="multipart/form-data" >
                                                <input type="hidden" name="form" value="users">
                                                <input type="hidden" name="useridcom" value="<?php echo $row2['user_id']; ?>">
                                                </form>
                                             <p><span Style ="cursor: pointer;" onclick="document.getElementById('<?php echo "userCom". $count; ;?>').submit(); <?php $comment =true;?>">@<?php echo $row2['screen_name'];?></span>: <?php echo $row2['comment'];?>
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
                            endwhile;
                            $challenge_stmt->close();
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
                      
                   
                   
             
                </div>
            </div>
        </div>
        </div>
    </div>

    </div>
</div>
</div>
<div class="stats-container">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Your Statistics</h1>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12">
                <h2>Most Popular Posts</h2>
            </div>
            <div class="col-12 col-lg-2">
                <div class="likes-container">
                    <div>
                        <h3 class="likes-count"></h3>
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-lg-2">
                <div class="likes-container">
                    <div>
                        <h3 class="likes-count"></h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="likes-container">
                    <div>
                        <h3 class="likes-count"></h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="likes-container">
                    <div>
                        <h3 class="likes-count"></h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="likes-container">
                    <div>
                        <h3 class="likes-count"></h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="likes-container">
                    <div>
                        <h3 class="likes-count"></h3>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-12 col-lg-6" id="relations">
            <h2>Friends/Followers</h1>
            <h3 id="relations-count"></h2>
        </div>
        <div class="col-12 col-lg-6" id="comment">
            <h2>Comment Count</h1>
            <h3 id="comment-count"></h2>
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

<script>
    
    function updateFriends() {
        $('#relations-count').text(relations.length);
    }
    
    function updateComments() {
        $('#comment-count').text(comments.length);
    }
    
    function generatePostCount() {
        let posts = {};
        
        for (i = 0; i < likes.length; i++) {
            
            if (typeof(posts[likes[i][0]]) === 'undefined') {
                posts[likes[i][0]] = {'count': 0, 'url': likes[i][1]};
            }
            posts[likes[i][0]]['count'] = posts[likes[i][0]]['count'] + 1;
        }
        
        return posts;
    }
    
    function updatePosts() {
        let postContainers = $('.likes-container');
        let posts = generatePostCount();
        let postKeys = Object.keys(posts);
        
        var counter = 0;
        
        
        postContainers.each(function(i, obj) {
            if (counter >= postKeys.length) {
                obj.style.display = "none";
            }
            else {
                obj.style.backgroundImage = 'url(https://autumnlark.com/' + posts[postKeys[counter]]['url'] + ')';
                $('.likes-count', this).text(posts[postKeys[counter]]['count'] + ' likes');
            }
            counter = counter + 1;
        });
    }
    
    $('document').ready(function() {
       updateFriends(); 
       updateComments();
       console.log(generatePostCount());
       updatePosts();
    });
    
</script>

</body>
</html>
