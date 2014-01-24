<?php
$metier = "enseignant";
include_once "../../include/db_connect.php";
include "../include/aside.php" ;
?>
<header>
	<ul>
		<?php 		
		if(isset($_GET['dpt'])){
			$dptGet=$_GET['dpt'];
		}else{

			$dptGet="all";
		}

		if($dptGet=="all"){
			echo "<li><a class='pageactive' href='?dpt=all'>Tous</a></li>";
		}else{
			echo "<li><a href='?dpt=all'>Tous</a></li>";
		}

		$req=$bdd->prepare('SELECT DISTINCT departementenseignant FROM enseignant');
		$req->execute(array());

		while($menuListeDpts=$req->fetch()){
			$dptActuel=$menuListeDpts['departementenseignant'];
			$dptClass="";

			if(isset($_GET['dpt'])){
				$dptGet=$_GET['dpt'];
				if($dptActuel == $_GET['dpt']){
					$dptClass = "pageactive";
				}                    
			}else{
				$dptGet="all";
			}
			
			echo '<li><a class="'.$dptClass.'" href="?dpt='.$dptActuel.'" >'.str_replace("_"," ",$dptActuel).'</a></li>';
		}
		
		?>
	</ul>
	<!-- Fonction non-prioritaire cf. tableur projet tut
	<input type="search" name="cours" placeholder="Rechercher un <?=$metier?>"> -->

	<a class="boutonright" href="../form/create_teacher.php">Ajouter un <?=$metier?></a>

</header>

<table>
	<thead>
		<td>Prénom</td>
		<td>Nom</td>
		<td>Dpt Principal</td>
		<td>Statut</td>
		<td class="options">Heures statutaires</td>
		<td class="options">Heures planifiées</td>
		<td class="options">Coordonnées</td>
		<td class="options">Contraintes</td>
		<td class="options">Charges</td>
	</thead>

	<tbody>

		<?php
		if(isset($dptGet)){
			if($dptGet == "all") {
				$req = $bdd->prepare('SELECT DISTINCT enseignant.id, enseignant.codeenseignant, prenomenseignant, nomenseignant, emailenseignant, departementenseignant, statutenseignant, statut.heuresstatutaires FROM enseignant LEFT JOIN statut ON enseignant.statutenseignant=statut.codestatut AND enseignant.departementenseignant=statut.dept WHERE annee=2013');
				$req->execute();
			}
			else {
				$req = $bdd->prepare('SELECT DISTINCT enseignant.id, enseignant.codeenseignant, prenomenseignant, nomenseignant, emailenseignant, departementenseignant, statutenseignant, statut.heuresstatutaires FROM enseignant LEFT JOIN statut ON enseignant.statutenseignant=statut.codestatut AND enseignant.departementenseignant=statut.dept WHERE departementenseignant=:dpt');
				$req->execute(array('dpt' => $dptGet));
			}
		}
		while ($listeEnseignants = $req->fetch()): 
			// Heures planifiées
			$codeenseignant=$listeEnseignants['codeenseignant'];
			$reqH = $bdd->prepare('	SELECT finedt, debutedt, typeenseignementedt 
									FROM edt 
									WHERE annee=2013 AND (enseignantedt=:codeenseignant OR enseignantedt2=:codeenseignant OR enseignantedt3=:codeenseignant OR enseignantedt4=:codeenseignant)');
			$reqH->execute(array('codeenseignant' => $codeenseignant));
		?>
		<tr>
			<td class="name"><?=$listeEnseignants['prenomenseignant']?></td>
			<td class="surname"><?=$listeEnseignants['nomenseignant']?></td>
			<td class="department"><?=$listeEnseignants['departementenseignant']?></td>
			<td class="status"><?=$listeEnseignants['statutenseignant']?></td>

			<td class="options"><?=$listeEnseignants['heuresstatutaires']?></td>
			<td class="options">
			<?php 
				$heure=0;
				while ($calculheure = $reqH->fetch()){
					if(($calculheure['typeenseignementedt']=="TD")OR($calculheure['typeenseignementedt']=="TP")OR($calculheure['typeenseignementedt']=="SOUT")){
						$heure+=($calculheure['finedt']-$calculheure['debutedt']);
					}else if($calculheure['typeenseignementedt']=="COURS"){
						$heure+=($calculheure['finedt']-$calculheure['debutedt'])*1.5;
					}else{
						$heure+=0;
					}
				}
				$heure=$heure/60;
				if($heure!=0){
					echo number_format($heure,1); 
				}
			?>
			</td>
			<td class="options"><a class="show" href=""><a class="edit" href="../form/create_teacher.php?id=<?=$listeEnseignants['id']?>"></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
			<td class="options"><a class="show" href=""><a class="edit" href=""></td>
		</tr>
		<?php
		endwhile;
		?>
	</tbody>
</table>
</body>
</html>
