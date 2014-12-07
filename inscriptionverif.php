 <?php session_start()
 	$bdd = new PDO('mysql:host=localhost;dbname=keydb','root', '');
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
	<?php include ("header.php");
	$sql=$bdd->prepare ('INSERT INTO users(nom, prenom, pays, codepostal, adresse, mail, dateinscription, password, tel, admin, pseudo, nmaison, age, questions, reponses, sexe) VALUES(:nom, :prenom, :pays, :codepostal, :adresse, :mail, :dateinscription, :password, :tel, :admin, :pseudo, :nmaison, :age, :questions, :reponses, :sexe)')
	
	$sql->execute(array(
		'nom' =>$_POST['nom'],
		'prenom' =>$_POST['prenom'],
		'pays' =>$_POST['pays'],
		'codepostal' =>$_POST['codepostal'],
		'adresse' =>$_POST['adresse'],
		'mail' =>$_POST['mail'],
		'dateinscription' =>$_POST['dateinscription'],
		'password' =>$_POST['password'],
		'tel' =>$_POST['tel'],
		'admin' =>$_POST['admin'],
		'pseudo' =>$_POST['pseudo'],
		'nmaison' =>$nmaison,
		'questions' =>$_POST['questions'],
		'reponses' =>$_POST['reponses'],
		'sexe' =>$_POST['sexe']));
		
		
		
		
		
		
		?>
		
		
		
	
	
	
	
	
	
	
	<?php include ("footer.php")?>
	
	
	</body>
	
</html>