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

$bdd = 'keydb';


    /*ICI J' obtiens les donnee des photos*/
    $host = "localhost" ;

    $user = "root" ;

    $mdp = "root" ;

    $link = mysqli_connect($host, $user, $mdp) ;

    mysqli_select_db($link, $bdd) or die("Erreur de connexion à la base de donnée" );



    $name=$_FILES['monfichier']['name'];
    $type=$_FILES['monfichier']['type'];
    $size=$_FILES['monfichier']['size'];
    $temp=$_FILES['monfichier']['tmp_name'];
    $error=$_FILES['monfichier']['error'];



   if ($error > 0)
      die ("ERREUR");
  else
  {
      move_uploaded_file($temp, "../tmp/".$name);
      $route="../tmp/".$name;
      $route=addslashes($route);
   
  }

    $name2=$_FILES['monfichier1']['name'];
    $type=$_FILES['monfichier1']['type'];
    $size=$_FILES['monfichier1']['size'];
    $temp=$_FILES['monfichier1']['tmp_name'];
    $error=$_FILES['monfichier1']['error'];
             
  if ($error > 0)
      die ("ERREUR");
  else
  {
      move_uploaded_file($temp, "../tmp/".$name2);
      $route2="../tmp/".$name2;
      $route2=addslashes($route2);
     
  }

                $name3=$_FILES['monfichier2']['name'];
                $type=$_FILES['monfichier2']['type'];
                $size=$_FILES['monfichier2']['size'];
                $temp=$_FILES['monfichier2']['tmp_name'];
                $error=$_FILES['monfichier2']['error'];

  if ($error > 0)
      die ("ERREUR");
  else
  {
      move_uploaded_file($temp, "../tmp/".$name3);
      $route3="../tmp/".$name3;
      $route3=addslashes($route3);

  }


  //ICI J' obiens les donnees du formulaire

  if(($name=='')||($name2=='')||($name3=='')){
          echo "<article><br/><br/><br/><br/><h2>ATTENTION ! <br/><br/> Ajoutez au moins trois photos!</h2></article>";

  }

  else{

       $idPropietaire= $_SESSION['id'];

      $Typedelogement = $_GET['typedelogement'];

       $Adresse = $_GET['adresse'];

       $codePostal = $_GET['codePostal'];

      $Ville = $_GET['Ville'];

      $Description = $_GET['Description'];

      $chambres = $_GET['chambres'];

      $toilettes = $_GET['toilettes'];

      $surface = $_GET['surface'];

      $capacite = $_GET['capacite'];

      $fumerPermis = $_GET['fumerPermis'];

      $Pays=$_GET['Pays'];

      $animauxPermis = $_GET['animauxPermis'];

       $piscine = $_GET['piscine'];

       $placesGarage = $_GET['placesGarage'];

      $wifi = $_GET['wifi'];

      $jardin= $_GET['jardin'];





        $erreurVide=NULL;
        $erreurCP="erreur";
        $erreurS="erreur";
        $erreurC="erreur";

     if (($_GET['adresse'] == '')||($_GET['codePostal'] == '')||($_GET['Ville'] == '')||($_GET['surface'] == '')||($_GET['fumerPermis'] == '')||($_GET['animauxPermis'] == '')||($_GET['piscine'] == '')||($_GET['Description'] == '')||($_GET['capacite'] == '')||($_GET['Pays'] == '')){
                            $erreurVide="erreur";
                       echo "<article><br/><br/><br/><br/><h2>Merci de renseigner tous les champs du formulaire !</h2></article>";


     }
     else{
             if (isset($_GET['codePostal'])) {
                                    $_GET['codePostal'] = htmlspecialchars($_GET['codePostal']);
                                    if (preg_match(" #^[0-9]{5,5}$# ", $_GET['codePostal'])) {
                                        $erreurCP = NULL;



                                    }
                                    else {

                                        echo "<article><br/><br/><br/><br/><h2>ATTENTION ! <br/><br/> Vérifiez votre code postal </h2></article>";


                                    }


                }
               if (isset($_GET['surface'])) {
                                     $_GET['surface'] = htmlspecialchars($_GET['surface']);

                                     if (is_numeric($_GET['surface'])){
                                         $erreurS = NULL;
                                     }
                                     else {

                                         echo "<article><br/><br/><br/><br/><h2>ATTENTION ! <br/><br/> Vérifiez votre surface</h2></article>";


                                     }
               }

               if (isset($_GET['capacite'])){
                    $_GET['capacite'] = htmlspecialchars($_GET['capacite']);
                    if(is_numeric($_GET['capacite'])) {
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



                  $queryidLogement = mysqli_query($link,"SELECT idLogement FROM logements WHERE adresse='$Adresse' " ) or die (mysqli_error($link));
                  $donneesLog=mysqli_fetch_array($queryidLogement);
                  $idLog= $donneesLog['idLogement'];

                 


                  $sqlPhoto1="INSERT INTO Photo(idLogement,Liendelaphoto) VALUES ('$idLog','$route')";
                   $result1=mysqli_query($link, $sqlPhoto1);
                   
                  $sqlPhoto2="INSERT INTO Photo(idLogement,Liendelaphoto) VALUES ('$idLog','$route2')";
                   $result2=mysqli_query($link, $sqlPhoto2);



                  $sqlPhoto3="INSERT INTO Photo(idLogement,Liendelaphoto) VALUES ('$idLog','$route3')";
                   $result3=mysqli_query($link, $sqlPhoto3);






                echo '<article><br/><br/><br/><br/><br/><h2>Votre logement a bien été ajouté. </h2></article>';
  

      }
       else {

          echo "<article><br/><br/><br/><br/><h2><a href='ajouterlogement.php'>Retour</a></h2></article>";

       }

      

  }




  mysqli_close($link);



include("footer.php"); ?>

</body>

</html>


