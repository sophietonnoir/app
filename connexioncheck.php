<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Accueil</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
	</head>
<?php include("header.php");

	$bdd = new PDO('mysql:host=localhost;dbname=keydb','root', '');


$sql = $bdd->prepare('SELECT * FROM users WHERE mail= :mail AND password= :pass');
$sql->execute(array(
	'mail'=> $_POST['mail'],
	'pass'=> $_POST['password']));
	
$auth=$sql->fetch();

if (!$auth)
{
echo "<p>erreur404</p>";
}
else
{
echo "<p>succes</p>";
$_SESSION['id']=$auth['id'];
$_SESSION['pseudo']=$auth['pseudo'];
$_SESSION['admin']=$auth['admin'];

}
include("footer.php"); ?>
</html>