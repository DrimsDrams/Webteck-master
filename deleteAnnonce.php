<?php 
	require_once('Fonction/connectToBdd.php');
	if(isset($_GET['id']))
	{
	  	$id = $_GET['id'];
	  	deleteAnnonce($bdd,$id);
	  	header('Location: mesAnnonces.php');
	}
?>