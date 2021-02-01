<?php
		//Connect to the database
        require("dbconnect.php");
        //If the form is submitted
		if(isset($_POST["register"])) {
            //Get the value of the form
            $sur = $_POST["surname"];
            $first = $_POST["first_name"];
            $screen = $_POST["screen_name"];
            $email = $_POST["email"];
            $pass = $_POST["password"];
            $re_pass = $_POST["re_password"];
            //If the username and password are empty
            if ($screen == "" || $pass == "") {
                echo '<script>alert("Username or password cannot be empty!");</script>';
                echo '<script>window.location="login.php"</script>';
                exit;
            }
            //If two passwords are the same
            if ($pass == $re_pass) {

                $sql_select = "select screen_name,email from Users where screen_name = '$screen' or email = '$email'";
                //Associative array
                $result = mysqli_query($mysqli, $sql_select);
                $num = mysqli_num_rows($result);
                //Determine if username and email exist
                if ($num) {
                    echo '<script>alert("Username or email already exists!");</script>';
                    echo '<script>window.location="register.php"</script>';
                    exit;
                } else {
                    $sql_insert = "insert into Users(surname,first_name,screen_name,email,password) values('$sur','$first','$screen','$email',SHA1('$pass'))";
                    $ret = mysqli_query($mysqli, $sql_insert);
                    $row = mysqli_fetch_array($ret);
                    header("Location:registersucc.php");
                }
                } else {
                echo '<script>alert("Different password!");</script>';
                echo '<script>window.location="register.php"</script>';
                exit;
            }
        }

 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>register</title>
	</head>
	
	<body>
		<form action = "register.php" method = "post">
			<p>surname:<input type="text" name="surname"></p>
			<p>first_name:<input type="text" name="first_name"></p>
			<p>screen_name:<input type="text" name="screen_name"></p>
			<p>email:<input type = "text" name = "email"></p>
			<p>password:<input type = "password" name = "password"></p>
			<p>re_password:<input type = "password" name = "re_password"></p>
			<p><input type="submit" value="register" name="register"></p>
</form>
</body>
</html>