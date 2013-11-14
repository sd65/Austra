<?php

include "db_connect.php";
include "day_to_int.php";

function displayBy($hour, $tp, $td, $day_name, $week) {
	//Declaration
	$day;
	$class_name;
	$class_teacher;
	
	for($i=0; $i<5; $i++):
		$day = day_to_int($day_name);
	endfor;
	
	$sql = 'SELECT matiereedt,enseignantedt FROM edt WHERE day=' . $day . '';
	
	$req = mysql_query($sql);
	
	while ($data = mysql_fetch_assoc($req))
		{
			$class_name = $data[???];
			$class_teacher = $data[???];
		}
	
	return "X";
}