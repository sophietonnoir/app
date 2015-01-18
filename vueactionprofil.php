
<?php
            
			//if(!isset($auth['id']) and !isset($auth)):?>
			
			
			<!--	"<p>La page demande d'être authentifié pour continuer</p>
					<a href=connexion.php>Connectez-vous</a> ou bien <a href =inscription.php>inscrivez-vous</a> pour continuer.";
			
			-->
			
			<?php// else:?>
			
					<article>
							<br/><br/><h2>Profil</h2>
							<div id="dernier_ajout">
							<form method="post" action="inscription3.php?page=updatea">
							<input type='hidden' name="pseudo" value=<?php echo($_POST['pseudo']);?> />
							<input type="submit" name="Modifier mon profil" value="Modifier"/>
							</form>
							<form method="post" action="inscription3.php?page=delete">
							<input type="submit" name="Supprimer" value="Supprimer"/>
							<input type='hidden' name="pseudo" value=<?php echo($_POST['pseudo']);?> />
							</form>
					
								<ul>
									<li>Pseudo: <span class="Info_logement_x"><?php echo($auth['pseudo']);?></span></li>
									<li>Nom:<span class="info_logement_x"><?php echo($auth['nom']);?></span></li>
									<li>Prénom: <span class="info_logement_x"><?php echo($auth['prenom']);?>		</span></li><?php
									//<li>Date de naissance: <span class="info_logement_x"<?php echo($auth['age']);?>		</span></li>
									<li>Lieu de Résidence: <span class="Info_logement_x"><?php echo($auth['adresse']);echo(", ");echo($auth['codepostal']); echo(", ");//echo($auth['ville']); ?>		</span></li>
									<li>Email: <span class="Info_logement_x"><?php echo($auth['mail']);?>		</span></li>
								</ul>
								
							</div>
						</article> )
			<?php// endif;
			//include ("footer.php");?>

</html>