<?php session_start()?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - le nom de ma page</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
		<link rel="stylesheet" href="connexion.css" />
	</head>
	
	
	<body>
		<?php include("header.php"); ?>
		<?php if (!isset ($_POST['nom'])):?>
		<fieldset>
		<legend> Inscription: </legend>
	<form method="post" action="inscription.php">
				<label for="">Nom:</label>
			<input type="text" name="nom" />
			<label for="">Prenom:</label>
			<input type="text" name="prenom" />
			<label for="">Adresse mail:</label>
			<input type="" name="mail" />
			<label for="">Sexe:</label>
			<select name="sex" id="sex" class="donnee">
								<option value="Masculin">Masculin</option>
								<option value="Feminin">Feminin</option>
			</select>
			<label for="">Date de naissance:</label>
			<input type="date" name="age" />
			<label for="">Question secrète:</label>
			<select name="question" id="question" class="donnee">
								<option value="1">Nom de mon animal domestique</option>
								<option value="2">Age de mon père</option>
			</select>
			<input type="text" name="questionsecrete" />
			<label for="">Pseudonyme:</label>
			<input type="text" name="pseudo" />
			<label for="">Mot de passe:</label>
			<input type="password" name="password1" />
			<label for="">Confirmation mot de passe:</label>
			<input type="password" name="password2" />
			
			<input type="submit" name="S'inscrire" />
		</form>
		</fieldset>
		<?php endif;?>
		<?php include ("inscriptionverif.php");?>
		<?php include("footer.php"); ?>
	</body>