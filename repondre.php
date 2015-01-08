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


			$link = mysqli_connect("localhost", "root", "") ; 
			mysqli_select_db($link, 'keydb') or die("Erreur à la base de données");
 			$text= "SELECT * FROM messages WHERE idMessage=$idMessage ";
		 	$query = mysqli_query($link,$text) or die (mysqli_error($link));
		 	$donnees= mysqli_fetch_array($query);
		 	$idEmetteur= $donnees['idEmetteur'];
		 
			 ?>
			 <article>
				
				 <div id="description">
					<?php 

						if($idSession==$donnees['idDestinataire']){ /*C' est un message reçu*/
							
							if($donnees['lu']==0){  // Je change l' etat de "pas lu" à "lu"
								 
								$text0="UPDATE messages SET lu=1 WHERE idMessage=$idMessage ";
								$query0 = mysqli_query($link,$text0) or die (mysqli_error($link));
								
							}

							$text2= "SELECT * FROM users WHERE id=$idEmetteur ";
						 	$query2 = mysqli_query($link,$text2) or die (mysqli_error($link));
						 	$donnees2= mysqli_fetch_array($query2);
						 	$nomEmetteur= $donnees2['prenom']." ".$donnees2['nom'];

							?> 
								
							<p><strong>Logement que <?php echo $nomEmetteur?> vous propose: </strong> AAA</p>
							<p><strong>Date où <?php echo $nomEmetteur?> peux vous recevoir: </strong>  <?php echo $donnees['disponibiliteEmetteur']; ?> </p>
							<p><strong>Logement que <?php echo $nomEmetteur?> vous demande: </strong> 
								<!--On montre la direction du logement demandé-->
									<?php 
											$idLogDemande= $donnees['logementDemande'];
											$text3= "SELECT * FROM logements WHERE idLogement=$idLogDemande";
											$query3 = mysqli_query($link,$text3) or die (mysqli_error($link));$donnees3=mysqli_fetch_array($query3);
											
											$adresse=$donnees3['adresse'];
											$ville=$donnees3['Ville'];
											
											echo "$adresse".", "."$ville";
									?>



							</p>
							<p><strong>Date où <?php echo $nomEmetteur?> demande aller chez vous:</strong> <?php echo $donnees['disponibiliteDestinataire']; ?></p>
							
							<br/>
							<a href="repondreSuite.php?idMessage=<?php echo $idMessage."&reponse=accepte";?>" class="voir_habitation" style="position:relative; margin-left:150px; margin-right:auto; margin-top: 50px;">Accepter échange</a>
							<!--SEULEMENT SI LE MESSAGE EST UNE DEMANDE, ON DONNE LA POSIBILITÉ DE REPONDRE-->

							<a href="repondreSuite.php?idMessage=<?php echo $idMessage."&reponse=refuse";?>" class="voir_habitation" style="position:relative; margin-left:20px ; margin-right:150px; margin-right:auto; margin-top: 50px;">Refuser échange</a>
						<?php 
						 }
						else{
						?>

							<h2 style=" color:#C4420F; ">Ce message n' est pas pour vous</h2>

							<br/>
							<a href="index.php" class="voir_habitation" style="position:relative; margin-left:300px; margin-right:auto; margin-top: 50px;">Accueil</a>



						<?php 
						 } ?>
					</div>
				</article>





			 <?php 

			mysqli_close($link); 
			include ("footer.php");
		?>

	</body>

</html>