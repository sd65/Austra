<?php
$metier = "cours";
include_once "../../include/db_connect.php";
include "../include/header.php" ;
?>
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

    $req = $bdd->prepare('SELECT DISTINCT nommatiere, dept, modulematiere, codematiere, enseignantmatiere FROM matiere');
    $req->execute();
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