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


              $idPropietaire= $_SESSION['id'];

                    $text0= "SELECT * FROM criteres";
                    $query = mysqli_query($link,$text0) or die (mysqli_error($link));

                    $url="upload.php?";


                    $premiereFois=1;

                    while($donnees0=mysqli_fetch_array($query)){

                        $variable=$donnees0['nom'];
                        $valeur=addslashes($_POST[$variable]);
                        if($premiereFois==1){

                             $url=$url.$variable."=".$valeur;
                             $premiereFois=$premiereFois+1;

                        }else{
                             $url=$url."&".$variable."=".$valeur;

                        }


                    }

                    



                ?>
                              <article><br/><br/><br/>
                                  <h2> Ajouter des photos </h2> </article>
                                      <br/><br/>


                        <form enctype="multipart/form-data" action="<?php echo $url?>" method="post">

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
