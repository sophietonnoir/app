
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
				
				$idSession=$_SESSION['id'];
				$idEchange=$_GET['idEchange'];

				$link = mysqli_connect("localhost", "root", "root") ;
		        mysqli_select_db($link, 'keydb') or die("Erreur de connexion à la base de donnée" );

		        $text0= "SELECT * FROM messages WHERE typeMessage LIKE '%demandeEchange%' AND idEchange=$idEchange ";
		        $query0 = mysqli_query($link,$text0) or die (mysqli_error($link));
		        $donnees0=mysqli_fetch_array($query0);

		        if($donnees0['idDestinataire']==$idSession){ 
						
						$text= "SELECT COUNT(idMessage) AS count FROM messages WHERE typeMessage LIKE '%confirmationFinale%' AND idEchange=$idEchange ";
			            $query= mysqli_query($link,$text) or die (mysqli_error($link));
			            $donnees=mysqli_fetch_array($query);
			            $count=$donnees["count"];
						if($count>0){ //il a été dejà confirmé!! ?>

							<article>

								<h2 style=" color:#C4420F; ">vous avez dejà confirmé definitivement cet échange!</h2>
								<a href="messages.php?typeMessages=envoyes" class="voir_habitation" style="position:relative; margin-left:20px ; margin-right:150px; margin-right:auto; margin-top: 50px;">Retour</a>

							</article>

						<?php
						}
						else{
						?> 	

								<br/><br/>

								<fieldset class="fieldset2">
											<legend> Sélectionnez le contrat que vous avez rempli et signé: </legend>

					                        <form enctype="multipart/form-data" action="confirmerDefinitivementSuite.php?idEchange=<?php echo $idEchange;?>" method="post">

					                        <input  type="file" name="contrat" id="contrat"/>


					                        <br/><br>
													<input type="submit" name="Ajouter mon logement" value="Envoyer" class="submit" />
					                       	</form>
					                   		                   	
								</fieldset>
								<br/><br/>

						<?php 
							}
				}
				else{?>
					<article><h2 style=" color:#C4420F; ">Ce n' est pas à vous de confirmer definitivement cet échange</h2></article>
				
				<?php
				}
					


		else :?>
				<article><h2 style=" color:#C4420F; ">Connectez vous pour accéder a la messagerie.</h2></article>
		<?php endif;  
			include ("footer.php");
		?>

	</body>

</html>

