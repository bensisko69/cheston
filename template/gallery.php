<?php
	session_start();
	if (!isset($_SESSION['user']))
		header('Location: ../index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- <link rel="stylesheet" type="text/css" href="css/index.css"> -->
</head>
<body>
<div class="container">
<header>  
	<nav>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation"><a href="creation.php">Creation client</a></li>
			<li role="presentation" class="active"><a href="gallery.php">Recherche</a></li>
			<li role="presentation" ><a href="../traitement/logout.php">Deconnexion</a></li>
		</ul>
	</nav>
</header>
<div>
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
		echo "<div class='alert alert-info' style='margin-top: 40px'>";
		echo "<form method='POST'>";
		echo "<label for='search' style='margin-right: 19px'>Rechercher une fiche </label>";
		echo "<select name='value'>";
		echo "<option value='nom'>Nom</option>";
		echo "<option value='race'>Race</option>";
		echo "<option value='all'>Tout</option>";
		echo "</select>";
		echo "<input type='text' name='name' style='margin-left: 10px; margin-right: 10px'>";
		echo "<input type='submit' value='recherche'>";
		echo "</form>";
		echo "<form method='POST' action='../template/fiche.php'>";
		echo "<label style='margin-right: 10px'>Mettre l'id de la fiche a consulter </label>";
		echo "<input type='text' name='id' required>";
		echo "<button type='submit' style='margin: 10px;'> Voir la fiche</button>";
		echo "</form>";
		echo "<form method='POST' action='../template/modification.php'>";
		echo "<label style='margin-right: 18px'>Mettre l'id de la fiche a modifier </label>";
		echo "<input type='text' name='id' required>";
		echo "<button type='submit' style='margin: 10px;'> Modifier la fiche</button>";
		echo "</form>";
		echo "</div>";
		if ($_POST)
		{
			if (isset($req))
			{
				while ($result = $req->fetch())
				{
					if ($_POST['value'] == 'race')
					{
						if ($result['race'] == $_POST['name'])
							include 'affichage.php';
					}
					else if ($_POST['value'] == 'nom')
					{
						if ($result['nom'] == $_POST['name'])
							include 'affichage.php';
					}
					else if ($_POST['value'] == 'all')
						include 'affichage.php';
				}
			}
		}
?>
</div>
</div>
</body>
</html>