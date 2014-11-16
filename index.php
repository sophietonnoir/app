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
					<p id="a_quelle">A quelle date ?</p>
					<form method="post" action="page.php">
						<p><input type="search" name="adresse" size="70" placeholder="Ville, Code postal" class="donnee"/></p>
						<p>
							<select name="type_de_logement" id="type_de_logement" class="donnee">
								<option value="appartement">Appartement</option>
								<option value="maison">Maison</option>
								<option value="roulotte">Roulotte</option>
								<option value="tente">Tente</option>
							</select>
						</p>
						<p><input type="date" name="date" size="20" class="donnee"/></p>
						<p><input type="submit" value="Rechercher" id="rechercher"/></p>
					</form>
					<img src="Img/blanc.png" alt="blanc" id="blanc1" />
					<img src="Img/blanc.png" alt="blanc" id="blanc2" />
				</div>
			</div>
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