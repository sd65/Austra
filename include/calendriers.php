<aside id="calendars">
<?php 	
	include("calendriers_functions.php");
    $nombreCalendriers = 5; // Combien de calendriers on affiche ?
?>

 <div class="month">
<?php 
	for ($i=0; $i < $nombreCalendriers; $i++) 
		echo showCalendar(date("Y-m", strtotime("+".$i." month"))); ?>
 </div>

 <div class="numWeek"><?php echo showWeek($nombreCalendriers);?></div>
</aside>
