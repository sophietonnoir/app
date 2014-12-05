

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Ajouter un logement</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
		<link rel="stylesheet" href="connexion.css" />
	</head>


        <body>
            <?php

// on se connecte à MySQL
$db = mysql_connect('localhost', 'root', 'root');

// on sélectionne la base
mysql_select_db('keydb',$db);

if (isset($_POST['ville']) AND isset($_POST['pays']))
 {
 $ville = htmlentities($_POST['ville']);
 $pays = htmlentities($_POST['pays']);

 if (empty($ville))
 {
  echo ("Saisissez la ville");
  exit();
 }
 if (empty($pays))
 {
  echo ("Saisissez le pays");
  exit();
 }

  mysql_query ("Insert INTO logements VALUES ('', ' " .$ville. " ', ' " .$pays. " ')");
 }
 mysql_close();
 echo 'Votre logement a bien été ajouté.';
 ?>