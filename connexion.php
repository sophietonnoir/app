<?php session_start(); ?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<link rel="stylesheet" href="connexion.css" />
		<title>Key To Key - Connexion</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
	</head>
	
	<?php 
	
	
	include("Bdd.php");


$sql = $bdd->prepare('SELECT * FROM users WHERE mail= :mail AND password= :pass');

	if(isset($_POST['mail']))	
	{
$sql->execute(array(
	'mail'=> $_POST['mail'],
	'pass'=> $_POST['password']));
	$auth=$sql->fetch();
	}
		
	if (isset($auth['id'])and isset($_POST['mail']))
	{
		$_SESSION['id']=$auth['id'];
		$_SESSION['pseudo']=$auth['pseudo'];
		$_SESSION['admin']=$auth['admin'];
		$_SESSION['nmaison']=$auth['nmaison'];
		$_SESSION['age']=$auth['age'];
		$_SESSION['datei']=$auth['dateinscription'];
		$_SESSION['codep']=$auth['codepostal'];
		$_SESSION['pays']=$auth['pays'];
		$_SESSION['adresse']=$auth['adresse'];
		$_SESSION['prenom']=$auth['prenom'];
		$_SESSION['nom']=$auth['nom'];
		$_SESSION['mail']=$auth['mail'];
		$_SESSION['codepostal']=$auth['codepostal'];
		$_SESSION['ville']=$auth['ville'];
                $_SESSION['tel']=$auth['tel'];
                $_SESSION['sexe']=$auth['sexe'];

		unset($auth);
	
	include ("header.php");
	echo "<br/><br/><article><h2>Vous êtes identifié</h2></article>";}
	

	else
	
	{
	include ("header.php");
	  
		if(isset($_POST['mail']))
		{echo"<p id=passwordw>mauvais mot de passe</p>";}
	
	echo "
		<fieldset>
		<legend> Connexion: </legend>
		<form method=\"post\" action=\"connexion.php\" />
				<label for=\"mail\">Adresse mail:</label>
			<input type=\"mail\" name=\"mail\" />
				<label for=\"password\">Mot de passe:</label>
			<input type=\"password\" name=\"password\"/>
				<label for=\"box\" class=\"inline\">Rester connecté:</label>
			<input type=\"checkbox\" name=\"box\" id=\"box\"/>
			
			<input type=\"submit\" name=\"valider\" value=\"Connexion!\" />
		</form>
		</fieldset>"
		;
			
			}
	include("footer.php");
			
			
	?>
	</html>