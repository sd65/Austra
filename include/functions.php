<?php

function day_to_int($day_name) {

	switch ($day_name) {
			case 'Dimanche':
			$day = 1 ;
			break;
			
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
			
			case 'Samedi':
			$day = 7 ;
			break;
	}
return $day ;
}

function timeedt_to_hour($time_edt) {
	$hour = (($time_edt/60)-8) * 2; //demi heure
	return $hour;
}

function trad_filiere_to_code($filiere) {
	if ($filiere == "SRC_S3") {
		$filiere_code = "SRC_S3";
	}
	else if ($filiere == "MMI_S1") {
		$filiere_code = "MMI_S1";
	}
	
	return $filiere_code;
}

function trad_tp_to_code($filiere, $tp) {

	if ($filiere == "SRC_S3") {

	if ($tp == 1)
	    $tp_code = "SRC_S3A1" ;

	if ($tp == 2)
	    $tp_code = "SRC_S3A2" ;

	if ($tp == 3)
	    $tp_code = "SRC_S3B1" ;

	} else if ($filiere == "MMI_S1") {

	if ($tp == 1)
	    $tp_code = "MMI_S1A1" ;

	if ($tp == 2)
	    $tp_code = "MMI_S1A2" ;

	if ($tp == 3)
	    $tp_code = "MMI_S1B1" ;

	} else 	if ($filiere == "PUB_S3") {
		$tp_code ="PUB_S3";
	}

	return $tp_code;
}

function trad_td_to_code($filiere, $td) {

	if ($filiere == "SRC_S3") {

	if ($td == 1)
	    $td_code = "SRC_S3A" ;

	if ($td == 2)
	    $td_code = "SRC_S3B" ;

	} else if ($filiere == "MMI_S1") {

	if ($td == 1)
	    $td_code = "MMI_S1A" ;

	if ($td == 2)
	    $td_code = "MMI_S1B" ;
	} else 	if ($filiere == "PUB_S3") {

	if ($td == 1)
	    $td_code = "PUB_S3A" ;

	if ($td == 2)
	    $td_code = "PUB_S3B" ;

	}

	return $td_code;
}

function trad_filiere_to_code_all($filiere) {

	$all_code_filiere = array();

	if ($filiere == "SRC_S3") {
		$all_code_filiere[0] = "SRC_S3";
		$all_code_filiere[1] = "SRC_S3A";
		$all_code_filiere[2] = "SRC_S3B";
		$all_code_filiere[3] = "SRC_S3A1";
		$all_code_filiere[4] = "SRC_S3A2";
		$all_code_filiere[5] = "SRC_S3B1";
	}
	else if ($filiere == "MMI") {
		$all_code_filiere[0] = "MMI_S1";
		$all_code_filiere[1] = "MMI_S1A";
		$all_code_filiere[2] = "MMI_S1B";
		$all_code_filiere[3] = "MMI_S1A1";
		$all_code_filiere[4] = "MMI_S1A2";
		$all_code_filiere[5] = "MMI_S1B1";
	}

	return $all_code_filiere;
}

function trad_codetp_affichage($filiere, $tp) {

	if ($filiere == "SRC_S3") {

	if ($tp == "SRC_S3A1" )
	    $tp_affichage = "TP1" ;

	if ($tp == "SRC_S3A2")
	    $tp_affichage = "TP2" ;

	if ($tp == "SRC_S3B1")
	    $tp_affichage = "TP3" ;

	} else if ($filiere == "MMI_S1") {

	if ($tp == "MMI_S1A1")
	    $tp_affichage = "TP1" ;

	if ($tp == "MMI_S1A2")
	    $tp_affichage = "TP2" ;

	if ($tp == "MMI_S1B1")
	    $tp_affichage = "TP3" ;

	}

	return $tp_affichage;
}

function trad_codetd_affichage($filiere, $td) {
	
	if ($filiere == "SRC_S3") {

	if ($td == "SRC_S3A")
	    $td_affichage =  "TD1";

	if ($td == "SRC_S3B")
	    $td_affichage =  "TD2";
	
	if ($td == "SRC_S3")
			$td_affichage = "TD Classe Entière";
	
	} else if ($filiere == "MMI_S1") {

	if ($td == "MMI_S1A")
	    $td_affichage =  "TD1";

	if ($td == "MMI_S1B")
	    $td_affichage =  "TD2";
	}
	if ($td == "MMI_S1") {
		$td_affichage = "TD Classe Entière";
	}

	if ($filiere == "LP-CP") {
		$td_affichage = "LP-CP";
	}

	return $td_affichage;
}

function verif_tel($tel){
	if (!preg_match('/^[0-9]{10}$/',$tel)){
    	$valid=0; //Invalid
	}else{
		$valid=1; //Valid
	}
	return $valid;
}
function verif_cp($cp){
	if (!preg_match('/^[0-9]{5}$/',$cp)){
    	$valid=0; //Invalid
	}else{
		$valid=1; //Valid
	}
	return $valid;
}
function verif_mail($mail){
	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
	if (!preg_match($regex,$mail)){
    	$valid=0; //Invalid
	}else{
		$valid=1; //Valid
	}
	return $valid;
}

function addZero($z){
	if($z < 10){ $numeroSemaine = '0'.$z;}else{ $numeroSemaine = $z;}
	return $numeroSemaine;
}