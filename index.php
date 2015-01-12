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
                   
                    <form method="post" action="ResultatDeRecherche.php">
                        <p><input type="search" name="requete" size="70" placeholder="Rentrez une ville" class="donnee"/></p>
                        <p>
                            <select name="Type" id="type_de_logement" class="donnee">
                            	 <option value="tout">Tout</option>
                                <option value="appartement">Appartement</option>
                                <option value="maison">Maison</option>
                            </select>
                        </p>
                        
                        <p><input type="submit" value="Rechercher" id="rechercher"/></p>
                    </form>
                </div>
			<div>
			<img src="Img/divider2.png" alt="separateur" id="divider2" />
			<article>
				<h2>Dernière habitation ajoutée</h2>
				<div id="dernier_ajout">
				<?php
								$dbh=new PDO('mysql:host=localhost;keydb','root','root');
								$sql = "SELECT * FROM keydb.logements NATURAL JOIN keydb.Photo ORDER BY dateAjout desc limit 1";
								$respons=$dbh->query($sql);
								$donnees = $respons->fetch();
								
								//echo ($respons['adresse']);

								$lien=$donnees['Liendelaphoto'];


				?>




					<img width="130px" height="130px" align="left"src=" <?php echo $lien ?>" alt="maison_de_X" id="img_000001"/>

					<ul>
						<li>Localisation: <span class="info_logement_x"> <?php echo ($donnees['Ville']);?> </span></li>
						<li>Code Postal: <span class="info_logement_x"><?php echo ($donnees['codePostal']);?></span></li>
						<li>Surface: <span class="info_logement_x"><?php echo ($donnees['surface']);?>m²</span></li>
						<li>Chambre(s): <span class="info_logement_x"><?php echo ($donnees['chambres']);?></span></li>
                                                <li>Description: <span class="info_logement_x"><?php echo ($donnees['Description']);?></span></li>
						
					</ul>
					<p><a href="voirHabitation.php?search=<?php echo $donnees['idLogement']; ?>" class="voir_habitation">Voir l'habitation</a></p>
					
				</div>
			</article>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>