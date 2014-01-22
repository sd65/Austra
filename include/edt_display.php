<?php
function edt_display($year, $week, $filiere, $tp, $td, $bdd) {

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

	$req=$bdd->prepare('SELECT nommatiere, nomenseignant, prenomenseignant,typeenseignementedt,groupeedt,jouredt,semaineedt,edt.dateedt,debutedt,finedt,salleedt
		FROM edt LEFT JOIN enseignant ON edt.enseignantedt=enseignant.codeenseignant
		LEFT JOIN matiere ON edt.matiereedt = matiere.codematiere
		WHERE extract(year FROM edt.dateedt)= :year 
		AND (groupeedt= :filiere_code OR groupeedt= :tp_code OR groupeedt= :td_code)
		AND semaineedt= :week ORDER BY jouredt, debutedt');
	$req->execute(array(
		'year' => $year,
		'week' => $week,
		'filiere_code' => $filiere_code,
		'tp_code' => $tp_code,
		'td_code' => $td_code));
   
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

function edt_display_all($year, $week, $filiere, $bdd) {

error_reporting(-1);
ini_set('display_errors', 1);

	$days = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
	foreach ($days as $day) {
		$$day = array();
		${"NbCours". $day} = 0;
		${$day . "_affichage"} = array();
		${$day . "_affichage"} = array_fill(0, 24, NULL);
		${$day . "_CoursMemeHeure"} = 0;
	}
	
	$req=$bdd->prepare('SELECT nommatiere, nomenseignant, prenomenseignant,typeenseignementedt,groupeedt,jouredt,semaineedt,edt.dateedt,debutedt,finedt,salleedt
		FROM edt LEFT JOIN enseignant ON edt.enseignantedt=enseignant.codeenseignant
		LEFT JOIN matiere ON edt.matiereedt = matiere.codematiere
		WHERE extract(year FROM edt.dateedt)= :year 
		AND groupeedt LIKE :filiere
		AND semaineedt= :week ORDER BY jouredt, debutedt, groupeedt');
	$req->execute(array(
		'year' => $year,
		'week' => $week,
		'filiere' => $filiere . "%"
		));
	 
    while ($data = $req->fetch()){
		
		/** BUG DU 3 COURS RECUPERES A CHAQUE REQUETE **/
		/** BUG PRESENT UNIQUEMENT SUR LA FILIERE SRC_S3 **/
		if ($filiere == "SRC_S3" || $filiere == "PUB_S3") {
			$req->fetch();
			$req->fetch();
		}
		/***********************************************/
		
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
			//Stockage des cours dans chaque case du tableau pour l'affichage
			
			for ($curseur = ${$day}[$numCoursDuJour]['debutedt']; $curseur < ${$day}[$numCoursDuJour]['finedt']; $curseur++) { //Pour chaque demi heure de cours
					
					if (!empty(${$day . "_affichage"}[$curseur])){ 
						${$day . "_CoursMemeHeure"}++ ;
					}
					else {
						${$day . "_CoursMemeHeure"} = 0;
					}
						${$day . "_affichage"}[$curseur][${$day . "_CoursMemeHeure"}] = $numCoursDuJour;
					
					
			}
		}
	}

	$daysToProceed = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi");
	foreach ($daysToProceed as $day) { ?>

		<tr>
			<th class="day"><?php echo $day; ?></th>
			
			<?php for ($hour = 0; $hour < 24; $hour++): 
					$typeCours = "empty-hour";
					$duree = 1;
								
					$numCoursHeure = ${$day . "_affichage"}[$hour][0];
	
					$compteCoursParHeure = count(${$day . "_affichage"}[$hour]);
					
					if($compteCoursParHeure <= 1) {
					
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
					
			<?php }
					//Quand plusieurs cours en même temps
					else {
						
						$duree = ${$day}[$numCoursHeure]['finedt'] - ${$day}[$numCoursHeure]['debutedt'];	
						$typeCours = ${$day}[$numCoursHeure]['typeenseignementedt']; 	
					?>
					<td colspan=<?php echo $duree ?> class=<?php echo $typeCours ?>>
						<?php for($i = 0; $i < $compteCoursParHeure ; $i++)  { ?>
						<p>
							<?php 
							
								echo ${$day}[$numCoursHeure + $i]['nommatiere'] . "<br />" . ${$day}[$numCoursHeure + $i]['prenomenseignant'] . " " . ${$day}[$numCoursHeure + $i]['nomenseignant'] . "<br />" . ${$day}[$numCoursHeure + $i]['salleedt'] . "<br />" . ${$day}[$numCoursHeure + $i]['groupeedt'];
								?>
							
							
							
						 </p>
						 <?php }
						 $hour += $duree -1;
							?>
					</td>
					<?php
					}
			endfor; ?>
			
		</tr>
	<?php
    }
}