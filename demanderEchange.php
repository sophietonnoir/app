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

			
		<?php
				
			include("header.php"); 
			if ($_SESSION != NULL) :  /*Si on est connecté*/

				$idProprietaire=$_GET['proprietaire'];
				$idLogement=$_GET['logement'];
			?> 	

			<br/><br/>

			<fieldset class="fieldset2">
						<legend> Ajouter un logement: </legend>
                        <form method="post" action="demanderEchangeSuite.php?proprietaire=<?php echo $idProprietaire;?>&logement=<?php echo $idLogement; ?> "/>

                        <label for="" class="label"> Écrivez les dates où vous désirez aller dans ce logement:<br/>
            			<textarea rows="4" cols="50" class="textarea" name="dates1"></textarea><br/><br/>

            			<label for="" class="label">Écrivez les dates où vous désirez que le propriétaire de ce 				logement vienne chez vous:<br/>
            			<textarea rows="4" cols="50" class="textarea" name="dates2"></textarea><br/><br/>
						

						<label for="" class="label">Message pour le propriétaire :</label><br/>
             			<textarea rows="4" cols="50" class="textarea" name="message"></textarea><br/><br/>

             			<input type="submit" name="Ajouter mon logement" value="Envoyer" class="submit" />
                   		                   	
			</fieldset>
			<br/><br/>

		<?php else :?>
				<article><h2 style=" color:#C4420F; ">Connectez vous pour démander un logement</h2></article>
		<?php endif;  
			include ("footer.php");
		?>

	</body>

</html>