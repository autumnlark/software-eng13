<?php

/*Recieve variables from NavBar.html*/
    $searchkey = $_POST['searchkey'];

    /*Create a query */
    $query_posts = "SELECT * FROM Posts WHERE type = 'challenge' AND (caption LIKE '%" . $searchkey . "%' OR  Hashtags WHERE hashtag = '%" . $searchkey . "%') ORDER BY num_likes DESC";

    /*Execute the code to connect to the database*/
    $cursor = new mysqli('autumnlark.com.mysql','autumnlark_comexposure','exposure','autumnlark_comexposure');

    $result = $cursor->query($query_posts);
    
    echo $result;
    
    /*If the query is successful*/
    
        /*If there are more than 0 results*/
        if ($result->num_rows > 0){
            echo 'valid username/email and password <br>';
            echo '<a href="index.html">back</a>';
            
            $data = $result->fetch_assoc();
            echo "<p>Full Name: " . $data['first_name'] . " " . $data['surname'] . "</p>";
            echo "<p>User ID: " . $data['user_id'] . "</p>";
            
        } else {
            header('Location: https://autumnlark.com/dashboard.php');
            require_once "index.html";
            echo "<br>invalid username or password, please try again";
        }
    
?>