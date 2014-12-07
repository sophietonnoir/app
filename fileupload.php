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
		<?php include("header.php"); ?>

<body>

<?php

//Connexion à la base de donnée

$bdd = 'keydb';

$host = "localhost" ;

$user = "root" ;

$mdp = "root" ;

$link = mysqli_connect($host, $user, $mdp) ;


mysqli_select_db($link, $bdd) or die("Erreur de connexion à la base de donnée" );


//On récupere les valeurs du formulaire

$monfichier = $_POST['monfichier'];
$monfichier1 = $_POST['monfichier1'];

$sql="INSERT INTO Photo(Liendelaphoto) VALUES ('$monfichier')";
$sql="INSERT INTO Photo(Liendelaphoto) VALUES ('$monfichier1')";

$result = mysqli_query($link, $sql);


//On ferme la connexion

mysqli_close($link);


?>


</body>

</html>
