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
    if ($_SESSION == NULL): ?>

            echo "<article><br/><br/><br/><br/><h2>Merci de vous connecter !</h2></article>";

    <?php else: 

                //Connexion à la base de donnée

                $link = mysqli_connect("localhost", "root", "") ;

                mysqli_select_db($link, 'keydb') or die("Erreur de connexion à la base de donnée" );


                //On récupere les valeurs du formulaire
                $idSession= $_SESSION['id'];                 /*id du client qui démande la maison*/
                $dates1= addslashes($_POST['dates1']);
                $dates2= addslashes($_POST['dates2']);
                $message= addslashes($_POST['message']);

                $proprietaire=$_GET['proprietaire'];        /*id du propietaire de la maison demandée*/
                $idLogementDemande=$_GET['logement'];
                $typeMessage="demandeEchange";

                if (($dates1== '')||($dates2 == '')||($message == '')){

                        echo "<article><br/><br/><br/><br/><h2>Merci de renseigner tous les champs du formulaire !</h2></article>";
                        echo "<article><br/><br/><br/><br/><h2><a href='ajouterlogement.php'>Retour</a></h2></article>";
                }


                else {

                    /*je cherche le dernier echange pour incrementer le idEchange*/
                        

                    $text= "SELECT MAX(idEchange) AS dernierEchange FROM messages";
                    $query = mysqli_query($link,$text) or die (mysqli_error($link));
                    $donnees=mysqli_fetch_array($query);
                    $dernierEchange=$donnees["dernierEchange"];
                    $nouvelEchange=$dernierEchange + 1;
           


                    $sqlMessage= "INSERT INTO messages( idEchange,idEmetteur,idDestinataire,logementDemande,lu,disponibiliteEmetteur,disponibiliteDestinataire, message, typeMessage ) VALUES ('$nouvelEchange','$idSession','$proprietaire','$idLogementDemande' ,'0','$dates1','$dates2','$message', '$typeMessage')";
                    
                    $result = mysqli_query($link, $sqlMessage);

                    echo "<article><br/><br/><br/><br/><br/><h2> Message envoyé correctement</h2></article>"; 
                  ?>  
                    <a href="voirHabitation.php?search=<?php echo $idLogementDemande;?>"  class="demanderEchange"> Retourner au logement </a> </br></br></br>
                            
               <?php 
                
                } 

                mysqli_close($link);    //On ferme la connexion

                endif;
                ?>

</body>

</html>

