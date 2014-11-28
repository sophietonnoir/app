<?php session_start()?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Accueil</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />

		<!--CSS pour les photos roulantes-->
		<link rel="stylesheet" type="text/css" href="jsVoirHabitation/jquery.fullPage.css" /> 	
		<!--librairie de javaScript pour les photos roulantes-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<!--fonctions pour les photos roulantes-->
		<script type="text/javascript" src="jsVoirHabitation/jquery.fullPage.min.js"></script>

		<!--j' appelle à la première fonction du jquery.fullPage.
		 et je lui envoi come parametres les option que je veux
		 par exemple... le couleur des fleches ou le nom que je donne
		  à l' emsemble de slides roulantes -->

		<script type="text/javascript">
			$(document).ready(function(){
						$('#fullpage').fullpage({
								anchors: ['pages'], sectionsColor: ['#F1F1F1'],	autoScrolling: false 
						});
			});
		</script>


	</head>

	<body>


		<?php include("header.php"); ?>
		
		<div class="section">		<!--PHOTOS ROULANTES-->

			<div class="slide">
				<img src="exemplesImages/chambre.jpg" />
			</div>
			<div class="slide">
				<img src="exemplesImages/salon.jpg" />
			</div>

			<div class="slide">
				<img src="exemplesImages/cuisine.jpg" />
			</div>
		
		</div>

		<div >		
									 <!--DONNÉES DE LA MAISON-->

			<article >
				<h2> DESCRIPTION DU LOGEMENT  </h2>
			</article >

			<article class="article2" >

				<div id="restrictions"> <!--Ce n'est pas un dernier-ajout mais c' est le même style-->
				
					<ul>
						<li >Capacité:</li>
						<li >Chambres:</li>
						<li >Salles de bain:</li>
						<li >Permission de fumer:</li>
						<li >Presence d' animaux:</li>
						<li >Piscine:</li>
						<li >Places de garage: </li>
						<li >Wifii:</li>
						
					</ul>

				</div>

			</article>

			









			<?php if ($_SESSION == NULL): ?> 	<!--pas connecté-->

			<article class="article3">
				<div  id="description">
						<p>DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION </p>
				</div>				
			</article>


				 "CONNECTEZ-VOUZ POUR LA CHOISIR";
			
			<?php else: ?>					<!--connecté-->
				
				<article class="article4">
					<div  id="description">
						<p>	DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION
						

						</p>
						
						<a href="@" class="demanderEchange">Demander Échange </a>	

					</div>
					
						
				</article>

				<!--CHOISIR HABITATION

				-->

			<?php endif;?>


		</div>
		
		<?php include("footer.php"); ?>
		
	</body>