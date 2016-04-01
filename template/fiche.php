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
		<ul class='nav nav-tabs nav-justified'>
			<li role="presentation"><a href="../index.php">Creation client</a></li>
			<li role="presentation"><a href="../template/gallery.php">Gallery</a></li>
			<li role="presentation" ><a href="../traitement/logout.php">Deconnexion</a></li>
		</ul>
	</nav>
</header>
<?php
	include '../config/database.php';	
	try{
			$bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e){
			echo "The connection failed : ".$e->getMessage();
		}
	$req = $bdd->query('SELECT * from Cheston.dog');
	if ($_POST)
	{
		if (isset($req))
		{
			while ($result = $req->fetch())
			{
				if ($_POST['id'] == $result['id_user'])
					include 'affichageFiche.php';
			}
		}
	}
	if ($_GET)
	{
		if (isset($req))
		{
			while ($result = $req->fetch())
			{
				if ($_GET['id'] == $result['id_user'])
					include 'affichageFiche.php';
			}
		}
	} 
?>
<div style="col-mg-12">
		<form method="POST" action="../traitement/detailFiche.php">
		<div class="form-group">
		<label for="dateCoupe" style="color:  #6699cc; margin-top: 20px">Date:</label>
		<input type="text" name="dateCoupe" required class="form-control" id="dateCoupe" placeholder="Date"/></label></br>
		<label for="toilette" style="color:  #6699cc">Toilette: </label>
		<input class="form-control" id="toilette" placeholder="Toilette" type="text" name="toilette" required /></label></br>
		<label for="prix" style="color:  #6699cc">Prix: </label>
		<input class="form-control" id="prix" placeholder="prix" type="text" name="prix" required /></label></br>
		<?php 
			if (isset($_POST['id']))
			{
				echo ("<input type='hidden'  name='idFiche'  value='" .$_POST['id']."'>");
			}
			else if (isset($_GET['id']))
			{
				echo ("<input type='hidden'  name='idFiche'  value='" .$_GET['id']."'>");
			}
		?>
		<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
	</form>
	</div>
		<div class="table-responsive">
	<table class="table table-striped">
	<tr  class="info">
		<th>Date</th>
		<th>Toilette</th>
		<th>Prix</th>
	</tr>
	<?php
	$req = $bdd->query('SELECT * from Cheston.coupe');
	while ($result = $req->fetch())
	{
		if (isset($_POST['id']))
		{
			if ($_POST['id'] == $result['idFiche'])
				include 'detailCoupe.php';
		}
		else if (isset($_GET['id']))
		{
			if ($_GET['id'] == $result['idFiche'])
				include 'detailCoupe.php';
		}
	}
	?>
	</table>
		</div>
</div>
</div>
</body>
</html>