<?php
$metier = "étudiant";
include_once "../../include/db_connect.php";
include "../include/header.php" ;
?>
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
		if(isset($_GET['filiere'])){
			$req = $bdd->prepare('SELECT DISTINCT prenom, nometudiant, email, promo, dept FROM etudiant WHERE filiere=:filiere');
	        $req->execute(array('filiere' => $_GET['filiere']));
    }
    ?>
            <?php 
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
