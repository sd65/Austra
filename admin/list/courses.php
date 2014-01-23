<?php
$metier = "matiere";
include_once "../../include/db_connect.php";
include "../include/aside.php" ;
?>
<header>
  <ul>
    <?php 
    $req = $bdd->prepare('SELECT DISTINCT dept FROM matiere');
    
    if(isset($_GET['dpt'])){

      $dptGet=$_GET['dpt'];
      
      if($dptGet == "all") {
        echo "<li><a class='pageactive' href='?dpt=all'>Tous</a></li>";
      }
      else {
        echo "<li><a href='?dpt=all'>Tous</a></li>";
      }
      $req->execute(array());

      while ($menuListeDpts = $req->fetch()):
        
        $dptActuel = $menuListeDpts['dept'];
      $dptClass = "";

      if(isset($_GET['dpt'])){
        $dptGet=$_GET['dpt'];
        if($dptActuel == $_GET['dpt']){
          $dptClass = "pageactive";
        }                    
      } else {
        $dptGet="all";
      }
      echo '<li><a class="' . $dptClass . '" href="?dpt=' . $dptActuel . '" >' . str_replace("_"," ",$dptActuel) . '</a></li>';
      endwhile ;
    }
    ?>
  </ul>

  <input type="search" name="cours" placeholder="Rechercher une <?=$metier?>">
  <a class="boutonright" href="">Ajouter un <?=$metier?></a>
  
</header>

<table>
  <thead>
    <td>Matière</td>
    <td>Filière</td>
    <td>UE</td>
    <td>Module</td>
    <td>Enseignant</td>
    <!-- <td>Mémo</td> -->
    <td>Options</td>
  </thead>
  <tbody>

    <?php 
    if(isset($dptGet)){
      if($dptGet == "all") {
        $req = $bdd->prepare('SELECT DISTINCT nommatiere, dept, modulematiere, codematiere, enseignantmatiere FROM matiere');
        $req->execute(array());
      }
      else{
        $req = $bdd->prepare('SELECT DISTINCT nommatiere, dept , modulematiere, codematiere, enseignantmatiere FROM matiere WHERE dept=:dpt');
        $req->execute(array('dpt' => $dptGet));
      }
    }
    ?>
    <?php 
    while ($listeCours = $req->fetch()): ?>
    <tr>
      <td class="intitule"><?=$listeCours['nommatiere']?></td>
      <td class="filiere"><?=$listeCours['dept']?></td>
      <td class="uemodu"><?=$listeCours['modulematiere']?>
      </td><td class="module"><?=$listeCours['codematiere']?></td>
    </td><td class="enseignant"><?=$listeCours['enseignantmatiere']?></td>
    <!-- <td class="memo">Mémo</td> -->
    <td><a class="edit hover" href=""></a><a class="delete hover" href=""></a></td>
  </tr>
  <?php
  endwhile;
  ?>
</tbody>
</table>
</body>
</html>