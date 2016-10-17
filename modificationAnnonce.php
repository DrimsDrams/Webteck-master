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

	if(isset($_POST['amis']) && isset ($_POST['description']) && isset($_POST['email']) && isset($_POST['siteweb']) && isset($_POST['telephone']) && isset($_POST['adresse']))
	{
		$Amis = $_POST['amis'];
		$description = $_POST['description'];
		$email = $_POST['email'];
		$siteweb = $_POST['siteweb'];
		$telephone= $_POST['telephone'];
		$adresse = $_POST['adresse'];

		if(!modificationAnnonce($bdd,$id,$login,$Amis,$description,$email,$siteweb,$telephone,$adresse))
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
			

			<!-- Contact -->
			<section id="four" class="wrapper special">
				<div class="inner">
					<header class="major narrow">
						<h2>Modifiez les valeurs ci-dessous!</h2>
						<p>Remplissez ce formulaire ci-dessous pour modifier les valeurs de votre contact</p>
						<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Retour à l'accueil</a>
					</header>
					<form method="post" action="modificationAnnonce.php">
						<div class="container 75%">
							<div class="row uniform 50%">
								<div class="12u 12u$(xsmall)">
									<input name="amis" placeholder="Amis" type="text" />
								</div>
								<div class="6u 12u$(xsmall)">
								<input name="email" placeholder="Email" type="text"/>
								</div>
								<div class="6u 12u$(xsmall)">
									<input name="telephone" placeholder="Telephone" type="text"/>
								</div>
								<div class="6u 12u$(xsmall)">
									<input name="siteweb" placeholder="Site" type="text"/>
								</div>
								<div class="6u 12u$(xsmall)">
									<input name="adresse" placeholder="Adresse" type="text"/>
								</div>
								<div class="12u 12u$(xsmall)">
									<textarea name="description" id="editor1" rows="70" cols="80">
									</textarea>
								</div>

								<script>
									CKEDITOR.editorConfig = function( config )
									{
										// misc options
										config.height = '350px';
									};
									CKEDITOR.replace('editor1');
								</script>
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" class="special" value="Envoyer" /></li>
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

	<!-- footer -->
	<?php require_once("Modules/footer.php") ?>
</html>