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
			$reponse=$_GET['reponse']; /*Comme ça j' obtiens si l' echange a ete accepte ou refusé*/

			
			/*J' obtiens les donnees du message; */

			$link = mysqli_connect("localhost", "root", "root") ; 
			mysqli_select_db($link, 'keydb') or die("Erreur à la base de données");
 			$text= "SELECT * FROM messages WHERE idMessage=$idMessage ";
		 	$query = mysqli_query($link,$text) or die (mysqli_error($link));
		 	$donnees= mysqli_fetch_array($query);

		 	$idDestinataire=$donnees['idDestinataire'];
		 	if($idDestinataire==$idSession){
		 		$idEmetteur= $donnees['idEmetteur'];
		 		$idEchange=$donnees['idEchange'];

		 		if($reponse=="accepte"){		?>


		 			<article>
				
				 		<div id="description">
		 					<p><strong> Etes-vous sûr de vouloir accepter l' échange?</strong></p>
							
							<br/>
							<a href="accepterEchangeSuite.php?idMessage=<?php echo $idMessage;?>" class="voir_habitation" style="position:relative; margin-left:150px; margin-right:auto; margin-top: 50px;">Oui</a>

							<a href="repondre.php?idMessage=<?php echo $idMessage;?>" class="voir_habitation" style="position:relative; margin-left:20px ; margin-right:150px; margin-right:auto; margin-top: 50px;">Non</a>
							
							</div>
					</article>

		 			
		 		<?php
		 		}
		 		else{?>
		 			

		 			<article>
				
				 		<div id="description">
		 					<p><strong> Etes-vous sûr de vouloir refuser l' échange?</strong></p>
							
							<br/>
							<a href="refuserEchangeSuite.php?idMessage=<?php echo $idMessage;?>" class="voir_habitation" style="position:relative; margin-left:150px; margin-right:auto; margin-top: 50px;">Oui</a>

							<a href="repondre.php?idMessage=<?php echo $idMessage;?>" class="voir_habitation" style="position:relative; margin-left:20px ; margin-right:150px; margin-right:auto; margin-top: 50px;">Non</a>
							
							</div>
					</article>


				<?php			
		 		}

		 	}
		 	else{
		 				echo "<article><br/><br/><br/><br/><h2>Ce message n' est pas pour vous!</h2></article>";
                        echo "<article><br/><br/><br/><br/><h2><a href='index.php'>Accueil</a></h2></article>";

		 	}
		 
		?>









		
		<?php 

			mysqli_close($link); 
			include ("footer.php");
		?>

	</body>

</html>