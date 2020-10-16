<?php # DISPLAY COMPLETE PRODUCTS PAGE.
# Open database connection.

include ( 'headerout.php' ) ;
require ( 'connect_db.php' ) ;
# Retrieve items from 'shop' database table.

$q = "SELECT * FROM Movie" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
  # Display body section.
   echo '<table>
			<tr>
			<th>Movie</th>
			<th>Screen</th>
			<th>Ticket Price</th>';
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
   echo '<tr><td>' . $row['Movie'] .'</td><td>'. $row['Screen'] . '</td> <td>&pound' . $row['Price'] . '</td>' ;  {
  }
   echo '</tr></table>';
  
  # Close database connection.
  mysqli_close( $link ) ; 
}
# Or display message.
else { echo '<p>There are currently no movies showing.</p>' ; }


?>
