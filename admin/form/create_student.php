<?php
require_once "../../include/functions.php";
include_once "../../include/db_connect.php";
$metier = "eleve";
$valid = "";
include "../include/aside.php" ;

if(isset($_GET['id'])) { // Si un ID est passé en GET c'est une édition
$id=$_GET['id'];
$req = $bdd->prepare('SELECT * FROM etudiant WHERE id = :id');
$req->execute(array(
	'id' => $id));
$etudiant = $req->fetch();
}
if(isset($_GET['delete'])) { // Si un ID est passé en GET c'est une édition
$id=$_GET['delete'];
$req = $bdd->prepare('DELETE FROM etudiant WHERE id = :id');
$req->execute(array(
	'id' => $id));

echo "<form>L'élève a bien été supprimé</form></body></html>";
exit();
}
if(isset($_POST['id'])){ 
	if (!empty($_POST['nom'])){
		$errornom="1";
	}else{
		$errornom="error";
	}	
	if (!empty($_POST['code'])){
		$errormodule="1";
	}else{
		$errormodule="error";
	}	
	if (!empty($_POST['module'])){
		$errorue="1";
	}else{
		$errorue="error";
	}	

	$code = $_POST['code'];
	$module = $_POST['module'];
	$enseignant = $_POST['enseignant'];
	$nom = $_POST['nom'];
	$couleurmatiere = "1234567890";
	$memo = $_POST['memo'];
	$departement = $_POST['choice_department'];
	$annee = date('Y');
	$coef = $_POST['coef'];
	$id = $_POST['id'];

		if ($_POST['id']=="A") { //Creation nouveal eleve
			$req = $bdd->prepare('INSERT INTO matiere(codematiere, modulematiere, enseignantmatiere, nommatiere, couleurmatiere, memomatiere, dept, annee, coef) VALUES(:codematiere, :modulematiere, :enseignantmatiere, :nommatiere, :couleurmatiere, :memomatiere, :dept, :annee, :coef)');
			$req->execute(array(
				'codematiere' => $code,
				'modulematiere' => $module,
				'enseignantmatiere' => $enseignant,
				'nommatiere' => $nom,
				'couleurmatiere' => $couleurmatiere,
				'memomatiere' => $memo,
				'dept' => $departement,
				'annee' => $annee,
				'coef' => $coef
				));

		}else{ //update
			$req = $bdd->prepare('UPDATE matiere 
				SET codematiere = :codematiere, modulematiere = :modulematiere, enseignantmatiere = :enseignantmatiere, nommatiere = :nommatiere, couleurmatiere = :couleurmatiere dept = :dept, annee = :annee, memomatiere = :memomatiere, coef = :coef,
				WHERE id = :nid');
			$req->execute(array(
				'codematiere' => $code,
				'modulematiere' => $module,
				'enseignantmatiere' => $enseignant,
				'nommatiere' => $nom,
				'couleurmatiere' => $couleurmatiere,
				'memomatiere' => $memo,
				'dept' => $departement,
				'annee' => $annee,
				'coef' => $coef,
				'nid' => $id
				));
		}
		$valid=" <b>validé !</b>";
	}
	?>


	<form action="">

		<legend>Nouvel élève</legend>
		<fieldset>
			<span class="select">
				<select name="choice_title" id="genre">
					<option value="Madame">Mme</option>
					<option value="Monsieur">M.</option>
				</select>
			</span>
			<input type="text" class="middle" placeholder="Prénom">
			<input type="text" class="middle" placeholder="Nom">
			<label class="right">Filière :</label>
			<span class="select">
				<select name="" id="">
					<option value="mmi">MMI</option>
					<option value="pub">PUB</option>
					<option value="mp">MP</option>
				</select>
			</span>
			<label for="">Année :</label>
			<span class="right select">
				<select name="" id="">
				<option value="">1A</option>
				<option value="">2A</option>
			</select>

		</fieldset>

		<fieldset>

			<fieldset class="perso">
				<input type="text" placeholder="Adresse">
				<input type="text" placeholder="Ville">
				<input type="text" placeholder="Code Postal">
				<input type="text" placeholder="Pays">
				<input type="tel" placeholder="Mobile">
				<input type="email" name="user_email" placeholder="Mail">		
			</fieldset>
		</fieldset>

		<fieldset>
			<input type="text" value="facebook" disabled="disabled"><input type="text" value="http://facebook.com/moi" disabled="disabled"><button type="button">Modifier</button><button type="button">Supprimer</button><br>
			<select name="" id="" >
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
		</select>
		<input type="url" placeholder="URL">
		<button type="button">Ajouter</button>
	</fieldset>

<fieldset>
	<textarea name="" id="" cols="100" rows="10" placeholder="Saissez votre note, 1000 caractères maxi"></textarea>
</fieldset>

<button type="button" class="delete">Supprimer</button>
<button type="button" class="submit">Valider</button>
</form>
</body>
</html>