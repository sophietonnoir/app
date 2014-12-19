<!DOCTYPE html>
<?php session_start()?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Contact </title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
	</head>
	
	
	<body>
		<?php include("header.php"); ?>
		<!--formulaire contact-->
		
			<div align="center">

			<form method="post"action="traitement_contact2.php">
			<br/><br/><br/>
			<fieldset>
				<br/>
				<legend class="qui">qui êtes-vous?</legend>
				<label for="nom">Nom : </label>
				<br/>
				<input class="case_contact" style="margin:auto"type="text" name="nom" id="nom" required/>
			<br/>
				<label for="prenom">Prénom : </label>
			<br/>
			<input class= "case_contact" style="margin:auto" type="text" name="prenom" id="prenom" required/>
			<br/>
				<label for="email">email : </label>
			<br/>
			<input class= "case_contact" style="margin:auto"type="email" name="email" id="email" required/>
			</fieldset>			
			<div style="height:50px"></div>
				<label for="objet">objet du message: </label>
			<input class="case_contact" style="margin:auto" type="text" name="objet"id="objet" required/>
			<br/><br/>
        		<label for = "message"> Ecrivez votre message </label>
			<br/>
			<textarea class= "case_contact" name="message" id="message" rows="25" cols="50"></textarea>
                        <br/><br/><br/>
                         <input type="submit" value="Envoyer"/>
			</form>


		</div>
		
		
		<?php include("footer.php"); ?>
	</body>