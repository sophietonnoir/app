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
		<?php include("header.php"); ?>
		<fieldset class="fieldset2">
		<legend> Ajouter un logement: </legend>
	<form method="post" action="ajouterlogementsuite.php">
            <div>
             <br/>
             <br/>
             <label for="typedelogement" class="label" >Type de logement :</label>
            <select id="typedelogement" name="typedelogement" class="select">
                <option value="Maison">Maison</option><option value="Appartement">Appartement</option><option value="Autre">Autre type de logement</option>
            </select>

        <br/><br/>


              <label for="" class="label">Adresse :</label><br/>
             <textarea rows="4" cols="50" class="textarea" name="adresse"></textarea>
             
        <br/><br/>

             <label for=""class="label">Code Postal :</label>
             <input type="text" name="codePostal" class="cp" />


             <label for="" class="label">Ville :</label>
            <input type="text" name="Ville" class="ville"/>
        
        <br/><br/>

            <label for="" class="label">Pays :</label>
            <input type="text" name="Pays" class="pays"/>

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
            <input type="text" name="surface" class="surface"/>mètres carrés
        
            <br/><br/>



              <label for="" class="label">Capacité :</label>
              <select id="capacite" name="capacite">
              <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option><option value="6"></option>
              </select>

       <br/><br/>

           <label for=""class="label">Fumeur :</label>
           <input type="radio" name="fumerPermis" id="oui" value="oui" class="inputradio">Oui</input>
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
            <select id="placesGarage" name="placesGarage">
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
                <textarea rows="15" cols="50" name="Description" class="description"></textarea>
           <br/>
           <br/>

            <div class="input1"> <form enctype="multipart/form-data" action="fileupload.php" method="post">
                        <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                        <input type="file" name="monfichier" />
                  <form enctype="multipart/form-data" action="fileupload.php" method="post">
                        <input type="hidden" name="MAX_FILE_SIZE1" value="100000" />
                        <input type="file" name="monfichier1" />
            </div>
			
            <br/>
            <br/>
            <input type="submit" name="Ajouter mon logement" value="Envoyer" class="submit" />
		</fieldset>



		<?php include("footer.php"); ?>
	</body>