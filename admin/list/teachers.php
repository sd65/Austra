<?php
$metier = "enseignant";
include_once "../../include/db_connect.php";
include "../include/header.php" ;
?>
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

		$req = $bdd->prepare('SELECT DISTINCT prenomenseignant, nomenseignant, emailenseignant, departementenseignant, statutenseignant FROM enseignant');
		$req->execute();
		?>
		<?php 
		while ($listeEnseignants = $req->fetch()): ?>
		<tr>
			<td class="name"><?=$listeEnseignants['prenomenseignant']?></td>
			<td class="surname"><?=$listeEnseignants['nomenseignant']?></td>
			<td class="department"><?=$listeEnseignants['departementenseignant']?></td>
			<td class="status"><?=$listeEnseignants['statutenseignant']?></td>
			<td class=""><?=$listeEnseignants['emailenseignant']?></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
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
