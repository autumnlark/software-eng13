<?php
/*Create a new connection to the database*/
$mysqli = new mysqli('autumnlark.com.mysql','autumnlark_comexposure','exposure','autumnlark_comexposure');

/*If it cannot connect to the database*/
if ($mysqli->connect_errno){
    /*Display error message*/
	echo "Failed to connect to MySQL: (".$mysqli->connect_errno.")"
	.$mysqli->connect_error;
    /*Die*/
	die;
/*End if*/    
}
?>