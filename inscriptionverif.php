<?php
 	include("Bdd.php");
	$admin=0;
	$nmaison=0;
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
	if ($_POST['password1']!=$_POST['password2'])
	{
	echo ('les mots de passe ne correspondent pas');
	}
	
	else
	
	{
	$sql = $bdd->prepare ('INSERT INTO users(nom, prenom, mail, password, pseudo, questions, reponses, sexe, nmaison, tel, codepostal, adresse, pays, admin) VALUES(:nom, :prenom, 
	:mail, :password, :pseudo, :questions, :reponses, :sexe, :nmaison, :tel, :codepostal, :adresse, :pays, :admin)');
	
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
		'admin' =>$admin,
		'pseudo' =>htmlspecialchars($_POST['pseudo']),
		'questions' =>htmlspecialchars($_POST['question']),
		'nmaison'=>$nmaison,
		'reponses' =>htmlspecialchars($_POST['questionsecrete']),
		'sexe' =>htmlspecialchars($_POST['sex'])));
		
		echo "<div id=\"dernier_ajout\"><ul><li>Vous êtes maintenant inscrit, vous pouvez vous connecter</li></ul></div>";
		
	
	}
	?>
	</body>
	
</html>