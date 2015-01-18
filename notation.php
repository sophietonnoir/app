<!DOCTYPE html>
<?php session_start()?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="notation.css" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - notation </title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
		<!--<script src="mon_script.js" src="APP.K2K/js/jquery.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	</head>
	
	
	<body>
		<div>
		<?php// if(isset($_SESSION['id'])):?>
		<form method="post"action="traitement_notation.php">
		
			<ul class="notes-echelle">
				<fieldset>
				<br></br>
				<li>
					<label for="note01" title="Note&nbsp;: 1 sur 5">1</label>
					<input type="radio" name="notesA" id="note01" value="1" />
				</li>
				<li>
					<label for="note02" title="Note&nbsp;: 2 sur 5">2</label>
					<input type="radio" name="notesA" id="note02" value="2" />
				</li>
				<li>
					<label for="note03" title="Note&nbsp;: 3 sur 5">3</label>
					<input type="radio" name="notesA" id="note03" value="3" />
				</li>
								<li>
					<label for="note04" title="Note&nbsp;: 4 sur 5">4</label>
					<input type="radio" name="notesA" id="note04" value="4" />
				</li>
								<li>
					<label for="note05" title="Note&nbsp;: 5 sur 5">5</label>
					<input type="radio" name="notesA" id="note05" value="5" />
				</li>
				<!--<input type="hidden"/>-->
				</br><br></br>
				 <input type="submit" value="votez"/>
				</fieldset>
			</ul>
				</form>
		</body>

				<Script>
				jQuery(document).ready(function(){// Du code en jQuery va pouvoir être tapé
   //$('monElement').maMethode();

											$("ul.notes-echelle input")
										// Lorsque le focus est sur un bouton radio
										.focus(function() {
											// On passe les notes supérieures à l'état inactif (par défaut)
											$(this).parent("li").nextAll("li").addClass("note-off");
											// On passe les notes inférieures à l'état actif
											$(this).parent("li").prevAll("li").removeClass("note-off");
											// On passe la note du focus à l'état actif (par défaut)
											$(this).parent("li").removeClass("note-off");
										})
										// Lorsque l'on sort du sytème de notation au clavier
										.blur(function() {
											// Si il n'y a pas de case cochée
											if($(this).parent("ul.notes-echelle").find("li input:checked").length == 0) {
												// On passe toutes les notes à l'état inactif
												$(this).parent("ul.notes-echelle").find("li").addClass("note-off");
											}
										});
											$("ul.notes-echelle input")
												// Lorsque le focus est sur un bouton radio
											.focus(function() {
												// On supprime les classes de focus
											$(this).parent("ul.notes-echelle").find("li").removeClass("note-focus");
												// On applique la classe de focus sur l'item tabulé
											$(this).parent("li").addClass("note-focus");
												// [...] cf. code précédent
											})
											// Lorsque l'on sort du sytème de notation au clavier
											.blur(function() {
												// On supprime les classes de focus
												$(this).parent("ul.notes-echelle").find("li").removeClass("note-focus");
												// [...] cf. code précédent
											})
											// Lorsque la note est cochée
											.click(function() {
												// On supprime les classes de note cochée
												$(this).parent("ul.notes-echelle").find("li").removeClass("note-checked");
												// On applique la classe de note cochée sur l'item choisi
												$(this).parent("li").addClass("note-checked");
											});
												// On simule un survol souris des boutons cochés par défaut
												$("ul.notes-echelle input:checked").parent("li").trigger("mouseover");
														// On simule un click souris des boutons cochés
												$("ul.notes-echelle input:checked").trigger("click");
												

										});

									
				</script>
				<?php // else:
				//echo ("<a href=\"connexion.php\">connectez vous pour continuer");
				//endif;
				?>

