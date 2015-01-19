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

            <article><br/><br/><br/><br/><h2>Merci de vous connecter !</h2></article>

    <?php else: 

                //Connexion à la base de donnée

                $link = mysqli_connect("localhost", "root", "root") ;

                mysqli_select_db($link, 'keydb') or die("Erreur de connexion à la base de donnée" );


                //On récupere les valeurs du formulaire
                $idSession= $_SESSION['id'];                 /*id du client qui démande la maison*/
                $dates1= addslashes($_POST['date1']);
                $dates2= addslashes($_POST['date2']);
                $dates3= addslashes($_POST['date3']);
                $dates4= addslashes($_POST['date4']);
                $message= addslashes($_POST['message']);
                $logPropose= addslashes($_POST['maison']);

                $proprietaire=$_GET['proprietaire'];        /*id du propietaire de la maison demandée*/
                $idLogementDemande=$_GET['logement'];
                $typeMessage="demandeEchange";

                

                if (($dates1== '')||($dates2 == '')||($dates3== '')||($dates4== '')||($message == '')){?>

                        <article><br/><br/><br/><br/><h2>Merci de renseigner tous les champs du formulaire !</h2></article>
                        <article><br/><br/><br/><br/><h2><a href="demanderEchange.php?proprietaire=<?php echo $proprietaire;?>&logement=<?php echo $idLogementDemande; ?>">Retour</a></h2></article>;
                <?php
                }
                else {
                    
                    $error=0;

                    if($dates1>$dates2){
                        $error=1;

                    ?>
                        <br/><br/>
                        <article >
                             <div id="description">
                                <p style=" color:#C4420F; "><u>Dates pour aller dans ce logement:</u></p>
                                 <p style=" color:#C4420F; "> La date de arrivée est posterieure a celle de départ! </p>
                             
                         
                    <?php
                    } 
                    if($dates1==$dates2){
                        $error=1;
                        ?>
                        <br/><br/>
                        <article >
                             <div id="description">
                                  <p style=" color:#C4420F; "><u>Dates pour aller dans ce logement:</u> </p>
                                  <p style=" color:#C4420F; "> La date de départ est la même que celle d 'arrivée ! </p>
                            
                        
                    <?php
                    }
                    if($dates3>$dates4){
                        if($error==0){?>
                            <br/><br/>
                            <article >
                                 <div id="description">
                           
                        <?php
                        }
                        $error=1; ?>

                                    <p style="color:#C4420F;"><u>Dates pour que le propriétaire vienne chez vous:</u> </p>
                                    <p style="color:#C4420F; "> La date de arrivée est posterieure a celle de départ! </p>
                                
                    <?php
                        
                    } 
                    if($dates3==$dates4){
                        if($error==0){?>
                            <br/><br/>
                            <article >
                                 <div id="description">
                    <?php
                        }
                        $error=1; ?>
                                 <p style=" color:#C4420F; "><u>Dates pour que le propriétaire vienne chez vous:</u> </p>
                                 <p style=" color:#C4420F; "> La date de départ est la même que celle d 'arrivée !</p>
                    
                    <?php
                    }
                    
                    if($error==1){?>
                                <br/>
                                <a href="demanderEchange.php?proprietaire=<?php echo $proprietaire;?>&logement=<?php echo $idLogementDemande; ?>" class="voir_habitation" style="position:relative; margin-left:200px ; margin-right:150px; margin-right:auto; margin-top: 50px;">Retour</a>
                            </div>
                                 </div>
                             </div>
                             </div>
                       </article>

                <?php
                    }
                    else{
                        /*je cherche le dernier echange pour incrementer le idEchange*/
                            
                        $text= "SELECT MAX(idEchange) AS dernierEchange FROM messages";
                        $query = mysqli_query($link,$text) or die (mysqli_error($link));
                        $donnees=mysqli_fetch_array($query);
                        $dernierEchange=$donnees["dernierEchange"];
                        $nouvelEchange=$dernierEchange + 1;
               


                        $sqlMessage= "INSERT INTO messages( idEchange,idEmetteur,idDestinataire,logementDemande,logPropose,lu,disponibiliteEmetteurArrivee,disponibiliteEmetteurDepart,disponibiliteDestinataireArrivee,disponibiliteDestinataireDepart, message, typeMessage ) VALUES ('$nouvelEchange','$idSession','$proprietaire','$idLogementDemande','$logPropose' ,'0','$dates1','$dates2','$dates3','$dates4','$message', '$typeMessage')";
                        
                        $result = mysqli_query($link, $sqlMessage);

                        echo "<article><br/><br/><br/><br/><br/><h2> Message envoyé correctement</h2></article>"; 
                      ?>  
                        <a href="voirHabitation.php?search=<?php echo $idLogementDemande;?>"   style="margin-left:520px ;"  class="demanderEchange"> Retourner au logement </a> <br/><br/><br/>
                    
               <?php 
                    }
                } 

                mysqli_close($link);    //On ferme la connexion

                endif;
                ?>

</body>

</html>

