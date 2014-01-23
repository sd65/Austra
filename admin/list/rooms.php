<?php
$metier = "salle";
include_once "../../include/db_connect.php";
include "../include/aside.php" ;
?>
<header>
	<ul>
		<?php 
		$req = $bdd->prepare('SELECT DISTINCT deptproprietaire FROM salle');
		
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
				
				$dptActuel = $menuListeDpts['deptproprietaire'];
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
</header>

<table>
	<thead>
		<tr>
			<td>Salle</td>
			<td>Code</td>
			<td>Capacité</td>
			<td>Dpt Propriétaire</td>
			<td class="options">Paramètres</td>
			<td class="options">Partage</td>
		</tr>
	</thead>
	<tbody>

		<?php
		if(isset($dptGet)){
			if($dptGet == "all") {
				$req = $bdd->prepare('SELECT DISTINCT id, codesalle, nomsalle, capacitesalle, sallecommune, memosalle, affichagememosalle, deptproprietaire, codesite FROM salle');
				$req->execute(array());
			}
			else {
				$req = $bdd->prepare('SELECT DISTINCT id, codesalle, nomsalle, capacitesalle, sallecommune, memosalle, affichagememosalle, deptproprietaire, codesite FROM salle WHERE deptproprietaire=:dpt');
				$req->execute(array('dpt' => $dptGet));
			}
		}
		while ($listeSalles = $req->fetch()): ?>
		<tr>
			<td class="nomsalle"><?=$listeSalles['nomsalle']?></td>
			<td class="codesalle"><?=$listeSalles['codesalle']?></td>
			<td class="capacitesalle"><?=$listeSalles['capacitesalle']?></td>
			<td class="deptproprietaire"><?=$listeSalles['deptproprietaire']?></td>
			<td class="options"><a class="show" href=""><a class="edit" href="../form/create_room?id=<?=$listeSalles['id']?>"></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
		</tr>
		<?php
		endwhile;
		?>
	</tbody>
</table>
</body>
</html>