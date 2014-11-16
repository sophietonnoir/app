<?php session_start()?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Accueil</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
	</head>
	
	
	
<?php include ("header.php");
            
			if(!isset($_SESSION['id']) and !isset($auth)):?>
			
			
				"<p>La page demande d'être authentifié pour continuer</p>
					<a href=connexion.php>Connectez-vous</a> ou bien <a href =inscription.php>inscrivez-vous</a> pour continuer.";
			
			
			
			<?php else:?>
			
					<article>
							<h2>Mon Profil</h2>
							<div id="dernier_ajout">
					
								<ul>
									<li>Pseudo: <span class="Info_logement_x"><?php echo($_SESSION['pseudo']);?></span></li>
									<li>Nom:<span class="info_logement_x"><?php echo($_SESSION['nom']);?></span></li>
									<li>Prénom: <span class="info_logement_x"><?php echo($_SESSION['prenom']);?>		</span></li>
									<li>Age: <span class="info_logement_x"><?php echo($_SESSION['age']);?>		</span></li>
									<li>Lieu de Résidence: <span class="Info_logement_x"><?php echo($_SESSION['adresse']);?>		</span></li>
									<li>Email: <span class="Info_logement_x"><?php echo($_SESSION['mail']);?>		</span></li>
								</ul>
							</div>
						</article> )
			<?php endif;?>

</html>