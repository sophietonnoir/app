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

		<?php
			$idSession= $_SESSION['id']; 
				
			include("header.php"); 
			if ($_SESSION != NULL) :  	/*Si on est connecté*/

				if(isset($_GET['typeMessages']) && $_GET['typeMessages'] != NULL  )  : ?>

						<!--<menu id="menu">-->
							<article>
							  <h2 style="text-align:left">Messages : </h2>
							  <ul>
							 	 <li><a href="messages.php?typeMessages=reçus">Reçus</a></li>
							  	 <li><a href="messages.php?typeMessages=envoyes">Envoyés</a></li>
							  </ul>
							 </article>
						<!--</menu>-->

						
						
						<?php

						$link = mysqli_connect("localhost", "root", "") ; 
						mysqli_select_db($link, 'keydb') or die("Erreur à la base de données");

				/***************************************REÇUS****************************************/
					
						 if($_GET['typeMessages'] == "reçus"): ?>
					

							

									<?php 
									   	
									   $text= "SELECT * FROM messages WHERE idDestinataire=$idSession ORDER BY dateMessage  ";

									   	$query = mysqli_query($link,$text) or die (mysqli_error($link)); 
										$nb_resultats = mysqli_num_rows($query); 
										
	               			
								 
										if($nb_resultats != 0): ?> 

										 <div class="messages">
											 <article><h2 style="text-align:left">Messages reçus ( <?php echo $nb_resultats; ?> ) : </h2>
												 </h2>
													
		               			 				<table style="width:900px;"> 			 		
														<tr>
														  <td><strong>Nº: </strong></td> 
														  <td><strong>État: </strong></td> 
														  <td><strong>Envoyé par: </strong></td>
														  <td><strong>Type de message</strong></td>					<td><strong>Logement Demandé</strong></td>
														  <td><strong>Date du Message</strong></td>
														  
														</tr>
												<?php		

												$numeroMessage=1;
												while($donnees = mysqli_fetch_array($query)) 

												{ 
													/*Je cherche le nom prenom du Emetteur*/
													$idEmet= $donnees['idEmetteur'];
													$text2= "SELECT * FROM users WHERE id=$idEmet";
													$query2 = mysqli_query($link,$text2) or die (mysqli_error($link));

													$donnees2=mysqli_fetch_array($query2);
													
													$nom=$donnees2['nom'];
													$prenom=$donnees2['prenom'];

													?>

														<tr> 
														  <td><?php echo $numeroMessage ++; ?></td>
														   <?php
														  if ($donnees['lu']==1):?>
														  		<td><img width="25px" height="20px" src="imagesMessages/ouvert.JPG" /></td>
														  <?php	else:?>
																<td><img width="25px" height="20px" src="imagesMessages/ferme.JPG" /></td>
														  <?php	endif;

														  ?>
														  <td><?php echo $prenom." ".$nom;?></td>
														  <?php if ($donnees['typeMessage'] == "demandeEchange" ): ?>
														  		<td>Démande échange</td>
														  <?php else:?>
														  		<td>Réponse</td>
															  <?php endif;?>

														<!--On montre la direction du logement demandé-->
														<?php 
																$idLogDemande= $donnees['logementDemande'];
																$text3= "SELECT * FROM logements WHERE idLogement=$idLogDemande";
																$query3 = mysqli_query($link,$text3) or die (mysqli_error($link));

																$donnees3=mysqli_fetch_array($query3);
																
																$adresse=$donnees3['adresse'];
																$ville=$donnees3['Ville'];

														?>
														  <td><?php echo $adresse.", ".$ville;?></td>
														  <td><?php echo $donnees['dateMessage'];?></td>
														  <td><a href="voirMessage.php?idMessage=<?php echo $donnees['idMessage'];?>">Voir message</a></td>

														</tr>

												<?php
												} // fin de la boucle ?>
		
			               			 			</table>  
			               			 		</article>
										</div>
								
						<?php
									else: ?>
										<article><h2 style=" color:#C4420F; ">Aucun message reçu</h2></article>
									<?php
									endif;
						

						/***************************************ENVOYÉS****************************************/

						 elseif($_GET['typeMessages'] == "envoyes"): ?>
	
									<?php 

									    $query = mysqli_query($link,"SELECT * FROM messages WHERE idEmetteur=$idSession ORDER BY dateMessage  ") or die (mysqli_error($link));
										$nb_resultats = mysqli_num_rows($query); 
										
	               			
								 
										if($nb_resultats != 0): ?> 

										 <div class="messages">
										 	
											 <article><h2 style=\"text-align:left\">Messages envoyés( 
											 	<?php echo "$nb_resultats";  ?>  ) : </h2> 
											
												<table style="width:900px;"> 			 		
														<tr> 
														  <td><strong>Nº: </strong></td> 
														  <td><strong>Envoyé à: </strong></td>
														  <td><strong>Type de message</strong></td>		
														  <td><strong>Logement Demandé</strong></td>
														  <td><strong>Date du Message</strong></td>

														</tr>
												<?php		

												$numeroMessage=1;
												while($donnees = mysqli_fetch_array($query)) 

												{ 


														/*Je cherche le nom prenom du Emetteur*/
													$idDest= $donnees['idDestinataire'];
													$text2= "SELECT * FROM users WHERE id=$idDest";
													$query2 = mysqli_query($link,$text2) or die (mysqli_error($link));

													$donnees2=mysqli_fetch_array($query2);
													
													$nom=$donnees2['nom'];
													$prenom=$donnees2['prenom'];
														?>

														<tr> 
														  <td><?php echo $numeroMessage ++; ?></td>
														  <td><?php echo $prenom." ".$nom;?></td>
														  <?php if ($donnees['typeMessage'] == "demandeEchange") : ?>
														  		<td>Démande échange</td>
														  <?php else:?>
														  		<td>Réponse</td>
														  <?php endif;?>
														  <!--On montre la direction du logement demandé-->
															<?php 
																	$idLogDemande= $donnees['logementDemande'];
																	$text3= "SELECT * FROM logements WHERE idLogement=$idLogDemande";
																	$query3 = mysqli_query($link,$text3) or die (mysqli_error($link));

																	$donnees3=mysqli_fetch_array($query3);
																	
																	$adresse=$donnees3['adresse'];
																	$ville=$donnees3['Ville'];

															?>
														  <td><?php echo $adresse.", ".$ville;?></td>
														  <td><?php echo $donnees['dateMessage'];?></td>

														  <td><a href="voirMessage.php?idMessage=<?php echo $donnees['idMessage'];?>">Voir message</a></td>
														</tr>

												<?php
												} // fin de la boucle ?>
			
			               			 		</table>  
			               			 		</article>
										</div>
								
						<?php
									else: ?>
										<article><h2 style=" color:#C4420F; ">Aucun message envoyé</h2></article>
									<?php
									endif;


											
							 endif?>
					
				<?php 

					/**********************************SANS SELECTION***********************************/

				else: ?> 

						<article>
							  <h2  style="text-align:left">Messages</h2>
							  <ul>
							  <li><a href="messages.php?typeMessages=reçus">Reçus</a></li>
							  <li><a href="messages.php?typeMessages=envoyes">Envoyés</a></li>
							  </ul>
						</article>

				<?php endif; ?>

										
		<?php else :?>
			<article><h2 style=" color:#C4420F; ">Connectez vous pour voir vos messages</h2></article>
		<?php 
			endif;  

			mysqli_close($link); 
			include ("footer.php");
		?>

	</body>

</html>