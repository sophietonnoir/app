<?php session_start()?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Accueil</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
	</head>

	<body>
		<?php include("header.php"); ?>
<div id="RechercheMaxou">
<?php
		mysql_connect('localhost','root','root');
		mysql_select_db('keydb'); // on se connecte à MySQL.
		$requete = htmlspecialchars($_GET['requete']); // on crée une variable $requete pour faciliter l'écriture de la requête SQL.
		$query = mysql_query("SELECT * FROM logements NATURAL JOIN Photo WHERE Ville LIKE '%$requete%' GROUP BY idLogement ORDER BY dateAjout  ") or die (mysql_error()); 
		
	 while($donnees = mysql_fetch_array($query)) 


echo '<div id="encadreResultat">'.'<a  href="voirHabitation.php?search='.$donnees['idLogement'].'" ><img width="125px" height="125px" align="left"  src="'.$donnees['Liendelaphoto'].'">'. $donnees['Ville'].'.'.$donnees['adresse'].'. '.'<br/>
' .'Code Postal : '.$donnees['codePostal'].'<br/>' .$donnees['Description'].'<br/>
'.'Description générale : '.$donnees['capacite'].'metres carrés, '.$donnees['chambres'].' chambres'.'</div>'.'</a>'; 


mysql_close(); // fin ?> </div>



		<?php include("footer.php"); ?>


	</body>
</html>