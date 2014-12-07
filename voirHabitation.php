<body>


		<?php include("header.php"); ?>

		<div class="section">		<!--PHOTOS ROULANTES-->

			<div class="slide">
				<img src="exemplesImages/chambre.jpg" />
			</div>
			<div class="slide">
				<img src="exemplesImages/salon.jpg" />
			</div>

			<div class="slide">
				<img src="exemplesImages/cuisine.jpg" />
			</div>

		</div>

		<div >
									 <!--DONNÉES DE LA MAISON-->

			<article >
				<h2> DESCRIPTION DU LOGEMENT  </h2>
			</article >

			<article class="article2" >

				<div id="restrictions"> <!--Ce n'est pas un dernier-ajout mais c' est le même style-->

		<?php

					<ul>
						<li >Capacité:</li>
						<li >Chambres:</li>
						<li >Salles de bain:</li>
						<li >Permission de fumer:</li>
						<li >Presence d' animaux:</li>
						<li >Piscine:</li>
						<li >Places de garage: </li>
						<li >Wifi:</li>

					</ul>
			include("header.php");

				</div>

			</article>
			$link=mysqli_connect('localhost','root','root');

			if(isset($_GET['search']) && $_GET['search'] != NULL)  :

				mysqli_select_db($link, 'keydb'); // on se connecte à MySQL.

				$search = htmlspecialchars($_GET['search'] ); // on recupère le id du logement qu on veut visualiser

				//JE DEMANDE LES DONÉES DE LA MAISON AVEC CE ID.
				$queryLogement = mysqli_query($link,"SELECT * FROM logements WHERE idLogement= $search ") or die (mysqli_error($link));

				$donnees=mysqli_fetch_array($queryLogement);

				//JE DEMANDE LES PHOTOD DE LA MAISON AVEC CE ID.
				$queryPhotos= mysqli_query($link,"SELECT * FROM photo WHERE idLogement= $search ") or die (mysqli_error($link));




		?>

			<!--PHOTOS ROULANTES-->
			<div class="section">
				<?php while($photos = mysqli_fetch_array($queryPhotos)){

					echo '<div class="slide">'.'<img src="'.$photos['Liendelaphoto'].'" />'.'</div>';

				 } ?>

			</div>

			<!--DONNÉES DE LA MAISON-->






			<?php if ($_SESSION == NULL): ?> 	<!--pas connecté-->

			<article class="article3">
				<div  id="description">
						<p>DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION </p>
				</div>
			</article>


				 "CONNECTEZ-VOUZ POUR LA CHOISIR";

			<?php else: ?>					<!--connecté-->
			<div >

				<article >
					<h2> DESCRIPTION DU LOGEMENT  </h2>

				<article class="article4">
					<div  id="description">
						<p>	DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION DESCRIPTION


					<div id="description"> <!--Ce n'est pas un dernier-ajout mais c' est le même style-->

						<ul >
							<li >Surface: <?php echo $donnees['surface'];?>  </li>
							<li >Capacité: <?php echo $donnees['capacite'];?>  </li>
							<li >Chambres: <?php echo $donnees['chambres'];?>  </li>
							<li >Salles de bain: <?php echo $donnees['toilettes'];?>  </li>
							<li >Permission de fumer:
								<?php
								if($donnees['fumerPermis']==0){	echo " interdit";}
								else{echo " permis";}
								?>
							</li>
							<li >Presence d' animaux:
								<?php
									if($donnees['animauxPermis']==0){	echo " interdit";}
									else{echo " permis";}
								?>
							</li>
							<li >Piscine:
								<?php
									if($donnees['piscine']==0){	echo "non";}
									else{echo "oui";}
								?>
							</li>
							<li >Places de garage: <?php echo $donnees['placesGarage'];?>  </li>
							<li >Wifi:
								<?php
									if($donnees['wifi']==0){	echo "non";}
									else{echo "oui";}
								?>
							</li>
							<li >Jardin:
								<?php
									if($donnees['jardin']==0){	echo "non";}
									else{echo "oui";}
								?>
							</li>
						</ul>

						<p> <?php echo $donnees['Description'];?>
						</p>

						<a href="@" class="demanderEchange">Demander Échange </a>
						<?php if ($_SESSION != NULL) :  ?> 	<!--Si on est connecté, on montre
															 le button "démander échange"-->
							<a href="@" class="demanderEchange">Demander Échange </a> </br></br></br>

						<?php endif;  ?>
						<?php mysqli_close($link); ?>  <!--fermer la bd-->

					</div>


				</article>
					</div> <!--description-->

				<!--CHOISIR HABITATION

				-->


				</article >

			</div>

		<?php

			<?php endif;?>
			else : //idLogement==NULL

		 ?>
					<article><h2 style=" color:#C4420F; "> Logement demandé incorrect </h2></article>

		<?php
			//else
			endif;
			include("footer.php");

		?>

		</div>

		<?php include("footer.php"); ?>

	</body> 
	</body>

</html> 
