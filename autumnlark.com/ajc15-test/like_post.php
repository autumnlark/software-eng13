<?php
    $selected_post_id = $_POST['post_id'];
    
    $num_likes_query = "SELECT num_likes FROM posts WHERE post_id=" . $selected_post_id;

    /*Execute the code to connect to the database*/
    require("dbconnect.php");

    if  ($num_likes = $mysqli->query($num_likes_query)){
        if ($posts->num_rows > 0){
            $num_likes++;
        }
    }

    $update_num_likes = "UPDATE posts SET num_likes=" . $num_likes . "WHERE post_id=" . $selected_post_id;
    
     if  ($num_likes = $mysqli->query($update_num_likes)){
        include 'posts.php';
    }
?>