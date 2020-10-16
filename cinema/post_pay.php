<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Post Pay' ;
include ( 'headerout.php' ) ;

# Open database connection.
require ( 'connect_db.php' ) ;
$user_id=$_GET['user_id']
    
    // sql to delete a record
    $sql = "DELETE FROM booking WHERE user_id='"$_SESSION[ 'user_id' ]"'";
 if ($link->query($sql) === TRUE) {
       header("Location: indexlogin.php");
    } else {
        echo "Error deleting record: " . $link->error;
    }



mysqli_close($link);
?>