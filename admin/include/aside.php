<!-- HEADER SUBJECT = TRI PAR FILIERE -->
<?php session_start();

if(empty($_SESSION['prenomenseignant']) || empty($_SESSION['nomenseignant'])  || empty($_SESSION['departementenseignant']) || (!$_SESSION['niveauacces'] < 50)) {header('Location: ../index.php');} ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Austra - Administration</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<link rel="shortcut icon" href="../../img/favicon.png">
	<link rel="stylesheet" type="text/css" href="../css/base.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../css/form.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="../js/form.js"></script>

</head>
<body>
	<aside>
		<ul>
			<?php 
						// Récupère dossier parent pour lien...
			$explodeDirName = explode(DIRECTORY_SEPARATOR, dirname($_SERVER["PHP_SELF"]));
			$dossierParent = array_pop($explodeDirName);
			if($dossierParent=="form"){
				$lien="../list/";
				$lienlogo="../../";
			}else if($dossierParent=="list"){
				$lienlogo="../../";
				$lien="./";
			}else{
				$lien="./list/";
				$lienlogo="./../";
			}
			 ?>
			<li><a href=""><img src="<?=$lienlogo?>img/logo_black@2x.png" alt="Austra" width="140" height"48"/></a></li>
			<?php 
			if(!isset($metier)){
				$metier="home";
			}
			

			?>
			<li><a <?php if($metier == "matiere"){echo 'class="pageactive"';} ?> href="<?php echo $lien; ?>courses.php?dpt=all">Matières</a></li>  
			<li><a <?php if($metier == "élève"){echo 'class="pageactive"';} ?> href="<?php echo $lien; ?>students.php?filiere=all">Élèves</a></li>  
			<li><a <?php if($metier == "enseignant"){echo 'class="pageactive"';} ?> href="<?php echo $lien; ?>teachers.php?dpt=all">Enseignants</a></li>  
			<li><a <?php if($metier == "salle"){echo 'class="pageactive"';} ?> href="<?php echo $lien; ?>rooms.php?dpt=all">Salles</a></li>
			<li><a <?php if($metier == "absence"){echo 'class="pageactive"';} ?> href="<?php echo $lien; ?>absences.php?dpt=all">Absences</a></li>  
		</ul>
	</aside>