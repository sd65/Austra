<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Austra</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="page">

		<h1>Austra</h1>

		<div id="tableau">

			<table>        

				<thead>
					<tr>
						<td class="thead">Jour</td>
						<?php for ($heure=8;$heure<20;$heure++): ?>
						<td class="Heure"> <?= $heure ?>h</td>
						<td class="demiHeure"></td>
						<?php	endfor ; ?>
					</tr>
				</thead>

				<tbody>

				</tbody>


			</table>

	</div> <!-- Fin Tableau -->

</div> <!-- Fin Page -->


</body>
</html>