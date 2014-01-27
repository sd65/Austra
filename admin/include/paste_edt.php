	<?php
session_start();

if(isset($_GET['toDate'])) {
	$fromDate = $_SESSION['fromDate'];
	$toDate = $_GET['toDate'];
	$filiere = $_SESSION['filiere'];

	$toNumSem=date("W", strtotime($toDate));
	$toJour=date("w", strtotime($toDate));

	$fromNumSem=date("W", strtotime($fromDate));
	$fromJour=date("w", strtotime($fromDate));

	switch ($toJour) {
		case 0:
			$toJourSat=1; //Dimanche
			break;
		case 1:
			$toJourSat=2; //Lundi			
			break;
		case 2:
			$toJourSat=3; //Mardi
			break;
		case 3:
			$toJourSat=4; //Mercredi
			break;
		case 4:
			$toJourSat=5; //Jeudi
			break;
		case 5:
			$toJourSat=6; //Vendredi
			break;
		case 6:
			$toJourSat=0; //Samedi
			break;
		default:
			break;	
	}
	include "../../include/db_connect.php";

	$req=$bdd->prepare('INSERT INTO edt
          (dateedt, debutedt, groupeedt, typeenseignementedt, finedt, filiereedt, matiereedt, enseignantedt, salleedt, ligneedt, positionedt, couleuredt, jouredt, semaineedt, dept, annee, numero, enseignantedt2, enseignantedt3, enseignantedt4, salleedt2, salleedt3, salleedt4, memoedt, idmat)
     (SELECT :T, debutedt, groupeedt, typeenseignementedt, finedt, filiereedt, matiereedt, enseignantedt, salleedt, ligneedt, positionedt, couleuredt, :ToJour, :ToNumSemaine, dept, annee, numero, enseignantedt2, "comment6", enseignantedt4, salleedt2, salleedt3, salleedt4, memoedt, idmat
      FROM edt WHERE dateedt=:F AND groupeedt=:Fill AND annee="2013")') ;
	$req->execute(array(
		'T' => $toDate,
		'ToNumSemaine' => $toNumSem,
		'ToJour' => $toJourSat,
		'F' => $fromDate,
		'Fill' => $filiere,			
		));
}
