<?php
$metier = "enseignant";
include_once "../../include/db_connect.php";
include "../include/header.php" ;
?>
	<form action="">

		<legend>Nouvel enseignant</legend>
		<fieldset>
			<input type="text" class="middle" placeholder="Prénom">
			<input type="text" class="middle" placeholder="Nom"><br />
			<label>Département principal :</label>
			<span class="select"><select name="" id="">
				<option value="mmi">MMI</option>
				<option value="pub">PUB</option>
				<option value="mp">MP</option>
			</select></span><br />
			<span>
			<input type="radio" name="statut" value="personnel-administratif" id="personnel-administratif"><label for="personnel-administratif">Personnel Administratif</label>
			<input type="radio" name="statut" value="invernant" id="invernant"><label for="invernant">Intervenant</label>
			<input type="radio" name="statut" value="department_chief" id="department_chief"><label for="department_chief">Chef de Département</label>
			<input type="radio" name="statut" value="Enseignant" checked id="Enseignant"><label for="Enseignant">Enseignant</label></span>


		</fieldset>

		<fieldset>
			<fieldset class="pro">
				<input type="text"  class="medium" placeholder="Entreprise">
				<input type="text" class="small" placeholder="Fonction">
				<input type="text" class="small" placeholder="Adresse">
				<input type="text" class="small" placeholder="Ville">
				<input type="text" class="smaller" placeholder="Code Postal">
				<input type="text" class="smaller"placeholder="Pays"><br />
				<input type="text" class="small" value="+33">
				<input type="email" class="middle right" name="user_email" placeholder="Mail">
			</fieldset>

			<fieldset class="perso">
				<input type="text" class="small" placeholder="Adresse">
				<input type="text" class="small" placeholder="Ville">
				<input type="text" class="smaller" placeholder="Code Postal">
				<input type="text" class="smaller"placeholder="Pays"><br />
				<input type="text" class="small" value="+33">
				<input type="email" class="middle right" name="user_email" placeholder="Mail">		
			</fieldset>
		</fieldset>

		<fieldset>
			<span class="select"><select name="" id="" >
			<option value="linkedin">Linkedin</option>
			<option value="viadeo">Viadeo</option>
			<option value="twitter">Twitter</option>
			<option value="blog">Blog</option>
			<option value="behance">Behance</option>
			<option value="pinterest">Pinterest</option>
			<option value="github">Github</option>
			<option value="vimeo">Vimeo</option>
			<option value="youtube">Youtube</option>
			<option value="slideshare">Slidedeshare</option>
			<option value="speacker-deck">Speacker Deck</option>
			<option value="googple-plus">Google+</option>
			<option value="facebook">Facebook</option>
		</select></span>
		<input type="url" class="middle"placeholder="URL">
		<button type="button">Ajouter</button>
	</fieldset>

	<fieldset>
		<input type="text" placeholder="Intitulé" class="small">
		<label>Du</label>
			<span class="select"><select name="" id="">
			<option>Lundi</option>
			<option>Mardi</option>
			<option>Mercredi</option>
			<option>Jeudi</option>
			<option>Vendredi</option>
		</select></span>
		<label>à</label><span class="select"><select name="" id=""><option>8h</option><option>9h</option>
<option>10h</option><option>11h</option><option>12h</option><option>13h</option><option>14h</option><option>15h</option><option>16h</option><option>17h</option><option>18h</option><option>19h</option></select></span>
		<label>au</label><span class="select"><select name="" id=""> 
			<option>Lundi</option>
			<option>Mardi</option>
			<option>Mercredi</option>
			<option>Jeudi</option>
			<option>Vendredi</option>
		</select></span>
		<label>à</label><span class="select"><select name="" id=""><option>9h</option>
<option>10h</option><option>11h</option><option>12h</option><option>13h</option><option>14h</option><option>15h</option><option>16h</option><option>17h</option><option>18h</option><option>19h</option><option>20h</option>
	</select></span>
	<button type="button">Ajouter</button>
</fieldset>

<fieldset>
	<textarea name="" id="" cols="100" rows="10" placeholder="Saissez votre note, 1000 caractères maxi"></textarea>
</fieldset>

<button type="button" class="submit">Valider</button>
<?php
if (isset($_GET['id'])) {
?>
<button type="button" class="delete">Supprimer</button>
<?php
}
?>
</form>
</body>
</html>