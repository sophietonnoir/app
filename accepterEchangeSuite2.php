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
			$message= addslashes($_POST['message']);

			$link = mysqli_connect("localhost", "root", "root") ; 
			mysqli_select_db($link, 'keydb') or die("Erreur à la base de données");
 			$text= "SELECT * FROM messages WHERE idMessage=$idMessage ";
		 	$query = mysqli_query($link,$text) or die (mysqli_error($link));
		 	$donnees= mysqli_fetch_array($query);

		 	$idDestinataire=$donnees['idDestinataire'];
		 	if($idDestinataire==$idSession){

		 		if($message==''){ //le message est vide c' est l' app qui le remplit

		 			$text1= "SELECT * FROM users WHERE id=$idSession ";
				 	$query1 = mysqli_query($link,$text1) or die (mysqli_error($link));
				 	$donnees1= mysqli_fetch_array($query1);

				 	$name=$donnees1['nom'];
				 	$prenom=$donnees1['prenom'];

		 			$message="Nous avons le plasir de vous informer de l' acceptation de l' échange de la part de ".$prenom." ".$name; 
		 		
		 		}

		 		$idDemandeur=addslashes($donnees['idEmetteur']); 
				$idPropietaire=addslashes($donnees['idDestinataire']);
				$idEchange=addslashes($donnees['idEchange']);
				$idLogementDemande=addslashes($donnees['logementDemande']);
				$disponibiliteDemandeur=addslashes($donnees['disponibiliteEmetteur']);
				$disponibilitePropietaire=addslashes($donnees['disponibiliteDestinataire']);
				$typeMessage=addslashes("reponseAccepte");


				$sqlMessage= "INSERT INTO messages(idEchange,idEmetteur,idDestinataire,logementDemande,lu,disponibiliteEmetteur,disponibiliteDestinataire, message, typeMessage ) VALUES ('$idEchange','$idPropietaire','$idDemandeur','$idLogementDemande' ,'0','$disponibilitePropietaire','$disponibiliteDemandeur','$message', '$typeMessage')";
		                 
		        $result = mysqli_query($link, $sqlMessage);

		?>
						 <article>
						
								<br/><br/><br/><br/><br/>
								<h2> Vous avez accepté cette demande d' echange.</h2>
								<a href="index.php" class="demanderEchange">Accueil </a> 
						</article> 

				
	
		<?php }
			else{

				echo "<article><br/><br/><br/><br/><h2>Ce message n' est pas pour vous!</h2></article>";
                echo "<article><br/><br/><br/><br/><h2><a href='index.php'>Accueil</a></h2></article>";
					
			}
			
			mysqli_close($link); 
			include ("footer.php");
		?>

	</body>

</html>
