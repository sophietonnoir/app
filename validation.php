<?php Session_start() ?>
<?php 
if (isset($_GET['id']) and isset($_GET['cle'])
{

$id=$_GET['id'];
$cle=$_GET['cle'];

$bdd=new PDO ("localhost","dbname=keydb","root","");
$sql=$bdd->prepare("SELECT cle,id,activ FROM keydb.user WHERE id= :id ");
$sql->execute(array('id'=>$id;));
$respons=$sql->fetch();

	if ($respons['cle']==$cle and $respons['activ']==0)
	{
	$sql=$bdd->prepare("UPDATE keydb.user SET activ=1 WHERE id=:id")
	$sql->execute(array('id'=>$id;));
	echo("votre compte a bien été activé <a href= \"connexion.php\">connectez-vous</a>")

	}
	else
	{
	echo('mauvaise clé ou compte déja actif')
	}
}
else
{
	echo ("erreur");
}
