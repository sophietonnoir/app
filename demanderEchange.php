<?php session_start()?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Accueil</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />

		<?php 	include("calendrier.php"); //javaScript pour le php?> 

	</head>

	<body>

			
		<?php
				
			include("header.php"); 
			
			$idSession= $_SESSION['id']; 
			if ($_SESSION != NULL) :  /*Si on est connecté*/

				$idProprietaire=$_GET['proprietaire'];
				$idLogement=$_GET['logement'];
			?> 	

			<br/><br/>

			<fieldset class="fieldset2">
						<legend> Ajouter un logement: </legend>
                        <form method="post" action="demanderEchangeSuite.php?proprietaire=<?php echo $idProprietaire;?>&logement=<?php echo $idLogement; ?> "/>

                        <label for="" class="label"> Donnez dates où vous désirez aller dans ce logement(MM/JJ/AAAA):<br/></label>
                        
                        <p style="margin-left:200px ;">	
                        
		                         <script>
										 $(function() {
							 						$( "#datepicker1" ).datepicker();
											});
								 </script>
								Du: <input id="datepicker1" name="date1" type="text" size="28" onFocus="javascript:this.value=''" placeholder="Date d' arrivée" />
								<script>
										 $(function() {
							 						$( "#datepicker2" ).datepicker();
											});
								 </script>
								Au: <input id="datepicker2" name="date2" type="text" size="28" onFocus="javascript:this.value=''" placeholder="Date de départ" />

						</p>    

            			<!--<textarea rows="4" cols="50" class="textarea" name="dates1"></textarea><br/><br/>-->

            			<label for="" class="label">Donnez les dates où vous désirez que le propriétaire de ce logement vienne chez vous(MM/JJ/AAAA):<br/></label>
            			<p style="margin-left:200px ;">
            					<script>
										 $(function() {
							 						$( "#datepicker3" ).datepicker();
											});
								 </script>
								 Du: <input id="datepicker3" name="date3" type="text" size="28" onFocus="javascript:this.value=''" placeholder="Date d' arrivée" />
								<script>
										 $(function() {
							 						$( "#datepicker4" ).datepicker();
											});
								 </script>
								Au: <input id="datepicker4" name="date4" type="text" size="28" onFocus="javascript:this.value=''" placeholder="Date de départ" />

						</p>    


            			<!--<textarea rows="4" cols="50" class="textarea" name="dates2"></textarea><br/><br/>-->
						

						<label for="" class="label">Message pour le propriétaire :</label><br/>
             			<textarea style="margin-left:200px ;" rows="4" cols="50" class="textarea" name="message"></textarea><br/><br/>

             			<label for="" class="label">Logement que vous proposez :</label><br/>
             			<?php

                                                                $link = mysqli_connect("localhost", "root", "root") ;
                                                                mysqli_select_db($link, 'keydb') or die("Erreur de connexion à la base de donnée" );

                                                                $text= "SELECT * FROM logements WHERE idPropietaire=$idSession ";
							 	$query = mysqli_query($link,$text) or die (mysqli_error($link));
							 	
                                                                ?>

							 	<select id="maison" name="maison" class="select">
							 	<?php
							 	while($donnees = mysqli_fetch_array($query)) 
								
								{ ?>
									
								   	 <option value="<?php echo $donnees['idLogement']; ?>">  <?php echo $donnees['adresse'].", ".$donnees['Ville']; ?>   </option>
								         

                                                        <?php
								}	
             			?>
             				   </select>
             			<input type="submit" name="Ajouter mon logement" value="Envoyer" class="submit" />
                   		                   	
			</fieldset>
			<br/><br/>

		<?php else :?>
				<article><h2 style=" color:#C4420F; ">Connectez vous pour démander un échange</h2></article>
		<?php endif;  
			include ("footer.php");
		?>

	</body>

</html>