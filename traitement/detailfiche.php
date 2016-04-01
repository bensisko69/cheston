<?php
	include '../config/database.php';	
	try{
			$bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e){
			echo "The connection failed : ".$e->getMessage();
		}
	$req = $bdd->prepare('INSERT INTO Cheston.coupe (idFiche, dateCoupe, toilette, tarif) VALUE(:idFiche, :dateCoupe, :toilette, :tarif)');
		$req->execute(array(
			'idFiche' => $_POST['idFiche'],
			'dateCoupe' => strtolower($_POST['dateCoupe']),
			'toilette' => strtolower($_POST['toilette']),
			'tarif' => $_POST['prix']
			));
		header('Location: ../template/fiche.php?id='.$_POST['idFiche']);
?>