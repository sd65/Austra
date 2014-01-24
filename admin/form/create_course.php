<?php
require_once "../../include/functions.php";
include_once "../../include/db_connect.php";
$metier = "matiere";
$valid = "";
include "../include/aside.php" ;

if(isset($_GET['id'])) { // Si un ID est passé en GET c'est une édition
$id=$_GET['id'];
$req = $bdd->prepare('SELECT * FROM matiere WHERE id = :id');
$req->execute(array(
	'id' => $id));
$matiere = $req->fetch();
}
if(isset($_GET['delete'])) { // Si un ID est passé en GET c'est une édition
$id=$_GET['delete'];
$req = $bdd->prepare('DELETE FROM matiere WHERE id = :id');
$req->execute(array(
	'id' => $id));

echo "<form>La matiere a bien été supprimée</form></body></html>";
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

		if ($_POST['id']=="A") { //Creation nouvelle matiere
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


	<form method="post">

		<?php if(isset($_GET['id'])) { // Si un ID est passé en GET c'est une édition ?>
		<legend>Modifier la matière <b><?php echo $matiere['nommatiere']?></b><?php echo $valid; ?></legend>
		<?php }else{  ?>
		<legend>Nouvelle matière<?php echo $valid; ?></legend>
		<?php } ?>	
		<fieldset>
			<fieldset>
				<input type="hidden" name="id" value="<?php if(isset($_GET['id'])) { echo $_GET['id']; }else{ echo "A"; } ?>">

				<input name="nom" type="text" class="middle <?php echo $errornom; ?>" value="<?php if(isset($_POST['id'])){ echo $_POST['nom']; } else if(isset($_GET['id'])){ echo $matiere['nommatiere']; } ?>" placeholder="Nom de la matière *">
				<label for="">Filière</label>
				<span class="select">
					<select name="choice_department" id="">
						<option value="MMI" <?php if(isset($_POST['id'])){ if($_POST['choice_department']=="MMI"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['dept']=="MMI"){ echo "selected"; } } ?>>MMI</option>
						<option value="PUB" <?php if(isset($_POST['id'])){ if($_POST['choice_department']=="PUB"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['dept']=="PUB"){ echo "selected"; } } ?>>PUB</option>
						<option value="LP" <?php if(isset($_POST['id'])){ if($_POST['choice_department']=="LP"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['dept']=="LP"){ echo "selected"; } } ?>>LP</option>
						<option value="CS" <?php if(isset($_POST['id'])){ if($_POST['choice_department']=="CS"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['dept']=="CS"){ echo "selected"; } } ?>>CS</option>
					</select>
				</span><br />
				<input name="module" type="text" class="small <?php echo $errorue ?>" value="<?php if(isset($_POST['id'])){ echo $_POST['module']; } else if(isset($_GET['id'])){ echo $matiere['modulematiere']; } ?>" placeholder="UE *">
				<input name="code" type="text" class="small <?php echo $errormodule; ?>" value="<?php if(isset($_POST['id'])){ echo $_POST['code']; } else if(isset($_GET['id'])){ echo $matiere['codematiere']; } ?>" placeholder="Module *">
			</fieldset>
			<fieldset>
				<input name="enseignant" type="text" class="medium" value="<?php if(isset($_POST['id'])){ echo $_POST['enseignant']; } else if(isset($_GET['id'])){ echo $matiere['enseignantmatiere']; } ?>" placeholder="Enseignant affecté">
				<label for="">Coefficient</label>
				<span class="select">
					<select name="coef" id="">
						<option value="0" <?php if(isset($_POST['id'])){ if($_POST['coef']=="0"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['coef']=="0"){ echo "selected"; } } ?>>0</option>
						<option value="1" <?php if(isset($_POST['id'])){ if($_POST['coef']=="1"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['coef']=="1"){ echo "selected"; } } ?>>1</option>
						<option value="2" <?php if(isset($_POST['id'])){ if($_POST['coef']=="2"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['coef']=="2"){ echo "selected"; } } ?>>2</option>
						<option value="3" <?php if(isset($_POST['id'])){ if($_POST['coef']=="3"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['coef']=="3"){ echo "selected"; } } ?>>3</option>
						<option value="4" <?php if(isset($_POST['id'])){ if($_POST['coef']=="4"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['coef']=="4"){ echo "selected"; } } ?>>4</option>
						<option value="5" <?php if(isset($_POST['id'])){ if($_POST['coef']=="5"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['coef']=="5"){ echo "selected"; } } ?>>5</option>
						<option value="6" <?php if(isset($_POST['id'])){ if($_POST['coef']=="6"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['coef']=="6"){ echo "selected"; } } ?>>6</option>
						<option value="7" <?php if(isset($_POST['id'])){ if($_POST['coef']=="7"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['coef']=="7"){ echo "selected"; } } ?>>7</option>
						<option value="8" <?php if(isset($_POST['id'])){ if($_POST['coef']=="8"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['coef']=="8"){ echo "selected"; } } ?>>8</option>
						<option value="9" <?php if(isset($_POST['id'])){ if($_POST['coef']=="9"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['coef']=="9"){ echo "selected"; } } ?>>9</option>
						<option value="10" <?php if(isset($_POST['id'])){ if($_POST['coef']=="10"){ echo "selected"; } }else if(isset($_GET['id'])){ if($matiere['coef']=="10"){ echo "selected"; } } ?>>10</option>
					</select>
				</span>
			</fieldset>
			<fieldset>
				<textarea name="memo" id="" cols="80" rows="5" placeholder="Saisissez votre note, 1000 caractères maxi" <?php if(isset($_POST['id'])){ echo $_POST['memo']; } else if(isset($_GET['id'])){ echo $matiere['memomatiere']; } ?>></textarea>
			</fieldset>

		</fieldset>

		<div id="buttons">
			<button type="submit" class="submit">Valider</button>
			<?php
			if (isset($_GET['id'])) {
				?>
				<a href="create_course.php?delete=<?php echo $_GET['id']; ?>" onclick="return confirm('Etes vous sûr(e) de vouloir supprimer cette matière ?');" class="delete">Supprimer</a>
				<?php
			}
			?>
		</div>
		<span class="mention">Tous les champs marqués d'un * sont obligatoires.</span>
	</form>
</body>
</html>
