<?php
	require_once('Fonction/connectToBdd.php');
	$log = true;
	$login = $_COOKIE['cookies_log'];
	$mdp = $_COOKIE['cookies_mdp'];
	$personne = login($bdd,$login, $mdp);
	$error = false;

	if(isset($_POST['categorie']) && isset($_POST['titre']) && isset($_POST['prix']) && isset($_POST['annonce']))
	{
		$categorie = $_POST['categorie'];
		$titre = $_POST['titre'];
		$prix = $_POST['prix'];
		$annonce = $_POST['annonce'];

		if(!insertAnnonce($bdd,$login,$annonce,$titre,$categorie,$prix))
		{
			header('Location: index.php');
		}
		else
		{
			header('Location: index.php');
			$error = true;
		}
 			
 			
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


			<!-- Four -->
			<section class="wrapper style2 special">
				<div class="inner">
					<header class="major narrow">
						<h2>Formulaire de contact</h2>
						<p>Envoyez-nous un message si vous avez besoin d'aide</p>
					</header>
					<form action="#" method="POST">
						<div class="container 75%">
							<div class="row uniform 50%">
								<div class="6u 12u$(xsmall)">
									<input name="name" placeholder="Name" type="text" />
								</div>
								<div class="6u$ 12u$(xsmall)">
									<input name="email" placeholder="Email" type="email" />
								</div>
								<div class="12u$">
									<textarea name="message" placeholder="Message" rows="4"></textarea>
								</div>
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" class="special" value="Submit" /></li>
							<li><input type="reset" class="alt" value="Reset" /></li>
						</ul>
					</form>
				</div>
			</section>
		</div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>

	<?php require_once("Modules/footer.php") ?>
</html>