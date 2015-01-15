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
                    <legend> Modifier un logement: </legend>
<?php

                                    //Connexion à la base de donnée

                               $bdd = 'keydb';

                                $host = "localhost" ;

                                $user = "root" ;

                              $mdp = "root" ;

                              $link = mysqli_connect($host, $user, $mdp) ;

                               mysqli_select_db($link, $bdd) or die("Erreur de connexion à la base de donnée" );









                                //On récupere les valeurs du formulaire
              $idPropietaire= $_SESSION['id'];


              $Typedelogement = $_POST['typedelogement'];

               $Adresse = $_POST['adresse'];

               $codePostal = $_POST['codePostal'];

              $Ville = $_POST['Ville'];

              $Pays = $_POST['Pays'];

              $Description = $_POST['Description'];

              $chambres = $_POST['chambres'];

              $toilettes = $_POST['toilettes'];

              $surface = $_POST['surface'];

              $capacite = $_POST['capacite'];

              $fumerPermis = $_POST['fumerPermis'];

              

              $animauxPermis = $_POST['animauxPermis'];

               $piscine = $_POST['piscine'];

               $placesGarage = $_POST['placesGarage'];

              $wifi = $_POST['wifi'];

              $jardin= $_POST['jardin'];


        $erreurVide=NULL;
        $erreurCP="erreur";
        $erreurS="erreur";
        $erreurC="erreur";

     if (($_POST['adresse'] == '')||($_POST['codePostal'] == '')||($_POST['Ville'] == '')||($_POST['surface'] == '')||($_POST['fumerPermis'] == '')||($_POST['animauxPermis'] == '')||($_POST['piscine'] == '')||($_POST['Description'] == '')||($_POST['capacite'] == '')||($_POST['Pays'] == '')){
                            $erreurVide="erreur";
                       echo "<article><br/><br/><br/><br/><h2>Merci de renseigner tous les champs du formulaire !</h2></article>";


     }
     else{
             if (isset($_POST['codePostal'])) {
                                    $_POST['codePostal'] = htmlspecialchars($_POST['codePostal']);
                                    if (preg_match(" #^[0-9]{5,5}$# ", $_POST['codePostal'])) {
                                        $erreurCP = NULL;



                                    }
                                    else {

                                        echo "<article><br/><br/><br/><br/><h2> Vérifiez votre code postal </h2></article>";


                                    }


                }
               if (isset($_POST['surface'])) {
                                     $_POST['surface'] = htmlspecialchars($_POST['surface']);

                                     if (is_numeric($_POST['surface'])){
                                         $erreurS = NULL;
                                     }
                                     else {

                                         echo "<article><br/><br/><br/><br/><h2> Vérifiez votre surface</h2></article>";


                                     }
               }

               if (isset($_POST['capacite'])){
                    $_POST['capacite'] = htmlspecialchars($_POST['capacite']);
                    if(is_numeric($_POST['capacite'])) {
                        $erreurC= NULL;

                    }
                    else{
                        echo "<article><br/><br/><br/><br/><h2> Vérifiez votre capacité</h2></article>";

                    }
               }




     }




    if(($erreurCP==NULL)&&($erreurS==NULL)&&($erreurC==NULL)&&($erreurVide==NULL)) {

$idLog=$_GET['logement'];

                        $sqlLogement="UPDATE logements SET idPropietaire='$idPropietaire', typedelogement='$Typedelogement', Pays='$Pays', Ville='$Ville', adresse='$Adresse', codePostal='$codePostal', Description='$Description', chambres='$chambres', toilettes='$toilettes', surface='$surface', capacite='$capacite', fumerPermis='$fumerPermis', animauxPermis='$animauxPermis', piscine='$piscine', placesGarage='$placesGarage', wifi='$wifi', jardin='$jardin' WHERE idLogement=$idLog";
                          $result = mysqli_query($link, $sqlLogement);
                          

                        
                          echo "<br/><br/><article><h2>Logement modifié.</h2></article>";
 }

 else {
    echo "<article><br/><br/><br/><br/><h2><a href='ajouterlogement.php'>Retour</a></h2></article>";
}

                 //On ferme la connexion

                mysqli_close($link);


                                ?>
                               		</fieldset>



		<?php
                endif;

                include("footer.php"); ?>
	</body>

</html>