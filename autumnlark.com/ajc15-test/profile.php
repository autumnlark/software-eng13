<?php
    /*Recieve variables from index.html*/
    $user_id = $_POST['user_id'];

    /*Create a queryto be used*/
    $fetch_profile = "SELECT * FROM Profiles WHERE user_id = '" . $user_id . "'";
    $fetch_screen_name = "SELECT screen_name FROM Users WHERE user_id = '" . $user_id . "'";

    /*Execute the code to connect to the database*/
    require("dbconnect.php");

    error_reporting(E_ALL);
    ini_set('display_errors',1);

    /*If the query is successful*/
    if  ($profile = $mysqli->query($fetch_profile)){
        /*If there are more than 0 results*/
        if ($profile->num_rows > 0){     
            $data = $profile->fetch_object();

            echo "<img src='" . $data->profile_picture . "' style='width:75px; height:75px;'></img>";
            
            
            /*If the query is successful*/
            if  ($screen_name = $mysqli->query($fetch_screen_name)){           
                $display = $screen_name->fetch_object();
                echo $display->screen_name . "<br>";
            }
            
            echo "<a href='" . $data->personal_link_1 . "'>" . $data->personal_link_1 . "</a>";
            echo "<a href='" . $data->personal_link_2 . "'>" . $data->personal_link_2 . "</a><br>";
            
            echo "Friends: " . $data->num_friends . "<br>";
            echo "Followers: " . $data->num_followers . "<br>";
            
            echo "About Me: <br>";
            echo $data->about_me . "<br>";
            
            
            ///////////////////////////////////////
            /////////////// Posts /////////////////
            ///////////////////////////////////////
            echo '<h1>Posts:</h1><br>';

           /*Create a queryto be used*/
            $fetch_posts = "SELECT * FROM Posts WHERE post_type = 'Post' AND user_id = '" . $user_id . "'";

             /*If the query is successful*/
            if  ($posts = $mysqli->query($fetch_posts)){
                /*If there are more than 0 results*/
                if ($posts->num_rows > 0){
                    while ($post_data = $posts->fetch_object()){
                        echo "<form action='posts.php' method='post'>";
                            echo "<input type='hidden' name ='post_id' value='" . $post_data->post_id . "'>";
                            echo "<input type='image' src='" . $post_data->image . "' style='width:5%; height:10%' name='post_id'><br><br>";
                        echo "</form>";
                        
                         echo $post_data->caption . "<br>";
                    }
                }
            }  
            
            ///////////////////////////////////////
            /////////// Challenges ////////////////
            ///////////////////////////////////////

                echo '<h1>Challenges:</h1><br>';

               /*Create a queryto be used*/
                $fetch_challenges = "SELECT * FROM Posts WHERE post_type = 'Challenge' AND user_id=" . $user_id;

                 /*If the query is successful*/
                if  ($challenge = $mysqli->query($fetch_challenges)){
                    /*If there are more than 0 results*/
                    if ($challenge->num_rows > 0){
                        while ($challenges_data = $challenge->fetch_object()){
                            
                            echo "<form action='posts.php' method='post'>";
                                echo "<input type='hidden' name ='post_id' value='" . $challenges_data->post_id . "'>";
                                echo "<input type='image' src='" . $challenges_data->image . "' style='width:5%; height:10%' name='post_id'><br><br>";
                            echo "</form>";


                             echo $challenges_data->caption . "<br>";

                            $fetch_hashtags = "SELECT * FROM Hashtags WHERE post_id = '" . $challenges_data->post_id . "'";

                             /*If the query is successful*/
                            if  ($hashtags = $mysqli->query($fetch_hashtags)){
                                /*If there are more than 0 results*/
                                if ($hashtags->num_rows > 0){                        
                                    while ($hashtag = $hashtags->fetch_object()){
                                        echo $hashtag->hashtag;
                                    }
                                }
                            }
                            echo "<br><br>";
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