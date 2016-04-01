<?php
	include 'config/setup.php';
	new DbbCreated($DB_DSN, $DB_USER, $DB_PASSWORD);
	session_start();
	echo sha1("admin");
?>
<!DOCTYPE html>
<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="css/index.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body style="background-image: url('doge.jpg');">
<div class="container">
<div class="col-lg-12" >
	<h1 style="color:  #6699cc; text-align: center;">Bienvenue sur le listing client de Cheston</h1>
<div style="background-color: rgba(250, 250, 250, 0.5); height: 250px; border-radius: 10px">
	<form method="POST" action="traitement/connection.php">
		<div class="form-group">
		<label for="username" style="color:  #6699cc; margin-top: 20px">Username:</label>
		<input type="text" name="username" required class="form-control" id="username" placeholder="username"/></label></br>
		<label for="passeword" style="color:  #6699cc">Password: </label>
		<input class="form-control" id="passwprd" placeholder="password" type="password" name="password" required /></label></br>
		 <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
	</form>
	</div>
</div>
</div>
</div>
</body>
</html>