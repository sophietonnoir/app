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
    if ($_SESSION == NULL){

            echo "<article><br/><br/><br/><br/><h2>Merci de vous connecter !</h2></article>";
   
    }
    else{
        $bdd = 'keydb';

                $host = "localhost" ;

               $user = "root" ;

              $mdp = "root" ;

              $link = mysqli_connect($host, $user, $mdp) ;

               mysqli_select_db($link, $bdd) or die("Erreur de connexion à la base de donnée" );



            foreach($_POST['critere'] as $a){

                $text="ALTER TABLE logements DROP COLUMN ".$a;
                $query = mysqli_query($link,$text) or die (mysqli_error($link));
                 $text2="DELETE FROM  criteres WHERE nom= '$a' ";
                $query2 = mysqli_query($link,$text2) or die (mysqli_error($link));
            }

            echo '<br/><br/><article><h2>Critère supprimé</h2></article>';

    }
     
 mysqli_close($link);



include("footer.php"); ?>



</body>
</html>