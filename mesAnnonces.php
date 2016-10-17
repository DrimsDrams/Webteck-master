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
						<h2>Mes Amis</h2>
						<p>Consultation de vos Amis <?php echo $personne[0] ?></p>
						<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Retour à l'accueil</a>
					</header>
					<?php
						$annonces = annoncesSelonUtilistateur($bdd,$personne[0]);

						for($i=0; $i < count($annonces); $i++)
						{
							echo '<h4><a class="btn" data-popup-open="popup-'.$i.'annonce" href="#">'.$annonces[$i][0].'</a></h4>';
						}

						//On crée le corps des popups
						for($i=0; $i < count($annonces); $i++)
						{
							echo '<div class="popup" data-popup="popup-'.$i.'annonce">';
							echo '<div class="popup-inner">';
							echo '<h3>'.$annonces[$i][0];
							echo '<a class="delete" href="deleteAnnonce?id='.$annonces[$i][7].'"><i class="fa fa-trash" aria-hidden="true"></i>
	Supprimer votre ami<span class="del"></span></a>';
							echo '</h3>';
							echo '<h4>Email :' .$annonces[$i][2];
							echo '<h4> Telephone:'.$annonces[$i][6];
							echo '<h4>Adresse:'.$annonces[$i][5];
							echo '<h4><span = class="siteweb">Site Web: '.$annonces[$i][4].'</span>';
							echo '</h4>';
							echo '<div class="Encadrement">';
							echo '<p>'.$annonces[$i][1].'</p>';
							echo '</div>';
							echo '<a data-popup-close="popup-'.$i.'annonce" href="#" class="btnClose">Close</a>';
							echo'<h3>';
							echo '<a class="change" href="modificationAnnonce?id='.$annonces[$i][7].'"><i class="fa fa-pencil" aria-hidden="true"></i>
	Modifiez les coordonnées de votre ami<span class="change"></span></a>';
							echo'</h3>';
							echo '<a class="popup-close" data-popup-close="popup-'.$i.'annonce" href="#">x</a>';
							echo '</div></div>';

						}
					?>
				</div>
			</section>
		</body>


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