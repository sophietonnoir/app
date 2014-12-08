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


                //On récupere les valeurs du formulaire
                $idPropietaire= $_SESSION['id'];

                $typedelogement = $_POST['typedelogement'];

                $adresse = $_POST['adresse'];

                $codePostal = $_POST['codePostal'];

                $Ville = $_POST['Ville'];

                $Pays = $_POST['Pays'];

                $Description = $_POST['Description'];

                $chambres = $_POST['chambres'];

                $toilettes = $_POST['toilettes'];

                $surface = $_POST['surface'];

                $capacite = $_POST['capacite'];

                $fumerPermis = $_POST['fumerPermis'];

                $animauxPermis = $_POST['animauxPermis'];

                $piscine = $_POST['piscine'];

                $placesGarage = $_POST['placesGarage'];

                $wifi = $_POST['wifi'];

                $jardin= $_POST['jardin'];

                $monfichier=$_POST['monfichier'];

                $monfichier1= $_POST['monfichier1'];



                 if (($_POST['adresse'] == '')||($_POST['codePostal'] == '')||($_POST['Ville'] == '')||($_POST['Pays'] == '')||($_POST['surface'] == '')||($_POST['fumerPermis'] == '')||($_POST['animauxPermis'] == '')||($_POST['piscine'] == '')||($_POST['Description'] == '')||($_POST['monfichier'] == '')||($_POST['monfichier1'] == '')){

                        echo "<article><br/><br/><br/><br/><h2>Merci de renseigner tous les champs du formulaire !</h2></article>";
                        echo "<article><br/><br/><br/><br/><h2><a href='ajouterlogement.php'>Retour</a></h2></article>";
                    }


                 else {

                            $sqlLogement="INSERT INTO logements (idPropietaire, typedelogement , Pays , Ville , adresse , codePostal , Description , chambres , toilettes , surface, capacite , fumerPermis , animauxPermis , piscine , placesGarage , wifi, jardin ) VALUES ('$idPropietaire','$typedelogement','$Pays', '$Ville', '$adresse', '$codePostal', '$Description', '$chambres', '$toilettes', '$surface', '$capacite', '$fumerPermis', '$animauxPermis', '$piscine','$placesGarage', '$wifi', '$jardin')";
                            $result = mysqli_query($link, $sqlLogement);

                            $queryidLogement = mysqli_query($link,"SELECT idLogement FROM logements WHERE adresse='$adresse' " ) or die (mysqli_error($link));
                            $donneesLog=mysqli_fetch_array($queryidLogement);
                            $idLog= $donneesLog['idLogement'];


                            $sqlPhoto="INSERT INTO Photo(idLogement,Liendelaphoto) VALUES ('$idLog','$monfichier')";
                            $sqlPhoto1="INSERT INTO Photo(idLogement,Liendelaphoto) VALUES ('$idLog','$monfichier1')";
                            echo "<article><br/><br/><br/><br/><br/><h2> Votre logement a bien été ajouté. </h2></article>" ;

                            $result2=mysqli_query($link, $sqlPhoto);
                            $result3=mysqli_query($link, $sqlPhoto1);

                }







                //On ferme la connexion

                mysqli_close($link);

endif;
?>


</body>

</html>

