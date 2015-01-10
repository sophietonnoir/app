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

<body>

<?php
    if ($_SESSION == NULL):

            echo "<article><br/><br/><br/><br/><h2>Merci de vous connecter !</h2></article>";
    else:

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

              $Pays=$_POST['pays'];

              $animauxPermis = $_POST['animauxPermis'];

               $piscine = $_POST['piscine'];

               $placesGarage = $_POST['placesGarage'];

              $wifi = $_POST['wifi'];

              $jardin= $_POST['jardin'];
                

        $erreurVide=NULL;
        $erreurCP="erreur";
        $erreurS="erreur";
        $erreurC="erreur";

     if (($_POST['adresse'] == '')||($_POST['codePostal'] == '')||($_POST['Ville'] == '')||($_POST['surface'] == '')||($_POST['fumerPermis'] == '')||($_POST['animauxPermis'] == '')||($_POST['piscine'] == '')||($_POST['Description'] == '')||($_POST['capacite'] == '')){
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
                                       
                                        echo "<article><br/><br/><br/><br/><h2>ATTENTION ! <br/><br/> Vérifiez votre code postal </h2></article>";
                                        

                                    }


                }
               if (isset($_POST['surface'])) {
                                     $_POST['surface'] = htmlspecialchars($_POST['surface']);
                                    
                                     if (is_numeric($_POST['surface'])){
                                         $erreurS = NULL;
                                     }
                                     else {
                                       
                                         echo "<article><br/><br/><br/><br/><h2>ATTENTION ! <br/><br/> Vérifiez votre surface</h2></article>";
                                         

                                     }
               }
               
               if (isset($_POST['capacite'])){
                    $_POST['capacite'] = htmlspecialchars($_POST['capacite']);
                    if(is_numeric($_POST['capacite'])) {
                        $erreurC= NULL;
                     
                    }
                    else{
                        echo "<article><br/><br/><br/><br/><h2>ATTENTION ! <br/><br/> Vérifiez votre capacité</h2></article>";
                        
                    }
               }
               
               


     }




    if(($erreurCP==NULL)&&($erreurS==NULL)&&($erreurC==NULL)&&($erreurVide==NULL)) {



                        $sqlLogement="INSERT INTO logements (idPropietaire, typedelogement , Pays , Ville , adresse , codePostal , Description , chambres , toilettes , surface, capacite , fumerPermis , animauxPermis , piscine , placesGarage , wifi, jardin ) VALUES ('$idPropietaire','$Typedelogement','$Pays', '$Ville', '$Adresse', '$codePostal', '$Description', '$chambres', '$toilettes', '$surface', '$capacite', '$fumerPermis', '$animauxPermis', '$piscine','$placesGarage', '$wifi', '$jardin')";
                          $result = mysqli_query($link, $sqlLogement);
                          $queryidLogement = mysqli_query($link,"SELECT idLogement FROM logements WHERE adresse='$Adresse' " ) or die (mysqli_error($link));
                          $donneesLog=mysqli_fetch_array($queryidLogement);

                          $idLog= $donneesLog['idLogement'];
                  

                           


                ?>
                              <article><br/><br/><br/>
                                  <h2> Ajouter des photos
                                      <br/><br/>
                                      <form>
                                          <input type="button" value="Continuer" OnClick="window.location.href='form.php?add=<?php echo $Adresse ?>'"/>
                                      </form>
                                  </h2></article>
                  <?php



                  }


else {
    echo "<article><br/><br/><br/><br/><h2><a href='ajouterlogement.php'>Retour</a></h2></article>";
}

                 

             


                //On ferme la connexion

                mysqli_close($link);

endif;
?>


</body>

</html>

