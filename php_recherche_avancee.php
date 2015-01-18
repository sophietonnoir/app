<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8" />
    <meta charset="utf-8" />
        <link rel="stylesheet" href="K2K.css" />
        <link rel="icon" type="image/gif" href="Img/icone.gif" />
         <style type="text/css">a:link{text-decoration:none}</style>
    <title>Recherhe</title>
</head>

<body>

              <?php include("header.php");


             ?>


<?php


		$link=mysqli_connect('localhost','root','root');
		mysqli_select_db($link,'keydb'); // on se connecte à MySQL.
		$typedelogement = htmlspecialchars($_POST['typedelogement']);  // on crée une variable $requete pour faciliter l'écriture de la requête SQL.
		$placesGarage = htmlspecialchars($_POST['placesGarage']); 
		$pays = htmlspecialchars($_POST['pays']);
		$animauxPermis = htmlspecialchars($_POST['animauxPermis']);
		$fumerPermis=htmlspecialchars($_POST['fumerPermis']);
		$codePostal=htmlspecialchars($_POST['codePostal']);
		$Ville=htmlspecialchars($_POST['Ville']);
		$surface=htmlspecialchars($_POST['surface']);
		$capacite=htmlspecialchars($_POST['capacite']);
		$chambres=htmlspecialchars($_POST['chambres']);
		$piscine=htmlspecialchars($_POST['piscine']);
		$wifi=htmlspecialchars($_POST['wifi']);
		$jardin=htmlspecialchars($_POST['jardin']);





			$query = mysqli_query($link,"SELECT * FROM logements NATURAL JOIN Photo WHERE typedelogement='$typedelogement' AND placesGarage='$placesGarage' AND pays='$pays'  AND Ville LIKE '%$Ville%' AND capacite LIKE '%$capacite%' AND animauxPermis='$animauxPermis' AND
				fumerPermis='$fumerPermis' AND jardin='$jardin' AND wifi='$wifi' AND piscine='$piscine' AND chambres='$chambres' GROUP BY idLogement ORDER BY dateAjout   ") or die (mysqli_error($link));
			$nb_resultats = mysqli_num_rows($query); // on utilise la fonction mysql_num_rows pour compter les résultats
	if($nb_resultats != 0) // si le nombre de résultats est supérieur à 0, on continue
{
?>
	<div id="RechercheMaxou">
		<h3><strong>Résultats de votre recherche.</strong></h3>
		<p>Nous avons trouvé <?php echo $nb_resultats;
							if($nb_resultats > 1) {echo ' résultats'; } else { echo ' résultat'; } // on vérifie le nombre de résultats pour orthographier correctement.
							?>
 			dans notre base de données. Voici les maisons que nous avons trouvées:<br/>

	<br/> </div>
	<?php
	while($donnees = mysqli_fetch_array($query)) // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction
{
echo '<div id="encadreresultat">'.'<a  href="voirHabitation.php?search='.$donnees['idLogement'].'" ><img width="300px" height="300px" align="left"  src="'.$donnees['Liendelaphoto'].'">'. $donnees['Ville'].' '.'<br/>
' .'Code Postal : '.$donnees['codePostal'].'<br/>' .$donnees['Description'].'<br/>
'.'Description générale : '.$donnees['capacite'].'personnes, '.$donnees['surface'].'metres carres,'.$donnees['chambres'].' chambre(s)'.'</a><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></div>';




}


 // fin de la boucle  ?>
			<br/><br/>
		<p> <a href="recherche_avancee.php">Faire une nouvelle recherche</a></p>

<?php
} // Afficher l'éventuelle erreur.
		else
{ //HTML
			?>
			<div id="RechercheMaxou">
			<h3>Pas de résultats</h3>
			<p>Nous n'avons trouvé aucun résultat pour votre requête . <a href="recherche_avancee.php">Réessayez</a> avec autre chose.</p>
		</div>
			<?php

}
            mysqli_close($link); // on ferme mysql






                include("footer.php"); ?> 


</body>
</html>
