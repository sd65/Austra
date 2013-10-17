<?php

function day_to_int($day_name) {

	int $day ;

	switch ($day_name) {
			case 'Lundi':
			$day = 2 ;
			break;

			case 'Mardi':
			$day = 3 ;
			break;

			case 'Mercredi':
			$day = 4 ;
			break;

			case 'Jeudi':
			$day = 5 ;
			break;	

			case 'Vendredi':
			$day = 6 ;
			break;
	}
return $day ;
}