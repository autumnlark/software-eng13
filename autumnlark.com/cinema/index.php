<?php # DISPLAY COMPLETE LOGGED IN PAGE.



# Set page title and display header section.
$page_title = 'Home' ;
include ( 'headerout.php' ) ;

require ('connect_db.php');

# Retrieve items from 'products' database table.
$q = "SELECT * FROM Movie" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
 # Display body section.
  echo '<div class="container">
		<h1 class="display-4 text-muted">Now Showing </h1>
			<div class="card-body">
				<div class="row">
				
			';
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '<div class="col-md-6 col-sm-12">
			<div class="card w-50 text-white bg-dark mb-4"><img class="card-img-top" src='. $row['mov_img'].'>
				<div class="card-body">
					<h6 class="card-title text-center"> <a href="added.php?id='.$row['mov_id'].'"><button type="button" class="btn btn-link">' . $row['Movie'] .'</button></a>
					<h6 class="card-title text-center">Showtimes: ' . $row['showing1'] . ' / ' . $row['showing2'] . '</h2>
				</div>
			</div>
		 </div>';
			 }
  echo '</div></div>';
  
  # Close database connection.
  mysqli_close( $link ) ; 
}
# Or display message.
else { echo '<p>There are currently no movies showing at this cinema.</p>' ; }


?>
<embed src="fcd.wav" autostart="true" loop="true"
width="2" height="0">
</embed>
<noembed>
<bgsound src="fcd.wav" loop="infinite">
</noembed>
<style>
p {
  text-align:center;
  
  color: white;
  font-size: 60px;
  margin-top: 0px;
}
</style>
</head>
<body>
<div class="WreckContainer">
<div class="counter">
<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2019 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
</div>
</div>


</body>
</html>
