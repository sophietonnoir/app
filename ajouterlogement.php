<?php session_start()?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Ajouter un logement</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
            
                  
	</head>


	<body>
              <?php include("header.php");


              if ($_SESSION == NULL):
                     echo "<article><br/><br/><br/><br/><h2>Merci de vous connecter !</h2></article>";
              else: ?>
		<fieldset class="fieldset2">
                    <legend> Ajouter un logement: </legend>
         
                    
                    <form method="post" action="ajouterlogementsuite.php"/>


                              <?php

                                    //Connexion à la base de donnée

                               $bdd = 'keydb';

                                $host = "localhost" ;

                                $user = "root" ;

                              $mdp = "root" ;

                              $link = mysqli_connect($host, $user, $mdp) ;

                               mysqli_select_db($link, $bdd) or die("Erreur de connexion à la base de donnée" );


                                $query = mysqli_query($link,"SELECT * FROM criteres ") or die (mysqli_error($link));

                                while($donnees = mysqli_fetch_array($query)){
                                   if ($donnees['typecritere']=="textarea"){ ?>

                                            <label for="" class="label"><?php echo $donnees['nomcritere'] ;?></label><br/>
                                            <textarea rows="6" cols="50" class="textarea" name="$donnees['nomcritere']" id="$donnees['nomcritere']" ></textarea>

<br/>
                                 <?php }

                                 else if ($donnees['typecritere']=="input radio"){?>
                                          <label for="" class="label"><?php echo $donnees['nomcritere']; ?></label>
                                           <input type="radio" name="$donnees['typecritere']" id="oui" value="oui" class="inputradio"> Oui</input>
                                           <input type="radio" name="$donnees['typecritere']" id="non" value="non" class="inputradio11">Non</input>
<br/><br/>
                                <?php  }


                                 else if ($donnees['typecritere']=="select"){
                                           if ($donnees['nomcritere']=="Type de logement"){ ?>
                                                    <label for="typedelogement" class="label" ><?php echo $donnees['nomcritere']; ?></label>
                                                      <select id="typedelogement" name="typedelogement" class="select" style="margin: center">
                                                             <option value="Maison">Maison</option><option value="Appartement">Appartement</option><option value="Autre">Autre type de logement</option>
                                                        </select>
<br/><br/> 
                                         
                                         <?php

                                         }
                                           else { ?>
                                                    <label for="" class="label" ><?php echo $donnees['nomcritere']; ?></label>
                                                             <select id="$donnees['nomcritere']" name="$donnees['nomcritere']"style="margin: center">
                                                                    <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option>
                                                            </select>
                                                   <br/><br/> 
                                   <?php      }
                                 
                                   }

                                  else if ($donnees['typecritere']=="input"){ 
                                                 if ($donnees['nomcritere']=="Surface"){ ?>

                                                   <label for="" class="label"><?php echo $donnees['nomcritere'];?> </label>
                                                <input type="text" name="$donnees['nomcritere']" class="ville" id="$donnees['nomcritere']"/> mètres carrés

                                              <?php } else { ?>

                                                <label for="" class="label"><?php echo $donnees['nomcritere'];?></label>
                                                <input type="text" name="$donnees['nomcritere']" class="ville" id="$donnees['nomcritere']"/>
                                                 <?php
                                                 }
                                                 }

                                    
                                       

                                }

                            ?>

                <!--

         <div>
             <br/>
             <br/>
             <label for="typedelogement" class="label" >Type de logement :</label>
            <select id="typedelogement" name="typedelogement" class="select">
                <option value="Maison">Maison</option><option value="Appartement">Appartement</option><option value="Autre">Autre type de logement</option>
            </select>

        <br/><br/>


              <label for="" class="label">Adresse :</label><br/>
              <textarea rows="4" cols="50" class="textarea" name="adresse" id="adresse" ></textarea>
             
        <br/><br/>

             <label for=""class="label">Code Postal :</label>
             <input type="text" name="codePostal" class="cp" id="codepostal" />


             <label for="" class="label">Ville :</label>
            <input type="text" name="Ville" class="ville" id="ville"/>
        
        <br/><br/>

            <label for="" class="label">Pays :</label>
            <input type="text" name="Pays" class="pays"id="pays"/>

        <br/><br/>

            <label for="" class="label">Nombre de chambres :</label>
            <select id="chambres" name="chambres" style="margin: center" >
                <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option>
            </select>


             <label for="" class="label">Nombre de toilettes :</label>
            <select id="toilettes" name="toilettes">
                <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> 
            </select>

             <br/><br/>

                <label for="" class="label">Surface :</label>
            <input type="text" name="surface" class="surface" id="surface"/>mètres carrés
        
            <br/><br/>



              <label for="" class="label">Capacité :</label>
              <select id="capacite" name="capacite">
              <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option><option value="6"></option>
              </select>

       <br/><br/>

           <label for="" class="label">Fumeur :</label>
           <input type="radio" name="fumerPermis" id="oui" value="oui" class="inputradio"> Oui</input>
           <input type="radio" name="fumerPermis" id="non" value="non" class="inputradio11">Non</input>

           <br /><br/>


           <label for=""class="label">Animaux autorisés ?</label>
           <input type="radio" name="animauxPermis" id="oui" value="oui" class="inputradio1">Oui</input>
           <input type="radio" name="animauxPermis" id="non" value="non" class="inputradio5">Non</input>

           <br/> <br/>

           <label for=""class="label">Piscine :</label>
           <input type="radio" name="piscine" id="oui" value="oui" class="inputradio2">Oui</input>
           <input type="radio" name="piscine" id="non" value="non" class="inputradio6">Non</input>

           <br/><br/>

           <label for="" class="label">Nombre de places de parking :</label>
            <select id="placesgarage" name="placesGarage">
                <option value="0">0</option> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option>
            </select>

           <br/><br/>

           <label for=""class="label"> Wifi :</label>
           <input type="radio" name="wifi" id="oui" value="oui" class="inputradio3">Oui</input>
           <input type="radio" name="wifi" id="non" value="non" class="inputradio9">Non</input>

           <br/><br/>

           <label for=""class="label"> Jardin :</label>
           <input type="radio" name="jardin" id="oui" value="oui" class="inputradio4">Oui</input>
           <input type="radio" name="jardin" id="non" value="non" class="inputradio10">Non</input>

           <br/><br/>

           <label for=""class="label"> Description :</label>

           <br/>
           <br/>
                <textarea rows="15" cols="50" name="Description" class="description" id="description"></textarea>
           <br/>
           <br/>

         

  <div class="input1"> -->


<!--                <form enctype="multipart/form-data" action="ajouterlogementsuite.php" method="post"/>
                 <input type="file" name="monfichier" id="monfichier"/>
                  <input type="hidden" name="MAX_FILE_SIZE" value="100000" />-->


<!--                 <form enctype="multipart/form-data" action="ajouterlogementsuite.php" method="post">
                        <input type="hidden" name="MAX_FILE_SIZE1" value="100000" />
                        <input type="file" name="monfichier1" />-->
<!--         </div>-->
			
                        <br/>
                        <br/>
                        <input type="submit" name="Ajouter mon logement" value="Suivant" id="envoyer"class="submit" />
		</fieldset>



		<?php
                endif;
               
                include("footer.php"); ?>
	</body>

</html>