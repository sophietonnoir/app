<?php


//Connexion à la base de donnée

$bdd = 'keydb';

$host = "localhost" ;

$user = "root" ;

$mdp = "root" ;

$link = mysqli_connect($host, $user, $mdp) ;


mysqli_select_db($link, $bdd) or die("Erreur de connexion à la base de donnée" );

// ***** ici on récupère les données et on les stocke dans mysql
$Liendelaphoto = $_POST['Liendelaphoto'];


//******* On renomme l'image de manière aléatoire pour éviter un conflit dans le dossier (2 fois le même nom par exemple
$dir = 'images/';
$ext = strtolower( pathinfo($_FILES['image']['Liendelaphoto'], PATHINFO_EXTENSION) );
$file=uniqid().'.'.$ext;

 //**** on bouge l'image
move_uploaded_file($_FILES['image']['tmp_name'], $dir.$file);

$photo = $file;

// on enregistre les données
$result = mysqli_query("INSERT INTO Photo VALUES 
(
 '',
'".mysqli_real_escape_string($Liendelaphoto)."',

)
");
//Si il y a une erreur, on crie ^^
if (!$result) {
 die('Requête invalide : ' . mysqli_error());
}
// on ferme la connection mysql donc ci-dessous plus de sql
mysqli_close($link);
?>