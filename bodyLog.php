<section id="two" class="wrapper special">
	<div class="inner">
		<header class="major narrow">
			<h2>Webteck</h2>
			<?php 
				if($log)
				{
					echo '<p>Bienvenue, '. $personne[0] .'</p>';
				}
			?>
		</header>
		<?php 

			if($personne[4] == "Demandeur")
			{ //Quand la personne est un demandeur
				echo '<div class="image-grid2 cadre">';
				echo '<a href="creationAnnonce.php" class="image"><img src="images/icones/postAnnonce.png" alt="" /></a>';
				echo '<a href="mesAnnonces.php" class="image"><img src="images/icones/myAnnonce.png" alt="" /></a>';
				echo '<a href="demandeAide.php" class="image"><img src="images/icones/help.png" alt="" /></a>';
				echo '<a href="deco.php" class="image"><img src="images/icones/deco.png" alt="" /></a>';
				echo '</div>';
			}
			
		?>
	</div>
</section>