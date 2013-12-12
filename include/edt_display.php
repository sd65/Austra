<?php

include "db_connect.php";

function edt_display($year, $week, $filiere, $tp, $td) {

		$days = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
		$tp_code;
		$td_code;
		
		foreach ($days as $day) {
       $$day = array();
			 ${"NbCours" . $day} = 0;
			 ${$day . "_affichage"} = array();
			 ${$day . "_affichage"} = array_fill(0, 24, NULL);
    	}
		
		$filiere_code = trad_filiere_to_code($filiere);
		$tp_code = trad_tp_to_code($filiere_code, $tp);
		$td_code = trad_td_to_code($filiere_code, $td);	
		
    $query_week = "SELECT nommatiere, nomenseignant, prenomenseignant,typeenseignementedt,groupeedt,jouredt,semaineedt,edt.annee,debutedt,finedt,salleedt 
    FROM edt 
    LEFT JOIN enseignant
    ON edt.enseignantedt = enseignant.codeenseignant 
    LEFT JOIN matiere
    ON edt.matiereedt = matiere.codematiere
    WHERE edt.annee=" . $year . " AND (groupeedt='" . $filiere_code . "' OR groupeedt='" . $tp_code . "' OR groupeedt='" . $td_code . "')AND semaineedt=" . $week . " ORDER BY jouredt, debutedt";
    
    $result_query_week = mysql_query($query_week) or die('Erreur SQL !<br>' . $query_week . '<br>' . mysql_error());
    
    while ($data = mysql_fetch_assoc($result_query_week)) {
		
        $current_day = $data['jouredt'];
				
        switch ($current_day) {
						case 0:
                $Samedi[$NbCoursSamedi] = $data;
                $NbCoursSamedi++;
                break;
            case 1:
                $Dimanche[$NbCoursDimanche] = $data;
                $NbCoursDimanche++;
                break;
            case 2:
                $Lundi[$NbCoursLundi] = $data;
                $NbCoursLundi++;
                break;
            case 3:
                $Mardi[$NbCoursMardi] = $data;
                $NbCoursMardi++;
                break;
            case 4:
                $Mercredi[$NbCoursMercredi] = $data;
                $NbCoursMercredi++;
                break;
            case 5:
                $Jeudi[$NbCoursJeudi] = $data;
                $NbCoursJeudi++;
                break;
            case 6:
                $Vendredi[$NbCoursVendredi] = $data;
                $NbCoursVendredi++;
                break;
            default:
                break;	
        }

    }
    
    foreach ($days as $day) {
   
        for ($numCoursDuJour = 0; $numCoursDuJour < ${"NbCours" . $day}; $numCoursDuJour++) { // Pour chaque cours
            
            ${$day}[$numCoursDuJour]['debutedt'] = timeedt_to_hour(${$day}[$numCoursDuJour]['debutedt']);
            ${$day}[$numCoursDuJour]['finedt']   = timeedt_to_hour(${$day}[$numCoursDuJour]['finedt']);
            
            for ($curseur = ${$day}[$numCoursDuJour]['debutedt']; $curseur < ${$day}[$numCoursDuJour]['finedt']; $curseur++) { //Pour chaque demi heure de cours
                ${$day . "_affichage"}[$curseur] = $numCoursDuJour;
            }
            
        }
        
    }
    
    $daysToProceed = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi",);
    
    foreach ($daysToProceed as $day) { ?>

		<tr>
			<th class="day"><?php echo $day; ?></td>
			
			<?php for ($hour = 0; $hour < 24; $hour++): ?>
					
					<?php
					$typeCours = "empty-hour";
					$duree = 1;
					$numCoursHeure = ${$day . "_affichage"}[$hour];	
					
					if(isset($numCoursHeure)) {
						$duree = ${$day}[$numCoursHeure]['finedt'] - ${$day}[$numCoursHeure]['debutedt'];
						
						$typeCours = ${$day}[$numCoursHeure]['typeenseignementedt']; 
					}
					?>
					
					<td colspan=<?php echo $duree ?> class=<?php echo $typeCours ?>>
						<p>
							 <?php 
							if(isset($numCoursHeure)) {
								echo ${$day}[$numCoursHeure]['nommatiere'] . "<br />" . ${$day}[$numCoursHeure]['prenomenseignant'] . " " . ${$day}[$numCoursHeure]['nomenseignant'] . "<br />" . ${$day}[$numCoursHeure]['salleedt'];
							$hour += $duree -1;
							}
							 ?>
						 </p>
					</td>
					
			<?php endfor; ?>
			
		</tr>
	<?php
    }
    
    
    
    
    
    
}


