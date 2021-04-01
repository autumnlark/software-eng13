<?php 
session_start();
//closes the current session
session_unset();
session_destroy();

header("Location: index.php");
?>