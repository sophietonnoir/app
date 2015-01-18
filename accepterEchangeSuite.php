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

			$link = mysqli_connect("localhost", "root", "root") ; 
			mysqli_select_db($link, 'keydb') or die("Erreur à la base de données");
 			$text= "SELECT * FROM messages WHERE idMessage=$idMessage ";
		 	$query = mysqli_query($link,$text) or die (mysqli_error($link));
		 	$donnees= mysqli_fetch_array($query);

		 	$idDestinataire=$donnees['idDestinataire'];
		 	if($idDestinataire==$idSession){
		
			?>
				<br/><br/>
				<article>
					<div  <div id="description">
						<h2>Message pour le propriétaire (facultatif):</h2>
								
						<form method="post" action="accepterEchangeSuite2.php?idMessage=<?php echo $idMessage;?> "/>
			     		<textarea rows="4" cols="50" class="textarea" name="message"></textarea><br/>
			     		<br/>
			     		<input style="margin-left:200px ;" type="submit" class="demanderEchange"  value="Envoyer"  />
			     		
			     		<a href="repondreSuite.php?idMessage=<?php echo $idMessage."&reponse=accepte";?>" class="demanderEchange">Retour</a>
						<br/><br/>

     				</div>
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


