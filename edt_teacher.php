<?php
require_once "./include/functions.php";
require_once "./include/db_connect.php";

session_start();

if(!empty($_SESSION['prenomenseignant']) && !empty($_SESSION['nomenseignant'])  && !empty($_SESSION['departementenseignant']) ) {
    $id = $_SESSION['idenseignant'];
    $prenom = $_SESSION['prenomenseignant'];
    $nom = $_SESSION['nomenseignant'] ;
    $filiere = $_SESSION['departementenseignant'] ;
} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Austra</title>
        <meta name="description" content="" />
        <meta charset="UTF-8" />
        <link rel="icon" type="image/png" href="img/favicon.png" />
        <link rel="stylesheet" type="text/css" href="./css/base.css" />
        <link rel="stylesheet" type="text/css" href="./css/edt.css" />
        <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script> -->
        <script type="text/javascript" src="./js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="./js/frontend.js"></script>
    </head>
    <body>
          
				<?php 
					$year = date('Y');
					if(isset($_GET['semaine'])) {
						$week = $_GET['semaine'] ;
					} else {
						$week = date('W');
					}
				?>
				<?php 
					include "./include/checkCookies.php";
					include "./include/menu_teacher.php"; 
					include "./include/nav.php"; 
					include "./include/edt_display_teacher.php";
          include "./include/edt_display.php";
				?>
         <div id="master-planning">
            <table id="planning">
              <thead>
                <tr class="hours">
                  <td class="origin"></td>
                  <td class="empty-hour">8h</td><td class="half-hour" colspan="0.5"></td>
                  <td class="hour">9h</td><td class="half-hour"></td>
                  <td class="hour">10h</td><td class="half-hour"></td>
                  <td class="hour">11h</td><td class="half-hour"></td>
                  <td class="hour">12h</td><td class="half-hour"></td>
                  <td class="hour">13h</td><td class="half-hour"></td>
                  <td class="hour">14h</td><td class="half-hour"></td>
                  <td class="hour">15h</td><td class="half-hour"></td>
                  <td class="hour">16h</td><td class="half-hour"></td>
                  <td class="hour">17h</td><td class="half-hour"></td>
                  <td class="hour">18h</td><td class="half-hour"></td>
                  <td class="hour">19h</td><td class="half-hour"></td>
                  <td class="hour">20h</td><td class="half-hour"></td>
                </tr>
              </thead>
              <tbody>
                <?php 
                //EDT DISPLAY
                $filiere = "SRC_S3";
                edt_display_all($year, $week, $filiere, $bdd);
                //edt_display_teacher_self_filiere ($year, $week, $_COOKIE['codeenseignant'], $filiere, $bdd);
                //edt_display_teacher_self($year, $week, $_COOKIE['codeenseignant'], $bdd);
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <?php include "./include/calendriers.php"; ?>
    </body>
</html>
