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

<?php

	if(isset($_POST['requete']) && $_POST['requete'] != NULL) // on vérifie d'abord l'existence du POST et aussi si la requete n'est pas vide.
	{
		$link=mysqli_connect('localhost','root','root');
		mysqli_select_db($link,'keydb'); // on se connecte à MySQL.
		$requete = htmlspecialchars($_POST['requete']); // on crée une variable $requete pour faciliter l'écriture de la requête SQL.
		$query = mysqli_query($link,"SELECT DISTINCT * FROM logements NATURAL JOIN Photo WHERE Ville LIKE '%$requete%' GROUP BY idLogement ORDER BY idLogement  ") or die (mysqli_error($link));
		$nb_resultats = mysqli_num_rows($query); // on utilise la fonction mysql_num_rows pour compter les résultats 
	if($nb_resultats != 0) // si le nombre de résultats est supérieur à 0, on continue
{
// maintenant, on va afficher les résultats 
?>
	<div id="RechercheMaxou">
		<h3><strong>Résultats de votre recherche.</strong></h3>
		<p>Nous avons trouvé <?php echo $nb_resultats; 
							if($nb_resultats > 1) {echo ' résultats'; } else { echo ' résultat'; } // on vérifie le nombre de résultats pour orthographier correctement. 
							?>
 			dans notre base de données. Voici les maisons que nous avons trouvées:<br/>

	<br/>
	<?php
	while($donnees = mysqli_fetch_array($query)) // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction
{
?>
<div id='encadreResultat'>
 <a  href="voirHabitation.php?search=<?php echo $donnees['idLogement']; ?>"><?php  echo '<p>'.''.'<img width="125px" height="125px" align="left"  src="'.$donnees['Liendelaphoto'].'">'.$donnees['typedelogement'].': <br>'.$donnees['adresse'].'. '.'<br/>
' .$donnees['codePostal'].' '. $donnees['Ville'].'<br/>Description : ' .$donnees['Description'].'<br/>
'.'Capacité : '.$donnees['capacite'].'personnes', '<br/> Nombre de chambres : '.$donnees['chambres'].' chambres'.
'</p>';?> </a><br/>
</div>
<?php
} // fin de la boucle
?>				<br/><br/>
		<p> <a href="index.php">Faire une nouvelle recherche</a></p>

<?php
} // Afficher l'éventuelle erreur.
		else
{ //HTML
			?>
			<div id="RechercheMaxou">
			<h3>Pas de résultats</h3>
			<p>Nous n'avons trouvé aucun résultat pour votre requête "<? echo $_POST['requete']; ?>". <a href="index.php">Réessayez</a> avec autre chose.</p>
		</div>
			<?php

}
mysqli_close($link); // on ferme mysql
}
			else
			{ // HTML
			?> 

			<a id="RechercheMaxou" href="index.php"> Rentre une donnée ici ! </a>

			<?php
}

?>
</div>
<?php include("footer.php"); ?>
	</body>
</html>