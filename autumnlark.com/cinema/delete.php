<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Reservation' ;
include ( 'headerout.php' ) ;

# Open database connection.
require ( 'connect_db.php' ) ;

    $booking_id=$_GET['booking_id'];
    // sql to delete a record
    $sql = "DELETE FROM booking WHERE booking_id='".$booking_id."'";
 if ($link->query($sql) === TRUE) {
       header("Location: reservation.php");
    } else {
        echo "Error deleting record: " . $link->error;
    }



mysqli_close($link);
?>

