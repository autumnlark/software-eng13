<?php # DISPLAY ADDITIONS PAGE.

# Access session.
session_start() ;

# Set page title and display header section.
$page_title = 'Cart Addition' ;
include ( 'headerout.php' ) ;

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ; 

# Open database connection.
require ( 'connect_db.php' ) ;

# Retrieve selective item data from 'movie' database table. 
$q = "SELECT * FROM Movie WHERE mov_id = $id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

  # Check if cart already contains one movie id.
  if ( isset( $_SESSION['cart'][$id] ) )
  { 
# Add one more of this product.
    $_SESSION['cart'][$id]['quantity']++; 
    echo '<div class="container"><span style="color:white";>
			<div class="table-responsive">
				<table class="table">
				<thead class="thead-dark">
				<tr>
				<th scope="col">Movie Title</th>
				<th scope="col">Now Showing</th>
				<th scope="col">Price</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>'. $row['Movie'].'</td>
					<td><a href="cart.php"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['showing1'] . '</button></a>
					<a href="cart1.php"> <button type="button" class="btn btn-secondary" role="button">' . $row['showing2'] . '</button></a></td>
					<td> £ ' . $row['Price'] . '</td>
				</tr>
				</tbody>
				</table>
					
			</div>
		  </div></span>';
  }
else
  {
    # Or add one of this product to the cart.
    $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'Price' => $row['Price'] ) ;
 echo '<div class="container"><span style="color:white";>
			<div class="table-responsive">
				<table class="table">
				<thead class="thead-dark">
				<tr>
				<th scope="col">Movie Title</th>
				<th scope="col">Now Showing</th>
				<th scope="col">Price</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>'. $row['Movie'].'</td>
					<td><a href="cart.php"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['showing1'] . '</button></a>
					<a href="cart1.php"> <button type="button" class="btn btn-secondary" role="button">' . $row['showing2'] . '</button></a></td>
					<td> £ ' . $row['Price'] . '</td>
				</tr>
				</tbody>
				</table>
					
			</div>
		  </div></span>';
  }
}

# Close database connection.
mysqli_close($link);
?>
