<?php 
	session_start(); 
	require_once("Fonction/connectToBdd.php");
	//On regarde si jamais il y une variable de session

	if(isset($_SESSION['login']))
	{
		$personne = recupPersonne($bdd,$_SESSION['login']);
		$log = true;
	}
	else
	{
		$log = false;
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php require_once("Modules/head.php") ?>
	</head>
	<body class="landing">
		<div id="main">
			<!-- Header -->
			<?php require_once("Modules/header.php") ?>

			<!-- Nav -->
			<?php
				if($log)
				{
					require_once("Modules/MenuLog.php");
				}
				else
				{
					require_once("Modules/MenuNonLog.php");
				}
			?>


			<!-- Two -->
			<?php
				if($log)
				{
					require_once("Modules/bodyLog.php");
				}
				else
				{
					require_once("Modules/bodyNonLog.php");
				}
			?>


		</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>
	</body>

	<!-- Footer -->
	<?php require_once("Modules/footer.php") ?>
</html>