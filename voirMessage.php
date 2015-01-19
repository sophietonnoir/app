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


		<?php 	include("header.php"); ?>

		<?php  
			
			$idSession= $_SESSION['id'];
			$idMessage=$_GET['idMessage'];
			/*J' obtiens les donnees du message; */


			$link = mysqli_connect("localhost", "root", "root") ; 
			mysqli_select_db($link, 'keydb') or die("Erreur à la base de données");
 			

 			$text= "SELECT * FROM messages WHERE idMessage=$idMessage ";
		 	$query = mysqli_query($link,$text) or die (mysqli_error($link));
		 	$donnees= mysqli_fetch_array($query);
		 	$idEmetteur= $donnees['idEmetteur'];
		 	$idEchange=$donnees['idEchange'];?>
		 

			
			<br/><br/><br/>
			<article>
				
				 <div id="description">
					<?php 

						$reçu='2'; //0 si c' est un message reçu, 1 si c' est un message envoyé!!
									//2 si on essaye de lire un message qui ne nous appartient pas

						
						//je prends l' adresse du logement demandé

			 				$idLogDemande= $donnees['logementDemande'];
							$text4= "SELECT * FROM logements WHERE idLogement=$idLogDemande";
							$query4 = mysqli_query($link,$text4) or die (mysqli_error($link));
							$donnees4=mysqli_fetch_array($query4);
							$adresse=$donnees4['adresse'];
							$ville=$donnees4['Ville'];



						if($idSession==$donnees['idDestinataire']){  /*C' EST UN MESSAGE REÇU!!!*/
									$reçu='0';
									
									if($donnees['lu']==0){
										 
										// Je change l' etat de "pas lu" à "lu"
										
										$text0="UPDATE messages SET lu=1 WHERE idMessage=$idMessage ";
										$query0 = mysqli_query($link,$text0) or die (mysqli_error($link));
										
									}
									
									//je prend le nom du émeteur
									$text= "SELECT * FROM users WHERE id=$idEmetteur ";
								 	$query = mysqli_query($link,$text) or die (mysqli_error($link));
								 	$donnees2= mysqli_fetch_array($query);
								 	$nomEmetteur= $donnees2['prenom']." ".$donnees2['nom'];

								 	$text8= "SELECT * FROM messages WHERE idMessage=$idMessage ";
								 	$query8 = mysqli_query($link,$text8) or die (mysqli_error($link));
								 	$donnees8= mysqli_fetch_array($query8);
								 	$propo= $donnees8['logPropose'];

								 	$text9= "SELECT * FROM logements WHERE idlogement=$propo";
								 	$query9 = mysqli_query($link,$text9) or die (mysqli_error($link));
								 	$donnees9= mysqli_fetch_array($query9);
								 	$propo= $donnees9['adresse'].", ".$donnees9['Ville'];

								 	
								 	
								 	if($donnees['typeMessage']=="demandeEchange"){		//DEMANDE D' ECHANGE!!
									?> 
										
										<p><strong>From:</strong>  <?php echo $nomEmetteur ?></p>

										<p><strong>Date du Message:</strong>  <?php echo $donnees['dateMessage']; ?></p>
										<p><strong>Logement que  <?php echo $nomEmetteur?>  a proposé: </strong><?php echo $propo;?> </p>

										<p><strong>Logement que  <?php echo $nomEmetteur?>  a demandé: </strong><?php echo $adresse.", ".$ville;?> </p>

										<p><strong>Date oú <?php echo $nomEmetteur?> démande aller chez vous: </strong> Du <?php echo $donnees['disponibiliteEmetteurArrivee']; ?>  <?php echo $donnees['disponibiliteEmetteurDepart']; ?> au</p>

										<p><strong>Date oú <?php echo $nomEmetteur?> peux vous recevoir:</strong> Du <?php echo $donnees['disponibiliteDestinataireArrivee']; ?> au <?php echo $donnees['disponibiliteDestinataireDepart']; ?></p>

										<p><strong>Message:</strong>  <?php echo $donnees['message']; ?></p>
											


								<?php 
									}
									elseif ($donnees['typeMessage']=="reponseRefus"){	//REFUS D' ECHANGE!!
								?>

											<p><strong>From:</strong>  <?php echo $nomEmetteur ?></p>

											<p><strong>Date du Message:</strong>  <?php echo $donnees['dateMessage']; ?></p>

											<p><strong>Logement que vous avez demandé: </strong><?php echo $adresse.", ".$ville;?> </p>

											<p><strong>Date oú vous avez demandé aller chez <?php echo $nomEmetteur?> : </strong>Du <?php echo $donnees['disponibiliteDestinataireArrivee']; ?> au <?php echo $donnees['disponibiliteDestinataireDepart']; ?></p>

											<p><strong>Date oú vous avez proposé que <?php echo $nomEmetteur?> vienne chez vous:</strong>Du <?php echo $donnees['disponibiliteEmetteurArrivee']; ?> au <?php echo $donnees['disponibiliteEmetteurDepart']; ?> </p>

											<p><strong>Message:</strong>  <?php echo $donnees['message']; ?></p>
											
								<?php 
										}
										elseif ($donnees['typeMessage']=="reponseAccepte"){
											//ils ont accepté ma demande de logement, il faut que je la confirme
											?>

											<h2> Echange Accepté!</h2>
											
											<p><strong>From:</strong>  <?php echo $nomEmetteur ?></p>

											<p><strong>Date du Message:</strong>  <?php echo $donnees['dateMessage']; ?></p>

											<p><strong>Logement que vous avez demandé: </strong><?php echo $adresse.", ".$ville;?> </p>

											<p><strong>Date oú vous avez demandé aller chez <?php echo $nomEmetteur?> : </strong> Du <?php echo $donnees['disponibiliteDestinataireArrivee']; ?> au <?php echo $donnees['disponibiliteDestinataireDepart']; ?></p>

											<p><strong>Date oú vous avez proposé que <?php echo $nomEmetteur?> vienne chez vous:</strong> Du <?php echo $donnees['disponibiliteEmetteurArrivee']; ?> au <?php echo $donnees['disponibiliteEmetteurDepart']; ?> </p>


											<p><strong>Message:</strong>  <?php echo $donnees['message']; ?>	 </p>
											
								<?php			
										}
										elseif ($donnees['typeMessage']=="confirmation"){
											//j' ai accepté ma demande d' echange,
											//ils ont confirmé l' echange en m' envoyant un contrat
											//il faut que je signe ma partie du contrat

											?>

											<h2> Echange Confirmé!</h2>
											
											<p><strong>From:</strong>  <?php echo $nomEmetteur ?></p>

											<p><strong>Date du Message:</strong>  <?php echo $donnees['dateMessage']; ?></p>

											<p><strong>Logement que <?php echo $nomEmetteur ?> a demandé: </strong><?php echo $adresse.", ".$ville;?> </p>

											<p><strong>Date oú <?php echo $nomEmetteur?> ira chez vous: </strong> Du <?php echo $donnees['disponibiliteEmetteurArrivee']; ?>  <?php echo $donnees['disponibiliteEmetteurDepart']; ?> au</p>

											<p><strong>Date oú <?php echo $nomEmetteur?>  vous recevra:</strong> Du <?php echo $donnees['disponibiliteDestinataireArrivee']; ?> au <?php echo $donnees['disponibiliteDestinataireDepart']; ?></p>

											<?php  //je cherche le lien du contrat signé par l' autre part.
												 	
												 	$typeContrat="contratA";
													$text6= "SELECT * FROM contrats WHERE idEchange=$idEchange AND typeContrat='$typeContrat'";
												 	$query6 = mysqli_query($link,$text6) or die (mysqli_error($link));
												 	$donnees6= mysqli_fetch_array($query6);
												 	$lienContrat=$donnees6['routeContrat'];

												?>
												
											<p><strong>Message:</strong>  <?php echo $donnees['message']; ?>
												<a href="<?php echo "../".$donnees6['routeContrat'] ;?>" target="_blank">CONTRAT</a>
											 </p>
											
								<?php			
										}
										elseif ($donnees['typeMessage']=="confirmationFinale"){
											//j' ai accepté ma demande d' echange,
											//ils ont confirmé l' echange en m' envoyant un contrat
											//il faut que je signe ma partie du contrat

											?>


											<h2> Echange Confirmé Definitivement!</h2>
											
											<p><strong>From:</strong>  <?php echo $nomEmetteur ?></p>

											<p><strong>Date du Message:</strong>  <?php echo $donnees['dateMessage']; ?></p>

											<p><strong>Logement que vous avez demandé: </strong><?php echo $adresse.", ".$ville;?> </p>

											<p><strong>Date oú <?php echo $nomEmetteur?> ira chez vous: </strong> Du <?php echo $donnees['disponibiliteEmetteurArrivee']; ?>  <?php echo $donnees['disponibiliteEmetteurDepart']; ?> au</p>

											<p><strong>Date oú <?php echo $nomEmetteur?>  vous recevra:</strong> Du <?php echo $donnees['disponibiliteDestinataireArrivee']; ?> au <?php echo $donnees['disponibiliteDestinataireDepart']; ?></p>

											<?php  //je cherche le lien du contrat signé par l' autre part.
												 	
													$typeContrat="contratB";
													$text6= "SELECT * FROM contrats WHERE idEchange=$idEchange AND typeContrat='$typeContrat'";
												 	$query6 = mysqli_query($link,$text6) or die (mysqli_error($link));
												 	$donnees6= mysqli_fetch_array($query6);
												 	$lienContrat=$donnees6['routeContrat'];

												?>
												
											<p><strong>Message:</strong>  <?php echo $donnees['message']; ?>
												<a href="<?php echo "../".$donnees6['routeContrat'] ;?>" target="_blank">CONTRAT</a>
											 </p>
											
								<?php			
										}


					  	}//MESSAGES REcu
						if($idSession==$donnees['idEmetteur']){/*C' EST UN MESSAGE ENVOYÉ!!!**********/

							$reçu='1'; //Envoyé

							$idDestinataire=$donnees['idDestinataire'];
							$text= "SELECT * FROM users WHERE id=$idDestinataire ";
						 	$query = mysqli_query($link,$text) or die (mysqli_error($link));
						 	$donnees2= mysqli_fetch_array($query);
						 	$nomDestinataire= $donnees2['prenom']." ".$donnees2['nom'] ;
						 	
						 	if($donnees['typeMessage']=="demandeEchange"){

						 		
						 			$text8= "SELECT * FROM messages WHERE idMessage=$idMessage ";
								 	$query8 = mysqli_query($link,$text8) or die (mysqli_error($link));
								 	$donnees8= mysqli_fetch_array($query8);
								 	$propo= $donnees8['logPropose'];

								 	$text9= "SELECT * FROM logements WHERE idlogement=$propo";
								 	$query9 = mysqli_query($link,$text9) or die (mysqli_error($link));
								 	$donnees9= mysqli_fetch_array($query9);
								 	$propo= $donnees9['adresse'].", ".$donnees9['Ville'];

								?>	

							 	<p><strong>To:</strong>  <?php echo $nomDestinataire?></p>
								<p><strong>Date du Message:</strong>  <?php echo $donnees['dateMessage']; ?></p>
								<p><strong>Logement que vous avez demandé: </strong><?php echo $adresse.", ".$ville;?> </p>
								<p><strong>Logement que vous avez proposé: </strong><?php echo $propo;?> </p>
								<p><strong>Date oú vous voulez aller chez <?php echo $nomDestinataire?> : </strong>  Du <?php echo $donnees['disponibiliteEmetteurArrivee']; ?> au <?php echo $donnees['disponibiliteEmetteurDepart']; ?>  </p>
								<p><strong>Date oú vous voulez que <?php echo $nomDestinataire?> vienne chez vous: </strong>Du <?php echo $donnees['disponibiliteDestinataireArrivee']; ?> au <?php echo $donnees['disponibiliteDestinataireDepart']; ?></p>
								<p><strong>Message:</strong>  <?php echo $donnees['message']; ?></p>


								

							<?php
							}
							elseif ($donnees['typeMessage']=="reponseRefus"){?>

								<p><strong>To:</strong>  <?php echo $nomDestinataire?></p>
								<p><strong>Date du Message:</strong>  <?php echo $donnees['dateMessage']; ?></p>
								<p><strong>Logement que <?php echo $nomDestinataire?> a demandé:  </strong><?php echo $adresse.", ".$ville;?> </p>
								<p><strong>Date oú <?php echo $nomDestinataire?> voulait aller chez vous: </strong>  Du <?php echo $donnees['disponibiliteDestinataireArrivee']; ?> au <?php echo $donnees['disponibiliteDestinataireDepart']; ?></p>
								<p><strong>Date oú <?php echo $nomDestinataire?> aurait voulu vous recevoir chez lui :</strong> Du <?php echo $donnees['disponibiliteEmetteurArrivee']; ?> au <?php echo $donnees['disponibiliteEmetteurDepart']; ?></p>
								<p><strong>Message:</strong>  <?php echo $donnees['message']; ?></p>




							<?php

							}

							elseif ($donnees['typeMessage']=="reponseAccepte"){	?>


								<p><strong>To:</strong>  <?php echo $nomDestinataire?></p>
								<p><strong>Date du Message:</strong>  <?php echo $donnees['dateMessage']; ?></p>
								<p><strong>Logement que vous avez demandé: </strong><?php echo $adresse.", ".$ville;?> </p>
								<p><strong>Date oú <?php echo $nomDestinataire?> veut aller chez vous: </strong> Du <?php echo $donnees['disponibiliteDestinataireArrivee']; ?> au <?php echo $donnees['disponibiliteDestinataireDepart']; ?> </p>
								<p><strong>Date oú <?php echo $nomDestinataire?> veut vous recevoir chez lui :</strong> Du <?php echo $donnees['disponibiliteEmetteurArrivee']; ?> au <?php echo $donnees['disponibiliteEmetteurDepart']; ?> </p>
								<p><strong>Message:</strong>  <?php echo $donnees['message']; ?></p>



							<?php

							}

							elseif($donnees['typeMessage']=="confirmation"){?>
								



											<h2> Echange Confirmé!</h2>
											
											<p><strong>To:</strong>  <?php echo $nomDestinataire ?></p>
											<p><strong>Date du Message:</strong>  <?php echo $donnees['dateMessage']; ?></p>
											<p><strong>Logement vous avez demandé: </strong><?php echo $adresse.", ".$ville;?> </p>
											<p><strong>Date oú vous irez chez <?php echo $nomDestinataire ?>: </strong> Du <?php echo $donnees['disponibiliteEmetteurArrivee']; ?> au <?php echo $donnees['disponibiliteEmetteurDepart']; ?> </p>
											<p><strong>Date oú  <?php echo $nomDestinataire ?> viendra chez vous:</strong> Du <?php echo $donnees['disponibiliteDestinataireArrivee']; ?> au <?php echo $donnees['disponibiliteDestinataireDepart']; ?></p>

											<?php  //je cherche le lien du contrat signé par l' autre part.
												 	

													$typeContrat="contratA";
													$text6= "SELECT * FROM contrats WHERE idEchange=$idEchange AND typeContrat='$typeContrat'";
												 	$query6 = mysqli_query($link,$text6) or die (mysqli_error($link));
												 	$donnees6= mysqli_fetch_array($query6);
												 	$lienContrat=$donnees6['routeContrat'];

												?>
												
											<p><strong> Votre contrat de confirmation: </strong>
												<a href="<?php echo "../".$donnees6['routeContrat'] ;?>" target="_blank">CONTRAT</a>
											 </p>





							<?php

							}
							elseif($donnees['typeMessage']=="confirmationFinale"){?>
								



											<h2> Echange Confirmé Definitivement!</h2>
											
											<p><strong>To:</strong>  <?php echo $nomDestinataire ?></p>
											<p><strong>Date du Message:</strong>  <?php echo $donnees['dateMessage']; ?></p>
											<p><strong>Logement vous avez demandé: </strong><?php echo $adresse.", ".$ville;?> </p>
											<p><strong>Date où  <?php echo $nomDestinataire ?> viendra chez vous: </strong>  Du <?php echo $donnees['disponibiliteDestinataireArrivee']; ?> au <?php echo $donnees['disponibiliteDestinataireDepart']; ?> </p>

											<p><strong>Date où vous irez chez <?php echo $nomDestinataire ?>:</strong>Du <?php echo $donnees['disponibiliteEmetteurArrivee']; ?> au <?php echo $donnees['disponibiliteEmetteurDepart']; ?></p>

											<?php  //je cherche le lien du contrat signé par l' autre part.
												 	

													$typeContrat="contratB";
													$text6= "SELECT * FROM contrats WHERE idEchange=$idEchange AND typeContrat='$typeContrat'";
												 	$query6 = mysqli_query($link,$text6) or die (mysqli_error($link));
												 	$donnees6= mysqli_fetch_array($query6);
												 	$lienContrat=$donnees6['routeContrat'];

												?>
												
											<p><strong> Votre contrat de confirmation: </strong>
												<a href="<?php echo "../".$donnees6['routeContrat'] ;?>" target="_blank">CONTRAT</a>
											 </p>





							<?php

							}

                                                }


						

							
						if ($reçu=='0'){ //c' est un message reçu
						?>
							
							<!--SEULEMENT SI LE MESSAGE EST UNE DEMANDE, ON DONNE LA POSIBILITÉ DE REPONDRE-->
							<?php 
							if($donnees['typeMessage']=="demandeEchange"){ //DEMANDE D' ECHANGE
								//JE regarde si le message a été repondu ou pas encore.
								
								$idEchange=$donnees['idEchange'];

								$text3= "SELECT COUNT(idMessage) AS count FROM messages WHERE typeMessage LIKE '%reponse%' AND idEchange=$idEchange ";
			                    $query3 = mysqli_query($link,$text3) or die (mysqli_error($link));
			                    $donnees3=mysqli_fetch_array($query3);
			                    $count=$donnees3["count"];

			                    if($count!=0){//le message a eté répondu
								?>
										<p style=" color:#C4420F; "> Demande d' echange  déjà répondue. </p>
										<br/>
										<a href="messages.php?typeMessages=reçus" class="voir_habitation" style="position:relative; margin-left:250px ; margin-right:150px; margin-right:auto; margin-top: 100px;">Retour</a>

								
								<?php
								}
								else{	//le message n' as pas encore été repondu	
								
									?> 

									
									<br/>
									<a href="repondre.php?idMessage=<?php echo $idMessage;?>" class="voir_habitation" style="position:relative; margin-left:150px; margin-right:auto; margin-top: 50px;">Répondre </a>
									<a href="messages.php?typeMessages=reçus" class="voir_habitation" style="position:relative; margin-left:20px ; margin-right:150px; margin-right:auto; margin-top: 50px;">Retour</a>
							<?php
								}

							}//demande d' echange
							
							elseif($donnees['typeMessage']=="reponseRefus"){ //refus
								?>

								<p style=" color:#C4420F; "> Vous ne pouvez plus répondre à ce message. </p>
								<br/>
								<a href="messages.php?typeMessages=reçus" class="voir_habitation" style="position:relative; margin-left:250px ; margin-right:150px; margin-right:auto; margin-top: 50px;">Retour</a>

					<?php	}
							
							elseif($donnees['typeMessage']=="reponseAccepte"){ //accepté
									
					?>				

							<?php
								//je veux savoir si l' echange a été dejà confirmé:
								$idEchange=$donnees['idEchange'];

								$text3= "SELECT COUNT(idMessage) AS count FROM messages WHERE typeMessage LIKE '%confirmation%' AND idEchange=$idEchange ";
			                    $query3 = mysqli_query($link,$text3) or die (mysqli_error($link));
			                    $donnees3=mysqli_fetch_array($query3);
			                    $count=$donnees3["count"];
								if($count>0){ //il a été dejà confirmé!! ?>

											<br/><br/>
											<p style=" color:#C4420F; ">Ce message a été dejà confirmé.</p>
											<br/><br/>
							<?php
								}
								else{
							?>
												
										</div>
									</article>

									<article>
									<div id="description">

											<p style=" color:#C4420F; "> Pour finir l' echange: </p>


											<ul style=" color:#C4420F; ">
												<li>Imprimez ce <a href="contrat.pdf" target="_blank">CONTRAT</a> </li>
												<li>Remplissez-le</li>
												<li>Signez-le</li>
												<li>Envoyez-le en cliquant sur "Confirmer"</li>


											</ul>
											<br/>

											
											<a href="confirmer.php?idEchange=<?php echo $idEchange;?>" class="voir_habitation" style="position:relative; margin-left:150px; margin-right:auto; margin-top: 50px;">Confirmer </a>
							<?php
								}	
							?>
											<a href="messages.php?typeMessages=reçus" class="voir_habitation" style="position:relative; margin-left:150px ; margin-right:150px; margin-right:auto; margin-top: 50px;">Retour</a>
					<?php	}
							elseif($donnees['typeMessage']=="confirmation"){ 

								//je veuz savoir si l' echange a eté dejà confirmé difinitivement

								$idEchange=$donnees['idEchange'];

								$text7= "SELECT COUNT(idMessage) AS count FROM messages WHERE typeMessage LIKE '%confirmationFinale%' AND idEchange=$idEchange ";
			                    $query7 = mysqli_query($link,$text7) or die (mysqli_error($link));
			                    $donnees7=mysqli_fetch_array($query7);
			                    $count=$donnees7["count"];
								if($count>0){ //il a été dejà confirmé definitivement!! ?>

											<br/><br/>
											<p style=" color:#C4420F; ">Cet échange a été dejà confirmé definitivement.</p>
											<br/><br/>


									<?php
								}
								else{ ?>
										<br/><br/>
										<a href="confirmerDefinitivement.php?idEchange=<?php echo $idEchange;?>" class="voir_habitation" style="position:relative; margin-left:150px; margin-right:auto; margin-top: 50px;">Confirmer Definitivement </a>

								<?php
								}



							}

							
							
							
						}//c' est un message reçu

						if($reçu=='1'){ // c' est un message envoyé
						?>
								
							<br/>
							<a href="messages.php?typeMessages=envoyes" class="voir_habitation" style="position:relative; margin-left:200px ; margin-right:150px; margin-right:auto; margin-top: 50px;">Retour</a>

							
					<?php }
						if($reçu=='2'){ // le message n' est pas pour le client connecté	?>
							
							<br/>
							<p style=" color:#C4420F; ">Ce message n' est pas pour vous</p>
							<br/>
							<a href="messages.php?index.php" class="voir_habitation" style="position:relative; margin-left:20px ; margin-right:150px; margin-right:auto; margin-top: 50px;">Accueil</a>

					<?php } ?>
						
					
				</div>

			</article>

		<?php 	
		mysqli_close($link); 
		include("footer.php"); ?>
	
	</body>

</html>