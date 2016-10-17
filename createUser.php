<?php
	require_once('Fonction/connectToBdd.php');
	$log = false;
	$allready = false;
 	if(isset($_POST['login']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mdp']) && isset($_POST['email']) && isset($_POST['statut']))
 	{
 	 	$login = $_POST['login'];
 		$nom = $_POST['nom'];
 		$prenom = $_POST['prenom'];
 		$mdp =  $_POST['mdp'];
 		$email =  $_POST['email'];
 		$status = $_POST['statut'];

 		if(verfUsername($bdd,$login))
 		{
 			createUser($bdd,$login,$nom,$prenom,$mdp,$email,$status);
 			
 			header('Location: Connexion.php');
 		}
 		else
 		{
 			$allready = true;
 		}
 	}
?>
<HTML>
	<head>
		<?php require_once('Modules/head.php') ?>
	</head>

	<body class="landing">
		<div id="main">

			<!-- Header -->
			<?php require_once('Modules/header.php') ?>

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
						<h2>Créer un compte</h2>
						<p>Créez-vous un compte pour pouvoir demander ou proposer de l'aide</p>
						<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Retour à l'accueil</a>
						<?php
							if($allready)
							{
								echo '<p style="color:red;">Ce login existe déja</p>';
							}
						?>
					</header>
					<form method="post" action="createUser.php">
						<div class="container 75%">
							<div class="row uniform 50%">
								<div class="6u 12u$(xsmall)">
									<input name="nom" placeholder="Nom" type="text" />
								</div>
								<div class="6u 12u$(xsmall)">
									<input name="prenom" placeholder="Prénom" type="text" />
								</div>
								<div class="6u 12u$(xsmall)">
									<input name="login" placeholder="Identifiant" type="text" />
								</div>
								<div class="6u 12u$(xsmall)">
									<input name="email" placeholder="Email" type="email" />
								</div>
								<div class="6u 12u$(xsmall)">
									<input name="mdp" placeholder="Mot de passe" type="password" />
								</div>
								<div class="6u 12u$(xsmall)">
									<select name="statut" placeholder="Statut" />
										<option>
											Faites votre choix de profil
										</option>
										<option>
											Demandeur
										</option>
									</select>
								</div>
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" class="special" value="Envoyer" /></li>
							<li><input type="reset" class="alt" value="Réinitialiser" /></li>
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
	<!-- Footer -->
	<?php require_once("Modules/footer.php") ?>
</html>