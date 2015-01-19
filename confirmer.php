
<?php session_start()?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Accueil</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />

		<?php 	include("calendrier.php"); //javaScript pour le php?> 

	</head>

	<body>

			
		<?php
				
			include("header.php"); 
			if ($_SESSION != NULL) :  /*Si on est connecté*/
				$idEchange=$_GET['idEchange'];


                                                                $link = mysqli_connect("localhost", "root", "root") ;
                                                                mysqli_select_db($link, 'keydb') or die("Erreur de connexion à la base de donnée" );


			$text3= "SELECT COUNT(idMessage) AS count FROM messages WHERE typeMessage LIKE '%confirmationEchange%' AND idEchange=$idEchange ";
            $query3 = mysqli_query($link,$text3) or die (mysqli_error($link));
            $donnees3=mysqli_fetch_array($query3);
            $count=$donnees3["count"];
			if($count>0){ //il a été dejà confirmé!! ?>

				<article>

					<h2 style=" color:#C4420F; ">Cet échange a été dejà confirmé!</h2>
					<a href="messages.php?typeMessages=envoyes" class="voir_habitation" style="position:relative; margin-left:20px ; margin-right:150px; margin-right:auto; margin-top: 50px;">Retour</a>

				</article>
			<?php

			}
			else{
			?> 	

					<br/><br/>

					<fieldset class="fieldset2">
								<legend> Sélectionnez le contrat rempli et signé: </legend>

		                        <form enctype="multipart/form-data" action="confirmerSuite.php?idEchange=<?php echo $idEchange;?>" method="post">

		                        <input  type="file" name="contrat" id="contrat"/>


		                        <br/><br>
										<input type="submit" name="Ajouter mon logement" value="Envoyer" class="submit" />
		                       	</form>

		             			
		                   		                   	
					</fieldset>
					<br/><br/>

		<?php 
			}
			




		else :?>
				<article><h2 style=" color:#C4420F; ">Connectez vous pour accéder a la messagerie.</h2></article>
		<?php endif;  
			include ("footer.php");
		?>

	</body>

</html>

