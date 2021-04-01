<?php # DISPLAY SHOPPING CART PAGE.

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Reservation' ;
include ( 'headerout.php' ) ;

# Open database connection.
require ( 'connect_db.php' ) ;
 
# Retrieve items from 'bookings' database table.
$q = "SELECT * FROM booking WHERE user_id={$_SESSION[user_id]}" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
  
  echo '<div class="container"><span style="color:white";>
			<div class="table-responsive">
				<table class="table">
				<thead class="thead-dark">
				<tr>
				<th scope="col">Booking Refrence No.</th>
				<th scope="col">Total</th>
				<th scope="col">Date of Booking</th>
				<th scope="col">Status</th>
				<th scope="col">Delete</th>
				</tr>
				</thead>
				</span>';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '	<tbody><span style="color:white";>
			<tr>
			<td>' . $row['booking_id'] . '</td>
			<td>' . $row['total'] . '</td>
			<td>'  . $row['booking_date'] . '</td>
			<td>Collect tickets at box office</td>
			<td><a href="delete.php?booking_id=' .$row['booking_id'] . '"><i class="fas fa-trash" aria-hidden="true" style="font-size:24px;color:#464a4e;"></i></a></td></span>
				
				
';
  }
	echo '</tr>
		  </tbody>
		  </table> ';  
  # Close database connection.
  mysqli_close( $link ) ; 
}

?>
<p> <a href="paypal.php">Pay Now</a></p>
