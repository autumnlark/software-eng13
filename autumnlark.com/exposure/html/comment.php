<?php
        session_start();
        require("connect_db.php");
        if (isset($_SESSION['user_id'])&&isset($_POST["post"])) {
            $post = $_POST["post"];
            $user = $_SESSION['user_id'];
            $con = $_POST["content"];


            $sql_insert = "insert into comments(post_id,user_id,content) values('$post','$user','$con')";
            $ret = mysqli_query($link, $sql_insert);
            $row = mysqli_fetch_array($ret);
            header("Location:comment.php");

        }
        $sql = $mysqli->query("SELECT screen_name,post_id,content FROM `comments`  INNER JOIN users ON comments.user_id = users.user_id WHERE post_id='$post'");
            while($data = $sql->fetch_assoc())
                echo ($data['screen_name'].$data['content']);
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
		<textarea type="text" name="content"></textarea>
		<input type="submit" value="comment" name="comment"/>
 
</form>
</form>

	</body>
</html>