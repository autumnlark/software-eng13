<?php # DISPLAY COMPLETE FORUM PAGE.

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Movie Reviews' ;
include ( 'headerout.php' ) ;
 
require ('connect_db.php');

# Display body section, retrieving from 'mov_rev' database table.
$q = "SELECT * FROM mov_rev" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
  echo '<div class="container"><span style="color:white";>
			<div class="table-responsive">
				<table class="table">
				<thead class="thead-dark">
				<tr>
				<th scope="col">Reviewed</th>
				<th scope="col">Movie Title</th>
				<th scope="col">Comment</th>
				<th scope="col">Rating</th>
				</tr>
				</thead>
				<tbody>
				</span>';
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '<tr><td>' . $row['first_name'] .' '. $row['last_name'] . '<br>'. $row['post_date'].'</td>
    <td>' . $row['mov_title'] . '</td><td>' . $row['message'] . '</td><td>' . $row['rate'] . ' &#9734;</td></tr>';
  }
  echo '<tr><td><a href="post.php><button type="button" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add Movie Review</button></a></tr></td></table></div></div>' ;
}
else { echo '<div class="container"><h1 class="dispaly">There are currently no movie reviews.</h1>
			<a href="post.php><button type="button" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add Movie Review</button></a></div>' ; }



# Close database connection.
mysqli_close( $link ) ;
  
?>
<!-- Modal pi-->
<div class="modal fade " id="rev" tabindex="-1" role="dialog" aria-labelledby="rev" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rev">Movie Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <?php # DISPLAY POST MESSAGE FORM.

			# Access session.
			session_start() ;

			# Redirect if not logged in.
			if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }


			# Display form.
			echo '<div class="container">
				<form action="post_action.php" method="post" accept-charset="utf-8">
				<div class="form-check">
					<label for="mov_title">Movie Title: </label>
						<input type="text" class="form-control" name="mov_title" required>
					<label for="rate">Rate Movie: </label>
				<div class="form-check">
				
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" name="rate" value="5">&#9734; &#9734; &#9734; &#9734; &#9734;
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" name="rate" value="4">&#9734; &#9734; &#9734; &#9734; 
					</label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="rate" value="3">&#9734; &#9734; &#9734;
				  </label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="rate" value="2" >&#9734; &#9734; 
				  </label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="rate" value="1">&#9734;  
				  </label>
				</div>
				<div class="form-group">
					<label for="message">Comment:</label>
					<textarea class="form-control" rows="5" id="message" name="message" required></textarea>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input class="btn btn-dark" type="submit" value="Post Review">
					</div>
				</div>
		</form>
      </div>
    ';
# Close database connection.
mysqli_close( $link ) ;
		?>
        
