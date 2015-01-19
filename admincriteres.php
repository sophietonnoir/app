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
              else:

                             $bdd = 'keydb';

                                $host = "localhost" ;

                                $user = "root" ;

                              $mdp = "root" ;

                              $link = mysqli_connect($host, $user, $mdp) ;

                               mysqli_select_db($link, $bdd) or die("Erreur de connexion à la base de donnée" );

                               $query = mysqli_query($link,"SELECT * FROM criteres ") or die (mysqli_error($link));
                               
                              


                                      

                                        ?>

                                          
                                             <br/><br/>
 <br/><br/> <br/><br/>

 <fieldset>
                                     
                                                 <form action="admincriteresuite.php" method="post">
                                                 <label for="" class="inputradio11">nomcritere</label>
                                                     <input type="text" name="nomcritere" >
                                                 <label for="" class="inputradio11">typecritere</label>
                                                 <select name="typecritere"><option value="select">select</option><option value="textarea">textarea</option><option value="input">input</option><option value="inputradio">inputradio</option></select>
                                                 <label for="" class="inputradio11">nom</label>
                                                 <input type="text" name="nom">
                                                 <input type="submit" value="Ajouter ce critere">
                                                 </form>
 </fieldset>
                                  <br/><br/> <br/><br/>
 <br/><br/>
 <br/><br/>
 <br/><br/>
 <br/><br/>
 <br/><br/>




                <?php
                                


                 
            endif;
             include("footer.php"); ?>
    </body>

</html>
