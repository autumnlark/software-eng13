<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>PHP registration form</title>
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
<form action="register2.php" method="post">
	<div class="container">
	<h1>Create Account</h1>
	<input type="text" 
	 class="form-control" 
 placeholder="First name"
	name="first_name" 
	 required size="20" 
	value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"> 
	<hr>
<input type="text" 
	class="form-control" 
 placeholder="Last name"
 name="last_name" 
	 required size="20" 
	value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
	<hr>				
 
<input type="text" 
 class="form-control" 
 placeholder="Email" 
	 name="email" 
	 required size="20" 
 value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
	<hr>				
<input type="password" 
 class="form-control" 
	placeholder="Create Password" 
name="pass1" 
required size="20" 
 value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" >
	<hr>				
<input type="password" 
	 class="form-control" 
 placeholder="Confirm Password" 
 name="pass2" 
 required size="20" 
	value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
	<hr>				
<input class="btn btn-primary btn-block" type="submit" value="Create Account">
	<hr>			
</form>
</div>
</body>
</html>