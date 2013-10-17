<?php

include "db_connect.php";
include "day_to_int.php";

function displayBy($tp, $td, $day_name, $week) {
	
	for($i=0; $i<5; $i++):
		$day = day_to_int($day_name);
	endfor;
	
	return "X";
}