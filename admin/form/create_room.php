<?php
require_once "../../include/functions.php";
include_once "../../include/db_connect.php";
$metier = "salle";
include "../include/aside.php" ;

if(isset($_GET['id'])) { // Si un ID est passé en GET c'est une édition
$id=$_GET['id'];
$req = $bdd->prepare('SELECT * FROM salle WHERE id = :id');
$req->execute(array(
	'id' => $id));
$salle = $req->fetch();
}
if(isset($_GET['delete'])) { // Si un ID est passé en GET c'est une édition
$id=$_GET['delete'];
$req = $bdd->prepare('DELETE FROM salle WHERE id = :id');
$req->execute(array(
	'id' => $id));

echo "<form>La salle a bien été supprimée</form></body></html>";
exit();
}
if(isset($_POST['id'])){ 
	if (!empty($_POST['codesalle'])){
		$errorcodesalle="1";
	}else{
		$errorcodesalle=" error";
	}
	if (!empty($_POST['nomsalle'])){
		$errornomsalle="1";
	}else{
		$errornomsalle=" error";
	}
	if (!empty($_POST['capacite'])){
		$errorcapacite="1";
	}else{
		$errorcapacite=" error";
	}

	if(($errorcodesalle=="1") AND ($errornomsalle=="1") AND ($errorcapacite=="1")){
		$codesalle = $_POST['codesalle'];
		$nomsalle = $_POST['nomsalle'];
		$capacite = $_POST['capacite'];
		$departement = $_POST['departement'];
		$memo = $_POST['memo'];
		$codesite = "CAMPUS";
		$id = $_POST['id'];

		if ($_POST['id']=="A") { //Creation nouvelle salle
			$req = $bdd->prepare('INSERT INTO salle(codesalle, nomsalle, capacitesalle, deptproprietaire, memosalle, codesite) VALUES(:codesalle, :nomsalle, :capacitesalle, :deptproprietaire, :memosalle, :codesite)');
			$req->execute(array(
				'codesalle' => $codesalle,
				'nomsalle' => $nomsalle,
				'capacitesalle' => $capacite,
				'deptproprietaire' => $departement,
				'codesite' => $codesite,
				'memosalle' => $memo
				));

		}else{ //update
			$req = $bdd->prepare('UPDATE salle 
				SET codesalle = :codesalle, nomsalle = :nomsalle, capacitesalle = :capacitesalle, deptproprietaire = :deptproprietaire, codesite = :codesite, memosalle = :memosalle
				WHERE id = :nid');
			$req->execute(array(
				'codesalle' => $codesalle,
				'nomsalle' => $nomsalle,
				'capacitesalle' => $capacite,
				'deptproprietaire' => $departement,
				'codesite' => $codesite,
				'memosalle' => $memo,
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
	<legend>Modifier la salle <b><?php echo $salle['codesalle']; ?></b><?php echo $valid; ?></legend>
	<?php }else{  ?>
	<legend>Nouvelle salle<?php if(isset($valid)) {echo $valid;} ?></legend>
	<?php } ?>

	<fieldset>
		<fieldset>
			<input name="codesalle" class="<?=$errorcodesalle?>" type="text" value="<?php if(isset($_POST['id'])){ echo $_POST['codesalle']; } else if(isset($_GET['id'])){ echo $salle['codesalle']; } ?>" placeholder="Code Salle *">
			<input name="nomsalle" class="<?=$errornomsalle?>" type="text" value="<?php if(isset($_POST['id'])){ echo $_POST['nomsalle']; } else if(isset($_GET['id'])){ echo $salle['nomsalle']; } ?>" placeholder="Nom Salle *">
			<input name="capacite" class="<?=$errorcapacite?>" type="text" value="<?php if(isset($_POST['id'])){ echo $_POST['capacite']; } else if(isset($_GET['id'])){ echo $salle['capacitesalle']; } ?>" placeholder="Capacité *">
			<label for="">Filière Principale</label>
			<span class="select">
				<select name="departement">
					<option value="PUB" <?php if(isset($_POST['id'])){ if($_POST['departement']=="PUB"){ echo "selected"; } }else if(isset($_GET['id'])){ if($salle['deptproprietaire']=="PUB"){ echo "selected"; } } ?>>PUB</option>
					<option value="MMI" <?php if(isset($_POST['id'])){ if($_POST['departement']=="MMI"){ echo "selected"; } }else if(isset($_GET['id'])){ if(($salle['deptproprietaire']=="MMI") OR ($salle['deptproprietaire']=="SRC")){ echo "selected"; } } ?>>MMI</option>
					<option value="LP" <?php if(isset($_POST['id'])){ if($_POST['departement']=="LP"){ echo "selected"; } }else if(isset($_GET['id'])){ if($salle['deptproprietaire']=="LP"){ echo "selected"; } } ?>>LP</option>
					<option value="CS" <?php if(isset($_POST['id'])){ if($_POST['departement']=="CS"){ echo "selected"; } }else if(isset($_GET['id'])){ if($salle['deptproprietaire']=="CS"){ echo "selected"; } } ?>>CS</option>
					<option value="ADMIN" <?php if(isset($_POST['id'])){ if($_POST['departement']=="ADMIN"){ echo "selected"; } }else if(isset($_GET['id'])){ if($salle['deptproprietaire']=="ADMIN"){ echo "selected"; } } ?>>ADMIN</option>
				</select>
			</span>
		</fieldset>
<!--
			<fieldset>
				<input type="text" placeholder="Intitulé contrainte">
				<label>Jour début</label>
				<span class="select">
					<select name="" id=""></select>
				</span>
				<label>Heure début</label>
				<span class="select">
					<select name="" id=""></select>
				</span>
				<label>Jour fin</label>
				<span class="select">
					<select name="" id=""></select>
				</span>
				<label>Heure fin</label>
				<span class="select">
					<select name="" id=""></select>
				</span>
			<button type="button">Ajouter</button>
		</fieldset>

	-->

	<fieldset>
		<textarea name="memo" id="" cols="100" rows="10" placeholder="Saissez votre note, 1000 caractères maxi"><?php if(isset($_POST['id'])){ echo $_POST['memo']; } else if(isset($_GET['id'])){ echo $salle['memosalle']; } ?></textarea>
	</fieldset>
	<input type="hidden" name="id" value="<?php if(isset($_GET['id'])) { echo $_GET['id']; }else{ echo "A"; } ?>">


</fieldset>

<div id="buttons">
	<button type="submit" class="submit">Valider</button>
	<?php
	if (isset($_GET['id'])) {
		?>
		<a href="create_room.php?delete=<?php echo $_GET['id']; ?>" onclick="return confirm('Etes vous sûr(e) de vouloir supprimer cette salle ?');" class="delete">Supprimer</a>
		<?php
	}
	?>
</div>
<span class="mention">Tous les champs marqués d'un * sont obligatoires.</span>
</form>
</body>
</html>