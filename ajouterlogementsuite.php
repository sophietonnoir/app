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

              

              $Description = addslashes($_POST['Description']);

              $chambres = addslashes($_POST['chambres']);

              $toilettes = addslashes($_POST['toilettes']);

              $surface = addslashes($_POST['surface']);

              $capacite = addslashes($_POST['capacite']);

              $fumerPermis =addslashes($_POST['fumerPermis']);

              $Pays=addslashes($_POST['Pays']);

              $animauxPermis = addslashes($_POST['animauxPermis']);

               $piscine = addslashes($_POST['piscine']);

               $placesGarage = addslashes($_POST['placesGarage']);

              $wifi = addslashes($_POST['wifi']);

              $jardin= addslashes($_POST['jardin']);
                



                ?>
                              <article><br/><br/><br/>
                                  <h2> Ajouter des photos </h2> </article>
                                      <br/><br/>
                                      

                                      <form enctype="multipart/form-data" action="upload.php?adresse=<?php echo $Adresse;?>&typedelogement=<?php echo $Typedelogement; ?>&codePostal=<?php echo $codePostal;?>&Ville=<?php echo $Ville;?>&Pays=<?php echo $Pays;?>&Description=<?php echo $Description;?>&chambres=<?php echo $chambres;?>&toilettes=<?php echo $toilettes;?>&surface=<?php echo $surface;?>&capacite=<?php echo $capacite;?>&fumerPermis=<?php echo $fumerPermis;?>&animauxPermis=<?php echo $animauxPermis;?>&piscine=<?php echo $piscine;?>&placesGarage=<?php echo $placesGarage;?>&wifi=<?php echo $wifi;?>&jardin=<?php echo $jardin;?>" method="post">

                        <input  type="file" name="monfichier" id="monfichier"/>

                        <input type="file" name="monfichier1" id="monfichier1"/>

                        <input type="file" name="monfichier2" id="monfichier1"/>


                        <br/><br>
                                <input type="submit" value="Continuer"/>

                                      </form>
                                  
                  <?php



                



                 

             


                //On ferme la connexion

                mysqli_close($link);

endif;
?>


</body>

</html>

