<?php
	include '../config/database.php';
	session_start();
	try{
			$bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e){
			echo "The connection failed : ".$e->getMessage();
	}
	if ($_POST)
	{
		$req = $bdd->query('SELECT * from Cheston.admin');
		while ($result = $req->fetch())
		{
			if (htmlspecialchars($_POST['username']) == $result['user'] && $result['password'] ==  sha1(htmlspecialchars($_POST['password'])))
			{
				$_SESSION['user'] = $result['user'];
				header('Location: ../template/creation.php');
				exit();
			}
		}
		header('Location: ../index.php');
		$bdd = null;
	}
?>