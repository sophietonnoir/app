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

      $adresse=$_GET['ad'];

      $queryidLogement = mysqli_query($link,"SELECT idLogement FROM logements WHERE adresse='$adresse' " ) or die (mysqli_error($link));
      $donneesLog=mysqli_fetch_array($queryidLogement);
      $idLog= $donneesLog['idLogement'];


      $sqlPhoto="INSERT INTO Photo(idLogement,Liendelaphoto) VALUES ('$idLog','$route')";
       $result2=mysqli_query($link, $sqlPhoto);


  }

                 $name=$_FILES['monfichier1']['name'];
                $type=$_FILES['monfichier1']['type'];
                $size=$_FILES['monfichier1']['size'];
                $temp=$_FILES['monfichier1']['tmp_name'];
                $error=$_FILES['monfichier1']['error'];
             
  if ($error > 0)
      die ("ERREUR");
  else
  {
      move_uploaded_file($temp, "../tmp/".$name);
      $route="../tmp/".$name;

      $adresse=$_GET['ad'];
     
      $queryidLogement = mysqli_query($link,"SELECT idLogement FROM logements WHERE adresse='$adresse' " ) or die (mysqli_error($link));
      $donneesLog=mysqli_fetch_array($queryidLogement);
      $idLog= $donneesLog['idLogement'];


      $sqlPhoto="INSERT INTO Photo(idLogement,Liendelaphoto) VALUES ('$idLog','$route')";
       $result2=mysqli_query($link, $sqlPhoto);
      
     
  }

  $name=$_FILES['monfichier2']['name'];
                $type=$_FILES['monfichier2']['type'];
                $size=$_FILES['monfichier2']['size'];
                $temp=$_FILES['monfichier2']['tmp_name'];
                $error=$_FILES['monfichier2']['error'];

  if ($error > 0)
      die ("ERREUR");
  else
  {
      move_uploaded_file($temp, "../tmp/".$name);
      $route="../tmp/".$name;

      $adresse=$_GET['ad'];

      $queryidLogement = mysqli_query($link,"SELECT idLogement FROM logements WHERE adresse='$adresse' " ) or die (mysqli_error($link));
      $donneesLog=mysqli_fetch_array($queryidLogement);
      $idLog= $donneesLog['idLogement'];


      $sqlPhoto="INSERT INTO Photo(idLogement,Liendelaphoto) VALUES ('$idLog','$route')";
       $result2=mysqli_query($link, $sqlPhoto);


  }

echo '<article><br/><br/><br/><br/><br/><h2>Votre logement a bien été ajouté. </h2></article>';
  



include("footer.php"); ?>

</body>

</html>


