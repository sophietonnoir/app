<?php session_start()?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Mes logements</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
	</head>

	<body>
		<?php include("header.php"); ?>

<?php

$bdd = 'keydb';

$host = "localhost" ;

$user = "root" ;

$mdp = "root" ;

$link = mysqli_connect($host, $user, $mdp) ;

		mysqli_select_db($link,$bdd )or die("Erreur de connexion à la base de donnée" ); // on se connecte à MySQL.
		
		$sql = 'SELECT * FROM logements NATURAL JOIN users WHERE idPropietaire = id  GROUP BY idLogement ORDER BY idLogement';
		$req= mysqli_query($link,$sql)  or die ('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());;
// on recupere le resultat sous forme d'un tableau
$data = mysqli_fetch_array($req);

// on libère l'espace mémoire alloué pour cette interrogation de la base
mysqli_free_result ($req);
mysqli_close ($link);
?>

Le numéro de téléphone de LA GLOBULE est :<br />
<?php 
        echo $data['adresse'];
        ?>
               
           
        </body>
</html>