
<?php # DISPLAY COMPLETE LOGGED IN PAGE.

# Access session.
session_start() ; 

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Home' ;
include ( 'headerout.php' ) ;
echo '<div class="container">';
# Display body section.
#echo "<h1>HOME</h1><p>You are now logged in, {$_SESSION['first_name']} {$_SESSION['last_name']} </p>";

# Create navigation links.
#echo '<p><a href="movie.php">Movie</a></p>';

# Display footer section.
#include ( 'includes/footer.html' ) ;
?>



<!---Carousel-======
==================-->
<div class="container">
  <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="pictures/frozen1.jpg" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="pictures/nemo1.jpg" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="pictures/bh61.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>


 
  <!--==============
End Carousel
====================
-->

<!---cards=========
===========------>
<div class="main">
	<div class="row">
		<div class="col-md-4">

			<div class="card" style="width: 18rem;"><a href="index.php">
			  <img class="card-img-top" src="pictures/mulan.jpg" alt="Card image cap"></a>
			  <div class="card-body">
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  </div>
			</div>
			
	</div>
	
	<div class="col-md-4">

			<div class="card" style="width: 18rem;"><a href="index.php">
			  <img class="card-img-top" src="pictures/lilo&stitch.png" alt="Card image cap">
			  <div class="card-body">
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  </div>
			</div>
			
	</div>
	
	<div class="col-md-4">

			<div class="card" style="width: 18rem;"><a href="snacks.php">
			  <img class="card-img-top" src="pictures/snacks.jpg" alt="Card image cap">
			  <div class="card-body">
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  </div>
			</div>
			
	</div>
	</div>
	</div>
	<!---end cards=========
===========------>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
