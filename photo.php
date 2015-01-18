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
                    <legend> Ajouter une photo: </legend>

                    <?php

                                    //Connexion à la base de donnée

                               $bdd = 'keydb';

                                $host = "localhost" ;

                                $user = "root" ;

                              $mdp = "root" ;

                              $link = mysqli_connect($host, $user, $mdp) ;

                               mysqli_select_db($link, $bdd) or die("Erreur de connexion à la base de donnée" );

             $idLog=$_GET['logement']; ?>



            <article><br/><br/><br/>
                                  <h2> Ajouter une photo </h2> </article>
                                      <br/><br/>


                        <form enctype="multipart/form-data" action="photosuite.php?log=<?php echo $idLog;?>" method="post">

                        <input  type="file" name="monfichier" id="monfichier"/>

                         <br/><br>
                                <input type="submit" value="Continuer"/>

                                      </form>



  

                </fieldset>
 <?php

                endif;

              include("footer.php"); ?>
	</body>

</html>
