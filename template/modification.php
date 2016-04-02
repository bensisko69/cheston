<?php
	session_start();
	if (!isset($_SESSION['user']))
		header('Location: ../index.php');
	include '../config/database.php';	
	try{
			$bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e){
			echo "The connection failed : ".$e->getMessage();
	}
	$req = $bdd->query('SELECT * from Cheston.dog WHERE id_user="'.$_POST["id"].'"');
	$result = $req->fetch()
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class="container">
<header>  
	<nav>
		<ul class='nav nav-pills nav-justified'>
			<li role="presentation"><a href="creation.php">Creation client</a></li>
			<li role="presentation"><a href="gallery.php">Recherche</a></li>
			<li role="presentation" ><a href="../traitement/logout.php">Deconnexion</a></li>
		</ul>
	</nav>
</header>
<div style="margin-top: 40px">
		<form class="form-horizontal" method="POST" action="../traitement/modification.php">
		<div class="form-group">
			<label for="inputNom" class="col-sm-2 control-label">Nom: </label>
				<div class="col-sm-10">
				<?php 
					echo "<input  type='text' name='nom' value='".$result['nom']."'class='form-control' id='inputNom' placeholder='Nom' required/>";
				?>
				</div>
		</div>
		<div class="form-group">
			<label for="inputPrenom" class="col-sm-2 control-label">Prenom: </label>
				<div class="col-sm-10">
			<?php 
					echo "<input  type='text' name='prenom' value='".$result['prenom']."'class='form-control' id='inputNom' placeholder='prenom'/>";
				?>
				</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">email: </label>
				<div class="col-sm-10">
			<?php 
					echo "<input  type='text' name='email' value='".$result['email']."'class='form-control' id='inputNom' placeholder='email' />";
				?>
				</div>
		</div>
		<div class="form-group">
			<label for="inputTel" class="col-sm-2 control-label">tel: </label>
				<div class="col-sm-10">
			<?php 
					echo "<input  type='text' name='tel' value='".$result['tel']."'class='form-control' id='inputNom' placeholder='tel'/>";
				?>
				</div>
		</div>
		<div class="form-group">
			<label for="inputVille" class="col-sm-2 control-label">ville:</label>
				<div class="col-sm-10">
			<?php 
					echo "<input  type='text' name='ville' value='".$result['ville']."'class='form-control' id='inputNom' placeholder='ville'/>";
				?>
				</div>
		</div>
		<div class="form-group">
			<label for="inputChien" class="col-sm-2 control-label">nom du chien: </label>
				<div class="col-sm-10">
			<?php 
					echo "<input  type='text' name='nomChien' value='".$result['nomChien']."'class='form-control' id='inputNom' placeholder='nomChien'/>";
				?>
				</div>
		</div>
		<div class="form-group">
			<label for="inputRace" class="col-sm-2 control-label">race: </label>
				<div class="col-sm-10">
			<?php 
					echo "<input  type='text' name='race' value='".$result['race']."'class='form-control' id='inputNom' placeholder='race' required/>";
				?>
				</div>
		</div>
		<div class="form-group">
			<label for="inputDate" class="col-sm-2 control-label">date naisance: </label>
					<div class="col-sm-10">
				<?php 
					echo "<input  type='text' name='date' value='".$result['date']."'class='form-control' id='inputNom' placeholder='date'/>";
				?>
				</div>
		</div>
		<div class="form-group">
			<label for="inputObj" class="col-sm-2 control-label">observation: </label>
				<div class="col-sm-10">
				<?php
					echo "<textarea class='form-control' id='inputObj' name='observation' rows='4'>".$result['observation']."</textarea>";
				?>
				</div>
		</div>
		<?php
		echo "<input type='hidden'  name='id'  value='".$_POST["id"]."'>";
		?>
			<button style="margin-top: 30px" type="submit" class="btn btn-primary btn-lg btn-block"> Modification fiche client</button>
		</form>
</div>
</div>
</body>
</html>