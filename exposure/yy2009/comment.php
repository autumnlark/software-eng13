<?php

        require("dbconnect.php");

		if(isset($_POST["comment"])) {

            $post = $_POST["post"];
            $user = $_POST["user"];
            $con = $_POST["content"];


            if ($con == "") {

                echo '<script>alert("Comment cannot be empty!");</script>';
                echo '<script>window.location="comment.php"</script>';
                exit;
            } else {

                $sql_insert = "insert into Comments(post_id,user_id,content) values('$post','$user','$con')";
                $ret = mysqli_query($mysqli, $sql_insert);
                $row = mysqli_fetch_array($ret);
                header("Location:commentsucc.php");
            }
        }




?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Comment</title>
	</head>
	
	<body>
		<form action="comment.php" method="post">
		<p>postid:<input type="text" name="post"></p>
		<p>userid:<input type="text" name="user"></p>
		<textarea type="text" name="content"></textarea>
		<input type="submit" value="comment" name="comment"/>
 
</form>
</form>

	</body>
</html>