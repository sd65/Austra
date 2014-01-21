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
        <a href="#"><img src="../img/logo_black@2x.png" alt="Austra" width="140" height"48"/></a>
    </header>

    <aside>
      <ul>
        <?php 
        $metier="";
            if($metier==""){

            }
        ?>
        <li><a <?php if($metier == "cours"){echo 'class="pageactive"';} ?> href="list/courses.php">Cours</a></li>  
        <li><a <?php if($metier == "étudiant"){echo 'class="pageactive"';} ?> href="list/students.php">Élèves</a></li>  
        <li><a <?php if($metier == "enseignant"){echo 'class="pageactive"';} ?> href="list/teachers.php">Enseignants</a></li>  
        <li><a <?php if($metier == "salle"){echo 'class="pageactive"';} ?> href="list/rooms.php">Salles</a></li>  
      </ul>
    </aside>