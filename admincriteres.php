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
                               
                               if(isset($_GET['demande']) && $_GET['demande'] != NULL  )  { ?>

                                    <!--<menu id="menu">-->
                                            <article>
                                              <h2 style="text-align:left">Option : </h2>
                                              <ul>
                                                    
                                                     <li><a href="admincriteres.php?demande=ajouter">Ajouter</a></li>
                                              </ul>
                                             </article>


                                       <?php  if($_GET['demande']=="effacer"){ ?>

                                         <form action="admincriteresuite1.php" method="post">

                                          <?php         while($donnees=  mysqli_fetch_array($query)){ ?>

                                                             <input type="checkbox" name="<?php echo $donnees['nom']; ?>" id="oui" class="inputradio" value="1">
                                                             <label for="" class="label"><?php echo $donnees['nomcritere']; ?></label>
                                                             <br/>

                                                <?php       } ?>

                                                 <input type="submit" value="Effacer les criteres selectionnés">
                                      <?php }
                                      else{ ?>
                                                 <form action="admincriteresuite.php" method="post">
                                                 <label for="" class="label">nomcritere</label>
                                                     <input type="text" name="nomcritere" >
                                                 <label for="" class="label">typecritere</label>
                                                 <select name="typecritere"><option value="select">select</option><option value="textarea">textarea</option><option value="input">input</option><option value="inputradio">inputradio</option></select>
                                                 <label for="" class="label">nom</label>
                                                 <input type="text" name="nom">
                                                 <input type="submit" value="Ajouter ce critere">
                                                 </form>
                                   <?php   } ?>
</form>

                    <?php      }
                                   else{?>
                                        <article>
                                              <h2 style="text-align:left">Option : </h2>
                                              <ul>
                                                     
                                                     <li><a href="admincriteres.php?demande=ajouter">Ajouter</a></li>
                                              </ul>
                                             </article>
                                       
                                 <?php  }


                 
            endif;
             include("footer.php"); ?>
    </body>

</html>
