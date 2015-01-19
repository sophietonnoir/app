<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Backoffice</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
		<link rel="stylesheet" href="connexion.css" />
	</head>

	<body>
<?php
include("header.php"); ?>

<?php
include("modelsearchprof.php"); ?>
	
	<div id="searchprofil">
		<?php
if (!isset($auth['id']))
{
echo ("ce pseudo n'existe pas");
}
else
{
include("vueactionprofil.php");
}
?> 
<?php include("footer.php"); ?>
</body>
</html>