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

        $text0= "SELECT * FROM criteres";
        $query = mysqli_query($link,$text0) or die (mysqli_error($link));

        $premiereFois=0;
        $idPropietaire=$_SESSION['id'];
        $insert="INSERT INTO logements ( idPropietaire ";
        $values=" VALUES ( "." ' ".$idPropietaire." ' ";

        while($donnees0=mysqli_fetch_array($query)){

            $variable=$donnees0['nom'];

            $valeur=($_GET[$variable]);

            
                $insert=$insert.' , '.$variable;
                $values=$values." , ' ".$valeur." ' ";
           
        }


            $insert=$insert." ) ";
            $values=$values." ) ";


            $text=$insert.$values;
         
           
            $result = mysqli_query($link,$text);

            $adresse = addslashes(  $_GET['adresse'] );



              $queryidLogement = mysqli_query($link,"SELECT idLogement FROM logements WHERE adresse='$adresse' " ) or die (mysqli_error($link));
              $donneesLog=mysqli_fetch_array($queryidLogement);
              $idLog= $donneesLog['idLogement'];






                  $sqlPhoto1="INSERT INTO Photo(idLogement,Liendelaphoto) VALUES ('$idLog','$route')";
                   $result1=mysqli_query($link, $sqlPhoto1);

                  $sqlPhoto2="INSERT INTO Photo(idLogement,Liendelaphoto) VALUES ('$idLog','$route2')";
                   $result2=mysqli_query($link, $sqlPhoto2);



                  $sqlPhoto3="INSERT INTO Photo(idLogement,Liendelaphoto) VALUES ('$idLog','$route3')";
                   $result3=mysqli_query($link, $sqlPhoto3);






                echo '<article><br/><br/><br/><br/><br/><h2>Votre logement a bien été ajouté. </h2></article>';
  /*

      }
       else {

          echo "<article><br/><br/><br/><br/><h2><a href='ajouterlogement.php'>Retour</a></h2></article>";

       }
*/


  }




  mysqli_close($link);



include("footer.php"); ?>

</body>

</html>

