<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Austra</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
<?php
	include "include/edt_display.php";
?>
<?php
	$year = 2013;
	$week = date('W');
	$tp = 1; //Donnée renseignée pour test
	$td = 1; //Donnée renseignée pour test
?>

	<div id="page">
		<h1>Austra</h1>
		<div id="table">
			<table>        
				<thead>
					<tr>
						<td class="thead">Jour</td>
						<?php for ($hourStatic=8;$hourStatic<20;$hourStatic++): ?>
							<td class="hour"> <?= $hourStatic ?>h</td>
							<td class="halfHour">30</td>
						<?php	endfor ; ?>
					</tr>
			</thead>
			<tbody>
				<?php edt_display($year, $week, $tp, $td); ?>
			</tbody>
			</table>
		</div> <!-- Fin Tableau -->

		<!-- <aside class="calendar">
			<h1>Welcome</h1>
		</aside> -->
		
	</div> <!-- Fin Page -->
</body>
</html>