<?php
 	session_start();
	$admin=0;
	$nmaison=0;
	include('Bdd.php');
?>
 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - verif inscriprtion</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
		

	</head>
	
	
	<body>
	<?php
	$sql1 = $bdd->prepare('SELECT * FROM users WHERE pseudo= :pseudo');
	$sql1->execute(array(
	'pseudo'=> $_POST['pseudo']));
	$auth=$sql1->fetch();
	
	
if (isset($auth['id']))
{
echo ("le pseudo existe déjà");
}
else
{
		if ($_POST['password1']!=$_POST['password2'])
		{
		echo ('les mots de passe ne correspondent pas');
		}
	
		else
	
		{
		$sql = $bdd->prepare ("UPDATE keydb.users SET nom=:nom, prenom=:prenom, mail=:mail, password=:password, pseudo=:pseudo, questions=:questions, reponses=:reponses, sexe=:sexe, tel=:tel, codepostal=:codepostal, adresse=:adresse, pays=:pays WHERE id= :id");
		$sql->execute(array(
		'nom' =>htmlspecialchars($_POST['nom']),
		'prenom' =>htmlspecialchars($_POST['prenom']),
		'pays' =>htmlspecialchars($_POST['pays']),
		'codepostal' =>htmlspecialchars($_POST['codepostal']),
		'adresse' =>htmlspecialchars($_POST['adresse']),
		'mail' =>htmlspecialchars($_POST['mail']),
		//'dateinscription' =>current_timestamp,
		'password' =>htmlspecialchars($_POST['password1']),
		'tel' =>htmlspecialchars($_POST['tel']),
		'pseudo' =>htmlspecialchars($_POST['pseudo']),
		'questions' =>htmlspecialchars($_POST['question']),
		'reponses' =>htmlspecialchars($_POST['questionsecrete']),
		'id'=>$_SESSION['id'],
		'sexe' =>htmlspecialchars($_POST['sex'])));
		
		echo "<div id=\"dernier_ajout\"><ul><li>Vos informations personnelles ont bien été modifiées</li></ul></div>";
		
	
		}
}
	?>
	</body>
	
</html>