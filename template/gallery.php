<?php
	include '../config/database.php';	
	try{
			$bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e){
			echo "The connection failed : ".$e->getMessage();
	}
	if ($_POST) 
	{
		$option = $_POST['value'];
		$name = $_POST['name'];

		$req = $bdd->query('SELECT * from Cheston.dog');
	}
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
			<li role="presentation"><a href="../index.php">Creation client</a></li>
			<li role="presentation" class="active"><a href="gallery.php">Gallery</a></li>
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
		echo "<label for='search' style='margin-right: 10px'>Recherche par race ou nom client </label>";
		echo "<select name='value'>";
		echo "<option value='nom'>Nom</option>";
		echo "<option value='race'>Race</option>";
		echo "</select>";
		echo "<input type='text' name='name' style='margin-left: 10px; margin-right: 10px'>";
		echo "<input type='submit' value='registration'>";
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
				}
			}
		}
?>
</div>
</div>
</body>
</html>