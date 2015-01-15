<?php session_start()?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Modifier un logement</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />


	</head>


	<body>
              <?php include("header.php");


              if ($_SESSION == NULL):
                     echo "<article><br/><br/><br/><br/><h2>Merci de vous connecter !</h2></article>";
              else: ?>
		<fieldset class="fieldset2">
                    <legend> Supprimer un logement: </legend>





                              <?php

                                    //Connexion à la base de donnée

                               $bdd = 'keydb';

                                $host = "localhost" ;

                                $user = "root" ;

                              $mdp = "root" ;

                              $link = mysqli_connect($host, $user, $mdp) ;

                               mysqli_select_db($link, $bdd) or die("Erreur de connexion à la base de donnée" );

                               


if (isset($_GET['logement'])) {

$res = mysqli_query("DELETE from logements WHERE idLogement= '".$_GET['logement']."'");
$res = @mysqli_query("DELETE from Photo WHERE idLogement = '".$_GET['logement']."'");

echo 'Votre logement a été supprimé';

}





?>


                </fieldset>
 <?php
		
                endif;

              include("footer.php"); ?>
	</body>

</html>
