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
		include("Bdd.php");

		if(isset($_POST['notesA']))
		{
				//Exécution si le formulaire est posté et si les champs sont remplis
					

					$nom = $_POST['notesA'];
			
     	echo $nom;	
		//maintenant j'ouvre la base de données.

					//$link=mysqli_connect("localhost", "root","");
					//mysqli_select_db($link,'keydb')or die ("Erreur");

					//on insert les données dans la bdd
					$sql=$bdd->prepare("INSERT INTO  keydb.notation_maison(note) VALUES(:nom)")	;
					$sql->execute(array('nom'=>$nom));
						echo 'Merci, votre note a bien été prise en compte.' ;
				
	}

						include("footer.php");
?>	
	</body>
</html>