<?php
	session_start();
	if (!isset($_SESSION['user']))
		header('Location: ../index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="css/index.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class="container">
<header>  
	<nav>
		<ul class='nav nav-pills nav-justified'>
			<li role="presentation" class="active"><a href="creation.php">Creation client</a></li>
			<li role="presentation"><a href="gallery.php">Recherche</a></li>
			<li role="presentation" ><a href="../traitement/logout.php">Deconnexion</a></li>
		</ul>
	</nav>
</header>
<div style="margin-top: 40px">
		<form class="form-horizontal" method="POST" action="../traitement/creation_user.php">
		<div class="form-group">
			<label for="inputNom" class="col-sm-2 control-label">Nom: </label>
				<div class="col-sm-10">
					<input  type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom" required="" />
				</div>
		</div>
		<div class="form-group">
			<label for="inputPrenom" class="col-sm-2 control-label">Prenom: </label>
				<div class="col-sm-10">
					<input  type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prenom"/>
				</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">email: </label>
				<div class="col-sm-10">
					<input  type="text" class="form-control" id="inputEmail" placeholder="Email" name="email"/>
				</div>
		</div>
		<div class="form-group">
			<label for="inputTel" class="col-sm-2 control-label">tel: </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputTel" placeholder="Tel" name="tel"/>
				</div>
		</div>
		<div class="form-group">
			<label for="inputVille" class="col-sm-2 control-label">ville:</label>
				<div class="col-sm-10">
					<input  type="text" class="form-control" id="inputVille" placeholder="Ville" name="ville"/>
				</div>
		</div>
		<div class="form-group">
			<label for="inputChien" class="col-sm-2 control-label">nom du chien: </label>
				<div class="col-sm-10">
					<input  type="text" class="form-control" id="inputChien" placeholder="Nom du chien" name="nomChien"/>
				</div>
		</div>
		<div class="form-group">
			<label for="inputRace" class="col-sm-2 control-label">race: </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputRAce" placeholder="Race" name="race" required />
				</div>
		</div>
		<div class="form-group">
			<label for="inputDate" class="col-sm-2 control-label">date naisance: </label>
				<div class="col-sm-10">
					<input type="text" name="date" class="form-control" id="inputDate" placeholder="Date de naissance" name="race"/>
				</div>
		</div>
		<div class="form-group">
			<label for="inputObj" class="col-sm-2 control-label">observation: </label>
				<div class="col-sm-10">
					<textarea class="form-control" id="inputObj" name="observation" rows="4"> </textarea>
				</div>
		</div>
			<button style="margin-top: 30px" type="submit" class="btn btn-primary btn-lg btn-block"> Creation fiche client</button>
		</form>
</div>
</div>
</body>
</html>