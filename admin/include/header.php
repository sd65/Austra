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
    <header>
        <a href=""><img src="../../img/logo_black@2x.png" alt="Austra" width="140" height"48"/></a>

        <?php

        $year=date('Y');
        if(date('m')<'08'){
            $lastyear=$year-1;
            $currentYearLikeRequest= "%" . $lastyear . "%" ;
        }else{
            $currentYearLikeRequest= "%" . $year . "%" ;
        }
        $req = $bdd->prepare('SELECT DISTINCT filiere FROM etudiant WHERE promo LIKE :annee');
        $req->execute(array('annee' => $currentYearLikeRequest));
        ?>
        <ul>
            <?php 
            if(!isset($_GET['filiere'])){
                echo "<li><a class='pageactive' href='?filiere=all'>Toutes</a></li>";
                $filiereGet="all";
            } 
            if(isset($_GET['filiere']) || isset($filiereGet)){
                $filiereGet=$_GET['filiere'];

                if($filiereGet == "all") {
                    echo "<li><a class='pageactive' href='?filiere=all'>Toutes</a></li>";
                } 
                else {
                    echo "<li><a href='?filiere=all'>Toutes</a></li>";
                }
                while ($menuListeFilieres = $req->fetch()):

                    $filiereActuelle = $menuListeFilieres['filiere'];
                $filiereClass = "";

                if(isset($_GET['filiere'])){
                    $filiereGet=$_GET['filiere'];
                    if($filiereActuelle == $_GET['filiere']){
                        $filiereClass = "pageactive";
                    }                    
                } else {
                    $filiereGet="all";
                }
                echo '<li><a class="' . $filiereClass . '" href="?filiere=' . $filiereActuelle . '" >' . str_replace("_"," ",$filiereActuelle) . '</a></li>';
                endwhile ;
            }
            ?>
        </ul>
        <?php
        switch ($metier) {
            case "matiere":
            $link="../form/create_course.php";
            $feminin="e";
            break;
            case "eleve":
            $link="../form/create_student.php";
            $feminin="e";
            break;
            case "enseignant":
            $link="../form/create_teacher.php";
            $feminin="";
            break;
            case "salle":
            $link="../form/create_room.php";
            $feminin="e";
            break;
            case "absence":
            $link="../form/create_absence.php";
            $feminin="e";
            break;
        }
        ?>
        <input type="search" name="cours" placeholder="Rechercher un<?=$feminin?> <?=$metier?>">
        <a class="boutonright" href="<?=$link?>">Ajouter un<?=$feminin?> <?=$metier?></a> 
    </header>

    <aside>
      <ul>
        <?php 
        if($metier==""){

        }

            // Récupère dossier parent pour lien...
        $dirname=dirname($_SERVER["PHP_SELF"]);
        $direxplode = explode(DIRECTORY_SEPARATOR, $dirname);
        $dossierParent = array_pop($direxplode);
        if($dossierParent=="form"){
            $lien="../list/";
        }else if($dossierParent=="list"){
            $lien="./";
        }
        else {
            $lien = "";
        }
        ?>
        <li><a <?php if($metier == "cours"){echo 'class="pageactive"';} ?> href="<?php echo $lien; ?>courses.php">Cours</a></li>  
        <li><a <?php if($metier == "étudiant"){echo 'class="pageactive"';} ?> href="<?php echo $lien; ?>students.php?filiere=all">Élèves</a></li>  
        <li><a <?php if($metier == "enseignant"){echo 'class="pageactive"';} ?> href="<?php echo $lien; ?>teachers.php">Enseignants</a></li>  
        <li><a <?php if($metier == "salle"){echo 'class="pageactive"';} ?> href="<?php echo $lien; ?>rooms.php">Salles</a></li>  
        <li><a <?php if($metier == "absence"){echo 'class="pageactive"';} ?> href="<?php echo $lien; ?>absence.php">Absences</a></li>  
    </ul>
</aside>