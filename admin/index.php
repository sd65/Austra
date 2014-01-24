<?php 
include "./include/aside.php" ;

session_start();

if(empty($_SESSION['prenomenseignant']) || empty($_SESSION['nomenseignant'])  || empty($_SESSION['departementenseignant']) || (!$_SESSION['niveauacces'] < 50)) {header('Location: ../index.php');}
 ?>