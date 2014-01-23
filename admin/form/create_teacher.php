<?php
require_once "../../include/functions.php";
include_once "../../include/db_connect.php";
$metier = "enseignant";
include "../include/header.php" ;

if(isset($_GET['id'])) { // Si un ID est passé en GET c'est une édition
	$id=$_GET['id'];
    $req = $bdd->prepare('SELECT * FROM enseignant WHERE id = :id');
    $req->execute(array(
        'id' => $id));
    $enseignant = $req->fetch();
}
if(isset($_GET['delete'])) { // Si un ID est passé en GET c'est une édition
	$id=$_GET['delete'];
    $req = $bdd->prepare('DELETE FROM enseignant WHERE id = :id');
    $req->execute(array(
        'id' => $id));

    echo "<form>L'enseignant à bien été supprimé</form></body></html>";
    exit();
}
if(isset($_POST['id'])){ 
	if (!empty($_POST['prenom'])){
		$errorprenom="1";
	}else{
		$errorprenom=" error";
	}
	if (!empty($_POST['nom'])){
		$errornom="1";
	}else{
		$errornom=" error";
	}
	if (!empty($_POST['adresse'])){
		$erroradresse="1";
	}else{
		$erroradresse=" error";
	}
	if (!empty($_POST['ville'])){
		$errorville="1";
	}else{
		$errorville=" error";
	}
	if (!empty($_POST['pays'])){
		$errorpays="1";
	}else{
		$errorpays=" error";
	}
	if (!empty($_POST['telephone'])){
		$errortelephone="1";
	}else{
		$errortelephone=" error";
	}
	if((verif_mail($_POST['email'])==1) AND (!empty($_POST['email']))){ // Verif mail
		$errormail="1";
	}
	else{
		$errormail=" error";
	}
	if((verif_cp($_POST['codepostal'])==1) AND (!empty($_POST['codepostal']))){ // Verif cp
		$errorcp="1";
	}
	else{
		$errorcp=" error";
	}

	if(($errorprenom=="1") AND ($errornom=="1") AND ($erroradresse=="1") AND ($errorville=="1") AND ($errorpays=="1") AND ($errortelephone=="1") AND ($errormail=="1") AND ($errorcp=="1")){
		$genre = $_POST['genre'];
		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$departement = $_POST['departement'];
		$statut = $_POST['statut'];

		$entreprise = $_POST['entreprise'];
		$fonction = $_POST['fonction'];
		$adresse = $_POST['adresse'];
		$ville = $_POST['ville'];
		$codepostal = $_POST['codepostal'];
		$pays = $_POST['pays'];
		$telephone = $_POST['telephone'];
		$email = $_POST['email'];
		$memo = $_POST['memo'];
		$id = $_POST['id'];

		$codeenseignant = strtolower($prenom{0}.$nom);

		if ($_POST['id']=="A") { //Creation nouvel enseignant
			$req = $bdd->prepare('INSERT INTO enseignant(codeenseignant, statutenseignant, departementenseignant, titreenseignant, nomenseignant, prenomenseignant, emailenseignant, adresse1enseignant, adresse2enseignant, codepostalenseignant, villeenseignant, telephoneportable, fonctionenseignant, nomentreprise, memoenseignant) VALUES(:codeenseignant, :statutenseignant, :departementenseignant, :titreenseignant, :nomenseignant, :prenomenseignant, :emailenseignant, :adresse1enseignant, :adresse2enseignant, :codepostalenseignant,
				 :villeenseignant, :telephoneportable, :fonctionenseignant, :nomentreprise, :memoenseignant)');
			$req->execute(array(
				'codeenseignant' => $codeenseignant,
				'statutenseignant' => $statut,
				'departementenseignant' => $departement,
				'titreenseignant' => $genre,
				'nomenseignant' => $nom,
				'prenomenseignant' => $prenom,
				'emailenseignant' => $email,
				'adresse1enseignant' => $adresse,
				'adresse2enseignant' => $pays,
				'codepostalenseignant' => $codepostal,
				'villeenseignant' => $ville,
				'telephoneportable' => $telephone,
				'fonctionenseignant' => $fonction,
				'nomentreprise' => $entreprise,
				'memoenseignant' => $memo
				));

		}else{ //update
			$req = $bdd->prepare('UPDATE enseignant 
				SET codeenseignant = :codeenseignant, statutenseignant = :statutenseignant, departementenseignant = :departementenseignant, titreenseignant = :titreenseignant, nomenseignant = :nomenseignant, prenomenseignant = :prenomenseignant, emailenseignant = :emailenseignant, adresse1enseignant = :adresse1enseignant, adresse2enseignant= :adresse2enseignant, codepostalenseignant = :codepostalenseignant, villeenseignant = :villeenseignant, telephoneportable = :telephoneportable, fonctionenseignant = :fonctionenseignant,  nomentreprise = :nomentreprise, memoenseignant = :memoenseignant
				WHERE id = :nid');
			$req->execute(array(
				'codeenseignant' => $codeenseignant,
				'statutenseignant' => $statut,
				'departementenseignant' => $departement,
				'titreenseignant' => $genre,
				'nomenseignant' => $nom,
				'prenomenseignant' => $prenom,
				'emailenseignant' => $email,
				'adresse1enseignant' => $adresse,
				'adresse2enseignant' => $pays,
				'codepostalenseignant' => $codepostal,
				'villeenseignant' => $ville,
				'telephoneportable' => $telephone,
				'fonctionenseignant' => $fonction,
				'nomentreprise' => $entreprise,
				'memoenseignant' => $memo,
				'nid' => $id
				));

		}
		$valid=" <b>validé !</b>";
	}else{
		$valid=" <b>non validé !</b>";
	}
}
?>
	<form method="post">
		<?php if(isset($_GET['id'])) { // Si un ID est passé en GET c'est une édition ?>
		<legend>Modifier l'enseignant <b><?php echo $enseignant['prenomenseignant'].' '.$enseignant['nomenseignant']; ?></b><?php echo $valid; ?></legend>
		<?php }else{  ?>
		<legend>Nouvel enseignant<?php echo $valid; ?></legend>
		<?php } ?>
		<fieldset>
		<span class="select"><select name="genre" id="genre">
				<option value="Mme" <?php if(isset($_POST['id'])){ if($_POST['genre']=="Mme"){ echo "selected"; } }else if(isset($_GET['id'])){ if($enseignant['titreenseignant']=="Mme"){ echo "selected"; } } ?>>Mme</option>
				<option value="M" <?php if(isset($_POST['id'])){ if($_POST['genre']=="M"){ echo "selected"; } }else if(isset($_GET['id'])){ if($enseignant['titreenseignant']=="M"){ echo "selected"; } } ?>>M.</option>
			</select></span>
			<input name="prenom" type="text" class="middle <?php echo $errorprenom; ?>" value="<?php if(isset($_POST['id'])){ echo $_POST['prenom']; } else if(isset($_GET['id'])){ echo $enseignant['prenomenseignant']; } ?>" placeholder="Prénom *">
			<input name="nom" type="text" class="middle <?php echo $errornom; ?>" value="<?php if(isset($_POST['id'])){ echo $_POST['nom']; } else if(isset($_GET['id'])){ echo $enseignant['nomenseignant']; } ?>" placeholder="Nom *">
			<label>Département principal :</label>
			<span class="select"><select name="departement">
				<option value="PUB" <?php if(isset($_POST['id'])){ if($_POST['departement']=="PUB"){ echo "selected"; } }else if(isset($_GET['id'])){ if($enseignant['departementenseignant']=="PUB"){ echo "selected"; } } ?>>PUB</option>
				<option value="MMI" <?php if(isset($_POST['id'])){ if($_POST['departement']=="MMI"){ echo "selected"; } }else if(isset($_GET['id'])){ if(($enseignant['departementenseignant']=="MMI") OR ($enseignant['departementenseignant']=="SRC")){ echo "selected"; } } ?>>MMI</option>
				<option value="LP" <?php if(isset($_POST['id'])){ if($_POST['departement']=="LP"){ echo "selected"; } }else if(isset($_GET['id'])){ if($enseignant['departementenseignant']=="LP"){ echo "selected"; } } ?>>LP</option>
				<option value="CS" <?php if(isset($_POST['id'])){ if($_POST['departement']=="CS"){ echo "selected"; } }else if(isset($_GET['id'])){ if($enseignant['departementenseignant']=="CS"){ echo "selected"; } } ?>>CS</option>
				<option value="ADMIN" <?php if(isset($_POST['id'])){ if($_POST['departement']=="ADMIN"){ echo "selected"; } }else if(isset($_GET['id'])){ if($enseignant['departementenseignant']=="ADMIN"){ echo "selected"; } } ?>>ADMIN</option>
			</select></span><br />
			<span>
			
			<input name="statut" type="text" class="smaller autre" value="<?php if(isset($_POST['id'])){ echo $_POST['statut']; } else if((isset($_GET['id'])) AND (($enseignant['statutenseignant']!="BIATOS") AND ($enseignant['statutenseignant']!="VACNF") AND ($enseignant['statutenseignant']!="PRCE_PRAG") AND ($enseignant['statutenseignant']!="PRCE/PRAG") AND ($enseignant['statutenseignant']!="VAC"))){ echo $enseignant['statutenseignant']; } ?>" id="autreinput" placeholder="Autre *">
			<input type="radio" name="autreval" value="autre" id="autre" <?php if((isset($_GET['id'])) AND (($enseignant['statutenseignant']!="BIATOS") AND ($enseignant['statutenseignant']!="VACNF") AND ($enseignant['statutenseignant']!="PRCE_PRAG") AND ($enseignant['statutenseignant']!="PRCE/PRAG") AND ($enseignant['statutenseignant']!="VAC"))){ echo 'checked'; } ?>><label id="autrelab" for="autre">Autre</label>
			
			<input type="radio" name="statut" value="BIATOS" id="personnel-administratif" <?php if(isset($_POST['id'])){ if($_POST['statut']=="BIATOS"){ echo "checked"; } }else if(isset($_GET['id'])){ if($enseignant['statutenseignant']=="BIATOS"){ echo "checked"; } } ?>><label for="personnel-administratif">Personnel Administratif (BIATOS)</label>
			<input type="radio" name="statut" value="VACNF" id="invernant" <?php if(isset($_POST['id'])){ if($_POST['statut']=="VACNF"){ echo "checked"; } }else if(isset($_GET['id'])){ if($enseignant['statutenseignant']=="VACNF"){ echo "checked"; } } ?>><label for="invernant">Intervenant (VACNF)</label>
			<input type="radio" name="statut" value="PRCE_PRAG" id="department_chief" <?php if(isset($_POST['id'])){ if($_POST['statut']=="PRCE_PRAG"){ echo "checked"; } }else if(isset($_GET['id'])){ if(($enseignant['statutenseignant']=="PRCE_PRAG") OR ($enseignant['statutenseignant']=="PRCE/PRAG")){ echo "checked"; } } ?>><label for="department_chief">Chef de Département (PRCE_PRAG)</label>
			<input type="radio" name="statut" value="VAC" id="Enseignant" <?php if(isset($_POST['id'])){ if($_POST['statut']=="VAC"){ echo "checked"; } }else if(isset($_GET['id'])){ if($enseignant['statutenseignant']=="VAC"){ echo "checked"; } }else{ echo "checked"; } ?>><label for="Enseignant">Enseignant (VAC)</label></span>
			<input type="hidden" name="id" value="<?php if(isset($_GET['id'])) { echo $_GET['id']; }else{ echo "A"; } ?>">
		</fieldset>

		<fieldset>
			<fieldset class="pro">
				<input name="entreprise" type="text"  class="medium" value="<?php if(isset($_POST['id'])){ echo $_POST['entreprise']; } else if(isset($_GET['id'])){ echo $enseignant['nomentreprise']; } ?>" placeholder="Entreprise">
				<input name="fonction" type="text" class="small" value="<?php if(isset($_POST['id'])){ echo $_POST['fonction']; } else if(isset($_GET['id'])){ echo $enseignant['fonctionenseignant']; } ?>" placeholder="Fonction *">
			</fieldset>

			<fieldset class="perso">
				<input name="adresse" type="text" class="small <?php echo $erroradresse; ?>" value="<?php if(isset($_POST['id'])){ echo $_POST['adresse']; } else if(isset($_GET['id'])){ echo $enseignant['adresse1enseignant']; } ?>" placeholder="Adresse *">
				<input name="ville" type="text" class="small <?php echo $errorville; ?>" value="<?php if(isset($_POST['id'])){ echo $_POST['ville']; } else if(isset($_GET['id'])){ echo $enseignant['villeenseignant']; } ?>" placeholder="Ville *">
				<input name="codepostal" type="text" class="smaller <?php echo $errorcp; ?>" value="<?php if(isset($_POST['id'])){ echo $_POST['codepostal']; } else if(isset($_GET['id'])){ echo $enseignant['codepostalenseignant']; } ?>" placeholder="Code Postal *">
				<input name="pays" type="text" class="smaller <?php echo $errorpays; ?>" value="<?php if(isset($_POST['id'])){ echo $_POST['pays']; } else if(isset($_GET['id'])){ echo $enseignant['adresse2enseignant']; } ?>" placeholder="Pays *"><br />
				<input name="telephone" type="text" class="small <?php echo $errortelephone; ?>" value="<?php if(isset($_POST['id'])){ echo $_POST['telephone']; } else if(isset($_GET['id'])){ echo $enseignant['telephoneportable']; } ?>" placeholder="+33 *">
				<input name="email" type="text" class="middle right <?php echo $errormail; ?>" value="<?php if(isset($_POST['id'])){ echo $_POST['email']; } else if(isset($_GET['id'])){ echo $enseignant['emailenseignant']; } ?>" placeholder="Mail *">		
			</fieldset>
		</fieldset>

	<fieldset>
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
	<textarea name="memo" id="" cols="100" rows="10" placeholder="Saissez votre note, 1000 caractères maxi"><?php if(isset($_POST['id'])){ echo $_POST['memo']; } else if(isset($_GET['id'])){ echo $enseignant['memoenseignant']; } ?></textarea>
</fieldset>
<div id="buttons">
	<button type="submit" class="submit">Valider</button>
	<?php
	if (isset($_GET['id'])) {
	?>
	<a href="create_teacher.php?delete=<?php echo $_GET['id']; ?>" onclick="return confirm('Etes vous sûr(e) de vouloir supprimer cet enseignant ?');" class="delete">Supprimer</a>
	<?php
	}
	?>
</div>
<span class="mention">Tous les champs marqués d'un * sont obligatoires.</span>
</form>
</body>
</html>