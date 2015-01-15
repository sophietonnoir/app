<?php

}
// Fonction de recherche_avancée.php


function resultats_requete_avancee()
{
    global $bdd;

   /* if (isset($_POST['Ville']) and $_POST['Ville']!='')
    {
        $lieu = htmlspecialchars($_POST['Ville']);
    }
    else{$lieu = "";}*/
    if (isset($_POST['capacite']) and $_POST['capacite']!='')
    {
        $capacite = htmlspecialchars($_POST['capacite']);
        $message1 = "AND capacite >= $capacite";
    }
    
    else
    {
        $message2="";
    }
    if (isset($_POST['typedelogement']) and $_POST['typedelogement']!='')
    {
        $typedelogement = htmlspecialchars($_POST['typedelogement']);
        $message3 =  " AND typedelogement LIKE '%$typedelogement%'";
    }
    else
    {
        $message3="";
    }
    if (isset($_POST['Pays']) and $_POST['Pays']!='')
    {
        $pays = htmlspecialchars($_POST['Pays']);
        $message3 =  " AND Pays LIKE '%$Pays%'";
    }
    else
    {
        $message3="";
    }
    /*if (isset($_POST['type3']) and $_POST['type3']!='')
    {
        $type3 = htmlspecialchars($_POST['type3']);
        $message4 =  " AND typedelogement LIKE '%$type3%'";
    }
    
    else
    {
        $message8="";
    }*/
    if (isset($_POST['surface']) and $_POST['surface']!='')
    {
        $surface = htmlspecialchars($_POST['surface']);
        $message9 =  "AND surface >= $surface";
    }
    else
    {
        $message9="";
    }
    if (isset($_POST['chambres']) and $_POST['chambres']!='')
    {
        $chambres = htmlspecialchars($_POST['chambres']);
        $message10 = "AND chambres >= $chambres";
    }
    else
    {
        $message10="";
    }
    /*if (isset($_POST['nb_bathroom']) and $_POST['nb_bathroom']!='')
    {
        $bathroom = htmlspecialchars($_POST['nb_bathroom']);
        $message11 = "AND nb_salles_bains >= $bathroom";
    }
    else
    {
        $message11="";
    }*/
    if (isset($_POST['codePostal']) and $_POST['codePostal']!='')
    {
        $codePostal = htmlspecialchars($_POST['codePostal']);
        $message12 = " AND codePostal LIKE '%$codePostal%'";
    }
    else
    {
        $message12="";
    }
    if (isset($_POST['Ville']) and $_POST['Ville']!='')
    {
        $Ville = htmlspecialchars($_POST['Ville']);
        $message13 = " AND Ville LIKE '%$Ville%'";
    }
    else
    {
        $message13="";
    }
   /* if (isset($_POST['']) and $_POST['lieu3']!='')
    {
        $lieu3 = htmlspecialchars($_POST['lieu3']);
        $message14 = " AND type_endroit LIKE '%$lieu3%'";
    }
    else
    {
        $message14="";
    }

    if (isset($_POST['lieu4']) and $_POST['lieu4']!='')
    {
        $lieu4 = htmlspecialchars($_POST['lieu4']);
        $message15 =" AND type_endroit LIKE '%$lieu4%'";
    }
    else
    {
        $message15="";
    }/*
    

    /*if (isset($_POST["parking"])) {
        if ($_POST["parking"]=='Oui') {$parking =" AND parking LIKE 1";} else {$parking ="";}
    }*/

    if (isset($_POST['placesGarage']) and $_POST['placesGarage']!='')
    {
        $garage = htmlspecialchars($_POST['placesGarage']);
        $message11 = "AND placesGarage >= $garage";
    }
    else
    {
        $message11="";
    }

    

    if (isset($_POST["piscine"])) {
        if ($_POST["piscine"]=='Oui') {$piscine =" AND piscine LIKE 1";} else {$piscine ="";}
    }
    if (isset($_POST["animauxPermis"])) {
        if ($_POST["animauxPermis"]=='Oui') {$piscine =" AND animauxPermis LIKE 1";} else {$animauxPermis ="";}
    }

    if (isset($_POST["jardin"])) {
        if ($_POST["jardin"]=='Oui') {$jardin =" AND jardin LIKE 1";} else {$jardin ="";}
    }
    if (isset($_POST["wifi"])) {
        if ($_POST["wifi"]=='Oui') {$jardin =" AND wifi LIKE 1";} else {$wifi ="";}
    }
    if (isset($_POST["fumerPermis"])) {
        if ($_POST["fumerPermis"]=='Oui') {$piscine =" AND fumerPermis LIKE 1";} else {$fumerPermis ="";}
    }


    $dbh=new PDO('mysql:host=localhost;keydb','root','root');
    $results =$bdd->query("SELECT * FROM logements WHERE
 Ville LIKE '%$Ville%'
  $message1
  $message2
  $message3
  $message9
  $message10
  $message11
  $message12
  $message13
  $piscine
  $jardin
  $fumerPermis
  $wifi
  $animauxPermis

    ORDER BY idLogement DESC");

    return $results;
}




 /*AND Nombre_voyageurs >= $capacite
 AND Type_logement LIKE '%$type1%'
 AND Type_logement LIKE '%$type2%'
 AND Type_logement LIKE '%$type3%'
 AND Type_logement LIKE '%$type4%'
 AND Type_logement LIKE '%$type5%'
 AND Type_logement LIKE '%$type6%'
 AND Type_logement LIKE '%$type7%'
 AND superficie >= $surface_min
 AND Nb_chambres >= $chambres
 AND Nb_salles_bain >= $bathroom
 AND Type_endroit LIKE '%$lieu1%'
 AND Type_endroit LIKE '%$lieu2%'
 AND Type_endroit LIKE '%$lieu3%'
 AND Type_endroit LIKE '%$lieu4%'
   ; */


