<!DOCTYPE html>
<?php session_start() ?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Forum </title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
	</head>
	
	
	<body>
<div>
	The Forum
</div>

<?php
include("header.php");
$bdd = 'keydb';
$pseudo = $_POST["pseudo"];
$message = $_POST["message"];
$date = $_POST["date"];
                                $host = "localhost" ;
                                $user = "root" ;
                              $mdp = "root" ;
                              $link = mysqli_connect($host, $user, $mdp) ;
                               mysqli_select_db($link, $bdd) or die("Erreur de connexion à la base de donnée" );
                               echo
                                $query = mysqli_query($link, "INSERT INTO forum VALUES('$pseudo', '$message', '$date')") or die (mysqli_error($link));
?>
<div>
Votre message a bien été envoyé
</div>
		<?php include("footer.php"); ?>
	</body>