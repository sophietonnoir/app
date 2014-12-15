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

		if(isset($_POST['prenom']) && isset($_POST['nom']) && isset ($_POST['objet']) && isset($_POST['email']) && isset($_POST['message'])){
			if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['message'])){
				//Exécution si le formulaire est posté et si les champs sont remplis
					

					$nom = $_POST['nom'];
					$prenom =$_POST['prenom'];
					$email = $_POST['email'];
					$objet = $_POST['objet'];
					$message = $_POST['message'];
			
     		

     		echo "$nom" ;
     		echo "$prenom" ;
     		echo "$email" ;
     		echo "$objet" ;
     		echo "$message";
		//maintenant j'ouvre la base de données.

					$link=mysqli_connect("localhost", "root","");
					mysqli_select_db($link,'keydb')or die ("Erreur");

					//on insert les données dans la bdd
					$texte= "INSERT INTO nous_contacter (Nom, Prenom, Email, Objet, Message)VALUES('$nom','$prenom', '$email', '$objet','$message')";
					mysqli_query($link,$texte)	;
						echo 'Votre message a bien été envoyé' ;
					mysqli_close($link);
	}
}
						include("footer.php");
?>	
	</body>
</html>