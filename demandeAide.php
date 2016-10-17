<?php
	require_once('Fonction/connectToBdd.php');
	session_start();

	if(isset($_SESSION['login']))
	{
		$login = $_SESSION['login'];
		$personne = recupPersonne($bdd,$login);
		$error = false;
		$log = true;
	}
	else
	{
		header('Location: connexion.php');
	}
?>
<HTML>
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


			<!-- Contact -->
			<section id="four" class="wrapper special">
				<div class="inner">
					<header class="major narrow">
						<h2><i class="fa fa-life-ring" aria-hidden="true"></i> Demande d'aide <i class="fa fa-life-ring" aria-hidden="true"></i></h2>
						<p>Avez vous besoin d'aide ?</p>
						<p>Vous pouvez à tout moment nous appeler.</p>
						<h3><i class="fa fa-phone" aria-hidden="true"></i> 01 75 96 36 25</h3>
						<h3><i class="fa fa-envelope" aria-hidden="true"></i> aide@webteck.fr</h3>
						<a href="index.php" class="button special big"><i class="fa fa-home" aria-hidden="true"></i> Retour à l'accueil</a>
						<a href="contacter.php" class="button special big banner">Formulaire de contact</a>
					</header>
				</div>
			</section>

			<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
		</div>
	</body>

</html>