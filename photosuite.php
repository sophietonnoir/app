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

             $idlog=$_GET['log']; ?>

<?php


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

       $sqlPhoto4="INSERT INTO Photo(idLogement,Liendelaphoto) VALUES ('$idlog','$route')";
                   $result4=mysqli_query($link, $sqlPhoto4);

     echo '<article><br/><br/><br/><br/><br/><h2>Votre photo a bien été ajoutée. </h2></article>';

  }




             mysqli_close($link);





?>


                </fieldset>
 <?php

                endif;

              include("footer.php"); ?>
	</body>

</html>