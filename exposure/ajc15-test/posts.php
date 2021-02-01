<?php
    $selected_post_id = $_POST['post_id'];

    /*Create a queryto be used*/
    $fetch_posts = "SELECT * FROM Posts WHERE post_id = " . $selected_post_id;

    /*Execute the code to connect to the database*/
    require("dbconnect.php");

     /*If the query is successful*/
    if  ($posts = $mysqli->query($fetch_posts)){
        /*If there are more than 0 results*/
        if ($posts->num_rows > 0){
            while ($post_data = $posts->fetch_object()){
                $fetch_profile_pic = "SELECT profile_picture FROM Profiles WHERE user_id = '" . $post_data->user_id . "'";
                
                if  ($poster_profile_pic = $mysqli->query($fetch_profile_pic)){
                    if ($poster_profile_pic->num_rows > 0){
                        echo "<img src='" . $poster_profile_pic->fetch_object()->profile_picture . "' style='width:25px; height:25px;'>";
                    }
                }
                
                $fetch_poster = "SELECT screen_name FROM Users WHERE user_id = '" . $post_data->user_id . "'";
                
                if  ($poster_screen_name = $mysqli->query($fetch_poster)){
                    if ($poster_screen_name->num_rows > 0){
                        echo "<form action='profile.php' method='post'>";
                            echo "<input type='hidden' name='user_id' value='" . $post_data->user_id . "'>";
                            echo "<button>" . $poster_screen_name->fetch_object()->screen_name . "</button><br>";
                        echo "</form>";
                    }
                }
                echo "<img src='" . $post_data->image . "' style='width:5%; height:10%'>";
                echo "<p>" . $post_data->caption . "</p>";
                echo "<p>" . $post_data->location . "</p>";
                
                $fetch_comments = "SELECT * FROM Comments WHERE post_id = '" . $post_data->post_id . "'";
                
                 /*If the query is successful*/
                if  ($comments = $mysqli->query($fetch_comments)){
                    /*If there are more than 0 results*/
                    if ($comments->num_rows > 0){                        
                        while ($content = $comments->fetch_object()){
                            
                            $fetch_profile_pic = "SELECT profile_picture FROM Profiles WHERE user_id = '" . $content->user_id . "'";
                            
                            if  ($commenter_profile_pic = $mysqli->query($fetch_profile_pic)){
                                if ($commenter_profile_pic->num_rows > 0){
                                    echo "<img src='" . $commenter_profile_pic->fetch_object()->profile_picture . "' style='width:25px; height:25px;'>";
                                }
                            }
                            
                            $fetch_comment_user = "SELECT screen_name FROM Users WHERE user_id = '" . $content->user_id . "'";
                
                             /*If the query is successful*/
//                            if  ($comment_user = $mysqli->query($fetch_comment_user)){
//                                echo "<p>" . $comment_user->fetch_object()->screen_name . ": " . $content->content . "</p>";
//                            } 
                            if  ($commenter_screen_name = $mysqli->query($fetch_comment_user)){
                                if ($commenter_screen_name->num_rows > 0){
                                   echo "<form action='profile.php' method='post'>";
                                        echo "<input type='hidden' name='user_id' value='" . $content->user_id . "'>";
                                        echo "<button>" . $commenter_screen_name->fetch_object()->screen_name . "</button><br>";
                                    echo "</form>";
                                }
                            }
                            echo $content->content . "<br>";
                        }
                    }
                }
            }
        }
    }
   
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Posts</title>
    </head>
    <body>
        <a href="dashboard.php">
            <button type="button">Back to Dashboard</button>
        </a>
    </body>
</html>