<?php
function edt_display_teacher_self ($year, $week, $codeenseignant, $bdd) {
	$days = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");

	foreach ($days as $day) {
       $$day = array();
			 ${"NbCours" . $day} = 0;
			 ${$day . "_affichage"} = array();
			 ${$day . "_affichage"} = array_fill(0, 24, NULL);
    	}

	$req=$bdd->prepare('SELECT nommatiere, nomenseignant, prenomenseignant, typeenseignementedt, enseignantedt, jouredt, semaineedt, edt.dateedt, debutedt, finedt, salleedt, groupeedt
		FROM edt LEFT JOIN enseignant ON edt.enseignantedt=enseignant.codeenseignant
		LEFT JOIN matiere ON edt.matiereedt = matiere.codematiere
		WHERE extract(year FROM edt.dateedt)= :year 
		AND enseignantedt= :codeenseignant
		AND semaineedt= :week ORDER BY jouredt, debutedt
		');
	$req->execute(array(
		'year' => $year,
		'week' => $week,
		'codeenseignant' => $codeenseignant
		));

	while ($data = $req->fetch()) {
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
            
						//detect
						
            for ($curseur = ${$day}[$numCoursDuJour]['debutedt']; $curseur < ${$day}[$numCoursDuJour]['finedt']; $curseur++) { //Pour chaque demi heure de cours
                ${$day . "_affichage"}[$curseur][1] = $numCoursDuJour;
            }
        }
    }
    
    $daysToProceed = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi",);
    foreach ($daysToProceed as $day) { ?>
		<tr>
			<th class="day"><?php echo $day; ?></th>
			
			<?php for ($hour = 0; $hour < 24; $hour++): 
					$typeCours = "empty-hour";
					$duree = 1;
					$numCoursHeure = ${$day . "_affichage"}[$hour][1];	
					
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

function edt_display_teacher_self_filiere ($year, $week, $codeenseignant, $filiere, $bdd) {
	$days = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");

	foreach ($days as $day) {
       $$day = array();
			 ${"NbCours" . $day} = 0;
			 ${$day . "_affichage"} = array();
			 ${$day . "_affichage"} = array_fill(0, 24, NULL);
    	}

    	//FILIERE

    $req=$bdd->prepare('SELECT nommatiere, nomenseignant, prenomenseignant, typeenseignementedt, enseignantedt, jouredt, semaineedt, edt.dateedt, debutedt, finedt, salleedt, groupeedt
		FROM edt LEFT JOIN enseignant ON edt.enseignantedt=enseignant.codeenseignant
		LEFT JOIN matiere ON edt.matiereedt = matiere.codematiere
		WHERE extract(year FROM edt.dateedt)= :year 
		AND enseignantedt= :codeenseignant
		AND groupeedt LIKE :filiere
		AND semaineedt= :week ORDER BY jouredt, debutedt
		');
	$req->execute(array(
		'year' => $year,
		'week' => $week,
		'codeenseignant' => $codeenseignant,
		'filiere' => $filiere . "%"
		));

	while ($data = $req->fetch()) {
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
            
						//detect
						
            for ($curseur = ${$day}[$numCoursDuJour]['debutedt']; $curseur < ${$day}[$numCoursDuJour]['finedt']; $curseur++) { //Pour chaque demi heure de cours
                ${$day . "_affichage"}[$curseur][1] = $numCoursDuJour;
            }
        }
    }
    
    $daysToProceed = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi",);
    foreach ($daysToProceed as $day) { ?>
		<tr>
			<th class="day"><?php echo $day; ?></th>
			
			<?php for ($hour = 0; $hour < 24; $hour++): 
					$typeCours = "empty-hour";
					$duree = 1;
					$numCoursHeure = ${$day . "_affichage"}[$hour][1];	
					
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
?>