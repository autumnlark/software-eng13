<?php


/*Recieve variables from index.html*/
$searchkey = $_POST["searchkey"];
$searchcriteria = $_POST["searchfield"];
 
/*Create a queryto be used*/
$query_string = "use scottrust; SELECT * FROM animal WHERE " . $searchcriteria . " = '" . $searchkey . "' ORDER BY AnimalName";

/*Execute the code to connect to the database*/
require("db_connection.php");
   
?>