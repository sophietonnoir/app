<header>
			<div id="top">
				
				
				
				<?php if(!isset ($_SESSION['id'])):?>
					
					<!--<li><a href="connexion.php" class="lien_header"> Ajouter un logement</a></li>-->
				
				<?php elseif(isset($_SESSION['nmaison'])):?>
                                       
                      <?php if($_SESSION['nmaison']!=0)
							{
									echo "<li><a href=\"meslogements.php\" class=\"lien_header\">Mes logements</a></li>\n" ;
	                                                
	                                echo "<li><a href=\"ajouterlogement.php\" class=\"lien_header\"> Ajouter un logement  </a></li>";

                                        /*Je Prend le numero de messages reçus*/
									$link = mysqli_connect("localhost", "root", "root") ;
									mysqli_select_db($link, 'keydb') or die("Erreur à la base de données");
									$id=$_SESSION['id'];
									$text="SELECT count(idMessage) AS total FROM messages WHERE lu=0 AND idDestinataire= $id";
									$query= mysqli_query($link,$text) or die (mysqli_error($link));
									$data=mysqli_fetch_assoc($query);

									echo "<li><a href=\"messages.php\" class=\"lien_header\">  Messages(".$data['total'].")</a></li>";



							}
						
							else
							{	
	                                                    ?>
	                                     <img class="ajout" src="Img/plus.png" src="+"/>
	                                                    <ul id="ajouter_logement">
										<?php 
										echo "<li><a href=\"ajouter/logement.php\" class=\"lien_header\"> Ajouter un logement  </a></li>";

										echo "<li><a href=\"messages.php\" class=\"lien_header\"> Messages</a></li>";
							}
							?>
				<?php endif;?>
				
						
					
				</ul>
                                             <?php if ($_SESSION['admin'] == 1){ ?>
<a href="backofficeindex.php" class="lien_header">Back office</a>
                              <?php  }
				
				
				 if (!isset($_SESSION['pseudo'])): ?>
					
					<ul id="connexion">
					<li><a href="connexion.php" class="lien_header">Se Connecter</a></li>
					<li> | </li>
					<li><a href="inscription.php" class="lien_header">S'inscrire</a></li>
					</ul>
					
				<?php else:?>
					
					<ul id="connexion">Connecté en tant que:
					<li><u><a href="monprofil.php" class="lien_header"><?php echo $_SESSION['pseudo'];?></a></u></li><li>|</li><li><a href="deconnexion.php" class="lien_header" >Déconnexion</a></li></ul>
					
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
						<li><a href="Parcourir.php"style="margin-left: 30px">Parcourir</a></li>
                                                <li><a href="https://www.facebook.com/pages/Key2Key/1428150817431545?ref=ts&fref=ts"style="margin-left:20px"><img src="Img/facebook.png" alt="facebook_logo" /></a></li>
						
					</ul>
					<ul id="nav2">
                                                <li><a href="https://twitter.com/Key2Key_France" style="margin-right:25px"><img src="Img/twitter.png" alt="twitter_logo" /></a></li>
						<li><a href="forum2.php" style="margin-right:40px">Forum</a></li>
						<li><a href="contact.php"style="margin-right:30px">Contact</a></li>
						
						
					</ul>
					</nav>
				<img src="Img/K2K_logo.png" alt="logo K2K" id="logo"/>