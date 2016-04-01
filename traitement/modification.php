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
	$req = $bdd->query('UPDATE Cheston.dog SET nom="'.$_POST["nom"].'",prenom="'.$_POST["prenom"].'", email="'.$_POST["email"].'", tel="'.$_POST["tel"].'", ville="'.$_POST["ville"].'", nomCHien="'.$_POST["nomChien"].'", race="'.$_POST["race"].'", date="'.$_POST["date"].'", observation="'.$_POST["observation"].'"WHERE id_user="'.$_POST["id"].'"');
	header('Location: ../template/fiche.php?id='.$_POST['id']);
?>