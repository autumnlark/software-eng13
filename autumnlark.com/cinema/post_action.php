<?php # PROCESS MESSAGE POST.

# Access session.
session_start();

# Make load function available.
require ( 'login_tools.php' ) ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { load() ; }

# Set page title and display header section.
$page_title = 'Movie Reviews' ;
include ( 'headerout.php' ) ;

# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  # Check Subject and Message Input.
  if ( empty($_POST['mov_title'] ) ) { echo '<p>Please enter a movie title for this post.</p>'; }
  if ( empty($_POST['message'] ) ) { echo '<p>Please enter a comment for this post.</p>'; }
 

  # On success add post to mov_rev database.
  if( !empty($_POST['mov_title']) &&  !empty($_POST['message']) )
  {
    # Open database connection.
    require ( 'connect_db.php' ) ;
  
    # Execute inserting into 'forum' database table.
    $q = "INSERT INTO mov_rev(first_name,last_name,mov_title,rate, message,post_date) 
          VALUES ('{$_SESSION[first_name]}','{$_SESSION[last_name]}','{$_POST[mov_title]}','{$_POST[rate]}','{$_POST[message]}',NOW() )";
    $r = mysqli_query ( $link, $q ) ;

    # Report error on failure.
    if (mysqli_affected_rows($link) != 1) { echo '<p>Error</p>'.mysqli_error($link); } else { load('review.php'); }
    
    # Close database connection.
    mysqli_close( $link ) ; 
    }
 } 
 
# Create a hyperlink back to the forum page.
echo '<a href="review.php"><button type="button" class="btn btn-secondary" role="button" ">Movie Review</button></a>' ;
 
# Display footer section.
include ( 'includes/footer.html' ) ;

?>
