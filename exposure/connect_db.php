<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Connecting to database</title>

<body>
<?php 
$link = mysqli_connect('localhost','exposure','Se9*$D0euk','exposure'); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysqli_error()); 
} 
echo 'Connection OK';  
?> 
</body>
</html>