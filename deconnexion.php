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
echo "<p>done</p>";
include("footer.php");
?>
</html>
