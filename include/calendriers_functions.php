<?php 
	// fonctions utiles, $valeur représente une date au format AAAA-MM-JJ
	function getMonth($valeur)	{
		return substr($valeur, 5, 2); }
 
	function getYear($valeur) {
		return substr($valeur, 0, 4); }

	function getWeeksPerMonth($d){
		$date=explode("-", $d);
		$m=$date[1]; $y=$date[0];
		$day = mktime(1, 1, 1, $m, 1, $y);
		$nday = date('t', $day);
		$fday = date("N",$day);
		$xday = $nday + $fday;
		$n =  $xday % 7 != 0 ? floor($xday/7) +1 : floor($xday/7);
		return $n;
	}
	function monthNumToName($mois) {
		$tableau = Array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aôut", "Septembre", "Octobre", "Novembre", "Décembre");
		return (intval($mois) > 0 && intval($mois) < 13) ? $tableau[intval($mois)] : "Indéfini";
	}

	// Fonction pour afficher le calendrier
	function showCalendar($periode) {
		$leCalendrier = "";
		// Tableau des valeurs possibles pour un numéro de jour dans la semaine
		$tableau = Array("0", "1", "2", "3", "4", "5", "6", "0");
		$nb_jour = Date("t", mktime(0, 0, 0, getMonth($periode), 1, getYear($periode)));
		$pas = 0;
		$indexe = 1;
 
		// Affichage du mois et de l'année
		$leCalendrier .= "\n\t<div>" . monthNumToName(getMonth($periode)) . " " . getYear($periode) . "</div>";
		// Tant que l'on n'a pas affecté tous les jours du mois traité
		while ($pas < $nb_jour) {
			if ($indexe == 1){
				$testsemaine = Date("W-m", mktime(0, 0, 0, getMonth($periode), 1 + $pas, getYear($periode)));
				if($testsemaine==date("W-m")){
 					$leCalendrier .= "\n\t<ul class=\"active\">";
				}else{
					$leCalendrier .= "\n\t<ul>";
				}
			}
			// Si le jour calendrier == jour de la semaine en cours
			if (Date("w", mktime(0, 0, 0, getMonth($periode), 1 + $pas, getYear($periode))) == $tableau[$indexe]) {				
				$afficheJour = Date("j", mktime(0, 0, 0, getMonth($periode), 1 + $pas, getYear($periode)));
				// Ajout de la case avec la date
				$leCalendrier .= "<li>$afficheJour</li>";
				$pas++;
			}else {
				$leCalendrier .= "<li class=\"notinmonth\"></li>";
			}
			if ($indexe == 7 && $pas < $nb_jour) { $leCalendrier .= "\n\t</ul>"; $indexe = 1;} else {$indexe++;}
		}
		// Ajustement du tableau
		for ($i = $indexe; $i <= 7; $i++) {
			$leCalendrier .= "<li class=\"notinmonth\"></li>";
		}
		$leCalendrier .= "\n\t</ul>\n";
		// Retour de la chaine contenant le Calendrier
		return $leCalendrier;
	}	

	// Fonction pour afficher les semaines
	function showWeek($a) {
		for ($i=0; $i < $a; $i++) { 
			$nombreSemaine = getWeeksPerMonth(date("Y-m", strtotime("+".$i." month")));	
			$laSemaine .= "<ul>";
			for ($y=0; $y < $nombreSemaine; $y++) { 
				$numSemaineTraite = date("Y-m-d",strtotime("+".$i." month",strtotime(date("Y")."-".date("m")."-01")));
				$numSemaineTraite=date("W",strtotime("+".$y." week",strtotime($numSemaineTraite)));
				$laSemaine .= "<li>".$numSemaineTraite."</li>";
			}
			$laSemaine .= "</ul>";
		}
		return $laSemaine;
	}
?>
