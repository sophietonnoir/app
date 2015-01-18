
<fieldset>
		<legend> Modifier une page </legend>
<form method="post" action="backofficeindex.php?page=edit">
		<select name="page" id="page" class="donnee">
								<option value="contact">Contact</option>
								<option value="faq">FAQ</option>
								<option value="cgu">Conditions générales</option>
								<option value="regle">Règles</option>
								<option value="confidentialite">Confidentialité</option>
								<option value="aide">Aide</option>
								<option value="apropos">A propos</option>
		</select>
		<input type="submit" name="Modifier" value="Modifier" />
</form>
</fieldset>

<fieldset>
		<legend> Chercher un profil par pseudo</legend>
		<form method="post" action="backofficeindex.php?page=profilsearch">
				<input type="text" name="pseudo" />
				<input type="submit" name="search" value="Chercher" />
		</form>
</fieldset>

<fieldset>
		<legend> Creer un profil</legend>
		<form method="post" action="backofficeindex.php?page=profilajout">
				<input type="submit" name="create" value="Creer" />
		</form>
</fieldset>


		