
<?php # DISPLAY COMPLETE LOGIN PAGE.

# Access session.
session_start() ;

# Set page title and display header section.
$page_title = 'Login' ;
include ( 'header.html' ) ;

# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<p id="err_msg">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a href="form2.php">Register</a></p>' ;
}
?>

<!-- Display body section. -->
<div class="container">
	<h1>Login</h1>
		<form action="login_action.php" method="post">
			<input 
				type="text" 
				class="form-control" 
				placeholder="Email" 
				name="email" 
				required>
			<hr>
			<input 
				type="password" 
				class="form-control" 
				placeholder="Password" 
				name="pass" 
				required>
			<hr>   
			<button 
				type="submit" 
				class="btn btn-primary btn-block" 
				role="button"> Login In
			</button>
			<hr>
		</form>