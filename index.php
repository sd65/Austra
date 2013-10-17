<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Austra</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
<?php
	include "config/db_connect.php";

?>
	
	<div id="page">
		<h1>Austra</h1>
		<div id="table">
			<table>        
				<thead>
					<tr>
						<td class="thead">Jour</td>
						<?php for ($hour=8;$hour<20;$hour++): ?>
							<td class="hour"> <?= $hour ?>h</td>
							<td class="demiHeure"></td>
						<?php	endfor ; ?>
					</tr>
			</thead>
			<tbody>
				<?php $days = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"]; ?>
				
				<?php foreach($days): ?>
					<tr>
						<td>Bonjour je suis un TD</td>
					</tr>
				<?php endforeach; ?>
				
			</tbody>
			</table>
		</div> <!-- Fin Tableau -->
	</div> <!-- Fin Page -->
</body>
</html>