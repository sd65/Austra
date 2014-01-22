<?php
$metier = "salle";
include_once "../../include/db_connect.php";
include "../include/header.php" ;
?>
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
		$req = $bdd->prepare('SELECT DISTINCT id, codesalle, nomsalle, capacitesalle, sallecommune, memosalle, affichagememosalle, deptproprietaire, codesite FROM salle');
		$req->execute();
		?>
		<?php 
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