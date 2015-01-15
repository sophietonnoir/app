<?php
// on se connecte à MySQL.

include('modeles.php');
?>
<?php session_start(); ?>

<head>
    <meta charset="utf-8" />
    <title>Recherhe</title>
</head>

<body>


            <?php
            // on vérifie d'abord l'existence du POST et aussi si la requete n'est pas vide.


            // on crée une variable $requete pour faciliter l'écriture de la requête SQL.
            $nbresult =resultats_requete_avancee();

            // on utilise la fonction mysql_num_rows pour compter les résultats pour vérifier par après
            $nb_resultats = $nbresult->rowCount();

            if($nb_resultats != 0) // si le nombre de résultats est supérieur à 0, on continue
            {
                // maintenant, on va afficher les résultats ?>
              


                <?php
                // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction :
                while($donnees = $nbresult->fetch())
                {
                   /* $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
                    $pic -> execute(array($donnees['id_logement']));
                    $url_pic = $pic -> fetch();
                    ?>
                    <div class="cadre">
                        <div class="left">
                            <?php echo '<img width="125px" height="125px" align="left" src="'.$url_pic['lien_photo'].'" class="photo">' ?>
                        </div>

                        <div class="right">
                                    <span>
                                    <a href="annonce.php?id_logement=<?php echo $donnees['id_logement']; ?> &id_users=<?php echo $donnees['id_users']; ?>" >*/  ?>
                                        <?php echo '<p>' .''.$donnees['Ville']. ' </br>' /*. $donnees['nombre_voyageurs']. ' voyageurs </br>' . $donnees['type_logement'] . " </br>  ". $donnees['description_logement'] . '</p>';*/ ?> <br/>
                                    
                        



                    <br/>
                <?php
                } // fin du while

                ?>		 <br/>
                <a href="recherche_avancee.php" class="nlle_r"> hola </a>
            <?php
            }
            // Afficher l'éventuelle erreur :
            else
            { //HTML
                ?>
                
                <p> hola <a href="recherche_avancee.php"/>  
            <?php
            }
            $nbresult->closeCursor(); // on ferme mysql

            ?>

            </p>
        
    
    <?php
    include("footer2.php");
    ?>
</div>
</body>

