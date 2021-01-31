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
                echo "<img src='" . $post_data->image . "' style='width:5%; height:10%'>";
                echo "<p>" . $post_data->caption . "</p>";
                echo "<p>" . $post_data->location . "</p>";
                
                $fetch_comments = "SELECT * FROM Comments WHERE post_id = '" . $post_data->post_id . "'";
                
                 /*If the query is successful*/
                if  ($comments = $mysqli->query($fetch_comments)){
                    /*If there are more than 0 results*/
                    if ($comments->num_rows > 0){                        
                        while ($content = $comments->fetch_object()){
                            
                            $fetch_comment_user = "SELECT screen_name FROM Users WHERE user_id = '" . $content->user_id . "'";
                
                             /*If the query is successful*/
                            if  ($comment_user = $mysqli->query($fetch_comment_user)){
                                echo "<p>" . $comment_user->fetch_object()->screen_name . ": " . $content->content . "</p>";
                            } 
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