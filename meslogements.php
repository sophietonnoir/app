<?php session_start()?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Mes logements</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
                 <style type="text/css">a:link{text-decoration:none}</style>
	</head>

	<body>
		<?php include("header.php"); ?>

<?php


      
        if ($_SESSION == NULL):

            echo "<article><br/><br/><br/><br/><h2>Merci de vous connecter !</h2></article>";
    else:
        
        $bdd = 'keydb';

        $host = "localhost" ;

        $user = "root" ;

        $mdp = "root" ;

        $link = mysqli_connect($host, $user, $mdp) ;

        $idPropietaire= $_SESSION['id'];
        
        
        mysqli_select_db($link,$bdd )or die("Erreur de connexion à la base de donnée" ); // on se connecte à MySQL.
        //j obtient le idPropietaire du client connecté
        
        
        $sql ="SELECT DISTINCT * FROM logements NATURAL JOIN Photo WHERE idPropietaire= ".$idPropietaire." GROUP BY idLogement";
        $req= mysqli_query($link,$sql)  or die (mysqli_error());
        $nb = mysqli_num_rows($req); // on utilise la fonction mysql_num_rows pour compter les résultats
	if($nb != 0) // si le nombre de maisons est supérieur à 0, on continue
        {
// maintenant, on va afficher les maisons
?>
            <div> <p> Vous avez <?php echo $nb;
                    if($nb > 1) {echo ' logements'; } else { echo ' logement'; } // on vérifie le nombre de résultats pour orthographier correctement.
							?>
 			:<br/>

	<br/>
                </p>
            </div>

	<?php
$lien=$donnees['Liendelaphoto'];

        while($donnees = mysqli_fetch_array($req))   {

   echo '<div id="encadreresultat">'.'<a  href="voirHabitation.php?search='.$donnees['idLogement'].'" ><img width="300px" height="300px" align="left"  src="'.$donnees['Liendelaphoto'].'">'. $donnees['Ville'].' '.'<br/>
' .'Code Postal : '.$donnees['codePostal'].'<br/>' .$donnees['Description'].'<br/>
'.'Description générale : '.$donnees['capacite'].'metres carrés, '.$donnees['chambres'].' chambre(s)'.'</a><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></div>';



 ?>

           


 <?php
        
        
   }
        }
else
{
   ?> <h2 style="margin-left:200px; color: #2980B9; ">Vous n'avez aucune maison</h2>
   <?php
   }

   mysqli_close ($link);
     




endif
   ?>
 
           <?php include("footer.php"); ?>
        </body>
</html>