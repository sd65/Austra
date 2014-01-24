<?php
$metier = "enseignant";
include_once "../../include/db_connect.php";
include "../include/aside.php" ;
?>
<header>
	<ul>
		<?php 
		$req = $bdd->prepare('SELECT DISTINCT departementenseignant FROM enseignant');
		
		if(isset($_GET['dpt'])){
			$dptGet=$_GET['dpt'];
		}else{
			$dptGet="all";	
		}

		if($dptGet == "all") {
			echo "<li><a class='pageactive' href='?dpt=all'>Tous</a></li>";
		}
		else {
			echo "<li><a href='?dpt=all'>Tous</a></li>";
		}
		$req->execute(array());

		while ($menuListeDpts = $req->fetch()):

			$dptActuel = $menuListeDpts['departementenseignant'];
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
		
		?>
	</ul>

	<input type="search" name="cours" placeholder="Rechercher un <?=$metier?>">
	<a class="boutonright" href="../form/create_teacher.php">Ajouter un <?=$metier?></a> 

</header>

<table>
	<thead>
		<td>Prénom</td>
		<td>Nom</td>
		<td>Dpt Principal</td>
		<td>Statut</td>
		<td>Mail</td>
		<td class="options">Coordonnées</td>
		<td class="options">Contraintes</td>
		<td class="options">Charges</td>
	</thead>

	<tbody>

		<?php
		if(isset($dptGet)){
			if($dptGet == "all") {
				$req = $bdd->prepare('SELECT DISTINCT id, prenomenseignant, nomenseignant, emailenseignant, departementenseignant, statutenseignant FROM enseignant');
				$req->execute(array());
			}
			else {
				$req = $bdd->prepare('SELECT DISTINCT id, prenomenseignant, nomenseignant, emailenseignant, departementenseignant, statutenseignant FROM enseignant WHERE departementenseignant=:dpt');
				$req->execute(array('dpt' => $dptGet));
			}
		}
		while ($listeEnseignants = $req->fetch()): ?>
		<tr>
			<td class="name"><?=$listeEnseignants['prenomenseignant']?></td>
			<td class="surname"><?=$listeEnseignants['nomenseignant']?></td>
			<td class="department"><?=$listeEnseignants['departementenseignant']?></td>
			<td class="status"><?=$listeEnseignants['statutenseignant']?></td>
			<td class=""><?=$listeEnseignants['emailenseignant']?></td>
			<td class="options"><a class="show" href=""><a class="edit" href="../form/create_teacher.php?id=<?=$listeEnseignants['id']?>"></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
		</tr>
		<?php
		endwhile;
		?>
	</tbody>
</table>
</body>
</html>
