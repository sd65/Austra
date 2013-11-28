<aside id="modifierprofil">
	<h1>Modifier votre profil</h1>
	<form method="post" action="">
	<fieldset class="disable">
		<label for="firstname">Prenom :</label><input disabled="disable" type="text" id="firstname" name="firstname" value="" tabindex="1" placeholder="<?php echo $prenom; ?>"/>
		<label for="name">Nom :</label><input disabled="disable" type="text" id="name" name="name" value="" tabindex="1" placeholder="<?php echo $nom; ?>"/>
		<label for="langue">Langue :</label><input disabled="disable" type="text" id="langue" name="langue" value="" tabindex="1" placeholder="Chinois"/>
	</fieldset>

	<fieldset class="enable">
		<label for="mail">Mail :</label><input type="text" id="mail" name="mail" value="" tabindex="1" placeholder=""/><br />
 		<label for="telport">Telephone :</label><input type="text" id="telport" name="telport" value="" tabindex="1" placeholder=""/>
		<label for="password">Mot de passe :</label><input type="password" id="password" name="password" value="" tabindex="2" placeholder="" />
		<label for="password">Nouveau mot de passe :</label><input type="password" id="password" name="password" value="" tabindex="2" placeholder="" />
		<label for="password">Confirmer mot de passe :</label><input type="password" id="password" name="password" value="" tabindex="2" placeholder="" />
	</fieldset>

	<div class="submit"><input type="submit" name="submit" value="Valider" /></div>
	</form>
</aside>