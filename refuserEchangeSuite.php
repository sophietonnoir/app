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
		
			

			/*On envoi une notification a la personne qui a demandé le logement pour lui dire que le propietaire a refusé l' echange*/

            $link = mysqli_connect("localhost", "root", "") ;
            mysqli_select_db($link, 'keydb') or die("Erreur de connexion à la base de donnée" );
            $text= "SELECT * FROM messages WHERE idMessage=$idMessage ";
		 	$query = mysqli_query($link,$text) or die (mysqli_error($link));
		 	$donnees= mysqli_fetch_array($query); //j' obtiens les donnés du message de demande d' échange
				
			$idDemandeur=$donnees['idEmetteur'];
		 	$idPropietaire=$donnees['idDestinataire'];
		 	$idEchange=$donnees['idEchange'];
		 	$idLogementDemande=$donnees['logementDemande'];
		 	$disponibiliteDemandeur=$donnees['disponibiliteEmetteur'];
		 	$disponibilitePropietaire=$donnees['disponibiliteDestinataire'];

		 	echo "DEMANDEUR:".$idDemandeur."\n\n";
		 	echo "PROPIETAIRE:".$idPropietaire."\n\n";
		 	echo "IDECHANGE:".$idEchange."\n\n";
		 	echo "LOGEMENTDEMANDE:".$idLogementDemande."\n\n";
		 	echo "DISPONIBILITEDEMANDEUR:".$disponibiliteDemandeur."\n\n";
		 	echo "DISPONIBILITEPROPIETAIRE:".$disponibilitePropietaire."\n\n";




		 		/*On remplit le message qu' on veut envoyer*/
			 		$text2= "SELECT * FROM logements WHERE idLogement=$idLogementDemande";
					$query2 = mysqli_query($link,$text2) or die (mysqli_error($link));
					$donnees2= mysqli_fetch_array($query2);
					$adresse=$donnees2['adresse'];
					$ville=$donnees2['Ville'];
				/*message remplit*/

		 	$message="Nous sommes desolés de vous communiquer le refus de l' echange du logement: $adresse , $ville";

		 	echo "MESSAGE:".$message."\n\n";
		 	$typeMessage="reponseRefus";

		 	echo "TYPEMESSAGE:".$typeMessage."\n\n";

		
			$sqlMessage= "INSERT INTO messages( idEchange,idEmetteur,idDestinataire,logementDemande,lu,disponibiliteEmetteur,disponibiliteDestinataire, message, typeMessage) VALUES ('$idEchange','$idPropietaire','$idDemandeur','$idLogementDemande' ,'0','$disponibilitePropietaire','$disponibiliteDemandeur','$message','$typeMessage')";
                
            $result = mysqli_query($link, $sqlMessage);



		?>
				 <article>
				
						<br/><br/><br/><br/><br/>
						<h2> Vous avez refusé cette demande d' echange.</h2>
						<a href="index.php" class="demanderEchange">Accueil </a> 
				</article> 



		<?php 
			mysqli_close($link); 
			include ("footer.php");
		?>

	</body>

</html>