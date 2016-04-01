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

		$req = $bdd->prepare('INSERT INTO Cheston.dog (nom, prenom, email, tel, ville, nomChien, race, date, observation) VALUE(:nom, :prenom, :email, :tel, :ville, :nomChien, :race, :date, :observation)');
		$req->execute(array(
			'nom' => strtolower($_POST['nom']),
			'prenom' => strtolower($_POST['prenom']),
			'email' => $_POST['email'],
			'tel' => $_POST['tel'],
			'ville' => strtolower($_POST['ville']),
			'nomChien' => strtolower($_POST['nomChien']),
			'race' => strtolower($_POST['race']),
			'date' => $_POST['date'],
			'observation' => $_POST['observation']
			));
		header('Location: ../template/gallery.php');
	}
	$bdd = null;
?>