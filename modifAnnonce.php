<?php 
	require_once('Fonction/connectToBdd.php');
	if(isset($_GET['id']))
	{
	  	$id = $_GET['id'];
	  	modificationAnnonce($bdd,$id);
	  	header('Location: mesAnnonces.php');
	}
?>