<?php
$req = $bdd->prepare('SELECT tel, email, pass FROM etudiant WHERE id LIKE :id');
$req->execute(array('id' => $id));
$donnees = $req->fetch();
$email = $donnees['email'];
$tel = $donnees['tel'];
$pass = $donnees['pass'];

if(empty($_POST['id'])){ //Si l'id n'est pas passé, c'est qu'on a pas envoyé de form
    echo'<aside id="modifierprofil" class="closeprofil">';
}else{
	echo'<aside id="modifierprofil" class="openprofil">';

	// CONDITIONS POUR LE MAIL ET LE TELEPHONE
	if((verif_tel($_POST['telport'])==1) AND (verif_mail($_POST['mail'])==1)){ // Verif tel and mail
		$req = $bdd->prepare('UPDATE etudiant SET tel = :nvtel, email = :nvemail WHERE id = :nvid');
		$req->execute(array(
			'nvtel' => $_POST['telport'],
			'nvemail' => $_POST['mail'],
			'nvid' => $_POST['id']
			));

		$tel = $_POST['telport'];
		$email = $_POST['mail'];
		
		echo"Mail et telephone enregistree";		
	}else{
		if(verif_tel($_POST['telport'])==0){ // Verif
			echo'<p class="error">Telephone incorrect</p>';
		}
		if(verif_mail($_POST['mail'])==0){ // Verif
			echo'<p class="error">Mail incorrect</p>';
		}
	}

	// CONDITIONS POUR LE MOT DE PASSE
	if((!empty($_POST['passwordactuel']))AND(!empty($_POST['passwordnew']))AND(!empty($_POST['passwordnewconfirm']))){ // Verif si on veut changer email
		if(md5($_POST['passwordactuel'])==$pass){ // Si la personne ne s'est pas trompé dans le mot de passe actuel
			if($_POST['passwordnew']==$_POST['passwordnewconfirm']){ //Si le nouveau mdp et la confirm sont identique

				$req = $bdd->prepare('UPDATE etudiant SET pass = :nvpass WHERE id = :nid');
				$req->execute(array(
					'nvpass' => md5($_POST['passwordnew']),
					'nid' => $_POST['id']
					));
				echo"Nouveau mot de passe enregistree";		
			}else{
				echo'<p class="error">Nouveau mot de passe et confirmation non identique</p>';
			}
		}else{
			echo'<p class="error">Mot de passe actuel incorrect</p>';
		}
	}
}
?>
	<h1>Modifier votre profil</h1>
	<form method="post" action="">
	<fieldset class="disable">
		<label for="firstname">Prenom :</label><input disabled="disable" type="text" id="firstname" name="firstname" value="" tabindex="1" placeholder="<?php echo ucfirst($prenom); ?>"/>
		<label for="name">Nom :</label><input disabled="disable" type="text" id="name" name="name" value="" tabindex="1" placeholder="<?php echo $nom; ?>"/>
		<label for="langue">Langue :</label><input disabled="disable" type="text" id="langue" name="langue" value="" tabindex="1" placeholder="Chinois"/>
		<input type="hidden"  name="id"  value="<?php echo $id; ?>">
	</fieldset>

	<fieldset class="enable">
		<label for="mail">Mail :</label><input type="text" id="mail" name="mail" tabindex="1" value="<?php echo $email; ?>"/><br />
 		<label for="telport">Telephone :</label><input type="text" id="telport" name="telport" tabindex="1" value="<?php echo $tel; ?>"/>
		<a class="btn_pass">Changer votre mot de passe</a>
		<div id="hidepwd">
			<label for="passwordactuel">Mot de passe :</label><input type="password" id="passwordactuel" name="passwordactuel" value="" tabindex="2" placeholder="Mot de passe actuel" />
			<label for="passwordnew">Nouveau mot de passe :</label><input type="password" id="passwordnew" name="passwordnew" value="" tabindex="2" placeholder="Nouveau mot de passe" />
			<label for="passwordnewconfirm">Confirmer mot de passe :</label><input type="password" id="passwordnewconfirm" name="passwordnewconfirm" value="" tabindex="2" placeholder="Confirmer nouveau mot de passe" />
		</div>
	</fieldset>

	<div class="submit"><input type="submit" name="submit" value="Valider" /></div>
	</form>
</aside>