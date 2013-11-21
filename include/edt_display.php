<?php

include "db_connect.php";
include "functions.php";

function edt_display($year, $week, $tp, $td) {

		$days = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
		
		foreach ($days as $day) {
       $$day = array();
			 ${"NbCours" . $day} = 0;
			 ${$day . "_affichage"} = array();
			 ${$day . "_affichage"} = array_fill(0, 24, NULL);
    }
		
    $query_week = "SELECT matiereedt,enseignantedt,typeenseignementedt,groupeedt,jouredt,semaineedt,annee,debutedt,finedt,salleedt FROM edt WHERE annee=" . $year . " AND groupeedt='SRC_S3' AND semaineedt=" . $week . " ORDER BY jouredt, debutedt";
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

		<tr class="day">
			<td><?php echo $day; ?></td>
			
			<?php for ($hour = 0; $hour < 24; $hour++): ?>
					<td>
             <?php echo ${$day . "_affichage"}[$hour]; ?> 
					</td>
			<?php endfor; ?>
		</tr>
	<?php
    }
    
    
    
    
    
    
}