function edt_display_all($year, $week, $filiere) {

	$days = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");

	foreach ($days as $day) {
		$$day = array();
		${"NbCours". $day} = 0;
		${$day . "_affichage"} = array();
		${$day . "_affichage"} = array_fill(0, 24, NULL);
	}

	$filiere_codes = trad_filiere_to_code_all($filiere); //RETOURNER TABLEAU AVEC LES VALEURS DES TP/TD
	$query_filiere_codes = "" ;
	foreach ($filiere_codes as $code) {
		 $query_filiere_codes = $query_filiere_codes . " groupeedt='" . $code  . "' OR "; 
	} 
	$query_filiere_codes = substr($query_filiere_codes, 0, -4); // Le dernier OR est enlevé

	$query_week = "SELECT nommatiere, nomenseignant, prenomenseignant,typeenseignementedt,groupeedt,jouredt,semaineedt,edt.annee,debutedt,finedt,salleedt 
		FROM edt 
		LEFT JOIN enseignant
		ON edt.enseignantedt = enseignant.codeenseignant 
		LEFT JOIN matiere
		ON edt.matiereedt = matiere.codematiere
		WHERE edt.annee=" . $year . " AND (" . $query_filiere_codes .") AND semaineedt=" . $week . " ORDER BY jouredt, debutedt";
		
	$result_query_week = mysql_query($query_week) or die('Erreur SQL !<br>' . $query_week . '<br>' . mysql_error());

	while ($data = mysql_fetch_assoc($result_query_week)) {
		
		$current_day = $data['jouredt'];
				
		switch ($current_day) {
			case 0:
				$Samedi[$NbCoursSamedi] = $data;
				$NbCoursSamedi++;
				break;
			case 1:
				$Dimanche[$NbCoursDimanche] = $data;
				$NbCoursDimanche++;
				break;
			case 2:
				$Lundi[$NbCoursLundi] = $data;
				$NbCoursLundi++;
				break;
			case 3:
				$Mardi[$NbCoursMardi] = $data;
				$NbCoursMardi++;
				break;
			case 4:
				$Mercredi[$NbCoursMercredi] = $data;
				$NbCoursMercredi++;
				break;
			case 5:
				$Jeudi[$NbCoursJeudi] = $data;
				$NbCoursJeudi++;
				break;
			case 6:
				$Vendredi[$NbCoursVendredi] = $data;
				$NbCoursVendredi++;
				break;
			default:
				break;	
		}

	}

	foreach ($days as $day) {

		for ($numCoursDuJour = 0; $numCoursDuJour < ${"NbCours" . $day}; $numCoursDuJour++) { // Pour chaque cours
			
			${$day}[$numCoursDuJour]['debutedt'] = timeedt_to_hour(${$day}[$numCoursDuJour]['debutedt']);
			${$day}[$numCoursDuJour]['finedt']   = timeedt_to_hour(${$day}[$numCoursDuJour]['finedt']);
			
			// Affichage du type de cours
			if(${$day}[$numCoursDuJour]['typeenseignementedt'] == "TP") {
				${$day}[$numCoursDuJour]['groupeedt'] = trad_codetp_affichage($filiere, ${$day}[$numCoursDuJour]['groupeedt']) ;
			}
			
			if(${$day}[$numCoursDuJour]['typeenseignementedt'] == "TD") {
				${$day}[$numCoursDuJour]['groupeedt'] = trad_codetd_affichage($filiere, ${$day}[$numCoursDuJour]['groupeedt']) ;
			}
			
			if(${$day}[$numCoursDuJour]['typeenseignementedt'] == "EXAM") {
				${$day}[$numCoursDuJour]['groupeedt'] = "EXAM" ;
			}
			
			if(${$day}[$numCoursDuJour]['typeenseignementedt'] == "COURS") {
				${$day}[$numCoursDuJour]['groupeedt'] = null ;
			}
			
			for ($curseur = ${$day}[$numCoursDuJour]['debutedt']; $curseur < ${$day}[$numCoursDuJour]['finedt']; $curseur++) { //Pour chaque demi heure de cours
					${$day . "_affichage"}[$curseur] = $numCoursDuJour;
			}
			
		}
		
	}

	$daysToProceed = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi",);

	foreach ($daysToProceed as $day) { ?>

		<tr>
			<th class="day"><?php echo $day; ?></td>
			
			<?php for ($hour = 0; $hour < 24; $hour++): ?>
					
					<?php
					$typeCours = "empty-hour";
					$duree = 1;
					$numCoursHeure = ${$day . "_affichage"}[$hour];	
					
					if(isset($numCoursHeure)) {
						$duree = ${$day}[$numCoursHeure]['finedt'] - ${$day}[$numCoursHeure]['debutedt'];	
						$typeCours = ${$day}[$numCoursHeure]['typeenseignementedt']; 
					}
					?>
					
					<td colspan=<?php echo $duree ?> class=<?php echo $typeCours ?>>
						<p>
							 <?php 
							if(isset($numCoursHeure)) {
								echo ${$day}[$numCoursHeure]['nommatiere'] . "<br />" . ${$day}[$numCoursHeure]['prenomenseignant'] . " " . ${$day}[$numCoursHeure]['nomenseignant'] . "<br />" . ${$day}[$numCoursHeure]['salleedt'] . "<br />" . ${$day}[$numCoursHeure]['groupeedt'];
							$hour += $duree -1;
							}
							 ?>
						 </p>
					</td>
					
			<?php endfor; ?>
			
		</tr>
	<?php
    }

}
