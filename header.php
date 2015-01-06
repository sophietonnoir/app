<header>
			<div id="top">
				
				
				
				<?php if(!isset ($_SESSION['id'])):?>
					
					<!--<li><a href="connexion.php" class="lien_header"> Ajouter un logement</a></li>-->
				
				<?php elseif(isset($_SESSION['nmaison'])):?>
                                       
                      <?php if($_SESSION['nmaison']!=0)
							{
									echo "<li><a href=\"http://localhost/APPK2Kv2.1/meslogements.php\" class=\"lien_header\">Mes logements</a></li>\n" ;
	                                                
	                                echo "<li><a href=\"http://localhost/APPK2Kv2.1/ajouterlogement.php\" class=\"lien_header\"> Ajouter un logement  </a></li>";

	                                echo "<li><a href=\"http://localhost/APPK2Kv2.1/messages.php\" class=\"lien_header\">  Messages</a></li>";

							}
						
							else
							{	
	                                                    ?>
	                                     <img class="ajout" src="http://localhost/APPK2Kv2.1/Img/plus.png" src="+"/>
	                                                    <ul id="ajouter_logement">
										<?php 
										echo "<li><a href=\"http://localhost/APPK2Kv2.1ajouter/logement.php\" class=\"lien_header\"> Ajouter un logement  </a></li>";

										echo "<li><a href=\"http://localhost/APPK2Kv2.1/messages.php\" class=\"lien_header\"> Messages</a></li>";
							}
							?>
				<?php endif;?>
				
						
					
				</ul>
				
				
				<?php if (!isset($_SESSION['pseudo'])): ?>
					
					<ul id="connexion">
					<li><a href="http://localhost/APPK2Kv2.1/connexion.php" class="lien_header">Se Connecter</a></li>
					<li> | </li>
					<li><a href="http://localhost/APPK2Kv2.1/inscription3.php/inscription" class="lien_header">S'inscrire</a></li>
					</ul>
					
				<?php else:?>
					
					<ul id="connexion">Connecté en tant que:
					<li><u><a href="http://localhost/APPK2Kv2.1/monprofil.php" class="lien_header"><?php echo $_SESSION['pseudo'];?></a></u></li><li>|</li><li><a href="http://localhost/APPK2Kv2.1/deconnexion.php" class="lien_header" >Déconnexion</a></li></ul>
					
				<?php endif;?>
					
				
			</div>
		</header>
		<div id="bloc_page">
			<div id="bloc_haut">
				<div id="banniere">
						<p id="mot_banniere1">ENVIE DE CHANGER D'AIR?</p>
						<p id="mot_banniere2">KEY TO KEY</p>
					<img src="http://localhost/APPK2Kv2.1/Img/house.png" alt="Banniere" />
				</div></div></div>
				<nav>
					<ul id="nav1">
						<li><a href="http://localhost/APPK2Kv2.1index.php">Accueil</a></li>
						<li><a href="http://localhost/APPK2Kv2.1Parcourir.php"style="margin-left: 30px">Parcourir</a></li>
                                                <li><a href="https://www.facebook.com/pages/Key2Key/1428150817431545?ref=ts&fref=ts"style="margin-left:20px"><img src="http://localhost/APPK2Kv2.1/Img/facebook.png" alt="facebook_logo" /></a></li>
						
					</ul>
					<ul id="nav2">
                                                <li><a href="https://twitter.com/Key2Key_France" style="margin-right:25px"><img src="http://localhost/APPK2Kv2.1/Img/twitter.png" alt="twitter_logo" /></a></li>
						<li><a href="@" style="margin-right:40px">Forum</a></li>
						<li><a href="http://localhost/APPK2Kv2.1/contact.php"style="margin-right:30px">Contact</a></li>
						
						
					</ul>
					</nav>
				<img src="http://localhost/APPK2Kv2.1/Img/K2K_logo.png" alt="logo K2K" id="logo"/>