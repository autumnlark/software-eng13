<?php
  

    /*Recieve variables from index.html*/
    $searchkey = $_POST['searchkey'];
    $password = $_POST['pword'];

    /*Create a queryto be used*/
    $query_string = "SELECT * FROM Users WHERE email = '" . $searchkey . "' OR screen_name = '" . $searchkey . "' AND password = '" . $password . "'";

    /*Execute the code to connect to the database*/
    require("dbconnect.php");

    /*If the query is successful*/
    if  ($result = $mysqli->query($query_string)){
        /*If there are more than 0 results*/
        if ($result->num_rows > 0){
            echo "valid username/email and password <br>";
            echo "<a href='index.html'>back</a>";
            
            $data = $result->fetch_object();
            echo "<p>Full Name: " . $data->first_name . " " . $data->surname . "</p>";
            echo "<p>User ID: " . $data->user_id . "</p>";
            
        } else {
            require_once "index.html";
            echo "<br>invalid username or password, please try again";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Logged In</title>
    </head>
    <body>
        
    </body>
</html>