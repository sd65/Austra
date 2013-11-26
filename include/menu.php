<aside id="menu" class="<?php echo $ouverturemenu;?>">
  <ul>
    <li><img src="img/logo_white@2x.png" width="140" /></li>
    <p>Affichage</p>
    <li><div class="select"><select>
	<option value="">MMI</option>
	  <option value="">SRC</option>
	  <option value="">PUB 1A</option>
	  <option value="">PUB 2A</option>
	  <option value="">LP</option>
	</select></div></li>
    <li class="switch">
      Tous
      <div class="onoffswitch">
        <input type="checkbox" <?php if($vue_globale == 0) {echo "checked";} ?> name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
        <label class="onoffswitch-label" for="myonoffswitch">
          <div class="onoffswitch-inner"></div>
          <div class="onoffswitch-switch"></div>
        </label>
      </div>
      Moi
    </li>
    <li>
      <a class="TPChoice<?php if($tp==1){ echo ' current';} ?>" >TP1</a>
      <a class="TPChoice<?php if($tp==2){ echo ' current';} ?>" >TP2</a>
      <a class="TPChoice<?php if($tp==3){ echo ' current';} ?>" >TP3</a>
    </li>
    <li>
      <a class="TDChoice<?php if($td==1){ echo ' current';} ?>" >TD1</a>
      <a class="TDChoice<?php if($td==2){ echo ' current';} ?>" >TD2</a>
    </li>
    <p>Paramètres</p>
    <li><a href="">Modifier mon profil</a></li>
    <li class="logout"><a href="">Déconnexion</a></li>
  </ul>
</aside>
