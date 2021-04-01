<?php 
 ob_start();
 session_start();
  if(isset($_POST['submit'])){
  $postid = $_POST['id'];
  $page = $_POST['page'];
  $liked = false;
  //connect to db
   $cursor = new mysqli('autumnlark.com.mysql','autumnlark_comexposure','exposure','autumnlark_comexposure');
 $likes_stmt = $cursor->prepare('SELECT num_likes FROM Posts WHERE post_id = ? ;');
 $likes_stmt->bind_param("i", $_POST['id']);
    $likes_stmt->execute();
    $likes_result = $likes_stmt->get_result();
    //lets a user to like a post only once
     $liked_stmt = $cursor->prepare('SELECT user_id FROM Likes WHERE post_id = ? ;');
 $liked_stmt->bind_param("i", $_POST['id']);
    $liked_stmt->execute();
    $liked_result = $liked_stmt->get_result();
  require('login_tools.php');
  if($likes_result->num_rows == 1){
        while($row2 = $liked_result->fetch_assoc()){
            if($row2['user_id'] == $_SESSION['user_id']){
                $liked=true;
            }
        }
               $row = $likes_result->fetch_assoc();
        $num_likes = $row['num_likes'];
        if($liked){
             $num_likes--;
             //if a user already like a post, remove like if they try to like again
               $sql_update = $cursor->prepare("DELETE FROM Likes WHERE post_id = ? AND user_id =?");
               $sql_update->bind_param("ii", $postid,$_SESSION['user_id']);
               $sql_update->execute();
        }
        else{
            //put a like into a post
         $sql_update = $cursor->prepare("INSERT INTO Likes(post_id,user_id) VALUES(?,?)");
         $sql_update->bind_param("ii", $postid,$_SESSION['user_id']);
         $sql_update->execute();
        $num_likes++;
        
        }
       
        
  }
  //update likes on website
  $sql_update = $cursor->prepare("UPDATE Posts SET num_likes= ? WHERE post_id=?");
  $sql_update->bind_param("ii", $num_likes,$postid);
  $sql_update->execute();
  
  load($page);
  }