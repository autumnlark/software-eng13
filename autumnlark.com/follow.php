<?php 
 ob_start();
 session_start();
  if(isset($_POST['submit'])){
    //user begin followed
  $secondary = $_SESSION['profile_user'];
  //current user
  $primary = $_SESSION['user_id'];
  $followed = false;
   $cursor = new mysqli('autumnlark.com.mysql','autumnlark_comexposure','exposure','autumnlark_comexposure');
    //joins 2 users together in the follow database
     $followed_stmt = $cursor->prepare('SELECT * FROM Relationships WHERE primary_user_id = ? AND secondary_user_id =? ;');
 $followed_stmt->bind_param("ii", $primary, $secondary);
    $followed_stmt->execute();
    $followed_result = $followed_stmt->get_result();
    //gets the session details
  require('login_tools.php');
  if($followed_result->num_rows == 1){
        
            $followed=true;
            
        
          $row = $followed_result->fetch_assoc();
  }   
        if($followed){
             //user unfollows if they try to follow the same user twice
               $sql_update = $cursor->prepare("DELETE FROM  Relationships WHERE primary_user_id = ? AND secondary_user_id =? ;");
               $sql_update->bind_param("ii", $primary, $secondary);
               $sql_update->execute();
        }
        else{
            //user becomes a follower
         $sql_update = $cursor->prepare("INSERT INTO Relationships(primary_user_id,secondary_user_id) VALUES(?,?)");
         $sql_update->bind_param("ii", $primary, $secondary);
         $sql_update->execute();
   
        
        }

  
 load('profile.php');
  
  }