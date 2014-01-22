<?php
include "db_connect.php";
?>

<aside id="menu" class="<?php echo $ouverturemenu;?>">
  <ul>
    <li><img src="img/logo_white@2x.png" width="140" /></li>
    <p>Affichage</p>
    <li>
      <div class="select">
        <select id="selectFiliere">
          <option <?php if($filiere == "SRC_S3") {echo "selected";} ?> value="SRC_S3">SRC_S3</option>
          <option <?php if($filiere == "SRC_S4") {echo "selected";} ?> value="SRC_S4">SRC_S4</option>

          <option <?php if($filiere == "MMI_S1") {echo "selected";} ?> value="MMI_S1">MMI_S1</option>
          <option <?php if($filiere == "MMI_S2") {echo "selected";} ?> value="MMI_S2">MMI_S2</option>
          <!--
          <option value="MMI_S3">MMI_S3</option>
          <option value="MMI_S4">MMI_S4</option>
          -->
          <option <?php if($filiere == "PUB_S1") {echo "selected";} ?> value="PUB_S1">PUB_S1</option>
          <option <?php if($filiere == "PUB_S2") {echo "selected";} ?> value="PUB_S2">PUB_S2</option>
          <option <?php if($filiere == "PUB_S3") {echo "selected";} ?> value="PUB_S3">PUB_S3</option>
          <option <?php if($filiere == "PUB_S4") {echo "selected";} ?> value="PUB_S4">PUB_S4</option>

          <option <?php if($filiere == "LP-CP") {echo "selected";} ?> value="LP-CP">LP-CP</option>
	     </select>
      </div>
    </li>
    <li class="switch">
      <span <?php if($vue_globale == 1){ echo 'class=currentView';} ?>>Tout</span>
      <div class="onoffswitch">
        <input type="checkbox" <?php if($vue_globale == 0) {echo "checked";} ?> name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
        <label class="onoffswitch-label" for="myonoffswitch">
          <div class="onoffswitch-inner"></div>
          <div class="onoffswitch-switch"></div>
        </label>
      </div>
      <span <?php if($vue_globale == 0){ echo 'class=currentView';} ?>>Moi</span>
    </li>
    <?php if($vue_globale == 0){ ?>
     <li>
      <a class="TPChoice<?php if($tp==1){ echo ' current';} ?>" >TP1</a>
      <a class="TPChoice<?php if($tp==2){ echo ' current';} ?>" >TP2</a>
      <a class="TPChoice<?php if($tp==3){ echo ' current';} ?>" >TP3</a>
    </li>
    <li>
      <a class="TDChoice<?php if($td==1){ echo ' current';} ?>" >TD1</a>
      <a class="TDChoice<?php if($td==2){ echo ' current';} ?>" >TD2</a>
    </li>
    <?php } ?>
    <p>Légende</p>
    <li class="legende">
      <a><span id="legendeCours"></span> Cours</a>
      <a><span id="legendeDevoir"></span> Exam</a>
    </li>
    <li class="legende">
      <a><span id="legendeTP"></span> TP</a>
      <a><span id="legendeTD"></span> TD</a>
    </li>
    <p>Paramètres</p>
    <li><a class="modifprofil" href="javascript:;">Modifier mon profil</a></li>
    <li class="logout"><a href="include/logout.php">Déconnexion</a></li>
  </ul>
</aside>
<?php include "include/modifier_profil.php"; ?>
