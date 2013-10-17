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
	$week = date('W') ;
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
							<td class="halfHour">30</td>
						<?php	endfor ; ?>
					</tr>
			</thead>
			<tbody>
				<?php $days = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"]; ?>
				
				<?php foreach($days as $day): ?>
					
						<tr>
							<td class="day"> <?= $day ?> </td>
								<?php displayBy($tp, $td, $day, $week) ; ?>
						</tr>
				

				<?php endforeach; ?>
				
			</tbody>
			</table>
		</div> <!-- Fin Tableau -->

		<aside class="calendar">
			<h1>Welcome</h1>
		</aside>
		
	</div> <!-- Fin Page -->
</body>
</html>