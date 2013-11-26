function trad_filiere_all($filiere) {

$array_groupe = array();

if ($filiere == "SRC") {
	$array_groupe[0] = "SRC_S3";
	$array_groupe[1] = "SRC_S3A";
	$array_groupe[2] = "SRC_S3B";
	$array_groupe[3] = "SRC_S3A1";
	$array_groupe[4] = "SRC_S3A2";
	$array_groupe[5] = "SRC_S3B1";
}
else if ($filiere == "MMI") {
	$array_groupe[0] = "MMI_S1";
	$array_groupe[1] = "MMI_S1A";
	$array_groupe[2] = "MMI_S1B";
	$array_groupe[3] = "MMI_S1A1";
	$array_groupe[4] = "MMI_S1A2";
	$array_groupe[5] = "MMI_S1B1";
}

return array_groupe;
}

function edt_display_all($year, $week, $groupeedt) {

$days = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");


foreach ($days as $day) {

	$$day = array();
	${"NbCours". $day} = 0;
	${$day . "_affichage"} = array();
	${$day . "_affichage"} = array_fill(0, 24, NULL);

}

$filiere_code = trad_filiere_all($groupeedt); //RETOURNER TABLEAU AVEC LES VALEURS DES TP/TD

//TRAITER LE TABLEAU

$query_week = "???" //A VOIR

$result_query_week = mysql_query($query_week) or die('Erreur SQL !<br>' . $query_week . '<br>' . mysql_error());

while ($data = mysql_fetch_assoc($result_query_week)) {

//PROBLEME LORSQUE DEUX COURS (Tp/Td) EN MÊME TEMPS ???

}

foreach ($days as $day) { //A RELIRE MAIS PROBABLEMENT A GARDER

	for ($numCoursDuJour = 0; $numCoursDuJour < ${"NbCours" . $day}; $numCoursDuJour++) { // Pour chaque cours
		
		${$day}[$numCoursDuJour]['debutedt'] = timeedt_to_hour(${$day}[$numCoursDuJour]['debutedt']);
		${$day}[$numCoursDuJour]['finedt']   = timeedt_to_hour(${$day}[$numCoursDuJour]['finedt']);
		
		for ($curseur = ${$day}[$numCoursDuJour]['debutedt']; $curseur < ${$day}[$numCoursDuJour]['finedt']; $curseur++) { //Pour chaque demi heure de cours
				${$day . "_affichage"}[$curseur] = $numCoursDuJour;
		}
		
	}
	
}

$daysToProceed = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi",);

//AFFICHAGE ENTIER A REVOIR

}