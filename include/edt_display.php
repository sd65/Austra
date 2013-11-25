<?php

include "db_connect.php";
include "functions.php";

function edt_display($year, $week, $groupeedt, $tp, $td) {

		$days = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
		
		$tp_code;
		$td_code;
		
		foreach ($days as $day) {
       $$day = array();
			 ${"NbCours" . $day} = 0;
			 ${$day . "_affichage"} = array();
			 ${$day . "_affichage"} = array_fill(0, 24, NULL);
    }
		
		$filiere_code = trad_filiere($groupeedt);
		$tp_code = trad_tp($filiere_code, $tp);
		$td_code = trad_td($filiere_code, $td);	
		
    $query_week = "SELECT matiereedt,enseignantedt,typeenseignementedt,groupeedt,jouredt,semaineedt,annee,debutedt,finedt,salleedt FROM edt WHERE annee=" . $year . " AND (groupeedt='" . $filiere_code . "' OR groupeedt='" . $tp_code . "' OR groupeedt='" . $td_code . "')AND semaineedt=" . $week . " ORDER BY jouredt, debutedt";
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
						
						$typeCours = trad_groupeedt_typeCours(${$day}[$numCoursHeure]['groupeedt']); //A RENSEIGNER DYNAMIQUEMENT
					}
					?>
					
					<td colspan=<?php echo $duree ?> class=<?php echo $typeCours ?>>
						 <?php 
						if(isset($numCoursHeure)) {
							echo ${$day}[$numCoursHeure]['matiereedt'] . "<br />" . ${$day}[$numCoursHeure]['enseignantedt'] . "<br />" . ${$day}[$numCoursHeure]['salleedt'];
						$hour += $duree -1;
						}
						 ?>
					</td>
					
			<?php endfor; ?>
			
		</tr>
	<?php
    }
    
    
    
    
    
    
}
