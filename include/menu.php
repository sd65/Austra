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
          <?php
            $currentYearLikeRequest= "%" . $year . "%" ;
            $req = $bdd->prepare('SELECT DISTINCT filiere FROM etudiant WHERE promo LIKE :annee');
            $req->execute(array('annee' => $currentYearLikeRequest));

            while ($donnees = $req->fetch())
            { 
                $currentFiliereOrNot = null ;
                if($donnees['filiere'] == $filiere) {
                  $currentFiliereOrNot = "selected" ;
                }
                
                echo "<option ". $currentFiliereOrNot ." value='" . $donnees['filiere'] ."'>" . $donnees['filiere']  . "</option>";
            }
      	   
      	  ?>
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
