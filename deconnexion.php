<?php session_start();?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Accueil</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
	</head>
<?php
$_SESSION = array();
session_destroy();
include("header.php");
echo "<div id=\"dernier_ajout\"><ul><li>Vous avez été déconnecté</li></ul></div>";
include("footer.php");
?>
</html>
