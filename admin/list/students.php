<?php
$metier = "élève";
include_once "../../include/db_connect.php";
include "../include/aside.php" ;
?>
<header>

	<?php

	$year=date('Y');
	if(date('m')<'08'){
		$lastyear=$year-1;
		$currentYearLikeRequest= "%" . $lastyear . "%" ;
	}else{
		$currentYearLikeRequest= "%" . $year . "%" ;
	}
	$req = $bdd->prepare('SELECT DISTINCT filiere FROM etudiant WHERE promo LIKE :annee');
	$req->execute(array('annee' => $currentYearLikeRequest));
	?>
	<ul>
		<?php 
		if(!isset($_GET['filiere'])){
			echo "<li><a class='pageactive' href='?filiere=all'>Toutes</a></li>";
			$filiereGet="all";
		}

		if(isset($_GET['filiere']) || isset($filiereGet)){
			$filiereGet=$_GET['filiere'];

			if($filiereGet == "all") {
				echo "<li><a class='pageactive' href='?filiere=all'>Toutes</a></li>";
			} 
			else {
				echo "<li><a href='?filiere=all'>Toutes</a></li>";
			}
			while ($menuListeFilieres = $req->fetch()):

				$filiereActuelle = $menuListeFilieres['filiere'];
			$filiereClass = "";

			if(isset($_GET['filiere'])){
				$filiereGet=$_GET['filiere'];
				if($filiereActuelle == $_GET['filiere']){
					$filiereClass = "pageactive";
				}                    
			}
			else {
				$filiereGet="all";
			}
			echo '<li><a class="' . $filiereClass . '" href="?filiere=' . $filiereActuelle . '" >' . str_replace("_"," ",$filiereActuelle) . '</a></li>';
			endwhile ;
		}
		?>
	</ul>

	<input type="search" name="cours" placeholder="Rechercher un <?=$metier?>">
	<a class="boutonright" href="">Ajouter un <?=$metier?></a> 
	
</header>

<table>
	<thead>
		<tr>
			<td>Prénom</td>
			<td>Nom</td>
			<td>Filière</td>
			<td>Promotion</td>
			<td>TD</td>
			<td>TP</td>
			<td>Options</td>
			<td>Mail</td>
			<td class="options">Absences</td>
			<td class="options">Notes</td>
			<td class="options">Options</td>
		</tr>
	</thead>

	<tbody>
		<?php
		if(isset($filiereGet)){
			if($filiereGet == "all") {
				$req = $bdd->prepare('SELECT DISTINCT prenom, nometudiant, email, promo, dept FROM etudiant');
				$req->execute(array());
			}
			else {
				$req = $bdd->prepare('SELECT DISTINCT prenom, nometudiant, email, promo, dept FROM etudiant WHERE filiere=:filiere');
				$req->execute(array('filiere' => $_GET['filiere']));
			}
		}
		while ($listeEtudiant = $req->fetch()): ?>
		<tr>
			<td class="name"><?=$listeEtudiant['nometudiant'];?></td>
			<td class="surname"><?=$listeEtudiant['prenom'];?></td>
			<td class="course"><?=$listeEtudiant['dept'];?></td>
			<td class="year"><?=$listeEtudiant['promo'];?></td>
			<td>TD1</td>
			<td>TP1</td>
			<td>Chinois</td>
			<td class="mail"><?=$listeEtudiant['email'];?></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""></a><a class="edit" href=""></a><a class="delete" href=""></a></td>
		</tr>
		<?php
		endwhile;
		?>
	</tbody>
</table>
</body>
</html>
