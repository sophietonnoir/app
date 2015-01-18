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

			
		<?php
				
			include("header.php"); 


			$link=mysqli_connect('localhost','root','root');

			if(isset($_GET['search']) && $_GET['search'] != NULL)  : 
			
				mysqli_select_db($link, 'keydb'); // on se connecte à MySQL. 
					
				$search = htmlspecialchars($_GET['search'] ); // on recupère le id du logement qu on veut visualiser
				
				//JE DEMANDE LES DONÉES DE LA MAISON AVEC CE ID.
				$queryLogement = mysqli_query($link,"SELECT * FROM logements WHERE idLogement= $search ") or die (mysqli_error($link)); 
				
				$donnees=mysqli_fetch_array($queryLogement);
				
				//JE DEMANDE LES PHOTOD DE LA MAISON AVEC CE ID.
				$queryPhotos= mysqli_query($link,"SELECT * FROM Photo WHERE idLogement= $search ") or die (mysqli_error($link));
				
				

                                $text3= "SELECT COUNT(idPhoto) AS count FROM Photo WHERE idLogement= $search ";
                                $query3 = mysqli_query($link,$text3) or die (mysqli_error($link));
                                $donnees3=mysqli_fetch_array($query3);
                                $count=$donnees3["count"];



		?>

			<!--PHOTOS ROULANTES-->


                    <?php    if($count==1):
                                        $photos = mysqli_fetch_array($queryPhotos);
					echo '<div id="photo"><img width="400px" height="400px" src="'.$photos['Liendelaphoto'].'"  /></div>';
                    else:
                        ?>
                                <div class="section">

                                        <?php

                                             while($photos = mysqli_fetch_array($queryPhotos)){

                                                    echo '<div class="slide">'.'<img width="400px" height="400px" src="'.$photos['Liendelaphoto'].'"  />'.'</div>';

                                             }
                             ?>
                                </div>
		<?php endif; ?>
                        <div>
				<article >
					<h2> DESCRIPTION DU LOGEMENT  </h2>
				

					<div id="description"> <!--Ce n'est pas un dernier-ajout mais c' est le même style-->
					
						<ul >
							<li >Surface: <?php echo $donnees['surface'];?>  mètres carrés</li>
							<li >Capacité: <?php echo $donnees['capacite'];?>  personne(s)</li>
							<li >Chambres: <?php echo $donnees['chambres'];?>  </li>
							<li >Salles de bain: <?php echo $donnees['toilettes'];?>  </li>
							<li >Permission de fumer:
								<?php 
								if($donnees['fumerPermis']==0){	echo " interdit";}
								else{echo " permis";}
								?>  
							</li>
							<li >Presence d' animaux: 
								<?php 
									if($donnees['animauxPermis']==0){	echo " interdit";}
									else{echo " permis";}
								?> 
							</li>
							<li >Piscine:
								<?php 
									if($donnees['piscine']==0){	echo "non";}
									else{echo "oui";}
								?>  
							</li>
							<li >Places de garage: <?php echo $donnees['placesGarage'];?>  </li>
							<li >Wifi: 
								<?php 
									if($donnees['wifi']==0){	echo "non";}
									else{echo "oui";}
								?>  
							</li>
							<li >Jardin:
								<?php 
									if($donnees['jardin']==0){	echo "non";}
									else{echo "oui";}
								?>  
							</li>
						</ul>

						<p> <?php echo $donnees['Description'];?> 
						</p>
						
						<?php if ($_SESSION != NULL) : /*Si on est connecté, on montre
															 le button "démander échange"*/
							
							$idProprietaire=$donnees['idPropietaire'];
							$idSession=$_SESSION['id'];


							if($idProprietaire!=$idSession){
								$idLogement=$donnees['idLogement'];

						?> 
								<a href="demanderEchange.php?proprietaire=<?php echo $idProprietaire;?>&logement=<?php echo $idLogement; ?> "  class="demanderEchange">Demander Échange </a> 
}
                                                      <?php }
							 else{ 
                                                        $idLogement=$donnees['idLogement']; ?>

                                                        <a href="modifierlogement.php?proprietaire=<?php echo $idProprietaire;?>&logement=<?php echo $idLogement; ?> "  class="modifier">Modifier </a>
                                                        <a href="supprimerlogement.php?proprietaire=<?php echo $idProprietaire;?>&logement=<?php echo $idLogement; ?> " onclick="if(!confirm('Voulez-vous Supprimer')) return false;"  class="modifier">Supprimer </a>


							
						<?php }
                                                endif;  ?>
						<?php mysqli_close($link); ?>  <!--fermer la bd-->

					</div> <!--description-->


					
					
				</article >
				
			</div>
			
		<?php

			else : //idLogement==NULL
		
		 ?>
					<article><h2 style=" color:#C4420F; "> Logement demandé incorrect </h2></article>
				
		<?php
			//else
			endif;
			include("footer.php"); 

		?>

	</body>

</html>