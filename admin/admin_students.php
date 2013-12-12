<?php
include_once "../include/db_connect.php";
include "include/header.php" ;
?>

<body>
	<header>
		<a href=""><img src="./img/logo@2x.png" alt="Austra" width="140" height"48"/></a>
		<?php 
		$req = $bdd->prepare('SELECT DISTINCT filiere FROM etudiant WHERE promo LIKE :annee');
		$currentYearLikeRequest= "%" . date('Y') . "%" ;
		$req->execute(array('annee' => $currentYearLikeRequest));
		?>
		<ul>
			<?php 
			while ($menuFilieres = $req->fetch()):
			echo '<li><a class="pageactive" href="#">' . $menuFilieres . '</a></li>';

			endwhile ;
			?>
		</ul>
		<input type="search" name="cours" placeholder="Rechercher un élève">
		<a class="boutonright" href="">Ajouter un élève</a> 
	</header>
	<aside>
		<ul>
			<li><a href="">Cours</a></li>  
			<li><a class="pageactive" href="">Élèves</a></li>  
			<li><a href="">Enseignants</a></li>  
			<li><a href="">Salles</a></li>  
		</ul>
	</aside>

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
			<tr>
				<td class="name">Thomas</td><td class="surname">Alberola</td><td class="course">SRC</td><td class="year">2013</td><td>TD1</td><td>TP1</td><td>Chinois</td><td class="mail">thomas@gmail.com</td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""><a class="edit" href=""></td>
				<td class="options"><a class="show" href=""></a><a class="edit" href=""></a><a class="delete" href=""></a></td></tr>

				<tr><td class="name">Maxime</td><td class="surname">Brunel</td><td class="course">SRC</td><td class="year">2013</td><td>TD1</td><td>TP1</td><td>Espagnol</td><td class="mail">maxime@gmail.com</td>
					<td class="options"><a class="show" href=""><a class="edit" href=""></td>
					<td class="options"><a class="show" href=""><a class="edit" href=""></td>
					<td class="options"><a class="show" href=""></a><a class="edit" href=""></a><a class="delete" href=""></a></td></tr>

					<tr><td class="name">Marie Aline</td><td class="surname">Millot</td><td class="course">SRC</td><td class="year">2013</td><td>TD2</td><td>TP3</td><td>Chinois</td><td class="mail">thomas@gmail.com</td>
						<td class="options"><a class="show" href=""><a class="edit" href=""></td>
						<td class="options"><a class="show" href=""><a class="edit" href=""></td>
						<td class="options"><a class="show" href=""></a><a class="edit" href=""></a><a class="delete" href=""></a></td></tr>

						<tr><td class="name">Sophie</td><td class="surname">Lesaint</td><td class="course">SRC</td><td class="year">2013</td><td>TD2</td><td>TP2</td><td>Allemand</td><td class="mail">sophie@gmail.com</td>
							<td class="options"><a class="show" href=""><a class="edit" href=""></td>
							<td class="options"><a class="show" href=""><a class="edit" href=""></td>
							<td class="options"><a class="show" href=""></a><a class="edit" href=""></a><a class="delete" href=""></a></td>
						</tr>
					</tbody>
				</table>
			</body>
			</html>
