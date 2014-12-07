<?php session_start()?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Accueil</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
	</head>

	<body>
		<?php include("header.php"); ?>

				<div id="barre_de_recherche">
					<p id="ou_voulez">Où voulez-vous aller ?</p>
					 <form action="ResultatDeRecherche.php" method="Post">
					<input id="rechercher" type="text" name="requete" size="10">
					<input type="submit" value="Ok">
					</form>

				</div>
			<div>
			<img src="Img/divider2.png" alt="separateur" id="divider2" />
			<article>
				<h2>Dernière habitation ajoutée</h2>
				<div id="dernier_ajout">
					<img src="Img/house2.png" alt="maison_de_X" id:"img_000001"/>
					<ul>
						<li>Surface: <span class="info_logement_x">1200m²</span></li>
						<li>Chambre(s): <span class="info_logement_x">2</span></li>
						<li>Pièces: <span class="info_logement_x">2salles de bain, un salon, une salle à manger et une piscine (50m²)</span></li>
						<li>Obligation(s): <span class="Info_logement_x">S'occuper du labrador</span></li>
						<li>Localisation: <span class="Info_logement_x">25 passage des marrons</span></li>
					</ul>
					<p><a href="@" class="voir_habitation">Voir l'habitation</a></p>
					</ul>
				</div>
			</article>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>