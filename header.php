<header>
			<div id="top">
				<img class="ajout" src="Img/plus.png" src="+"/>
				<ul id="ajouter_logement">
				
				<?php if(!isset ($_SESSION['id'])):?>
					
					<!--<li><a href="connexion.php" class="lien_header"> Ajouter un logement</a></li>-->
				
				<?php elseif(isset($_SESSION['nmaison'])):?>
					
						<?php if($_SESSION['nmaison']!=0)
						{
						echo "<li><a href=\"meslogements.php\" class=\"lien_header\">Mes logements</a></li>";
						}
					
						else
						{	
						echo "<li><a href=\"ajouterlogement.php\" class=\"lien_header\"> Ajouter un logement</a></li>";
						}
						?>
				<?php endif;?>
				
						
					
				</ul>
				
				
				<?php if ($_SESSION == NULL): ?>
					
					<ul id="connexion">
					<li><a href="connexion.php" class="lien_header">Se Connecter</a></li>
					<li> | </li>
					<li><a href="inscription.php" class="lien_header">S'inscrire</a></li>
					</ul>
					
				<?php else:?>
					
					<ul id="connexion">Connecté en tant que:
					<li><a href="monprofil.php"><?php echo $_SESSION['pseudo'];?></a></li><li>|</li><li><a href="deconnexion.php" class="lien_header" >Déconnexion</a></li></ul>
					
				<?php endif;?>
					
				
			</div>
		</header>
		<div id="bloc_page">
			<div id="bloc_haut">
				<div id="banniere">
						<p id="mot_banniere1">ENVIE DE CHANGER D'AIR?</p>
						<p id="mot_banniere2">KEY TO KEY</p>
					<img src="Img/house.png" alt="Banniere" />
				</div></div></div>
				<nav>
					<ul id="nav1">
						<li><a href="index.php">Accueil</a></li>
						<li><a href="@">Parcourir</a></li>
						<li><a href="@">News</a></li>
					</ul>
					<ul id="nav2">
						<li><a href="@">Forum</a></li>
						<li><a href="@">Contact</a></li>
						<li><a href="@"><img src="Img/facebook.png" alt="facebook_logo" /></a></li>
						<li><a href="@"><img src="Img/twitter.png" alt="twitter_logo" /></a></li>
					</ul>
					</nav>
				<img src="Img/K2K_logo.png" alt="logo K2K" id="logo"/>