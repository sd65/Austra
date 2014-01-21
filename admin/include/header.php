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
            while ($menuListeFilieres = $req->fetch()):
                $filiereActuelle = $menuListeFilieres['filiere'];
                $filiereClass = "";
                if(isset($_GET['filiere'])){
                    if($filiereActuelle == $_GET['filiere']){
                        $filiereClass = "pageactive";
                    }
                }else{
                    $filiereGet="MMI_S1";
                }
                if($filiereActuelle == $filiereGet) {
                    $filiereClass = "pageactive";
                }
                echo '<li><a class="' . $filiereClass . '" href="?filiere=' . $filiereActuelle . '" >' . str_replace("_"," ",$filiereActuelle) . '</a></li>';
            endwhile ;
            ?>
        </ul>
        <input type="search" name="cours" placeholder="Rechercher un <?=$metier?>">
        <a class="boutonright" href="">Ajouter un <?=$metier?></a> 
    </header>

    <aside>
      <ul>
        <?php 
            if($metier==""){

            }
        ?>
        <li><a <?php if($metier == "cours"){echo 'class="pageactive"';} ?> href="courses.php">Cours</a></li>  
        <li><a <?php if($metier == "étudiant"){echo 'class="pageactive"';} ?> href="students.php">Élèves</a></li>  
        <li><a <?php if($metier == "enseignant"){echo 'class="pageactive"';} ?> href="teachers.php">Enseignants</a></li>  
        <li><a <?php if($metier == "salle"){echo 'class="pageactive"';} ?> href="rooms.php">Salles</a></li>  
      </ul>
    </aside>