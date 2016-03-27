<?php
include 'database.php';	
	/**
	* creation db 
	*/
class DbbCreated
{
	public function __construct($DB_DSN, $DB_USER, $DB_PASSWORD)
	{
		try{
			$this->bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
			if ($this->bdd)
			{
				$requete = "CREATE DATABASE IF NOT EXISTS Cheston";
				$sql = "CREATE TABLE IF NOT EXISTS Cheston.dog (
					`id_user` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
					`nom` VARCHAR(255) NOT NULL,
					`prenom` VARCHAR(255),
					`email` VARCHAR(255),
					`tel` VARCHAR(10),
					`ville` VARCHAR(255),
					`nomChien` VARCHAR(255),
					`race` VARCHAR(255) NOT NULL,
					`date` VARCHAR(10),
					`observation` VARCHAR(200)
					)";
				$sql2 = "CREATE TABLE IF NOT EXISTS Cheston.coupe (
					`nameChien` VARCHAR(255) NOT NULL ,
					`date` date NOT NULL,
					`toilette` VARCHAR(255) NOT NULL,
					`tarif` VARCHAR(3) NOT NULL
				)";
				$this->bdd->prepare($requete)->execute();
				$this->bdd->exec($sql);
				$this->bdd->exec($sql2);
			}
		}
		catch (PDOException $e){
			echo "The connection failed : ".$e->getMessage();
		}
	}
}
?>