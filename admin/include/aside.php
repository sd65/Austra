<!-- HEADER SUBJECT = TRI PAR FILIERE -->

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
			<li><a href=""><img src="../../img/logo_black@2x.png" alt="Austra" width="140" height"48"/></a></li>
			<?php 
			if($metier==""){
			}
						// Récupère dossier parent pour lien...
			$explodeDirName = explode(DIRECTORY_SEPARATOR, dirname($_SERVER["PHP_SELF"]));
			$dossierParent = array_pop($explodeDirName);
			if($dossierParent=="form"){
				$lien="../list/";
			}else if($dossierParent=="list"){
				$lien="./";
			}
			?>
			<li><a <?php if($metier == "matière"){echo 'class="pageactive"';} ?> href="<?php echo $lien; ?>courses.php?dpt=all">Matière</a></li>  
			<li><a <?php if($metier == "étudiant"){echo 'class="pageactive"';} ?> href="<?php echo $lien; ?>students.php?filiere=all">Élèves</a></li>  
			<li><a <?php if($metier == "enseignant"){echo 'class="pageactive"';} ?> href="<?php echo $lien; ?>teachers.php?dpt=all">Enseignants</a></li>  
			<li><a <?php if($metier == "salle"){echo 'class="pageactive"';} ?> href="<?php echo $lien; ?>rooms.php?dpt=all">Salles</a></li>  
		</ul>
	</aside>