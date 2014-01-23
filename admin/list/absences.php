<?php
$metier = "absence";
include_once "../../include/db_connect.php";
include "../include/aside.php" ;
?>

<header>
	<ul>
		<?php 
		$req = $bdd->prepare('SELECT DISTINCT dept FROM plage');
		
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
		<!-- <td>Id</td> -->
		<td>Type</td>
		<td>Code Ressource</td>
		<td>Date</td>
		<td>Début</td>
		<td>Fin</td>
		<td>Durée</td>
		<td>Description</td>
		<td>Dépt</td>
		<td>Année</td>
		<td>Style</td>
		<td>ID EDT</td>
		<td>Edit</td>
		
		<!-- <td class="options">Coordonnées</td>
		<td class="options">Contraintes</td>
		<td class="options">Charges</td> -->
	</thead>

	<tbody>

		<?php
		if(isset($dptGet)){
			if($dptGet == "all") {
				$req = $bdd->prepare('SELECT DISTINCT id, dateplage, debutplage, typeressourceplage, coderessourceplage, finplage, descriptionplage, dureeplage, dept, annee, styleplage, idedt FROM plage');
				$req->execute(array());
			}
			else {
				$req = $bdd->prepare('SELECT DISTINCT id, dateplage, debutplage, typeressourceplage, coderessourceplage, finplage, descriptionplage, dureeplage, dept, annee, styleplage, idedt FROM plage WHERE dept=:dpt');
				$req->execute(array('dpt' => $dptGet));
			}
		}
		while ($listeAbsences = $req->fetch()): ?>
		<tr>
			<!-- <td class="id"><?=$listeAbsences['id']?></td> -->
			<td class="typeressourceplage"><?=$listeAbsences['typeressourceplage']?></td>
			<td class="coderessourceplage"><?=$listeAbsences['coderessourceplage']?></td>	
			<td class="dateplage"><?=$listeAbsences['dateplage']?></td>
			<td class="debutplage"><?=$listeAbsences['debutplage']?></td>
			<td class="finplage"><?=$listeAbsences['finplage']?></td>
			<td class="dureeplage"><?=$listeAbsences['dureeplage']?></td>
			<td class="descriptionplage"><?=$listeAbsences['descriptionplage']?></td>
			<td class="dept"><?=$listeAbsences['dept']?></td>
			<td class="annee"><?=$listeAbsences['annee']?></td>
			<td class="styleplage"><?=$listeAbsences['styleplage']?></td>
			<td class="idedt"><?=$listeAbsences['idedt']?></td>
			<td class="options"><a class="show" href=""><a class="edit" href="../form/edit_absence?id=<?=$listeAbsences['id']?>"></td>
		</tr>
		<?php
		endwhile;
		?>
	</tbody>
</table>
</body>
</html>
