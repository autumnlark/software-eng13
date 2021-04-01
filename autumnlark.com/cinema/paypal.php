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
# html for interface design. 
  echo '<div class="container">
			<div class="middlea">
				<h1 class="display-4 text-muted">Your Booking</h1>
				<hr>
			</div><span style="color:white";>
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
    echo '	<tbody>
			<tr>
			<td>ECBK0' . $row['booking_id'] . '</td>
			<td>&pound ' . $row['total'] . '</td>
			<td>'  . $row['booking_date'] . '</td>
			<td>Collect tickets at box office</td>
			<td><a href="delete.php?booking_id=' .$row['booking_id'] . '"><i class="fa fa-trash" aria-hidden="true" style="font-size:24px;color:#464a4e;"></i></a></td>
				
				
';
  }
	echo '</tr>
		  </tbody>
		  </table> ';  
  # Close database connection.
  mysqli_close( $link ) ; 
}

?>
			<div id="paypal-button-container"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
// Render the PayPal button
paypal.Button.render({
// Set your environment
env: 'sandbox', // sandbox | production

// Specify the style of the button
style: {
  layout: 'vertical',  // horizontal | vertical
  size:   'medium',    // medium | large | responsive
  shape:  'rect',      // pill | rect
  color:  'gold'       // gold | blue | silver | white | black
},

// Specify allowed and disallowed funding sources
//
// Options:
// - paypal.FUNDING.CARD
// - paypal.FUNDING.CREDIT
// - paypal.FUNDING.ELV
funding: {
  allowed: [
    paypal.FUNDING.CARD,
    paypal.FUNDING.CREDIT
  ],
  disallowed: []
},

// Enable Pay Now checkout flow (optional)
commit: true,

// PayPal Client IDs - replace with your own

client: {
  sandbox: 'AbD3_Z5mNgmb_chYadJfFnez-PeHemLdB5NuU8oFOpaVtAywf7Eyn2Mwm-v0x84yU9JjrcZFOnmRbOMV',
  production: '<insert production client id>'
},

payment: function (data, actions) {
  return actions.payment.create({
    payment: {
      transactions: [
        {
          amount: {
            total: '0.01',
            currency: 'GBP'
          }
        }
      ]
    }
  });
},

onAuthorize: function (data, actions) {
  return actions.payment.execute()
    .then(function () {
      window.alert('Payment Complete!');window.location.href = "post_pay.php";
    });
}
}, '#paypal-button-container');
</script>

