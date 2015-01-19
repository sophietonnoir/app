
<?php session_start()?>

<!DOCTYPE html>

<html>

  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="K2K.css" />
    <title>Key To Key - Accueil</title>
    <link rel="icon" type="image/gif" href="Img/icone.gif" />

    <?php   include("calendrier.php"); //javaScript pour le php?> 

  </head>

  <body>

      
    <?php
        
      include("header.php"); 
      if ($_SESSION != NULL) :  /*Si on est connecté*/

        $idEchange=$_GET['idEchange']; 
        $idSession=$_SESSION['id'];

        $link = mysqli_connect("localhost", "root", "root") ;
        mysqli_select_db($link, 'keydb') or die("Erreur de connexion à la base de donnée" );

        $text= "SELECT COUNT(idMessage) AS count FROM messages WHERE typeMessage LIKE '%confirmationEchange%' AND idEchange=$idEchange ";
        $query = mysqli_query($link,$text) or die (mysqli_error($link));
        $donnees=mysqli_fetch_array($query);
        $count=$donnees["count"];


        if($count>0){ //il a été dejà confirmé!!  ?>

            <article>

              <h2 style=" color:#C4420F; ">Cet échange a été dejà confirmé!</h2>
              <a href="messages.php?typeMessages=envoyes" class="voir_habitation" style="position:relative; margin-left:20px ; margin-right:150px; margin-right:auto; margin-top: 50px;">Retour</a>

            </article>


        <?php
        }
        else{

            $name=$_FILES['contrat']['name'];
            $type=$_FILES['contrat']['type'];
            $size=$_FILES['contrat']['size'];
            $temp=$_FILES['contrat']['tmp_name'];
            $error=$_FILES['contrat']['error'];



           if ($error > 0)
              die ("ERREUR");
          else {


              if($name==''){?>
                     <article><h2 style=" color:#C4420F; ">Veuillez seletionner un contrat.</h2></article>
              <?php
              }
              else{

                move_uploaded_file($temp, "../APPK2Kv2.1/contrats/".$name);
                $route="../APPK2Kv2.1/contrats/".$name;
                $route=addslashes($route);
                //j' obtiens les données du échange:

                $text2= "SELECT * FROM messages WHERE typeMessage LIKE '%demandeEchange%' AND idEchange=$idEchange ";
                $query2 = mysqli_query($link,$text2) or die (mysqli_error($link));
                $donnees2=mysqli_fetch_array($query2);
                
                $destinataire=$donnees2['idDestinataire'];
                $logDemande=$donnees2['logementDemande'];
                $dates1=$donnees2['disponibiliteEmetteurArrivee'];
                $dates2=$donnees2['disponibiliteEmetteurDepart'];
                $dates3=$donnees2['disponibiliteDestinataireArrivee'];
                $dates4=$donnees2['disponibiliteDestinataireDepart'];
                $message="Veuillez remplir et signer votre partie du contrat:  ";
                $typeContrat="contratA";
                $typeMessage="confirmation";


                //j' ajoute le contrat dans la base de données de contrats

                $sqlMessage1= "INSERT INTO contrats( idEchange, idDemandeur, idRepondeur, routeContrat, typeContrat ) VALUES ('$idEchange','$idSession','$destinataire','$route','$typeContrat')";
                        
                $result = mysqli_query($link, $sqlMessage1);

                //j' envoie le message de confirmation avec le contrat
        
                $sqlMessage2= "INSERT INTO messages( idEchange,idEmetteur,idDestinataire,logementDemande,lu,disponibiliteEmetteurArrivee,disponibiliteEmetteurDepart,disponibiliteDestinataireArrivee,disponibiliteDestinataireDepart, message, typeMessage ) VALUES ('$idEchange','$idSession','$destinataire','$logDemande' ,'0','$dates1','$dates2','$dates3','$dates4','$message', '$typeMessage')";
                
                $result = mysqli_query($link, $sqlMessage2);

                echo "<article><br/><br/><br/><br/><br/><h2>Contrat envoyé correctement</h2></article>"; 
                  

              }



          }

         



            ?>  

    <?php
          }
       else :?>
        <article><h2 style=" color:#C4420F; ">Connectez vous pour accéder a la messagerie.</h2></article>
    <?php endif;  
      include ("footer.php");
    ?>

  </body>

</html>

