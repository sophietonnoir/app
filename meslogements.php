<?php session_start()?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Mes logements</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
	</head>

	<body>
		<?php include("header.php"); ?>

<?php

        $bdd = 'keydb';

        $host = "localhost" ;

        $user = "root" ;

        $mdp = "root" ;

        $link = mysqli_connect($host, $user, $mdp) ;

        $idPropietaire= $_SESSION['id'];
        echo $idPropietaire;
        
        mysqli_select_db($link,$bdd )or die("Erreur de connexion à la base de donnée" ); // on se connecte à MySQL.
        //j obtient le idPropietaire du client connecté
        
        
        $sql ="SELECT * FROM logements WHERE idPropietaire= ".$idPropietaire."";
        $req= mysqli_query($link,$sql)  or die (mysqli_error());
        $n = mysqli_num_rows($link,$req);
        echo $n;
        while($donnees = mysqli_fetch_array($req))   {

 ?>

        <article>

            <div>
                <p> <?php echo $donnees['typedelogement'];
                            echo $donnees['adresse'];
                            echo $donnees['codePostal'];
                            echo $donnees['Ville'];
                            echo $donnees['Pays'];
                        ?>   </p>

            </div>

        </article>

 <?php
       
       }


  
        // on libère l'espace mémoire alloué pour cette interrogation de la base
        mysqli_free_result ($req);
        mysqli_close ($link);
 ?>
 
           
        </body>
</html>