<?php
            //Connect to the database
            require("dbconnect.php");

			$sql_select = "SELECT  post_id,user_id,content FROM Comments";
            //Pre-processing
			if ( $stmt  =  $mysqli -> prepare ( $sql_select )){
            //SQL commands executed
            $stmt->execute();
            //Fetch a result set
            $stmt->store_result();
            //Binding variables
            $stmt->bind_result($post_id, $user_id, $content);
            //Output
            while ($stmt->fetch()) {
                    printf("%s,%s,%s <br>", $post_id, $user_id, $content);
             }
            $stmt->free_result();
            $stmt->close();

            }
 
?>