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

						<menu id="menu">
							<article>
							  <h2>Messages</h2>
							  <ul>
							 	 <li><a href="messages.php?typeMessages=reçus">Reçus</a></li>
							  	 <li><a href="messages.php?typeMessages=envoyes">Envoyés</a></li>
							  </ul>
							 </article>
						</menu>

						
						
						<?php

						$link = mysqli_connect("localhost", "root", "root") ;
						mysqli_select_db($link, 'keydb') or die("Erreur à la base de données");

				/***************************************REÇUS****************************************/
					
						 if($_GET['typeMessages'] == "reçus"): ?>
					

							

									<?php 
									   
									   	$query = mysqli_query($link,"SELECT * FROM messages WHERE idDestinataire=$idSession ORDER BY dateMessage  ") or die (mysqli_error($link)); 
										$nb_resultats = mysqli_num_rows($query); 
										
	               			
								 
										if($nb_resultats != 0): ?> 

										 <div class="messages">
											 <article><h2>Messages reçus <?php echo " (".$nb_resultats.")";?>
												 </h2>
													
		               			 				<table> 			 		
														<tr>
														  <td><strong>Nº: </strong></td> 
														  <td><strong>État: </strong></td> 
														  <td><strong>Envoyé par: </strong></td>
														  <td><strong>Date</strong></td>
														</tr>
												<?php		

												$numeroMessage=1;
												while($donnees = mysqli_fetch_array($query)) 

												{ ?> 

														<tr> 
														  <td><?php echo $numeroMessage ++; ?></td>
														   <?php
														  if ($donnees['lu']==1):?>
														  		<td><img width="25px" height="20px" src="imagesMessages/ouvert.JPG" /></td>
														  <?php	else:?>
																<td><img width="25px" height="20px" src="imagesMessages/ferme.JPG" /></td>
														  <?php	endif;

														  ?>
														  <td><?php echo $donnees['idEmetteur']?></td>
														  <td><?php echo $donnees['dateMessage']?></td>
														  <td><a href="@">Voir message</a></td>
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
											 <article><h2>Messages envoyés <?php echo " (".$nb_resultats.")";?>
												 </h2>
													
		               			 				<table> 			 		
														<tr> 
														  <td><strong>Nº: </strong></td> 
														  <td><strong>État: </strong></td> 
														  <td><strong>Envoyé à: </strong></td>
														  <td><strong>Date</strong></td>
														</tr>
												<?php		

												$numeroMessage=1;
												while($donnees = mysqli_fetch_array($query)) 

												{ ?> 

														<tr> 
														  <td><?php echo $numeroMessage ++; ?></td>
														  <td><?php echo $donnees['idDestinataire']?></td>
														  <td><?php echo $donnees['dateMessage']?></td>
														  <td><a href="@">Voir message</a></td>
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

						<menu id="menu">
							  <h1>Messages</h1>
							  <ul>
							  <li><a href="messages.php?typeMessages=reçus">Reçus</a></li>
							  <li><a href="messages.php?typeMessages=envoyes">Envoyés</a></li>
							  </ul>
						</menu>

				<?php endif; ?>

										
		<?php else :?>
			<article><h2 style=" color:#C4420F; ">Connectez vous pour voir vos messages</h2></article>
		<?php 
			endif;  
			include ("footer.php");
		?>

	</body>

</html>