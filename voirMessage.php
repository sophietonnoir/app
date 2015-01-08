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


		<?php 	include("header.php"); ?>

		<?php  
			
			$idSession= $_SESSION['id'];
			$idMessage=$_GET['idMessage'];
			/*J' obtiens les donnees du message; */


			$link = mysqli_connect("localhost", "root", "root") ;
			mysqli_select_db($link, 'keydb') or die("Erreur à la base de données");
 			$text= "SELECT * FROM messages WHERE idMessage=$idMessage ";
		 	$query = mysqli_query($link,$text) or die (mysqli_error($link));
		 	$donnees= mysqli_fetch_array($query);
		 	$idEmetteur= $donnees['idEmetteur'];
		 
			 ?>

			
			<br/><br/><br/>
			<article>
				
				 <div id="description">
					<?php 

						$reçu='0'; //0 si c' est un message reçu, 1 si c' est un message envoyé!!


						if($idSession==$donnees['idDestinataire']){ /*C' est un message reçu*/

							
							if($donnees['lu']==0){
								 
								// Je change l' etat de "pas lu" à "lu"
								
								$text0="UPDATE messages SET lu=1 WHERE idMessage=$idMessage ";
								$query0 = mysqli_query($link,$text0) or die (mysqli_error($link));
								
							}
							$text= "SELECT * FROM users WHERE id=$idEmetteur ";
						 	$query = mysqli_query($link,$text) or die (mysqli_error($link));
						 	$donnees2= mysqli_fetch_array($query);
						 	$nomEmetteur= $donnees2['prenom']." ".$donnees2['nom'];

							?> 
								
							<p><strong>From:</strong>  <?php echo $nomEmetteur ?></p>
							<p><strong>Date du Message:</strong>  <?php echo $donnees['dateMessage']; ?></p>
							<p><strong>Type de Message:</strong> 
								<?php if ($donnees['typeMessage'] == "demandeEchange" ):
											echo "Démande d' échange";
								 else:
											echo"Réponse à une démande d' échange";
								 endif;?>
							</p>
							<p><strong>Date oú <?php echo $nomEmetteur?> peux vous recevoir: </strong>  <?php echo $donnees['disponibiliteEmetteur']; ?> </p>
							<p><strong>Date oú <?php echo $nomEmetteur?> démande aller chez vous:</strong> <?php echo $donnees['disponibiliteDestinataire']; ?></p>
							<p><strong>Message:</strong>  <?php echo $donnees['message']; ?></p>
					
						<?php

					  }
						else{/*C' est un message envoyé*/

							$reçu='1'; //Envoyé
							$idDestinataire=$donnees['idDestinataire'];
							$text= "SELECT * FROM users WHERE id=$idDestinataire ";
						 	$query = mysqli_query($link,$text) or die (mysqli_error($link));
						 	$donnees2= mysqli_fetch_array($query);
						 	$nomDestinataire= $donnees2['prenom']." ".$donnees2['nom'] ;

						 	?>	

						 	<p><strong>To:</strong>  <?php echo $nomDestinataire?></p>
							<p><strong>Date du Message:</strong>  <?php echo $donnees['dateMessage']; ?></p>
							<p><strong>Date oú vous voulez que <?php echo $nomDestinataire?> vienne chez vous: </strong>  <?php echo $donnees['disponibiliteEmetteur']; ?> </p>
							<p><strong>Date oú vous voulez aller chez <?php echo $nomDestinataire?> :</strong> <?php echo $donnees['disponibiliteDestinataire']; ?></p>
							<p><strong>Message:</strong>  <?php echo $donnees['message']; ?></p>

							<?php
						}

							
						if ($reçu=='0'): //c' est un message reçu?>
							
							<br/>
							<a href="messages.php?typeMessages=reçus" class="voir_habitation" style="position:relative; margin-left:150px; margin-right:auto; margin-top: 50px;">Retour</a>
							<!--SEULEMENT SI LE MESSAGE EST UNE DEMANDE, ON DONNE LA POSIBILITÉ DE REPONDRE-->

							<a href="repondre.php?idMessage=<?php echo $idMessage;?>" class="voir_habitation" style="position:relative; margin-left:20px ; margin-right:150px; margin-right:auto; margin-top: 50px;">Répondre </a>


					<?php	
						else: // c' est un message envoyé?>
							
							<br/>
							<a href="messages.php?typeMessages=envoyes" class="voir_habitation" style="position:relative; margin-left:300px; margin-right:auto; margin-top: 50px;">Retour</a>

							
					<?php	endif;?>
						
					
				</div>

			</article>

		<?php 	
		mysqli_close($link); 
		include("footer.php"); ?>
	
	</body>

</html>