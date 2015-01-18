<?php session_start()?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<link rel="stylesheet" href="connexion.css" />
		<title>Key To Key - Accueil</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
	</head>
	
	
	
<?php include ("header.php");
            
			if(!isset($_SESSION['id']) and !isset($auth)):?>
			
			
				"<p>La page demande d'être authentifié pour continuer</p>
					<a href=connexion.php>Connectez-vous</a> ou bien <a href =inscription.php>inscrivez-vous</a> pour continuer.";
			
			
			
			<?php else:?>
			
					<article>
							<br/><br/><h2>Mon Profil</h2>
							<div id="dernier_ajout">
							<form method="post" action="inscription3.php?page=update">
							<input type='hidden' value=1 />
							<input type="submit" name="Modifier mon profil" value="Modifier"/>
					
								<ul>
									<li>Pseudo: <span class="Info_logement_x"><?php echo($_SESSION['pseudo']);?></span></li>
									<li>Nom:<span class="info_logement_x"><?php echo($_SESSION['nom']);?></span></li>
									<li>Prénom: <span class="info_logement_x"><?php echo($_SESSION['prenom']);?>		</span></li><?php
									//<li>Date de naissance: <span class="info_logement_x"<?php echo($_SESSION['age']);?>		</span></li>
									<li>Lieu de Résidence: <span class="Info_logement_x"><?php echo($_SESSION['adresse']);echo(", ");echo($_SESSION['codepostal']); echo(", ");echo($_SESSION['ville']); ?>		</span></li>
									<li>Email: <span class="Info_logement_x"><?php echo($_SESSION['mail']);?>		</span></li>
									<li>Téléphone: <span class="Info_logement_x"><?php echo($_SESSION['tel']);?>		</span></li>
								</ul>
								</ul>
								
							</div>
						</article> )
			<?php endif;
			include ("footer.php");?>

</html>