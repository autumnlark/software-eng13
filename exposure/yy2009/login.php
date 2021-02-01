<?php
			//Connect to the database
			require("dbconnect.php");
			//If the form is submitted	
			if(isset($_POST["login"])){
				//Get the value of the form
				$sur = $_POST["screen_name"];
				$pass = SHA1($_POST["password"]);
				//If the username and password are empty
				if($sur == ""||$pass == ""){
					echo '<script>alert("Username or password cannot be empty!");</script>';
					echo '<script>window.location="login.php"</script>';
					exit;
				}
				$sql_select = "select screen_name,password from Users where screen_name = '$sur' and password = '$pass'";
				//Associative array
				$result = mysqli_query($mysqli,$sql_select);
				$row = mysqli_fetch_array($result); 
				
				//User and password are correct
				if($sur == $row['screen_name']&&$pass == $row['password']){
					 header("Location:loginsucc.php");
				}else{
					header("Location:loginfal.php");
				} 
			}
			
 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>login</title>
	</head>
	
	<body>
		<form action = "login.php" method = "post">
			<p>username:<input type = "text" name = "screen_name"></p>
			<p>password:<input type = "password" name = "password"></p>
			<p><input type = "submit" value = "login" name = "login"></p>
			
			<a href = "register.php">register now</a>
		</form>
	</body>
</html>