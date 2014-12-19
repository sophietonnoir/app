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

			

			<article>
				
				 <div id="description">
					<?php 
						if($idSession==$donnees['idDestinataire']){ /*C' est un message reçu*/ 
							
							$text= "SELECT * FROM users WHERE id=$idEmetteur ";
						 	$query = mysqli_query($link,$text) or die (mysqli_error($link));
						 	$donnees2= mysqli_fetch_array($query);
						 	$nomEmetteur= $donnees2['prenom']." ".$donnees2['nom'];

							?> 

							<p><strong>From:</strong>  <?php echo $nomEmetteur ?></p>
							<p><strong>Date du Message:</strong>  <?php echo $donnees['dateMessage']; ?></p>
							<p><strong>Date oú <?php echo $nomEmetteur?> peux vous recevoir: </strong>  <?php echo $donnees['disponibiliteEmetteur']; ?> </p>
							<p><strong>Date oú <?php echo $nomEmetteur?> démande aller chez vous:</strong> <?php echo $donnees['disponibiliteDestinataire']; ?></p>
							<p><strong>Message:</strong>  <?php echo $donnees['message']; ?></p>




					<?php  }
						else{/*C' est un message envoyé*/
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

					?>
					
						<a href="messages.php" class="voir_habitation" style="position:relative; margin-left:300px; margin-right:auto; margin-top: 50px;">Retour</a>
					
				</div>

			</article>

		<?php 	include("footer.php"); ?>
	
	</body>

</html>