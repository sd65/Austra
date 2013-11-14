<?php

include "db_connect.php";
include "day_to_int.php";

function displayBy($hour, $tp, $td, $day_name, $week) {
	//Declaration
	$day;
	$class_name;
	$class_teacher;
	$SRC_S3 = 'SRC_S3';
	
	$hour = ($hour*60)+8;
	
	for($i=0; $i<5; $i++):
		$day = day_to_int($day_name);
	endfor;
	
	$sql = 'SELECT matiereedt,enseignantedt FROM edt WHERE jouredt=' . $day . ' AND semaineedt=' . $week . ' AND debutedt=' . $hour . '';
	
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	
	while ($data = mysql_fetch_assoc($req))
		{
			$class_name = $data['matiereedt'];
			$class_teacher = $data['enseignantedt'];
		}
	
	$result = [$class_name, $class_teacher];
	
	return $class_name;
}