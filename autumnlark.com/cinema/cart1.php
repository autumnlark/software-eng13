<?php # DISPLAY SHOPPING CART PAGE.

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Reservation' ;
include ( 'headerout.php' ) ;

# Check if form has been submitted for update.
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  # Update changed quantity field values.
  foreach ( $_POST['qty'] as $mov_id => $mov_qty )
  {
    # Ensure values are integers.
    $id = (int) $mov_id;
    $qty = (int) $mov_qty;

    # Change quantity or delete if zero.
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }
}

# Initialize grand total variable.
$total = 0; 

# Display the cart if not empty.
if (!empty($_SESSION['cart']))
{
  # Connect to the database.
  require ('connect_db.php');
  
  # Retrieve all items in the cart from the 'movie' database table.
  $q = "SELECT * FROM Movie WHERE mov_id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY mov_id ASC';
  $r = mysqli_query ($link, $q);

  # Display body section with a form and a table.
  echo '<div class="container"><span style="color:white";>
			<div class="table-responsive">
				<table class="table">
				<thead class="thead-dark">
				<tr>
				<th scope="col">Movie Booking</th>
				<th scope="col"></th>
				<th scope="col"></th>
				<th scope="col"></th>
				<th scope="col"></th>
				</tr>
				</thead>
				<tbody>
				<tr>
				<form action="cart1.php" method="post">
				<td>
			
		
	 </span> ';
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    # Calculate sub-totals and grand total.
    $subtotal = $_SESSION['cart'][$row['mov_id']]['quantity'] * $_SESSION['cart'][$row['mov_id']]['Price'];
    $total += $subtotal;

    # Display the row/s:
    echo "<h5>Movie Title: </h5>  {$row['Movie']}  </td>
		  <tr><td><h5>Show Time: </h5> {$row['showing2']}</td></tr> 
		  <tr><td><h5>Tickets: 
	<input type=\"text\" size=\"3\" name=\" qty[{$row['mov_id']}]\" value=\" {$_SESSION['cart'][$row['mov_id']]['quantity']}\">
	@ £ {$row['Price']} = £ " .number_format ($subtotal, 2). " <form>";
  }
   # Display the total.
  echo '
		</td></tr><tr><td><h5> Total =  £'.number_format($total,2).'</h5></td></tr>
		<tr><td><input type="submit" name="submit" class="btn btn-dark" value="Update My Cart">
		<a href="chkout.php?total='.$total.'"><button type="button" class="btn btn-secondary" role="button">Continue Booking Process</button></a></td>
		</tr></tbody></form></table></div>';
}
else
# Or display a message.
{ echo '<span style="color:white";><div class="container"><h2>No reservations have been made.</span></h2>' ; }

?>