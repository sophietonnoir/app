<?php 

                             $bdd = 'keydb';

                                $host = "localhost" ;

                                $user = "root" ;

                              $mdp = "root" ;

                              $link = mysqli_connect($host, $user, $mdp) ;

                               mysqli_select_db($link, $bdd) or die("Erreur de connexion à la base de donnée" );

                               $nomcritere=$_POST['nomcritere'];
                               $type=$_POST['typecritere'];
                               $nom=$_POST['nom'];

                               $query = mysqli_query($link,"INSERT INTO criteres(nomcritere, typecritere, nom) VALUES ('$nomcritere', '$type', '$nom')");
                               

                               $query1= mysqli_query($link,"ALTER TABLE logements ADD $nom varchar(30) NOT NULL");
                              
                               
                     mysqli_close($link);










?>